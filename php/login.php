<?php

include('connection.php'); 
     
 
$password = $_POST['pass'];  
$email = $_POST['email'];

$sql="SELECT email,password FROM account where password='$password' and email='$email'";
$result= mysqli_query($con,$sql);

if(mysqli_num_rows($result)){
   
   include('../html pages/dashboardowner.html');

}
else {
    echo "check your email and password!";
 
}
mysqli_close($con);
?>