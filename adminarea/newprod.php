<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>NEW PRODUCT PAGE</title>
	<link rel="stylesheet" type="text/css" href="adminstyle.css">

</head>
<body>

<script type="text/javascript">
<!--  Begin

function resetform()
{
document.forms[0].elements[1]=="";
}

function submitForms()
{
if (isName() && isPath()&& isPrice() && Type() && isDesc() && isCategory() )
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


function isName()
{
if (document.forms[0].elements[0].value == "")
{
alert ("The Name field is blank. Please enter Item item Name.")
document.forms[0].elements[0].focus();
return false;
}
return true;
}


function isPath()
{
if (document.forms[0].elements[1].value == "")
{
alert ("The Path field is blank. \n\nPlease enter Path.") 
document.forms[0].elements[1].focus();
return false;
}
return true;
}

function isCategory()
{
if (document.forms[0].elements[2].value == "") 
{
alert ("The Category field is blank. \n\nPlease enter Category.")
document.forms[0].elements[1].focus();
return false;
}
return true;
}

function isPrice()
{
if (document.forms[0].elements[3].value == "")
{
alert ("The Price field is blank. \n\nPlease enter Price.")   
document.forms[0].elements[1].focus();
return false;
}
return true;
}

function isDesc()
{
if (document.forms[0].elements[4].value == "")
{
alert ("The Desc field is blank. \n\nPlease enter Desc.")  
document.forms[0].elements[1].focus();
return false;
}
return true;
}

function isType()
{
if (document.forms[0].elements[5].value == "")
{
alert ("The Type field is blank. \n\nPlease enter Type.")
document.forms[0].elements[1].focus();
return false;
}
return true;
}
// End -->
</script>

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

<p align="center"><b>NEW Item ITEMS PAGE</b></p>

<?php echo 'Hi, <strong>' . $admin . '</strong> Good To See You Working! || <a href="logout.php"> Logout </a>'; ?>

<br />
<div align="center">
	<?php include("adminmenu.php");?>
</div>

<br />

<div align="center">
<table border="0" cellpadding="1" cellspacing="0" width="100%">
  <tr>
    <td colspan="5" height="96">
		<form name="formRegister" method="post" action="confirmprod.php" onSubmit="return submitForms()">
        <table width="400" align="center" border="0">
        <tr>
            <td bgColor="c6d3ce">
              <table width="400" border="0">
                <tr bgColor="dee7e7">
                  <td width="165">Name</td>
                  <td><b><input type="text" size="25" type="required" placeholder="VehicleType/Tyres.jpeg" id="Name"  name="Name"></b></td>
                </tr>
                <tr bgColor="e7efef">
                  <td>Path</td>
                  <td><b><input type="text" size="25" placeholder="VehicleType/Tyres.jpeg"  name="Path"></b></td>
				</tr>
                <tr bgColor="e7efef">
                  <td>Category</td>
                  <td><b><input type="text" size="25" name="Category" placeholder="5" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"></b></td>
                </tr>
                <tr bgColor="e7efef">
                  <td>Price</td>
                  <td><b><input type="text" maxlength="10" placeholder="20000.00" name="Price" size="20" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"></b></td>
                </tr>
                <tr bgColor="e7efef">
                  <td>Description</td>
                  <td><b><textarea cols="20" rows="2" placeholder="Tyres"  name="Desc"></textarea></b></td>
                </tr>
                <tr bgColor="e7efef">
                  <td>Type</td>
                  <td><b><input type="text" size="20" placeholder="featured" name="Type"></b></td>
                </tr>
                <tr bgColor="dee7e7">
                  <td>Views</td>
                  <td><b><input type="text" placeholder="5" maxlength="10" name="Views" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"></b></td>
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