<?php
//db connection settings
$host="sql306.unaux.com"; // Host name 
$username="unaux_28911338"; // Mysql username 
$password="45bmw3ona"; // Mysql password 
$db_name="unaux_28911338_super"; // Database name

$conn = @mysql_connect($host, $username, $password);// or trigger_error(mysql_error(mysql_error(),E_USER_ERROR)
@mysql_select_db($db_name, $conn) or die("could not" . mysql_error());
?>