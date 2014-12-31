<?php

/**
 * Pi handler
 * 
 * @author Milan Drossaerts
 * @copyright 2014
 */
 
class PiHandler
{
    private $wiringPiPath;
    private $lightsPath;
    
    public function __construct($wpPath, $lPath)
    {
        $this->wiringPiPath = $wpPath;
        $this->lightsPath   = $lPath;
    }
}