<?php
$con = mysqli_connect('localhost','root','','pharmacy') or die('connection failed');
$quan =  $_POST['quantity'];
if(isset($message)){
   foreach($message as $message){
      echo '<span class="message">'.$message.'</span>';
   }
}

if(isset($_GET['del'])){
   $cid = $_GET['del'];
   mysqli_query($con, "DELETE FROM cart WHERE pid = '$cid'");
   header('location:cart1.php');
};

?>
