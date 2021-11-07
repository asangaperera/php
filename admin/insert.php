<?php
 
require('db.php');
include("auth.php");

$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
/*$trn_date = date("Y-m-d H:i:s");*/
$Name =$_REQUEST['Name'];
$email = $_REQUEST['email'];
$Password =$_REQUEST['Password'];
$Adress =$_REQUEST['Adress'];
$Model= $_REQUEST['Model'];
$PartName =$_REQUEST['PartName'];
$Description = $_REQUEST['Description'];
$ContactNo =$_REQUEST['ContactNo'];
$Price = $_REQUEST['Price'];


$submittedby = $_SESSION["username"];
$ins_query="insert into up (​ `Name`, `email`, `Adress`, `Password`, `Model`, `PartName`, `Description`, `ContactNo`, `Price`) values ( `$Name`, `$email`, `$Adress`, `$Password`, `$Model`, `$PartName`, `$Description`, `$ContactNo`, `$Price`)";
mysqli_query($con,$ins_query) or die(mysql_error());
$status = "New Record Inserted Successfully.</br></br><a href='view.php'>View Inserted Record</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> | <a href="view.php">View Records</a> | <a href="logout.php">Logout</a></p>

<div>
<h1>Add New Spare Part Ad</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<p><input type="text" name="Name" placeholder="Enter Name" required /></p>
<p><input type="text" name="email" placeholder="email" required /></p>
<p><input type="text" name="Password" placeholder="Password" required /></p>
<p><input type="text" name="Adress" placeholder="Pickup Adress" required /></p>
<p><input type="text" name="Model" placeholder="Model Name" required /></p>
<p><input type="text" name="PartName" placeholder="PartName" required /></p>
<p><input type="text" name="Description" placeholder="Spare part details" required /></p>
<p><input type="text" name="ContactNo" placeholder="ContactNo" required /></p>
<p><input type="text" name="Price" placeholder="Price of Spare part" required /></p>
<p><input name="submit" type="submit" value="Submit" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>

<br /><br /><br /><br />

</div>
</div>
</body>
</html>
