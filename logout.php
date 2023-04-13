<?php
session_start();
$con = mysqli_connect('localhost','root','','pharmacy') or die('connection failed');
$truncate=mysqli_query($con, "TRUNCATE TABLE cart;");
header('location:home1.php');
$_SESSION['customerid']= null;
?>