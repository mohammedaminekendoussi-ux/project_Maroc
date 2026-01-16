<?php
// villes.php
?>
<?php include 'header.php'; ?>

<div class="main-container">
    <aside class="sidebar-left">
        <?php include 'menu_lateral.php'; ?>
    </aside>
    
    <main class="main-content">
        <h1>🏙️ Index des Villes</h1>
        <p class="page-description">Découvrez les villes principales du Royaume du Maroc</p>
        
        <!-- Tableau des villes -->
        <div class="cities-section">
            <h2>📊 Données des Villes</h2>
            <table class="cities-table">
                <thead>
                    <tr>
                        <th>Ville</th>
                        <th>Superficie</th>
                        <th>Population</th>
                        <th>Région</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Casablanca</strong></td>
                        <td>387 km²</td>
                        <td>3.36 millions</td>
                        <td>Casablanca-Settat</td>
                    </tr>
                    <tr>
                        <td><strong>Fès</strong></td>
                        <td>320 km²</td>
                        <td>1.15 million</td>
                        <td>Fès-Meknès</td>
                    </tr>
                    <tr>
                        <td><strong>Marrakech</strong></td>
                        <td>230 km²</td>
                        <td>966,000</td>
                        <td>Marrakech-Safi</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- Galerie photos -->
        <div class="gallery-section">
            <h2>📸 Galerie Photos</h2>
            <div class="gallery-grid">
                <div class="gallery-item">
                    <img src="assets/images/casablanca.jpg" alt="Casablanca" style="width: 100%; height: 200px; object-fit: cover; background: #eee;">
                    <div class="gallery-caption">Casablanca - Ville moderne</div>
                </div>
                <div class="gallery-item">
                    <img src="assets/images/fes.jpg" alt="Fès" style="width: 100%; height: 200px; object-fit: cover; background: #eee;">
                    <div class="gallery-caption">Fès - Ville impériale</div>
                </div>
                <div class="gallery-item">
                    <img src="assets/images/marrakech.jpg" alt="Marrakech" style="width: 100%; height: 200px; object-fit: cover; background: #eee;">
                    <div class="gallery-caption">Marrakech - Ville ocre</div>
                </div>
                <div class="gallery-item">
                    <img src="assets/images/rabat.jpg" alt="Rabat" style="width: 100%; height: 200px; object-fit: cover; background: #eee;">
                    <div class="gallery-caption">Rabat - Capitale</div>
                </div>
                <div class="gallery-item">
                    <img src="assets/images/tanger.jpg" alt="Tanger" style="width: 100%; height: 200px; object-fit: cover; background: #eee;">
                    <div class="gallery-caption">Tanger - Porte de l'Afrique</div>
                </div>
            </div>
        </div>
    </main>
    
    <aside class="sidebar-right">
        <?php include 'video_sidebar.php'; ?>
    </aside>
</div>

<style>
.cities-section {
    margin-bottom: 40px;
}

.cities-table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.cities-table th {
    background: #34495e;
    color: white;
    padding: 15px;
    text-align: left;
    font-weight: 600;
}

.cities-table td {
    padding: 15px;
    border-bottom: 1px solid #ecf0f1;
}

.cities-table tr:hover {
    background: #f8f9fa;
}

.cities-table strong {
    color: #2c3e50;
}

.gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-top: 20px;
}

.gallery-item {
    background: white;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    transition: transform 0.3s;
}

.gallery-item:hover {
    transform: translateY(-5px);
}

.gallery-caption {
    padding: 15px;
    text-align: center;
    background: #f8f9fa;
    font-weight: 600;
    color: #2c3e50;
}
</style>

<?php include 'footer.php'; ?>