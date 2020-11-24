<?php
session_start();
?>
<?php
$host = "localhost";  
$user = "root";  
$password = '';  
$db_name = "rental house management"; 
$con = mysqli_connect($host, $user, $password, $db_name); 
?>
<?php
if($_SESSION[email]==""){

    header("Location: ../html pages/Login.php");
}
else{
    $sql="SELECT username,house_id,members,contact_no,proof_id FROM tenant where email='$_SESSION[email]'";
    $result= mysqli_query($con,$sql);
    $username="";
    $owneremail="";
    $members="";
    $contact="";    
    $proof="";
    $email="";
    $houseid="";

          if(mysqli_num_rows($result)){
             while($row=mysqli_fetch_assoc($result)){
          $username=$row['username'];
          $members=$row['members'];
          $email=$_SESSION[email];
          $contact=$row['contact_no'];
         $proof=$row['proof_id'];
         $houseid=$row['house_id'];


            }
        }

        $sql12="SELECT email FROM house where house_id='$houseid'";
        $result12= mysqli_query($con,$sql12);
        if(mysqli_num_rows($result12)){
            while($row=mysqli_fetch_assoc($result12)){
           $owneremail=$row['email'];

           }
       }



    if (isset($_POST['upload'])) {       
        $filename = $_FILES["uploadfile"]["name"]; 
        if($filename!=""){
        $tempname = $_FILES["uploadfile"]["tmp_name"];     
            $folder = "..//images/".$filename; 

            move_uploaded_file($tempname, $folder);
            $sql2 = "UPDATE tenant SET pic='$filename' where email='$_SESSION[email]'"; 

            mysqli_query($con, $sql2); 

      }
    }

echo'
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css files/dashboardtenant.css">
    <link rel="stylesheet" href="../css files/clock.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <title>Tenant Dashboard</title>
    <style>
    #profile img{
        box-shadow:0 0 20px 7px orange;
    }
    i{
        margin-right: 15px;
       font-size: 20px;
       
    }

    #editname{
        position:absolute;
        left:20%;
        right:20%;
        top:-500px;
        transition:2s;
        display:none;
         width: 400px;
         height: 400px;
         background-color: rgb(49, 49, 49);
         counter-reset: white;
         margin: 100px auto;
         
     }
     #editname label{
         display: block;
         margin: 20px 0 20px 20px;
         width: 360px;
         /* border: 2px solid green; */
     font-size: 20px;
     color: white;
     font-family: sans-serif;
     
     
     }
     #editname input{
         display: block;
         height: 40px;
         width: 360px;
         margin: 20px 0 20px 20px;
         font-size: 20px;
     }
     #editname img{
         width: 100px;
         height: 100px;
         display: block;
         margin: 10px auto;
         border-radius:50%;
     }
     #editname input[type="submit"]{
         background-color: orangered;
         border:none;
         transition: 0.7s;
     }
     #editname input[type="submit"]:hover{
         transform: scale(0.9);
     }
     #editcontact{
        position:absolute;
        left:20%;
        right:20%;
        top:-500px;
        transition:2s;
        display:none;
         width: 400px;
         height: 400px;
         background-color: rgb(49, 49, 49);
         counter-reset: white;
         margin: 100px auto;
         
     }
     #editcontact label{
         display: block;
         margin: 20px 0 20px 20px;
         width: 360px;
         /* border: 2px solid green; */
     font-size: 20px;
     color: white;
     font-family: sans-serif;
     
     
     }
     #editcontact input{
         display: block;
         height: 40px;
         width: 360px;
         margin: 20px 0 20px 20px;
         font-size: 20px;
     }
     #editcontact img{
         width: 100px;
         height: 100px;
         display: block;
         margin: 10px auto;
         border-radius:50%;
     }
     #editcontact input[type="submit"]{
         background-color: orangered;
         border:none;
         transition: 0.7s;
     }
     #editcontact input[type="submit"]:hover{
         transform: scale(0.9);
     }
.profile{
    height:100%;
}
.complaint button{
    display: block;
    margin-top: 30px;
    margin-left: 50px;
    margin-bottom: 30px;
    width: 100px;
    height: 30px; 
    color: white; 
    border-radius: 15px;
    background-image:linear-gradient(blue,white);
    border: none;
    font-size: 13px;
}
.complaint button:hover{
box-shadow: 0 0 10px 2px green;
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
                    <li><a href="../index.html"><i class="fa fa-home" aria-hidden="true"></i>home</a></li>
                    <li><a href="../php/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>LogOut</a></li>
                    <li>
                        <a href="#"><i class="fa fa-tasks" aria-hidden="true"></i>Services</a>
                        <div class="menu">
                        <ul>
                        <li><a href="#" onclick="transaction()"><i class="fa fa-credit-card" aria-hidden="true"></i>Payment</a></li>
                            <li><a href="#" onclick="dashboard()"><i class="fa fa-tachometer" aria-hidden="true"></i>Dashboard</a></li>
                            
                            <li><a href="#" onclick="profile()"><i class="fa fa-user" aria-hidden="true"></i>profile</a></li>
                           
                            <li><a href="#" onclick="complaint()"><i class="fa fa-building" aria-hidden="true"></i>Complaint</a></li>
                          
                        </ul>
                    </div>
                    </li>
                </ul>
            </div>
          
        </div>
<div class="body">
        <div class="left">';
            $sql = "SELECT pic FROM tenant where email='$_SESSION[email]'";
            $result= mysqli_query($con,$sql);
            
            if(mysqli_num_rows($result)){
            
                while($row=mysqli_fetch_assoc($result)){
                   
                    echo "<img src='../images/".$row['pic']."' >";
                break;
                  echo "<br>";
                }
                }


           echo' <p> <i class="fa fa-user" aria-hidden="true"></i>
              ';
                echo $_SESSION[username];
               echo '
            </p>
            <p><i class="fa fa-phone" aria-hidden="true"></i>';echo $contact; echo '</p>
            <p><i class="fa fa-renren" aria-hidden="true"></i>Tenant</p>
            <time id="time" style="color:white;display:flex;justify-content:center;align-items:center;float:initial;"></time>
        <h3 id="date" style="display:flex;justify-content:center;align-items:center;float:initial;"></h3>

        </div>

        <div class="right dashboard" id="dashboard">
       
             ';
        
        $sql = "SELECT pic FROM house where house_id='$houseid'";
        
        $result= mysqli_query($con,$sql);
        
        if(mysqli_num_rows($result)){
        
            while($row=mysqli_fetch_assoc($result)){
               
                echo "<img  width='75%' height='400px'  
                style='margin: 30px auto;display: block;border-radius: 30px;' src='../images/".$row['pic']."' >";
            break;
              echo "<br>";
            }
            }

        echo '
       
       <section class="section-1">Payment 
        <p style="color: orange;margin: 20px; font-size: 30px;">No Due</p>
       </section>
       <section class="section-1">Complaint
           <p style="color: orange;margin: 20px; font-size: 30px;">1</p>
       </section>
       <section class="section-1">Time ';
       //code for finding duration of tenant
       $joindate="";
       $currentdate=date("Y-m-d");
       $sqdate="SELECT join_house from tenant where email='$_SESSION[email]'";
       $resdate=mysqli_query($con,$sqdate);
       if(mysqli_num_rows($resdate)){

        while($row=mysqli_fetch_assoc($resdate)){
            $joindate=$row['join_house'];
        break;

        }
    }
    $a=date_create($joindate);
$b=date_create($currentdate);
$c=date_diff($a,$b);

       echo' <p style="color: orange;margin: 20px; font-size: 30px;">';
       echo $c->format("%a days");
       echo'</p>';
      echo ' </section>
        </div> 
';
echo'
        <div class="right profile" id="profile" >
            <h1 style="text-align: center;font-size: 30px;margin-top:20px; color:blue;">My Profile</h1>';
      
            $sql1 = "SELECT pic FROM tenant where email='$_SESSION[email]'";
            $result1= mysqli_query($con,$sql1);
            
            if(mysqli_num_rows($result1)){
            
                while($row=mysqli_fetch_assoc($result1)){
                   
                   // echo "<img src='../images/".$row['pic']."' >";
                   echo "<label for='pic' ><img src='../images/".$row['pic']."' style=' cursor: pointer;'></label>";
                break;
                  echo "<br>";
                }
                } 



           echo' <span style="margin:0 auto;display:block;width:400px;margin-bottom:30px;">';
echo '
            <form method="POST" action="../html pages/dashboardtenant.php" enctype="multipart/form-data" style="display:flex;justify-content:center;align-items:center;">
            <input type="file" id="pic" name="uploadfile" value="" style="display:none;">
            <button type="submit" name="upload" style="display:inline-block;margin-top:0">UPLOAD</button> 
            </form>
            </span>';

            echo '
            <label for="name"> <b>Name :  </b><h4 style="color:teal;display:inline-block;margin:0 0 0 15px;">';echo $username;echo ' </h4>
            <span style="margin-left:100px;cursor:pointer;"> <a onclick="editname()">  <i class="fa fa-pencil" aria-hidden="true"></i></a> </span>

            </label>';
          
            echo '
            <label for="name"> <b>EMAIL :  </b><h4 style="color:teal;display:inline-block;margin:0 0 0 15px;">';echo $email;echo ' </h4></label>';
          

            echo '
            <label for="name"> <b>CONTACT :  </b><h4 style="color:teal;display:inline-block;margin:0 0 0 15px;">';echo $contact;echo ' </h4>
            <span style="margin-left:85px;cursor:pointer;"> <a onclick="editcontact()">  <i class="fa fa-pencil" aria-hidden="true"></i></a> </span></label>';
          

            echo '
            <label for="name"> <b>MEMBERS :  </b><h4 style="color:teal;display:inline-block;margin:0 0 0 15px;">';echo $members;echo ' </h4>
          </label>';
          

            echo '
            <label for="name"> <b>PROOF ID :  </b><h4 style="color:teal;display:inline-block;margin:0 0 0 15px;">';echo $proof;echo ' </h4></label>';
          

            echo '
            <label for="name"> <b>Owner Email :  </b><h4 style="color:teal;display:inline-block;margin:0 0 0 15px;">';echo $owneremail;echo ' </h4></label>';
          


echo'
       
        </div>


        <div class="right application" id="complaint" >
        
            <h1 style="text-align: center;font-size: 30px;margin:20px 0 50px 0;color:blue;">Complaints!</h1>
           
                <!-- <h1 style="text-align: center;font-size: 30px;margin-bottom: 50px;">Give your Complaint here</h1> -->
                <label for=""> 
                     To  </label><input type="text" placeholder="Email">
                     <label for=""> 
                     From  </label><input type="text" placeholder="Email">
            
   
                <label for="">
                    Description  </label>
                    <textarea name="descript" id="" cols="80" rows="10"></textarea>
                    <button> Send</button>
            </div>
            
</div>
</div>

<main class="accontainer" id="closeac">
    <a href="#" onclick="closeaccount()" class="cancel"><i class="fa fa-times" aria-hidden="true" style="color:gray;font-size:15px;"></i></a>
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
    <input type="datetime" name="" id="date" placeholder="Expiray date" style="margin-bottom:20px;">
    <input type="number" name="" id="ccv" placeholder="ccv">
    <button>
        next
    </button>
    </form>
       </main>


       <section id="editname">
       <a style="display:block;margin:10px 10px 10px 10px;cursor:pointer;" onclick="close1()"><i class="fa fa-times" aria-hidden="true" style="color:white;font-size:15px;"></i></a>
         
<img src="../images/h4.jpg" alt="">
<h2 style="text-align: center;color:orangered;">Welcome!</h2>

<form action="dashboardtenant.php" method="POST">

<label for="">Name </label>

<input type="text" name="myname" id="" required>

<input type="submit" value="Enter" name="upload">
</form>


       </section>



       
      ';

      echo '
      <section id="editcontact">
      <a style="display:block;margin:10px 10px 10px 10px;cursor:pointer;" onclick="close2()"><i class="fa fa-times" aria-hidden="true" style="color:white;font-size:15px;"></i></a>

<img src="../images/h4.jpg" alt="">
<h2 style="text-align: center;color:orangered;">Welcome!</h2>

<form action="dashboardtenant.php" method="POST">

<label for="">Contact </label>

<input type="text" name="mycontactno" id="" required>

<input type="submit" value="Enter" name="mycontact">
</form>


   </section>
      
      ';



    if(isset($_POST['upload'])){
     

        $host = "localhost";  
        $user = "root";  
      
        $password = '';  
        $db_name = "rental house management";  
          
        $con = mysqli_connect($host, $user, $password, $db_name); 
         
        $myname = $_POST['myname'];
        $sql2 = "UPDATE account SET username='$myname' where email='$email'"; 
        mysqli_query($con, $sql2);
        $sql23 = "UPDATE tenant SET username='$myname' where email='$email'"; 
        mysqli_query($con, $sql23);
    }

    if(isset($_POST['mycontact'])){
     

        $host = "localhost";  
        $user = "root";  
      
        $password = '';  
        $db_name = "rental house management";  
          
        $con = mysqli_connect($host, $user, $password, $db_name); 
         
        $mycontactno = $_POST['mycontactno'];
        $sql2 = "UPDATE tenant SET contact_no='$mycontactno' where email='$email'"; 
        mysqli_query($con, $sql2);
    }
    
        echo '<script>
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
               document.getElementById("closeac").style.display="block";
               document.getElementById("closeac").style.opacity="1";
              
              }
              function editname(){
          
                document.getElementById("blur").style.opacity="0.3";
               var x=document.getElementById("editname");
               x.style.display="block";
               x.style.top="200px";
              
              }
              function close1(){
              
               document.getElementById("blur").style.opacity="1";
               document.getElementById("editname").style.top="-500px";
              
              }
              function editcontact(){
          
                document.getElementById("blur").style.opacity="0.3";
               var y=document.getElementById("editcontact");
               y.style.display="block";
               y.style.top="200px";
              
              }
              function close2(){
              
               document.getElementById("blur").style.opacity="1";
               document.getElementById("editcontact").style.top="-500px";
              
              }
              function closeaccount(){
              
                document.getElementById("blur").style.opacity="1";
                document.getElementById("closeac").style.display="none";
               
               }
        </script>
        <script src="clock.js"></script>
</body>
</html>
';
}
?>