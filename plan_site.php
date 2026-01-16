<?php
// plan_site.php
?>
<?php include 'header.php'; ?>

<div class="main-container">
    <aside class="sidebar-left">
        <?php include 'menu_lateral.php'; ?>
    </aside>
    
    <main class="main-content">
        <section class="plan">
            <h1>Plan du Site</h1>
            <p>Découvrez comment le site travail.</p>
        </section>
        
        <div class="site-map">
            <div class="map-section">
                <h2>🌐 Navigation Principale</h2>
                <ul>
                    <li><strong>Accueil</strong> - Page principale avec actualités et galerie</li>
                    <li><strong>Plan de site</strong> - Cette page</li>
                    <li><strong>Qui sommes-nous ?</strong> - Informations sur les créateurs</li>
                    <li><strong>Contact</strong> - Formulaire de contact</li>
                    <li><strong>Connexion</strong> - Accès administration</li>
                </ul>
            </div>
            
            <div class="map-section">
                <h2>🏛️ Découverte du Maroc</h2>
                <ul>
                    <li><strong>Sites et Monuments</strong> - Patrimoine historique</li>
                    <li><strong>Index des villes</strong> - Villes principales du Maroc</li>
                    <li><strong>Carte interactive</strong> - Localisation géographique</li>
                    <li><strong>Liens utiles</strong> - Établissements publics</li>
                </ul>
            </div>
            
            <div class="map-section">
                <h2>📰 Actualités</h2>
                <ul>
                    <li><strong>Dernières news</strong> - Sur la page d'accueil</li>
                    <li><strong>Toutes les news</strong> - Archive complète</li>
                    <li><strong>Newsletter</strong> - Abonnement aux actualités</li>
                </ul>
            </div>
            
            <div class="map-section">
                <h2>🔧 Administration</h2>
                <ul>
                    <li><strong>Gestion des actualités</strong> - Ajout/modification/suppression</li>
                    <li><strong>Gestion des abonnés</strong> - Liste des inscrits</li>
                    <li><strong>Envoi de newsletter</strong> - Communication massive</li>
                </ul>
            </div>
        </div>
    </main>
    
    <aside class="sidebar-right">
        <?php include 'video_sidebar.php'; ?>
    </aside>
</div>
<style>
.plan {
    background: linear-gradient(135deg, #e7a03c 0%, #c06e2b 100%);
    color: white;
    padding: 40px 30px;
    text-align: center;
    border-radius: 15px;
    margin-bottom: 40px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.plan h1 {
    font-size: 2.2rem;
    margin-bottom: 10px;
    font-weight: 700;
}

.plan p {
    font-size: 1.1rem;
    opacity: 0.9;
    margin: 0;
}
.site-map{
    padding: 10px 40px;
}
</style>

<?php include 'footer.php'; ?>