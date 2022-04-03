<?php
if (isset($_POST['user_id'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "courier_management_system";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " .  $conn->connect_error);
    }
    $sql = "SELECT * FROM `portal` where user_id = '$_POST[user_id]'";
    $res = $conn->query($sql);
    $rows = $res->fetch_assoc();
    if ($rows != NULL && ($rows['Password']) == $_POST['Password']) {
        $sql1 = "Select Cus_Name from `customer` where user_id = '$_POST[user_id]'";
        $res1 = $conn->query($sql1);
        $row1 = $res1->fetch_assoc();
        $cname = $row1['Cus_Name'];
        session_start();
        $_SESSION['myuserid'] = $_POST['user_id'];
    } else {
        echo "<script>alert('Wrong Credentials entered!!');</script>";
        header("Location: index.php", true, 301);

        // exit();
        // echo "Sorry!! No Such Entry Exists!!!!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
         body{
              background-color:#FFFAF0;
         }
         img {
              width : 50%;
              height : 500px !important;
              margin-left :auto;
              margin-right :auto;
         }

         .navbar {
              background-color: #FADFD1 !important;
              font-family:Monaco;
              font-size:26px;
              border-style: none;
         }

         .navbar-brand {
              color : #D2691E !important;
              font-size : 30px !important;
              font-family: "Times New Roman", Times, serif;
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
                <a class="navbar-brand" href="http://localhost/Online-Courier-Management-System/index.php">JET EXPRESS</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="new.php" style="color:black;">New Couriers</a></li>
                <li><a href="past.php"  style="color:black;">Tracked Couriers</a></li>
                <!-- <li><a href="#">Track Courier</a></li> -->
            </ul>
            <ul class="nav navbar-nav navbar-right">
	<?php
                if(isset($cname)) {
              ?>
                <li class="active"><a href="#" style=" background-color: #FADFD1 !important; color:black;"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo " $cname" ?></a></li>
                <li class="active"><a href="userlogin.php" style=" background-color: #FADFD1 !important; color:black;">Logout</a></li>
              <?php
              }
                else {
              ?>
                <li class="active"><a href="#" style=" background-color: #FADFD1 !important; color:black;"><span class="glyphicon glyphicon-user"></span> Welcome Back!</a></li>
                <li class="active"><a href="userlogin.php" style=" background-color: #FADFD1 !important; color:black;" >Logout</a></li>
              <?php
              }
              ?>
            </ul>
        </div>
    </nav>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="img/img1.gif" alt="Los Angeles">
            </div>

            <div class="item">
                <img src="img/img2.jfif" alt="Chicago">
            </div>

            <div class="item">
                <img src="img/img3.jfif" alt="New York">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>

        <?php
        if(isset($cname))
        echo "<script>alert('You are successfully Logged In');</script>"?>
    </div>
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Jet Express INC.</strong> All Rights Reserved.
      </div>
      <div class="credits">
        Designed by <a href="http://localhost/Online-Courier-Management-System/index.php">BY JET EXPRESS COURIER TEAM</a>
      </div>
  </div>
</body>
</html>
