<?php
/*
Innoblitz	
02-02-2016
Mental Toughness Research Institute
http://www.innoblitztechnologies.com
Copyright (c) 2016 Innoblitz Technologies
*/
ob_start();
session_start();

  use OSC\OM\Cache;
  use OSC\OM\Db;
  use OSC\OM\OSCOM;
  use OSC\OM\Registry;

// start the timer for the page parse time log
  define('PAGE_PARSE_START_TIME', microtime());
  define('OSCOM_BASE_DIR', __DIR__ . '/');

// set the level of error reporting
  error_reporting('E_ALL | E_STRICT | E_WARNING');
  ini_set('display_errors', true); // TODO remove on release

// load server configuration parameters
  if (file_exists('includes/local/configure.php')) { // for developers
    include('includes/local/configure.php');
  } else {
    include('includes/configure.php');
  }
  
  // include the list of project database tables
  require(DIR_WS_INCLUDES . 'database_tables.php');

  if (DB_SERVER == '') {
    if (is_dir('install')) {
      header('Location: install/index.php');
      exit;
    }
  }

  require(OSCOM_BASE_DIR . 'OSC/OM/OSCOM.php');
  spl_autoload_register('OSC\\OM\\OSCOM::autoload');

  OSCOM::initialize();

// set the type of request (secure or not)
  if ( (isset($_SERVER['HTTPS']) && (strtolower($_SERVER['HTTPS']) == 'on')) || (isset($_SERVER['SERVER_PORT']) && ($_SERVER['SERVER_PORT'] == 443)) ) {
    $request_type =  'SSL';
    define('DIR_WS_CATALOG', DIR_WS_HTTPS_CATALOG);
// set the cookie domain
    $cookie_domain = HTTPS_COOKIE_DOMAIN;
    $cookie_path = HTTPS_COOKIE_PATH;
  } else {
    $request_type =  'NONSSL';
    define('DIR_WS_CATALOG', DIR_WS_HTTP_CATALOG);
    $cookie_domain = HTTP_COOKIE_DOMAIN;
    $cookie_path = HTTP_COOKIE_PATH;
  }

// set php_self in the local scope
  $req = parse_url($_SERVER['SCRIPT_NAME']);
  $PHP_SELF = substr($req['path'], ($request_type == 'NONSSL') ? strlen(DIR_WS_HTTP_CATALOG) : strlen(DIR_WS_HTTPS_CATALOG));

  Registry::set('Cache', new Cache());
  Registry::set('Db', Db::initialize());
  $OSCOM_Db = Registry::get('Db');

  
// initialize the message stack for output messages
  require(DIR_WS_CLASSES . 'alertbox.php');
  require(DIR_WS_CLASSES . 'message_stack.php');
  $messageStack = new messageStack();

// include validation functions (right now only email address)
  require(DIR_WS_FUNCTIONS . 'validations.php');
?>
