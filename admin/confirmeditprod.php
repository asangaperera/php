<?php
session_start();
include("includes/mysqli_connection.php");

// User is already logged in. Redirect them somewhere useful.
if (!isset($_SESSION['username']))
{
	echo "<script>alert('Web Master Says : : Login First :-( !!!')</script>";
    echo "<meta http-equiv='refresh' content='2;url=../index.php'>";
	exit();
}

else if(!isset($_SESSION['status']) )
{
	echo "<script>alert('INTRUDER!!!: :')</script>";
    echo "<meta http-equiv='refresh' content='2;url=../index.php'>";
	exit();
}

else
{
	$admin = $_SESSION['username'];
}

?>

<?php

if(isset($_SESSION['username']))
	
{
	$id = mysqli_real_escape_string($db_conx,htmlspecialchars($_POST['id']));
	$Name = mysqli_real_escape_string($db_conx,htmlspecialchars($_POST['Name']));
	$image = mysqli_real_escape_string($db_conx,htmlspecialchars($_POST['image']));
	$Category = mysqli_real_escape_string($db_conx,htmlspecialchars($_POST['Category']));
	$Price = mysqli_real_escape_string($db_conx,htmlspecialchars($_POST['Price']));
	$quntity = mysqli_real_escape_string($db_conx,htmlspecialchars($_POST['quntity']));
	$Descr = mysqli_real_escape_string($db_conx,htmlspecialchars($_POST['Descr']));
	$Type = mysqli_real_escape_string($db_conx,htmlspecialchars($_POST['Type']));
	$Views = mysqli_real_escape_string($db_conx,htmlspecialchars($_POST['Views']));
}

else
{
	echo "ERROR!!!";
	$id = "";
}
	
	$update = "UPDATE nautoitem SET prodname='$Name', image='$image', category='$Category', price='$Price', quntity='$quntity', descr='$Descr', type='$Type', noviews='$Views' WHERE id='$id'";
	
	$query = mysqli_query($db_conx,$update);
	
	if($query)
	{
		echo "<script>alert('Successfully Updated!')</script>";
		echo "<script>window.location.href='viewprod.php';</script>";
	}
	
	else
	{
		echo "Could not update data";
		echo "<script>window.location.href='viewprod.php';</script>";
	}
?>