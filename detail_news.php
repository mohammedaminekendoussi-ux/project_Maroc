<?php
// detail_news.php - Page de détail d'une actualité
require_once 'config/database.php';

// Vérifier si un ID est fourni
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$news_id = intval($_GET['id']);

// Récupérer l'actualité
$stmt = $conn->prepare("SELECT * FROM news WHERE id = ?");
$stmt->bind_param("i", $news_id);
$stmt->execute();
$result = $stmt->get_result();
$news = $result->fetch_assoc();

// Si l'actualité n'existe pas
if (!$news) {
    header('Location: index.php');
    exit;
}
?>

<?php include 'header.php'; ?>

<div class="main-container">
    <aside class="sidebar-left">
        <?php include 'menu_lateral.php'; ?>
    </aside>
    
    <main class="main-content">
        <article class="new-detail">
            
            <!-- Contenu de l'actualité -->
            <header class="new-header">
                <div class="new-meta">
                    <span class="new-date">📅 <?php echo date('d/m/Y à H:i', strtotime($news['created_at'])); ?></span>
                </div>
                <h1 class="new-title"><?php echo htmlspecialchars($news['title']); ?></h1>
                <p class="new-summary"><?php echo htmlspecialchars($news['summary']); ?></p>
            </header>
            
            <div class="new-content">
                <?php echo nl2br(htmlspecialchars($news['content'])); ?>
            </div>
            
            <!-- Actions -->
            <div class="new-actions">
                <a href="toutes_news.php" class="back-btn">← Retour aux actualités</a>
                <div class="share-buttons">
                    <button onclick="shareNews()" class="share-btn">📤 Partager</button>
                    <button onclick="printNews()" class="print-btn">🖨️ Imprimer</button>
                </div>
            </div>
        </article>
        
        <!-- Actualités similaires -->
        <?php
        // Récupérer 3 actualités récentes (sauf celle en cours)
        $similar_news = $conn->query("
            SELECT * FROM news 
            WHERE id != $news_id 
            ORDER BY created_at DESC 
            LIMIT 3
        ")->fetch_all(MYSQLI_ASSOC);
        ?>
        
        <?php if (!empty($similar_news)): ?>
        <section class="similar-news">
            <h2>📰 Actualités récentes</h2>
            <div class="similar-grid">
                <?php foreach ($similar_news as $item): ?>
                <div class="similar-item">
                    <div class="similar-date"><?php echo date('d/m/Y', strtotime($item['created_at'])); ?></div>
                    <h3 class="similar-title"><?php echo htmlspecialchars($item['title']); ?></h3>
                    <p class="similar-summary"><?php echo htmlspecialchars(substr($item['summary'], 0, 100)) . '...'; ?></p>
                    <a href="detail_news.php?id=<?php echo $item['id']; ?>" class="similar-link">Lire la suite →</a>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
        <?php endif; ?>
    </main>
    
    <aside class="sidebar-right">
        <?php include 'video_sidebar.php'; ?>
    </aside>
</div>

<style>
.news-detail {
    background: white;
    padding: 0;
    border-radius: 10px;
    overflow: hidden;
}

.breadcrumb a {
    color: #3498db;
    text-decoration: none;
}

.breadcrumb a:hover {
    text-decoration: underline;
}

.new-header {
    padding: 40px 30px 20px 30px;
    border-bottom: 2px solid #ecf0f1;
}

.new-meta {
    margin-bottom: 15px;
}

.new-date {
    color: #7f8c8d;
    font-size: 0.9rem;
}

.new-title {
    color: #2c3e50;
    font-size: 2.2rem;
    margin-bottom: 20px;
    line-height: 1.3;
}

.new-summary {
    color: #5d6d7e;
    font-size: 1.2rem;
    line-height: 1.6;
    font-style: italic;
    border-left: 4px solid #3498db;
    padding-left: 20px;
}

.new-content {
    padding: 30px;
    line-height: 1.8;
    color: #2c3e50;
    font-size: 1.1rem;
}

.new-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 25px 30px;
    background: #f8f9fa;
    border-top: 1px solid #e9ecef;
}

.back-btn {
    background: #95a5a6;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    transition: background 0.3s;
}

.back-btn:hover {
    background: #7f8c8d;
}

.share-buttons {
    display: flex;
    gap: 10px;
}

.share-btn, .print-btn {
    background: #3498db;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s;
}

.share-btn:hover, .print-btn:hover {
    background: #2980b9;
}

.similar-news {
    margin-top: 50px;
    padding: 30px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.similar-news h2 {
    color: #2c3e50;
    margin-bottom: 25px;
    text-align: center;
}

.similar-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 25px;
}

.similar-item {
    background: #f8f9fa;
    padding: 25px;
    border-radius: 8px;
    border-left: 4px solid #3498db;
    transition: transform 0.3s;
}

.similar-item:hover {
    transform: translateY(-3px);
}

.similar-date {
    color: #7f8c8d;
    font-size: 0.9rem;
    margin-bottom: 10px;
}

.similar-title {
    color: #2c3e50;
    margin-bottom: 10px;
    font-size: 1.1rem;
}

.similar-summary {
    color: #555;
    line-height: 1.5;
    margin-bottom: 15px;
}

.similar-link {
    color: #3498db;
    text-decoration: none;
    font-weight: 600;
}

.similar-link:hover {
    text-decoration: underline;
}
</style>

<script>
function shareNews() {
    if (navigator.share) {
        navigator.share({
            title: '<?php echo addslashes($news['title']); ?>',
            text: '<?php echo addslashes($news['summary']); ?>',
            url: window.location.href
        });
    } else {
        // Fallback pour les navigateurs qui ne supportent pas l'API Share
        navigator.clipboard.writeText(window.location.href);
        alert('Lien copié dans le presse-papier !');
    }
}

function printNews() {
    window.print();
}
</script>

<?php include 'footer.php'; ?>