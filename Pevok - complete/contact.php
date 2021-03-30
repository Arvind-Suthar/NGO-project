<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/e017393c29.js"></script>
    <link rel="stylesheet" href="css/contact.css">
    <title>Pevok</title>
  </head>
  <body>
    <!--CONTACT US  -->
    <div class="contact-wrapper">
      <div class="content-header">
        Contact Us
      </div>
      <div class="contact-box">
        <div class="container">
          <div class="row">
            <div class="col-sm-4 contact-info">
              <div class="info-group">
                <!--i class="fa fa-map-marker" aria-hidden="true"></i-->
                <span class="icon-info">Address</span><br>
                <span>A-505/ Building CHS, Locality, <br>
                  Area, Mumbai - 543534
                </span>
              </div>
              <div class="info-group">
                <!--i class="fa fa-phone" aria-hidden="true"></i-->
                <span class="icon-info">Lets Talk</span><br>
                <span>+91 9876543210</span><br>
                <span>+91 9876543210</span>
              </div>
              <div class="info-group">
                <!--i class="fa fa-envelope" aria-hidden="true"></i-->
                <span class="icon-info">General Support</span><br>
                <span>your@email.here</span><br>
                <span>your@email.here</span>
              </div>
            </div>

            <div class="col-sm-8 contact-form">
              <form action="contact.php" method="post">
                <label for="name">Name: </label>
                <input class="form-control" type="text" name="name" placeholder="John Wick" id="name">
                <br>
                <label for="email">Email: </label>
                <input class="form-control" type="text" name="email" placeholder="your@email.here" id="email">
                <br>
                <label for="msg">Your Message: </label>
                <textarea class="form-control" name="msg" rows="6" id="msg" style="resize: none;" placeholder="Your Message here....."></textarea><br>
                <input type="submit" name="submit" value="Submit" class="btn btn-success btn-block">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--CONTACT US END  -->


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
