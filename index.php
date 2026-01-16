<?php
// index.php - Version avec nouvelle structure
require_once 'config/database.php';

// Récupérer les 3 dernières actualités
$news = $conn->query("SELECT * FROM news ORDER BY created_at DESC LIMIT 3")->fetch_all(MYSQLI_ASSOC);
?>
<?php include 'header.php'; ?>

<div class="main-container">
    <!-- Menu latéral gauche -->
    <aside class="sidebar-left">
        <?php include 'menu_lateral.php'; ?>
    </aside>
    
    <!-- Contenu central -->
    <main class="main-content">
        <section class="welcome-section">
            <h2>Bienvenue au Maroc</h2>
            <p>Découvrez un pays aux mille facettes, riche en histoire et en traditions.</p>
        </section>
        
        <!-- Galerie coups de cœur -->
        <section class="gallery-section">
            <h3>🌟 Coups de Cœur</h3>
            <div class="gallery-grid">
                <div class="gallery-item">
                    <img src="assets/images/marrakech-place.jpg" alt="Marrakech" style="width: 100%; height: 200px; object-fit: cover; background: #eee;">
                    <div class="gallery-caption">
                        <h4>Marrakech</h4>
                        <p>La ville ocre aux mille secrets</p>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="assets/images/chefchaouen-place.jpg" alt="Chefchaouen" style="width: 100%; height: 200px; object-fit: cover; background: #eee;">
                    <div class="gallery-caption">
                        <h4>Chefchaouen</h4>
                        <p>La perle bleue du Rif</p>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="assets/images/sahara-place.jpg" alt="Sahara" style="width: 100%; height: 200px; object-fit: cover; background: #eee;">
                    <div class="gallery-caption">
                        <h4>Sahara</h4>
                        <p>Les dunes infinies du désert</p>
                    </div>
                </div>
            </div>
        </section>
        
        
        
    </main>
    
    <!-- Sidebar droite avec vidéo -->
    <aside class="sidebar-right">
        <?php include 'video_sidebar.php'; ?>
    </aside>
</div> 

<style>
/* Styles pour la page d'accueil - Centre */
.welcome-section {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 50px 40px;
    text-align: center;
    border-radius: 15px;
    margin-bottom: 40px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.welcome-section h2 {
    font-size: 2.5rem;
    margin-bottom: 20px;
    font-weight: 700;
}

.welcome-section p {
    font-size: 1.3rem;
    opacity: 0.9;
    line-height: 1.6;
    max-width: 800px;
    margin: 0 auto;
}

/* Galerie Coups de Cœur */
.gallery-section {
    margin-bottom: 50px;
}

.gallery-section h3 {
    color: #2c3e50;
    font-size: 1.8rem;
    margin-bottom: 30px;
    text-align: center;
    padding-bottom: 15px;
    border-bottom: 3px solid #3498db;
    display: inline-block;
}

.gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 25px;
    margin-top: 30px;
}

.gallery-item {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
    border: 1px solid #e9ecef;
}

.gallery-item:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.15);
}

.gallery-item img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.gallery-caption {
    padding: 20px;
    text-align: center;
    background: white;
}

.gallery-caption h4 {
    color: #2c3e50;
    margin-bottom: 10px;
    font-size: 1.2rem;
}

.gallery-caption p {
    color: #7f8c8d;
    font-size: 0.95rem;
    line-height: 1.5;
}


/* Responsive */
@media (max-width: 768px) {
    .welcome-section {
        padding: 30px 20px;
    }
    
    .welcome-section h2 {
        font-size: 2rem;
    }
    
    .welcome-section p {
        font-size: 1.1rem;
    }
    
    .news-actions {
        flex-direction: column;
        text-align: center;
    }
    
    .news-buttons {
        justify-content: center;
    }
}
</style>

<?php include 'footer.php'; ?>