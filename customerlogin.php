<?php require_once ("db/config.php"); 
if(isset($_SESSION['user_id'])){
?>
 <script type="text/javascript">
  window.location = "booking.php?#team-section";
  </script>
<?php
}

?>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Nauto</title>
<meta name="description" content="">
<meta name="author" content="">

<!-- Favicons
    ================================================== -->
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" href="img/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

<!-- Bootstrap -->
<link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css"> 

<!-- Slider
    ================================================== -->
<link href="css/owl.carousel.css" rel="stylesheet" media="screen">
<link href="css/owl.theme.css" rel="stylesheet" media="screen">
<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

 <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">  

    <!-- Custom CSS -->
    <link href="css/modernCss.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <!-- <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->
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
    <!-- <a class="navbar-brand" href="index.php" <font = "century gothic" >Reservation</a></font></div>
     Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php" class="page-scroll">HOME</a></li>
        <!-- <li><a href="#about-section" class="page-scroll">About</a></li>
        <li><a href="#services-section" class="page-scroll">Courses</a></li> 
        <li><a href="index.php?#works-section" class="page-scroll">ROOM</a></li>-->
		
       <li><a href="index.php?#team-section" class="page-scroll">RESERVATION</a></li>
        <!-- <li><a href="#testimonials-section" class="page-scroll">History</a></li> 
        <li><a href="index.php?#contact-section" class="page-scroll">CONTACT US</a></li> 
 <li><a href="index.php?#contact-section" class="page-scroll">ABOUT US</a></li>-->
 
  <?php 
 if(isset($_SESSION['user_id'])){
?> 
<li><span  class="glyphicon glyphicon-user"></span><a  href="" title="Name" ><?php echo $_SESSION['name'] .' '. $_SESSION['surname']; ?></a></li> 
 <li><a href="logout.php" class="page-scroll">Logout</a></li>
<?php
	 
 }
 
 ?>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
   </nav>

 </head>
 
<body>
<?php  $_SESSION['PACKAGEID'] = $_GET['packageid']; ?> 

<?php 
if(isset($_POST['btnlogin'])){
   $sql = "SELECT * FROM users WHERE username='".$_POST['username']."' AND password = '".$_POST['password']."'"; 
             $result =  mysql_query($sql) or die(mysql_error());

     $count=mysql_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row
    if($count==1){

    // Register $myusername, $mypassword and redirect to file "login_success.php"
    while ($row = mysql_fetch_array($result)) {
        # code...
        $_SESSION['user_id'] = $row['user_id']; 
		$_SESSION['name'] = $row['name']; 
		$_SESSION['surname'] = $row['surname'];  
    }
    // session_register("mypassword"); 
    ?>
      <script type="text/javascript">
      window.location = "booking.php?#team-section";
      </script>
    <?php
}
}
?>
 

       <!---gh-->
	   <body style= "background-color :#99ffd6;" >
	   
	  
	   
<center>
<table border="10" cellpadding="20" cellspacing="20 width="1000" height="400">
  <tr>1
    <td colspan="5" height="96">
	 <div id="login" class="animate form">
    <form  action="" autocomplete="on" method="POST"> 

      <h1 align="center">Users Login Form</h1>
        <table width="400" align="center" border="0">
          <tr>
            <td bgColor="c6d3ce">
              <table width="400" border="0">
                <tr bgColor="dee7e7">
                  <td width="165">Username</td>
                  <td><b><input type="text" size="25" name="username" required="required"></b></td>
                </tr>
                <tr bgColor="e7efef">
                  <td width="165"> Password</td>
                  <td><b><input type="password" maxlength="10" name="password" required="required" size="25"></b></td>
                </tr>
                </table>
            </td>
          </tr>
        </table>
        <br>
        <table width="400" align="center" border="0">
          <tr>
            <td align="center" width="200"><input type="submit" name="btnlogin" value= "Login" ></td>
            <td align="center" width="200"><input type="reset" name="reset" value="Reset Form" onClick="return confirm('Are you sure you want to clear the current information?');"></td>
          </tr>
        </table>
      </form>
	  <p align="center"><a href=" about.php"> About us </a></p>
    </td>
  </tr>
</table>
	   

	   <!--bh-->
   <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
     <script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
     <script type="text/javascript" src="js/bootstrap-datetimepicker.uk.js" charset="UTF-8"> </script>
 
<script type="text/javascript">
  $('.from').datetimepicker({
        language:  'en',
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
    });
  $('.to').datetimepicker({
        language:  'en',
        weekStart: 1,
        todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
    });
    $(function() {
    var dates = $( "#from, #to" ).datepicker({                   
      defaultDate:'',
      changeMonth: true,
      numberOfMonths: 1,
      onSelect: function( selectedDate ) {
      var now =Date();
        var option = this.id == "from" ? "minDate" : "maxDate",
          instance = $(this).data("datepicker"),
          date = $.datepicker.parseDate(
            instance.settings.dateFormat ||
            $.datepicker._defaults.dateFormat,
            selectedDate, instance.settings );
        dates.not( this ).datepicker( "option", option, date );
      }
    });
  });
</script>
</body>
</html>