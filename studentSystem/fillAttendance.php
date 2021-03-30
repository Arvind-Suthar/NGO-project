<?php
include('session.php');
include('NavTemplate.php');

$show_modal = false;
$modalHeader = "Attendance added successfuly!";
$modalBody = "";

$sqlStudent = "SELECT * from studentlogintable";
$resultStudent = mysqli_query($db, $sqlStudent);
$row = mysqli_num_rows($resultStudent);
$dateNow = date("Y-m-d");


if($_SERVER["REQUEST_METHOD"] == "POST"){
  if(isset($_POST["fillAttendance"])){
    $attendanceDate = $_POST["Attdate"];
    if($attendanceDate <= $dateNow){
      mysqli_select_db($db, "attendacereport");
      $countFindSql = 0;
      $findSql = "SELECT AttendanceId FROM synctable WHERE lectureDate = '$attendanceDate'";
      if(mysqli_query($db, $findSql)){
        $rowFindSql = mysqli_fetch_array(mysqli_query($db, $findSql),MYSQLI_ASSOC);
        $countFindSql = mysqli_num_rows(mysqli_query($db, $findSql));
      }else{
        echo "Error".mysqli_error($db);
      }
      foreach($resultStudent as $row){
        $studentId = $row["studentIndex"];
        $currAttendace = $_POST[$studentId];
        $sub = $_SESSION['subject'];
        if($countFindSql == 0){
          $fillAttendanceSql = "INSERT INTO `$studentId` (`lectureDate`, `$sub`) VALUES ('$attendanceDate', '$currAttendace')";
          mysqli_query($db, $fillAttendanceSql);
        }else{
          $CurrId = $rowFindSql['AttendanceId'];
          $editAttendanceSql = "UPDATE `$studentId` SET `$sub` = '$currAttendace' WHERE `$studentId`.`AttendanceId` = $CurrId";
          mysqli_query($db, $editAttendanceSql);
        }
      }
      if($countFindSql == 0){
        $syncAttendanceSql = "INSERT INTO `synctable` (`AttendanceId`, `lectureDate`) VALUES (NULL, '$attendanceDate')";
        mysqli_query($db, $syncAttendanceSql);
      }
      $show_modal = true;
    }else{
      $modalHeader = "Selected date is in future!";
      $modalBody = "Please select a valid date";
      $show_modal = true;
    }
  }
}
?>
        <div class="col-95">
          <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
              <span class="navbar-text">
                Fill in today's Attendance
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

          <div class="container">
            <div class="row justify-content-center p-2 bg-white">
              <div class="col-lg-11">
                <form action="fillAttendance.php" method="post">

                  <div class="container text-dark p-4">
                    <div class="row align-items-center">
                      <div class="col-md-4">
                        <h5>Select date to fill attendance:</h5>
                      </div>
                      <div class="col-md-5">
                        <input type="date" name="Attdate" class="form-control" required>
                      </div>
                    </div>
                  </div>


                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Student Name</th>
                        <th>Roll No.</th>
                        <th>P</th>
                        <th>A</th>
                        <th>L</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach($resultStudent as $row){
                          echo '
                            <tr>
                              <td>'.ucfirst($row["username"]).'</td>
                              <td>'.$row["rollNo"].'</td>
                              <td><input type="radio" name="'.$row["studentIndex"].'" value="P" required></td>
                              <td><input type="radio" name="'.$row["studentIndex"].'" value="A"></td>
                              <td><input type="radio" name="'.$row["studentIndex"].'" value="L"></td>
                            </tr>
                          ';
                        }
                      ?>
                    </tbody>
                  </table>

                  <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><?php echo $modalHeader; ?></h5>
                          <button type="button" class="btn btn-danger btn-sm rounded-pill" data-bs-dismiss="modal" aria-label="Close" onclick="myModal.toggle()"><i class="fa fa-times" aria-hidden="true"></i></button>
                        </div>
                        <div class="modal-body">
                          <?php echo $modalBody; ?>
                        </div>
                      </div>
                    </div>
                  </div>


                  <input type="submit" name="fillAttendance" value="Submit" class="btn btn-success" />
                  <input type="reset" name="resetform" value="Reset Form" class="btn btn-outline-danger" />
                </form>
              </div>
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
  </script>
  <script>
  var myModal = new bootstrap.Modal(document.getElementById('successModal'), {
    keyboard: false
  });
  </script>
  <?php if($show_modal == true){
    echo "<script> myModal.toggle();</script>";
  }?>
</html>
