<?php
session_start();
if (empty($_SESSION['csrf'])) {
	$_SESSION['csrf'] = bin2hex(openssl_random_pseudo_bytes(32));
}
if(!empty($_SESSION["username"])) {
    header('location:src/afterlogin.php');
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



<body>



    <!--======================================== 

           Preloader

    ========================================-->

    <div class="page-preloader">

        <div class="spinner">

            <div class="rect1"></div>

            <div class="rect2"></div>

            <div class="rect3"></div>

            <div class="rect4"></div>

            <div class="rect5"></div>

        </div>

    </div>

    <!--======================================== 

           Header

    ========================================-->



    <!--//** Navigation**//-->

    <nav class="navbar navbar-default navbar-fixed white no-background bootsnav navbar-scrollspy" data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">



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

                    <li class="scroll"><a href="#about">About</a></li>

                    <li class="scroll"><a href="#services">Services</a></li>

                    <li class="button-holder">

                        <button type="button" class="btn btn-blue navbar-btn" data-toggle="modal" data-target="#SignIn">Sign in</button>

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

                    <h2>

                           Ik ben

                            <span class="animated-text"></span>

                            <span class="typed-cursor"></span>

                        </h2>

                    <p><b>Heeft u problemen met een parkeerplek vinden waar u ook kunt opladen? Weer rondjes rijden tot er een plek vrij is? Ver geparkeerd staan omdat alle oplaad plekken bezet zijn? Vanaf nu niet meer met eParking!</b></p>

                    </a>

                </div>

                <!-- Sign Up -->

                <div id="signup-form" class="col-md-5 col-md-offset-1">

                    <form class="signup-form" action="/register.php" method="POST">

                        <h2 class="text-center">Registreer nu</h2>

                        <hr>

                        <div class="form-group">

                            <input name="registerFullname" type="text" class="form-control" placeholder="Full Name" required="required">

                        </div>

                        <div class="form-group">

                            <input name="registerEmail" type="email" class="form-control" placeholder="Email Address" required="required">

                        </div>

                        <div class="form-group">

                            <input name="registerUsername" type="text" class="form-control" placeholder="User Name" required="required">

                        </div>

                        <div class="form-group">

                            <input name="registerNumberplate" type="text" class="form-control" placeholder="Numberplate" required="required">

                        </div>

                        <div class="form-group">

                            <input name="registerPassword" type="password" class="form-control" placeholder="Password" required="required" minlength="8">

                        </div>

                        <div class="form-group">

                            <input name="registerPassword2" type="password" class="form-control" placeholder="Password" required="required" minlength="8">
                            <input type="hidden" name="csrf" value=<?php echo '"'. $_SESSION['csrf'] . '"';?>>

                        </div>

                        <div class="form-group text-center">

                            <button type="submit" class="btn btn-blue btn-block">Registreer</button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </section>



    <!--======================================== 

           About Us

    ========================================-->



    <section id="about" class="section-padding">

        <div class="container">

            <h2>Over ons</h2>

            <p>Wij zijn een fris bedrijf wat belang heeft voor een makkelijke toekomst.</p>

            <div class="row">

                <div class="col-md-4">

                    <div class="icon-box">

                        <i class="material-icons">favorite</i>

                        <h4>Simple To Use</h4>

                        <p>Altijd een parkeerplek zolang je maar op tijd reserveert. Verder hoef je nergens over na te denken.</p>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="icon-box">

                        <i class="material-icons">flash_on</i>

                        <h4>Powerful</h4>

                        <p>Simpel in gebruik! Maak een account en reserveren maar!</p>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="icon-box">

                        <i class="material-icons">settings</i>

                        <h4>Easy To Customize</h4>

                        <p>Deze app is toegankelijk voor iedereen! Zo hoef je je geen zorgen meer te maken om die ene oplaadpaal bij je werk, als je hem hebt gereserveerd is hij voor jou.</p>

                    </div>

                </div>

            </div>

        </div>

    </section>



    <!--======================================== 

           Story

    ========================================-->



    <section id="story">

        <div class="container-fluid">

            <div class="row">

                <!-- Img -->

                <div class="col-md-6 story-bg">

                </div>

                <!-- Story Caption -->

                <div class="col-md-6">

                    <div class="story-content">

                        <h2>Ons success verhaal</h2>

                        <p class="story-quote">

                            "Success is het vinden van blijdschap in de kleine dingen, tot het punt waar je er niet meer over na hoeft te denken."

                        </p>

                        <div class="story-text">

                            <p>Sinds begin 2019 hervormen en herdefiniëren wij elektrisch parkeren in Amsterdam, en zorgen wij ervoor dat parkeren nog nooit zo makkelijk is geweest.</p>

                        </div>

                        <a href="#" class="btn btn-white">Lees meer</a>

                    </div>

                </div>

            </div>

        </div>

    </section>



    <!--======================================== 

           Services

    ========================================-->



    <section id="services" class="section-padding">

        <div class="container">

            <h2>Onze services</h2>

            <p>Als klant wil je natuurlijk wel dat je bij een fijn bedrijf reserveert, daarvoor hebben wij de volgende services.</p>

            <div class="row">

                <div class="col-md-3">

                    <div class="icon-box">

                        <i class="material-icons">thumb_up</i>

                        <h4>Great Quality</h4>

                        <p>Quality ipsum dolor sit amet, consectetur adipisicing elit. Beatae quod error quis.</p>

                    </div>

                </div>

                <div class="col-md-3">

                    <div class="icon-box">

                        <i class="material-icons">euro_symbol</i>

                        <h4>Best Price</h4>

                        <p>Price ipsum dolor sit amet, consectetur adipisicing elit. Beatae quod error quis.</p>

                    </div>

                </div>

                <div class="col-md-3">

                    <div class="icon-box">

                        <i class="material-icons">forum</i>

                        <h4>24/7 Support</h4>

                        <p>Support ipsum dolor sit amet, consectetur adipisicing elit. Beatae quod error quis.</p>

                    </div>

                </div>

                <div class="col-md-3">

                    <div class="icon-box">

                        <i class="material-icons">view_carousel</i>

                        <h4>UX/UI Design</h4>

                        <p>Quality ipsum dolor sit amet, consectetur adipisicing elit. Beatae quod error quis.</p>

                    </div>

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



    <!--======================================== 

           Modal

    ========================================-->



    <!-- Modal -->

    <div class="modal fade" id="SignIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    <h4 class="modal-title text-center" id="myModalLabel">Sign In</h4>

                </div>

                <div id="loginform" class="modal-body">

                    <form class="signup-form" action="/login.php" method="POST">

                        <div class="form-group">

                            <input name="username" type="text" class="form-control" placeholder="User Name" required="required">

                        </div>

                        <div class="form-group">

                            <input name="password" type="password" class="form-control" placeholder="Password" required="required">
                            <input type="hidden" name="csrf" value=<?php echo '"'. $_SESSION['csrf'] . '"';?>>

                        </div>

                        <div class="form-group text-center">

                            <button id="loginbutton" type="submit" class="btn btn-blue btn-block">Log In</button>

                        </div>

                    </form>

                </div>

                <div class="modal-footer text-center">

                    <a href="#">Forgot your password /</a>

                    <a href="#">Signup</a>

                </div>

            </div>

        </div>

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <script src="assets/bootstrap-3.3.7/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

    <script src="assets/js/plugins/owl-carousel/owl.carousel.min.js"></script>

    <script src="assets/js/plugins/bootsnav_files/js/bootsnav.js"></script>

    <script src="assets/js/plugins/typed.js-master/typed.js-master/dist/typed.min.js"></script>

    <script src="assets/js/plugins/Magnific-Popup-master/Magnific-Popup-master/dist/jquery.magnific-popup.js"></script>

    <script src="assets/js/main.js"></script>

</body>



</html>