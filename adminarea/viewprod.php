<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>VIEW ITEMS RECORDS</title>
	<link rel="stylesheet" type="text/css" href="adminstyle.css">
</head>
<body>

<?php

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

<p align="center"><b>VIEW ITEMS RECORDS</b></p>

<?php echo 'Hi, <strong>' . $admin . '</strong> Good To See You Working! || <a href="logout.php"> Logout </a>'; ?>

<br />
<div align="center">
	<?php include("adminmenu.php");?>
</div>

<?php

        // connect to the database
        include('includes/connect-db.php');
		
		$src="../image_upload/";

        // get results from database
        $result = mysql_query("SELECT * FROM spare_part ORDER BY id DESC") 
                or die(mysql_error());  
                
        // display data in table
        echo "<p><b>View All</b> | <a href='viewprod-paginated.php?page=1'>View Paginated</a> | <a href='newprod.php'>Add a New Product</a></p>";
        
        echo "<table align='center' border='1' cellpadding='10'>";
		
		echo "<tr> <th>ID</th> <th>Item NAME</th>  <th>CATEGORY</th> <th>PRICE</th> <th>DESCRIPTION</th> <th>MODEL</th> <th>VIEWS</th> <th>IMAGE</th> <th></th> <th></th></tr>";

		// loop through results of database query, displaying them in the table

        while($row = mysql_fetch_array( $result )) {	
			// echo out the contents of each row into a table
			echo "<tr>";
			echo '<td>' . $row['id'] . '</td>';
			echo '<td>' . $row['prodname'] . '</td>';
			echo '<td>' . $row['category'] . '</td>';
			echo '<td>Rs.' . $row['price'] . '</td>';
			echo '<td>' . $row['descr'] . '</td>';
			echo '<td>' . $row['type'] . '</td>';
			echo '<td>' . $row['noviews'] . '</td>';
			echo '<td><img src="' . $src . $row['image'] . '" width="80px height="80"></td>';
			echo '<td><a href="editprod.php?id=' . $row['id'] . '">Edit</a></td>';
			echo '<td><a href="deleteprod.php?paginated=no&id=' . $row['id'] . '">Delete</a></td>';
			echo "</tr>"; 
		}

        // close table>
        echo "</table>";
?>
</body>
</html>