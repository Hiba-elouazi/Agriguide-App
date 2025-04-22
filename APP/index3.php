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

  <!-- =======================================================
  * Template Name: AgriCulture
  * Template URL: https://bootstrapmade.com/agriculture-bootstrap-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="about-page">

   <!-- Header -->
</head>
<style>
  /* Dropdown personnalisé */
.dropdown-menu {
  border: 1px solid rgba(44, 95, 45, 0.1);
  box-shadow: 0 4px 15px rgba(0,0,0,0.1);
  margin-top: 10px;
}

.dropdown-item {
  padding: 8px 20px;
  color: #2c5f2d;
  transition: all 0.3s;
}

.dropdown-item:hover {
  background: #f8fafb;
  color: #1e401f;
}

.dropdown-toggle::after {
  vertical-align: middle;
  margin-left: 8px;
}   
</style>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center position-relative">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
        <img src="static/Agri/images/logo.png" alt="AgriCulture">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php" class="active">Home</a></li>
          <li><a href="about.html">About</a></li>
          <li><a href="contact.html">Contact</a></li>
          <li class="dropdown">
            <a class="dropdown-toggle" href="#" role="button" id="profileDropdown" data-bs-toggle="dropdown">
              Profile
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="index2.php">Login</a></li>
              <li><a class="dropdown-item" href="index3.php">Sign Up</a></li>
            </ul>
          </li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade" style="background-image: url(assetsf/img/page-title-bg.webp);">
      <div class="container position-relative">
        <h1>Formulaire d'inscription</h1>
        <p>Veuillez remplir les informations suivantes pour vous inscrire.</p>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.php">Accueil</a></li>
            <li class="current">Inscription</li>
          </ol>
        </nav>
      </div>
    </div>

    <!-- Formulaire -->
    <section class="section">
      <div class="container">
	    <form action="register.php" method="POST">
         <!-- {% csrf_token %} -->
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="nom" class="form-label">Nom</label>
              <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="col-md-6">
              <label for="prenom" class="form-label">Prénom</label>
              <input type="text" class="form-control" id="prenom" name="prenom" required>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="col-md-6">
              <label for="password" class="form-label">Code</label>
              <input type="text" class="form-control" id="password" name="password" required>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-6">
              <label for="telephone" class="form-label">Téléphone</label>
              <input type="tel" class="form-control" id="telephone" name="telephone" required>
            </div>
            <div class="col-md-6">
              <label for="region" class="form-label">Région</label>
              <select class="form-select" id="region" name="region" required>
                <option value="" disabled selected>Choisissez votre région</option>
                <option value="Casablanca-Settat">Casablanca-Settat</option>
                <option value="Rabat-Salé-Kénitra">Rabat-Salé-Kénitra</option>
                <option value="Fès-Meknès">Fès-Meknès</option>
                <option value="Marrakech-Safi">Marrakech-Safi</option>
                <option value="Tanger-Tétouan-Al Hoceima">Tanger-Tétouan-Al Hoceima</option>
                <option value="Autre">Autre</option>
              </select>
            </div>
          </div>
          <div class="mb-3">
            <label for="ville" class="form-label">Ville</label>
            <input type="text" class="form-control" id="ville" name="ville" required>
          </div>
          <div class="text-center">
            <button type="submit" name="signUp" value="Envoyer" class="primary" style="background-color: #28a745; color: white; padding: 10px 20px; border: none; border-radius: 5px;">Envoyer</button>
          </div>
        </form>
      </div>
    </section>
  </main>

  <!-- Footer -->
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

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>
<!-- Vendor JS Files -->
<script src="static/Agri/vendor/php-email-form/validate.js"></script>
<script src="static/Agri/vendor/aos/aos.js"></script>
<script src="static/Agri/vendor/swiper/swiper-bundle.min.js"></script>
<script src="static/Agri/vendor/glightbox/js/glightbox.min.js"></script>

<!-- Main JS File -->
<script src="static/Agri/js/main.js"></script>
<script src="static/Agri/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script>
    // Fermer le dropdown quand on clique ailleurs
    document.addEventListener('click', function(e) {
      if (!e.target.closest('.dropdown')) {
        var dropdowns = document.querySelectorAll('.dropdown-menu');
        dropdowns.forEach(function(dropdown) {
          dropdown.classList.remove('show');
        });
      }
    });
  </script>

</body>
</html>