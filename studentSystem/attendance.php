<?php
  include("session.php");
   mysqli_select_db($db, "attendacereport");
   $subjects = array("AWP", "EJ", "IOT");
   $fullTable = false;
   if(isset($_GET["submit"])){
    $fullTable = true;
   }

   include('NavTemplate.php');
 ?>

        <div class="col-95">
          <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
              <span class="navbar-text">
                What do you want to learn today?
              </span>
            </div>
            <div class="icon-box">
              <a href="#"> <i class="fa fa-envelope"></i></a>
              <div class="profile-button dropdown">
                <a href="#" class="dropdown-toggle" id="profileDropdown" role="button">
                   <img src="img/profile.png" alt="Profile picture" height="30px" class="rounded-pill"/>
                </a>
                <ul class="dropdown-menu" aria-labelledby="profileDropdown" id="profileDropdownMenu">
                  <li><a class="dropdown-item text-danger" href="logout.php">Log Out</a></li>
                </ul>
              </div>
            </div>
          </nav>
          <div class="container p-4 bg-white intro">
            <div class="studentInfo text-lightgray">
              <h4>Arvind Suthar</h4>
              <p>
                <strong>Roll no.</strong> 1212<br>
                <strong>Course:</strong> Computer Science
              </p>
            </div><br>
            <h4 class="text-lightgray">Attendace this semester</h4>
            <div class="attendance-report">
              <table class="table table-striped short-att-table">
                <thead>
                  <tr>
                    <th scope="col">Subject</th>
                    <th scope="col">Total Lectures</th>
                    <th scope="col">Lectures Attended</th>
                    <th scope="col">Attendance %</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  for ($x = 0; $x < 3; $x++) {

                    $studentId = $_SESSION['studentId'];
                    $currSubject = $subjects[$x];


                    $sqlSub = "SELECT $currSubject from `$studentId` WHERE $currSubject = 'P'";
                    $sqlTotalSub = "SELECT $currSubject from `$studentId`";


                    if (mysqli_query($db,$sqlSub)) {
                      $resultSub = mysqli_query($db,$sqlSub);
                      $countSub = mysqli_num_rows($resultSub);
                    } else {
                      echo "Error: ".mysqli_error($db);
                      $countSub = 0;
                    }
                    if (mysqli_query($db, $sqlTotalSub)) {
                      $resultTotalSub = mysqli_query($db, $sqlTotalSub);
                      $countTotalSub = mysqli_num_rows($resultTotalSub);
                      $AttPercent = number_format((float)($countSub / $countTotalSub) * 100,2,".","");
                    } else {
                      echo "Error: ".mysqli_error($db);
                      $countTotalSub = 0;
                      $AttPercent = 0;
                    }


                    echo '
                    <tr>
                      <th scope="row">'.$currSubject.'</th>
                      <td>'.$countTotalSub.'</td>
                      <td>'.$countSub.'</td>
                      <td>'.$AttPercent.'%</td>
                    </tr>
                    ';
                  }

                  ?>
                </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>

  </body>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="bootstrap-4.5.3-dist/js/bootstrap.js"></script>
  <script>
    $("#profileDropdown").click(function(){
      $("#profileDropdownMenu").toggle("display");
    });
    $('#fullAttendaceBtn').click(function(){
      $('.att-table').toggle('display');
      $('.intro').toggle('display');
      $(this).html("Show Short table");
    });

  </script>
  <?php if($fullTable == true){
    echo "<script>
    $('.att-table').toggle('display');
    $('.intro').toggle('display');
    $(this).html('Show Short table');
     </script>";
  }?>
</html>
