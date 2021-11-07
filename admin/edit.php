<?php
 
require('db.php');
include("auth.php");
$id=$_REQUEST['id'];
$query = "SELECT * from pharmacy where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> | <a href="index1.html">Insert New Record</a> | <a href="logout.php">Logout</a></p>
<h1>Update Record</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$Name =$_REQUEST['Name'];
$email = $_REQUEST['email'];
$Password =$_REQUEST['Password'];
$Adress =$_REQUEST['Adress'];
$Model= $_REQUEST['Model'];
$PartName =$_REQUEST['PartName'];
$Description = $_REQUEST['Description'];
$ContactNo =$_REQUEST['ContactNo'];
$Price = $_REQUEST['Price'];
$update="update new_record set  Name='".$Name."', email='".$email."', Password='".$Password."', Adress='".$Adress."', Model='".$Model.", PartName='".$PartName."', Description='".$Description."', ContactNo='".$ContactNo.", Price='".$Price."' where id='".$id."'";
mysqli_query($con, $update) or die(mysqli_error());
$status = "Record Updated Successfully. </br></br><a href='view.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<p><input type="text" name="Name" placeholder="Enter seller Name" required value="<?php echo $row['Name'];?>" /></p>
<p><input type="text" name="email" placeholder="email" required value="<?php echo $row['email'];?>" /></p>
<p><input type="text" name="Adress" placeholder="Pickup Adress" required value="<?php echo $row['Adress'];?>" /></p>
<p><input type="text" name="Password" placeholder="Password" required value="<?php echo $row['Password'];?>" /></p>
<p><input type="text" name="Model" placeholder="Model Name" required value="<?php echo $row['Model'];?>" /></p>
<p><input type="text" name="PartName" placeholder="PartName" required value="<?php echo $row['PartName'];?>" /></p>
<p><input type="text" name="Description" placeholder="about the auto part" required value="<?php echo $row['Description'];?>" /></p>
<p><input type="text" name="ContactNo" placeholder="ContactNo" required value="<?php echo $row['ContactNo'];?>" /></p>
<p><input type="text" name="Price" placeholder="Price" required value="<?php echo $row['Price'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>

<br /><br /><br /><br />

</div>
</div>
</body>
</html>
