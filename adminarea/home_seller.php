


<?php

session_start(); // start a session
if (isset($_SESSION['user_id'])) { // check if session user_id is set
  $userid = $_SESSION['user_id']; //if it is set, assign the value to the variable $userid
}
else { // if it is not set
  $userid = ""; // assign a null value to $userid
}
echo "User ID: " . $userid; //print it on screen.
?>
<?php  

  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "pharmacy");

  // Initialize message variable
  $msg = "";
//$session_username=$_SESSION['username'];
//$select_seller="select * from user where username='$session_username'";
//$run_seller=mysqli_query($db, $select_seller);
//$row_seller=mysqli_fetch_array($run_seller);
//$user_id=$row_seller['userid'];
  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
    // Get image name
    $image = $_FILES['image']['name'];
    // Get text
    $discription = mysqli_real_escape_string($db, $_POST['discription']);
    $sp_make= mysqli_real_escape_string($db, $_POST['sp_make']);
    //$sp_type = mysqli_real_escape_string($db, $_POST['sp_type']);
    $sp_name = mysqli_real_escape_string($db, $_POST['sp_name']);
    $sp_price = mysqli_real_escape_string($db, $_POST['sp_price']);
    $sp_category= mysqli_real_escape_string($db, $_POST['sp_category']);

    // image file directory
    $target = "image_upload/".basename($image);
    $sql = "INSERT INTO spare_part (image, discription,sp_make,sp_name,sp_price,sp_category,seller_id) VALUES ('$image','$discription','$sp_make','$sp_name','$sp_price','$sp_category','$userid')";
    // execute query
    mysqli_query($db, $sql);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      $msg = "your Spare part Ad uploaded successfully";
    }else
      $msg = "Failed to upload your Ad;-";
    }
  

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
        
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
        <a href="index.php"><i class="fas fa-user-circle"></i>Home</a>
        <a href="sp_seller_edit.php"><i class="fas fa-user-circle"></i>Edit or Delete your Ads</a>
        <a href="postad.php?seller_id=<?php echo $userid ?>"><i class="fas fa-user-circle"></i>Post your New Advertisement</a>
      </div>
    </nav>
    <div class="content">
      <h2>Seller Home Page</h2>
      <p>Welcome back Seller, <?=$_SESSION['username']?>!</p>
      <p>your Posted Ads...</p>
        </div class="content">
          <div class="content">


<?php  

  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "nauto");

  // Initialize message variable
  $msg = "";
//$session_username=$_SESSION['username'];
//$select_seller="select * from user where username='$session_username'";
//$run_seller=mysqli_query($db, $select_seller);
//$row_seller=mysqli_fetch_array($run_seller);
$seller_id=$_SESSION['user_id'];
 
  // If upload button is clicked ...
 

 $result = mysqli_query($db,"SELECT * FROM spare_part WHERE seller_id='$seller_id'order BY spare_part .sp_id DESC" );
  //$result = mysqli_query($db, "SELECT * FROM  order by spare_part .sp_id DESC ");

//  $result = mysqli_query($db, "SELECT * FROM spare_part order by spare_part .sp_id DESC ");
?>


  <?php
     while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
       echo "<img src='image_upload/".$row['image']."' >";
        echo "<p>".$row['discription']."</p>";
        echo "<p>".$row['sp_make']."</p>";
         //echo "<p>".$row['sp_type']."</p>";
        echo "<p>".$row['sp_name']."</p>";
         echo "<p>".$row['sp_price']."</p>";
         echo "<p>".$row['sp_category']."</p>";
        echo '<a href="prop.php?first=<?php echo $row["sp_id"]; ?>"View/Order</a>';
    
    echo "</div>";

   }

  ?>
<!DOCTYPE html>
<nav class="navbottom">

<style type="text/css">
   #content{
    width: 50%;
    margin: 20px auto;
    border: 1px solid #cbcbcb;
   }

   form{
    width: 50%;
    margin: 20px auto;
   }
   form div{
    margin-top: 5px;
   }
   #img_div{
    width: 80%;
    padding: 5px;
    margin: 15px auto;
    border: 1px solid #cbcbcb;
   }
   #img_div:after{
    content: "";
    display: block;
    clear: both;
   }
   img{
    float: left;
    margin: 5px;
    width: 300px;
    height: 180px;
   }
</style>
</head>
  </body>
</html>
  
              </div class="content">

</style>
</head>



    
    
    
      
</nav>

    </div>
  </form>
    </div>


</table>



  </body>
</html>


