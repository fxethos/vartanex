<?php include("header.php"); 
    $site_key = '6LcjXBkUAAAAAH88IiGrXLo4feT7tWrajxJvHLql'; // change this to yours
    $secret_key = '6LcjXBkUAAAAAHLx2rV6GDo-spIVHQsahmwt4Je7'; // change this to yours
    if (isset($_POST['submit']))
    {
        if(isset($_POST['g-recaptcha-response']))
        {
            $api_url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response='.$_POST['g-recaptcha-response'];
            $response = @file_get_contents($api_url);
            $data = json_decode($response, true);
            if($data['success'])
            {
                require_once dirname(__FILE__) .'/lib/swift/lib/swift_required.php';
    			$from = $_REQUEST['email'];
    			$to = 'hello@vartanex.com';
    			$subject = "VartanEx: Submit Request";
    			$mailbody = '<div id="content" class="radius">
    						<p>Dear Admin,<br />
    						Please check the below details for submit request.</p>
    						<p>Name: '.$_REQUEST['name'].'<br />
                            Phone: '.$_REQUEST['phone'].'<br />
                            Email: '.$_REQUEST['email'].'<br />
                            Message: '.$_REQUEST['message'].'</p>
    						<p>Thank you.</p>
    						<p>Support Team, VartanEx.</p>
    					</div>';
                $headers  = 'MIME-Version: 1.0' . "\r\n";
        		$headers .= "From: VartanEx < ".$from." > \r\n";
        		$headers .= "To-Sender: \n";
        		$headers .= "X-Mailer: PHP\n"; // mailer
        		$headers .= "X-Priority: 1\n"; // Urgent message!
        		$headers .= "Return-Path: \n"; // Return path for errors	
        		$headers .= "Content-Type: text/html; charset=iso-8859-1\n";
                //mail($to,$subject,$mailbody,$headers);        
    			$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
    			->setUsername('hello@vartanex.com')
    			->setPassword('Tradenithin123$');
    			$mailer = Swift_Mailer::newInstance($transport);
    			$message = Swift_Message::newInstance($subject)
    			->setContentType('text/html')
    			->setFrom(array($from => $_REQUEST['name']))
    			->setTo(array($to => 'VartanEx Support'))	
    			->setBody($mailbody);
    			$mailer->send($message);
                $success = true;
                echo '<script type="text/javascript">alert("Thanks! Your message has been sent. We\'ll be in touch soon..");</script>';
            }
            else
            {
                $success = false;
                echo '<script type="text/javascript">alert("Verification timed out. Please try again.");</script>';
            }
        }
    }
?>
<script src='https://www.google.com/recaptcha/api.js'></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" rel="stylesheet" />	 
<div class="container">
	<div class="col-lg-6 col-lg-offset-3">
        <div class="request-form">
            <div class="heading-title">
                <h2 class="title iq-tw-6">Submit a Request</h2>
            </div>
            <div class="contact-form">
                <form name="submitRequest" id="submitRequest" method="post" action="" onsubmit="return get_action()">
                    <div class="section-field">
                        <input placeholder="Name*" name="name" id="name" type="text" />
                    </div>
                    <div class="section-field">
                        <input placeholder="Mobile Number*" name="phone" id="phone" type="text" />
                    </div>
                    <div class="section-field">
                        <input placeholder="Email ID*" name="email" id="email" type="text" />
                    </div>
                    <div class="section-field textarea">
                        <textarea class="input-message" placeholder="Comment*" rows="7" name="message" id="message"></textarea>
                    </div>
                    <div class="section-field textarea">
                    <center>
                        <div class="g-recaptcha" data-sitekey="<?php echo $site_key; ?>"></div>
                        <input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha"/>
                    </center>
                    </div>
                    <input type="submit" name="submit" value="Submit" class="button iq-mt-40"/>
                </form>
            </div>
        </div>
        <div class="spacer">&nbsp;</div>
    </div>
</div>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript" src="js/additional-methods.js"></script>
<script type="text/javascript" language="javascript">
$(document).ready(function(){
	$("#submitRequest").validate({
	rules: {									
			name: {
				required : true,
                lettersonly : true
			},
			phone: {
				required : true,
                mobileIN : true,
			},
			email: {
				required : true,
                email : true
			},
			message: {
				required : true
			}
		},
		messages: {					
			name: {
				required : "Please enter your name."
			},
			phone: {
				required : "Please enter your valid phone number.",
                mobileIN : "Please enter your valid phone number."
			},
			email: {
				required : "Please enter your email address.",
				email : "Please enter valid email address."
			},
			message: {
				required : "Please enter your message."
			}
		},
		invalidHandler: function(e, validator) {		
			var errors = validator.numberOfInvalids();
			if (errors) {
				var message = errors == 1
					? 'You missed 1 field. It has been highlighted below'
					: 'You missed ' + errors + ' fields.  They have been highlighted below';
				$("div.errorTxt").html(message);
				$("div.errorTxt").show();
				$("div.errorContainer").show();
			} else {
				$("div.errorTxt").hide();
				$("div.errorContainer").hide();
			}
		},
		errorPlacement: function(error, element) {
			if(element.attr("name") == "usertype")
				error.appendTo(element.parent("div"));
            else if(element.attr("name") == "paymenttype")
                error.appendTo(element.parent("div"));
            else
                error.insertAfter(element);
        },
		showErrors: function(){			
			$(".serverValid").hide();
			$(".errorContainer").show();
			this.defaultShowErrors();
		},
		errorLabelContainer: $("div.errorTxt"),
		wrapper : "span"
	});	
});
function get_action(form) {
    var v = grecaptcha.getResponse();
    if(v.length == 0){
        return false;
    } else {
        $("#hiddenRecaptcha").val('1');
        return true; 
    }
}
</script>
<style type="text/css">
label.error { float:none !important; color:#f00 !important; font-weight: normal !important; text-align: center !important; }
input.error, select.error, textarea.error { border:1px solid #f00 !important; }
</style>
<?php include("footer.php"); ?>