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
						$src = "image_upload/";

						while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
						{

							$id = $row["id"];
							
						}

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
    $image = $_FILES['image']['name'];
    // Get text
    $discription = mysqli_real_escape_string($db, $_POST['discription']);
    $sp_make= mysqli_real_escape_string($db, $_POST['sp_make']);
    $type = mysqli_real_escape_string($db, $_POST['type']);
    $sp_name = mysqli_real_escape_string($db, $_POST['sp_name']);
    $sp_price = mysqli_real_escape_string($db, $_POST['sp_price']);
    $sp_category= mysqli_real_escape_string($db, $_POST['sp_category']);
 

    // image file directory
    $target = "image_upload/".basename($image);
    $sql = "INSERT INTO nautoitem (image, descr,sp_make,prodname,price,category,topsell,seller_id,noviews,type,suggst_id) VALUES ('$image','$discription','$sp_make','$sp_name','$sp_price','$sp_category',1,'$userid',0,'$type','$id')";
    // execute query
    mysqli_query($db, $sql);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      $msg = "your Ad uploaded successfully";
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
 
  <form method="POST" action="view1.php" enctype="multipart/form-data" style="width: 200px; ">
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
        placeholder="Model/Condition/Discription"></textarea>
    </div>
    <div>
    	<input type="hidden" name="id" value="<?php echo $id;?>">
      <div>
<br>
<tr><tr>
<td> Category : 
</td>
<td> 
<select name="sp_category" required/>
<option selected hidden value=""> Select Category </option>
<option value="Any Part of Accessory">Any Part of Accessory </option>
<option value="Air Conditioning & Heating">Air Conditioning & Heating</option>
<option value="Air Intake & Fuel Delivery">Air Intake & Fuel Delivery</option>
<option value="Axles & Axle Parts">Axles & Axle Parts</option>
<option value="Battery"> Battery</option>
<option value="Brakes"> Brakes </option>
<option value="Car Audio Systems">Car Audio Systems </option>
<option value="Car DVR">Car DVR</option>
<option value="Car Tuning & Styling">Car Tuning & Styling</option>
<option value="Carburetor">Carburetor</option>
<option value="Chassis">Chassis </option>
<option value="Electrical Components">Electrical Components </option>
<option value="Emission Systems">Emission Systems </option>
<option value="Engine Cooling">Engine Cooling </option>
<option value="Engines & Engine Parts"> Engines & Engine Parts</option>
<option value="Exhausts & EXhaust Parts"> Exhausts & EXhaust Parts</option>
<option value="External & Body Prts">External & Body Prts </option>
<option value=" External Lights & Indicators     ">External Lights & Indicators </option>
<option value=" Footrests, Pedals & Pegs   ">Footrests, Pedals & Pegs  </option>
<option value=" Freezer ">Freezer </option>
<option value="Gauges.Dials & Instruments  ">Gauges.Dials & Instruments </option>
<option value="Generator   ">Generator </option>
<option value="  GPS & In-Car Technology  ">GPS & In-Car Technology </option>
<option value=" Handlebars, Grips & Levers  "> Handlebars, Grips & Levers</option>
<option value=" Helmets, Clothing & Protection   ">Helmets, Clothing & Protection </option>
<option value=" Interior Parts & Furnishings    ">Interior Parts & Furnishings </option>
<option value="Lighting & Indicators  "> Lighting & Indicators</option>
<option value="  Mirrors  "> Mirrors   </option>
<option value="  Oils,Lubricants & Fluids  ">Oils,Lubricants & Fluids </option>
<option value=" Other   "> Other  </option>
<option value=" Reverse Camera   "> Reverse Camera  </option>
<option value=" Seating  ">Seating  </option>
<option value=" Service Kits"> Service Kits   </option>
<option value=" Silencer   ">Silencer  </option>
<option value=" Stater Motors   ">Stater Motors </option>
<option value=" Stickers  ">  Stickers </option>
<option value=" Suspension,Steering & Handling  ">Suspension,Steering & Handling </option>
<option value=" Transmission & Drivetrain   ">Transmission & Drivetrain </option>
<option value=" Turbos & Superchargers   ">Turbos & Superchargers   </option>
<option value=" Wheels, Tyres & Rims  ">Wheels, Tyres & Rims  </option>
<option value="  Windscreen Wipers & Washers "> Windscreen Wipers & Washers </option>
</select>
</td>
</tr>
<br> 
<br>

<tr>
<td>  Make :
</td>
<td>
<select name="sp_make"  required/>
<option selected hidden value=""> Select Make </option>
<option value="Acura">Acura</option>
<option value="Alfa-Remeo">Alfa-Remeo</option>
<option value="Aprilla">Aprilla</option>
<option value="Ashok Leyland">Ashok Leyland</option>
<option value="Aston">Aston</option>
<option value="Atco">Atco</option>
<option value="Audi">Audi</option>
<option value="Austin">Austin</option>
<option value="Bajaj">Bajaj</option>
<option value="Bentley">Bentley</option>
<option value="BMW">BMW</option>
<option value="Cadillac">Cadillac</option>
<option value="Cal">Cal</option>
<option value="Changan">Changan</option>
<option value="Chey">Chey</option>
<option value="Chevrolet">Chevrolet</option>
<option value="Chrysler">Chrysler</option>
<option value="Citroen">Citroen</option>
<option value="Corvette"> Corvette </option>
<option value= "Daewoo"> Daewoo </option>
<option value="Daido"> Daido </option>
<option value="Daihatsu"> Daihatsu </option>
<option value="Datsun"> Datsun </option>
<option value="Demark">Demark</option>
<option value="Dfac">Dfac</option>
<option value="DFSK">DFSK</option>
<option value="Ducati">Ducati</option>
<option value="Eicher">Eicher</option>
<option value="FAW">FAW</option>
<option value="Ferrari">Ferrari</option>
<option value="Flat">Flat</option>
<option value="Force">Force</option>
<option value="Ford">Ford</option>
<option value="Foton">Foton</option>
<option value="Geely">Geely</option>
<option value="Hero">Hero</option>
<option value="Hero-Honda">Hero-Honda</option>
<option value="Higer">Higer</option>
<option value="Hillman">Hillman</option>
<option value="Honda">Honda</option>
<option value="Hammer">Hamme</option>
<option value="Hyundai">Hyundai</option>
<option value="Isuzu">Isuzu</option>
<option value="Iveco">Iveco</option>
<option value=" JAC "> JAC </option>
<option value=" Jaguar ">Jaguar </option>
<option value=" Jeep ">Jeep</option>
<option value="JCB  ">JCB </option>
<option value="JMC ">JMC</option>
<option value=" JiaLing ">JiaLing</option>
<option value="Jone-Deere  ">Jone-Deere </option>
<option value="KAPALA  ">KAPALA </option>
<option value=" Kawasaki ">Kawasaki</option>
<option value=" Kia "> Kia </option>
<option value="Kinetic  ">Kinetic</option>
<option value="KMC  ">KMC </option>
<option value=" Komatsu ">Komatsu</option>
<option value=" KTM ">KTM </option>
<option value=" Kubota ">Kubota</option>
<option value="Lambogrghini  ">Lambogrghini</option>
<option value=" Land-Rover ">Land-Rover </option>
<option value=" Lexus ">Lexus</option>
<option value="Loncin  ">Loncin </option>
<option value=" Lti ">Lti</option>
<option value=" Mahindra ">Mahindra</option>
<option value=" Maserati "> Maserati </option>
<option value="Massey-Ferguson  ">Massey-Ferguson</option>
<option value="Mazda  ">Mazda</option>
<option value=" Mercedes-Benz ">Mercedes-Benz</option>
<option value=" Metrocab ">Metrocab </option>
<option value=" Mg-Rover ">Mg-Rover</option>
<option value=" Micro ">Micro </option>
<option value="Mini  ">Mini  </option>
<option value=" Minnelli ">Minnelli </option>
<option value=" Mitsubishi ">Mitsubishi </option>
<option value=" Morgan ">Morgan</option>
<option value=" Morris ">Morris</option>
<option value="Nissan  ">Nissan</option>
<option value=" Opel ">Opel </option>
<option value=" Other ">Other </option>
<option value=" Peugeot ">Peugeot</option>
<option value=" Piaggio ">Piaggio</option>
<option value=" Porsche "> Porsche</option>
<option value=" Proton "> Proton</option>
<option value=" Range-Rover ">Range-Rover</option>
<option value=" Ranomoto ">Ranomoto</option>
<option value=" Ranault ">Ranault</option>
<option value=" Reva ">Reva</option>
<option value="Rolls-Royce  ">Rolls-Royce </option>
<option value=" Saab ">Saab</option>
<option value=" Sakai ">Sakai</option>
<option value="Singer  ">Singer </option>
<option value="Skoda  ">Skoda</option>
<option value=" Smart ">Smart </option>
<option value="Ssangyong  ">Ssangyong</option>
<option value=" Subaru ">Subaru </option>
<option value="Suzuki  ">Suzuki </option>
<option value="Syuk ">Syuk </option>
<option value="TAFE  ">TAFE </option>
<option value="Tata">Tata"</option>
<option value=" Tesla ">Tesla</option>
<option value="Toyota  ">Toyota </option>
<option value=" Triumph ">Triumph </option>
<option value=" TVS "> TVS</option>
<option value=" Vauxhall ">Vauxhall </option>
<option value=" Vespa ">Vespa</option>
<option value=" Volkswagen ">Volkswagen </option>
<option value=" Volvo "> Volvo</option>
<option value=" Wave ">Wave </option>
<option value=" Willys ">Willys</option>
<option value=" Yamaha ">Yamaha</option>
<option value=" Yuejin "> Yuejin</option>
<option value=" Zongshen ">Zongshen</option>
<option value=" Zotye ">Zotye </option>
</select>
</td>
</tr>
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
Price : 
</td>
<td> 
<input type="text"pLaceholder="Price" class="from-control" id="sp_price" name="sp_price"  required/>
</td>
</tr></div>
<div>
<br>
<tr><tr>
<td> Vehicle Type : 
</td>
<td> 
<select name="type" required/>
<option selected hidden value=""> Select VehicleType </option>
<option value="Any">Any </option>
<option value="Car">Car</option>
<option value="Van">Van</option>
<option value="Jeep">Jeep"</option>
<option value="Motorcycle"> Motorcycle</option>
<option value="Crew Cab"> Crew Cab </option>
<option value="Sport"> Sport </option>
<option value="Wagon">Wagon </option>
<option value="Pickup">Pickup </option>
<option value="Bus">Bus </option>
<option value="Lorry">Lorry </option>
<option value="Truck">Truck </option>
<option value="Three Wheel"> Three Wheel </option>
<option value="Other">Other </option>
<option value="Bicycle"> Bicycle </option>
<option value="Tractor"> Tractor </option>
<option value="Heavy-Duty"> Heavy-Duty </option>
</select>
</td>
</tr>
 <td> 
</tr></div>
<div>
  <tr>
    <div>
      <br>
      <button type="submit" name="upload">POST</button>
    </div>
</tr>
  </form>
</div>
</body>
</html>
   




				
						
					
		<?php include("footer.php");?>
	<!--Registration Part End-->
</div>
<!-- Main Div Tag End-->

	<!--Flexslider Javascript Part Start-->
		<?php include("flexslider.php");?>
	<!--Flexslider Javascript Part End-->
</body>
</html>