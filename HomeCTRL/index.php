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
    
    $template->getHeader('Inloggen');
    
    ?>
  <div class="loginBox">
    
    <h1>Inloggen</h1>
    
    <p>U moet inloggen voordat u verder kunt.</p>
    
    <form action="" method="post">
      <input type="text" name="uUsername" placeholder="Gebruikersnaam" />
      <input type="password" name="uPassword" placeholder="Wachtwoord" />
      <input type="submit" value="Inloggen" />
      <div class="clear"></div>
    </form>
    
  </div>
    <?php
    
    $template->getFooter();
}