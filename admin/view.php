<?php
 
require('db.php');
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="index.php">Home</a> | <a href="index1.html">Insert New Record</a> | <a href="logout.php">Logout</a></p>
<h2>View Records</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr><th><strong>Spare-Part ID</strong></th>
	<th><strong>Name</strong></th>
	<th><strong>email</strong></th>
	<th><strong>Adress</strong></th>
	<th><strong>Model</strong></th>
	<th><strong>PartName</strong></th>
	<th><strong>Description</strong></th>
     <th><strong>ContactNo</strong></th>
	<th><strong>Price</strong></th>
	<th><strong>Edit</strong></th><th><strong>Delete</strong></th></tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from up ORDER BY id desc;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td><td align="center">
	    <?php echo $row["Name"]; ?></td><td align="center">
		<?php echo $row["email"]; ?></td><td align="center">
        <?php echo $row["Adress"]; ?></td><td align="center">
		<?php echo $row["Model"]; ?></td><td align="center">
		<?php echo $row["PartName"]; ?></td><td align="center">
        <?php echo $row["Description"]; ?></td><td align="center">
		<?php echo $row["ContactNo"]; ?></td><td align="center">
	    <?php echo $row["Price"]; ?></td><td align="center">
		<a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a></td><td align="center"><a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a></td></tr>
<?php $count++; } ?>
</tbody>
</table>

<br /><br /><br /><br />

</div>
</body>
</html>
