<!DOCTYPE html>
<html>
<head>
	<title>ADMIN PANEL</title>
	<style >
	body{
		margin: 0px;
		border: 0px;
	}	
#header{
	width: 100%;
	height:140px;
	background: darkblue;
	color: white;
    font-size: 25px;
}
#sidebar1{
	width: 300px;
	height: 600px;
	background:lightblue ;
	float: left;
}

#sidebar2{
	width: 300px;
	height: 600px;
	background:lightblue ;
	float: right;}
#data{

height: 600px;
background-image: url(admin.jpg);
color: white;
font-family:Helvetica;
font-size:20px;
}

#adminLogo {
	background: blue;
	border-radius: 30px;
	height:90px;

}
 ul li{
 	padding: 30px;
 	border-bottom: 2px solid white;
 	font-size: 20px;
 	color: black;
 }
ul li:hover{
	background-color:white;
	color: white;
}

	</style>



</head>
<body>
	<div id="header">
		<center> <img src="../image/logo.png" title="Nauto Logo" alt="Our Logo" /><br>  Admin Panel</center>
		</div>
         <div>
		<center><a href="LogoutCopy.php" style="font-size: 30px;">Logout</a></center>
		</div>

<div id ="sidebar1"> 
<ul>
	<li><a href="postad.php">POST Ads</a></li>
    <li><a href="viewprod.php">ITEMS</a></li>
     <li> <a href="viewusers.php">USERS</a> </li>
    <li><a href="trans.php">VIEW TRANSACTIONS </a></li>
    <li><a href="viewusers_staff.php">STAFF</a> </li>
    <li><a href="viewdeliver.php">DELIVERS</a> </li>
  

<table border="0"><li><a href="viewprod.php">ITEMS</a></li>
	<tr>
	      
		


		
	</tr>
</table>

</div>





<div id ="sidebar2"> 
<ul>
	
    
    <li><a target="_blank" href="staff.php">NEW ORDERS</a> </li>
    <li><a target="_blank" href="seller.php">REDY ORDERS</a> </li>
    <li><a href="delivery.php">REDY TO DELIVER</a></li>
     <li><a href="return.php">RETURN ORDERS</a> </li>
    <li><a href="comment.php">COMMENT</a> </li>
    <li><a href="viewpage.php">PAGE</a> </li>
   <li><a href="viewcategories.php">CATEGORIES</a> </li>

</ul>



</div>
<div id ="data" >
	


 </div>
</body>
</html>