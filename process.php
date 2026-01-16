<?php
// process.php - Version complète
session_start();
require_once 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    
    switch ($action) {
        // EXISTANT - Abonnement newsletter
        case 'subscribe':
            if (!empty($_POST['email']) && !empty($_POST['name'])) {
                $name = trim($_POST['name']);
                $email = trim($_POST['email']);
                
                // Vérifier si email existe déjà
                $stmt = $conn->prepare("SELECT id FROM subscribers WHERE email = ?");
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();
                
                if ($result->num_rows > 0) {
                    echo "exists";
                } else {
                    // Insérer nouvel abonné
                    $stmt = $conn->prepare("INSERT INTO subscribers (name, email) VALUES (?, ?)");
                    $stmt->bind_param("ss", $name, $email);
                    
                    if ($stmt->execute()) {
                        echo "success";
                    } else {
                        echo "error";
                    }
                }
            }
            break;
            
        // EXISTANT - Contact
        case 'contact':
            if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['subject']) && !empty($_POST['message'])) {
                $name = trim($_POST['name']);
                $email = trim($_POST['email']);
                $subject = trim($_POST['subject']);
                $message = trim($_POST['message']);
                
                $stmt = $conn->prepare("INSERT INTO messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssss", $name, $email, $subject, $message);
                
                if ($stmt->execute()) {
                    echo "success";
                } else {
                    echo "error";
                }
            }
            break;
            
        // NOUVEAU - Envoyer newsletter
        case 'send_newsletter':
            // Vérifier si admin est connecté
            if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
                echo "unauthorized";
                exit;
            }
            
            if (!empty($_POST['subject']) && !empty($_POST['content'])) {
                $subject = trim($_POST['subject']);
                $content = trim($_POST['content']);
                
                // Récupérer tous les abonnés
                $subscribers = $conn->query("SELECT email, name FROM subscribers");
                
                $sent_count = 0;
                $errors = 0;
                
                // Simuler l'envoi d'emails (à remplacer par vrai système d'email)
                while ($subscriber = $subscribers->fetch_assoc()) {
                    // ICI VOUS AJOUTEZ VOTRE CODE D'ENVOI D'EMAIL
                    // Exemple avec mail() :
                    /*
                    $to = $subscriber['email'];
                    $headers = "From: newsletter@votresite.com\r\n";
                    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
                    
                    $email_content = "
                    <html>
                    <body>
                        <h2>$subject</h2>
                        <div>$content</div>
                        <hr>
                        <p>Cet email a été envoyé à $subscriber[name]</p>
                    </body>
                    </html>
                    ";
                    
                    if (mail($to, $subject, $email_content, $headers)) {
                        $sent_count++;
                    } else {
                        $errors++;
                    }
                    */
                    
                    // Pour l'instant, on simule juste
                    $sent_count++;
                }
                
                // Enregistrer dans les logs (vous pouvez créer une table newsletter_logs)
                $stmt = $conn->prepare("INSERT INTO messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
                $admin_name = "Système Newsletter";
                $admin_email = "newsletter@admin.com";
                $log_message = "Newsletter envoyée à $sent_count abonnés. Erreurs: $errors";
                $stmt->bind_param("ssss", $admin_name, $admin_email, $subject, $log_message);
                $stmt->execute();
                
                echo "success:$sent_count";
            }
            break;
            
        // NOUVEAU - Ajouter une actualité
        case 'add_news':
            // Vérifier si admin est connecté
            if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
                echo "unauthorized";
                exit;
            }
            
            if (!empty($_POST['title']) && !empty($_POST['summary']) && !empty($_POST['content'])) {
                $title = trim($_POST['title']);
                $summary = trim($_POST['summary']);
                $content = trim($_POST['content']);
                
                $stmt = $conn->prepare("INSERT INTO news (title, summary, content) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $title, $summary, $content);
                
                if ($stmt->execute()) {
                    echo "success";
                } else {
                    echo "error";
                }
            }
            break;
    }
}
?>