<?php

session_start(); // start a session
if (isset($_SESSION['user_id'])) { // check if session user_id is set
  $userid = $_SESSION['user_id']; //if it is set, assign the value to the variable $userid
}
else { // if it is not set
  $userid = ""; // assign a null value to $userid
}
echo "User ID: " . $userid; //print it on screen.
$today = date("Y-m-d H:i:s");
$amount = $_POST['txtamount'];
$quntity= $_POST['txtqty'];
$prodname = $_POST['txtprodname'];
$id = $_POST['txtid'];




?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Return Page</title>
    <link href="style1.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet">
  </head>
  <body class="loggedin">
    <nav class="navtop">
      <div>
        <h1>AUTOPART</h1>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
        <a href="home_seller.php"><i class="fas fa-user-circle"></i>Home</a>
                
    </nav>
    <div class="content">
      <h2>Return Items Page</h2>
      <p>Fill your Bank details</p>
    </div>
    </nav>
    <div class="content">
      
    
  <div>
<div class="content">
  <form method="POST" action="cofirmreturnpro1.php" onSubmit="return submitForms()" "returninPosInteger()">
            <input type="hidden" name="txtid" value= "<?php echo $id;?>">
            <input type="hidden" name="txtamount" value= "<?php echo $amount;?>">
            <input type="hidden" name="txtprodname" value= "<?php echo $prodname;?>">
            <input type="hidden" name="txtqty" value= "<?php echo $quntity;?>">
      
</div>


<div>
<br>
<tr>
 <td> 
 User  ID : 
</td>
<td> 
<input type="text"  id="userid" name="userid" value="<?php echo $userid;?>"  />
</td>
</tr></div>
<div>
<br>
<tr>
 <td> 
 Product ID : 
</td>
<td> 
<input type="text"  id="prod_id" name="prod_id" value="<?php echo $id;?>" />
</td>
</tr></div>
<div>
<br>
<tr>
 <td> 
 Product Name : 
</td>
<td> 
<input type="text"  id="prodname" name="prodname" value="<?php echo $prodname;?>"  />
</td>
</tr></div>
<br>
<tr><tr>
<td> Return Methord: 
</td>
<td> 
<select name="return_methord" required/>
<option selected hidden value=""> Select Methord to return </option>
<option value="Handover"> Handover </option>
<option value="by deliver ">From deliver </option>
<option value="by sellsman"> From sells man </option>
</select>
</td>
</tr>
<div>

<br>

<tr>
<td> Return Reson :
</td>
<td>
<select name="return_reson"  required/>
<option selected hidden value=""> Select Reson why return </option>
<option value="   Damage  "> Damage   </option>
<option value="   Wrong item  "> wrong item     </option>
<option value="   Not working   ">  Not working    </option>
<option value="  Too Old   "> too old   </option>
</select>
</td>
</tr>
<div>
<br>
<tr>
 <td> 
 Amount : 
</td>
<td> 
<input type="text"  id="amount" name="amount" value="<?php echo $amount;?>" />
</td>
</tr></div>
<div>
<div>
 <td> 
  <br>
<tr><tr>
<td>Bank Name: 
</td>
<td> 
<input type="text"pLaceholder="Bank Name" class="from-control" id="bank" name="bank"  required/>
</td>
</tr></div>
<br>
<tr><tr>
<td> Your Bank Account Number : 
</td>
<td> 
<input type="text"pLaceholder=" Bank Account Number" class="from-control" id="accountno" name="accountno"  required/>
</td>
</tr>
<div>
 <td> 
  <br>
<tr><tr>
<td>Date: 
</td>
<td> 
<input type="text"  id="r_date" name="r_date" value="<?php echo $today;?>" />
</td>
</tr></div>
<div>
 <td> 
  <br>
<tr><tr>
<td>User Name: 
</td>
<td> 
<input type="text"pLaceholder="Usar Name" class="from-control" id="username" name="username"  required/>
</td>
</tr></div>
<div>
 <td> 
  <br>
<tr><tr>
<td> Quntity : 
</td>
<td> 
<input type="text"  id="qty" name="qty" value="<?php echo $quntity;?>"  />
</td>
</tr>
 <td> 
</tr></div>
<div><br>
<tr>
 <td> 
Status : 
</td>
<td> 
<input type="text"pLaceholder="status" class="from-control" id="status" name="status"  required/>
</td>
</tr></div>
<div>
  <tr>
    <div>
      <br>
      <button type="submit" name="upload">RETRUN ITEMS</button>
    </div>
</tr>
  </form>
</div>
</body>
</html>
   

