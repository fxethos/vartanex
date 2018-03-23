<?php
/*
Innoblitz	
02-02-2016
Mental Toughness Research Institute
http://www.innoblitztechnologies.com
Copyright (c) 2016 Innoblitz Technologies
*/

  ////////////////////////////////////////////////////////////////////////////////////////////////
  //
  // Function    : tep_validate_email
  //
  // Arguments   : email   email address to be checked
  //
  // Return      : true  - valid email address
  //               false - invalid email address
  //
  // Description : function for validating email address that conforms to RFC 822 specs
  //
  //              This function will first attempt to validate the Email address using the filter
  //              extension for performance. If this extension is not available it will
  //              fall back to a regex based validator which doesn't validate all RFC822
  //              addresses but catches 99.9% of them. The regex is based on the code found at
  //              http://www.regular-expressions.info/email.html
  //
  //              Optional validation for validating the domain name is also valid is supplied
  //              and can be enabled using the administration tool.
  //
  // Sample Valid Addresses:
  //
  //    first.last@host.com
  //    firstlast@host.to
  //    first-last@host.com
  //    first_last@host.com
  //
  // Invalid Addresses:
  //
  //    first last@host.com
  //    first@last@host.com
  //
  ////////////////////////////////////////////////////////////////////////////////////////////////
  function tep_validate_email($email) {
    $email = trim($email);

    if ( strlen($email) > 255 ) {
      $valid_address = false;
    } else {
     $valid_address = (bool)filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    if ($valid_address && ENTRY_EMAIL_ADDRESS_CHECK == 'true') {
      $domain = explode('@', $email);

      if ( !checkdnsrr($domain[1], "MX") && !checkdnsrr($domain[1], "A") ) {
        $valid_address = false;
      }
    }

    return $valid_address;
  }
  
  function tep_create_random_value($length, $type = 'mixed') {
    if ( ($type != 'mixed') && ($type != 'chars') && ($type != 'digits')) $type = 'mixed';

    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $digits = '0123456789';

    $base = '';

    if ( ($type == 'mixed') || ($type == 'chars') ) {
      $base .= $chars;
    }

    if ( ($type == 'mixed') || ($type == 'digits') ) {
      $base .= $digits;
    }

    $value = '';

    if (!class_exists('PasswordHash')) {
      include(DIR_WS_CLASSES . 'passwordhash.php');
    }

    $hasher = new PasswordHash(10, true);

    do {
      $random = base64_encode($hasher->get_random_bytes($length));

      for ($i = 0, $n = strlen($random); $i < $n; $i++) {
        $char = substr($random, $i, 1);

        if ( strpos($base, $char) !== false ) {
          $value .= $char;
        }
      }
    } while ( strlen($value) < $length );

    if ( strlen($value) > $length ) {
      $value = substr($value, 0, $length);
    }

    return $value;
  }

  function mobileVerification($numbers, $message){
 	// Authorisation details.
	$username = "mani.innoblitz@gmail.com";
	$hash = "d550bb2a6e10bf65a1830f5e60b8d458bf68200e01135530a2f3067a0490b4c7";

	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "TXTLCL"; // This is who the message appears to be from.
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.textlocal.in/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);
  }
?>