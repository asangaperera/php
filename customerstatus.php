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

	
	<?php require_once ("db/config.php");
			
	
	?>
	




 
 </head> 
 <body> 
 	<div class="container"> 
		<!-- <div class="panel panel-de"> -->
<div class="row">
			<div class="panel-body">
				<h1 align="center" class="page-header">Delivery</h1>
			    <form action="" Method="POST">  					
							  
	<table align="center" border="1" cellspacing="1" cellpadding="0" width="75%">
		<th align="center" bgcolor="silver">CUSTOMER NAME</th>
		<th align="center" bgcolor="silver">Item NAME</th>
		<th align="center" bgcolor="silver">QUANTITY</th>
		<th align="center" bgcolor="silver">ADDED ON</th>
		<th align="center" bgcolor="silver">TRANS</th> 
		<th align="center" bgcolor="silver">STATUS</th>
		
	
		
		
					  
		
				  	<?php 
						$sql = "SELECT * FROM cart , nautoitem, users WHERE cart.cust_id = $userid AND users.user_id = $userid AND cart.checkout = 'n' AND nautoitem.id = cart.nauto_id";
									  		 
						 $cur = mysql_query($sql) or die(mysql_error());

						while ($result = mysql_fetch_array($cur)) {
 
 
 
						 	# code...
						echo'<center>';
						echo '<tr>'; 

				  		echo '<td> '.$result['name'].'</td>'; 
				  	 	echo '<td> '.$result['prodname'].'</td>';
				  		echo '<td> '. $result['qty'].'</td>'; 

				  		echo '<td>'. $result['added'].'</td>'; 

				  		
				  		echo '<td>'. $result['trans'].'</td>'; 
						echo '<td>'. $result['status'].'</td>'; //to be changed
				  	
				  		?>
				  		
	

				  		<?php
				  		echo  '</td>';
				  		echo  '</tr>';
						 } 
				  	?>
				  </tbody>
				
				</table>
				
				
			    
             
               
          
		 
				</form>
	  		</div><!--End of Panel Body-->
	  	<!-- </div> -->
	  	<!--End of Main Panel-->

</div>
</div>
<?php  //start button hide/unhide

		$sql5 = "SELECT * FROM cart , nautoitem, users WHERE cart.cust_id=$userid AND users.user_id=$userid AND cart.checkout = 'n' AND cart.status='Ready' AND nautoitem.id = cart.nauto_id";
			
		//$sql = "SELECT * FROM cart , nautoitem, users WHERE cart.cust_id = $userid AND users.user_id = $userid AND cart.status='Confirm' AND nautoitem.id = cart.nauto_id";

			
	$curr = mysqli_query($db_conx, $sql5);

	$rowa = mysqli_fetch_row($curr);
	
	
	
		if($rowa>0){
		//unset($_SESSION['from']);
		//unset($_SESSION['to']);
		//unset($_SESSION['PACKAGEID']);
		
		// $_SESSION['msg'] = '<span style="background-color:skyblue;"><h3>Your are now successfully booked!</h3></span>';
    ?>
	 <div class="col-xs-12 col-sm-12" align="right">
<form method="post" action="">
	  <input type="submit" id="Button" align="right" name="sub" class="btn btn-primary btn-xs"  value= " GET RECEIPT ">
  </form>
 </div>
	  
      <script type="text/javascript">
	   
	document.get.ElementById("Button").disabled="false"; 
	  //alert("Your are now successfully booked!");
     // window.location = "index.php?";
      </script>
	  <?php 
		}else{
	  ?>
	  
	  
	  
	  <script type="text/javascript">
	  
	document.get.ElementById("Button").disabled="true"; 
	  //alert("Your are now successfully booked!");
     // window.location = "index.php?";
      </script>
	  
	  <?php 
		} //end button hide/unhide
	  ?>
	  
	 <?php 
	  if(isset($_POST['sub'])){
		  
		  		  
			$sql10 = "INSERT INTO `other`(`comment`) VALUES('complete')";
			$res10 = mysql_query($sql10) or die(mysql_error());
			if($res10>0){
		  
		  
	  ?> 
	  
 

	   <script type="text/javascript">
	 
	  alert("Your are now successfully ordered!");
     window.location = "confirmcheckout.php";
      </script>
    <?php
  }else{
    $loginmsg = "Error to save! " ;
    die(mysql_error());
	  }
	  } 

		 ?>
		
<!-- <div class="container"> 
		<!-- <div class="panel panel-de"> -->

</div>



<?php include("footer.php");?>
</div>

 </body>
</html>


<?php 

	// Close your database connection
	mysqli_close($db_conx);
	
	//echo "<script>alert('Thank You for Your Purchase!')</script>";
	//echo "<script>window.location.href='receipt.php'</script>";
?>	
	

