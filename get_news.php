<?php
include 'config/database.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = $conn->query("SELECT * FROM news WHERE id = $id");
    
    if ($result->num_rows > 0) {
        $news = $result->fetch_assoc();
        header('Content-Type: application/json');
        echo json_encode($news);
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'Actualité non trouvée']);
    }
} else {
    http_response_code(400);
    echo json_encode(['error' => 'ID manquant']);
}
?>