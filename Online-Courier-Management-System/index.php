<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Jet Express</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .d-block {
            width : 800px !important;
            height : 700px !important;
            margin: 10px 0 0 0;
            padding: 15px 100px 100px 50px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }
        .slide {
            width : 100% !important;
            height : 100% !important;
            margin : 0px !important;
            
        }
        .navbar {
            background-color: #FADFD1 !important;
            font-family:Monaco;
            font-size:30px;
        }

        html {
            scroll-behavior: smooth;
        }

        .about-us {
            width: 80%;
            padding: 20px;
            font-size: 30px;
            margin: auto;
            border-radius: 20px;
            border-style: outset;
            border-color: #ffe9d5;
            box-shadow: 2px 2px 12px 5px grey;
            background-color: #ffe9d5;
            margin-top: 40px;
            margin-bottom: 40px;
        }

        .about-us>h1 {
            color: #D2691E;
            margin-top: 30px;
            margin-bottom: 30px;
            letter-spacing: 2px;
            font-family: 'Adamina';
            text-align: center;
            margin-left: auto;
            margin-right: auto;
        }

        .about-us>p {
            /* line-height:1rem; */
            letter-spacing: 1px;
            font-family:  'Trebuchet MS', sans-serif;
            font-size: 21px;
        }

        footer {
            width: 80%;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            letter-spacing: 2px;
            margin-top: 20px;
            margin-bottom: 20px;
            padding: 30px;
            line-height: 34px;
            background-color: #ffe9d5;
            margin-left: auto;
            margin-right: auto;
            border-radius: 12px;
            border-color: #ffe9d5;
            border-style: outset;
            box-shadow: 2px 2px 12px 5px grey;
        }

        footer>img {
            width: 30px;
            height: 25px;
        }

        footer>h1 {
            text-align: center;
            color: #D2691E;
            font-family:'Adamina';
        }

        footer>h4 {
            word-spacing: 120px;
            text-align:center;
            font-family:  'Trebuchet MS', sans-serif;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="http://localhost/Online-Courier-Management-System/index.php">JET EXPRESS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Login
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="userlogin.php">User Login</a>
                        <a class="dropdown-item" href="managerlogin.php">Manager Login</a> 
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About Us</a>
                </li>
                <li class="nav-item right">
                    <a class="nav-link" href="#contact">Contact Us</a>
                </li>
            </ul>
        </div>
    </nav>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="img/rider.jfif" alt="Second slide">
                <!-- <h1 class="slide-text">Your HEALTH is our first Priority</h1> -->
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/gang.jfif" alt="First slide">
                <!-- <h1 class="slide-text">Fastest Courier</h1> -->
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/Truck_2_0.gif" alt="Third slide">
                <!-- <h1 class="slide-text">Most Trustworth Service</h1> -->
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="about-us" id="about">
        <h1 class="head"> JET EXPRESS : COURIER SERVICE </h1>
        <p>
        The Jet Express Courier Service provides pickup and delivery service six days a week. Our goal is to provide a faster, more cost effective delivery of packages to your clients.The Jet Express Courier Service can help standardize delivery times.
        </p>
        <br>
        <p>
        Jet Express Logistic is one of the leading Integrated Service Providers in the logistics. We have become company specializing express delivery service from delivery of documents and parcels to customer all over India . Our business philosophy is to offer the best value for money and best advisory depending upon the requirements of the clients.
        </p>
        <br>
        <p>
        We can be contacted at JetExpress.in for website related queries. JetExpress.in is an independent web application to help users to track their consignments online. For your queries, contact to respective courier company customer care. JetExpress.in is a quick and easy way to track your parcels though popular courier services in India. You can find details of each courier company at one place and track your parcels at the same place. All product and company names are trademarks™ or registered trademarks® of their respective holders. Use of them does not imply any affiliation with or endorsement by them.
        </p>
    </div>
    <footer class="cont" id="contact">
        <h1> OUR BRANCHES </h1><br>
        <h4>  Bangalore Pune Chennai Mumbai New-Delhi </h4><br>
        <img src="img/email.jpg">
         E-mail : JetExpress@gmail.com / JetExpresssService@gmail.com<br><br>
        <img src="img/phone.png">
        Phone : +91-9999555444 / +91-6666666666<br><br>
        <img src="img/address.png">
        Address : 203 , 2nd Floor, E-Wing , Hiranandani Complex , Jayanagar , Bangalore - 560029 .
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>