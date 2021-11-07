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
$_SESSION['code'] = rand(); // assign a random value to $_SESSION['code']
$code = $_SESSION['code']; // then assign the value to $code
echo "<br />Code: " . $code; // print the value of $code
?>

<?php
// User is already logged in.
if (isset($_SESSION['username'])) { //check if session username is set
	$User = $_SESSION['username']; // if it is, assign the value to $User
}
else {
	$User = ""; // else $User will be null
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
		<div class="box mb0" id="randomfeatured">
		<div class="box-heading-1"><span>  </span></div>
			<div class="box-content-1">
				<div class="box-product-1" >
					<?php
						// Included configuration file in our code.
						include("randomfeatured.php");
					?>
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