<?php
session_start();
?>
<?php
if($_SESSION[email]==""){
    include('../html pages/Login.php');
}
else{

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
                            <li><a href="../html pages/owner.html">Apartment</a></li>
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
            <p>659898645</p>
            <p>Owner</p>
            <p>customers: 3</p>

        </div>
        ';

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

echo '
        <div class=" right profile" id="profile" >
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
  

        <div class=" right application" id="complaint" >
        
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

';
echo '
<div class="right dashboard" id="dashboard">
            <h2 style="text-align: center;color: white;margin: 20px 0;">My Homes</h2>
        <table>
            <tr >
                <td width="250px" rowspan="3" ><img src="../images/h5.jpg" ></td>

            
              <tr><td style="color: rgb(86, 14, 219);">
               
                 <h3 style="color: black;">Specification:</h3>  
                 <p>3BHK </p>   
                <p>Address: sant nagar near pushpanjali</p>   
                 <p> Mathura ,up</p>
                     
                     <p>  Ac rooms</p>
                     <h3 style="margin-top:10px;">Available now</h3>
  
                </td>
               
             </tr>
         
               <tr >
                 <td class="cn1" style="float: left; color: black; padding:5px 5px 5px 20px;margin-top:5px;">
                     contact no. 985632752
                        </td>
                   <td  class="buy" style="float: right;">
                  Buy
               </td>
               <td class="cn" style="float: right;">
                Rent 4000/- 
              </td>
             </tr>
             
            </tr>
        </table>
        <table>
            <tr >
                <td width="250px" rowspan="3" ><img src="../images/h5.jpg" ></td>

            
              <tr><td style="color: rgb(86, 14, 219);">
               
                 <h3 style="color: black;">Specification:</h3>  
                 <p>3BHK </p>   
                <p>Address: sant nagar near pushpanjali</p>   
                 <p> Mathura ,up</p>
                     
                     <p>  Ac rooms</p>
                     <h3 style="margin-top:10px;">Available now</h3>
  
                </td>
               
             </tr>
         
               <tr >
                 <td class="cn1" style="float: left; color: black; padding:5px 5px 5px 20px;margin-top:5px;">
                     contact no. 985632752
                        </td>
                   <td  class="buy" style="float: right;">
                  Buy
               </td>
               <td class="cn" style="float: right;">
                Rent 4000/- 
              </td>
             </tr>
             
            </tr>
        </table>
        <table>
            <tr >
                <td width="250px" rowspan="3" ><img src="../images/h5.jpg" ></td>

            
              <tr><td style="color: rgb(86, 14, 219);">
               
                 <h3 style="color: black;">Specification:</h3>  
                 <p>3BHK </p>   
                <p>Address: sant nagar near pushpanjali</p>   
                 <p> Mathura ,up</p>
                     
                     <p>  Ac rooms</p>
                     <h3 style="margin-top:10px;">Available now</h3>
  
                </td>
               
             </tr>
         
               <tr >
                 <td class="cn1" style="float: left; color: black; padding:5px 5px 5px 20px;margin-top:5px;">
                     contact no. 985632752
                        </td>
                   <td  class="buy" style="float: right;">
                  Buy
               </td>
               <td class="cn" style="float: right;">
                Rent 4000/- 
              </td>
             </tr>
             
            </tr>
        </table>
        <table>
            <tr >
                <td width="250px" rowspan="3" ><img src="../images/h5.jpg" ></td>

            
              <tr><td style="color: rgb(86, 14, 219);">
               
                 <h3 style="color: black;">Specification:</h3>  
                 <p>3BHK </p>   
                <p>Address: sant nagar near pushpanjali</p>   
                 <p> Mathura ,up</p>
                     
                     <p>  Ac rooms</p>
                     <h3 style="margin-top:10px;">Available now</h3>
  
                </td>
               
             </tr>
         
               <tr >
                 <td class="cn1" style="float: left; color: black; padding:5px 5px 5px 20px;margin-top:5px;">
                     contact no. 985632752
                        </td>
                   <td  class="buy" style="float: right;">
                  Buy
               </td>
               <td class="cn" style="float: right;">
                Rent 4000/- 
              </td>
             </tr>
             
            </tr>
        </table>
    </div>
    </div>
    ';
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
    </script>
</div>
</body>
</html>
';
}
?>