<?php
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
  echo '<a href="login1.php">Log In</a>';
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

<img src="pharmacy-assistant-module.jpg" alt="Girl in a jacket" width="1370px" height="500px" style="margin-left: -6px;"> 
<h3 style="font-size: 25PX; margin-left:585px">PROMOTIONS</h3>
<div class="divdiv" >
  <div class="divistion" style=" margin-top: 50px; background-color:  rgba(118, 179, 199, 0.26); width: 225px; margin-left: 50px; ">
    <img src="download.jpg">
    <h4 style="margin-left: 20px;">[P]BIGSENS 500MG 100S</h4>
    <h4 style="margin-left:80px">LKR8.86</h4>
    <button class="button button1" style="margin-left: 58px;">Add to Cart</button>
  </div>
  <div class="divistion" style=" margin-top: 50px; background-color:  rgba(118, 179, 199, 0.26); width: 225px; margin-left: 50px;">
    <img src="download.jpg">
    <h4 style="margin-left: 20px;">[P]BIGSENS 500MG 100S</h4>
    <h4 style="margin-left:80px">LKR8.86</h4>
    <button class="button button1" style="margin-left: 58px;">Add to Cart</button>
  </div>
  <div class="divistion" style=" margin-top: 50px; background-color:  rgba(118, 179, 199, 0.26); width: 225px; margin-left: 50px;">
    <img src="download.jpg">
    <h4 style="margin-left: 20px;">[P]BIGSENS 500MG 100S</h4>
    <h4 style="margin-left:80px">LKR8.86</h4>
    <button class="button button1" style="margin-left: 58px;">Add to Cart</button>
  </div>
  <div class="divistion" style=" margin-top: 50px; background-color:  rgba(118, 179, 199, 0.26); width: 225px; margin-left: 50px;">
    <img src="download.jpg">
    <h4 style="margin-left: 20px;">[P]BIGSENS 500MG 100S</h4>
    <h4 style="margin-left:80px">LKR8.86</h4>
    <button class="button button1" style="margin-left: 58px;">Add to Cart</button>
  </div>
</div>
</body>
</html>