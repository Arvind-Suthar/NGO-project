<?php
include('session.php');
include('NavTemplate.php');
$show_modal = false;
$Err = "";
$modalHeader = "Student added successfuly!";
$modalBody = "Yay! one more added to the learning club.";


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST["submit"])){
    $studentName = test_input($_POST["studentName"]);
    $rollNo = test_input($_POST["rollNo"]);
    $email = test_input($_POST["email"]);

    $countofcheck = 0;
    $sql = "SELECT studentIndex FROM studentlogintable WHERE rollNo = '$rollNo'";
    if(mysqli_query($db, $sql)){
      $CheckRow = mysqli_fetch_array(mysqli_query($db, $sql), MYSQLI_ASSOC);
      $countofcheck = mysqli_num_rows(mysqli_query($db, $sql));
    }

    if($countofcheck == "0"){
      if($_POST["studentName"] != "" && $_POST["rollNo"] != "" && $_POST["email"] != ""){
        $pass = $studentName.'@'.$rollNo;
        $insertSql = "INSERT INTO `studentlogintable` (`studentIndex`, `username`, `password`, `rollNo`, `email`) VALUES (NULL, '$studentName', '$pass', '$rollNo', '$email')";
        $result = mysqli_query($db,$insertSql);
        /*if (mysqli_query($db, $insertSql)) {
          echo "New record created successfully";
        } else {
          echo "Error: " . $insertSql . "<br>" . mysqli_error($db);
        }*/

        $studentIdSql = "SELECT studentIndex FROM studentlogintable WHERE rollNo = '$rollNo'";
        $studentIdResult = mysqli_query($db, $studentIdSql);


        $rowId = mysqli_fetch_assoc($studentIdResult);
        $studentId = $rowId["studentIndex"];

        $show_modal = true;
        mysqli_select_db($db, "attendacereport");
        $makeSql = "CREATE TABLE `attendacereport`.`$studentId` ( `AttendanceId` INT NOT NULL AUTO_INCREMENT , `lectureDate` DATE NOT NULL , `AWP` VARCHAR(2) NULL , `EJ` VARCHAR(2) NULL , `IOT` VARCHAR(2) NULL  , PRIMARY KEY (`AttendanceId`)) ENGINE = MyISAM;";
        mysqli_query($db, $makeSql);
      }else{
        $modalHeader = "Dont mess with the code!";
        $modalBody = "I have checked all the end cases, so dont bother trying";
        $show_modal = true;
      }
    }else{
      $modalHeader = "Student not added!";
      $modalBody = "There may already exist a student with the same roll no. you provided. Please check your input and try again.";
      $show_modal = true;
    }
  }
}
?>
        <div class="col-95">
          <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
              <span class="navbar-text">
                Add a new student
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
            <div class="row justify-content-center my-3 mx-2">
              <div class="col-lg-8 bg-white">
                <div class="form-header pt-3 pb-1">
                  <h5>Enter Student Detail</h5>
                </div>
                <div class="line"></div>
                <form action="addStudent" method="post">
                  <div class="mb-3 mt-3">
                    <label for="studentName">Student Name: </label>
                    <input type="text" name="studentName" placeholder="Name" class="form-control" id="studentName" required/>
                  </div>
                  <div class="mb-3">
                    <label for="RollNo">Student Roll Number: </label>
                    <input type="number" name="rollNo" placeholder="Roll No." class="form-control" id="RollNo" required/>
                  </div>
                  <div class="mb-3">
                    <label for="RollNo">Student Email: </label>
                    <input type="email" name="email" placeholder="student@email.here" class="form-control" id="email" required/>
                  </div>


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


                  <input type="submit" name="submit" value="Add Student" class="btn btn-block btn-outline-success mb-3" />
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
