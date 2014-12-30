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
}