<?php
// toutes_news.php - Liste de toutes les actualités
require_once 'config/database.php';

// Pagination
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$per_page = 10;
$offset = ($page - 1) * $per_page;

// Compter le nombre total d'actualités
$total_result = $conn->query("SELECT COUNT(*) as total FROM news");
$total_news = $total_result->fetch_assoc()['total'];
$total_pages = ceil($total_news / $per_page);

// Récupérer les actualités pour la page courante
$news = $conn->query("
    SELECT * FROM news 
    ORDER BY created_at DESC 
    LIMIT $per_page OFFSET $offset
")->fetch_all(MYSQLI_ASSOC);
?>

<?php include 'header.php'; ?>

<div class="main-container">
    <aside class="sidebar-left">
        <?php include 'menu_lateral.php'; ?>
    </aside>
    
    <main class="main-content">
        <div class="news-archive">
            
            <!-- En-tête -->
            <header class="archive-header">
                <h1>📰 Toutes les Actualités</h1>
                <p class="archive-info">
                    <?php echo $total_news; ?> actualité<?php echo $total_news > 1 ? 's' : ''; ?> au total
                    <?php if ($total_pages > 1): ?>
                        - Page <?php echo $page; ?> sur <?php echo $total_pages; ?>
                    <?php endif; ?>
                </p>
            </header>
            
            <!-- Liste des actualités -->
            <div class="news-list">
                <?php if (!empty($news)): ?>
                    <?php foreach ($news as $item): ?>
                    <article class="news-item">
                        <div class="news-item-header">
                            <div class="news-date">📅 <?php echo date('d/m/Y', strtotime($item['created_at'])); ?></div>
                            <h2 class="news-title"><?php echo htmlspecialchars($item['title']); ?></h2>
                        </div>
                        
                        <div class="news-summary">
                            <?php echo htmlspecialchars($item['summary']); ?>
                        </div>
                        
                        <div class="news-actions">
                            <a href="detail_news.php?id=<?php echo $item['id']; ?>" class="read-more">
                                Cliquez ici pour plus de détail →
                            </a>
                        </div>
                    </article>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="no-news">
                        <h3>📭 Aucune actualité</h3>
                        <p>Aucune actualité n'a été publiée pour le moment.</p>
                        <a href="index.php" class="back-home">Retour à l'accueil</a>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Pagination -->
            <?php if ($total_pages > 1): ?>
            <nav class="pagination">
                <?php if ($page > 1): ?>
                    <a href="toutes_news.php?page=<?php echo $page - 1; ?>" class="page-link prev">← Précédent</a>
                <?php endif; ?>
                
                <div class="page-numbers">
                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <?php if ($i == $page): ?>
                            <span class="page-number current"><?php echo $i; ?></span>
                        <?php else: ?>
                            <a href="toutes_news.php?page=<?php echo $i; ?>" class="page-number"><?php echo $i; ?></a>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
                
                <?php if ($page < $total_pages): ?>
                    <a href="toutes_news.php?page=<?php echo $page + 1; ?>" class="page-link next">Suivant →</a>
                <?php endif; ?>
            </nav>
            <?php endif; ?>
            
            <!-- Retour -->
            <div class="archive-footer">
                <a href="index.php" class="back-to-home">← Retour à la page d'accueil</a>
            </div>
        </div>
    </main>
    
    <aside class="sidebar-right">
        <?php include 'video_sidebar.php'; ?>
    </aside>
</div>

<style>


.archive-header {
    margin: 5px 0 50px 0;
    padding: 30px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    text-align: center;
    border-radius: 15px;
}

.archive-header h1 {
    margin: 0 0 10px 0;
    font-size: 2.2rem;
}

.archive-info {
    margin: 0;
    opacity: 0.9;
    font-size: 1.1rem;
}

.news-list {
    padding: 0;
}

.news-summary {
    color: #555;
    line-height: 1.6;
    margin-bottom: 20px;
    font-size: 1.05rem;
}

.read-more {
    color: #3498db;
    text-decoration: none;
    font-weight: 600;
    transition: color 0.3s;
}

.read-more:hover {
    color: #2980b9;
    text-decoration: underline;
}

.no-news {
    text-align: center;
    padding: 60px 30px;
    color: #7f8c8d;
}

.no-news h3 {
    margin-bottom: 15px;
    color: #2c3e50;
}

.back-home {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 20px;
    background: #3498db;
    color: white;
    text-decoration: none;
    border-radius: 5px;
}

.pagination {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 25px 30px;
    background: #f8f9fa;
    border-top: 1px solid #e9ecef;
}

.page-numbers {
    display: flex;
    gap: 8px;
}

.page-link {
    padding: 8px 16px;
    background: #3498db;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    transition: background 0.3s;
}

.page-link:hover {
    background: #2980b9;
}

.page-number {
    padding: 8px 12px;
    border: 1px solid #ddd;
    text-decoration: none;
    color: #333;
    border-radius: 5px;
    transition: all 0.3s;
}

.page-number:hover {
    background: #3498db;
    color: white;
    border-color: #3498db;
}

.page-number.current {
    background: #2c3e50;
    color: white;
    border-color: #2c3e50;
}

.archive-footer {
    padding: 25px 30px;
    text-align: center;
    border-top: 1px solid #ecf0f1;
}

.back-to-home {
    color: #3498db;
    text-decoration: none;
    font-weight: 600;
    font-size: 1.1rem;
}

.back-to-home:hover {
    text-decoration: underline;
}
</style>

<?php include 'footer.php'; ?>