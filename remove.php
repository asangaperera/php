<?php
session_start();

if (isset($_SESSION['user_id']))
{
	$userid = $_SESSION['user_id'];
}

if (isset($_SESSION['username']))
{
	$User = $_SESSION['username'];
}

else
{
	$User = "";
}
?>

<?php

$foodid = $_POST['txtfoodid'];

include("includes/mysqli_connection.php");




$sql = "SELECT * FROM cart , nautoitem WHERE  cart.nauto_id = $foodid AND nautoitem.id = cart.nauto_id";
$query = mysqli_query($db_conx, $sql);

while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
{
	$qty = $row['qty'];
	$userid = $row['cust_id'];
	$checkout = $row['checkout'];
	

    $p_id=$row["id"];
	$name = $row["prodname"];
	$image = $row["image"];
	$category = $row["category"];
	$price = $row["price"];
	$desc = $row["descr"];
	$quntity=$row["quntity"];
}



$rquntity = $quntity + $qty;
$sql = "UPDATE nautoitem SET quntity = '$rquntity' WHERE id = '$foodid'";
$updateqty = mysqli_query($db_conx, $sql);


$sql = "DELETE FROM cart WHERE cust_id = $userid AND nauto_id = $foodid";

mysqli_query($db_conx, $sql);



// Close your database connection
mysqli_close($db_conx);

echo "<script>alert('Item Successfully Removed');</script>";
echo "<script>window.location.href = 'cart.php';</script>";
?>
 