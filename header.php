<?php
use OSC\OM\HTTP;
use OSC\OM\OSCOM;
require('includes/application_top.php');
$selectUrl = basename($_SERVER["PHP_SELF"]);
/*if (!isset($_SESSION['adminname'])) {   
    OSCOM::redirect('login.php', '', 'SSL');
}*/
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>VartanEx</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />
    <!-- Google Fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&amp;Raleway:300,400,500,600,700,800,900">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700" rel="stylesheet"> 
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- owl-carousel -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="revolution/css/settings.css">
    <!-- Magnific Popup -->
    <!-- Animate -->
    <link rel="stylesheet" type="text/css" href="css/animate.css" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="css/ionicons.min.css">
    <!-- Style -->
	<link rel="stylesheet" href="css/style.css">
    
    <link href="css/easy-responsive-tabs.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet"> 

    <!-- Responsive -->
    <link rel="stylesheet" href="css/responsive.css">
    <link href="css/immersive-slider.css" rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script src="js/owl.carousel.js"></script>
    <?php if($selectUrl != "index.php") { ?>
    <style>
    header{position:relative; background:url(images/inner-header.jpg) no-repeat; background-size:cover; padding-bottom:180px}
    .col-lg-6, .col-lg-12{float:left}
    </style>
    <?php } ?>
</head>
<body>    
    <header id="header-wrap" <?php if($selectUrl == "index.php") { ?> data-spy="affix" data-offset-top="55" <?php } ?>>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <nav class="navbar navbar-default">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="index.php">
                                <img src="images/logo.png" alt="logo">
                            </a>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right" id="top-menu">
                                <li <?php if($selectUrl == "index.php"){ ?> class="active" <?php } ?>><a href="index.php">Home</a></li>
                                <li <?php if($selectUrl == "how-we-work.php"){ ?> class="active" <?php } ?>><a href="how-we-work.php">How we work? </a></li>
                                <li <?php if($selectUrl == "support.php"){ ?> class="active" <?php } ?>><a href="support.php">Support </a></li>
                                <li class="dropdown <?php if($selectUrl == "security.php" || $selectUrl == "prevent-phishing.php"){ ?>active<?php } ?>"><a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);">Trade Safe</a>						  
                                    <ul class="dropdown-menu">
                                        <li <?php if($selectUrl == "security.php"){ ?> class="active" <?php } ?>><a href="security.php">Security</a></li>
                                        <li <?php if($selectUrl == "prevent-phishing.php"){ ?> class="active" <?php } ?>><a href="prevent-phishing.php">Prevent Phishing</a></li>                                        
                                    </ul>
                                </li>
                                <li <?php if($selectUrl == "announcement.php"){ ?> class="active" <?php } ?>><a href="announcement.php">News </a></li>
                                <li class="dropdown <?php if($selectUrl == "trading-guide.php"){ ?>active<?php } ?> "><a class="dropdown-toggle" data-toggle="dropdown" href="trading-guide.php">Trader Guide </a>                                
                                    <ul class="dropdown-menu">
                                        <li <?php if($selectUrl == "trading-guide.php"){ ?> class="active" <?php } ?>><a href="trader-guide.php">Trading rules </a></li>
                                        <!--<li><a href="trader-guide.php#order-book">How to interpret the order book</a></li>-->
                                        <li><a href="trader-guide.php#fees">Fee structure</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- /.navbar-collapse -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->