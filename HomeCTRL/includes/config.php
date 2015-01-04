<?php

/**
 * Config
 * 
 * @author Milan Drossaerts
 * @copyright 2014
 */

session_start();
 
// login info
$loginUsername = 'test'; // your login username
$loginPassword = 'test123'; // your login password

$arrRelayBrands = array();
// the relay brands you have (add one like this: $arrRelayBrands[] = 'brand name';)
// make sure that you have compiled the brands that you have
// see this tutorial for more info: http://weejewel.tweakblogs.net/blog/8665/lampen-schakelen-met-een-raspberry-pi.html (dutch)
// make sure you have at least 1 brand below or the system will crash
$arrRelayBrands[] = 'action';
$arrRelayBrands[] = 'kaku';
$arrRelayBrands[] = 'blokker';
$arrRelayBrands[] = 'elro';
 
// site info
$siteUrl = 'http://127.0.0.1/'; // your raspberry pi ip address (inside network) or ip address (inside & outside network) here including http and slash 

// wiringPi settings
$wiringPiFolder = '/var/wwwcontrols/wiringpi/'; // path to wiringpi installation including last slash
$lightsFolder   = '/var/wwwcontrols/lights/'; // path to lights folder including last slash
 
// MySQL database info
$mysqlHost = 'localhost'; // 99.9% of the times localhost
$mysqlUser = 'root'; // your MySQL username
$mysqlPass = ''; // your MySQL password
$mysqlDb   = ''; // your MySQL database name

/** DO NOT CHANGE BELOW THIS */

require_once('classes/main.class.php');
require_once('classes/mysql.class.php');
require_once('classes/loginHandler.class.php');
require_once('classes/piHandler.class.php');
require_once('classes/template.class.php');

$main           = new Main($siteUrl);
$mysql          = new MySQL($mysqlUser, $mysqlPass, $mysqlDb, $mysqlHost, true);
$loginHandler   = new LoginHandler($loginUsername, $loginPassword);
$piHandler      = new PiHandler($wiringPiFolder, $lightsFolder);
$template       = new Template($siteUrl);