<?php
// index.php - Version avec nouvelle structure
require_once 'config/database.php';

// Récupérer les 3 dernières actualités
$news = $conn->query("SELECT * FROM news ORDER BY created_at DESC LIMIT 3")->fetch_all(MYSQLI_ASSOC);
?>
<div class="video-sidebar">
    <div class="video-container">
        <h3>🎥 Découverte du Maroc</h3>
        <div class="video-wrapper">
            <video width="100%" height="auto" controls poster="assets/images/video-poster.jpg">
                <source src="assets/videos/maroc.mp4" type="video/mp4">
                Votre navigateur ne supporte pas la vidéo.
            </video>
        </div>
        <p class="video-description">Documentaire sur la culture marocaine</p>
    </div>

    <!-- Actualités dynamiques -->
        <section class="news-section">
            <h3>📰 Dernières Actualités</h3>
            <?php if (!empty($news)): ?>
                <?php foreach ($news as $item): ?>
                <div class="news-item">
                    <div class="news-date">📅 <?php echo date('d/m/Y', strtotime($item['created_at'])); ?></div>
                    <div class="news-title"><?php echo htmlspecialchars($item['title']); ?></div>
                    <a href="detail_news.php?id=<?php echo $item['id']; ?>" class="news-link">Plus de détail.</a>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="no-news">Aucune actualité pour le moment.</p>
            <?php endif; ?>
            
            <div class="news-actions">
                <a href="toutes_news.php" class="all-news-link">>> Toutes les news</a>
                <div class="news-buttons">
                    <a href="#newsletter" id="open" class="news-btn">S'inscrire à la newsletter</a>
                    <a href="login.php" class="news-btn">Se connecter</a>
                </div>
            </div>

            <!-- Newsletter -->
    <div id="newsletterModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
        <h4>📧 Newsletter</h4>
        <p>Restez informé de nos actualités</p>
        <form action="process.php" method="POST" class="newsletter-form">
            <input type="hidden" name="action" value="subscribe">
            <input type="text" name="name" placeholder="Votre nom" required>
            <input type="email" name="email" placeholder="Votre email" required>
            <button type="submit">S'abonner</button>
        </form>
        </div>
    </div> 
        </section>
    
    
</div>
<script>
  const modal = document.getElementById("newsletterModal");
  const openBtn = document.getElementById("open");
  const closeBtn = document.querySelector(".close");

  openBtn.onclick = () => {
    modal.style.display = "block";
  };

  closeBtn.onclick = () => {
    modal.style.display = "none";
  };

  window.onclick = (e) => {
    if (e.target === modal) {
      modal.style.display = "none";
    }
  };
</script>
<style>
    /* Section Actualités */
.news-section {
    background: white;
    border-radius: 15px;
    padding: 20px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    border: 1px solid #e9ecef;
}

.news-section h3 {
    color: #2c3e50;
    font-size: 1.4rem;
    margin-bottom: 30px;
    text-align: center;
    padding-bottom: 15px;
    border-bottom: 3px solid #e74c3c;
    display: inline-block;
}

.news-item {
    background: #f8f9fa;
    padding: 10px 20px;
    border-radius: 10px;
    margin-bottom: 20px;
    border-left: 4px solid #3498db;
    transition: all 0.3s ease;
}

.news-item:hover {
    background: white;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transform: translateX(5px);
}

.news-date {
    color: #e74c3c;
    font-weight: 600;
    font-size: 0.8rem;
    margin-bottom: 5px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.news-title {
    color: #2c3e50;
    font-size: 02p.9rem;
    margin-bottom: 5px;
    font-weight: 600;
}

.news-link {
    color: #3498db;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.7rem;
    transition: color 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 5px;margin-bottom: 5px;
    margin-bottom: 5px;
}

.news-link:hover {
    color: #2980b9;
    text-decoration: underline;
}

.no-news {
    text-align: center;
    color: #7f8c8d;
    font-style: italic;
    padding: 30px;
}

.news-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 10px;
    padding-top: 10px;
    border-top: 2px solid #ecf0f1;
    flex-wrap: wrap;
    gap: 15px;
}

.all-news-link {
    background: #3498db;
    color: white;
    padding: 12px 25px;
    border-radius: 25px;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.7rem;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3);
}

.all-news-link:hover {
    background: #2980b9;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(52, 152, 219, 0.4);
}

.news-buttons {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}

.news-btn {
    background: #27ae60;
    color: white;
    padding: 12px 20px;
    border-radius: 25px;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.7rem;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(39, 174, 96, 0.3);
}

.news-btn:hover {
    background: #229954;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(39, 174, 96, 0.4);
}


.modal {
  display: none;
  position: fixed;
  z-index: 1000;
  right: 100px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background: rgba(0,0,0,0.5);
}

.modal-content {
  background: white;
  width: 320px;
  padding: 20px;
  border-radius: 10px;
  position: relative;
  margin: 10% auto;
  animation: fadeIn 0.3s ease-in-out;
}

.modal-content input {
  width: 100%;
  margin: 8px 0;
  padding: 8px;
}

.modal-content button {
  width: 100%;
  padding: 10px;
  background: #2d8cff;
  color: white;
  border: none;
  border-radius: 5px;
}

.close {
  position: absolute;
  right: 12px;
  top: 8px;
  font-size: 22px;
  cursor: pointer;
}

@keyframes fadeIn {
  from {opacity: 0; transform: scale(0.9);}
  to {opacity: 1; transform: scale(1);}
}
</style>