
   
<?php
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
  require('db.php');
  session_start();
  $conn = mysqli_connect("localhost", "root", "", "aaa");
    // If form submitted, insert values into the database.
    if (isset($_POST['seller_userName'])){
    
    $seller_userName = stripslashes($_REQUEST['seller_userName']); // removes backslashes
    $seller_userName = mysqli_real_escape_string($conn,$seller_userName); //escapes special characters in a string
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($conn,$password);
    $password = md5($password);
    
  //Checking is user existing in the database or not
        $query = "SELECT * FROM `seller` WHERE seller_userName='$seller_userName' and password='$password'";
    $result = mysqli_query($conn,$query) or die(mysqli_error());
    $rows = mysqli_num_rows($result);
        if($rows==1){
      $_SESSION['seller_userName'] = $seller_userName;
      
     // Redirect user to index.php
            }else{
        echo "<div class='form'><h3>Username or password is incorrect</h3><br/>Click here to <a href='login.php'>Login</a></div>";
        }
      session_regenerate_id();
    $_SESSION['loggedin'] = TRUE;
    //$_SESSION['name'] = $_POST['username'];
   // $_SESSION['seller_userName'] = $_POST['seller_userName'];
    //$_SESSION['email'] = $_POST['email'];
    $_SESSION['seller_id'] = $seller_id;


//$conn = mysqli_connect("localhost", "root", "", "autopart");

$session_username=$_SESSION['seller_userName'];
$select_user="select * from seller where seller_userName='$seller_userName'";
$run_user=mysqli_query($conn, $select_user);
$row_user=mysqli_fetch_array($run_user);
$seller_id=$row_user['seller_id'];

    if (isset($_GET['id']))
      
    {   $alt_id=$_GET['id'];
      


    $discription = mysqli_real_escape_string($db, $_POST['discription']);
    $sp_make= mysqli_real_escape_string($db, $_POST['sp_make']);
    $sp_name = mysqli_real_escape_string($db, $_POST['sp_name']);
    $sp_price = mysqli_real_escape_string($db, $_POST['sp_price']);
    $sp_category= mysqli_real_escape_string($db, $_POST['sp_category']); 


     if (isset($_GET['id']))
      
    {   $alt_id=$_GET['id'];
      


    // image file directory
    
    $sql = "INSERT INTO spare_part ( discription,sp_make,sp_name,sp_price,sp_category,seller_id,alt_id) VALUES ('$discription','$sp_make','$sp_name','$sp_price','$sp_category','$seller_id', '$alt_id')";
    // execute query
    mysqli_query($db, $sql);

   

    }else
      $msg = "Failed to upload your Ad;-";
    }
  }

header("Location: alter.php");
    }else{
      
?>
<div class="form">

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
        
        <a href="index_h.php"><i class="fas fa-user-circle"></i>Home</a>
                
    </nav>
    <div class="content">
      <h2>Alternative sparepart Ad Page</h2>
      <p> Post Alternative spare part Advertiesment</p>
    </div>
    </nav>
    <div class="content">
      
    
  <div>


<div class="content">
 
  <form method="POST" action="alter.php">
    
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

    <tr>
 <td> 
Username : 
</td>
<td>
<input type="text" placeholder="Username" class="from-control" id="seller_userName" name="seller_userName"  required />
<br>
</td>
<tr/>
<tr>
 <td> 
Password : 
</td>
<td>
<input type="password"placeholder="Password" class="from-control" id="password"name="password"  required />
</td>
</tr>
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
<div>
<br>
<tr>
 <td> 
Price : 
</td>
<td> 
<input type="text"pLaceholder="Price" class="from-control" id="price" name="price"  required/>
</td>
</tr></div>
<div>
  <tr>
    <div>
      <input name="submit" type="submit" value="Post Ad" />
</form>
<p>Not registered yet? <a href='registration.php'>Register Here</a></p>
    </div>
</tr>
  </form>
</div>
<?php } ?>
</body>
</html>



