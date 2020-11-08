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
  header("Location: ../html pages/dashboardowner.php");
}
else{
    if($_SESSION[houseid]!=""){
        header("Location: ../html pages/transaction.php");
    }
    else{
     header("Location: ../html pages/dashboardtenant.php");
    }
}

 }
else {
    echo "<script>alert('Check your email and password!')</script>";
    header("Location: ../html pages/LogIn.php");
 
}
mysqli_close($con);
?>