<?php
session_start();
?>

<?php
$host = "localhost";  
$user = "root";  
$password = '';  
$db_name = "rental house management";  
  
$con = mysqli_connect($host, $user, $password, $db_name); 
 
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

if($_SESSION[hpost]=="Owner"){
  // include '../html pages/dashboardowner.php';
 
  header("Location: ../html pages/dashboardowner.php");
}
else{
     //include '../html pages/dashboardtenant.php'; 
     header("Location: ../html pages/dashboardtenant.php");
}

 }
else {
    echo "<h2 style='text-align:center';padding-top:30px;> Check your email and password! </h2>";
 
}
mysqli_close($con);
?>