<?php
// header.php - Version design amélioré
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Royaume du Maroc - Découvrez la richesse culturelle et historique</title>
    <style>
        /* RESET ET BASE */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #2c3e50;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        
        /* HEADER AMÉLIORÉ */
        .main-header {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            color: white;
            padding: 0;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            position: relative;
            overflow: hidden;
        }
        
        .header-top {
            padding: 30px 0;
            text-align: center;
            position: relative;
        }
        
        .header-top::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('assets/images/moroccan-pattern.png') repeat;
            opacity: 0.1;
        }
        
        .header-top h1 {
            font-size: 2.8rem;
            margin-bottom: 10px;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            position: relative;
        }
        
        .header-top p {
            font-size: 1.3rem;
            color: #ecf0f1;
            font-weight: 300;
            position: relative;
        }
        
        /* NAVIGATION AMÉLIORÉE */
        .main-nav {
            padding: 0;
            background: rgba(52, 73, 94, 0.95);
            backdrop-filter: blur(10px);
            border-top: 1px solid rgba(255,255,255,0.1);
        }
        
        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            padding: 0 20px;
        }
        
        .main-nav a {
            color: white;
            text-decoration: none;
            margin: 0 25px;
            font-size: 1.1rem;
            font-weight: 500;
            padding: 18px 0;
            position: relative;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .main-nav a::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 3px;
            background: linear-gradient(90deg, #3498db, #2ecc71);
            transition: width 0.3s ease;
        }
        
        .main-nav a:hover {
            color: #3498db;
        }
        
        .main-nav a:hover::before {
            width: 100%;
        }
        
        /* LAYOUT PRINCIPAL AMÉLIORÉ */
        .main-wrapper {
            min-height: calc(100vh - 200px);
            padding: 30px 20px;
        }
        
        .main-container {
            display: grid;
            grid-template-columns: 280px 1fr 320px;
            gap: 0px;
            max-width: 1400px;
            margin: 0 auto;
            
            background: linear-gradient(180deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            min-height: 600px;
        }
        
        
        /* SIDEBAR GAUCHE AMÉLIORÉ */
        .sidebar-left {
            background: linear-gradient(180deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 0;
            border-right: 0px solid #e9ecef;
        }
        
        .sidebar {
            padding: 25px;
        }
        
        .sidebar-section {
            margin-bottom: 35px;
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            border: 1px solid #e9ecef;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .sidebar-section:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }
        
        .sidebar-section h3 {
            color: #2c3e50;
            margin-bottom: 15px;
            font-size: 1.1rem;
            font-weight: 600;
            border-bottom: 2px solid #3498db;
            padding-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .sidebar-section ul {
            list-style: none;
            padding: 0;
        }
        
        .sidebar-section li {
            margin-bottom: 10px;
            padding: 8px 0;
            border-bottom: 1px solid #f8f9fa;
        }
        
        .sidebar-section li:last-child {
            border-bottom: none;
        }
        
        .sidebar-section a {
            color: #5d6d7e;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            display: block;
            padding: 5px 0;
        }
        
        .sidebar-section a:hover {
            color: #3498db;
            transform: translateX(5px);
        }
        
        /* CONTENU PRINCIPAL AMÉLIORÉ */
        .main-content {
            background: white;
            margin: 25px 0px 25px 0px;
            padding: 25px;
            min-height: 600px;
            
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            border: 1px solid #e9ecef;
        }
        
        /* SIDEBAR DROITE AMÉLIORÉE */
        .sidebar-right {
            background: linear-gradient(180deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 0;
            border-left: 0 solid #e9ecef;
        }
        
        .video-sidebar {
            padding: 25px;
        }
        
        .video-container {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            margin-bottom: 25px;
            text-align: center;
        }
        
        .video-container h3 {
            color: #2c3e50;
            margin-bottom: 15px;
            font-size: 1.2rem;
        }
        
        .video-container video {
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        
        .newsletter-sidebar {
            background: linear-gradient(135deg, #3498db 0%, #2ecc71 100%);
            color: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(52, 152, 219, 0.3);
        }
        
        .newsletter-sidebar h4 {
            margin-bottom: 15px;
            font-size: 1.3rem;
            text-align: center;
        }
        
        .newsletter-sidebar p {
            margin-bottom: 20px;
            text-align: center;
            opacity: 0.9;
        }
        
        .newsletter-form input {
            width: 100%;
            padding: 12px;
            margin-bottom: 12px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            background: rgba(255,255,255,0.9);
        }
        
        .newsletter-form button {
            width: 100%;
            background: #2c3e50;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        
        .newsletter-form button:hover {
            background: #34495e;
            transform: translateY(-2px);
        }
        
        /* FOOTER AMÉLIORÉ */
        .main-footer {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            color: white;
            padding: 40px 0 20px 0;
            margin-top: 50px;
            border-top: 1px solid rgba(255,255,255,0.1);
        }
        
        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            text-align: center;
        }
        
        .footer-links {
            margin: 25px 0;
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
        }
        
        .footer-links a {
            color: #ecf0f1;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
            padding: 8px 16px;
            border-radius: 20px;
            background: rgba(255,255,255,0.1);
        }
        
        .footer-links a:hover {
            color: #3498db;
            background: rgba(255,255,255,0.2);
        }
        
        .copyright {
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid rgba(255,255,255,0.1);
            color: #bdc3c7;
            font-size: 0.9rem;
        }
        
        /* RESPONSIVE */
        @media (max-width: 1024px) {
            .main-container {
                grid-template-columns: 250px 1fr;
            }
            .sidebar-right {
                display: none;
            }
        }
        
        @media (max-width: 768px) {
            .main-container {
                grid-template-columns: 1fr;
            }
            .sidebar-left {
                display: none;
            }
            .header-top h1 {
                font-size: 2.2rem;
            }
            .nav-container {
                flex-wrap: wrap;
            }
            .main-nav a {
                margin: 0 15px;
                font-size: 1rem;
            }
        }
        /* Correction de la vidéo */
.video-wrapper {
    width: 100%;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.video-wrapper video {
    width: 100%;
    height: auto;
    display: block;
}

.video-description {
    text-align: center;
    color: #7f8c8d;
    font-size: 0.9rem;
    margin-top: 10px;
    font-style: italic;
}

/* Ajustement responsive pour la sidebar droite */
.sidebar-right {
    background: linear-gradient(180deg, #f8f9fa 0%, #e9ecef 100%);
    padding: 0;
    border-left: 0px solid #e9ecef;
    overflow: hidden; /* Empêche le débordement */
}

.video-sidebar {
    padding: 25px;
    height: 100%;
    display: flex;
    flex-direction: column;
    gap: 25px;
}

/* Ajustement spécifique pour la vidéo */
.video-container {
    background: white;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    margin-bottom: 0;
    text-align: center;
    flex-shrink: 0;
}

.newsletter-sidebar {
    background: linear-gradient(135deg, #3498db 0%, #2ecc71 100%);
    color: white;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 8px 25px rgba(52, 152, 219, 0.3);
    flex-shrink: 0;
}
    </style>
</head>
<body>
    <header class="main-header">
        <div class="header-top">
            <h1>Royaume du Maroc</h1>
            <p>Découvrez la richesse culturelle et historique</p>
        </div>
        <nav class="main-nav">
            <div class="nav-container">
                <a href="index.php">Accueil</a>
                <a href="plan_site.php">Plan de site</a>
                <a href="qui_sommes_nous.php">Qui sommes-nous ?</a>
                <a href="contact.php">Contact</a>
                <a href="login.php">Connexion</a>
            </div>
        </nav>
    </header>

    <div class="main-wrapper">
        <!-- Le contenu spécifique à chaque page sera inséré ici -->