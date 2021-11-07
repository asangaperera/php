<?php
session_start();
?>

<!DOCTYPE html>  
<html>
<head>
<title>VIEW COMMENTS</title>
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
		
        // get results from database
        $result = mysql_query("SELECT * FROM contact ORDER BY id desc") //ascor desc need to see comment recently
                or die(mysql_error());  
                
        // display data in table
               
        echo "<table align='center' border='1' cellpadding='10'>";
		
		echo "<tr> <th>ID</th> <th>NAME</th> <th>EMAIL</th> <th>DATE</th> <th>COMMENT</th></tr>";

		// loop through results of database query, displaying them in the table

        while($row = mysql_fetch_array( $result )) {	
			// echo out the contents of each row into a table
			echo "<tr>";
			echo '<td>' . $row['id'] . '</td>';
			echo '<td>' . $row['name'] . '</td>';
			echo '<td>' . $row['email'] . '</td>';
			echo '<td>' . $row['date'] . '</td>';
			echo '<td>' . $row['comment'] . '</td>';
			echo "</tr>"; 
		}

        // close table>
        echo "</table>";
?>
</body>
</html>