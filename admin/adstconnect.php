<?php
$emp_name =$_POST['emp_name'];
$emp_fullname = $_POST['emp_fullname'] ;
$emp_user_name= $_POST['emp_user_name'] ;
$email= $_POST['email'] ;
$emp_NIC_number = $_POST['emp_NIC_number'] ;
$emp_age = $_POST['emp_age'] ;
$emp_position= $_POST['emp_position'] ;
$emp_adress = $_POST['emp_adress'] ;
$emp_ContactNo=$_POST['emp_ContactNo'];
$image=$_POST['image'];
//$email = $_POST['email'];
//Database connection
$conn=new mysqli('localhost','root','','autopart');
if($conn->connect_error)
{
die( 'Connection Failed : '.$conn->connect_error);
}else{
$stmt=$conn->prepare("insert into employee( emp_name,emp_fullname,emp_user_name, email, emp_NIC_number,emp_age,emp_position,emp_adress,emp_ContactNo,image )values( ?,? , ?,?,? ,?,?,?,?,? )");
$stmt->bind_param("sssssissis" $emp_name, $emp_fullname,$emp_user_name, $email, $emp_NIC_number,$emp_age,$emp_position,$emp_adress,$emp_ContactNo,$image );
$stmt->execute();
echo "Insert Employee detils Successfuly....";
$stmt->close();
$conn->close();
}
?>