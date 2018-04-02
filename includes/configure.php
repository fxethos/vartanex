<?php
$var = $_SERVER['DOCUMENT_ROOT'];

  define('HTTP_SERVER', 'https://www.vartanex.com');
  define('HTTPS_SERVER', 'https://www.vartanex.com');
  define('ENABLE_SSL', false);
  define('HTTP_COOKIE_DOMAIN', '');
  define('HTTPS_COOKIE_DOMAIN', '');
  define('HTTP_COOKIE_PATH', '/');
  define('HTTPS_COOKIE_PATH', '/');
  define('SITE_URL', HTTP_SERVER.'/');
  define('DIR_WS_HTTP_CATALOG', '/');
  define('DIR_WS_HTTPS_CATALOG', '/');
  define('DIR_WS_INCLUDES', 'includes/');
  define('DIR_WS_FUNCTIONS', 'includes/functions/');
  define('DIR_WS_CLASSES', 'includes/classes/');
  define('DIR_WS_IMAGES', 'assets/images/');
  
  define('DIR_FS_CATALOG', $var.'/');
  define('DIR_FS_CATALOG_IMAGES', DIR_FS_CATALOG . 'assets/images/');
  define('DIR_FS_PROFILE_IMAGES', 'assets/images/');
  
  define('USERNAME', 'vartanex');
  define('PASSWORD', 'Admin@123');
  
  define('DB_SERVER', 'localhost');
  define('DB_SERVER_USERNAME', 'vartUser');
  define('DB_SERVER_PASSWORD', 'i~65x[WsBBOo');
  define('DB_DATABASE', 'vartanexcmsdb');
  define('USE_PCONNECT', 'false');
  define('STORE_SESSIONS', 'mysql');
  define('CFG_TIME_ZONE', 'America/Mexico_City');
?>