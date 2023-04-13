<?php

$con = mysqli_connect('localhost','root','','pharmacy') or die('connection failed');

if(isset($_POST['add_product'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_quantity = $_POST['product_quantity'];
   $product_description=$_POST['product_description'];
   $product_category=$_POST['product_category'];
   $product_image = $_FILES['product_image']['name'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_folder = 'uploaded_img/'.$product_image;

   if(empty($product_name) || empty($product_price) || empty($product_image)|| empty($product_quantity)|| empty($product_description)|| empty($product_category)){
      $message[] = 'please fill out all';
   }else{
      $insert = "INSERT INTO products(name, price, quantity, description, category, picture) VALUES('$product_name', '$product_price', '$product_quantity','$product_description', '$product_category', '$product_image')";
      $upload = mysqli_query($con,$insert);
      if($upload){
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         $message[] = 'new product added successfully';
      }else{
         $message[] = 'could not add the product';
      }
   }

};

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($con, "DELETE FROM products WHERE pid = $id");
   header('location:admin1.php');
};

?>




<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="admin1.css">

</head>
<body>
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<span class="message">'.$message.'</span>';
   }
}

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM products WHERE id = $id");
   header('location:admin_page.php');
};

?>

   
<div class="container">

   <div class="admin-product-form-container">

      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
         <h3>add a new product</h3>
         <input type="text" placeholder="enter product name" name="product_name" class="box">
         <input type="number" placeholder="enter product price" name="product_price" class="box">
         <input type="quantity" placeholder="enter product quantity" name="product_quantity" class="box">
         <input type="description" placeholder="enter product description" name="product_description" class="box">
         <input type="category" placeholder="enter product category" name="product_category" class="box">
         <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box">
         <input type="submit" class="btn" name="add_product" value="add product">
         <a href="login1.html"><h2 style="color: rgba(0, 0, 0, 0.493); margin-top: 15px; margin-left:200px">Log Out</h2></a>
      </form>

   </div>
   <?php

$select = mysqli_query($con, "SELECT * FROM products");

?>
<div class="product-display">
   <table class="product-display-table">
   <thead>
      <tr>
         <th></th>
         <th>Name</th>
         <th>Quantity</th>
         <th>Description</th>
         <th>Price</th>
         <th></th>
      </tr>
</thead> 
     
<?php while($row = mysqli_fetch_assoc($select)){ ?>
      <tr>
         <td><img src="uploaded_img/<?php echo $row['picture']; ?>" height="100" alt=""></td>
         <td><?php echo $row['name']; ?></td>
         <td><?php echo $row['quantity']; ?></td>
         <td><?php echo $row['description']; ?></td>
         <td>$<?php echo $row['price']; ?>/-</td>
         <td>
            <a href="admin_update1.php?edit=<?php echo $row['pid']; ?>" class="btn"> <i class="fas fa-edit"></i> edit </a>
            <a href="admin1.php?delete=<?php echo $row['pid']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
         </td>
         
      </tr>
   <?php } ?>
   </table>
</div>

</div>
   
</body>
</html>