<?php 
 $server = "localhost";
 $dbname = "super";
 $dbusername ="root";
 $dbpassword ="";

 @mysql_connect($server,$dbusername,$dbpassword) or die (mysql_error()); 

 @mysql_select_db($dbname) or die (mysql_error());

@session_start();



 function CUD($sql)  {

	 $result = 	mysql_query($sql) or die(mysql_error());

	 if($result=0){
	 	?>
	 	<script type="text/javascript">
	 	alert("function cannot be perform.");

	 	</script>

	 	<?php
	 }


 }



 
?>