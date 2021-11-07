<?php 
 $server = "sql306.unaux.com";
 $dbname = "unaux_28911338_super";
 $dbusername ="unaux_28911338";
 $dbpassword ="45bmw3ona";


 
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