<?php
// init_database.php - Script séparé pour réinitialiser la base

require_once 'database.php';

class DatabaseInitializer {
    public static function resetDatabase() {
        $database = new Database(true); // true = mode initialisation
        return $database->conn;
    }
}

// Exécuter seulement si appelé directement
if (basename($_SERVER['PHP_SELF']) === 'init_database.php') {
    echo "Réinitialisation de la base de données...<br>";
    $conn = DatabaseInitializer::resetDatabase();
    echo "Base de données réinitialisée avec succès!<br>";
    echo "<a href='index.php'>Retour à l'application</a>";
}
?>