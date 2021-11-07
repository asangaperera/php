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

<!-- 1head Part Start-->
<?php include("1head.html");?>
<!-- 1head Part End-->

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
	
	<!--Middle Part End-->

		<!--Search Result Start-->
		<div class="box mb0" id="search">
			<div class="box-heading-1"><span>Search Result</span></div>
			<div class="box-content-1">
				<div class="box-product-1" >
					<?php
						include("includes/config.php");

						$search = $_POST['search'];
						$select = $_POST['select'];
						
						switch($select)
						{
							case 'name':
							$sql = "SELECT * FROM `nautoitem` WHERE (CONVERT(`prodname` USING utf8) LIKE '%".$search."%')";
							break;
							
							case 'desc':
							//$sql = "SELECT * FROM nautoitem WHERE `descr` LIKE '%".$search."%'";
							$sql = "SELECT * FROM `nautoitem` WHERE (CONVERT(`descr` USING utf8) LIKE '%".$search."%')";
							break;

							case 'price':
							$sql = "SELECT * FROM 'nautoitem' WHERE `price` = ".$search;
							break;
							
							case 'views':
							$sql = "SELECT * FROM 'nautoitem' WHERE `noviews` = ".$search;
							break;
							
							case 'type':
							//$sql = "SELECT * FROM nautoitem WHERE `type` LIKE '".$search."'";
							$sql = "SELECT * FROM `nautoitem` WHERE (CONVERT(`type` USING utf8) LIKE '%".$search."%')";
							break;
						}
						
						//echo $sql;
							//exit;
							
						// gets value sent over search form
						 
						$min_length = 1;
						// you can set minimum length of the search if you want
						 
						if(strlen($search) >= $min_length){ // if search length is more or equal minimum length then
							 
							$search = htmlspecialchars($search); 
							// changes characters used in html to their equivalents, for example: < to &gt;
							 
							$search = mysql_real_escape_string($search);
							// makes sure nobody uses SQL injection
							 
							$raw_results = mysql_query($sql) or die(mysql_error());
							
							// * means that it selects all fields, you can also write: `id`, `title`, `text`
							// articles is the name of our table
							 
							// '%$search%' is what we're looking for, % means anything, for example if $search is Hello
							// it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$search'
							// or if you want to match just full word so "gogohello" is out use '% $search %' ...OR ... '$search %' ... OR ... '% $search'
							 
							 
							if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
								
								$count = 0;
								
								while($results = mysql_fetch_array($raw_results)){
								// $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
								
								$id = $results["id"];
								$prodname = $results["prodname"];
								$image = $results["image"];
								$category = $results["category"];
								$price = "Rs. " . $results["price"];
								$desc = $results["descr"];
								$type = $results["type"];
								$views = $results["noviews"];
								$width="150px";
								$height="150px";
								
								$list = '';
								$src = "image_upload/";
								
								$list .='
										<div>
										 <div class="image"><a href="' . $src . $image . '"><img width="' . $width . '" height="' . $height . '" src="' . $src . $image . '" alt = "' . $prodname . '"></a></div>';
										 $list .='
										   <div class="proName">
											<div class="name"><a href="' . $src . $image . '">' . $desc . '</a></div>
											<div class="price">' . $price . '</div>
											<div class="cart" align="center">
												<label class="btn">';
												
												if(isset($_SESSION['username']))
												{
													$list .='<form method="post" action="view.php"><input type="hidden" name="txtid" value="'.$id.'"><input type="submit" value="Add to Cart" class="button"/></form>';

													$list .='<form method="post" action="index_alter.php"><input type="hidden" name="txtid" value="'.$id.'"><input type="submit" value="View Alternatives" class="button"/></form>';
													$list .='<form method="post" action="postad1.php"><input type="hidden" name="txtid" value="'.$id.'"><input type="submit" value="Add Alternatives" class="button"/></form>';

													
												}

												else
												{
												//$list .='<form method="post" action="view.php"><input type="hidden" name="txtid" value="'.$id.'"><input type="submit" value="Add to Cart" class="button"/></form>';					
												}
												
												$list .='
												</label>
											</div>
										  </div>
										</div>
										'; // end list here
										
								 $count += 1;
						
								echo $list;
								
								}
								 //echo $count;
								 
								 if($count > 1)
								 {
									echo "<script>alert('Search Found: " . $count . " Results')</script>";
								 }
								 
								 else
								 {
									echo "<script>alert('Search Found: " . $count . " Result')</script>";
								 }
							}
							else{ // if there is no matching resultss do following
								echo "<b>No results</b>";
							}
							 
						}
						else{ // if search length is less than minimum
							echo "<b>Minimum length is </b>".$min_length;
						}
					?>
				</div>
			</div>
		</div>
		<!--Search Result End-->


		<?php include("footer.php");?>
	
</div>
<!-- Main Div Tag End-->

</body>
</html>