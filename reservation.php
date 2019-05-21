<?php
session_start();

$csrf = $_SESSION['csrf'];

//create a key for hash_hmac function
if (empty($_SESSION['csrf']))
    $_SESSION['csrf'] = bin2hex(openssl_random_pseudo_bytes(32));

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

    <title>Reserveren</title>

    <!-- // files for datetimepicker// -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap-datetimepicker.css"> -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/css/bootstrap-datetimepicker-standalone.css">
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.43/js/bootstrap-datetimepicker.min.js"></script>

    <link href="assets/css/main.css" rel="stylesheet">
    <title>Reserveren</title>

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

</head>


<body>

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

                <li class="active scroll"><a href="#home">Reserveren</a></li>

                <li class="scroll"><a href="#about">About</a></li>

                <li class="scroll"><a href="#services">Services</a></li>

                <li class="scroll"><a href="#contact">Contact</a></li>

                <li class="scroll"><a href="faq.html">Faq</a></li>

                <li class="button-holder">

                    <button type="button" class="btn btn-blue navbar-btn" data-toggle="modal" data-target="#SignIn">Sign
                        out
                    </button>

                </li>

            </ul>

        </div>

        <!-- /.navbar-collapse -->

    </div>

</nav>

<!--//** Banner**//-->

<section id="home">

    <div class="container">

        <div class="row">

            <!-- Introduction -->

            <div class="col-md-6 caption">

                <h1>eParking</h1>

                <p><b>Heeft u problemen met een parkeerplek vinden waar u ook kunt opladen? Weer rondjes rijden tot er
                        een plek vrij is? Ver geparkeerd staan omdat alle oplaad plekken bezet zijn? Vanaf nu niet meer
                        met eParking!</b></p>

                <div class="centered" id="centered" style="align-content: center">
                    <form class="datum-tijd" action="/reservationBackend.php" method="POST">
                        <h2 class="text-center">Kies een datum en tijd</h2>
                        <hr>
                        <div class='col-md-5'>
                            <h2>van:</h2>
                            <div class="form-group">
                                <div class='input-group date' id='datetimepicker6'>
                                    <input name="Van" type='text' class="form-control" placeholder="Van"/>
                                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
                                </div>
                            </div>
                        </div>
                        <div class='col-md-5'>
                            <h2>tot:</h2>
                            <div class="form-group">
                                <div class='input-group date' id='datetimepicker7'>
                                    <input name="Tot" type='text' class="form-control" placeholder="Tot"/>
                                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
                                </div>
                            </div>
                        </div>
                        <input name="submit" type="submit" class="btn btn-blue" value="Reserveer!">
                        <input type="hidden" name="csrf" value="<?php echo $csrf ?>">
                    </form>
                </div>
                <script type="text/javascript">
                    $(function () {
                        $('#datetimepicker6').datetimepicker({
                            format: 'DD-MM-YYYY HH:mm',
                            stepping: 60
                        });
                        $('#datetimepicker7').datetimepicker({
                            format: 'DD-MM-YYYY HH:mm',
                            stepping: 60,
                            useCurrent: false
                        });
                        $("#datetimepicker6").on("dp.change", function (e) {
                            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
                        });
                        $("#datetimepicker7").on("dp.change", function (e) {
                            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
                        });
                    });
                </script>
            </div>
        </div>

    </div>

</section>


<!--========================================

       Footer

========================================-->


<footer>

    <div class="container">

        <div class="row">

            <div class="footer-caption">

                <img src="assets/img/logo.png" class="img-responsive center-block" alt="logo">

                <hr>

                <h5 class="pull-left">eParking, &copy;2019 All rights reserved</h5>

                <ul class="liste-unstyled pull-right">

                    <li><a href="#facebook"><i class="fa fa-facebook"></i></a></li>

                    <li><a href="#twitter"><i class="fa fa-twitter"></i></a></li>

                    <li><a href="#linkedin"><i class="fa fa-linkedin"></i></a></li>

                    <li><a href="#instagram"><i class="fa fa-instagram"></i></a></li>

                </ul>

            </div>

        </div>

    </div>

</footer>


<script src="assets/bootstrap-3.3.7/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

<script src="assets/js/plugins/owl-carousel/owl.carousel.min.js"></script>

<script src="assets/js/plugins/bootsnav_files/js/bootsnav.js"></script>

<script src="assets/js/plugins/typed.js-master/typed.js-master/dist/typed.min.js"></script>

<script src="assets/js/plugins/Magnific-Popup-master/Magnific-Popup-master/dist/jquery.magnific-popup.js"></script>

<script src="assets/js/main.js"></script>

</body>

</html>