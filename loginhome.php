<?php
if(!isset($_SESSION["username"])) {
    header('location:../index.php');
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Landing PAGE Html5 Template">

    <meta name="keywords" content="landing,startup,flat">

    <meta name="author" content="Made By GN DESIGNS">


    <title>eParking</title>


    <!-- // PLUGINS (css files) // -->

    <link href="assets/js/plugins/bootsnav_files/skins/color.css" rel="stylesheet">

    <link href="assets/js/plugins/bootsnav_files/css/animate.css" rel="stylesheet">

    <link href="assets/js/plugins/bootsnav_files/css/bootsnav.css" rel="stylesheet">

    <link href="assets/js/plugins/bootsnav_files/css/overwrite.css" rel="stylesheet">

    <link href="assets/js/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">

    <link href="assets/js/plugins/owl-carousel/owl.theme.css" rel="stylesheet">

    <link href="assets/js/plugins/owl-carousel/owl.transitions.css" rel="stylesheet">

    <link href="assets/js/plugins/Magnific-Popup-master/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">

    <!--// ICONS //-->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--// BOOTSTRAP & Main //-->

    <link href="assets/bootstrap-3.3.7/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="assets/css/main.css" rel="stylesheet">
</head>
<body style="background-color: grey">
<div class="page-preloader">

    <div class="spinner">

        <div class="rect1"></div>

        <div class="rect2"></div>

        <div class="rect3"></div>

        <div class="rect4"></div>

        <div class="rect5"></div>

    </div>

</div>
<nav class="navbar navbar-default navbar-fixed white no-background bootsnav navbar-scrollspy"
     data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">


    <div class="container">

        <!-- Start Header Navigation -->

        <div class="navbar-header">

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">

                <i class="fa fa-bars"></i>

            </button>

            <a class="navbar-brand" href="#brand">

                <img src="assets/img/logo.png" class="logo" alt="logo">

            </a>

        </div>

        <!-- End Header Navigation -->


        <!-- Collect the nav links, forms, and other content for toggling -->

        <div class="collapse navbar-collapse" id="navbar-menu">

            <ul class="nav navbar-nav navbar-right">

                <li class="active scroll"><a href="#home">Home</a></li>

                <li class="scroll"><a href="contact&faq.html">contact & faq</a></li>

                <li class="button-holder">

                    <button type="button" class="btn btn-blue navbar-btn" data-toggle="modal" data-target="#Logout">Log out
                    </button>

                </li>

            </ul>

        </div>

        <!-- /.navbar-collapse -->

    </div>

</nav>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->

<script src="assets/bootstrap-3.3.7/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

<script src="assets/js/plugins/owl-carousel/owl.carousel.min.js"></script>

<script src="assets/js/plugins/bootsnav_files/js/bootsnav.js"></script>

<script src="assets/js/plugins/typed.js-master/typed.js-master/dist/typed.min.js"></script>

<script src="assets/js/plugins/Magnific-Popup-master/Magnific-Popup-master/dist/jquery.magnific-popup.js"></script>

<script src="assets/js/main.js"></script>
<section id="faq" class="section-padding">
    <div class="row">
        <div class="container-fluid">
            <div class="col-md-78">
                <div class="story-content" style="color: #44c5ee; padding-left: 150px; padding-top: 50px;">
                    <h2>Welkom bij eParking, kies de gewenste locatie en reserveer uw oplaadpunt</h2>
                    <br>
                    <div class="card bg-warning " style="color: #000; max-width: 49rem; padding-left: 20px; padding-top: 20px; padding-bottom: 20px; border-radius: 25px">
                        <img class="card-img" src="assets/img/PR-Station-noord.jpg" alt="Card image" style="max-width: 450px; border-radius: 10px;">
                        <div class="card-img-overlay">
                            <h5 class="card-title">Parkeerplaats Noord</h5>
                            <p class="card-text">Aantal plekken vrij: 4</p>
                            <button type="button" class="btn btn-blue navbar-btn" data-toggle="modal" data-target="#Reserveer">Reserveer
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>