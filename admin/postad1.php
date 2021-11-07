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
				<h1>Autoparts</h1>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
				<a href="home_seller.php"><i class="fas fa-user-circle"></i>Home</a>
                
		</nav>
		<div class="content">
			<h2>Post Ad Page</h2>
			<p> Post your new sparepart Advertiesment</p>
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
        placeholder="Say something about this image..."></textarea>
    </div>
    <div>
    <br>
    
<br>
<tr>
 <td> 
Model : 
</td>
<td> 
	<br>
<input type="text"pLaceholder="Model" class="from-control" id="sp_make" name="sp_make"  required/>
</td>
</tr></div>
<div>
<br>
<tr>
 <td> 
Spare Part Name : 
</td>
<td> 
<input type="text"pLaceholder="Spare Part Name" class="from-control" id="sp_name" name="sp_name"  required/>
</td>
</tr></div>
<div>
<br>
<tr>
 <td> 
Category : 
</td>
<td> 
<input type="text"pLaceholder="Category" class="from-control" id="sp_category" name="sp_category"  required/>
</td>
</tr></div>
<div>
<br>
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
      <button type="submit" name="upload">POST</button>
    </div>
</tr>
  </form>
</div>
</body>
</html>
   

