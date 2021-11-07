<!-- <?php session_start(); ?> -->
<?php require_once ("../db/config.php"); ?>

<?php if(!isset($_SESSION['user_id'])){ ?>
  <script>
       // window.location ='login.php';
    </script>
<?php   } ?>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Vegi.top-seller page</title>
<meta name="description" content="">
<meta name="author" content="">

<!-- Favicons
    ================================================== -->
<link href="adminhome/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
<link href="adminhome/css/freelancer.css" rel="stylesheet">
<link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
<!-- <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css"> -->

<!-- Slider
    ================================================== -->

<!-- Stylesheet
    ================================================== -->
<link rel="stylesheet" type="text/css"  href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/responsive.css">
<link rel="stylesheet" type="text/css" href="css/prettyPhoto.css"> 
<link href='fonts/font-awesome/css/font-awesome.min.css' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/modernizr.custom.js"></script>
<!-- Navigation
    ==========================================-->

      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
       <div class="container"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li> <!--<a href="adminhome.php" class="page-scroll">Home</a></li>-->
    <div align="left" class="navbar-header">

        <li><a href="logout.php" class="page-scroll">Logout</a></li>
      <li><a href="postad.php" class="page-scroll">POST AD</a></li>
	   <li><a href="viewprodx.php" class="page-scroll">view ad</a></li>
	  </ul>
    </div>
	 
    <!-- /.navbar-collapse --> 
  </div>
    </nav>



</body>



<?php

include("includes/mysqli_connection.php"); ?>
<body> 
 	<div class="container"> 
		<!-- <div class="panel panel-de"> -->
<div class="row">
			<div class="panel-body">
				<h1 class="page-header" align="center"> seller Display </h1>

			    <form action="cart.php" Method="POST">  					
					<table id="example" class="table table-striped" cellspacing="0">
					
				  <thead>
				  	<tr >
						<th>cart id</th>
				  		<th>customer</th>
				  		<th>Item name</th>
				  		<th>qty</th> 
				  		<th>ADDED ON</th>
				  	
				  		<th>Status</th>
				  		<th>Option</th> 
				 
				  	</tr>	
				  </thead> 
				  <tbody>
				  	<?php 
				  		$sql = "SELECT * FROM `cart`, `users` , `nautoitem` WHERE nautoitem.`id`=cart.`nauto_id` AND cart.`cust_id`=users.`user_id` AND cart.status='Confirmed' order by cart.id desc";
				  		 $cur = mysql_query($sql) or die(mysql_error());

						while ($result = mysql_fetch_array($cur)) {
 
						 	# code...
						echo '<tr>'; 
						echo '<td>'. $result['id'].'</td>';
				  		echo '<td>'. $result['name'] .' '. $result['surname'].'</td>'; 
				  	 	echo '<td> '.$result['prodname'].'</td>';
				  		echo '<td>'. $result['qty'].'</td>'; 

				  		echo '<td>'. $result['added'].'</td>'; 

				  		 

				  		echo '<td>'. $result['status'].'</td>'; 
				  		echo '<td>';
				  		?>
				  		<?php 
							if($result['status'] == 'Confirmed'){ ?>
				  
								<a href="cookingprocess.php?action=cancel&id=<?php echo $result['id']; ?>" class="btn btn-primary btn-xs" id="Button1" ><i class="icon-edit">Cancel</a>
								<a href="cookingprocess.php?action=okay&id=<?php echo $result['id']; ?>" class="btn btn-success btn-xs" id="Button2" ><i class="icon-edit">Ordering</a>
							<?php
							}elseif($result['status'] == 'Ordering'){
						?>
							 
								<a href="cookingprocess.php?action=end&id=<?php echo $result['id']; ?>" class="btn btn-danger btn-xs" ><i class="icon-edit">Ready</a>
						<?php
						        
						?>
							 
							 
						<?php
							}else{
								?>
							 
								<a href="cookingprocess.php?action=cancel&id=<?php echo $result['id']; ?>" class="btn btn-primary btn-xs" ><i class="icon-edit">Cancel</a>
								<a href="cookingprocess.php?action=confirm&id=<?php echo $result['id']; ?>" class="btn btn-success btn-xs"  ><i class="icon-edit">Confirm</a>
						<?php
							}

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
</div><!--End of container-->
<div class="modal fade" id="myModal" tabindex="-1">
</div>
 </body>

</html>
