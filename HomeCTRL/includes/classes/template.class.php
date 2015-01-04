<?php

/**
 * Template class
 * 
 * @author Milan Drossaerts
 * @copyright 2014
 */
 
class Template
{
    private $tUrl;
    
    public function __construct($templateUrl)
    {
        $this->tUrl = $templateUrl;
    }
    
    public function getHeader($pageTitle, $isLoggedIn = false)
    {
        ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    
    <link href="<?php echo $this->tUrl; ?>assets/css/main.css" rel="stylesheet" type="text/css" />
    <link media="all and (max-width: 530px)" type="text/css" rel="stylesheet" href="<?php echo $this->tUrl; ?>assets/css/mobile.css" />

    <?php
    
    if ($isLoggedIn)
    {
        
        ?>
    <script type="text/javascript" src="<?php echo $this->tUrl; ?>assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo $this->tUrl; ?>assets/js/homectrl.js"></script>
        <?php
        
    }
    
    ?>
    <title><?php echo $pageTitle; ?> - HomeCTRL</title>
</head>

<body>
        <?php
    }
    
    public function getFooter()
    {
        ?>
</body>
</html>
        <?php   
    }
}