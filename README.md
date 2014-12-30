HomeCTRL
========

A Raspberry Pi project to control 433MHz wireless relays.

This system is based on a tutorial from Tweaker WeeJeWel. You can find his tutorial <a href="http://weejewel.tweakblogs.net/blog/8665/lampen-schakelen-met-een-raspberry-pi.html">here (Dutch)</a>.

<strong>How to use HomeCTRL</strong>

1. Follow the steps in the tutorial above

2. Install PHP, Apache and MySQL (you can use <a href="http://www.raspipress.com/2012/09/tutorial-install-apache-php-and-mysql-on-raspberry-pi/">this tutorial</a>)

3. Create a MySQL database (you can use <a href="http://www.raspberry-projects.com/pi/software_utilities/mysql">this tutorial</a>)

4. Make sure Apache/PHP has the sufficient rights to access the GPIO pins by editing the sudo'ers:
   
	- Open the terminal or login in via SSH
   
	- type "sudo visudo"
   
	- if you want to play it secure:
       
		- add on the end of the file the following lines:
         
		<blockquote>www-data raspberrypi=NOPASSWD: /path/to/lights/folder/./
        
        www-data raspberrypi=NOPASSWD: /opt/vc/bin/./
        
        www-data raspberrypi=NOPASSWD: /sbin/iwconfig</blockquote>
   
	- if you don't want to play it secure:
       
		- add on the end of the file this line:
         
		<blockquote>www-data ALL=(ALL) NOPASSWD: ALL</blockquote>
   
	- save it with pressing CTRL + X and then pressing Y

5. Upload the HomeCTRL files to the www folder (/var/www/ unless set otherwise)

6. Edit the config file in /includes/config.php and fill in your settings

7. Go to your favorite browser and type in the ip address of your Pi. It should all work now!
