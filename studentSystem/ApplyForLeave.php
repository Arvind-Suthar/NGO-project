<?php
  include("session.php");
  $show_modal = false;
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $modalHeader = "Leave request submitted successfuly!";
  $modalBody = "Please wait for about 24 hours to get a reply.";
  $currStudentId = $_SESSION['studentId'];
  if($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check data that is sent from form


        $checkSql = "SELECT leaveId FROM leaverequest WHERE status = 'pending' and StudentId = '$currStudentId'";
        $checkResult = mysqli_query($db, $checkSql);
        $CheckRow = mysqli_fetch_array($checkResult, MYSQLI_ASSOC);
        $countofcheck = mysqli_num_rows($checkResult);
        if($countofcheck == "0"){
          if(isset($_POST["submit"])){
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
              $category = test_input($_POST["category"]);
              $lecture = test_input($_POST["lecture"]);
              $desc = test_input($_POST["desc"]);
              $leaveDate = test_input($_POST["date"]);

              if($_POST["desc"] != "" && $_POST["lecture"] != "" && $_POST["category"] != ""){
                $insertSql = "INSERT INTO `leaverequest` (`leaveId`, `StudentId`, `Subject`, `Category`, `Description`, `status`, `leaveDate`) VALUES (NULL, '$currStudentId', '$lecture', '$category', '$desc', 'pending', '$leaveDate')";
                $result = mysqli_query($db,$insertSql);
                $show_modal = true;
              }else{
                //last minute addition
              }
            }
          }
        }else{
          $modalHeader = "Leave request not sent!";
          $modalBody = "You already have a leave request pending. Wait for it to get approved.";
          $show_modal = true;
        }
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
          <div class="container bg-white intro">
              <div class="p-3 text-lightgray">
                <h5>Unable to Attend a Lecture?</h5>
                <h6>Tell us why</h6>
              </div>
              <div class="flex-center intro">
                <div class="leave-form py-4">
                  <form action="ApplyForLeave.php" method="post">
                    <div class="mb-3">
                      <label for="category" class="form-label">Category</label>
                      <select class="form-control" name="category" id="category" required>
                        <option value="">Select a category</option>
                        <option value="Sick">Sick</option>
                        <option value="Emergency">Emergency</option>
                        <option value="Festive">Festive</option>
                        <option value="Other">Other</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="subject" class="form-label">Lecture</label>
                      <select class="form-control" name="lecture" id="lecture" required>
                        <option value="">Select lecture you want leave from</option>
                        <option value="AWP">AWP</option>
                        <option value="EJ">EJ</option>
                        <option value="IOT">IoT</option>
                        <option value="Full Day">Full Day</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="date" class="form-label">Date of Leave</label>
                      <input type="date" name="date" id="date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                      <label for="desc" class="form-label">Description</label>
                      <textarea class="form-control" name="desc" rows="4" id="desc" placeholder="Expalin your situation..." required></textarea>
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
                    <input type="submit" name="submit" value="Submit" class="btn btn-outline-success btn-block" id="submit" data-bs-toggle="modal" data-bs-target="#successModal">
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
    /*$("#submit").click(function(){

    });*/
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
