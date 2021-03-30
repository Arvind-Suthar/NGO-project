<?php
include('dbConnection.php');
session_start();
$error = "";
if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form
      if(isset($_POST["login"])){
        $myusername = mysqli_real_escape_string($db,$_POST['username']);
        $mypassword = mysqli_real_escape_string($db,$_POST['password']);
        $type = mysqli_real_escape_string($db, $_POST['type']);

        if($type == "1"){
          $sql = "SELECT studentIndex FROM studentlogintable WHERE username = '$myusername' and password = '$mypassword'";
        }else if($type == "2"){
          $sql = "SELECT * FROM teacherlogintable WHERE username = '$myusername' and password = '$mypassword'";
        }

        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        $count = mysqli_num_rows($result);

        // If result matched $myusername and $mypassword, table row must be 1 row

        if($count == 1) {
           $_SESSION['login_user'] = $myusername;
           $_SESSION['type'] = $type;
           if($_SESSION['type'] == "1"){
             $_SESSION['studentId'] = $row["studentIndex"];
             header("location: studentPanel.php");
           }else if($_SESSION['type'] == "2"){
             $_SESSION['subject'] = $row["subject"];
             header("location: teacherPanel.php");
           }

        }else {
           $error = "Your Login Name or Password is invalid";
        }
      }
   }


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap-4.5.3-dist/css/bootstrap.css">
    <script src="https://kit.fontawesome.com/e017393c29.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Varela&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <title></title>
  </head>
  <body>
    <div class="login-container">
      <div class="login-wrap">
        <div class="container">
          <div class="row p-3">
            <div class="col-lg-6">
              <img src="img/login-img.png" alt="Login Image" height="250px" width="250px">
            </div>
            <div class="col-lg-6 box-center">
              <h4 class="text-dark">School Login</h4>
              <form action="index.php" method="post" style="width: 100%;">
                <div class="login-group">
                  <i class="fa fa-user"></i>
                  <input class="login-input" type="text" name="username" placeholder="Username">
                </div>
                <select class="form-control rounded-pill bg-ccc" name="type" required>
                  <option value="">Select type of login</option>
                  <option value="1">Student</option>
                  <option value="2">Staff</option>
                  <option value="3">Management</option>
                </select>
                <div class="login-group">
                  <i class="fa fa-lock"></i>
                  <input class="login-input" type="password" name="password" placeholder="password">
                </div>
                <input type="submit" name="login" value="Login" class="btn btn-success btn-block rounded-pill">
              </form>
              <a href="#" class="forgot-password-link">Forgot username/password?</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="bootstrap-4.5.3-dist/js/bootstrap.js"></script>
</html>
