<?php 
use OSC\OM\HTML;
use OSC\OM\HTTP;
use OSC\OM\OSCOM;
require('includes/application_top.php');
//error_reporting(E_ALL | E_STRICT | E_WARNING);

if (isset($_GET['action']) && ($_GET['action'] == 'logout')) {
    
    unset($_SESSION['adminname']);
    OSCOM::redirect('login.php', '', 'SSL');
    
    }

if (isset($_GET['action']) && ($_GET['action'] == 'process')) {
        $username = HTML::sanitize($_POST['username']);
        $password = HTML::sanitize($_POST['password']);
        $error = false;

        if ($username < 5) {
          $error = true;
          $Msg='Please enter valid username';
        } 
        
         if ($password < 5) {
          $error = true;
          $Msg='Please enter valid password';
        } 
        
						
            if($username==USERNAME && $password==PASSWORD){
                $_SESSION['adminname'] = $username;
                OSCOM::redirect('index.php', '', 'SSL');
            }else{
                $_SESSION['adminname'] = '';
                $Msg='Error: No match for Username and/or Password.';
            }
       
      
    }
      
      
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
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css" />

    <!-- Style -->
	<link rel="stylesheet" href="css/style.css">

    <!-- Responsive -->

    <script type="text/javascript" src="js/jquery.min.js"></script>

    
    <style>
    header{position:relative; background:url(images/inner-header.jpg) no-repeat; background-size:cover; padding-bottom:180px}
    .col-lg-6, .col-lg-12{float:left}
	#login label.error{color:FE0000;}
    </style>
    
</head>
 <header id="header-wrap">
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
                                    <ul class="dropdown-menu dropdown-menu-1">
                                        <li <?php if($selectUrl == "trading-guide.php"){ ?> class="active" <?php } ?>><a href="trader-guide.php">Trading rules </a></li>
                                        <li><a href="trader-guide.php#order-book">How to interpret the order book</a></li>
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
<div class="container">
   <div class="col-lg-6 col-lg-offset-3">
    
   <div class="request-form">

    <div class="heading-title">
    
    	<h2 class="title iq-tw-6">Client Login</h2>
        </div>
        
 <?php
  if ($Msg!='') {
    echo $Msg;
  }
?>
<?php if (isset($_SESSION['adminname'])) { ?>
<div class="contact-form">
<?php echo HTML::form('logout', OSCOM::link('login.php', 'action=logout', 'SSL'), 'post', 'class="form-horizontal" id="logout" role="form"', ['tokenize' => true]); ?>
    <div class="form-group text-center m-t-40">
        <div class="col-xs-12">
        <?php echo HTML::button('Logout', '', null, 'primary', null, 'btn btn-primary btn-lg w-lg waves-effect waves-light'); ?>                            
        </div>
    </div>
</form>
</div>
<?php }else{?>
        <div class="contact-form">
		
         <?php echo HTML::form('login', OSCOM::link('login.php', 'action=process', 'SSL'), 'post', 'class="form-horizontal" id="login" role="form"', ['tokenize' => true]); ?>
    
        <div class="form-group">
          <div class="col-xs-12">
          <!--<label class="control-label col-xs-4">Username</label>-->
          
            <?php echo HTML::inputField('username', NULL, ' autofocus="autofocus" id="inputUsername" placeholder="Username"', 'text', '', 'form-control'); ?>
          </div>
        </div>
    
        <div class="form-group">
        <div class="col-xs-12">
          <!--<label class="control-label col-xs-4">Password</label>-->
          
            <?php echo HTML::passwordField('password', NULL, ' id="inputPassword" placeholder="Password"', 'text', '', 'form-control'); ?>
          </div>
        </div>
        
        
<div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                        <?php echo HTML::button('Login', '', null, 'primary', null, 'btn btn-primary btn-lg w-lg waves-effect waves-light'); ?>                            
                        </div>
                    </div>

		</form>

		</div>
<?php }?>
    </div>

</div>        

    <div class="spacer-1">&nbsp;</div>
    <div class="spacer-1">&nbsp;</div>  
</div>
   
 <div class="footer">
    <section id="contact-us" <?php if($selectUrl == "index.php") { ?> class="iq-full-contact footer-bg" <?php } ?>>
        <?php if($selectUrl == "index.php") { ?>
        <div class="container">
            <div class="row iq-ptb-80">
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="iq-fancy-box-04">
                        <div class="iq-icon white-bg">
                            <i aria-hidden="true" class="ion-ios-location-outline"></i>
                        </div>
                        <div class="fancy-content">
                            <h5 class="">Address</h5>
                            <span class="lead">3rd Floor,<br />153 & 155 South West Boag Road, <br/>T Nagar, Chennai - 600017</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="iq-fancy-box-04">
                        <div class="iq-icon white-bg">
                            <i aria-hidden="true" class="ion-ios-telephone-outline"></i>
                        </div>
                        <div class="fancy-content">
                            <h5 class="">Phone</h5>
                            <span class="lead">044-48587080</span>
                            <p class="iq-mb-0">Mon - Fri : 10am - 6pm</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="iq-fancy-box-04">
                        <div class="iq-icon white-bg">
                            <i aria-hidden="true" class="ion-ios-email-outline"></i>
                        </div>
                        <div class="fancy-content">
                            <h5 class="">Mail</h5>
                            <a href="mailto:hello@vartanex.in" style="color: #fff;"><span class="lead">hello@vartanex.in</span></a>
                            <p class="iq-mb-0">24 X 7 online support</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <footer class="<?php if($selectUrl == "index.php") { ?>iq-ptb-20<?php } ?> copyright-bg" <?php if($selectUrl != "index.php") { ?>style="margin-bottom: 0;"<?php } ?>>
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="footer-copyright iq-pt-10">Copyright &copy; <?php echo date("Y"); ?> VartanEx. All Rights Reserved </div>
                </div>
                <div class="col-sm-4" style="text-align:center">
                <div class="footer-copyright iq-pt-10"><a href="#" style="color:#fff; margin-right:10px; text-decoration:underline">Terms and Conditions</a> &nbsp;&nbsp;&nbsp; <a href="#" style="color:#fff; text-decoration:underline">Privacy Policy</a></div>
                </div>
                <div class="col-sm-3">
                    <ul class="info-share">
                        <li><a href="https://twitter.com/VartanEx" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="https://www.facebook.com/VartanEx-391853091270123/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <!--<li><a href="#"><i class="fa fa-google"></i></a></li>
                        <li><a href="#"><i class="fa fa-github"></i></a></li>-->
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    </section>
    <!-- full-contact END -->
    <!-- Footer -->
    <!--  END -->
</div>

</body>
</html>
<script type="text/javascript" src="js/jquery.validate.js"></script>
    <script type="text/javascript" src="js/additional-methods.js"></script>
<script type="text/javascript" language="javascript">
    $(document).ready(function(){
    		$("#login").validate({
    			rules: {
    				username: {
    					required : true
    				},
                    password: {
    					required : true
    				}
    			},    			
    			messages: {	
    				username: {
                        required : "Please enter the username."
    				},
                    password: {
    					required : "Please enter the password."
    				}
    			},    			
    			invalidHandler: function(e, validator) {
    				var errors = validator.numberOfInvalids();
    				if (errors) {
    					var message = errors == 1
    						? 'You missed 1 field. It has been highlighted below'
    						: 'You missed ' + errors + ' fields.  They have been highlighted below';
    					$("div.errorTxt").html(message);
    					$("div.errorTxt").hide();
    					$("div.errorContainer").hide();
    				} else {
    					$("div.errorTxt").hide();
    					$("div.errorContainer").hide();
    				}
    			},
    			showErrors: function(){
    				//$(".serverValid").hide();
    				$(".serverValid").hide();
    				$(".errorContainer").hide();
    				this.defaultShowErrors();
    			}
    			//errorLabelContainer: $("div.errorTxt"),
    			//wrapper : "li"
    		});
    	});	
</script>
 