<?php
session_start();
?>
<?php
$host = "localhost";  
$user = "root";  
$password = '';  
$db_name = "rental house management";  
  
$con = mysqli_connect($host, $user, $password, $db_name);  
//include('connection.php'); 
?>
<?php
if($_SESSION[email]==""){
    header("Location: Login.php");
}
else{  
    
    //for profile information
    $sqlp="SELECT firstname,lastname,address,phone,gender,country_code FROM owner where email='$_SESSION[email]'";
    $result= mysqli_query($con,$sqlp);
     $fname="";
     $lname="";
     $email="";
     $address="";
     $contact="";     

         if(mysqli_num_rows($result)){
            while($row=mysqli_fetch_assoc($result)){
$fname=$row['firstname'];
$lname=$row['lastname'];
$email="abc";
$address=$row['address'];
$contact=$row['phone'];


            }

        } 
        //complete profile information
echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css files/dashboardowner.css">
    <title>Owner DashBoard</title>
    
</head>
<body>
    <div class="container">
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
                            <li><a href="#bill">Billing</a></li>
                            <li><a href="#" onclick="dashboard()">DashBoard</a></li>
                            <li><a href="#" onclick="tenant()">MyTenant</a></li>
                            <li><a href="#" onclick="profile()">profile</a></li>
                            <li><a href="owner.html">Apartment</a></li>
                            <li><a href="#" onclick="complaint()">Complaint</a></li>
                            <li><a href="#">Details</a></li>
                        </ul>
                    </div>
                    </li>
                </ul>
            </div>
          
        </div>
        ';
        echo '
<div class="body">
        <div class="side left">
            <img src="../images/avatar2.png" alt="">
            <p>';
               
                echo $_SESSION[username];
              
         
                echo'   </p>
            <p>
            659898645
            </p>
            <p>Owner</p>
            <p>customers:
             3
             </p>

        </div>
        ';


        //tenants of owner
        echo '       
        <div class="right tenant" id="tenant" >
<p style="text-align: center;font-size: 70px;margin-bottom: 30px;color:rgb(231, 113, 17);border-bottom: 3px solid rgba(209, 209, 200,0.5);">My Tenant</p>
<div class="card">
    <img src="../images/h4.jpg" alt="">
    <p style="text-align: center;font-size: 30px; color: white;margin-bottom: 15px;">Name</p>
    <p style="text-align: center;font-size: 20px;opacity: 0.7;">Email</p>
    <p style="text-align: center;font-size: 20px;opacity: 0.7;">Due 2500/-</p>
</div>
<div class="card">
    <img src="../images/h3.jpg" alt="">
    <p style="text-align: center;font-size: 30px;color: white;margin-bottom: 15px;">Name</p>
    <p style="text-align: center;font-size: 20px;opacity: 0.7;">Email</p>
    <p style="text-align: center;font-size: 20px;opacity: 0.7;">Due 2500/-</p>
</div>
<div class="card">
    <img src="../images/h2.jpg" alt="">
    <p style="text-align: center;font-size: 30px;color: white;margin-bottom: 15px;">Name</p>
    <p style="text-align: center;font-size: 20px;opacity: 0.7;">Email</p>
    <p style="text-align: center;font-size: 20px;opacity: 0.7;">Due 2500/-</p>
</div>
<div class="card">
    <img src="../images/h.jpg" alt="">
    <p style="text-align: center;font-size: 30px;color: white;margin-bottom: 15px;">Name</p>
    <p style="text-align: center;font-size: 20px;opacity: 0.7;">Email</p>
    <p style="text-align: center;font-size: 20px;opacity: 0.7;">Due 2500/-</p>
</div>
<div class="card">
    <img src="../images/h4.jpg" alt="">
    <p style="text-align: center;font-size: 30px;color: white;margin-bottom: 15px;">Name</p>
    <p style="text-align: center;font-size: 20px;opacity: 0.7;">Email</p>
    <p style="text-align: center;font-size: 20px;opacity: 0.7;">Due 2500/-</p>
</div>
<div class="card">
    <img src="../images/h4.jpg" alt="">
    <p style="text-align: center;font-size: 30px;color: white;margin-bottom: 15px;">Name</p>
    <p style="text-align: center;font-size: 20px;opacity: 0.7;">Email</p>
    <p style="text-align: center;font-size: 20px;opacity: 0.7;">Due 2500/-</p>
</div>


        </div>
        ';
        //complete

        //for change bydefault pic in profile
        if (isset($_POST['upload'])) { 
              
            $filename = $_FILES["uploadfile"]["name"]; 
            $tempname = $_FILES["uploadfile"]["tmp_name"];     
                $folder = "..//images/".$filename; 
                  
          
            
                $sql2 = "UPDATE owner SET pic='$filename' where email='$_SESSION[email]'"; 
          
                // Execute query 
                mysqli_query($con, $sql2); 
                  
                // Now let's move the uploaded image into the folder: image 
                if (move_uploaded_file($tempname, $folder))  { 
               
                }else{ 
               
              } 
          }
          //complete pic 

echo '
        <div class=" right profile" id="profile" style="height:100vh;">
            <h1 style="text-align: center;font-size: 30px;">Profile</h1>';
           // <img src="../images/avatar2.png" alt="">
            

            $sql = "SELECT pic FROM owner where email='$_SESSION[email]'";
$result= mysqli_query($con,$sql);

if(mysqli_num_rows($result)){

    while($row=mysqli_fetch_assoc($result)){
       
        echo "<img src='../images/".$row['pic']."' >";
    break;
      echo "<br>";
    }
    }

           
echo'
            <span style="margin:0 auto;display:block;width:400px;margin-bottom:30px;">
            <label for="pic" style="display:inline-block;" class="pic">Select</label>
            <form method="POST" action="../html pages/dashboardowner.php" enctype="multipart/form-data" style="display:inline-block;">
            <input type="file" id="pic" name="uploadfile" value="" style="display:none;">
            <button type="submit" name="upload" style="display:inline-block;">UPLOAD</button> 
            </form>
            </span>
            ';

           
           
          
 


               

            echo '
            <label for="name">Name</label>
<input type="text" value='; echo $fname; echo $lname; echo'>

<label for="email">Email</label>
 <input type="text" readonly value='; echo $email; echo'>

<label for="contact">Contact</label>
<input type="text" value='; echo $contact; echo'>

<label for="profession">Profession</label>
<input type="text" value='; echo "Owner"; echo'>



       
        </div>
  

        <div class=" right application" id="complaint" >
        
            <h1 style="text-align: center;font-size: 30px;margin-bottom: 50px;">Complaint!</h1>
           
                <!-- <h1 style="text-align: center;font-size: 30px;margin-bottom: 50px;">Give your Complaint here</h1> -->
                <label for="">
                     To
                     </label>
                     <input type="text" placeholder="Email">
               
   
                <label for="">
                    Description </label>
                    <textarea name="descript" id="" cols="80" rows="10"></textarea>
                    
               
                <!-- <textarea name="descript" id="" cols="80" rows="10"></textarea> -->
    
    
    
            </div>

';



echo '
<div class="right dashboard" id="dashboard">
            <h2 style="text-align: center;color: white;margin: 20px 0;">My Homes</h2>
           
            <h2 style="text-align: center;color: white;margin: 20px 0;">';echo $_SESSION[email] ;echo '</h2>'
            ;
            echo '<h2 style="text-align: center;color: white;margin: 20px 0;">'; echo "hello ";
            echo $email; 
            echo '</h2>';
           
            $sql="SELECT status,city,rooms,acrooms,address,contact,room_type,cost FROM house where email='$_SESSION[email]'";
            $result= mysqli_query($con,$sql);
                 
                 if(mysqli_num_rows($result)){
                    while($row=mysqli_fetch_assoc($result)){
echo'
                        <table>
                        <tr >
                            <td width="250px" rowspan="3" ><img src="../images/h5.jpg" ></td>
            
                        
                          <tr><td style="color: rgb(86, 14, 219);">
                           
                             <h3 style="color: black;">Specification:</h3>  
                             <p>';
                            echo $row['rooms']; 
                             echo '</p>   
                            <p>Address: ';

                            echo $row['address'];
                           echo '</p>   
                             <p>';
                              echo $row['city'];
                              echo ' ,up</p>
                                 
                                 <p>
                                   Ac rooms: ';
                                   echo $row['acrooms'];
                                   echo '</p>
                                 <h3 style="margin-top:10px;">';
                                 echo $row['status'];
                                 echo'</h3>
              
                            </td>
                           
                         </tr>
                     
                           <tr >
                             <td class="cn1" style="float: left; color: black; padding:5px 5px 5px 20px;margin-top:5px;">
                                 Contact No: ';
                                  echo $row['contact'];
                                    echo '</td>
                               <td  class="buy" style="float: right;">
                              Remove
                           </td>
                           <td class="cn" style="float: right;">
                            Rent ';
                            echo $row['cost'];
                            echo '/- 
                          </td>
                         </tr>
                         
                        </tr>
                    </table>

';
                        
                    }
                }
 
    echo '
    <script>
        function profile(){
            document.getElementById("dashboard").style.display="none";
            document.getElementById("complaint").style.display="none";
            document.getElementById("tenant").style.display="none";
            document.getElementById("profile").style.display="block";
        }
        function tenant(){
            document.getElementById("dashboard").style.display="none";
            document.getElementById("complaint").style.display="none";
            document.getElementById("profile").style.display="none";
            document.getElementById("tenant").style.display="block";
        }
        function complaint(){
            document.getElementById("dashboard").style.display="none";
            document.getElementById("profile").style.display="none";
            document.getElementById("tenant").style.display="none";
            document.getElementById("complaint").style.display="block";
            
        }
        function dashboard(){
            document.getElementById("profile").style.display="none";
            document.getElementById("tenant").style.display="none";
            document.getElementById("complaint").style.display="none";
            document.getElementById("dashboard").style.display="block";
        }
        function photo1(){
           
        }
     
    </script>
</div>
</body>
</html>
';
}
?>