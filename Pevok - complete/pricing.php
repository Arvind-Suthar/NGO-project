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
    <link rel="stylesheet" href="css/pricing.css">
    <script src="js/relativeUrls.js"></script>
    <title></title>
  </head>
  <body onload="rewriteRelativePortUrls()">

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
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          <a class="nav-link" href="#">Features</a>
          <a class="nav-link active" href="pricing.php">Pricing</a>
          <a class="nav-link" href=":3000/dashboard">Admin Panel</a>
          <a class="nav-link" href="contact.php">Contact Us</a>
        </div>

      </div>
      <form class="form-inline login-button-form">
      <?php
        if($login_session != ""){
          echo "<span>Welcome ".$login_session."</span>";
          echo '<a class="btn btn-outline-danger" href="logout.php">Sign Out</a>';
        }else{
          echo '<a class="nav-link" href="login.php">Login</a><a class="btn btn-outline-success btn-md" type="button" href="login.php">Sign Up</a>';
        }
      ?>
      </form>
    </nav>

    <div class="pricing-wrap">
      <p class="title1">Choose your Plan</p>
      <p class="title2">Your first month is on us</p><br>
      <div class="pricing-container">


        <div class="pricing-panel panel-basic">
          <div class="panel-header">
            a
          </div>
          <div class="title">
            Basic
          </div>
          <p>Perfect for new marketers</p>
          <div class="price">
            <?php echo "INR ".$priceBasic;?>
            <span><sub>/Mo</sub></span>
          </div>
          <button type="button" name="buyBasic">Buy Now</button>
          <div class="features">
            <ul>
              <li>&#x2714; &nbsp;Up to 300 emails per day</li>
              <li>&#x2714; &nbsp;Unlimited contacts</li>
            </ul>
          </div>
        </div>


        <div class="pricing-panel panel-standard">
          <div class="panel-header">
            Popular
          </div>
          <div class="title">
            Standard
          </div>
          <p>Best solution for marketing pros</p>
          <div class="price">
            <?php echo "INR ".$priceStandard;?>
            <span><sub>/Mo</sub></span>
          </div>
          <button type="button" name="buyBasic">Buy Now</button>
          <div class="features">
            <ul>
              <li>&#x2714; &nbsp;Up to 100,000 emails</li>
              <li>&#x2714; &nbsp;No daily sending limit</li>
              <li>&#x2714; &nbsp;Email support</li>
              <li>&#x2714; &nbsp;remove EmailService logo</li>
            </ul>
          </div>
        </div>


        <div class="pricing-panel panel-premium">
          <div class="panel-header">
             a
          </div>
          <div class="title">
            Premium
          </div>
          <p>For marketers who need more</p>
          <div class="price">
            Have more advanced needs?
          </div>
          <button type="button" name="buyBasic">Get Quote</button>
          <div class="features">
            <ul>
              <li>&#x2714; &nbsp;Custom volume of emails</li>
              <li>&#x2714; &nbsp;Priority sending</li>
              <li>&#x2714; &nbsp;Customer success manager</li>
              <li>&#x2714; &nbsp;Priority support</li>
              <li>&#x2714; &nbsp;And more...</li>
            </ul>
          </div>
        </div>
      </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
