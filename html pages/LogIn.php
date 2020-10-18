<?php
session_start();
?>
<?php
if($_SESSION[email]==""){
   
}
else{
    if($_SESSION[hpost]=="Owner"){
        require_once 'dashboardowner.php';
     }
     else{
         require_once 'dashboardtenant.php'; 
     }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css files/Login.css">
    <title>LogIn</title>
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
    width: 500px;
    height: 600px;
    margin-top: 90px;
    /* background-color:rgba(0, 0, 255, 0.4); */
    /* background-color:rgba(12, 11, 11,0.4); */
    background-image: linear-gradient(45deg,rgba(12, 11, 11,0.4),rgba(243, 241, 241,0.4));
    border-radius: 30px 0 30px 0;
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
    /* border:1px solid black; */
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
.LogIn{
   
    background-color:rgba(0, 0, 255, 0);
    color:whitesmoke;
    width:  100px;
    height:40px;
    float: right;
    border-radius: 20px; 
    border:1px solid orange;
    margin:70px 60px 0 0;
    font-size: 15px;
}
.LogIn:hover{
    box-shadow: 0 0 5px 3px wheat;
}
.SignUp{ 
    background-color:rgba(0, 0, 255, 0);
   color:whitesmoke;
   width:  100px;
   height:40px;
   float: left;
   border-radius: 20px; 
   border:1px solid orange;
   margin:70px 0 0 60px;
   font-size: 15px;
}
.SignUp:hover{
    box-shadow: 0 0 5px 3px wheat;
}
.forget{
    clear: both;
    /* border:1px solid orange; */
    width: 170px;
    display: block;
    float: right;
    margin:40px 30px 20px 0;
   
}
.forget::after{
    clear: both;
    content: '';
    display: block;
}
.goog{
    clear: both;
    /* border:1px solid orange; */
    background-color: white;
    color: black;
    width: 300px;
    height: 40px;
    margin:0 auto;
    border-radius: 20px;  
}
p{
    font-family:arial;
              text-align: center;
              line-height: 40px;
}
.goog:hover{
    border:2px solid black;
    background-color: darkorange;
}
       input:focus{
    outline: none;
    background-color:rgba(0, 0, 255, 0);
}
.forget a{
    
    text-decoration: none;
    color: rgb(20, 19, 19);

}
.forget a:hover{
    color: white;
    opacity: 0.7;
}
   </style>
</head>
<body>
    <div class="contain">
        <img src="../images/avatar2.png" alt="">

        <form action="../php/login.php" method="POST" >
    <label for="email">Email
        <input type="text" name="email" required>
    </label>

        <label for="password">Password
        <input type="password" name="pass" required>
    </label>

    <input class="LogIn" type="submit" value="Log In">
   
</form>
<a href="signup.html"><button class="SignUp">SignUp</button></a>
    
<label class="forget"><a href="../php/forget.php"> Forget Password </a></label>
<div class="goog">
    <p>Log In With google</p>
</div>
    </div>

     
</body>
</html>