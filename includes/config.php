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
 
// site info
$siteUrl = 'http://127.0.0.1/'; // your raspberry pi ip address (inside network) or ip address (inside & outside network) here including http and slash 

// wiringPi settings
$wiringPiFolder = '/var/wwwcontrols/wiringpi/'; // path to wiringpi installation including last slash
$lightsFolder   = '/var/wwwcontrols/lights/'; // path to lights folder including last slash
 
// MySQL database info
$mysqlHost = 'localhost'; // 99.9% of the times localhost
$mysqlUser = ''; // your MySQL username
$mysqlPass = ''; // your MySQL password
$mysqlDb   = ''; // your MySQL database name 

/** DO NOT CHANGE BELOW THIS */

require_once('classes/main.class.php');
require_once('classes/mysql.class.php');
require_once('classes/loginHandler.class.php');
require_once('classes/piHandler.class.php');

$main           = new Main($siteUrl);
$mysql          = new MySQL($mysqlHost, $mysqlUser, $mysqlPass, $mysqlDb);
$loginHandler   = new LoginHandler($loginUsername, $loginPassword);
$piHandler      = new PiHandler($wiringPiFolder, $lightsFolder);

?>