<?php include 'header.php'; ?>

<div class="main-container">
    <aside class="sidebar-left">
        <?php include 'menu_lateral.php'; ?>
    </aside>
    
    <main class="main-content">
        <section class="contact-hero">
            <h1>Contactez-nous</h1>
            <p>Nous sommes à votre écoute pour toute question ou information</p>
        </section>
        
        <!-- Formulaire de contact (prend tout le centre) -->
        <div class="contact-form-full">
            <div class="form-header">
                <h2>📨 Envoyer un Message</h2>
                <p>Remplissez le formulaire ci-dessous pour nous contacter</p>
            </div>
            
            <!-- Zone pour les messages d'alerte -->
            <div id="formMessage" style="display: none; padding: 15px; margin: 20px 0; border-radius: 8px; text-align: center;"></div>
            
            <form id="contactForm" onsubmit="return submitContactForm(event)">
                <input type="hidden" name="action" value="contact">
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Votre nom complet</label>
                        <input type="text" id="name" name="name" placeholder="Entrez votre nom complet" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Votre email</label>
                        <input type="email" id="email" name="email" placeholder="Entrez votre adresse email" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="subject">Sujet du message</label>
                    <input type="text" id="subject" name="subject" placeholder="Objet de votre message" required>
                </div>
                <div class="form-group">
                    <label for="message">Votre message</label>
                    <textarea id="message" name="message" placeholder="Décrivez votre demande en détail..." rows="8" required></textarea>
                </div>
                <button type="submit" class="submit-btn" id="submitBtn">Envoyer le Message</button>
            </form>
        </div>
        
        <!-- Informations de contact plus petites en bas -->
        <section class="contact-info-small-bottom">
            <h3>📞 Informations de Contact</h3>
            <div class="info-grid-small">
                <div class="info-item-small">
                    <span class="info-icon">📍</span>
                    <span class="info-text">Faculté des Sciences et Techniques, Fès</span>
                </div>
                <div class="info-item-small">
                    <span class="info-icon">📧</span>
                    <span class="info-text">contact@maroc-culture.ma</span>
                </div>
                <div class="info-item-small">
                    <span class="info-icon">📱</span>
                    <span class="info-text">+212 5 35 60 05 40</span>
                </div>
                <div class="info-item-small">
                    <span class="info-icon">🕒</span>
                    <span class="info-text">Lun-Ven: 8h30-18h00</span>
                </div>
            </div>
        </section>
    </main>
    
    <aside class="sidebar-right">
        <?php include 'video_sidebar.php'; ?>
    </aside>
</div>

<style>
/* Styles pour la page contact - Centre */
.contact-hero {
    background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
    color: white;
    padding: 40px 30px;
    text-align: center;
    border-radius: 15px;
    margin-bottom: 40px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.contact-hero h1 {
    font-size: 2.2rem;
    margin-bottom: 10px;
    font-weight: 700;
}

.contact-hero p {
    font-size: 1.1rem;
    opacity: 0.9;
    margin: 0;
}

/* Formulaire de contact (pleine largeur) */
.contact-form-full {
    background: white;
    padding: 50px;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    border: 1px solid #e9ecef;
    margin-bottom: 30px;
}

.form-header {
    text-align: center;
    margin-bottom: 40px;
}

.form-header h2 {
    color: #2c3e50;
    font-size: 2rem;
    margin-bottom: 10px;
    font-weight: 700;
}

.form-header p {
    color: #7f8c8d;
    font-size: 1.1rem;
    margin: 0;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 25px;
    margin-bottom: 25px;
}

.form-group {
    margin-bottom: 25px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    color: #2c3e50;
    font-weight: 600;
    font-size: 1rem;
}

.form-group input,
.form-group textarea {
    width: 100%;
    padding: 15px;
    border: 2px solid #e9ecef;
    border-radius: 8px;
    font-size: 16px;
    transition: all 0.3s ease;
    background: #f8f9fa;
    font-family: inherit;
}

.form-group input:focus,
.form-group textarea:focus {
    outline: none;
    border-color: #3498db;
    background: white;
    box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
}

.form-group textarea {
    resize: vertical;
    min-height: 200px;
}

.submit-btn {
    background: linear-gradient(135deg, #27ae60 0%, #229954 100%);
    color: white;
    padding: 16px 50px;
    border: none;
    border-radius: 25px;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(39, 174, 96, 0.3);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    display: block;
    margin: 0 auto;
    width: fit-content;
    min-width: 220px;
}

.submit-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(39, 174, 96, 0.4);
}

.submit-btn:disabled {
    opacity: 0.6;
    cursor: not-allowed;
    transform: none !important;
}

/* Informations de contact plus petites en bas */
.contact-info-small-bottom {
    background: #f8f9fa;
    padding: 25px 30px;
    border-radius: 10px;
    border: 1px solid #e9ecef;
    text-align: center;
}

.contact-info-small-bottom h3 {
    color: #2c3e50;
    font-size: 1.3rem;
    margin-bottom: 20px;
    font-weight: 600;
}

.info-grid-small {
    display: flex;
    justify-content: center;
    gap: 30px;
    flex-wrap: wrap;
}

.info-item-small {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 8px 15px;
    background: white;
    border-radius: 20px;
    border: 1px solid #e9ecef;
    transition: all 0.3s ease;
}

.info-item-small:hover {
    background: #3498db;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 3px 10px rgba(52, 152, 219, 0.3);
}

.info-icon {
    font-size: 1rem;
}

.info-text {
    font-size: 0.9rem;
    font-weight: 500;
    color: #2c3e50;
}

.info-item-small:hover .info-text {
    color: white;
}

/* Styles pour les messages */
.success-message {
    background-color: rgba(39, 174, 96, 0.1);
    border: 1px solid #27ae60;
    color: #27ae60;
    padding: 15px 20px;
    margin: 20px 0;
    border-radius: 8px;
    text-align: center;
    animation: fadeIn 0.5s ease;
}

.error-message {
    background-color: rgba(231, 76, 60, 0.1);
    border: 1px solid #e74c3c;
    color: #e74c3c;
    padding: 15px 20px;
    margin: 20px 0;
    border-radius: 8px;
    text-align: center;
    animation: fadeIn 0.5s ease;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Responsive */
@media (max-width: 968px) {
    .contact-form-full {
        padding: 40px 30px;
    }
    
    .form-row {
        grid-template-columns: 1fr;
        gap: 0;
    }
    
    .contact-hero h1 {
        font-size: 2rem;
    }
    
    .form-header h2 {
        font-size: 1.8rem;
    }
}

@media (max-width: 768px) {
    .contact-form-full {
        padding: 30px 20px;
    }
    
    .contact-info-small-bottom {
        padding: 20px;
    }
    
    .info-grid-small {
        gap: 15px;
    }
    
    .info-item-small {
        padding: 6px 12px;
    }
    
    .submit-btn {
        width: 100%;
        min-width: auto;
    }
}

@media (max-width: 480px) {
    .contact-hero {
        padding: 30px 20px;
    }
    
    .contact-form-full {
        padding: 25px 15px;
    }
    
    .contact-info-small-bottom {
        padding: 15px;
    }
    
    .info-grid-small {
        flex-direction: column;
        align-items: center;
        gap: 10px;
    }
    
    .info-item-small {
        width: fit-content;
        min-width: 200px;
    }
}
</style>

<script>
// Fonction pour soumettre le formulaire
async function submitContactForm(event) {
    event.preventDefault(); // Empêche le rechargement de la page
    
    const form = event.target;
    const submitBtn = document.getElementById('submitBtn');
    const messageDiv = document.getElementById('formMessage');
    const originalBtnText = submitBtn.innerHTML;
    
    // Masquer les anciens messages
    messageDiv.style.display = 'none';
    messageDiv.className = '';
    
    // Désactiver le bouton pendant l'envoi
    submitBtn.disabled = true;
    submitBtn.innerHTML = 'Envoi en cours...';
    
    try {
        // Créer FormData à partir du formulaire
        const formData = new FormData(form);
        
        // Envoyer les données via AJAX
        const response = await fetch('process.php', {
            method: 'POST',
            body: formData
        });
        
        // Votre process.php retourne "success" ou "error" en texte simple
        const result = await response.text();
        
        if (result.trim() === 'success') {
            // SUCCÈS - Afficher message de succès dans la page
            messageDiv.innerHTML = `
                <div style="display: flex; align-items: center; justify-content: center; gap: 15px;">
                    <div style="font-size: 30px; color: #27ae60;">✅</div>
                    <div style="text-align: left;">
                        <strong style="display: block; font-size: 18px; margin-bottom: 5px; color: #27ae60;">Message envoyé avec succès !</strong>
                        <span style="font-size: 14px; color: #666;">Merci de nous avoir contactés. Nous vous répondrons dans les plus brefs délais.</span>
                    </div>
                </div>
            `;
            messageDiv.className = 'success-message';
            messageDiv.style.display = 'block';
            
            // Réinitialiser le formulaire
            form.reset();
            
            // Défilement doux vers le message
            messageDiv.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            
            // Masquer le message après 8 secondes
            setTimeout(() => {
                messageDiv.style.display = 'none';
            }, 8000);
            
        } else if (result.trim() === 'error') {
            // ERREUR - Afficher message d'erreur dans la page
            messageDiv.innerHTML = `
                <div style="display: flex; align-items: center; justify-content: center; gap: 15px;">
                    <div style="font-size: 30px; color: #e74c3c;">❌</div>
                    <div style="text-align: left;">
                        <strong style="display: block; font-size: 18px; margin-bottom: 5px; color: #e74c3c;">Erreur d'envoi</strong>
                        <span style="font-size: 14px; color: #666;">Une erreur est survenue lors de l'envoi de votre message. Veuillez réessayer.</span>
                    </div>
                </div>
            `;
            messageDiv.className = 'error-message';
            messageDiv.style.display = 'block';
            
        } else {
            // Réponse inattendue
            throw new Error('Réponse inattendue du serveur.');
        }
        
    } catch (error) {
        // Erreur de connexion
        messageDiv.innerHTML = `
            <div style="display: flex; align-items: center; justify-content: center; gap: 15px;">
                <div style="font-size: 30px; color: #f39c12;">⚠️</div>
                <div style="text-align: left;">
                    <strong style="display: block; font-size: 18px; margin-bottom: 5px; color: #f39c12;">Problème de connexion</strong>
                    <span style="font-size: 14px; color: #666;">Impossible de se connecter au serveur. Veuillez vérifier votre connexion internet.</span>
                </div>
            </div>
        `;
        messageDiv.className = 'error-message';
        messageDiv.style.display = 'block';
        
        console.error('Erreur:', error);
        
    } finally {
        // Réactiver le bouton
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalBtnText;
    }
    
    return false;
}

// Animation pour le bouton
document.addEventListener('DOMContentLoaded', function() {
    const submitBtn = document.getElementById('submitBtn');
    
    submitBtn.addEventListener('mouseenter', function() {
        if (!this.disabled) {
            this.style.transform = 'translateY(-2px)';
        }
    });
    
    submitBtn.addEventListener('mouseleave', function() {
        if (!this.disabled) {
            this.style.transform = 'translateY(0)';
        }
    });
});
</script>

<?php include 'footer.php'; ?>