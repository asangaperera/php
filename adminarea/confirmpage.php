<?php

include ("includes/mysqli_connection.php");

$content = mysqli_real_escape_string($db_conx,$_POST['content']);
$webpage = mysqli_real_escape_string($db_conx,$_POST['webpage']);


	// This first query is just to get the total count of rows
	$sql = "SELECT COUNT(*) FROM webcontent WHERE webpage = '$webpage'";
	
	$query = mysqli_query($db_conx, $sql);
	
	$row = mysqli_fetch_row($query);
	
	// Here we have the total row count
	$rows = $row[0];
	
	if($rows == 0)
	{	
		$insertSQL = "INSERT INTO webcontent (content, webpage)
				VALUES ('$content', '$webpage')";
			
		mysqli_query($db_conx, $insertSQL);
		
			
		
		if($insertSQL)
		{
			echo "<script>alert('Successfully Added!')</script>";
			
			echo "<script>window.location.href='viewpage.php'</script>";
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
   		echo "<script>window.location.href='newpage.php'</script>";
	}
	
	// Close your database connection
	mysqli_close($db_conx);
?>