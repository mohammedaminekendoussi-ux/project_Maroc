<?php
// liens_utiles.php
?>
<?php include 'header.php'; ?>

<div class="main-container">
    <aside class="sidebar-left">
        <?php include 'menu_lateral.php'; ?>
    </aside>
    
    <main class="main-content">
        <h1>🔗 Liens Utiles</h1>
        <p class="page-description">Accédez aux sites officiels des établissements publics marocains</p>
        
        <div class="links-grid">
            <div class="link-card">
                <div class="link-logo">
                    <img src="assets/images/logo-gouvernement.png" alt="Gouvernement Marocain" style="width: 80px; height: 80px; object-fit: contain; background: #f8f9fa; padding: 10px; border-radius: 8px;">
                </div>
                <div class="link-info">
                    <h3>Portail du Gouvernement</h3>
                    <p>Site officiel du gouvernement marocain - Informations institutionnelles et services publics</p>
                    <a href="https://www.maroc.ma" target="_blank" class="link-btn">Visiter le site →</a>
                </div>
            </div>
            
            <div class="link-card">
                <div class="link-logo">
                    <img src="assets/images/logo-tourisme.png" alt="Office du Tourisme" style="width: 80px; height: 80px; object-fit: contain; background: #f8f9fa; padding: 10px; border-radius: 8px;">
                </div>
                <div class="link-info">
                    <h3>Office National du Tourisme</h3>
                    <p>Découvrez les destinations, activités et informations touristiques du Maroc</p>
                    <a href="https://www.visitmorocco.com" target="_blank" class="link-btn">Visiter le site →</a>
                </div>
            </div>
            
            <div class="link-card">
                <div class="link-logo">
                    <img src="assets/images/logo-culture.png" alt="Ministère de la Culture" style="width: 80px; height: 80px; object-fit: contain; background: #f8f9fa; padding: 10px; border-radius: 8px;">
                </div>
                <div class="link-info">
                    <h3>Ministère de la Culture</h3>
                    <p>Patrimoine culturel, événements artistiques et programmes culturels nationaux</p>
                    <a href="https://www.culture.gov.ma" target="_blank" class="link-btn">Visiter le site →</a>
                </div>
            </div>
        </div>
        
        <!-- Liens supplémentaires -->
        <div class="additional-links">
            <h2>🌐 Autres Ressources Utiles</h2>
            <div class="quick-links">
                <a href="https://www.bkam.ma" target="_blank" class="quick-link">
                    <span class="link-icon">🏦</span>
                    <span class="link-text">Bank Al-Maghrib</span>
                </a>
                <a href="https://www.equipement.gov.ma" target="_blank" class="quick-link">
                    <span class="link-icon">🔬</span>
                    <span class="link-text">Office National de Sécurité Sanitaire</span>
                </a>
                <a href="https://www.men.gov.ma" target="_blank" class="quick-link">
                    <span class="link-icon">🎓</span>
                    <span class="link-text">Ministère de l'Éducation Nationale</span>
                </a>
                <a href="https://www.sante.gov.ma" target="_blank" class="quick-link">
                    <span class="link-icon">🏥</span>
                    <span class="link-text">Ministère de la Santé</span>
                </a>
            </div>
        </div>
    </main>
    
    <aside class="sidebar-right">
        <?php include 'video_sidebar.php'; ?>
    </aside>
</div>

<style>
.links-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 25px;
    margin-bottom: 40px;
}

.link-card {
    display: grid;
    grid-template-columns: 100px 1fr;
    gap: 25px;
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 3px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s;
}

.link-card:hover {
    transform: translateY(-3px);
}

.link-logo {
    display: flex;
    align-items: center;
    justify-content: center;
}

.link-info h3 {
    color: #2c3e50;
    margin-bottom: 10px;
    font-size: 1.3rem;
}

.link-info p {
    color: #555;
    line-height: 1.6;
    margin-bottom: 15px;
}

.link-btn {
    display: inline-block;
    background: #3498db;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    font-weight: 600;
    transition: background 0.3s;
}

.link-btn:hover {
    background: #2980b9;
}

.additional-links {
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 3px 15px rgba(0,0,0,0.1);
}

.quick-links {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 15px;
    margin-top: 20px;
}

.quick-link {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px;
    background: #f8f9fa;
    border-radius: 8px;
    text-decoration: none;
    color: #2c3e50;
    transition: all 0.3s;
    border: 1px solid #e9ecef;
}

.quick-link:hover {
    background: #3498db;
    color: white;
    transform: translateX(5px);
}

.link-icon {
    font-size: 1.5rem;
}

.link-text {
    font-weight: 500;
}
</style>

<?php include 'footer.php'; ?>