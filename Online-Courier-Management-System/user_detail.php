<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <style>
        .block{
            width : 25%;
            margin-left:auto;
            margin-right:auto;
            margin-top:50px;
            margin-bottom:50px;
            padding:20px;
            border: 3px #ffe9d5 outset;
            border-radius: 12px;
            background-color:#ffe9d5;
            box-shadow:2px 2px 8px 8px grey;
            /*box radius : 12px;*/
        }
        .line{
         line-height: 1.9rem;
         letter-spacing:1px;
         margin-left:10px;
         font-style:Georgia;
         color:black;
         text-transform:uppercase;

        }

        .home {
            padding : 9px 15px;
            margin-bottom : 50px;
            background-color : green;
            color : white;
            border-radius :8px;
            font-size :29px;
            font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            margin-left : 700px;
            cursor :pointer;
        }
        .error {
            margin-left : 23%;
            margin-top : 2%;
            font-size : 40px;
            color : brown;
        }

        .home > a {
            text-decoration:none;
            color: white;
        }
        body{
            background-color:#FFFAF0;
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
        $u=$_SESSION['u'];
        $sql1="select man_id from management where user_id=$u";
        $res1 = $conn->query($sql1);
        $row1 = $res1->fetch_assoc();
        $sql2="select branch_id from bran where man_id='$row1[man_id]'";
        $res2 = $conn->query($sql2);
        $row2 = $res2->fetch_assoc();
        $sql3="select Distinct(cus_id) as c_id from courier where branch_id='$row2[branch_id]'";
        $res3 = $conn->query($sql3);
        //$row3 = $res3->fetch_assoc();
        $sql4="select count(cus_id) as cnt from courier where branch_id='$row2[branch_id]'";
        $res4 = $conn->query($sql4);
        $row4 = $res4->fetch_assoc();
        if ($row4['cnt']==0)
        {
          echo "<div class = 'error'>
              It Seems that still customers have not registered!!<br>
              To Navigate back please <a href = 'index.php'>Click</a> Here !!!
              </div>";
        }
        else
        {

          while($row3 = $res3->fetch_assoc())
          {

              $sql5="select * from customer where cus_id='$row3[c_id]'";
              $res5 = $conn->query($sql5);
              $row5 = $res5->fetch_assoc();
            echo "<div class='block'>
            <div class ='line'> CUSTOMER'S ID:-$row5[cus_id]</div>
            <div class ='line'>CUSTOMER'S NAME:-$row5[Cus_Name]</div>
            <div class ='line'>CUSTOMER'S ADDRESS:-$row5[Address]</div>
            <div class ='line'>PHONE NO:-$row5[Phone_No]</div>
            <div class ='line'>USER ID:-$row5[user_id]</div>
            </div>";

          }
          echo "<br><button class = 'home'><a href = 'cnn.php'>HOME</a></button>";
            }



?>
