<?php
// sites_monuments.php
?>
<?php include 'header.php'; ?>

<div class="main-container">
    <aside class="sidebar-left">
        <?php include 'menu_lateral.php'; ?>
    </aside>
    
    <main class="main-content">
        <h1>🕌 Sites et Monuments</h1>
        <p class="page-description">Découvrez le patrimoine historique et culturel du Maroc</p>
        
        <div class="monuments-grid">
            <div class="monument-card">
                <div class="monument-image">
                    <img src="assets/images/koutoubia.jpg" alt="Mosquée Koutoubia" style="width: 100%; height: 200px; object-fit: cover; background: #eee;">
                </div>
                <div class="monument-info">
                    <h3>Mosquée Koutoubia - Marrakech</h3>
                    <p>Symbole de Marrakech, cette mosquée du XIIe siècle est un chef-d'œuvre de l'architecture almohade avec son minaret de 77 mètres.</p>
                    <div class="monument-details">
                        <span class="detail">🏛️ Architecture Almohade</span>
                        <span class="detail">📅 XIIe Siècle</span>
                    </div>
                </div>
            </div>
            
            <div class="monument-card">
                <div class="monument-image">
                    <img src="assets/images/hassan2.jpg" alt="Mosquée Hassan II" style="width: 100%; height: 200px; object-fit: cover; background: #eee;">
                </div>
                <div class="monument-info">
                    <h3>Mosquée Hassan II - Casablanca</h3>
                    <p>Plus grande mosquée d'Afrique, son minaret de 210 mètres est le plus haut du monde. Partiellement construite sur la mer.</p>
                    <div class="monument-details">
                        <span class="detail">🏛️ Architecture Moderne</span>
                        <span class="detail">📅 1993</span>
                    </div>
                </div>
            </div>
            
            <div class="monument-card">
                <div class="monument-image">
                    <img src="assets/images/ksar-aitbenhaddou.jpg" alt="Ksar Aït Benhaddou" style="width: 100%; height: 200px; object-fit: cover; background: #eee;">
                </div>
                <div class="monument-info">
                    <h3>Ksar Aït Benhaddou</h3>
                    <p>Village fortifié classé UNESCO, situé sur les pentes sud du Haut Atlas. Célèbre pour avoir servi de décor à de nombreux films.</p>
                    <div class="monument-details">
                        <span class="detail">🏛️ Architecture Berbère</span>
                        <span class="detail">🏆 Site UNESCO</span>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <aside class="sidebar-right">
        <?php include 'video_sidebar.php'; ?>
    </aside>
</div>

<style>
.page-description {
    color: #7f8c8d;
    margin-bottom: 30px;
    font-size: 1.1rem;
}

.monuments-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 30px;
}

.monument-card {
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 3px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s;
}

.monument-card:hover {
    transform: translateY(-5px);
}

.monument-info {
    padding: 25px;
}

.monument-info h3 {
    color: #2c3e50;
    margin-bottom: 15px;
    font-size: 1.3rem;
}

.monument-info p {
    color: #555;
    line-height: 1.6;
    margin-bottom: 15px;
}

.monument-details {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}

.detail {
    background: #ecf0f1;
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 0.9rem;
    color: #2c3e50;
}
</style>

<?php include 'footer.php'; ?>