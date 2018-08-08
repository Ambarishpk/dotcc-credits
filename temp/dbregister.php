<?php

error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
ob_start();
session_start();

define('PROJECT_NAME', 'dotCodecommunity');
define('DB_DRIVER', 'mysql'); 
define('DB_SERVER', 'sql103.epizy.com');
define('DB_SERVER_USERNAME', 'epiz_22408459');
define('DB_SERVER_PASSWORD', 'N3uMF12TmG');
define('DB_DATABASE', 'epiz_22408459_dotcc');

// must end with a slash
define('SITE_URL', 'http://dotcodecommunity.epizy.com/');

$dboptions = array(
    PDO::ATTR_PERSISTENT => FALSE,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);
try {
  $DB = new PDO(DB_DRIVER . ':host=' . DB_SERVER . ';dbname=' . DB_DATABASE, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, $dboptions);
} catch (Exception $ex) {
  echo $ex->getMessage();
  die;
}

?>