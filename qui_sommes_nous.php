<?php
// qui_sommes_nous.php
?>
<?php include 'header.php'; ?>

<div class="main-container">
    <aside class="sidebar-left">
        <?php include 'menu_lateral.php'; ?>
    </aside>
    
    <main class="main-content">
        <section class="QUI">
            <h1>Qui sommes-nous ?</h1>
            <p>Le persone qui a realiser le site.</p>
        </section>
        
        <div class="team-section">
            <div class="team-member">
                <div class="member-photo">
                    <img src="assets/images/etudiant.png" alt="Étudiant 1" style="width: 200px; height: 200px; border-radius: 50%; object-fit: cover; background: #eee;">
                </div>
                <div class="member-info">
                    <h3>Kendoussi Mohammed Amine</h3>
                    <p><strong>CNE:</strong> N147049484</p>
                    <p><strong>Email: </strong>mohammedamine.kendoussi@usmba.ac.ma</p>
                    <p><strong>Filière:</strong> Informatique</p>
                </div>
            </div>
            
        </div>
        
        <div class="project-info">
            <h2>À propos du projet</h2>
            <p>Ce site web a été réalisé dans le cadre du module <strong>Techniques Web et Multimédia</strong> de la LST Informatique.</p>
            <p><strong>Année universitaire:</strong> 2025/2026</p>
            <p><strong>Établissement:</strong> Faculté des Sciences et Techniques de Fès</p>
            <p><strong>Encadrant:</strong> Ouzaref</p>
        </div>
    </main>
    
    <aside class="sidebar-right">
        <?php include 'video_sidebar.php'; ?>
    </aside>
</div>

<style>
.QUI {
    background: linear-gradient(135deg, #3c6ae7 0%, #103b6f 100%);
    color: white;
    padding: 40px 30px;
    text-align: center;
    border-radius: 15px;
    margin-bottom: 40px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.QUI h1 {
    font-size: 2.2rem;
    margin-bottom: 10px;
    font-weight: 700;
}

.QUI p {
    font-size: 1.1rem;
    opacity: 0.9;
    margin: 0;
}

.team-section {
    position: relative;
    grid-template-columns: 1fr 1fr;
    gap: 0;
    margin:  0;
}

.team-member {
    
    text-align: center;
    padding: 30px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.member-photo {
    margin-bottom: 20px;
}

.member-info h3 {
    color: #2c3e50;
    margin-bottom: 15px;
}

.member-info p {
    margin: 8px 0;
    color: #555;
}

.project-info {
    background: #f8f9fa;
    padding: 30px;
    border-radius: 10px;
    margin-top: 40px;
}

.project-info h2 {
    color: #2c3e50;
    margin-bottom: 20px;
}
</style>

<?php include 'footer.php'; ?>