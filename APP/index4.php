<?php
// Démarrer la session si elle n'est pas déjà active
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Vérifier si l'utilisateur est connecté (si l'email est dans la session)
if (!isset($_SESSION['email'])) {
    // Si l'utilisateur n'est pas connecté, redirigez-le vers la page de connexion
    header("Location: index2.php");
    exit(); // Assurez-vous d'arrêter l'exécution après la redirection
}
?>

<?php
include("chat.php");
?>
<?php
if (isset($_GET['success'])) {
    echo '<script>alert("Plantation saved successfully!");</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>AgriGuide</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="static/Agri/images/favicon.png" rel="icon">
  <link href="static/Agri/images/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Marcellus:wght@400&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="static/Agri/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="static/Agri/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="static/Agri/vendor/aos/aos.css" rel="stylesheet">
  <link href="static/Agri/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="static/Agri/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="static/Agri/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        :root {
            --primary-color: #2c5f2d;
            --secondary-color: #4CAF50;
            --accent-color: #FFD700;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background: #f8fff9;
        }

        header {
            position: fixed;
            top: 0;
            width: 100%;
            padding: 1.5rem 5%;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary-color);
        }

        .logo svg {
            width: 40px;
            height: 40px;
            fill: var(--primary-color);
        }

        .nav-menu {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .nav-menu a {
            text-decoration: none;
            color: var(--primary-color);
            font-weight: 500;
            padding: 0.8rem 1.5rem;
            border-radius: 30px;
            transition: all 0.3s ease;
        }

        .nav-menu a:hover {
            background: rgba(44, 95, 45, 0.1);
            transform: translateY(-2px);
        }

        .logout-btn {
            background: #e74c3c;
            color: white !important;
            box-shadow: 0 4px 15px rgba(231, 76, 60, 0.2);
        }

        .logout-btn:hover {
            background: #c0392b !important;
            transform: translateY(-2px) scale(1.05);
        }

        .hero-section {
            margin-top: 100px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            padding: 4rem 5%;
            min-height: 80vh;
        }

        .feature-card {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            transition: transform 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            cursor: pointer;
        }

        .feature-card:hover {
            transform: translateY(-10px);
        }

        .card-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.7) 100%);
            display: flex;
            align-items: flex-end;
            padding: 2rem;
        }

        .card-content {
            color: white;
            z-index: 1;
        }

        .card-title {
            font-size: 2.2rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .card-cta {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.8rem 1.5rem;
            background: var(--secondary-color);
            border-radius: 30px;
            text-decoration: none;
            color: white;
            transition: transform 0.3s;
        }

        .card-cta:hover {
            transform: translateX(10px);
        }

        /* Nouveaux styles pour l'interface de plantation */
        #plant-selection {
            display: none;
            margin-top: 100px;
            padding: 4rem 5%;
        }

        .selection-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #555;
        }

        select, input[type="date"], textarea {
            width: 100%;
            padding: 1rem;
            border: 2px solid #eee;
            border-radius: 10px;
            appearance: none;
        }

        select {
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="%232c5f2d"><path d="M7 10l5 5 5-5z"/></svg>') no-repeat right 1rem center/15px;
        }

        .recommendation-card {
            margin-top: 2rem;
            padding: 1.5rem;
            background: #f8fafc;
            border-radius: 15px;
        }

        .recommendation-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin: 1rem 0;
        }

        .recommendation-icon {
            width: 40px;
            height: 40px;
            background: var(--secondary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        footer {
            background: var(--primary-color);
            color: white;
            padding: 4rem 5%;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            max-width: 1200px;
            margin: 0 auto;
        }
        #map {
         height: 300px !important;
         width: 100%;
         position: relative;
         background: #f0f0f0;
        }

       .leaflet-container {
          background: transparent !important;
        }
    </style>
</head>
<body>
    <header id="header" class="header d-flex align-items-center position-relative">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
    
          <a href="index.php" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <img src="static/Agri/images/logo.png" alt="AgriCulture">
            <!-- <h1 class="sitename">AgriCulture</h1>  -->
          </a>
    
          <nav id="navmenu" class="navmenu">
            <ul>
              <ul>
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="about.html">about</a></li>
                <li><a href="contact.html">Contact</a></li>
                
                <li><a href="profile.php">Profile</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
          </nav>
    
        </div>
      </header>

      <main>
        <section class="hero-section">
            <article class="feature-card" 
                     style="background-image: url('https://images.squarespace-cdn.com/content/v1/59a706d4f5e2319b70240ef9/1598971164694-F75Y7VUAHC6TLFJXLCWF/veggies.jpg')">
                <div class="card-overlay">
                    <div class="card-content">
                        <h2 class="card-title">Choose a Plant</h2>
                        <a href="#" class="card-cta" id="start-planting">
                            Start
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </article>
    
            <article class="feature-card" 
                     style="background-image: url('https://media.licdn.com/dms/image/v2/D5612AQG6AyNMwG3mGQ/article-cover_image-shrink_720_1280/article-cover_image-shrink_720_1280/0/1678258456487?e=2147483647&v=beta&t=1F6fvU2tiSCyFr0YxVOmarV4yDfJM5_gfd6u_3uhT9w')">
                <div class="card-overlay">
                    <div class="card-content">
                        <h2 class="card-title">Smart Monitoring</h2>
                        <a href="index5.php" class="card-cta">
                            Explore
                            <i class="fas fa-chart-line"></i>
                        </a>
                    </div>
                </div>
            </article>
        </section>
    
        <!-- Plant selection interface -->
        <section id="plant-selection">
            <div class="selection-container">
                <button class="back-btn" style="background: none; border: none; cursor: pointer; margin-bottom: 2rem; color: var(--primary-color);">
                    <i class="fas fa-arrow-left"></i> Back
                </button>
    
                <h2 style="color: var(--primary-color); margin-bottom: 2rem; text-align: center;">New Plantation</h2>
                
                <form id="plant-form" method="POST" action="save_plant.php">
                    <div class="form-group">
                        <label>Select a plant</label>
                        <select name="plant" class="plant-select" id="plant-select">
                            <option value="">Choose a plant...</option>
                            <option value="tomate">Tomato</option>
                            <option value="ble">Wheat</option>
                            <option value="carotte">Carrot</option>
                            <option value="mais">Corn</option>
                        </select>
                    </div>
    
                    <div class="form-group">
                        <label>Planting Date</label>
                        <input type="date" name="planting_date" id="planting-date">
                    </div>
    
                    <div class="form-group">
                        <label>Estimated Harvest Date</label>
                        <input type="date" name="harvest_date" id="harvest-date">
                    </div>
    
                    <div class="form-group">
                        <label>Plot Location</label>
                        <div id="map" style="height: 300px; border-radius: 10px; margin-top: 1rem;"></div>
                        <input type="hidden" name="lat" id="lat">
                        <input type="hidden" name="lng" id="lng">
                    </div>
    
                    <div class="form-group">
                        <label>Additional Notes</label>
                        <textarea name="notes" rows="4"></textarea>
                    </div>
    
                    <div class="recommendation-card" id="recommendations">
                        <h3 style="color: var(--primary-color); margin-bottom: 1rem;">Planting Recommendations</h3>
                        <div class="recommendation-item">
                            <div class="recommendation-icon">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <div>
                                <h4>Best Season</h4>
                                <p id="plant-season">-</p>
                            </div>
                        </div>
                        <div class="recommendation-item">
                            <div class="recommendation-icon">
                                <i class="fas fa-ruler-combined"></i>
                            </div>
                            <div>
                                <h4>Spacing</h4>
                                <p id="plant-spacing">-</p>
                            </div>
                        </div>
                        <div class="recommendation-item">
                            <div class="recommendation-icon">
                                <i class="fas fa-tint"></i>
                            </div>
                            <div>
                                <h4>Watering</h4>
                                <p id="plant-water">-</p>
                            </div>
                        </div>
                    </div>
    
                    <div style="display: flex; gap: 1rem; justify-content: flex-end; margin-top: 2rem;">
                        <button type="button" class="cancel-btn" style="padding: 1rem 2rem; border: none; border-radius: 30px; background: #eee; color: #666; cursor: pointer;">Cancel</button>
                        <button type="submit" style="padding: 1rem 2rem; border: none; border-radius: 30px; background: var(--secondary-color); color: white; cursor: pointer;">Save</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
    

    <footer id="footer" class="footer dark-background">

    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-4 col-md-6 footer-about">
            <a href="index.php" class="logo d-flex align-items-center">
              <span class="sitename">AgriGuide</span>
            </a>
            <div class="footer-contact pt-3">
              <p></p>
              <p>Rue Charaf ,40 150 Al hoceima</p>
              <p class="mt-3"><strong>Phone:</strong> <span>+212 745216985</span></p>
              <p><strong>Email:</strong> <span>AgriGuide@gmail.com</span></p>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="copyright text-center">
      <div class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

    
        <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
          <a href=""><i class="bi bi-twitter-x"></i></a>
          <a href=""><i class="bi bi-facebook"></i></a>
          <a href=""><i class="bi bi-instagram"></i></a>
          <a href=""><i class="bi bi-linkedin"></i></a>
        </div>

      </div>
    </div>

  </footer>

    <script>
        // Gestion de la navigation
        document.getElementById('start-planting').addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector('.hero-section').style.display = 'none';
            document.getElementById('plant-selection').style.display = 'block';
        });

        document.querySelector('.back-btn').addEventListener('click', function() {
            document.querySelector('.hero-section').style.display = 'grid';
            document.getElementById('plant-selection').style.display = 'none';
        });

        document.querySelector('.cancel-btn').addEventListener('click', function() {
            document.querySelector('.hero-section').style.display = 'grid';
            document.getElementById('plant-selection').style.display = 'none';
        });

        // Données des plantes
        const plants = {
            'tomate': {
                season: 'Mars à Juin',
                spacing: '50-70 cm entre plants',
                water: 'Arrosage régulier au pied'
            },
            'ble': {
                season: 'Octobre à Novembre',
                spacing: 'Semis en ligne (20cm)',
                water: 'Arrosage modéré'
            },
            'carotte': {
                season: 'Février à Juillet',
                spacing: '5cm entre plants',
                water: 'Sol toujours humide'
            },
            'mais': {
                season: 'Avril à Mai',
                spacing: '40cm entre plants',
                water: 'Arrosage abondant'
            }
        };

        // Mise à jour des recommandations
        document.getElementById('plant-select').addEventListener('change', function(e) {
            const plant = plants[e.target.value];
            if(plant) {
                document.getElementById('plant-season').textContent = plant.season;
                document.getElementById('plant-spacing').textContent = plant.spacing;
                document.getElementById('plant-water').textContent = plant.water;
            }
        });

        

        // Confirmation de déconnexion
        document.querySelector('.logout-btn').addEventListener('click', function(e) {
            e.preventDefault();
            if(confirm('Voulez-vous vraiment vous déconnecter ?')) {
                window.location.href = 'logout.php';
            }
        });
    </script>
    <script>
     // Remplacer le code existant par :
    let map;
    let marker;

   function initMap() {
    // Vérifier que l'élément map existe
    if (!document.getElementById('map')) return;
    
    map = L.map('map').setView([35.2495, -3.9371], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Gestionnaire d'erreur pour les tuiles
    map.on('tileerror', function(err) {
        console.error('Erreur de chargement des tuiles:', err);
        alert('Erreur de chargement de la carte. Vérifiez votre connexion internet.');
    });

    // Gestion du clic
    map.on('click', function(e) {
        if (marker) map.removeLayer(marker);
        marker = L.marker(e.latlng).addTo(map)
            .bindPopup('Position sélectionnée').openPopup();
        document.getElementById('lat').value = e.latlng.lat.toFixed(6);
        document.getElementById('lng').value = e.latlng.lng.toFixed(6);
    });
}

// Initialiser la carte quand la section est visible
  document.getElementById('start-planting').addEventListener('click', function() {
    setTimeout(() => {
        initMap();
        map.invalidateSize(); // Rafraîchir la taille de la carte
    }, 300);
});
   </script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

</body>
</html>
