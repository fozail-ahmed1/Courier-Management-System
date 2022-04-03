<?php
    $istrue = False;
    if(isset($_POST['rec_Name'])){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "courier_management_system";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " .  $conn->connect_error);
        }
        $istrue = true;
        session_start();
        $u = $_SESSION['myuserid'];
        $sql1 = "select cus_id from `customer` where user_id = '$u'";
        $res1 = $conn->query($sql1);
        $row1 = $res1->fetch_assoc();
        $c = $row1['cus_id'];
        $sql2 = "select max(cou_id) as m from `courier` where 1";
        $res2 = $conn->query($sql2);
        $row2 = $res2->fetch_assoc();
        if($row2['m'] == NULL){
            $c_id = '5001';
        }
        else {
            $c_id = $row2['m'] + 1;
        }
        $new = "select count(cou_id) as newc from `courier` where cus_id = $c";
        $n1 = $conn->query($new);
        $n2 = $n1->fetch_assoc();
        if($n2['newc'] == '0'){
            $rid = $c.'1';
        }
        else {
            $a = $n2['newc'] + 1;
            $rid = $c.$a;
        }
        $sql3 = "INSERT INTO `courier`(`cou_id`, `type`, `weight`, `cus_id`, `branch_id`) VALUES ('$c_id' , '$_POST[type]' , '$_POST[weight]' , '$c' , '8001')";
        $res3 = $conn->query($sql3);
        $sql4 = "INSERT INTO `receiver` (`rec_id`, `rec_Phone_No`, `rec_Address`, `rec_Name`) VALUES ('$rid','$_POST[rec_Phone_No]','$_POST[rec_Address]','$_POST[rec_Name]')";
        $res4 = $conn->query($sql4);
        $sql5 = "select max(track_id) as t from `tracking` where 1";
        $res5 = $conn->query($sql5);
        $row5 = $res5->fetch_assoc();
        if($row5['t'] == NULL){
            $t_id = '7001';
        }
        else {
            $t_id = $row5['t'] + 1;
        }
        $sql6 = "select Address , Cus_Name from `customer` where user_id = '$u'";
        $res6 = $conn->query($sql6);
        $row6 = $res6->fetch_assoc();
        $loc = $row6['Address'];
        $cname = $row6['Cus_Name'];
        $sql7 = "INSERT INTO `tracking`(`track_id`, `Location`, `rec_id`) VALUES ('$t_id' , '$loc' , '$rid')";
        $res7 = $conn->query($sql7);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Couriers</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        .body{
            background :#FFFAF0;

        }
        .register {
            background: -webkit-linear-gradient(left, #efbc95 , #e8a97a);
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
            padding: 12%;
            margin-top: -9%;
            color:white;
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
            color: white;
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

        .success>h3 {
            font-style: oblique;
            color: green;
        }
    </style>
</head>

<body>
    <!------ Include the above in your HEAD tag ---------->
    <div class="success">
        <?php
        if ($istrue == true) {
            echo "<h3> Hey $cname , Sit Back And Relax While Your Courier is Ready to Proceed for Destination!!</h3>
            <h3> Destination is : $_POST[rec_Address]</h3>
            <h5> Now You May move to <a href = 'userinfo.php'>Home</a> Page and enjoy our other services!!.</h5>";
        }
        ?>
    </div>
    <form action="new.php" method="post">
        <div class="container register">
            <div class="row">
                <div class="col-md-3 register-left">
                    <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                    <h3>Welcome</h3>
                    <p>You Are Just One Step away from sending the courier!</p>
                    <!-- <input type="submit" name="" value="Login" /><br /> -->
                </div>
                <div class="col-md-9 register-right">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading">Enter the Courier and Receiver Information.</h3>
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="cour_cont" placeholder="What Your Courier Contains?" value="" required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="weight" placeholder="Enter the Weight(in KGs)" value="" required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="type" placeholder="Enter the Type of Courier" value="" required/>
                                    </div>
                                </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="rec_Name" placeholder="Receiver's First Name*" value="" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="" placeholder="Receiver's Last Name *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="rec_Address" placeholder="Enter Destination Address *" value="" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Receiver's Email *" value="" required />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" minlength="10" maxlength="10" name="rec_Phone_No" class="form-control" placeholder="Receiver's Phone No*" value="" required/>
                                        </div>
                                        <input type="submit" class="btnRegister" value="SUBMIT">
                                        <a type="button" href="userinfo.php" class="btn btn-outline-secondary" style="margin-top:9.5%;margin-left:1%;background-color:orange ; border-style: none;color:white;">Cancel</a>
                                    </div>
                                </form>
                                <?php
    if(isset($_POST['submit'])) {
    if($nameErr == "" && $emailErr == "" && $mobilenoErr == "" && $genderErr == "" && $websiteErr == "" && $agreeErr == "") {
        echo "<h3 color = #FF0001> <b>You have sucessfully registered.</b> </h3>";
    } else {
        echo "<h3> <b>You didn't filled up the form correctly.</b> </h3>";
    }
    }
?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>
