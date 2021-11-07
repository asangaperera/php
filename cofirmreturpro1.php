

<?php

session_start(); // start a session
if (isset($_SESSION['user_id'])) { // check if session user_id is set
  $userid = $_SESSION['user_id']; //if it is set, assign the value to the variable $userid
}
else { // if it is not set
  $userid = ""; // assign a null value to $userid
}
echo "User ID: " . $userid; //print it on screen.
$amount = $_POST['txtamount'];
$qty= $_POST['txtqty'];
$prodname = $_POST['txtprodname'];
$prod_id = $_POST['txtid'];





?>
<?php  

  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "super");

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

    // Get text
    
   //$prod_id = mysqli_real_escape_string($db, $_POST['prod_id']);
  // $r_date = mysqli_real_escape_string($db, $_POST['r_date']);
   $amount = mysqli_real_escape_string($db, $_POST['amount']);
   // $accountno = mysqli_real_escape_string($db, $_POST['accountno']);
   $bank = mysqli_real_escape_string($db, $_POST['bank']);
  //  $username = mysqli_real_escape_string($db, $_POST['username']);
  //  $return_methord= mysqli_real_escape_string($db, $_POST['return_methord']);
   // $return_reson = mysqli_real_escape_string($db, $_POST['return_reson']);
   // $qty = mysqli_real_escape_string($db, $_POST['qty']);// image file directory
   // $status= mysqli_real_escape_string($db, $_POST['status']);

    $sql = "INSERT INTO return (user_id, prod_id,r_amount,bank) VALUES ('$userid','$prod_id','$amount','$bank')";
    // execute query
    mysqli_query($db, $sql);

   mysqli_close($db_conx);
     // $msg = "Failed to upload your Ad;-";
    }