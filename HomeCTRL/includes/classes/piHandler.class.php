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
    
    public function switchLight($sBrand, $sLetter, $sDip, $sNewStatus)
    {
        $this->executeCommand('sudo ' . $this->lightsPath . $sBrand . ' ' . $sDip . ' ' . strtoupper($sLetter) . ' ' . $sNewStatus);
    }
    
    private function executeCommand($command)
    {
        return shell_exec($command);
    }
}