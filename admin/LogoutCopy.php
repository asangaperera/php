<?php 
session_start();

// remove session variables
session_unset(); 
// destroy the current session 
session_destroy(); 

header("location: ../index.php");