<?php
class Database {
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $database = 'projet_maroc';
    public $conn;

    public function __construct($initDatabase = false) {
        // Connexion de base sans sélectionner de base de données
        $this->conn = new mysqli($this->host, $this->user, $this->password);
        
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        
        if ($initDatabase) {
            // Mode initialisation : supprimer et recréer la base
            $this->initDatabase();
        } else {
            // Mode normal : juste se connecter à la base existante
            $this->connectToExisting();
        }
    }

    private function initDatabase() {
        // Supprimer l'ancienne base si elle existe
        $this->conn->query("DROP DATABASE IF EXISTS $this->database");
        
        // Créer la nouvelle base
        if ($this->conn->query("CREATE DATABASE $this->database")) {
            // Sélectionner la nouvelle base
            $this->conn->select_db($this->database);
            $this->createTables();
            error_log("Base de données initialisée avec succès");
        } else {
            die("Error creating database: " . $this->conn->error);
        }
    }

    private function connectToExisting() {
        // Vérifier si la base existe
        $result = $this->conn->query("SHOW DATABASES LIKE '$this->database'");
        
        if ($result->num_rows > 0) {
            // Base existe, se connecter
            $this->conn->select_db($this->database);
            error_log("Connexion à la base existante réussie");
        } else {
            // Base n'existe pas, la créer
            error_log("Base non trouvée, création en cours...");
            $this->initDatabase();
        }
    }

    private function createTables() {
        // Table News (simplifiée)
        $sql_news = "CREATE TABLE IF NOT EXISTS news (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            summary TEXT NOT NULL,
            content TEXT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";

        // Table Subscribers  
        $sql_subscribers = "CREATE TABLE IF NOT EXISTS subscribers (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            email VARCHAR(255) UNIQUE NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";

        // Table Messages
        $sql_messages = "CREATE TABLE IF NOT EXISTS messages (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            email VARCHAR(255) NOT NULL,
            subject VARCHAR(255) NOT NULL,
            message TEXT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";

        // Exécuter les créations
        $this->conn->query($sql_news);
        $this->conn->query($sql_subscribers);
        $this->conn->query($sql_messages);

        // Vérifier et insérer données d'exemple
        $this->insertSampleData();
    }

    private function insertSampleData() {
        // Vérifier si la table news est vide
        $result = $this->conn->query("SELECT COUNT(*) as count FROM news");
        $row = $result->fetch_assoc();
        
        if ($row['count'] == 0) {
            $sample_news = [
                [
                    "Festival des Roses à Kelaa M'Gouna",
                    "Le célèbre festival des roses revient avec des animations traditionnelles.",
                    "Le Festival des Roses de Kelaa M'Gouna est un événement annuel qui célèbre la récolte des roses dans la vallée du Dadès."
                ],
                [
                    "Nouveau Musée de Rabat",
                    "Inauguration du musée des civilisations modernes.",
                    "Le nouveau musée présente une collection exceptionnelle d'art contemporain marocain."
                ]
            ];

            $stmt = $this->conn->prepare("INSERT INTO news (title, summary, content) VALUES (?, ?, ?)");
            foreach ($sample_news as $news) {
                $stmt->bind_param("sss", $news[0], $news[1], $news[2]);
                $stmt->execute();
            }
            
            // Ajouter quelques abonnés de test
            $this->conn->query("INSERT IGNORE INTO subscribers (name, email) VALUES 
                ('Test User 1', 'test1@email.com'),
                ('Test User 2', 'test2@email.com')");
            
            error_log("Données d'exemple insérées");
        }
    }
}

// Fonction pour logger les erreurs
function log_error($message) {
    error_log("[" . date('Y-m-d H:i:s') . "] " . $message);
}

// Connexion normale (sans réinitialisation)
try {
    $database = new Database(false); // false = ne pas réinitialiser la base
    $conn = $database->conn;
} catch (Exception $e) {
    log_error("Connexion BD échouée: " . $e->getMessage());
    die("Erreur base de données. Vérifiez les logs.");
}

log_error("Connexion BD établie avec succès");
?>