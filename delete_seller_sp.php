<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/

require('db.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM cart WHERE id=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: sp_seller_edit.php"); 
?>