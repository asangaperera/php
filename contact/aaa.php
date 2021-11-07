<?php session_start();
 
 include '../includes/mysqli_connection.php';
 
 if (isset($_POST['submit'])) {
 $Name  = mysqli_real_escape_string($db_conx,$_POST['name']);
 $Email = mysqli_real_escape_string($db_conx,$_POST['email']);
// $date = mysqli_real_escape_string($db_conx,$_POST['date']);
 $date = date("l, d F, Y");
 $comment = mysqli_real_escape_string($db_conx,$_POST['comment']);
 
 	$aaa = "insert into contact(name,email,date,comment) values ('$Name','$Email','$date','$comment')";

 $result = $db_conx->query($aaa);
 
 
			if($result){
				header("location: a.php"); 
				echo "Succussfully send massage";
			} 
			else 
			{
				echo "location : a.php";
				
			}
		}
	else 
	{
		echo "location : a.php";
	
 }
 
 	// Close your database connection
	mysqli_close($db_conx);
		
?>