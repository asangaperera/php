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

//echo $foodid;
//exit();

include("includes/mysqli_connection.php");

$sql = "SELECT * FROM nautoitem WHERE id = '$foodid'";
$query = mysqli_query($db_conx, $sql);


while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
{
	$nautoid = $row['id'];
	$prodname = $row["prodname"];
	$quntity = $row["quntity"];

}

if($quntity<1)
{
	echo "<script>alert('You cannot add more than this!')</script>";

}
else
{

$rquntity = $quntity - 1;
$sql = "UPDATE nautoitem SET quntity = '$rquntity' WHERE id = '$nautoid'";
$updateqty = mysqli_query($db_conx, $sql);


$sql = "SELECT * FROM cart WHERE cust_id = '$userid' AND nauto_id = '$foodid' AND checkout = 'n'";
$query = mysqli_query($db_conx, $sql);




while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
{
	$id = $row['id'];
	$foodid = $row["nauto_id"];
	$qty = $row["qty"];
	$userid = $row["cust_id"];
	$checkout = $row['checkout'];
}

if($qty >= 100)
{
	echo "<script>alert('You cannot add more than this!')</script>";
	echo "<script>window.location.href='cart.php';</script>";
}

else
{
	$qty = $qty + 1;
	$sql = "UPDATE cart SET qty = '$qty' WHERE id = '$id'";
	$updateqty = mysqli_query($db_conx, $sql);
}

$sql = "SELECT * FROM nautoitem WHERE id = '$foodid'";
$query = mysqli_query($db_conx, $sql);


while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
{
 $prodname=$row['prodname'];
 $quntity=$row['quntity'];
}


$rquntity = $quntity - 1;
$sql = "UPDATE nautoitem SET quntity = '$rquntity' WHERE id = '$id'";
$updateqty = mysqli_query($db_conx, $sql);

}

// Close your database connection
mysqli_close($db_conx);
header("location:cart.php");
?>
 