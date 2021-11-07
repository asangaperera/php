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
	
	<!-- Middle Part Start--> 
	<!-- Section Start--> 
	
	<!--Section End-->
	<!--Middle Part End-->

		<!--Random Featured Product Start-->
		<div class="box mb0" id="viewproducts">
		<div class="box-heading-1"><span>VIEW Item ITEMS</span></div>
			<div class="box-content-1">
				<div class="box-product-1" >
					<center>
					<?php
						// Included configuration file in our code.
						include("includes/mysqli_connection.php");

						$id = $_POST['txtid'];
						//echo $id;

						$sql = "SELECT COUNT(*) FROM nautoitem WHERE  id =".$id;
						$query = mysqli_query($db_conx, $sql);
						$row = mysqli_fetch_row($query);
						// Here we have the total row count
						$rows = $row[0];

						$sql = " SELECT * FROM nautoitem WHERE  id =".$id;
						$query = mysqli_query($db_conx, $sql);

						$list = '';
						$src = "admin/image_upload/";

						while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
						{

							$id = $row["id"];
							$prodname = $row["prodname"];
							$image = $row["image"];
							$category = $row["category"];
							$sp_make = $row["sp_make"];
							$price = "Rs. " . $row["price"];
							$desc = $row["descr"];
							$type = $row["type"];
							$quntity = $row["quntity"];
							$mfgdate = $row["mfgdate"];
							$exdate = $row["exdate"];
							$noviews = $row["noviews"];
							$width="250px";
							$height="220px";



							$quntity = $row["quntity"];

							$list .='
								<br />
								<table border="1" bordercolor="#FF0000" cellpadding="15">
									<tr><td><b><h2>Name</h2></b><td><h2>' . $prodname . '</h2></td></tr>
									<tr><td><b><h2>Brand Name</h2></b><td><h2>' . $type . '</h2></td></tr>
									<tr><td><b>Image</b></td><td><img width="' . $width . '" height="' . $height . '" src="' . $src . $image . '" alt = "' . $prodname . '"></td></tr>';
								 $list .='
									<tr><td><b>Category</b></td><td>' . $category . '</<td></tr>
									
											<tr><td><b>Wight</b></td><td>' . $sp_make . 'Kg</<td></tr>
											<tr><td><b>MFG. Date</b></td><td>' . $mfgdate . '</<td></tr>
												<tr><td><b>EXP. Date</b></td><td>' . $exdate . '</<td></tr>
									<tr><td><b>Description</b></td><td>' . $desc . '</<td></tr>
										<tr><td><b>Quantity</b></td><td>' . $quntity . '</<td></tr>
									<tr><td><b><h2>Price</b></td><td><h2>' . $price . '</h2></td></tr>
								  </tr>
								</table>
								<br />'; // end list here
						}

						$noviews += 1;

						$updateview = "UPDATE nautoitem SET noviews = $noviews WHERE id =".$id;
						mysqli_query($db_conx, $updateview);

					//	$uquntity = $quntity-$qty;

						//$updateqty = "UPDATE nautoitem SET quntity = $quntity WHERE id =".$id;
						//mysqli_query($db_conx, $quntity);

						echo "<b>Number of times viewed: </b> <font size='5px'> <font face='monotype corsiva'>" .  $noviews . "</font></font>";


					?>




						<br />
						<script type="text/javascript">
						function checkIt(evt)
						{
						evt = (evt) ? evt : window.event;
						var charCode = (evt.charCode) ? evt.charCode :
						((evt.which) ? evt.which : evt.keyCode);

						if (charCode > 31 && (charCode < 48 || charCode > 57))
						{
						status = "This field accepts numbers only.";
						return false;
						}
						status = "";
						return true;
						}
						</script>

						<script type="text/javascript">
						<!--  Begin
						function submitForms()
						{
						if (isCart())
						if (confirm("\n You are about to add this product to your cart. \n\nPress Ok to submit. Cancel to abort."))
						{
						return true;
						}
						else
						{
						alert("Product not added to cart");
						return false;
						}
						else 
						return false;
						}

						function isCart()
						{
						T = document.forms[0].elements[0].value;
						if(T == "")
						{
						alert("Quantity cannot be blank")
						document.forms[0].elements[0].focus();
						return false;                
						}

						else
						{
						if (T < 1)
						{
						alert("Quantity must not be less than 1")
						document.forms[0].elements[0].focus();
						return false;
						}

						else
						{
						if (T > 100)
						{
						alert("To order more than 100 ITEMS you can get discount plz contact us")
						document.forms[0].elements[0].focus();
						return false;
						}
						return true;
						}
						}
						}

						// End -->
						</script>
						<form action="processcheckout.php" method="post" onSubmit="return submitForms()" "returninPosInteger()">
						<?php echo $list;?>
						Enter Quantity:<input type="text" name="txtQty" size="8" onkeypress="return checkIt(event)"><br><br>
						Select deliver location:<select  name="txtlocation" size="4"><option selected hidden value="">  මාකොළ</option>
<option value="   0   "> මාකොළ /Makola  </option>
<option value="   0 ">     Kirillawala </option>
<option value="   100   "> පවර්හවුස් /Power House   </option>
<option value="  150  "> රාගම/Ragama    </option>
<option value="  125 ">  කැලණිය/Kelaniya    </option>
<option value="  75   ">  ගොනවල/Gonawela     </option>
<option value="  100   ">  කිරිබත්ගොඩ/Kiribathgoda  </option>
<option value="   100   ">   මවරමණ්ඩිය/Mawaramandiya     </option>
<option value="   100   ">  කඩවත/Kadawatha   </option>
<option value="   100   ">  ඉහලබියන්විල/Ihala Biyanvila  </option>
<option value="    100  ">  පට්ටිවිල/Pattivila   </option>
<option value="   100  ">  මාබිම/Mabima  </option>
<option value="   100 ">  සියම්බලපේ/Siyabalape</option>
<option value="    130 ">  දෙල්ගොඩ/Delgoda </option></select>
						<input type="hidden" name="txtuserid" value="<?php echo $userid;?>">
						<input type="hidden" name="id" value="<?php echo $id;?>">
						<input type="submit" value="Add to Cart">
						
						</form>
					</center>
				</div>
			</div>
		</div>
		<!--Random Featured Product End-->

		
		
			
					
		<?php include("footer.php");?>
	<!--Registration Part End-->
</div>
<!-- Main Div Tag End-->

	<!--Flexslider Javascript Part Start-->
		<?php include("flexslider.php");?>
	<!--Flexslider Javascript Part End-->
</body>
</html>