<?php
session_start();?>
<html>
 <head>
    <link rel="stylesheet" href="home1.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=HeadlandOne">
 </head>
    <body>
        <nav class="navigation" >
            <h2 style="margin-top: 25px; margin-left: 20px;">NUCARE</h2>
            <ul class="unoerderlist"  style="padding: 2px">
               
                <li><a href="home1.html">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="shopnow1.php">Shop Now</a></li>
                
                <?php 

if(isset($_SESSION['customerid'])){
  echo '<li><a href="logout.php">Log Out</a></li>';}
else{
  echo '<li><a href="login1.html">Log In</a></li>';
}
 ?>
            </ul>
        </nav>
        <div>
        <img src="pharmacy-assistant-module.jpg" alt="Girl in a jacket" width="1349px" height="500px" style="margin-left: -7px;"> 
         <h1 style="margin-top: -330px;margin-left: 150px;" class="hi">"TAKE CARE </h1>
            <h1 style="margin-left: 150px;" class="hi">OF YOUR HEALTH"</h1> 
        </div>
        <h1 style="margin-top: 247px; margin-left: 490px; font-size: 50px;">WELCOME TO</h1>
        
        <h1 style="margin-left: 368px; color: #3795cc; font-size: 40px;">NUCARE Pharmacy & Surgical</h1>
        <p style="margin-left: 270px; font-size: 20px;">NuCare Pharmacy strives to provide our customers with a fresh new (Nu) approach to your </p>
        <p style="margin-left: 220px; font-size: 20px;">pharmacy needs. We pride ourselves on personal patient care and a Nu take on providing our customers</p>
        <p style="margin-left: 530px; margin-bottom: 50px; font-size: 20px;"> with a total health experience.</p>
    </body>
    <footer class="foot">
        <div>
        <p>Contact Us   0112893164</p>
        <P>no 57/2B</P>
         <p>   baththarabulla</p>
           <p> colombo</P>
           </div>
    </footer>
</html>