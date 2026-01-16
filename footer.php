<?php
// footer.php - Version design amélioré
?>
    </div> <!-- Fin du main-wrapper -->

    <footer class="main-footer">
        <div class="footer-content">
            <div class="footer-links">
                <a href="index.php">Accueil</a>
                <a href="plan_site.php">Plan du site</a>
                <a href="qui_sommes_nous.php">À propos</a>
                <a href="contact.php">Contact</a>
                <a href="login.php">Administration</a>
            </div>
            <div class="copyright">
                <p>&copy; 2024 Royaume du Maroc - Projet Techniques Web. Tous droits réservés.</p>
                <p>Faculté des Sciences et Techniques de Fès - LST Informatique</p>
            </div>
        </div>
    </footer>

    <!-- Scripts globaux -->
    <script>
        // Animation au scroll
        document.addEventListener('DOMContentLoaded', function() {
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            // Animer les sections au scroll
            document.querySelectorAll('.sidebar-section, .video-container, .newsletter-sidebar').forEach(function(el) {
                el.style.opacity = '0';
                el.style.transform = 'translateY(20px)';
                el.style.transition = 'all 0.6s ease';
                observer.observe(el);
            });
        });

        // Amélioration des formulaires
        document.querySelectorAll('input, textarea').forEach(function(input) {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });
            
            input.addEventListener('blur', function() {
                if (!this.value) {
                    this.parentElement.classList.remove('focused');
                }
            });
        });
    </script>
</body>
</html>