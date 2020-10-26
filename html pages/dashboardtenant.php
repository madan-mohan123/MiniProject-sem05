<?php
session_start();
?>
<?php
if($_SESSION[email]==""){
    include('../html pages/Login.php');
}
else{

echo'
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenant Dashboard</title>
    <style>
        *{
            padding: 0;
            margin: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
        }
        body{
            /* background-color: red; */
            /* background-color:rgb(173, 6, 89); */
            background-image: linear-gradient(orange,blue,teal);
        }
        .container{
            width: 100%;
            height: 100vh;;
        }
        .header{
            background-color: rgba(51, 49, 49,0.8);
            height: 80px;
            padding: 0 20px;
            
        }
        .nav{
            float: right;
        }
        .nav ul li{
            list-style: none;
            display: inline-block;
            line-height: 80px;
        }
        .nav ul li a{
            text-decoration: none;
            font-size: 17px;
            color: white;
            padding: 10px 20px;
            border-radius: 10px;
            text-transform: uppercase;
            transition: 0.5s;
            margin-left: 5px;
    margin-right: 5px;
        }
        .nav ul li a:hover{
            background-image: linear-gradient(red,teal);
box-shadow: 0 2px 10px 5px rgb(0, 255, 213);
position: relative;
top:-5px;
color:rgb(7, 5, 12);
        }
        .nav ul li:hover .menu{
            display: block;
            
        }
       
        .header img{
            border-radius: 20px 0 20px 0;
            width:130px;
             height:90px;
             padding-top: 5px;
             float:left;
           
        }
        .header p{
            
            display: inline-block;
            line-height: 80px;
            margin-left: 50px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 20px;
            color:rgb(209, 209, 200);
        }
        .menu{
            position:absolute;
            right: 0;
            top:80px;
            width: 170px;
           display: none;
           background-image: linear-gradient(skyblue,pink);
        }
        
        .menu ul li{
            display: block;
            height: 40px;
            line-height: 40px;
            
            
            
        }
        .menu ul li a{  
            font-size: 16px;
            color: white;
            padding: 7px 20px;
            border-radius: 0px;
            transition: 0.5s;    
        }
        .menu ul li a:hover{    
        border-left:5px solid White;
        color: white;
    
        }
        .body{
            clear: both;
            margin-top:20px;
            width: 100%;
            height: 100%;
            border-top:5px solid black;

        }
        .body .left{
            width: 20%;
            background-color: rgb(51, 49, 49);
            color: white;
            /* margin-top: 30px; */
            height: 100%;
            padding-top: 20px;
            padding-left: 20px;
            padding-right: 20px;
           float: left;
        }
        .left img{
            width: 100px;
            height: 100px;
            border-radius: 100%;
            display: block;
            margin: 20px auto;
           
        }
        .left p{
            border-bottom: 4px solid rgba(209, 209, 200,0.5);
            padding-bottom: 20px;
            margin-bottom: 20px;
        }
       
.dashboard{
    width: 80%;
          
          float: left; 
          /* background-color: white;  */
}
        .dashboard .section-1{
            padding: 20px;
            width: 200px;
            height: 200px;
            margin-top: 40px;
            margin-left: 120px;
            float: left;
border-radius: 50%;
background-color: white;
display: flex;
justify-content: center;
align-items: center;
font-size: 25px;
transition: 0.9s;
        }
        .dashboard  .section-1:hover{
            background-color: rgb(216, 147, 18);
            transform: rotate(360deg);
        }


        .profile{
    float: left;
    width:80%;

    background-color: white;
    display: none;
}


.profile img{
    display: block;
    /* clear: both; */
    width: 150px;
    height: 150px;
    border-radius: 50%;
    margin: 20px auto;
    margin-bottom: 40px;
}
.profile label{
    display: inline-block;
    padding-right: 20px;
    margin-right: 40px;
    margin-bottom: 30px;
    margin-left: 50px;
    /* float: left; */
}
.profile input{
    display: inline-block;
    margin-right: 300px; 
    margin-bottom: 30px;
    margin-left: 30px;
    width: 400px;
    height: 30px;
    /* border:hidden; */
   
}


.application{
    display: none;
    float: left;
    width:80%;
    /* margin-left: 20px; */
    /* height: 100%; */
    background-color: white;
    height: 100%;
}



.application label{
    display: block;
    padding-right: 20px;
    margin-right: 40px;
    margin-bottom: 30px;
    margin-left: 50px;
    /* float: left; */
}
.application input{
    display: inline-block;
    margin-right: 300px; 
    margin-bottom: 30px;
    margin-left: 30px;
    width: 400px;
    height: 30px;
  
   
}
.application textarea{
    display: inline-block;
}
     
        </style>
</head>
<body>
    <div class="container" id="blur">
        <div class="header">
            <img src="../images/h.jpg"  alt="">
            <p>House <span style="color: gray; opacity: 0.7;font-size:30px;">Management</span></p>
            <div class="nav">
                <ul>
                    <li><a href="../index.html">home</a></li>
                    <li><a href="../php/logout.php">LogOut</a></li>
                    <li>
                        <a href="#">Services</a>
                        <div class="menu">
                        <ul>
                        <li><a href="#" onclick="transaction()">Payment</a></li>
                            <li><a href="#" onclick="dashboard()">DashBoard</a></li>
                            
                            <li><a href="#" onclick="profile()">profile</a></li>
                            <li><a href="#">Change</a></li>
                            <li><a href="#" onclick="complaint()">Complaint</a></li>
                          
                        </ul>
                    </div>
                    </li>
                </ul>
            </div>
          
        </div>
<div class="body">
        <div class="left">
            <img src="../images/avatar2.png" alt="">
            <p>
              ';
                echo $_SESSION[username];
               echo '
            </p>
            <p>659898645</p>
            <p>Tenant</p>

        </div>

        <div class="right dashboard" id="dashboard">
        <img src="../images/h4.jpg" width="75%" height="400px" alt="" 
        style="margin: 30px auto;display: block;border-radius: 30px;">
       <section class="section-1">Payment 
        <p style="color: orange;margin: 20px; font-size: 30px;">No Due</p>
       </section>
       <section class="section-1">Complaint
           <p style="color: orange;margin: 20px; font-size: 30px;">1</p>
       </section>
       <section class="section-1">Month
        <p style="color: orange;margin: 20px; font-size: 30px;">08</p>
       </section>
        </div> 


        <div class="right profile" id="profile" >
            <h1 style="text-align: center;font-size: 30px;">Profile</h1>
            <img src="../images/avatar2.png" alt="">
            <label for="name">Name
<input type="text">
</label>
<label for="email">Email
 <input type="text">
</label>
<label for="contact">contact
<input type="text">
</label>
<label for="profession">Profession
<input type="text">
</label>
<h1 style="text-align: center;font-size: 30px;margin-bottom: 50px;">Account detail</h1>
<label for="profession">Account
    <input type="text">
    </label>
    <label for="profession">Bank
        <input type="text">
        </label>
        </div>


        <div class="right application" id="complaint" >
        
            <h1 style="text-align: center;font-size: 30px;margin-bottom: 50px;">Complaint!</h1>
           
                <!-- <h1 style="text-align: center;font-size: 30px;margin-bottom: 50px;">Give your Complaint here</h1> -->
                <label for="">
                     To<input type="text" placeholder="Email">
                </label>
   
                <label for="">
                    Description
                    <textarea name="descript" id="" cols="80" rows="10"></textarea>
                    
               </label>
                <!-- <textarea name="descript" id="" cols="80" rows="10"></textarea> -->
    
    
    
            </div>
            
</div>
</div>

<main class="accontainer" id="close">
    <a href="#"><i class="cancel" onclick="close1()">n</i></a>
    <h2 style="text-align: center;margin: 0 20px 20px 20px; clear: both;">Choose your Transaction</h2>
    <section class="image">
    <img src="../images/sbi.jpg" alt="">
    <img src="../images/hdfc.jpg" alt="">
    <img src="../images/paytm.jpg" alt="">
    </section>
    
           <form action="">
               <label for="credit">
               <input type="radio" name="info" id="credit">
               Credit cart
               </label>
               <label for="debit">
               <input type="radio" name="info" id="debit">
               Debit card
               </label>
               <label for="net">
               <input type="radio" name="info" id="net">
              Net Banking
               </label>
    
    <input type="number" name="" id="acount" placeholder="Account number">
    <input type="datetime" name="" id="date" placeholder="Expiray date">
    <input type="number" name="" id="ccv" placeholder="ccv">
    <button>
        next
    </button>
    </form>
       </main>

        <script>
            function profile(){
                document.getElementById("dashboard").style.display="none";
                document.getElementById("complaint").style.display="none";
            
                document.getElementById("profile").style.display="block";
            }
          
            function complaint(){
                document.getElementById("dashboard").style.display="none";
                document.getElementById("profile").style.display="none";
               
                document.getElementById("complaint").style.display="block";
                
            }
            function dashboard(){
                document.getElementById("profile").style.display="none";
               
                document.getElementById("complaint").style.display="none";
                document.getElementById("dashboard").style.display="block";
            }
            function close1(){
                document.getElementById("blur").style.opacity="1";
             document.getElementById("close").style.display="none";
          }
            function transaction(){
          
                document.getElementById("blur").style.opacity="0.3";
               document.getElementById("close").style.display="block";
               document.getElementById("close").style.opacity="1";
              
              }
        </script>
</body>
</html>
';
}
?>