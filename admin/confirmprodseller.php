<?php
 
include ("includes/mysqli_connection.php");

$prodname = mysqli_real_escape_string($db_conx,$_POST['Name']);
$image = mysqli_real_escape_string($db_conx,$_POST['image']);
$category = mysqli_real_escape_string($db_conx,$_POST['Category']);
$price = mysqli_real_escape_string($db_conx,$_POST['Price']);
$desc = mysqli_real_escape_string($db_conx,$_POST['Desc']);
$type = mysqli_real_escape_string($db_conx,$_POST['Type']);
$views = mysqli_real_escape_string($db_conx,$_POST['Views']);

	// This first query is just to get the total count of rows
	$sql = "SELECT COUNT(*) FROM nautoitem WHERE prodname = '$prodname'";
	
	$query = mysqli_query($db_conx, $sql);
	
	$row = mysqli_fetch_row($query);
	
	// Here we have the total row count
	$rows = $row[0];
	
	if($rows == 0)
	{	
		$insertSQL = "INSERT INTO nautoitem (prodname, image, category, price, descr, type, noviews)
				VALUES ('$prodname', '$image', '$category', '$price', '$desc', '$type', '$views')";
			
		mysqli_query($db_conx, $insertSQL);
		
		if($insertSQL)
		{
			echo "<script>alert('Successfully Added!')</script>";
			
			echo "<script>window.location.href='seller.php'</script>";
        }
        else
		{
            echo 'An error occured while uploading the entry to database. Please try again later.';
        }
	}
	
	else
	{
		echo "<font color='red'>Sorry This Product already exists!</font>";
		echo "<script>alert('Redirecting...')</script>";
   		echo "<script>window.location.href='newprod.php'</script>";
	}
	
	// Close your database connection
	mysqli_close($db_conx);
?>