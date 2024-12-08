<?php 

/**
 * @author 
 * @copyright 2013
 */
 
ob_start();

session_start();

date_default_timezone_set ('Europe/Istanbul');

error_reporting(E_ERROR | E_WARNING | E_PARSE);

ini_set('display_errors', 1);

$templateAccess = true;

require_once("config.php");

require_once("functions.php");

require_once("data.php");

require_once("admin.php");

$getData = new getData();
$adminData = new adminEngine();

?>