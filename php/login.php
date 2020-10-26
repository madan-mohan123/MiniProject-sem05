<?php
session_start();
?>

<?php
include('connection.php'); 
     
$password = $_POST['pass'];  
$email = $_POST['email'];


$sql="SELECT email,password,hpost,username FROM account where password='$password' and email='$email'";
$result= mysqli_query($con,$sql);

if(mysqli_num_rows($result)){

    while($row=mysqli_fetch_assoc($result)){
        $_SESSION["hpost"]= $row["hpost"];
        $_SESSION["username"]=$row["username"];
      
    }
   $_SESSION["email"]=$email;
 
//  include('../html pages/dashboardowner.html');
  //include('test.php');
if($_SESSION[hpost]=="Owner"){
   require_once '../html pages/dashboardowner.php';
}
else{
    require_once '../html pages/dashboardtenant.php'; 
}

 }
else {
    echo "<h2 style='text-align:center';padding-top:30px;> Check your email and password! </h2>";
 
}
mysqli_close($con);
?>