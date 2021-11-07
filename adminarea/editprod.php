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
	$id = $_GET['id'];
	
	$sql = ("SELECT * FROM spare_part WHERE id=$id");
	$query = mysqli_query($db_conx,$sql);
	
	while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
	{
		$id = $row['id'];
		$prodname = $row['prodname'];
		$image = $row['image'];
		$category = $row['category'];
		$price = $row['price'];
		$descr = $row['descr'];
		$type = $row['type'];
		$views = $row['noviews'];
	}
}

else
{
	echo "ERROR!!!";
	$id = "";
}

?>

<!DOCTYPE html>
<html>
<head>
<title>EDIT Item ITEM PAGE</title>
	<link rel="stylesheet" type="text/css" href="adminstyle.css">

	<script type="text/javascript">
<!--  Begin

function resetform()
{
document.forms[0].elements[0]=="";
}

function submitForms()
{
if (isName() && isImage() && isCategory() && isPrice() && isDescr() && isType())
if (confirm("\n You are about to submit this form. \n\nPress Ok to submit. Cancel to abort."))
{
alert("Form Submitted!");
return true;
}
else
{
alert("You have chosen to cancel this submission.");
return false;
}
else 
return false;
}

</script>

</head>
<body>

<p align="center"><b>EDIT Item ITEM PAGE</b></p>

<?php echo 'Hi, <strong>' . strtoupper($admin) . '</strong> Good To See You Working! || <a href="logout.php"> Logout </a>'; ?>

<br />
<div align="center">
	<?php include("adminmenu.php");?>
</div>
<br />
<div align="center">
<table border="0" cellpadding="1" cellspacing="0" width="100%">
  <tr>
    <td colspan="5" height="96">
		<form name="formRegister" method="post" action="confirmeditprod.php" onSubmit="return submitForms()">
        <table width="400" align="center" border="0">
        <tr>
            <td bgColor="c6d3ce">
              <table width="400" border="0">
			  <tr bgColor="dee7e7">
				 <td width="165"><strong>ID : <?php echo $id; ?></strong></td>
				 <td><input type="hidden" name="id" value="<?php echo $id; ?>"></td>
			  </tr>
				<tr bgColor="dee7e7">
                  <td width="165">Name</td>
                  <td><b><input type="text" size="25" name="Name" value="<?php echo $prodname; ?>"></b></td>
                </tr>
                <tr bgColor="e7efef">
                  <td>Image</td>
                  <td><b><input type="file" size="100000" name="image" value="<?php echo $image; ?>"></b></td>
				</tr>
                <tr bgColor="e7efef">
                  <td>Category</td>
                  <td><b><input type="text" size="25"  name="Category" value="<?php echo $category; ?>" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"></b></td>
                </tr>
                <tr bgColor="e7efef">
                  <td>Price</td>
                  <td><b><input type="text" name="Price" size="25" value="<?php echo $price; ?>" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"></b></td>
                </tr>
                <tr bgColor="e7efef">
                  <td>Description</td>
                  <td><b><input type="text" size="25" col="3" name="Descr" value="<?php echo $descr; ?>"></b></td>
                </tr>
                  <td>Type</td>
                  <td><b><input type="text" size="10" name="Type" value="<?php echo $type; ?>"></b></td>
				</tr>				
				<tr bgColor="dee7e7">
                  <td>Views</td>
                  <td><b><input type="text" name="Views" placeholder="5" value="<?php echo $views; ?>"></b></td>
                </tr>
				</table>
            </td>
        </tr>
        </table>
        <br>
        <table width="400" align="center" border="0">
          <tr>
            <td align="center" width="200"><input type="submit" value="Submit"></td>
            <td align="center" width="200"><input type="reset" name="reset" value="Reset Form" onClick="return confirm('Are you sure you want to reset the current information?');"></td>
          </tr>
        </table>
      </form>
    </td>
  </tr>
</table>
</div>
</body>
</html>