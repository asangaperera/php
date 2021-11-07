<?php
session_start();

// User is already logged in. Redirect them somewhere useful.
if (!isset($_SESSION['username']))
{
	echo "<script>alert('Nauto Says : : Login First :-( !!!')</script>";
    echo "<meta http-equiv='refresh' content='2;url=../index.php'>";
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

<!DOCTYPE html>
<html>
<head>
<title>Nauto Area</title>
	<link rel="stylesheet" type="text/css" href="adminstyle.css">
</head>
<body>

<p align="center"><b>WEB MASTER AREA</b></p>

<?php echo 'Hi, <strong>' . $admin . '</strong> You are Working! || <a href="logout.php"> Logout </a>'; ?>

<br />
<div align="center">
	<?php include("adminmenu.php");?>
</div>
</body>
</html>