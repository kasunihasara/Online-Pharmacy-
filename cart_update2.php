<?php
session_start();
$con = mysqli_connect('localhost','root','','pharmacy') or die('connection failed');
$cartproductid= $_SESSION['product_value'];

if(isset($_POST['update'])){
    $product_quantity=$_POST['update'];
    $select = mysqli_query($con, "SELECT * FROM cart WHERE pid = '$cartproductid'");
    $row = mysqli_fetch_assoc($select);
    $newsub=$row['pprice'] * $product_quantity;
    $update_data = "UPDATE cart SET  quantity='$product_quantity', subtotal='$newsub'  WHERE pid = '$cartproductid'";
    $upload = mysqli_query($con, $update_data);

    if($upload){
       
        header('location:cart1.php');
    }else{
       $$message[] = 'please fill out all!'; 
    }

 
};
?>