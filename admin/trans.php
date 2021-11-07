
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

  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "super");

  // Initialize message variable
  $msg = "";
///$select_seller="select * from user where username='$session_username'";
//$run_seller=mysqli_query($db, $select_seller);
//$row_seller=mysqli_fetch_array($run_seller);
$seller_id=$userid;
  // If upload button is clicked ...
 

 $result = mysqli_query($db,"SELECT * FROM cart order BY cart .id DESC" );
//$result = mysqli_query($db,"SELECT * FROM users where name= 'uname' from cart where user_id);

//if(isset($_POST['search']))
//{
    //$valueToSearch = $_POST['valueToSearch'];
 
    //$query = "SELECT * FROM `nautoitem` WHERE CONCAT( `discription`,`sp_category`, `sp_make`, `sp_name`)LIKE'%".$valueToSearch."%'";
    //$search_result = filterTable($query);
    

// else {
   
    //SELECT * FROM nautoitem WHERE seller_id='$seller_id'order BY spare_part .sp_id DESC
   // $search_result = filterTable($query);



//function filterTable($query)
{
    //$connect = mysqli_connect("localhost", "root", "", "autopart");
    //$filter_Result = mysqli_query($connect, $query);
   // return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Supermarket</title>
        <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        {
           background color: white;
        }
        </style>
    </head>
    <body>
            
            
            <table style="color:black; background-color:lightblue ;  width: 100% ; height: 20px;">
                <tr style="width: 20px; height: 20px ; background-color:white; float: auto ">
        
                    <th>Date</th>
                    <th>Cart ID</th>
                    <th>User ID</th>  
                    <th>Status</th>
                    <th>Trans Code</th>
                    <th>View Full Detailed Bill</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    
                </tr>
<style type="text/css">
   #content{
    width: 80%;
    margin: 20px auto;
    border: 1px solid #cbcbcb;
   }
   form{
    width: 50%;
    margin: 20px auto;
   }
   form div{
    margin-top: 5px;
   }
   #img_div{
    width: 60%;
    padding: 5px;
    margin: 15px auto;
    border: 1px solid #cbcbcb;
   }
   #img_div:after{
    content: "";
    display: block;
    clear: both;
   }
   img{
    float: left;
    margin: 5px;
    width: 150px;
    height: 110px;
   }
</style>
</head>
<body>

<div id="content">


 
                <?php while($row = mysqli_fetch_assoc($result)):?>
                <tr style="height: 50px">
                    <td><?php echo $row['added'];?></td>
                     <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['cust_id'];?></td>
                    <td><?php echo $row['status'];?></td>
                    <td><?php echo $row['trans'];?></td>
                  
                    <td><a href="ditalbill.php?id=<?php echo $row["id"];?>">View</a></td>
                    <td><a href="editprod.php?id=<?php echo $row["id"]; ?>">Edit</a></td>
                   <td><a href="delete_seller_sp.php?id=<?php echo $row["id"]; ?>">Delete</a></td>

                 <?php 
?>
                </tr>
                <?php endwhile;?>
            </table>
        </form>
    </body>
</html>

