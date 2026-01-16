<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

require_once 'config/database.php';

// Récupérer les statistiques
$subscribers_count = $conn->query("SELECT COUNT(*) as count FROM subscribers")->fetch_assoc()['count'];
$messages_count = $conn->query("SELECT COUNT(*) as count FROM messages")->fetch_assoc()['count'];
$news_count = $conn->query("SELECT COUNT(*) as count FROM news")->fetch_assoc()['count'];

// Récupérer les données
$subscribers = $conn->query("SELECT * FROM subscribers ORDER BY created_at DESC")->fetch_all(MYSQLI_ASSOC);
$news = $conn->query("SELECT * FROM news ORDER BY created_at DESC")->fetch_all(MYSQLI_ASSOC);
$contact_messages = $conn->query("SELECT * FROM messages ORDER BY created_at DESC LIMIT 10")->fetch_all(MYSQLI_ASSOC);

// Traitement des actions de suppression
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete_news'])) {
        $news_id = intval($_POST['news_id']);
        $conn->query("DELETE FROM news WHERE id = $news_id");
        header('Location: admin.php?deleted=news');
        exit;
    }
    
    if (isset($_POST['delete_subscriber'])) {
        $subscriber_id = intval($_POST['subscriber_id']);
        $conn->query("DELETE FROM subscribers WHERE id = $subscriber_id");
        header('Location: admin.php?deleted=subscriber');
        exit;
    }
    
    if (isset($_POST['delete_message'])) {
        $message_id = intval($_POST['message_id']);
        $conn->query("DELETE FROM messages WHERE id = $message_id");
        header('Location: admin.php?deleted=message');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - Royaume du Maroc</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            background: #f5f5f5;
        }
        
        /* ADMIN CONTENT */
        .admin-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px 20px;
        }
        
        .admin-header {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .admin-header h1 {
            color: #101820;
            margin-bottom: 10px;
        }
        
        .welcome-message {
            color: #485758;
            font-size: 1.1rem;
        }
        
        /* STATS */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 40px;
        }
        
        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border-left: 4px solid #3498db;
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 10px;
        }
        
        .stat-label {
            color: #7f8c8d;
            font-size: 1.1rem;
        }
        
        /* SECTIONS */
        .sections-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 40px;
        }
        
        .section {
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .section h2 {
            color: #2c3e50;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #ecf0f1;
        }
        
        /* TABLES */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        
        .data-table th,
        .data-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ecf0f1;
        }
        
        .data-table th {
            background: #f8f9fa;
            font-weight: 600;
            color: #2c3e50;
        }
        
        .data-table tr:hover {
            background: #f8f9fa;
        }
        
        /* FORMS */
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #2c3e50;
            font-weight: 600;
        }
        
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #bdc3c7;
            border-radius: 4px;
            font-size: 16px;
            background: #fff;
        }
        
        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }
        
        /* BUTTONS */
        .btn {
            padding: 12px 25px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            transition: all 0.3s;
        }
        
        .btn-primary {
            background: #27ae60;
            color: white;
        }
        
        .btn-primary:hover {
            background: #229954;
        }
        
        .btn-danger {
            background: #e74c3c;
            color: white;
            padding: 8px 15px;
            font-size: 0.9rem;
        }
        
        .btn-danger:hover {
            background: #c0392b;
        }
        
        .btn-logout {
            background: #95a5a6;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            display: inline-block;
        }
        
        .btn-logout:hover {
            background: #7f8c8d;
        }
        
        /* MESSAGES */
        .success-message {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
            border-left: 4px solid #28a745;
        }
        
        .empty-message {
            text-align: center;
            color: #7f8c8d;
            padding: 30px;
            font-style: italic;
        }
        
        /* ACTIONS */
        .actions-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .logout-section {
            text-align: center;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #ecf0f1;
        }
    </style>
</head>
<body>
    <!-- HEADER -->
    <?php include 'header.php'; ?>

    <!-- CONTENU ADMIN -->
    <div class="admin-container">
        <div class="admin-header">
            <h1>Panel d'Administration</h1>
            <p class="welcome-message">Bienvenue, <?php echo $_SESSION['admin_username']; ?> !</p>
        </div>

        <?php if (isset($_GET['deleted'])): ?>
            <div class="success-message">
                <?php
                switch($_GET['deleted']) {
                    case 'news': echo "Actualité supprimée avec succès !"; break;
                    case 'subscriber': echo "Abonné supprimé avec succès !"; break;
                    case 'message': echo "Message supprimé avec succès !"; break;
                }
                ?>
            </div>
        <?php endif; ?>

        <!-- STATISTIQUES -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number"><?php echo $news_count; ?></div>
                <div class="stat-label">Actualités</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php echo $subscribers_count; ?></div>
                <div class="stat-label">Abonnés</div>
            </div>
            <div class="stat-card">
                <div class="stat-number"><?php echo $messages_count; ?></div>
                <div class="stat-label">Messages Reçus</div>
            </div>
        </div>

        <div class="sections-grid">
            <!-- GESTION DES ACTUALITÉS -->
            <div class="section">
                <div class="actions-header">
                    <h2>📰 Gestion des Actualités</h2>
                </div>
                
                <!-- Formulaire d'ajout -->
                <form action="process.php" method="POST" style="margin-bottom: 30px;">
                    <input type="hidden" name="action" value="add_news">
                    <div class="form-group">
                        <input type="text" name="title" placeholder="Titre de l'actualité" required>
                    </div>
                    <div class="form-group">
                        <textarea name="summary" placeholder="Résumé" required></textarea>
                    </div>
                    <div class="form-group">
                        <textarea name="content" placeholder="Contenu complet" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Publier l'actualité</button>
                </form>

                <!-- Liste des actualités -->
                <h3>Actualités existantes :</h3>
                <?php if (!empty($news)): ?>
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($news as $item): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($item['title']); ?></td>
                                <td><?php echo date('d/m/Y', strtotime($item['created_at'])); ?></td>
                                <td>
                                    <form method="POST" style="display: inline;">
                                        <input type="hidden" name="news_id" value="<?php echo $item['id']; ?>">
                                        <button type="submit" name="delete_news" class="btn btn-danger" 
                                                onclick="return confirm('Supprimer cette actualité ?')">
                                            Supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="empty-message">Aucune actualité pour le moment.</div>
                <?php endif; ?>
            </div>

            <!-- GESTION DES ABONNÉS -->
            <div class="section">
                <div class="actions-header">
                    <h2>👥 Gestion des Abonnés</h2>
                    <span class="stat-number"><?php echo $subscribers_count; ?></span>
                </div>

                <?php if (!empty($subscribers)): ?>
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($subscribers as $subscriber): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($subscriber['name']); ?></td>
                                <td><?php echo htmlspecialchars($subscriber['email']); ?></td>
                                <td><?php echo date('d/m/Y', strtotime($subscriber['created_at'])); ?></td>
                                <td>
                                    <form method="POST" style="display: inline;">
                                        <input type="hidden" name="subscriber_id" value="<?php echo $subscriber['id']; ?>">
                                        <button type="submit" name="delete_subscriber" class="btn btn-danger"
                                                onclick="return confirm('Supprimer cet abonné ?')">
                                            Supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="empty-message">Aucun abonné pour le moment.</div>
                <?php endif; ?>
            </div>

            <!-- NEWSLETTER -->
            <div class="section">
                <h2>📧 Envoyer une Newsletter</h2>
                <form action="process.php" method="POST">
                    <input type="hidden" name="action" value="send_newsletter">
                    <div class="form-group">
                        <input type="text" name="subject" placeholder="Sujet de l'email" required>
                    </div>
                    <div class="form-group">
                        <textarea name="content" rows="6" placeholder="Contenu du message..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Envoyer à <?php echo $subscribers_count; ?> abonnés
                    </button>
                </form>
            </div>

            <!-- MESSAGES DE CONTACT -->
            <div class="section">
                <div class="actions-header">
                    <h2>📨 Messages de Contact</h2>
                </div>

                <?php if (!empty($contact_messages)): ?>
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Sujet</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($contact_messages as $message): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($message['name']); ?></td>
                                <td><?php echo htmlspecialchars($message['subject']); ?></td>
                                <td><?php echo date('d/m/Y', strtotime($message['created_at'])); ?></td>
                                <td>
                                    <form method="POST" style="display: inline;">
                                        <input type="hidden" name="message_id" value="<?php echo $message['id']; ?>">
                                        <button type="submit" name="delete_message" class="btn btn-danger"
                                                onclick="return confirm('Supprimer ce message ?')">
                                            Supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="empty-message">Aucun message pour le moment.</div>
                <?php endif; ?>
            </div>
        </div>

        <!-- DÉCONNEXION -->
        <div class="logout-section">
            <a href="logout.php" class="btn-logout">🚪 Déconnexion</a>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>