<?php
include('dbconnection.php');
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form
      if(isset($_POST["signin"])){
        $myusername = mysqli_real_escape_string($db,$_POST['username']);
        $mypassword = mysqli_real_escape_string($db,$_POST['password']);

        $sql = "SELECT id FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        $count = mysqli_num_rows($result);

        // If result matched $myusername and $mypassword, table row must be 1 row

        if($count == 1) {
           $_SESSION['login_user'] = $myusername;

           header("location: pricing.php");
        }else {
           $error = "Your Login Name or Password is invalid";
        }
      }
      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
      if(isset($_POST["register"])){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          if (empty($_POST["username"])) {
            $nameErr = "Userame is required";
          } else {
            $username = test_input($_POST["username"]);
          }

          if (empty($_POST["email"])) {
            $emailErr = "Email is required";
          } else {
            $email = test_input($_POST["email"]);
          }

          if (empty($_POST["password"])) {
            $passworderr = "Password is required";
          } else {
            $password = test_input($_POST["password"]);
          }
        }



          $sql = "INSERT INTO `admin` (`id`, `username`, `passcode`) VALUES (NULL, '$username', '$password')";
          $result = mysqli_query($db,$sql);
      }
   }


 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/e017393c29.js"></script>
    <link rel="stylesheet" href="css/login.css">
    <title></title>
  </head>
  <body>
    <div class="wrapper">
      <div class="container">
        <div class="form">
          <div class="signup-form">
            <p class="title">Create Account</p>
            <form class="form-control" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
              <div class="input-wrap">
                <i class="fa fa-user"></i>
                <input type="text" name="username" placeholder="Username" required/>
              </div>
              <div class="input-wrap">
                <i class="fa fa-envelope"></i>
                <input type="text" name="email" placeholder="Email" required/>
              </div>
              <div class="input-wrap">
                <i class="fa fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required/>
              </div>
              <br>
              <input type="submit" name="register" value="SIGN UP" class="form-btn">
            </form>
          </div>
          <div class="signin-form">
            <p class="title">Sign In to Mail</p>
            <form class="form-control" action="#" method="post">
              <div class="input-wrap">
                <i class="fa fa-user"></i>
                <input type="text" name="username" placeholder="Username" />
              </div>
              <div class="input-wrap">
                <i class="fa fa-lock"></i>
                <input type="password" name="password" placeholder="Password" />
              </div>
              <br>
              <input type="submit" name="signin" value="SIGN IN" class="form-btn">
            </form>
          </div>
        </div>
        <div class="login_info">
          <div class="login_wrap">
            <div class="login_info_signup">
              <div class="wrap">
                <p class="title">Welcome Back!</p>
                <p class="description">To keep connected with us please enter <br>your personel info here</p>
                  <br>
                  <button class="signin btn">SIGN IN</button>
              </div>
            </div>
            <div class="login_info_signin">
              <div class="wrap">
                <p class="title">Hello Friend!</p>
                <p class="description">Start entering your details here to start <br>your journey with us</p>
                  <br>
                  <button class="signup btn">SIGN UP</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script>
    $(".signin").click(function(){
      $(".login_wrap").css("margin-left","-52vw");
      $(".login_info").css("margin-left","52vw");
      $(".signup-form").css("margin-left","-52vw");
      $(".form").css("margin-left","-52vw");
    });
    $(".signup").click(function(){
      $(".login_wrap").css("margin-left","0vw");
      $(".login_info").css("margin-left","0vw");
      $(".signup-form").css("margin-left","0vw");
      $(".form").css("margin-left","28vw");
    });
  </script>
</html>
