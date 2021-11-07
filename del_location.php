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
include("includes/mysqli_connection.php");
$location= $_POST['txtlocation'];
    $id=$_POST['txtid'];
	
	$sql = "UPDATE cart SET location = '$location' WHERE id = '$id'";
	                mysqli_query($db_conx, $sql);
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
		<div class="box mb0" id="cart">
		<div class="box-heading-1"><span>CUSTOMER CART</span></div>
			<div class="box-content-1">
				<div class="box-product-1" >
					<?php
						
						include("includes/mysqli_connection.php");
						
						$sql = "SELECT COUNT(*) FROM cart WHERE cust_id = $userid AND checkout = 'n'";
					

					

						$query = (mysqli_query($db_conx,$sql));
						
						$row = mysqli_fetch_row($query);
						
						// Here we have the total row count
						$rows = $row[0];
						
						$totalquantity = 0;
						
						$subtotal = 0;
						
						$totalamount = 0;
						
						$totalwight= 0;
						
						$vat1 = 0;
						
						$selectproducts = "SELECT * FROM cart , nautoitem WHERE cart.cust_id = $userid  AND cart.checkout = 'n' AND nautoitem.id = cart.nauto_id";
						
						$query = mysqli_query($db_conx, $selectproducts);
						
						$list = "";
						$src = "Photos/";

						if($rows == 0)
						{
							echo "<script>alert('No Items In Cart')</script>";
							echo "<script>window.location.href='index.php';</script>";
						}
						
						else
						{
							$delivery = 50;
							$vat = 0.1;
							
							
									
									
							for($loop = 0; $loop < $rows; $loop++)
							{
								
								while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
								{
									$prodid = $row["nauto_id"];
									$qty = $row["qty"];
									$userid = $row["cust_id"];
									$checkout = $row['checkout'];
									$dateadd = $row['added'];
									$datechecked = $row['checkedon'];
									

									$dateadd = date($dateadd);

									$name = $row["prodname"];
									$path = $row["image"];
									$category = $row["category"];
									$price = $row["price"];
									$desc = $row["descr"];
									$sp_make=$row["sp_make"];
									$quntity=$row["quntity"];
									$width="150px";
									$height="150px";
									
									$amount = ($qty * $price);
									$wight = ($qty * $sp_make);


									$amount = round($amount);
									if (round($amount*10) == $amount*10 && round($amount)!=$amount) $amount = "$amount"."0"; //to avoid prices like 17.5 - write 17.50 instead
									{
										if (round($amount) == $amount) //add .00
										{
											$amount  = "$amount".".00";
										}
									}
									
									$totalquantity = $totalquantity + $qty;
									$subtotal = $subtotal + $amount;
									$totalwight = $totalwight + $wight;
									
									if($subtotal == 0)
									{
										$vat = 0;
									}
									
									else
									{
										$vat1 = round($vat * $subtotal);
										
										if($vat1 > 0)
										{
											$vat1 = $vat1;
										}
										
										else
										{
											$vat1 =0;
										}
									}
									
									$totalamount = ($subtotal + $vat1 + $delivery);
									
									
							

									echo $list;	
								}
							}
							echo "</table></center><br />";	
						}
					?>

					<table border="1" align="center" width="300px">
						<tr align="center">
							<td width="150px"><font face="monotype corsiva"><b>Total Quantity</b></font></td><td width="150px"><?php echo $totalquantity;?></td>
						</tr>
						<tr align="center">
							<td width="150px"><b>Total Items</b></td><td width="150px"><?php echo $rows;?></td>
						</tr>
						<tr align="center">
							<td width="150px"><b>Total Wight</b></td><td width="150px"><?php echo $totalwight;?></td>
						</tr>
						<tr align="center">
							<td><b>Sub Total</b></td><td><?php echo $subtotal;?></td>
						</tr>
						<tr align="center">
							<td><b>VAT (15%)</b></td><td><?php echo $vat1;?></td>
						</tr>
						<tr align="center">
							<td><b>Select Delivery Location </b></td> 
<td>
<select name="del_location"  required/>
<option selected hidden value=""> Select Delivery location </option>
<option value="   0   "> මාකොළ   </option>
<option value="   0 ">      </option>
<option value="   100   "> පවර්හවුස්    </option>
<option value="  150  "> රාගම    </option>
<option value="  125 ">  කැලණිය    </option>
<option value="  75   ">  ගොනවල       </option>
<option value="  100   ">  කිරිබත්ගොඩ  </option>
<option value="   100   ">   මවරමණ්ඩිය     </option>
<option value="   100   ">  කඩවත   </option>
<option value="   100   ">  ඉහලබියන්විල  </option>
<option value="    100  ">  පට්ටිවිල    </option>
<option value="   100  ">  මාබිම  </option>
<option value="     100 ">  සියම්බලපේ  </option>
<option value="     130 ">  දෙල්ගොඩ </option>
</select>
</td>





						</tr>
						<tr align="center">
							<td><b>Total Amount</b></td><td><?php echo $totalamount;?></td>
						</tr>
					</table>

					<p align="center"><b>NOTE:- All figures rounded</b></p>

					<?php
					 if(!$rows == 0)
					 {
					?>
					<p align="center"><input type="button" value="Checkout" onClick="javascript:location.href='checkout.php';"></p>
					<?php
					 }
					?>
				</div>
			</div>
		</div>
		<!--Random Featured Product End-->  	

		
	<!--Registration Part Start-->
		<?php include("footer.php");?>
	<!--Registration Part End-->
</div>
<!-- Main Div Tag End-->

	<!--Flexslider Javascript Part Start-->
		<?php include("flexslider.php");?>
	<!--Flexslider Javascript Part End-->
</body>
</html>