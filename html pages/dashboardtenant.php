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
    //include('../html pages/Login.php');
    header("Location: ../html pages/Login.php");
}
else{


    if (isset($_POST['upload'])) { 
              
        $filename = $_FILES["uploadfile"]["name"]; 
        $tempname = $_FILES["uploadfile"]["tmp_name"];     
            $folder = "..//images/".$filename; 
              
      
        
            $sql2 = "UPDATE tenant SET pic='$filename' where email='$_SESSION[email]'"; 
      
            // Execute query 
            mysqli_query($con, $sql2); 
              
            // Now let's move the uploaded image into the folder: image 
            if (move_uploaded_file($tempname, $folder))  { 
           
            }else{ 
           
          } 
      }

echo'
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css files/dashboardtenant.css">
    <title>Tenant Dashboard</title>

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
        <div class="left">';
            // <img src="../images/avatar2.png" alt="">


            $sql = "SELECT pic FROM tenant where email='$_SESSION[email]'";
            $result= mysqli_query($con,$sql);
            
            if(mysqli_num_rows($result)){
            
                while($row=mysqli_fetch_assoc($result)){
                   
                    echo "<img src='../images/".$row['pic']."' >";
                break;
                  echo "<br>";
                }
                }


           echo' <p>
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


';
echo'



        <div class="right profile" id="profile" >
            <h1 style="text-align: center;font-size: 30px;">Profile</h1>';
            // <img src="../images/avatar2.png" alt="">


          


            $sql1 = "SELECT pic FROM tenant where email='$_SESSION[email]'";
            $result1= mysqli_query($con,$sql1);
            
            if(mysqli_num_rows($result1)){
            
                while($row=mysqli_fetch_assoc($result1)){
                   
                    echo "<img src='../images/".$row['pic']."' >";
                break;
                  echo "<br>";
                }
                } 



           echo' <span style="margin:0 auto;display:block;width:400px;margin-bottom:30px;">
            <label for="pic" style="display:inline-block;" class="pic">Select</label>
            <form method="POST" action="../html pages/dashboardtenant.php" enctype="multipart/form-data" style="display:inline-block;">
            <input type="file" id="pic" name="uploadfile" value="" style="display:none;">
            <button type="submit" name="upload" style="display:inline-block;">UPLOAD</button> 
            </form>
            </span>';

            $sql="SELECT username,owner_email,members,contact_no,Proof_id FROM tenant where email='$_SESSION[email]'";
            $result= mysqli_query($con,$sql);
            $username="";
            $owneremail="";
            $members="";
            $contact="";    
            $proof="";

                  if(mysqli_num_rows($result)){
                     while($row=mysqli_fetch_assoc($result)){
 $username=$row['username'];
$members=$row['members'];
 $email=$_SESSION[email];
 $contact=$row['contact_no'];
 $proof=$row['proof_id'];
 $owneremail=$row['owner_email'];

                    }
                }



 

           echo'
            <label for="name">Name</label>
<input type="text" value='; echo $username; echo $username ;echo'>

<label for="email">Email</label>
 <input type="text" readonly value='; echo $email; echo'>

<label for="contact">Contact</label>
<input type="text" value='; echo $contact; echo'>

<label for="">Members</label>
<input type="text" readonly value='; echo $members; echo'>

<label for="">ProofID</label>
<input type="text" readonly value='; echo $proof; echo $proof ;echo'>

<label for="">Owner Email</label>
<input type="text" readonly value='; echo $owneremail; echo'>
';

echo'
       
        </div>


        <div class="right application" id="complaint" >
        
            <h1 style="text-align: center;font-size: 30px;margin-bottom: 50px;">Complaint!</h1>
           
                <!-- <h1 style="text-align: center;font-size: 30px;margin-bottom: 50px;">Give your Complaint here</h1> -->
                <label for=""> 
                     To  </label><input type="text" placeholder="Email">
                     <label for=""> 
                     From  </label><input type="text" placeholder="Email">
            
   
                <label for="">
                    Description  </label>
                    <textarea name="descript" id="" cols="80" rows="10"></textarea>
                    
               
                
    
    
    
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