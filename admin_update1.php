<?php

$con = mysqli_connect('localhost','root','','pharmacy') or die('connection failed');

$pid = $_GET['edit'];

if(isset($_POST['update_product'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_quantity = $_POST['product_quantity'];
   $product_description=$_POST['product_description'];
   $product_category=$_POST['product_category'];
   $product_image = $_FILES['product_image']['name'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_folder = 'uploaded_img/'.$product_image;

   if(empty($product_name) || empty($product_price) || empty($product_image)|| empty($product_quantity)|| empty($product_description)|| empty($product_category)){
      $message[] = 'please fill out all!';    
   }else{

      $update_data = "UPDATE products SET name='$product_name', price='$product_price', quantity='$product_quantity',description='$product_description',category='$product_category', picture='$product_image'  WHERE pid = '$pid'";
      $upload = mysqli_query($con, $update_data);

      if($upload){
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         header('location:admin1.php');
      }else{
         $$message[] = 'please fill out all!'; 
      }

   }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="admin1.css">
</head>
<body>

<?php
   if(isset($message)){
      foreach($message as $message){
         echo '<span class="message">'.$message.'</span>';
      }
   }
?>

<div class="container">


<div class="admin-product-form-container centered">

   <?php
      
      $select = mysqli_query($con, "SELECT * FROM products WHERE pid = '$pid'");
      while($row = mysqli_fetch_assoc($select)){

   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">update the product</h3>
      <input type="text" class="box" name="product_name" value="<?php echo $row['name']; ?>" placeholder="enter the product name">
      <input type="number" min="0" class="box" name="product_price" value="<?php echo $row['price']; ?>" placeholder="enter the product price">
      <input type="quantity" placeholder="enter product quantity" value="<?php echo $row['quantity']; ?>" name="product_quantity" class="box">
      <input type="description" placeholder="enter product description" value="<?php echo $row['description']; ?>" name="product_description" class="box">
      <input type="category" placeholder="enter product category"  value="<?php echo $row['category']; ?>" name="product_category" class="box">
      <input type="file" class="box" name="product_image"   accept="picture/png, picture/jpeg, picture/jpg">
      
      <input type="submit" value="update product" name="update_product" class="btn">
      <a href="admin1.php" class="btn">go back!</a>
   </form>
   


   <?php }; ?>

   

</div>

</div>

</body>
</html>