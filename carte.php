<?php
// carte.php
?>
<?php include 'header.php'; ?>

<div class="main-container">
    <aside class="sidebar-left">
        <?php include 'menu_lateral.php'; ?>
    </aside>
    
    <main class="main-content">
        <h1>🗺️ Carte du Maroc</h1>
        <p class="page-description">Explorez la géographie et localisez les principales villes du Royaume</p>
        
        <!-- Carte Google Maps intégrée -->
        <div class="map-container">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13938009.754153574!2d-13.721337399999998!3d31.79170255!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd0b88619651c58d%3A0xd9e502081eb9dc01!2sMaroc!5e0!3m2!1sfr!2sma!4v1701360000000!5m2!1sfr!2sma" 
                width="100%" 
                height="500" 
                style="border:0; border-radius: 10px;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
        
        <!-- Informations géographiques -->
        <div class="geo-info">
            <h2>🌍 Informations Géographiques</h2>
            <div class="info-grid">
                <div class="info-card">
                    <h3>📍 Localisation</h3>
                    <p>Afrique du Nord, bordé par l'océan Atlantique et la mer Méditerranée</p>
                </div>
                <div class="info-card">
                    <h3>📏 Superficie</h3>
                    <p>710,850 km² (dont 250 km² d'eaux territoriales)</p>
                </div>
                <div class="info-card">
                    <h3>🏔️ Point Culminant</h3>
                    <p>Jbel Toubkal (4,167 m) - Haut Atlas</p>
                </div>
                <div class="info-card">
                    <h3>🏙️ Capitale</h3>
                    <p>Rabat - Ville impériale et capitale administrative</p>
                </div>
            </div>
        </div>
        
        <!-- Villes principales -->
        <div class="cities-map">
            <h2>🏙️ Villes Principales</h2>
            <div class="cities-list">
                <div class="city-item">
                    <span class="city-marker">🔴</span>
                    <span class="city-name">Rabat</span>
                    <span class="city-desc">- Capitale administrative</span>
                </div>
                <div class="city-item">
                    <span class="city-marker">🔵</span>
                    <span class="city-name">Casablanca</span>
                    <span class="city-desc">- Capitale économique</span>
                </div>
                <div class="city-item">
                    <span class="city-marker">🟢</span>
                    <span class="city-name">Fès</span>
                    <span class="city-desc">- Capitale culturelle et spirituelle</span>
                </div>
                <div class="city-item">
                    <span class="city-marker">🟡</span>
                    <span class="city-name">Marrakech</span>
                    <span class="city-desc">- Ville touristique majeure</span>
                </div>
            </div>
        </div>
    </main>
    
    <aside class="sidebar-right">
        <?php include 'video_sidebar.php'; ?>
    </aside>
</div>

<style>
.map-container {
    margin-bottom: 40px;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.geo-info {
    margin-bottom: 40px;
}

.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-top: 20px;
}

.info-card {
    background: white;
    padding: 25px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    border-left: 4px solid #3498db;
}

.info-card h3 {
    color: #2c3e50;
    margin-bottom: 10px;
    font-size: 1.1rem;
}

.info-card p {
    color: #555;
    line-height: 1.5;
}

.cities-list {
    background: white;
    padding: 25px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.city-item {
    padding: 12px 0;
    border-bottom: 1px solid #ecf0f1;
    display: flex;
    align-items: center;
    gap: 15px;
}

.city-item:last-child {
    border-bottom: none;
}

.city-marker {
    font-size: 1.2rem;
}

.city-name {
    font-weight: 600;
    color: #2c3e50;
    min-width: 120px;
}

.city-desc {
    color: #7f8c8d;
}
</style>

<?php include 'footer.php'; ?>