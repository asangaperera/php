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
	$id = $row['id'];
	$foodid = $row["nauto_id"];
	$qty = $row["qty"];
	$userid = $row["cust_id"];
	$checkout = $row['checkout'];


	$name = $row["prodname"];
	$image = $row["image"];
	$category = $row["category"];
	$price = $row["price"];
	$desc = $row["descr"];
	$quntity=$row["quntity"];
}

if($quntity < 1)
{
	echo "<script>alert('Product is Unavalable!')</script>";
	
}

else
{
	$realquntity = $quntity - $qty;
	$sql = "UPDATE nautoitem SET quntity = '$realquntity' WHERE id = '$foodid'";
	mysqli_query($db_conx, $sql);
}

// Close your database connection
mysqli_close($db_conx);

//echo "<script>header(location='cart.php');</script>";
header("location:cart.php");
?>
 