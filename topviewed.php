<?php
session_start();

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

<?php include("1head.html");?>

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
	
		<!--Top Views Start-->
		<div class="box mb0" id="topviews">
			<div class="box-heading-1"><span>TOP VIEWS</span></div>
			<div class="box-content-1">
				<div class="box-product-1" >
					<?php
						include("includes/mysqli_connection.php");
						
						// This first query is just to get the tl count of rows
						$sql = "SELECT COUNT(*) FROM nautoitem WHERE noviews>0 ORDER BY noviews DESC";
						$query = mysqli_query($db_conx, $sql);
						$row = mysqli_fetch_row($query);
						// Here we have the total row count
						$rows = $row[0];
						
						
						// This sets the range of rows to query for
						$limit = 'LIMIT 0,8';
						
						// This is your query again, it is for grabbing just one page worth of rows by applying $limit
						$sql = " SELECT * FROM nautoitem WHERE noviews>0 ORDER BY noviews DESC $limit";

						$query = mysqli_query($db_conx, $sql);
						
						$list = '';

						$src = "image_upload/";
							
						if(!isset($_SESSION['username']))
						{
							while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
							{
							
								$id = $row["id"];
								$prodname = $row["prodname"];
								$image = $row["image"];
								$category = $row["category"];
								$price = "Rs. " . $row["price"];
								$desc = $row["descr"];
								$type = $row["type"];
								$noviews = $row["noviews"];
								$topsell = $row["topsell"];
								$width="150px";
								$height="150px";

								$list .='
								<div>
								 <div class="image"><a href="' . $src . $image . '"><img width="' . $width . '" height="' . $height . '" src="' . $src . $image . '" alt = "' . $prodname . '"></a></div>';
								 $list .='
								   <div class="proName">
									<div class="name"><a href="' . $src . $image . '">' . $desc . '</a></div>
									<div class="price">' . $price . '</div>
									<div class="cart">
										<label class="btn">';
										
										$list .='
										</label>
									</div>
								  </div>
								</div>
								'; // end list here
							}
						}

						else
						{
							while($row = mysqli_fetch_array($query, MYSQLI_ASSOC))
							{
							
								$id = $row["id"];
								$prodname = $row["prodname"];
								$image = $row["image"];
								$category = $row["category"];
								$price = "Rs. " . $row["price"];
								$desc = $row["descr"];
								$type = $row["type"];
								$noviews = $row["noviews"];
								//$topsell = $row["topsell"];
								$width="150px";
								$height="150px";

								$list .='
								<div>
								 <div class="image"><a href="' . $src . $image . '"><img width="' . $width . '" height="' . $height . '" src="' . $src . $image . '" alt = "' . $prodname . '"></a></div>';
								 $list .='
								   <div class="proName">
									<div class="name"><a href="' . $src . $image . '">' . $desc . '</a></div>
									<div class="price">' . $price . '</div>
									<div class="cart">
										<label class="btn">';
										
										$list .='<form method="post" action="view.php"><input type="hidden" name="txtid" value="'.$id.'"><input type="submit" value="Add to Cart" class="button"/></form>';
															
										$list .='
										</label>
									</div>
								  </div>
								</div>
								'; // end list here
							}
						}
						// Close your database connection
						mysqli_close($db_conx);

						if($rows == 0)
						{
							echo "<h2 align='center'>Nothing to display</h2>";
						}
						
						else
						{
							echo $list;
						}
					?>
				</div>
			</div>
		</div>
		<!--Top Views End-->
		
		<?php include("footer.php");?>

</div>
<!-- Main Div Tag End-->

	<!--Flexslider Javascript Part Start-->
		<?php include("flexslider.php");?>
	<!--Flexslider Javascript Part End-->
</body>
</html>