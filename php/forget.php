<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset password</title>
    <link rel="stylesheet" href="../css files/forget.css">
</head>
<body>
<div class="contain">
        <img src="../images/avatar2.png" alt="">

        <form action="forget.php" method="POST">
    <label for="email">Email
        <input type="text" name="email" required>
    </label>

        <label for="password">Password
        <input type="password" name="pass" required>
    </label>

    <input class="LogIn" type="submit" name="upload" value="reset">
   
</form>   
        <?php

if (isset($_POST['upload'])) { 
$host = "localhost";  
$user = "root";  
$password = '';  
$db_name = "rental house management";  
  
$con = mysqli_connect($host, $user, $password, $db_name); 

$email=$_POST['email'];
$password=$_POST['pass'];
$sql="SELECT email FROM account where email='$email'";
$result= mysqli_query($con,$sql);

if(mysqli_num_rows($result)){
   
    $sql1="UPDATE account set password='$password' where email='$email' "; 
    $result1=mysqli_query($con, $sql1);
     echo "<script> alert('pasword is update') </script>";
    
     header("Location: ../html pages/Login.php");


}
else{
    
    echo "<script> alert('Email does not exist') </script>";
}
}

?>  
  

</body>
</html>