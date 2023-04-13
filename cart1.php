<?php

session_start();
$con = mysqli_connect('localhost','root','','pharmacy') or die('connection failed');

$productid= $_SESSION['iteam_value'];
$grand_total = 0;


if(isset($_POST['quantity'])||isset($_POST['add_product'])){
  $quan =  $_POST['quantity'];
  $select = mysqli_query($con, "SELECT * FROM products WHERE pid = '$productid'");
  $row = mysqli_fetch_assoc($select);
        $nname=$row['name'];
        $pprice=$row['price'];
        $sub=$row['price'] * $quan;
        $ppicture=$row['picture'];

 try{     
  $sql = "INSERT INTO cart(pid,pname, pprice,quantity,subtotal,ppicture) VALUES ('$productid','$nname','$pprice','$quan','$sub','$ppicture')";
  $con->query($sql); }

  catch (Exception $e){
    $selectcart = mysqli_query($con, "SELECT * FROM cart where pid='$productid'");
    $rowcart = mysqli_fetch_assoc($selectcart);
    echo '<script>
    alert("You have already added this iteam'.$rowcart['quantity'].'");
    </script>';
  }

     
   

};

if(isset($_GET['edit'])){
   $id = $_GET['edit'];
   mysqli_query($con, "DELETE FROM cart WHERE pid = $id");
   header('location:cart1.php');
};

?>

<html>
 <head>
    <link rel="stylesheet" href="home1.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php



if(isset($_GET['edit'])){
   $id = $_GET['edit'];
   mysqli_query($conn, "DELETE FROM cart WHERE id = $id");
   header('cart1.php');
};

?>

    <h2 style="margin-top: 25px; margin-left: 20px;">NUCARE</h2>
<div class="navbar">
    
  <a href="medicine1.php">Medicine</a>
  <a href="#news">Medical Devices</a>
  
  <div class="dropdown">
  <button class="dropbtn" onclick="myFunction()">Wellness
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-content" id="myDropdown">
    <a href="#">Body care</a>
    <a href="#">Skin care</a>
    <a href="#">Hand & Foot care</a>
  </div>
  <div class="dropdown">
    <button class="dropbtn" onclick="myFunction2()">Personal care
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content2" id="myDropdown2">
      <a href="#">Mother & Baby</a>
      <a href="#">Eye & Year</a>
      <a href="#">Pain & Fever</a>
    </div>
  </div> 
</div>
<?php 

if(isset($_SESSION['customerid'])){
  echo '<a href="logout.php">Log Out</a>';}
else{
  echo '<a href="login1.html">Log In</a>';
}
 ?>
  <div class="search-container">
    <form action="/action_page.php">
      <input type="text" placeholder="Search.." name="search" style="width:170px">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>


</div>
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
  var myDropdown = document.getElementById("myDropdown");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  }
}


function myFunction2() {
  document.getElementById("myDropdown2").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
  var myDropdown2 = document.getElementById("myDropdown2");
    if (myDropdown2.classList.contains('show')) {
      myDropdown2.classList.remove('show');
    }
  }
}
</script>
<div style="margin-left: 20px; margin-top: 60px;">
<h3>Shopping Cart</h3>
<a href="medicine1.php" style="text-decoration: none; "><h4 style="margin-top: 30px; color: black;">Continue Shoping -></h4></a>
<h4 style="color: rgba(0, 0, 0, 0.418); margin-top: -10px;"> Iteams Added to Your Cart</h4>
</div>

 <?php

$select = mysqli_query($con, "SELECT * FROM cart");

?>
<div style="margin-left: 790px; margin-bottom: -55px; margin-top: -40px;">
    <h4 style="display: inline-block; padding: 50px;">Price</h4>
    <h4 style="display: inline-block; padding: 50px;">Qut</h4>
    <h4 style="display: inline-block; padding: 50px; ">Sub Total</h4>
</div>
<?php while($row = mysqli_fetch_assoc($select)){ 
 ?>

<hr  style="margin-top:20px; color: rgba(0, 0, 0, 0.267); height: 2px; margin-top: -15px;">
<img src="uploaded_img/<?php echo $row['ppicture']; ?>" height="120px" width="120px" alt=""  style="padding: 1px; margin-bottom: 130px; margin-left: 23px;">
<h3 style="margin-left: 330px; margin-top: -200px; color: rgba(0, 0, 0, 0.39);"><?php echo $row['pname']; ?></h3>

<h3 style="margin-left: 835px; color: rgba(0, 0, 0, 0.39); margin-top: -50px; margin-bottom: 60px;">LKR-<?php echo $row['pprice']  ?>/=</h3> 
<input type="text" name="quantity"  class="form-control" value="<?php echo $row['quantity']; ?>" style=" margin-left: 990px; width: 20px; margin-top:-80px;" />
<h3 style="margin-left: 1125px; color: rgba(0, 0, 0, 0.39); margin-top: -80px; margin-bottom: 55px;">LKR-<?php echo $row['subtotal']; ?>/=</h3>

<a href="cart1.php?edit=<?php echo $row['pid']; ?>" class="btn"> <img src="icons8-delete-24.png" style=" margin-left: 1300px; margin-top: -80px;"></a>
<a href="cart_update.php?delete=<?php echo $row['pid']; ?>" class="btn">  <img src="icons8-pencil-24.png" style=" margin-left: 1250px; margin-top: -80px;"> </a>
    
<hr  style="margin-top: 20px; color: rgba(0, 0, 0, 0.267); height: 2px; margin-top: 10px;">
<?php 
$grand_total=$grand_total+$row['subtotal'];
 ?>
<?php };


 ?>       
 <a href="summary.php?grandtotal=<?php echo $grand_total; ?>"><button class="button button1" style="margin-left: 1150px; margin-top: 15px; border-radius: 13px; width: 100px; height: 40px; border: none; background-color: rgba(118, 179, 199, 1);">Done</button></a>        
         
</body>
</html>   
