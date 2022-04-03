<?php
    if (isset($_POST['user_id'])){
        /* connection established*/

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "courier_management_system";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " .  $conn->connect_error);
        }
        $ss = "SELECT * FROM `Portal` Where user_id='$_POST[user_id]'";
        $res = $conn->query($ss);
        $row = $res->fetch_assoc();
        if($row != NULL && $row['user_id'] == $_POST['user_id'] && $row['Password'] == $_POST['Password']){
                $ss1 = "SELECT name from `management` Where user_id='$_POST[user_id]'";
                $res1 = $conn->query($ss1);
                $row1 = $res1->fetch_assoc();
                $name= $row1['name'];
                session_start();
                $_SESSION['u']=$_POST['user_id'];
            }
        else {
            header("Location: managerlogin.php",true,301);
            echo '<script>alert("Welcome to Geeks for Geeks")</script>';
            //header("Location: managerlogin.php",true,301);
            exit();
             }

        $conn->close();
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin Page</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
      body{
        background-color:#FFFAF0;
      }
img {
    width : 45%;
    height : 45% !important;
    margin: 25px 50px 75px;
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
}
.container-fluid{
            background-color: #FADFD1 !important;
            font-family:Monaco;
            font-size:20px;
            border-style: none;
        }
.navbar-brand {
    color : #D2691E !important;
    font-size : 30px !important;
    font-family: "Times New Roman", Times, serif;
    border-style: none;
}
.navbar {
            background-color: #FADFD1 !important;
            font-family:Monaco;
            font-size:30px;
            color: black;
            border-style: none;
        }

  .copyright {
    text-align: center;
    background-color:#FFFAF0;
  }

  .credits {
    background-color:#FFFAF0;
    padding-top: 10px;
    text-align: center;
    font-size: 13px;
    color: #ccc;
  }
</style>
</head>
<body>
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="http://localhost/Online-Courier-Management-System/index.php"> JET EXPRESS
                <?php
                if(isset($name))
                echo "<script> alert('You Have Logged In Succesfully');</script>";?></a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="managerlogin.php" style="color:black; font-size:25px;">Logout</a></li>
                <li><a href="user_detail.php" style="color:black; font-size:25px;">Users Details </a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if(isset($name)) {
              ?>
                <li><a href="#" style="color:black; font-size:25px;"><span class="glyphicon glyphicon-user" style="color:black;" ></span> Welcome Admin <?php echo " $name" ?></a></li>
              <?php
              }
                else {
              ?>
                <li><a href="#" style="color:black; font-size:25px;"><span class="glyphicon glyphicon-user" style="color:black;" ></span> Welcome Back Admin!  </a></li>
              <?php
              }
              ?>
            </ul>
        </div>
        <div class="item active">
                <img src="img/admin.jpg" alt="ImageHandler">
        </div>
    </nav>

 <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Jet Express INC.</strong> All Rights Reserved.
      </div>
      <div class="credits">
        Designed by <a href="http://localhost/Online-Courier-Management-System/index.php">BY JET EXPRESS COURIER TEAM</a>
      </div>
  </div>

  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script>

  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>


</body>
</html>
