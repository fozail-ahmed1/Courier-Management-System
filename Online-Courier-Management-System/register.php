<?php
    $istrue = false;
if(isset($_POST['Cus_Name'])){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "courier_management_system";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " .  $conn->connect_error);
    }
    $sql = "Select max(cus_id) as m from `customer`";
    $res = $conn->query($sql);
    $row = $res->fetch_assoc();
    if($row['m'] == NULL){
        $newcustid = 18031040;
        $newuserid = 2001;
    }
    else {
        $newcustid = $row['m'] + 1;
        $sql1 = "select max(user_id) as u from `portal`";
        $res1 = $conn->query($sql1);
        $row1 = $res1->fetch_assoc();
        $newuserid = $row1['u'] + 1;
    }
    $password = "$_POST[Cus_Name]".'@'.'123';
    $sql3 = "INSERT INTO `portal` (`user_id` , `Password`) VALUES ('$newuserid' , '$password')";
    $res3 = $conn->query($sql3);
    $sql2 = "INSERT INTO `customer` (`cus_id`, `Cus_Name`, `Address`, `Phone_No`, `user_id`) VALUES ('$newcustid','$_POST[Cus_Name]','$_POST[Address]','$_POST[Phone_No]','$newuserid')";
    $res4 = $conn->query($sql2);
    $istrue = true;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        .body{
            background :#FFFAF0;

        }
        .register {
            background: -webkit-linear-gradient(left, #efbc95 , #e8a97a );
            margin-top: 3%;
            padding: 3%;
        }

        .register-left {
            text-align: center;
            color: black;
            margin-top: 4%;
        }

        .register-left h3 {
            text-align: center;
            color: #D2691E;
            font:10px;
            margin-top: 4%;
        }

        .register-left input {
            border: none;
            border-radius: 1.5rem;
            padding: 2%;
            width: 60%;
            background: #f8f9fa;
            font-weight: bold;
            color: #383d41;
            margin-top: 30%;
            margin-bottom: 3%;
            cursor: pointer;
        }

        .register-right {
            background: #f8f9fa;
            border-top-left-radius: 10% 50%;
            border-bottom-left-radius: 10% 50%;
        }

        .register-left img {
            margin-top: 15%;
            margin-bottom: 5%;
            width: 25%;
            -webkit-animation: mover 2s infinite alternate;
            animation: mover 1s infinite alternate;
        }

        @-webkit-keyframes mover {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-20px);
            }
        }

        @keyframes mover {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-20px);
            }
        }

        .register-left p {
            color:white;
            padding: 12%;
            margin-top: -9%;
        }

        .register .register-form {
            padding: 10%;
            margin-top: 10%;
        }

        .btnRegister {
            float: right;
            margin-top: 10%;
            border: none;
            border-radius: 1.5rem;
            padding: 2%;
            background: green;
            color: #fff;
            font-weight: 600;
            width: 50%;
            cursor: pointer;
        }

        .register .nav-tabs {
            margin-top: 3%;
            border: none;
            background: #0062cc;
            border-radius: 1.5rem;
            width: 28%;
            float: right;
        }

        .register .nav-tabs .nav-link {
            padding: 2%;
            height: 34px;
            font-weight: 600;
            color: #fff;
            border-top-right-radius: 1.5rem;
            border-bottom-right-radius: 1.5rem;
        }

        .register .nav-tabs .nav-link:hover {
            border: none;
        }

        .register .nav-tabs .nav-link.active {
            width: 100px;
            color: #0062cc;
            border: 2px solid #0062cc;
            border-top-left-radius: 1.5rem;
            border-bottom-left-radius: 1.5rem;
        }

        .register-heading {
            text-align: center;
            margin-top: 8%;
            margin-bottom: -15%;
            color: #495057;
        }
        .success {
            text-align: center;
        }
        .success > h3 {
            font-style: oblique;
            color : green;
        }
    </style>
</head>

<body>
    <!------ Include the above in your HEAD tag ---------->
    <div class = "success">
        <?php
        if($istrue == true){
            echo "<h3> Hey $_POST[Cus_Name] , You are registered successfully on our portal.</h3>
            <h3> Your User_Id = $newuserid  Your Password = $password</h3>
            <h5> Now You May move to <a href = 'index.php'>Home</a> Page and Login Again with your user_id and password.</h5>";
        }
        ?>
    </div>
    <form action="register.php" method="post">
        <div class="container register">
            <div class="row">
                <div class="col-md-3 register-left">
                    <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                    <h3>Welcome</h3>
                    <p>You Are Just One Step away for your safe and fast couriers!</p>
                    <!-- <input type="submit" name="" value="Login" /><br /> -->
                </div>
                <div class="col-md-9 register-right">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading">Register Here And Be a Member of Our Family</h3>
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="Cus_Name" placeholder="Last Name*" value="" required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="Last Name" placeholder="First Name *" value="" required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="Address" placeholder="Enter Your Address *" value="" required/>
                                    </div>
                                    <div class="form-group">
                                        <div class="maxl">
                                            <label class="radio inline">
                                                <input type="radio" name="gender" value="male" checked>
                                                <span> Male </span>
                                            </label>
                                            <label class="radio inline">
                                                <input type="radio" name="gender" value="female">
                                                <span>Female </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <form action="register.php" method="post">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Your Email *" value="" required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" minlength="10" maxlength="10" name="Phone_No" class="form-control" placeholder="Your Phone *" value="" required/>
                                    </div>
                                    <input type="submit" class="btnRegister" value="Register" >
                                    <a type="button" href="userlogin.php" class="btn btn-outline-secondary" style="margin-top:10%;margin-left:20%;border-style: none; background-color:orange;color:white;">Cancel</a>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>
