<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Reset password</title>
    <style>
        *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body{
    background-image: url(../../MiniProject-sem05/images/h4.jpg);
    background-repeat: no-repeat;
    background-size: cover;
}
.contain{
    margin: 0 auto;
    width: 450px;
    height: 500px;
    margin-top: 90px;
    
    background-color:rgba(12, 11, 11,0.4);
    border-radius: 30px 0 30px 0;
}
form{
    width: 450px;
 
    /* border:3px solid green; */
}
img{
    position: relative;
    top:-30px;
    width: 80px;
    height: 80px;
    border-radius: 50%;
    display: block;
    margin: 0 auto;
    margin-bottom: 40px;
}
label{
    display: block;
    width:70%;
    margin: 0 auto;
   
    color:whitesmoke;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 20px;   
}
input{
   
    display: block;
    margin-bottom: 25px;
    margin-top: 15px;
    border:hidden;
    width: 100%;
    height: 40px;
    background-color:rgba(0, 0, 255, 0);
    border-bottom: 2px solid rgba(231, 219, 219,0.5);
    font-size: 20px;
    color: rgba(255,255,255,0.8);
}
input[type="submit"]{
    position:relative;
    display: block;
top:50px;
    width: 70%;
    margin:auto;
    height: 40px;
   border-radius:30px;
    background-color:rgba(0, 0, 255, 0);
    border:2px solid black;
    font-size: 20px;
    color: rgba(255,255,255,0.8);   
}
input[type="submit"]:hover{
    box-shadow:0 0 10px 7px white;
    transform:scale(1.1);
}


       input:focus{
    outline: none;
    background-color:rgba(0, 0, 255, 0);
}
    </style>
</head>
<body>
<div class="contain">
        <img src="../images/avatar2.png" alt="">

        <form action="forget.php" method="POST" >
    <label for="email">Email
        <input type="text" name="email" required>
    </label>

        <label for="password">Password
        <input type="password" name="pass" required>
    </label>

    <input class="LogIn" type="submit" onclick="reset1()" value="reset">
   
</form>
<script>
    function reset1(){
        <?php
include('connection.php');
$email=$_POST['email'];
$password=$_POST['pass'];
$sql="SELECT email FROM account where email='$email'";
$result= mysqli_query($con,$sql);

if(mysqli_num_rows($result)){
   
    $sql1="UPDATE account set password='$password' WHERE email='$email' ";  
echo "<script> alert('pasword is update') </script>";


}
else{
    
    echo "<script> alert('Email does not exist') </script>";
}
?>  
    }
</script>  

</body>
</html>