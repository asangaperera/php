
<?php
session_start();
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
	<?php include("section.html"); ?>
	<!--Section End-->
	<!--Middle Part End-->
	
		<!--About Start-->
		<div class="box mb0" id="about_us" >
			<div class="box-heading-1"><span>Address</span></div>
			<div class="box-content-1">
				<div class="box-product-1">
						<?php
							include("includes/mysqli_connection.php");
							
							$sql = " SELECT * FROM webcontent WHERE webpage LIKE 'address'";

							$query = mysqli_query($db_conx, $sql);
							
							$list = '';

							while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
							{
								$contentid = $row["content_id"];
								$content = $row["content"];
								$webpage = $row["webpage"];

								$list .= $content; // end list here
							}
							// Close your database connection
							mysqli_close($db_conx);

							if($row = "")
							{
								echo "<h2>Nothing to display</h2>";
							}
							
							else
							{
								echo $list;
							}
						?>
				</div>
			</div>
		</div>
		<!--About End-->
		
		<!--Special Promo Banner Start-->
		<div class="box-promo" id="box-promo">
			<div class="box-heading-1"><span>PROMO ON FEATURED ITEMS</span></div>
			<div id="banner0" class="banner">
				<div style="display:block;"><img src="image/addBanner-940x145.jpg" alt="Special Offers" title="Special Offers" /></div>
			</div>
		</div>
		<!--Special Promo Banner End--> 

	<!--Registration Part Start-->
		<?php include("Registration.php");?>
	<!--Registration Part End-->
</div>
<!-- Main Div Tag End-->

	<!--Flexslider Javascript Part Start-->
		<?//php include("flexslider.php");?>
	<!--Flexslider Javascript Part End-->

</body>
</html>