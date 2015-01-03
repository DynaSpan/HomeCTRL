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
    
    <link href="<?php echo $this->tUrl; ?>assets/css/main.css" rel="stylesheet" type="text/css" />

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