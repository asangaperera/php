<?php
session_start();

if (isset($_SESSION['user_id']))
{
	$userid = $_SESSION['user_id'];
}

else
{
	$userid = "";
}
?>

<?php
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
$_SESSION['code'] = rand();
$code = $_SESSION['code'];
?>

<?php

$id = $_POST['id'];
$Qty = $_POST['txtQty'];
$userid = $_POST['txtuserid'];
$location = $_POST['txtlocation'];
$today = date("Y-m-d H:i:s");


 // Included configuration file in our code.
include("includes/mysqli_connection.php");

$sqlcode = "SELECT * FROM cart WHERE cust_id = '$userid' AND checkout = 'n'";
$query = mysqli_query($db_conx, $sqlcode);

$sqltrans = "UPDATE cart SET trans = '$code' WHERE cust_id = '$userid' AND checkout = 'n'";
mysqli_query($db_conx, $sqltrans);

$sql = "SELECT COUNT(*) FROM cart WHERE cust_id = '$userid' AND nauto_id = '$id' AND checkout = 'n'";
$query = mysqli_query($db_conx, $sql);

$row = mysqli_fetch_row($query);

$rows = $row[0];

if($rows == 0)
{
	$insertSQL = "INSERT INTO cart (id, nauto_id, qty, location, cust_id, checkout, added, checkedon, trans, status) VALUES ('', '$id', '$Qty','$location', '$userid', 'n', '$today', '', $code, 'pending' )";
	mysqli_query($db_conx, $insertSQL);
	
	if($insertSQL)
	{
		echo "<script>alert('Item Added in Cart!')</script>";
		//echo "<script>header(location='cart.php')</script>";
		echo "<script>window.location.href='cart.php';</script>";
	}
	else
	{
		echo "<script>alert('An error occured. Please try again later.')</script>";
		//echo "<script>header(location='index.php')</script>";
		echo "<script>window.location.href='index.php';</script>";
	}
}
else
{
$sql = "SELECT * FROM cart , nautoitem WHERE  cart.nauto_id = $id AND nautoitem.id = cart.nauto_id";
$query = mysqli_query($db_conx, $sql);

while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
{
	$cartid=$row['id'];
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

if($quntity < 1)
{
	echo "<script>alert('This item is Unavalable!')</script><script>window.location.href='index.php';</script>";
	
}

else
{
	$realquntity = $quntity - $Qty;
	$sql = "UPDATE nautoitem SET quntity = '$realquntity' WHERE id = '$p_id'";
	mysqli_query($db_conx, $sql);


    $sql = "UPDATE cart SET location = '$location' WHERE id = '$cartid'";
	mysqli_query($db_conx, $sql);


	$sql1 = "SELECT * FROM cart WHERE cust_id = '$userid' AND nauto_id = '$id' AND checkout = 'n'";

	$query = mysqli_query($db_conx, $sql1);
	
	while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
	{
		$cartid = $row['id'];
		$id = $row['nauto_id'];
		$actualqty = $row['qty'];
		$userid = $row['cust_id'];
		$checkout = $row['checkout'];
		$added = $row['added'];
		$trans = $row['trans'];
	}
	
	$actualqty = ($actualqty + $Qty);
	
	$updateqty = "UPDATE cart SET id = '$cartid', nauto_id = '$id', qty = '$actualqty', location= '$location', cust_id = '$userid', checkout = '$checkout', added = '$today', checkedon = '', trans = '$code' WHERE cust_id = '$userid' AND nauto_id = '$id' AND checkout = 'n'";
	mysqli_query($db_conx,$updateqty);
	
}

// Close your database connecti
   





	if($updateqty)
	{
		echo "<script>alert('Item Updated in Cart!')</script>";

		echo "<script>window.location.href='realqty.php';</script>";
		//echo "<script>header(location='cart.php')</script>";
		echo "<script>window.location.href='cart.php';</script>";
		//header("refresh:5; url=cart.php");
	}
	else
	{
		echo "<script>alert('An error occured. Please try again later.')</script>";
		//echo "<script>header(location='index.php')</script>";
		echo "<script>window.location.href='index.php';</script>";
	}
}
	// Close your database connection
	mysqli_close($db_conx);
?>