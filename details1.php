<?php

$con = mysqli_connect('localhost','root','','pharmacy') or die('connection failed');

$pid = $_GET['cartedit'];
session_start();
?>

<html>
 <head>
    <link rel="stylesheet" href="home1.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
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
<?php
      
      $select = mysqli_query($con, "SELECT * FROM products WHERE pid = '$pid'");
      while($row = mysqli_fetch_assoc($select)){
      $_SESSION['iteam_value'] = $row['pid'];
   ?>
<form  action="cart1.php" method="post">
<img src="uploaded_img/<?php echo $row['picture']; ?>" width="500px"; height="500px" style="margin-left: 100px; margin-top: 40px; ">

<h1 style="margin-left: 740px; margin-top: -470px;"><?php echo $row['name']; ?></h1>
<h3 style="margin-left: 740px;">Availability : </h3>
<h3 style="margin-left: 860px; color: rgba(17, 40, 246, 1); margin-top: -41px;">In stock</h3>
<h2 style="margin-left: 740px;">METFORMINE</h2>
<p style="margin-left: 740px; margin-top: 35px; color: rgba(0, 0, 0, 0.281);"><?php echo $row['description']; ?></p>


<h3 style="margin-left: 740px; margin-top: 30px;">The price shown is the per tablet/capsule price</h3>
<h3 style="margin-left: 740px; margin-top: 25px;">SKU</h3>
<P style="margin-left: 740px; margin-top: -12px; color: rgba(0, 0, 0, 0.356);">027225</P><br>
<h3 style="margin-left: 740px; color: rgba(17, 40, 246, 1); margin-top: -12px;">LKR<?php echo $row['price']; ?>/=</h3>
<h3 style="margin-left: 880px; color: rgba(17, 40, 246, 0.63); margin-top: -39px;"><b>per tablet/capsule</b></h3><br>
<h3 style="margin-left: 740px; color: rgba(0, 0, 0, 0.281); margin-top: -12px;">Qty</h3>
<div style="margin-top: -37px; display:inline;">

<input type="number" id="quantity" name="quantity" min="1" max="" value="1" style="margin-left: 840px; margin-top: -40px; width:50px">

</div>
<div style="margin-top: 30px; ">
<a href=""><button type="submit" name="addtocart" style= "margin-left: 740px; width: 120px; height: 38px; border-radius: 10px; background-color: rgba(118, 179, 199, 1); border-color: rgba(118, 179, 199, 1); font-size: 17px; ">Add to Cart</button></a>

</div>
</form>  

<?php }; ?>
</body>
</html>