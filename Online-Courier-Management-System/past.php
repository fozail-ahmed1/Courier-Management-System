<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracked Couriers</title>
    <style>
        .body{
            background:#FFFAF0;
        }
        .heading{
            background-color : #ffdab9;
            box-shadow: -2px -2px 2px 2px #ffdab9;
            /* margin : 5px; */
            font-size: 25px;
            font-family: "Helvetica";
            width : auto;
            /* margin: auto; */
            color : black;
            margin-top : 3px;
            margin-left: 3px;
            padding: 2px;
            padding-left : 10px;
            /* padding : 0.04px; */
            /* text-align : center; */
        }
        .block{
            border-radius : 5px;
            /* text-align : center; */
            background-color : #ffe9d5;
            border-style: outset;
            box-shadow: 2px 2px 12px 5px grey;
            width : 80%;
            margin : auto;
            margin-top : 40px;
            margin-bottom :40px;
            padding-top : px;
            padding-bottom : 10px;
             padding-left: 0px;
            /* padding-right: 20px; */
            letter-spacing: 1.5px;
        }
        .topic {
            background-color :  #ffe9d5;
            font-size: 25px;
            font-family: "Helvetica";
            width : auto;
            /* margin: auto; */
            color :  #D2691E;
            margin-top : 10px;
            margin-bottom : 10px;
            /* margin-left: 3px; */
            padding: 2px;
            padding-left : 5px;
            text-decoration: none;
        }
        .bold {
            font-family:monospace;
            color: green;
            margin-left: 5px;
            font-weight: bold;
            line-height: 2rem;
            font-size: 18px;
        }
        .gap {
            color : black;
            font-weight : 15px;
            font-family: cursive;
            margin-left : 10px;
        }
        .error {
            font-size : 40px;
            color : red;
        }
        .home {
            padding : 9px 15px;
            margin-bottom : 50px;
            background-color : green;
            color : white;
            border-radius :8px;
            font-size :29px;
            font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            margin-left : 550px;
            cursor :pointer;
            margin: 0;
            position: absolute;
            left: 50%;
            -ms-transform: translateX(-50%);
            transform: translateX(-50%);   
        }
        .home > a {
            text-decoration:none;
            color: white;
        }
        .naming {
            text-align : center;
            font-size : 40px;
            color : green;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-weight : bold;
        }
    </style>
</head>
<body>

</body>
</html>


<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "courier_management_system";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " .  $conn->connect_error);
    }
    session_start();
    $uid = $_SESSION['myuserid'];
    $sql1 = "select cus_id , Cus_Name from `customer` where user_id = '$uid'";
    $res1 = $conn->query($sql1);
    $row1 = $res1->fetch_assoc();
    $cid = $row1['cus_id'];
    $cname = $row1['Cus_Name'];
    $sql2 = "select cou_id from `courier` where cus_id = '$cid' order by cou_id desc";
    $res2 = $conn->query($sql2);
    $i = 0;
    $zero = "select count(cou_id) as cnt from `courier` where cus_id = '$cid'";
    $z = $conn->query($zero);
    $z1 = $z->fetch_assoc();
    $n = $z1['cnt'];
    if($n == '0'){
        echo "<div class = 'error'>
            Oops! It Seems that you have not yet sent any courier!<br>
            Navigate to <a href = 'userinfo.php'>Home</a> Page from Here and Start Your First Ever Courier!
            </div>";
    }
    else {
        echo "<div class = 'naming'>Welcome $cname, Here are your Tracked Couriers!</div>";
        while($row2 = $res2->fetch_assoc()){
            $gh = $n - $i;
            $c = $cid.$gh;
            $s1 = "select * from `receiver` where rec_id = '$c'";
            $r1 = $conn->query($s1);
            $rw1 = $r1->fetch_assoc();
            $s2 = "select * from `courier` where cou_id = '$row2[cou_id]'";
            $r2 = $conn->query($s2);
            $rw2 = $r2->fetch_assoc();
            $s3 = "select * from `tracking` where rec_id = '$c'";
            $r3 = $conn->query($s3);
            $rw3 = $r3->fetch_assoc();
            echo "<div class = 'block'>
                <div class = 'heading'>
                Your Order # $gh :
                </div><br>
                <div class = 'topic'>
                    Courier Details
                </div>
                <div class = 'bold'>Courier Id : </div> <span class = 'gap'>$row2[cou_id]</span><br>
                <div class = 'bold'>Courier Type : </div> <span class = 'gap'>$rw2[type]</span><br>
                <div class = 'bold'>Courier Weight :</div> <span class = 'gap'>$rw2[weight]</span><br>
                <div class = 'topic'>
                    Receiver Details
                </div>
                <div class = 'bold'>Receiver's Name : </div> <span class = 'gap'>$rw1[rec_Name]</span><br>
                <div class = 'bold'>Receiver's Phone No : </div>  <span class = 'gap'>$rw1[rec_Phone_No]</span><br>
                <div class = 'bold'>Receiver's Address : </div>  <span class = 'gap'>$rw1[rec_Address]</span><br>
                <div class = 'topic'>
                    Tracking Details
                </div>
                <div class = 'bold'>Tracking Id : </div> <span class = 'gap'>$rw3[track_id]</span><br>
                <div class = 'bold'>Tracking Location : </div> <span class = 'gap'>$rw3[Location]</span><br>
                </div>";
            $i++;
        }
        echo "<br><button class = 'home'><a href = 'userinfo.php'>HOME</a></button>";
    }

?>
