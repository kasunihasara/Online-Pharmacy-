<?php
$con = mysqli_connect('localhost','root','','pharmacy') or die('connection failed');


 $name=$_POST['username'];
 $pass=$_POST['password'];
 $conpass=$_POST['password1'];
 if ($pass == $conpass){
 $select = " SELECT * FROM customer WHERE pass = '$pass' && username = '$name' ";
 
 $result = mysqli_query($con, $select);

   if(mysqli_num_rows($result) > 0){
    $error[] = 'user already exist!';
   }
   else{
    $sql = "INSERT INTO customer(username, pass) VALUES ('$name','$pass')";
    if ($con->query($sql) === TRUE) {
      header("Location: login1.html");
    }
    else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
   

  
    header("Location: login1.html");
   }
  }
  else{
    echo "not matcheed";
  }
  $con->close();
?>