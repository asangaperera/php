
<?php
session_start();

if (isset($_SESSION['user_id']))
{
	$userid = $_SESSION['user_id'];
	echo "userid: " . $userid;
}

else
{
	$userid = "";
}
?>

<?php
$_SESSION['code'] = rand();
$code = $_SESSION['code'];
echo "<br />Code: " . $code;
?>


<?php
// User is already logged in. Redirect them somewhere useful.
if (isset($_SESSION['username']))
{
	$User = $_SESSION['username'];
}

else
{
	$User = "";
}
?>

<!-- Head1 Part Start-->
<?php include("1head.html");?>
<!-- Head1 Part End-->

<!-- Top Part Start-->
<?php 
if($User != "")
{
	include("2top.php");
}
else
{
	include("1top.php");
}
?>
<!-- Top Part End-->


<!-- Main Div Tag Start-->
<div id="wrapper">


	<!-- Header Part Start-->
	<?php 
	if($User != "")
	{
		include("2header.php");
	}
	else
	{
		include("header.php");
	}
	?>
	<!-- Header Part Start-->
	
		<!--Random Featured Product Start-->
		<div class="box mb0" id="checkout">
		<div class="box-heading-1"><span>CHECKOUT</span></div>
			<div class="box-content-1">
				<div class="box-product-1" >
					<?php

						include("includes/mysqli_connection.php");
						
						$sql = "SELECT COUNT(*) FROM cart WHERE cust_id = $userid AND checkout = 'n'";
						
						$query = (mysqli_query($db_conx,$sql));
						
						$row = mysqli_fetch_row($query);
						
						// Here we have the total row count
						$rows = $row[0];
						
						$countrows = $rows;
						
						$totalquantity = 0;
						
						$subtotal = 0;
						
						$totalamount = 0;

						$totalwight= 0;
						
						$vat1 = 0;
						
						$delivery = 0;
						
						$selectproducts = "SELECT * FROM cart , nautoitem, users WHERE cart.cust_id = $userid AND users.user_id = $userid AND cart.checkout = 'n' AND nautoitem.id = cart.nauto_id";
						
						$query = mysqli_query($db_conx, $selectproducts);
						
						$list = "";
						$src = "image_upload/";
						
						if($rows == 0)
						{
							echo "<script>alert('Buy an Item First!')</script>";
							echo "<script>window.location.href='index.php';</script>";
						}
						
						else
						{
							echo "<center><b><u>ITEMS IN YOUR CART</u></b></center><br />";
							echo "<table align='center' border='1' cellspacing='1' cellpadding='0' width='50%'>
									<th align='center' bgcolor='e6e6e6'>Item ID</th><th align='center' bgcolor='e6e6e6''>PRODUCT</th>
									<th align='center' bgcolor='e6e6e6''>QUANTITY</th><th align='center' bgcolor='e6e6e6''>WIGHT</th><th align='center' bgcolor='e6e6e6''>PRICE</th>
									<th align='center' bgcolor='e6e6e6''>AMOUNT</th>";
							
							for($loop = 0; $loop < $countrows; $loop++)
							{
								
								while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
								{
									$id = $row['nauto_id'];
									$qty = $row['qty'];
									$userid = $row['cust_id'];
									$checkout = $row['checkout'];
									$added = $row['added'];
									$checked = $row['checkedon'];
									$delivery=$row['location'];

									//$row['trans'] = $code;
									$trans = $row['trans'];
									
									$prodname = $row['prodname'];
									$image = $row['image'];
									$category = $row['category'];
									$price = $row['price'];
									$desc = $row['descr'];
									$sp_make = $row['sp_make'];
									$width="150px";
									$height="150px";
									
									$userid = $row['user_id'];
									$name = $row['name'];
									$surname = $row['surname'];
									$uname = $row['username'];
									$pass = $row['password'];
									$email = $row['email'];
									$address = $row['address'];
									$tel = $row['tel'];
									$type = $row['ac_type'];
									$status = $row['user_status'];
									
									
									$amount = ($qty * $price);
									
									$totalquantity = $totalquantity + $qty;
									$subtotal = $subtotal + $amount;
									$vat1 = round(0.0 * $subtotal);

									$wight = ($qty * $sp_make);
							        $totalwight =  $totalwight+ $wight;

									$totalamount = ($subtotal + $vat1 + $delivery);
									
									$amount = round($amount);
									if (round($amount*10) == $amount*10 && round($amount)!=$amount) $amount = "$amount"."0"; //to avoid prices like 17.5 - write 17.50 instead
									{
										if (round($amount) == $amount) //add .00
										{
											$amount  = "$amount".".00";
										}
									}
									
									$list ="<tr align='center'><td>" . $id . "</td><td>" . $prodname . "</td><td>" . $qty . "</td><td>" . $sp_make . "Kg</td>";
									
									$list .= "<td>Rs." . $price . "</td><td>Rs." . $amount . "</tr>";

									echo $list;	
								}
							}
							echo "</table></center><br />";
						}
						$totalamount = ($subtotal + $vat1 + $delivery);
							
						$list .='<td><form method="post" action="payment.php"><input type="hidden" size="4" name="txtamount" value="' . $totalamount .'" /><input type="submit" value="+1" /></form></td>';
									$list .='<td><form method="post" action="updateqty.php"><input type="hidden" size="4" name="txtfoodid" value="' . $id .'" /><input type="submit" value="-1" name="submit" /></form></td>';
									$list .='<td><form method="post" action="removeqty.php"><input type="hidden" size="4" name="txtfoodid" value="' . $id .'" /><input type="submit" value="X" name="submit" /></form></td></tr>';
					?>
					<script type="text/javascript">
					<!--  Begin

					function resetform()
					{
					document.forms[0].elements[6]=="";
					}

					function submitForms()
					{
					if (isCard())
					if (confirm("\n You are about to submit this form. \n\nPress Ok to submit. Cancel to abort."))
					{
					alert(document.forms[0].elements[2].value + " " + document.forms[0].elements[1].value +"\n\n\nYour Checkout form has been sent successfully. \n\n\nThank you!");
					return true;
					}
					else
					{
					alert("You have chosen to abort the checkout.");
					return false;
					}
					else 
					return false;
					}

/*
					function isCard()
					{
					T = document.forms[0].elements[6].value;
					if(T == "")
					{
					alert("Credit Card cannot be blank")
					document.forms[0].elements[6].focus();
					return false;                
					}

					else
					{
					if(T == 0)
					{
					alert("Credit Card cannot be less or equal to zero");
					document.forms[0].elements[6].focus();
					return false;  
					}

					else
					{
					if(T.length<14)
					{
					alert("Credit Card Number must be 14 digits");
					document.forms[0].elements[6].focus();
					return false;  
					}

					else
					{
					if(T.indexOf(".")==1)
					{
					alert("Credit Card cannot contain dot sign");
					document.forms[0].elements[6].focus();
					return false;  
					}
*/
					return true;
					}
					}
					}
					}
					// End -->
					</script>

						<table border="1" align="center" width="300px">
							<tr align="center">
								<td width="150px"><b>Total Quantity</b></td><td width="150px"><?php echo $totalquantity;?></td>
							</tr>
							<tr align="center">
								<td width="150px"><b>Total Items</b></td><td width="150px"><?php echo $rows;?></td>
							</tr>
							<tr align="center">
								<td><b>Sub Total</b></td><td>Rs.<?php echo $subtotal;?></td>
							</tr>
							<tr align="center">
								<td><b>VAT (15%)</b></td><td><?php echo $vat1;?></td>
							</tr>
							<tr align="center">
								<td><b>Total Wight</b></td><td><?php echo $totalwight;?>Kg</td>
							</tr>
							<tr align="center">
								<td><b>Delivery Cost</b></td><td>Rs.<?php echo $delivery;?></td>
							</tr>
							<tr align="center">
								<td><b>Total Amount</b></td><td>Rs.<?php echo $totalamount;?></td>
							</tr>
						</table>
						
						<br />

					<p align="center"><b>CHECKOUT FORM</b></p>

					<table border="0" cellpadding="1" cellspacing="0" width="80%" align="center">
					  <tr>
						<td colspan="5" height="96"><td>
							<form name="formCheckout" method="post" action="payment.php?" onSubmit="return submitForms()">
							<table width="400" align="center" border="0">
							<tr>
								<td bgColor="c6d3ce">
								  <table width="400" border="0">
								  <tr bgColor="dee7e7">
									 <td width="165"><strong>ID</strong></td>
									 <td><input type="text" name="Userid" size="8" value="<?php echo $userid;?>" disabled="TRUE" /></td>
								  </tr>
									<tr bgColor="dee7e7">
									  <td width="165"><strong>Name</strong></td>
									  <td><b><input type="text" size="25" name="Name" value="<?php echo strtoupper($name); ?>" disabled="TRUE" /></b></td>
									</tr>
									<tr bgColor="e7efef">
									  <td><strong>Surname</strong></td>
									  <td><b><input type="text" size="25" name="Surname" value="<?php echo strtoupper($surname); ?>" disabled="TRUE" /></b></td>
									</tr>
									
									<tr bgColor="e7efef">
									  <td><strong>Email</strong></td>
									  <td><b><input type="text" size="30" name="Email" value="<?php echo $email; ?>" disabled="TRUE" /></b></td>
									</tr>
									<tr bgColor="dee7e7">
									  <td><strong>Billing Address</strong></td>
									  <td><b><input type="text"  size="50" name="Address" value="<?php echo $address; ?>" /></b></td>
									</tr>
									<tr bgColor="e7efef">
									  <td><strong>Telephone</strong></td>
									  <td><b><input type="text" size="10" maxlength="10" name="Tel" value="<?php echo $tel; ?>" /></b></td>
									</tr>				
									<!--<tr bgColor="e7efef">
									  <td><strong>Credit Card</strong></td>
									  <td><b><input type="text" size="15" maxlength="14" name="Card" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"></b></td>
									</tr>-->
									</table>
								</td>
							</tr>
							</table>
							<br>
							<table width="400" align="center" border="0">
							  <tr>
								<td align="center" width="200"><input name="submit" type="submit" value="Payments"></td>
								<td align="center" width="200"><input type="reset" name="reset" value="Reset Form" onClick="return confirm('Are you sure you want to reset the current information?');"></td>
							  </tr>
							</table>
						  </form>
						</td>
					  </tr>
					</table>
				</div>
			</div>
		</div>
		<!--Random Featured Product End-->

		<?php include("footer.php");?>

</div>
<!-- Main Div Tag End-->

	<!--Flexslider Javascript Part Start-->
		<?php include("flexslider.php");?>
	<!--Flexslider Javascript Part End-->
</body>
</html>


