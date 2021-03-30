<?php
  include('session.php');
  $priceBasic = 2500;
  $priceStandard = 6000;
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/e017393c29.js"></script>
    <link rel="stylesheet" href="css/main.css">
    <script src="js/relativeUrls.js"></script>
    <title>Pevok</title>
  </head>
  <body onload="rewriteRelativePortUrls()">


    <!--NAVBAR  -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <a class="navbar-brand" href="index.php">
        <img src="img/favicon2" width="40" height="40">
        PEVOK
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
          <a class="nav-link" href="#">Features</a>
          <a class="nav-link" href="pricing.php">Pricing</a>
          <a class="nav-link" href=":3000/dashboard">Admin Panel</a>
          <a class="nav-link" href="contact.php">Contact Us</a>
        </div>

      </div>
      <form class="form-inline login-button-form">
        <?php
          if($login_session != ""){
            echo "<span>Welcome ".$login_session."</span>";
            echo '<a class="btn btn-outline-danger"href="logout.php">Sign Out</a>';
          }else{
            echo '<a class="nav-link" href="login.php">Login</a><a class="btn btn-outline-success btn-md" type="button" href="login.php">Sign Up</a>';
          }
        ?>
        <!--a class="nav-link" href="login.php">Login</a><a class="btn btn-outline-success btn-md" type="button" href="login.php">Sign Up</a-->
      </form>
    </nav>
    <!--NAVBAR END -->


    <!--JUMBOTRON  -->
      <div class="header">
        <div class="info">
          <p class="title">Turn your idea into a Bussiness</p>
          <p class="subtitle">
            Quickly design and customize responsive emails, send them
            to a large audience in seconds and watch your bussiness grow.
          </p>
          <a href="login.php" class="btn btn-primary btn-lg" role="button">Get Started</a>
          <a href="features.php" class="btn btn-outline-dark btn-lg" role="button">All Features</a>
        </div>
        <div class="img-holder">
          <img src="img/jumbotron1.png" height="400px" width="400px">
        </div>
      </div>
    <!--JUMBOTRON END -->

    <!--FEATURES  -->
    <div class="feature-container">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-5 feature-img-container">
            <img src="img/feature1.png" class="feature-img">
          </div>
          <div class="col-md-7">
            <div class="container">
              <div class="row info-group align-items-center justify-content-center">
                <div class="col-3 info-icon">
                  <i class="fas fa-rocket icon-yl"></i>
                </div>
                <div class="col">
                  <h4>Powerful Features</h4>
                  <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                     sed diam nonumy eirmod tempor invidunt ut labore et dolore</p>
                </div>
              </div>
              <div class="row info-group align-items-center justify-content-center">
                <div class="col-3 info-icon">
                  <i class="fas fa-shield-alt icon-bl"></i>
                </div>
                <div class="col">
                  <h4>Fully Secured</h4>
                  <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                     sed diam nonumy eirmod tempor invidunt ut labore et dolore</p>
                </div>
              </div>
              <div class="row info-group align-items-center justify-content-center">
                <div class="col-3 info-icon">
                  <i class="fas fa-desktop icon-mg"></i>
                </div>
                <div class="col-sm">
                  <h4>Easy Monitoring</h4>
                  <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                     sed diam nonumy eirmod tempor invidunt ut labore et dolore</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="feature-container">
      <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-7 feature-desc">
              <p class="title1">Operate your bussiness easily</p>
              <p class="subtitle1">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                 Quos, molestiae, perspiciatis laboriosam quia placeat recusandae
                 repudiandae corrupti similique delectus, aliquam commodi possimus
                  eveniet optio magnam quis vel. Reiciendis, fuga excepturi.</p>
              <a href="login.php" type="button" class="btn btn-lg btn-outline-primary">Start Now</a>
            </div>
            <div class="col-md-5 feature-img-container">
              <img src="img/feature2.png" class="feature-img">
            </div>
        </div>
      </div>
    </div>

    <!--FEATURES END -->



    <!--WHY CHOOSE US SECTION -->
    <div class="chooseus">
      <h1>Why Choose Us</h1>
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-sm">
            <i class="fas fa-rocket text-primary"></i>
            <h4>Very Fast</h4>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed</p>
          </div>
          <div class="col-sm">
            <i class="fas fa-users text-warning"></i>
            <h4>Happy Clients</h4>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed</p>
          </div>
          <div class="col-sm">
            <i class="fas fa-bullhorn text-info"></i>
            <h4>Free Ads</h4>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed</p>
          </div>
          <div class="col-sm">
            <i class="fas fa-money-bill-alt text-success"></i>
            <h4>Save Money</h4>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed</p>
          </div>
        </div>
      </div>
      <a href="pricing.php" type="button" class="btn btn-outline-danger">See Our Plans</a>
    </div>

    <!--SECTION END -->





    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
