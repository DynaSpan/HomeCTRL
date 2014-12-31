<?php

/**
 * Index
 * 
 * @author Milan Drossaerts
 * @copyright 2014
 */

require_once('includes/config.php');

if ($loginHandler->isLoggedIn())
{
    
    
    
}
else
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        
        
    }
    
    $template->getHeader('Login');
    
    ?>
  <div class="loginBox">
    
    <h1>Login</h1>
    
    <p>You must login before you can continue.</p>
    
    <form action="" method="post">
      <input type="text" name="uUsername" placeholder="Username" />
      <input type="password" name="uPassword" placeholder="Password" />
      <input type="submit" value="Login" />
      <div class="clear"></div>
    </form>
    
  </div>
    <?php
    
    $template->getFooter();
}