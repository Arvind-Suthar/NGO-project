<?php

include("session.php");
$show_modal = false;
$modalHeader = "Complaint submitted successfuly!";
$modalBody = "Please wait for about 24 hours to get a reply. Thanks for helping the school improve.";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if($_SERVER["REQUEST_METHOD"] == "POST") {

      $checkSql = "SELECT complainid FROM complaintable WHERE status = 'pending' and StudentName = '$user_check'";


      $countofcheck = 0;
      if(mysqli_query($db, $checkSql)){
        $CheckRow = mysqli_fetch_array(mysqli_query($db, $checkSql), MYSQLI_ASSOC);

        $countofcheck = mysqli_num_rows(mysqli_query($db, $checkSql));
      }
      /*if (mysqli_query($db, $checkSql)) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $checkSql . "<br>" . mysqli_error($db);
      }*/
      
      if($countofcheck == "0"){

        if(isset($_POST["sendcomplain"])){

          if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $subject = test_input($_POST["subject"]);
            $to = test_input($_POST["to"]);
            $complain = test_input($_POST["complain"]);

            if($_POST["subject"] != "" && $_POST["to"] != "" && $_POST["complain"] != ""){
              $nowDate = date("y-m-d");
              $insertSql = "INSERT INTO `complaintable` (`complainid`, `subject`, `reciever`, `complain`, `dateOfComplain`, `status`, `StudentName`) VALUES (NULL, '$subject', '$to', '$complain', '$nowDate', 'pending', '$user_check')";
              $result = mysqli_query($db,$insertSql);

              $show_modal = true;
            }else{
              //last minute addition
            }
          }
        }
      }else{
        $modalHeader = "Complaint not sent!";
        $modalBody = "You may already have a complain pending. Wait for it to get resolved. Thanks for helping the school improve.";
        $show_modal = true;
      }
   }
   include('NavTemplate.php');
?>
        <div class="col-95">
          <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
              <span class="navbar-text">
                Have a problem? Complain to us right now.
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
          <div class="flex-center">
            <div class="form-wrapper bg-white text-dark leave-form px-4 py-3 m-3">
              <form action="makeComplain.php" method="post">
                <div class="mb-3">
                  <label for="subject" class="form-label">Subject</label>
                  <select class="form-control" name="subject" id="subject" required>
                    <option value="">Select a subject</option>
                    <option value="2">AWP</option>
                    <option value="3">EJ</option>
                    <option value="4">IoT</option>
                    <option value="5">Other</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="to" class="form-label">To</label>
                  <select class="form-control" name="to" id="to" required>
                    <option value="">Reciever of your complaint</option>
                    <option value="1">Teacher</option>
                    <option value="2">Management</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="complain" class="form-label">Your complain</label>
                  <textarea name="complain" rows="6" class="form-control" placeholder="your complain..." id="complain" required></textarea>
                  <p class="text-danger"></p>
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


                <input type="submit" name="sendcomplain" value="Send Complain" class="btn btn-block btn-outline-success" />
              </form>
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
