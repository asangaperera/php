<?php require_once ("../db/config.php"); ?>
<?php
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) { 
	case 'confirm' :
	doConfirm();
	break;
	case 'cancel' :
	doCancel();
	break;
	case 'okay' :
	doCheckin();
	break;
	case 'end' :
	doCheckout();
	break;
	}



function doCheckout(){

	$id = $_GET['id'];

$sql ="UPDATE `cart` SET `status`='Check Out' WHERE `nauto_id`=". $id;
$res = mysql_query($sql) or die(mysql_error());

if($res>0){
	?>
	<script type="text/javascript">
	window.location ="seller.php";
	</script>
	<?php
}
 

}
function doCheckin(){
$id = $_GET['id'];
$sql ="UPDATE `cart` SET `status`='Ordered' WHERE `nauto_id`=". $id;
$res = mysql_query($sql) or die(mysql_error());

if($res>0){
	?>
	<script type="text/javascript">
	window.location ="seller.php";
	</script>
	<?php
}
 
 

}


function doCancel(){
$id = $_GET['id'];

 $sql ="UPDATE `cart` SET `status`='Cancelled' WHERE `nauto_id`=". $id;
$res = mysql_query($sql) or die(mysql_error());

if($res>0){
	?>
	<script type="text/javascript">
	window.location ="<?php require_once ("../db/config.php"); ?>
<?php
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) { 
	case 'confirm' :
	doConfirm();
	break;
	case 'cancel' :
	doCancel();
	break;
	case 'okay' :
	doCheckin();
	break;
	case 'end' :
	doCheckout();
	break;
	}



function doCheckout(){

	$id = $_GET['id'];

$sql ="UPDATE `cart` SET `status`='Ordered' WHERE `nauto_id`=". $id;
$res = mysql_query($sql) or die(mysql_error());

if($res>0){
	?>
	<script type="text/javascript">
	window.location ="seller.php";
	</script>
	<?php
}
 

}
function doCheckin(){
$id = $_GET['id'];
$sql ="UPDATE `cart` SET `status`='Ordering' WHERE `nauto_id`=". $id;
$res = mysql_query($sql) or die(mysql_error());

if($res>0){
	?>
	<script type="text/javascript">
	window.location ="seller.php";
	</script>
	<?php
}
 
 

}
function doCancel(){
$id = $_GET['id'];

 $sql ="UPDATE `cart` SET `status`='Cancelled' WHERE `nauto_id`=". $id;
$res = mysql_query($sql) or die(mysql_error());

if($res>0){
	?>
	<script type="text/javascript">
	window.location ="seller.php";
	</script>
	<?php
}
 

}
function doConfirm(){
$id = $_GET['id'];
 
$sql ="UPDATE `cart` SET `status`='Confirmed' WHERE `nauto_id`=". $id;
$res = mysql_query($sql) or die(mysql_error());

if($res>0){
	?>
	<script type="text/javascript">
	window.location ="seller.php";
	</script>
	<?php
}
 
}	
?>";
	</script>
	<?php
}
 

}
	
?>