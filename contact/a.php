<?php session_start();  ?>

<!DOCTYPE html>
<html>
<head>
 <title>CONTACT US</title>
	<link rel="stylesheet" type="text/css" href="adminstyle.css">
</head>
	
<body>
    <table border="0">
	<tr>
		<td>| <a href="../about.php">ABOUT US</a></td>
		<td>| <a href="../index.php">HOME</a></td>
	</tr>
</table> <p align="center"><b>Contact us</b></p>



<div align="center">
<table border="0" cellpadding="1" cellspacing="0" width="100%">
  <tr>
    <td colspan="5" height="96">
		<form name="formRegister" method="post" action="aaa.php"">
        <table width="400" align="center" border="0">
        <tr>
            <td bgColor="c6d3ce">
              <table width="400" border="0">
                <tr bgColor="dee7e7">
                  <td width="165">Name</td>
                  <td><b><input type="text" size="25" name="name" placeholder="Ex:asa Perera" required ></b></td>
                </tr>
                <tr bgColor="e7efef">
                  <td>Email</td>
                  <td><b><input type="text" size="25" name="email" placeholder="Ex:asa1113@yahoo.com" required></b></td>
				</tr>
                
                <tr bgColor="e7efef">
                  <td>Comment</td>
                  <td><b><textarea class="form-control" input type="text" size="16" name="comment" rows="3" id="msg"></textarea> </b></td>
				 
				  
                </tr>
               
			   
			   
				</table>
            </td>
        </tr>
        </table>
        <br>
        <table width="400" align="center" border="0">
          <tr>
            <td align="center" width="200"><input type="submit" name="submit" value="Submit"></td>
            <td align="center" width="200"><input type="reset" name="reset" value="Reset Form" onClick="return confirm('Are you sure you want to clear the current information?');"></td>
          </tr>
        </table>
      </form>
    </td>
  </tr>
</table>
</div>
</body>
</html>	
	