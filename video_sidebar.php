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

        <!-- Newsletter Modal -->
        <div id="newsletterModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h4>📧 Newsletter</h4>
                <p>Restez informé de nos actualités</p>
                
                <!-- Message de confirmation/erreur -->
                <div id="newsletterMessage" style="display: none; padding: 10px; margin: 10px 0; border-radius: 5px; text-align: center;"></div>
                
                <form id="newsletterForm" class="newsletter-form">
                    <input type="hidden" name="action" value="subscribe">
                    <input type="text" name="name" placeholder="Votre nom" required>
                    <input type="email" name="email" placeholder="Votre email" required>
                    <button type="submit" id="subscribeBtn">S'abonner</button>
                </form>
            </div>
        </div> 
    </section>
</div>

<script>
// Gestion de la modal newsletter
const modal = document.getElementById("newsletterModal");
const openBtn = document.getElementById("open");
const closeBtn = document.querySelector(".close");
const newsletterForm = document.getElementById("newsletterForm");
const subscribeBtn = document.getElementById("subscribeBtn");
const newsletterMessage = document.getElementById("newsletterMessage");

// Ouvrir la modal
openBtn.onclick = (e) => {
    e.preventDefault();
    modal.style.display = "block";
    // Réinitialiser le formulaire et les messages
    newsletterForm.reset();
    newsletterMessage.style.display = "none";
    newsletterMessage.innerHTML = "";
};

// Fermer la modal
closeBtn.onclick = () => {
    modal.style.display = "none";
    newsletterForm.reset();
    newsletterMessage.style.display = "none";
};

// Fermer en cliquant en dehors
window.onclick = (e) => {
    if (e.target === modal) {
        modal.style.display = "none";
        newsletterForm.reset();
        newsletterMessage.style.display = "none";
    }
};

// Soumission du formulaire newsletter
newsletterForm.addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const originalBtnText = subscribeBtn.innerHTML;
    
    // Désactiver le bouton pendant l'envoi
    subscribeBtn.disabled = true;
    subscribeBtn.innerHTML = 'Inscription...';
    
    // Masquer les anciens messages
    newsletterMessage.style.display = 'none';
    newsletterMessage.className = '';
    
    try {
        const formData = new FormData(this);
        
        const response = await fetch('process.php', {
            method: 'POST',
            body: formData
        });
        
        const result = await response.text();
        
        if (result.trim() === 'success') {
            // SUCCÈS
            newsletterMessage.innerHTML = `
                <div style="color: #27ae60; font-weight: 600;">
                    ✅ Inscription réussie !
                </div>
                <div style="font-size: 14px; color: #666; margin-top: 5px;">
                    Merci pour votre inscription à notre newsletter.
                </div>
            `;
            newsletterMessage.className = 'success-message';
            newsletterMessage.style.display = 'block';
            
            // Réinitialiser le formulaire après 2 secondes
            setTimeout(() => {
                newsletterForm.reset();
                newsletterMessage.style.display = 'none';
                
                // Fermer automatiquement la modal après 3 secondes
                setTimeout(() => {
                    modal.style.display = 'none';
                }, 1000);
            }, 2000);
            
        } else if (result.trim() === 'exists') {
            // EMAIL EXISTE DÉJÀ
            newsletterMessage.innerHTML = `
                <div style="color: #f39c12; font-weight: 600;">
                    ⚠️ Déjà inscrit
                </div>
                <div style="font-size: 14px; color: #666; margin-top: 5px;">
                    Cet email est déjà inscrit à notre newsletter.
                </div>
            `;
            newsletterMessage.className = 'warning-message';
            newsletterMessage.style.display = 'block';
            
        } else if (result.trim() === 'error') {
            // ERREUR
            newsletterMessage.innerHTML = `
                <div style="color: #e74c3c; font-weight: 600;">
                    ❌ Erreur d'inscription
                </div>
                <div style="font-size: 14px; color: #666; margin-top: 5px;">
                    Une erreur est survenue. Veuillez réessayer.
                </div>
            `;
            newsletterMessage.className = 'error-message';
            newsletterMessage.style.display = 'block';
            
        } else {
            throw new Error('Réponse inattendue du serveur.');
        }
        
    } catch (error) {
        // Erreur de connexion
        newsletterMessage.innerHTML = `
            <div style="color: #e74c3c; font-weight: 600;">
                ❌ Erreur de connexion
            </div>
            <div style="font-size: 14px; color: #666; margin-top: 5px;">
                Impossible de se connecter au serveur.
            </div>
        `;
        newsletterMessage.className = 'error-message';
        newsletterMessage.style.display = 'block';
        
        console.error('Erreur:', error);
        
    } finally {
        // Réactiver le bouton
        subscribeBtn.disabled = false;
        subscribeBtn.innerHTML = originalBtnText;
    }
});
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
    font-size: 0.9rem;
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
    gap: 5px;
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

/* Modal Newsletter */
.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5);
    backdrop-filter: blur(3px);
}

.modal-content {
    background: white;
    width: 350px;
    max-width: 90%;
    padding: 30px;
    border-radius: 15px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    animation: modalFadeIn 0.3s ease-out;
    box-shadow: 0 20px 40px rgba(0,0,0,0.2);
}

.modal-content h4 {
    color: #2c3e50;
    font-size: 1.5rem;
    margin-bottom: 5px;
    text-align: center;
}

.modal-content p {
    color: #7f8c8d;
    text-align: center;
    margin-bottom: 25px;
    font-size: 0.95rem;
}

.newsletter-form input {
    width: 100%;
    padding: 12px 15px;
    margin: 8px 0;
    border: 2px solid #e9ecef;
    border-radius: 8px;
    font-size: 14px;
    background: #f8f9fa;
    transition: all 0.3s ease;
    box-sizing: border-box;
}

.newsletter-form input:focus {
    outline: none;
    border-color: #3498db;
    background: white;
    box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
}

.newsletter-form button {
    width: 100%;
    padding: 14px;
    background: linear-gradient(135deg, #27ae60 0%, #229954 100%);
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-top: 10px;
    box-shadow: 0 4px 15px rgba(39, 174, 96, 0.3);
}

.newsletter-form button:hover {
    background: linear-gradient(135deg, #229954 0%, #1e8449 100%);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(39, 174, 96, 0.4);
}

.newsletter-form button:disabled {
    opacity: 0.6;
    cursor: not-allowed;
    transform: none !important;
}

.close {
    position: absolute;
    right: 15px;
    top: 15px;
    font-size: 24px;
    cursor: pointer;
    color: #7f8c8d;
    background: none;
    border: none;
    padding: 5px;
    line-height: 1;
}

.close:hover {
    color: #e74c3c;
}

/* Styles pour les messages */
.success-message {
    background-color: rgba(39, 174, 96, 0.1);
    border: 1px solid #27ae60;
    color: #27ae60;
    animation: fadeIn 0.5s ease;
}

.warning-message {
    background-color: rgba(243, 156, 18, 0.1);
    border: 1px solid #f39c12;
    color: #f39c12;
    animation: fadeIn 0.5s ease;
}

.error-message {
    background-color: rgba(231, 76, 60, 0.1);
    border: 1px solid #e74c3c;
    color: #e74c3c;
    animation: fadeIn 0.5s ease;
}

@keyframes modalFadeIn {
    from { opacity: 0; transform: translate(-50%, -60%); }
    to { opacity: 1; transform: translate(-50%, -50%); }
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Responsive */
@media (max-width: 768px) {
    .modal-content {
        width: 90%;
        padding: 25px;
    }
    
    .news-actions {
        flex-direction: column;
        align-items: stretch;
        text-align: center;
    }
    
    .all-news-link {
        margin-bottom: 10px;
    }
    
    .news-buttons {
        justify-content: center;
    }
}
</style>