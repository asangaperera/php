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
$amount = $_POST['txtamount'];
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
	$insertSQL = "INSERT INTO cart (id, nauto_id, qty, cust_id, checkout, added, checkedon, trans, status,amount) VALUES ('', '$id', '$Qty', '$userid', 'n', '$today', '', $code, 'pending','$amount' )";
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
	
	$updateqty = "UPDATE cart SET id = '$cartid', nauto_id = '$id', qty = '$actualqty', cust_id = '$userid', checkout = '$checkout', added = '$today', checkedon = '', trans = '$code' WHERE cust_id = '$userid' AND nauto_id = '$id' AND checkout = 'n'";
	mysqli_query($db_conx,$updateqty);
	
	if($updateqty)
	{
		echo "<script>alert('Item Updated in Cart!')</script>";
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