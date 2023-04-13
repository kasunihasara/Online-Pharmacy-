<?php
$con = mysqli_connect('localhost','root','','pharmacy') or die('connection failed');
session_start();

 $name=$_POST['username'];
 $pass=$_POST['password'];
 $select = " SELECT * FROM customer WHERE pass = '$pass' && username = '$name' ";
 $select1= " SELECT * FROM admin WHERE password = '$pass' && username = '$name' ";
 
 $result = mysqli_query($con, $select);
 $result1 = mysqli_query($con, $select1);
   if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    header("Location: home1.php");
   $_SESSION['customerid']= $row['cid'];
   }
   elseif(mysqli_num_rows($result1) > 0){
    header("Location: admin1.php");
   }
   else{
    echo "error";
   }

?>