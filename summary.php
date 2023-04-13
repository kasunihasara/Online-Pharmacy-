<?php
$con = mysqli_connect('localhost','root','','pharmacy') or die('connection failed');
$total = $_GET['grandtotal'];
$taxt = $total+(($total*10)/100);
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
<div style="margin-left: 20px;">
<h3>Summary</h3>
<a href="cart1.php" style="text-decoration: none; "><h4 style="margin-top: 30px; color: black;"> <<< Back to Cart</h4></a>
<h4 style="color: rgba(0, 0, 0, 0.418);">Summary of the Iteams Added to Your Cart</h4>
</div>
<div style="background-color: rgba(118, 179, 199, 0.24); width: 480px; height: 450px; text-align: center; padding-top: 110px; margin-left: 450px; margin-top: 40px;">
    <h2>Summary</h2>
    <hr style="background-color:rgba(0, 0, 0, 0.322); width:370px; height: 1px; border:none;">
    <form style="margin-top: 50px;">
       <div style="margin-left: 12px;"> <b>Sub Total</b><input type="text" value="<?php echo $total?>" style="margin-left: 19px;  border-radius: 13px; width: 250px; height: 30px; border-color:rgba(118, 179, 199, 1); background-color: rgba(118, 179, 199, 0); "><br></div>
        <div style="margin-left: 48px;"><b>Tax</b><input type="text" value="<?php echo "10%"?>" style="margin-top: 20px; margin-left: 25px;  border-radius: 13px; width: 250px; height: 30px; border-color:rgba(118, 179, 199, 1); background-color:rgba(118, 179, 199, 0); "><br></div>
      <b> Order Total</b><input type="text" value="<?php echo $taxt?>" style="margin-top: 20px; margin-left: 23px;  border-radius: 13px; width: 250px; height: 30px; border-color:rgba(118, 179, 199, 1); background-color: rgba(118, 179, 199, 0); "><br>
        <hr style="background-color:rgba(0, 0, 0, 0.322); width:370px; height: 1px; border:none; margin-top: 55px;">
        <button type="button" style="margin-top: 30px; border-radius: 13px; width: 190px; height: 40px; border: none; background-color: rgba(118, 179, 199, 1);"><b>Check Out</b></button>
    </form>
</div>
</body>
</html>