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
    
    public function checkCredentials($username, $password)
    {
        if ($username == $this->loginUsername && $password == $this->loginPassword)
        {
            $this->createSession();
            
            return true;
        }
        
        return false;
    }
    
    public function createSession()
    {
        $_SESSION['uLoggedIn'] = true;
        $_SESSION['uIp']       = $_SERVER['REMOTE_ADDR'];
        setcookie('sSecureKey', md5($_SERVER['HTTP_USER_AGENT']));
    }
    
    public function endSession()
    {
        session_destroy();
        setcookie('sSecureKey', '', time() - 60*60*24*3);
    }
}