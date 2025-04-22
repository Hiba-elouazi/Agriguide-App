<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Login and Registration Form in HTML & CSS | CodingLab </title>-->
    <link rel="stylesheet" href="style.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

   </head>
<body>
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="images/frontImg.jpg" alt="">
        <div class="text">
          <span class="text-1">Semer aujourd'hui,  <br>  récolter demain</span>
          <span class="text-2">Let's get connected</span>
        </div>
      </div>
      <div class="back">
        <img class="backImg" src="images/backImg.jpg" alt="">
        <div class="text">
          <span class="text-1">Complete miles of journey <br> with one step</span>
          <span class="text-2">Let's get started</span>
        </div>
      </div>
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Login</div>
          <form  method="POST" action="register.php">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" name="email" placeholder="Enter your email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Enter your password" required>
              </div>
              <div class="text"><a href="#">Forgot password?</a></div>
              <div class="button input-box">
                <input type="submit" name="signIn" value="Sumbit">
              </div>
              <div class="text sign-up-text">Don't have an account? <a href="index3.php">Sign up now</a></div>
            </div>
        </form>
      </div>
        <div class="signup-form">
          <div class="title">Signup</div>
        <form  method="post">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" name="nom" placeholder="Enter your name" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" name="email" placeholder="Enter your email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Enter your password" required>
              </div>
              <div class="button input-box">
                <input type="submit" value="Sumbit">
              </div>
              <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
            </div>
      </form>
    </div>
    </div>
    </div>
  </div>
  <!-- Contact Section -->
<section id="contact">
  <div class="contact-container">
      <h2>Contactez-nous</h2>
      <div class="contact-info">
          <div class="contact-item">
              <i class="fas fa-envelope"></i>
              <h3>Email</h3>
              <a href="mailto:AgriGuide@gmail.com">AgriGuide@gmail.com</a>
          </div>
          <div class="contact-item">
              <i class="fas fa-phone"></i>
              <h3>Téléphone</h3>
              <span>+212 6--------</span>
          </div>
          <div class="contact-item">
              <i class="fas fa-map-marker-alt"></i>
              <h3>Adresse</h3>
              <span>Rue Charaf, 40 150, Al Hoceima, Maroc</span>
          </div>
      </div>
  </div>
</section>
<!-- Social Media Links -->
<footer id="footer">
  <div class="social-container">
      <h2>Suivez-nous</h2>
      <ul class="social-icons">
          <li><a href="#" class="fab fa-twitter"></a></li>
          <li><a href="#" class="fab fa-facebook-f"></a></li>
          <li><a href="#" class="fab fa-instagram"></a></li>
          <li><a href="#" class="fab fa-github"></a></li>
          <li><a href="#" class="fab fa-linkedin-in"></a></li>
      </ul>
  </div>
</footer>

</body>
</html>

