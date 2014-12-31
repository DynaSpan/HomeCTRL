<?php

/**
 * Login handler
 * 
 * @author Milan Drossaerts
 * @copyright 2014
 */
 
class LoginHandler
{
    private $loginUsername;
    private $loginPassword;
    
    public function __construct($lUsername, $lPassword)
    {
        $this->loginUsername = $lUsername;
        $this->loginPassword = $lPassword;
    }
    
    public function isLoggedIn()
    {
        if (isset($_SESSION['uLoggedIn']) && isset($_SESSION['uIp']) && $_SESSION['uIp'] == $_SERVER['REMOTE_ADDR'])
            return true;
            
        return false;
    }
}