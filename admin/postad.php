<?php
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home Page</title>
		<link href="style1.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>SUPERMARKET</h1>
				<a href="sp_seller_edit.php"><i class="fas fa-user-circle"></i>Edit ITEMS</a>
				<a href="LogoutCopy.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
				<a href="indexadmin.php"><i class="fas fa-user-circle"></i>Home</a>
                
		</nav>
		<div class="content">
			<h2>Add Items Page</h2>
			<p> Add new Items</p>
		</div>
		</nav>
		<div class="content">
			
		
	<div>


<div class="content">
 
  <form method="POST" action="home_seller.php" enctype="multipart/form-data" style="width: 200px; ">
    <input type="hidden" name="size" value="1000000">
    <div>
      <input type="file" name="image">
    </div>
    <div>
      <textarea 
        id="text" 
        cols="40" 
        rows="4" 
        name="discription" 
        placeholder="Discription of the Item"></textarea>
    </div>
    <div>
    	<div>
<br>
<tr><tr>
<td> Category : 
</td>
<td> 
<select name="sp_category" required/>
<option selected hidden value=""> Select Category </option>
<option value="Any Part of Accessory">Any Part of Category </option>
<option value="Vegitable">Vegitable(එළවළු)</option>
<option value="Fruits ">Fruits(පළතුරු) </option> 
<option value="spices ">spices(කුළුබඩු) </option>
<option value="Dried fish">Dried fish (කරවල) </option>
<option value="Dried fish">Other(වෙනත් )</option>
</select>
</td>
</tr>
<div>

<br>

<tr>
<td> Wight(Kg) :
 
</td>
<td> 
<input type="text"pLaceholder="Wight" class="from-control" id="sp_make" name="sp_make"  required/>
</td>
</tr></div>
<div>
<br>
<tr>
 <td> 
 Name : 
</td>
<td> 
<input type="text"pLaceholder="Generic-Name" class="from-control" id="sp_name" name="sp_name"  required/>
</td>
</tr></div>
<div>

<br>
<tr><tr>
<td> Brand Name : 
</td>
<td> 
<input type="text"pLaceholder="Brand Name" class="from-control" id="type" name="type"  required/>
</td>
</tr>
<div>
 <td> 
  <br>
<tr><tr>
<td>MFG. Date: 
</td>
<td> 
<input type="text"pLaceholder="Manufacturing date" class="from-control" id="mfgdate" name="mfgdate"  required/>
</td>
</tr></div>
<div>
 <td> 
  <br>
<tr><tr>
<td>EXP. Date: 
</td>
<td> 
<input type="text"pLaceholder="Expiry Date" class="from-control" id="exdate" name="exdate"  required/>
</td>
</tr></div>
 <td> 
  <br>
<tr><tr>
<td> Quntity : 
</td>
<td> 
<input type="text"pLaceholder="Quntity" class="from-control" id="quntity" name="quntity"  required/>
</td>
</tr>
 <td> 
</tr></div>
<div><br>
<tr>
 <td> 
Price : 
</td>
<td> 
<input type="text"pLaceholder="Price" class="from-control" id="sp_price" name="sp_price"  required/>
</td>
</tr></div>
<div>
	<tr>
    <div>
    	<br>
      <button type="submit" name="upload">POST</button>
    </div>
</tr>
  </form>
</div>
</body>
</html>
   

