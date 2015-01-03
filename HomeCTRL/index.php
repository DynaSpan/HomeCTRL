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
    $mysql->connect();
    
    $dQuery = $mysql->query("SHOW TABLES FROM `" . $mysqlDb . "` LIKE 'rRelay';");
    
    if ($mysql->num_rows($dQuery) == 0)
    {
        $mysql->query("CREATE TABLE IF NOT EXISTS `rRelay` (
                        `rId` int(11) NOT NULL,
                        `rName` text NOT NULL,
                        `rBrand` text NOT NULL,
                        `rLetter` char(1) NOT NULL,
                        `rDip` text NOT NULL,
                        `rStatus` tinyint(1) NOT NULL
                       ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
        $mysql->query("ALTER TABLE `rRelay`
                        ADD PRIMARY KEY (`rId`);");
        $mysql->query("ALTER TABLE `rRelay`
                        MODIFY `rId` int(11) NOT NULL AUTO_INCREMENT;");
    }
    
    if (isset($_GET['new']))
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if (trim($_POST['rName']) == '')
                $error = 'Please fill in a name';
            else if ($_POST['rBrand'] == 'false')
                $error = 'Please select a brand';
            else if ($_POST['rLetter'] == 'false')
                $error = 'Please select a letter';
            else if (!is_numeric($_POST['rDip_1']) || !is_numeric($_POST['rDip_2']) || !is_numeric($_POST['rDip_3']) || !is_numeric($_POST['rDip_4']) || !is_numeric($_POST['rDip_5']))
                $error = 'Please fill in a valid dip value';
            else 
            {
                $dip = $_POST['rDip_1'] . $_POST['rDip_2'] . $_POST['rDip_3'] . $_POST['rDip_4'] . $_POST['rDip_5'];
                $mysql->query("INSERT INTO rRelay (rName, rBRand, rLetter, rDip) VALUES ('" . $mysql->escape($_POST['rName']) . "', '" . $mysql->escape($_POST['rBrand']) . "', '" . $mysql->escape($_POST['rLetter']) . "', '" . $mysql->escape($dip) . "')");
                header("Location: " . $main->siteUrl);
            }
        }
        
        $template->getHeader('Add new relay');
        
        ?>
      <div class="homeBox">
       
        <h1>Add new relay</h1>
              
        <p>
          <a href="<?php echo $main->siteUrl; ?>" class="button">&laquo; Back to home</a>
        </p>
        
        <p>Below, you can add a wireless relay.</p>
        
        <?php if (isset($error)) { echo '<p><strong>' . $error . '</strong></p>'; } ?>
        
        <p>
          <form action="" method="post">
            <input type="text" name="rName" placeholder="Relay name" /><br />
            <select name="rBrand">
              <option value="false">Select a brand..</option>
              <?php
              
              foreach ($arrRelayBrands as $parseBrands)
              {
                ?>
                <option value="<?php echo $parseBrands; ?>"><?php echo $parseBrands; ?></option>
                <?php
              }
              
              ?>
            </select><br />
            <select name="rLetter">
              <option value="false">Select a letter..</option>
              <option value="a">A</option>
              <option value="b">B</option>
              <option value="c">C</option>
              <option value="d">D</option>
              <option value="e">E</option>
            </select>
            <select name="rDip_1">
              <option value="0">0</option>
              <option value="1">1</option>
            </select>
            <select name="rDip_2">
              <option value="0">0</option>
              <option value="1">1</option>
            </select>
            <select name="rDip_3">
              <option value="0">0</option>
              <option value="1">1</option>
            </select>
            <select name="rDip_4">
              <option value="0">0</option>
              <option value="1">1</option>
            </select>
            <select name="rDip_5">
              <option value="0">0</option>
              <option value="1">1</option>
            </select><br />
            <input type="submit" value="Add relay" />
          </form>
        </p>
      
      </div>
        <?php
        
        $template->getFooter();
    }
    else if (isset($_GET['edit']))
    {
        $rQuery = $mysql->query("SELECT * FROM rRelay WHERE rId = '" . $mysql->escape($_GET['edit']) . "'");
        
        if ($mysql->num_rows($rQuery) == 0)
        {
            $template->getHeader('Error');
            
            echo '<p><strong>Could not find this relay.</strong>';
            
            $template->getFooter();
        }
        else
        {
            $rFetch = $mysql->fetch($rQuery);
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                if (trim($_POST['rName']) == '')
                    $error = 'Please fill in a name';
                else if ($_POST['rBrand'] == 'false')
                    $error = 'Please select a brand';
                else if ($_POST['rLetter'] == 'false')
                    $error = 'Please select a letter';
                else if (!is_numeric($_POST['rDip_1']) || !is_numeric($_POST['rDip_2']) || !is_numeric($_POST['rDip_3']) || !is_numeric($_POST['rDip_4']) || !is_numeric($_POST['rDip_5']))
                    $error = 'Please fill in a valid dip value';
                else 
                {
                    $dip = $_POST['rDip_1'] . $_POST['rDip_2'] . $_POST['rDip_3'] . $_POST['rDip_4'] . $_POST['rDip_5'];
                    $mysql->query("UPDATE rRelay SET rName = '" . $mysql->escape($_POST['rName']) . "', rBrand = '" . $mysql->escape($_POST['rBrand']) . "', rLetter = '" . $mysql->escape($_POST['rLetter']) . "', rDip = '" . $mysql->escape($dip) . "' WHERE rId = '" . $mysql->escape($rFetch['rId']) . "'");
                    header("Location: " . $main->siteUrl);
                }
            }
            
            $template->getHeader('Edit relay');
            
            ?>
          <div class="homeBox">
           
            <h1>Edit relay</h1>
                  
            <p>
              <a href="<?php echo $main->siteUrl; ?>" class="button">&laquo; Back to home</a>
            </p>
            
            <p>Below, you can edit the wireless relay.</p>
            
            <?php if (isset($error)) { echo '<p><strong>' . $error . '</strong></p>'; } ?>
            
            <p>
              <form action="" method="post">
                <input type="text" name="rName" placeholder="Relay name" value="<?php echo $main->htmlEntities($rFetch['rName']) ?>" /><br />
                <select name="rBrand">
                  <option value="false">Select a brand..</option>
                  <?php
                  
                  foreach ($arrRelayBrands as $parseBrands)
                  {
                    ?>
                    <option value="<?php echo $parseBrands; ?>" <?php echo ($parseBrands == $rFetch['rBrand']) ? 'selected="selected"' : ''; ?>><?php echo $parseBrands; ?></option>
                    <?php
                  }
                  
                  ?>
                </select><br />
                <select name="rLetter">
                  <option value="false">Select a letter..</option>
                  <option value="a" <?php echo ($rFetch['rLetter'] == 'a') ? 'selected="selected"' : ''; ?>>A</option>
                  <option value="b" <?php echo ($rFetch['rLetter'] == 'b') ? 'selected="selected"' : ''; ?>>B</option>
                  <option value="c" <?php echo ($rFetch['rLetter'] == 'c') ? 'selected="selected"' : ''; ?>>C</option>
                  <option value="d" <?php echo ($rFetch['rLetter'] == 'd') ? 'selected="selected"' : ''; ?>>D</option>
                  <option value="e" <?php echo ($rFetch['rLetter'] == 'e') ? 'selected="selected"' : ''; ?>>E</option>
                </select>
                <select name="rDip_1">
                  <option value="0">0</option>
                  <option value="1" <?php echo ($rFetch['rDip'][0] == '1') ? 'selected="selected"' : ''; ?>>1</option>
                </select>
                <select name="rDip_2">
                  <option value="0">0</option>
                  <option value="1" <?php echo ($rFetch['rDip'][1] == '1') ? 'selected="selected"' : ''; ?>>1</option>
                </select>
                <select name="rDip_3">
                  <option value="0">0</option>
                  <option value="1" <?php echo ($rFetch['rDip'][2] == '1') ? 'selected="selected"' : ''; ?>>1</option>
                </select>
                <select name="rDip_4">
                  <option value="0">0</option>
                  <option value="1" <?php echo ($rFetch['rDip'][3] == '1') ? 'selected="selected"' : ''; ?>>1</option>
                </select>
                <select name="rDip_5">
                  <option value="0">0</option>
                  <option value="1" <?php echo ($rFetch['rDip'][4] == '1') ? 'selected="selected"' : ''; ?>>1</option>
                </select><br />
                <input type="submit" value="Edit relay" />
              </form>
            </p>
          
          </div>
            <?php
            
            $template->getFooter();
        }
    }
    else if (isset($_GET['delete']))
    {
        
        
    }
    else
    {
        $template->getHeader('Welcome', true);
        
        ?>
      <div class="homeBox">
      
        <h1>Welcome</h1>
                
        <p>
          <a href="?new" class="button">&raquo; Add a wireless relays</a>
        </p>
        
        <p>Welcome to HomeCTRL.</p>
        
        <p><strong>My relays</strong></p>
        
        <?php
        
        $rQuery = $mysql->query("SELECT rId, rName, rStatus FROM rRelay");
        
        if ($mysql->num_rows($rQuery) == 0)
        {
            echo '<p>You have no relays. To add a relays press the button above.</p>';
        }
        else
        {
            echo '<p>
            <table>';
        
            while ($rFetch = $mysql->fetch($rQuery))
            {
                ?>
                <tr>
                  <td>
                    <a href="?edit=<?php echo $rFetch['rId']; ?>"><?php echo $main->htmlEntities($rFetch['rName']); ?></a>
                  </td>
                </tr>
                <?php
            }
            
            echo '</table>
            </p>
            
            <p><em>You can press on a relays name to change the relay or delete it</em></p>';
        }
        
        ?>
      
      </div>
        <?php
        
        $template->getFooter();
    }
}
else
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if (isset($_POST['uUsername']) && isset($_POST['uPassword']))
        {
            if ($loginHandler->checkCredentials($_POST['uUsername'], $_POST['uPassword']))
            {
                header("Location: " . $main->siteUrl);
            }
            else
            {
                $error = 'Username or password was wrong';
            }
        }
    }
    
    $template->getHeader('Login');
    
    ?>
  <div class="loginBox">
    
    <h1>Login</h1>
    
    <p>You must login before you can continue.</p>
    
    <?php if (isset($error)) { echo '<p><br /><strong>' . $error . '</strong><br /><br /></p>'; } ?>
    
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