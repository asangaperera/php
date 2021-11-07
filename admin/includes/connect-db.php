<?php
 // Database Variables (edit with your own server information)
 $server = 'sql306.unaux.com';
 $user = 'unaux_28911338';
 $pass = '45bmw3ona';
 $db = 'unaux_28911338_super';
  
 // Connect to Database
 $connection = @mysql_connect($server, $user, $pass) 
 //or die ("Could not connect to server ... \n" . mysql_error ());
 or die ("Could not connect to server ... \n");
 @mysql_select_db($db) 
 //or die ("Could not connect to database ... \n");

?>