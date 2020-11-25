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
     $k=0;    

         if(mysqli_num_rows($result)){
            while($row=mysqli_fetch_assoc($result)){
            $fname=$row['firstname'];
            $lname=$row['lastname'];
            $email="$_SESSION[email]";
            $address=$row['address'];
            $contact=$row['phone'];
            
            }
        } 

        //complete profile information
        //Tenant inforamtion
        $houseidarray=array();
        $picarray=array();
        $count=0;
        $sql12="SELECT house_id,pic FROM house where email='$_SESSION[email]'";
        $result12= mysqli_query($con,$sql12);
        if(mysqli_num_rows($result12)){
            while($row=mysqli_fetch_assoc($result12)){
         $houseidarray[$count]=$row['house_id'];
         $picarray[$count]=$row['pic'];
         $count++;
            }
        } 

        $count1=0;
        $aremail=array();
        $arusername=array();
        $armembers=array();
        $arcontact=array();
        $arpic=array();

     foreach($houseidarray as $value){
        $sql112="SELECT email,username,members,contact_no FROM tenant where house_id='$value'";
        $result112= mysqli_query($con,$sql112);
        if(mysqli_num_rows($result112)){
            while($row=mysqli_fetch_assoc($result112)){
                $aremail[$count1]=$row['email'];
                $arcontact[$count1]=$row['contact_no'];
                $arusername[$count1]=$row['username'];
                $armembers[$count1]=$row['members'];
                $arpic[$count1]=$value;
              
                $count1++;
         
            }
        }    
     }  
        //for changing pic
        if (isset($_POST['upload'])) {   
            $filename = $_FILES["uploadfile"]["name"]; 
            if($filename!=""){
            $tempname = $_FILES["uploadfile"]["tmp_name"];     
                $folder = "..//images/".$filename; 
                
                //move image into folder
                move_uploaded_file($tempname, $folder);
                $sql2 = "UPDATE owner SET pic='$filename' where email='$_SESSION[email]'"; 

                mysqli_query($con, $sql2); 
          }
        }

echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css files/dashboardowner.css">
    <link rel="stylesheet" href="../css files/clock.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <title>Owner DashBoard</title>
    <style>
    #profile img{
        box-shadow:0 0 20px 7px orange;
    }
    i{
        margin-right: 10px;
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
#complaint{
    border-left:10px solid orange;
    min-height:100%;
    height:auto;
    }
.notification{

}
.notification ul{
    list-style:none;
    margin-left:20px;
  
    margin-bottom:20px;
    border-bottom:2px solid gray;
}
.notification ul li p{
   margin-bottom:5px;
}


   
    </style>
</head>
<body>
    <div class="container">
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
                           
                            <li><a href="#" onclick="dashboard()"><i class="fa fa-tachometer" aria-hidden="true"></i>Dashboard</a></li>
                            <li><a href="#" onclick="tenant()"><i class="fa fa-renren" aria-hidden="true"></i></i>Tenant</a></li>
                            <li><a href="#" onclick="profile()"><i class="fa fa-user" aria-hidden="true"></i>profile</a></li>
                            <li><a href="owner.html"><i class="fa fa-building" aria-hidden="true"></i>Apartment</a></li>
                            <li><a href="#" onclick="complaint()"><i class="fa fa-wrench" aria-hidden="true"></i>Messages</a></li>
                            <!--<li><a href="#">Details</a></li>-->
                        </ul>
                    </div>
                    </li>
                </ul>
            </div>
          
        </div>
        ';


        //Body start from here
echo '
<div class="body">
        <div class="side left">';
        $sql = "SELECT pic FROM owner where email='$_SESSION[email]'";
            $result= mysqli_query($con,$sql);

           if(mysqli_num_rows($result)){

        while($row=mysqli_fetch_assoc($result)){
        echo "<img src='../images/".$row['pic']."' >";
        break;
      echo "<br>";
    }
    }

            echo'<p><i class="fa fa-user" aria-hidden="true"></i>';echo $_SESSION[username];
             echo '</p>
            <p><i class="fa fa-phone" aria-hidden="true"></i>';
            echo $contact;
            echo'
            </p>
            <p><i class="fa fa-renren" aria-hidden="true"></i>Owner</p>
            <p>Tenants : ';
             echo count($armembers);
             echo '
             </p>
        </div>
        ';

        // List of Tenants of owner
        echo '       
        <div class="right tenant" id="tenant" >
<p style="text-align: center;font-size: 70px;margin-bottom: 30px;color:rgb(231, 113, 17);border-bottom: 3px solid rgba(209, 209, 200,0.5);">My Tenant</p>
';

for($i=0 ;$i<count($armembers);$i++){

echo'
<div class="card">';
 
    $sql = "SELECT pic FROM house where house_id='$arpic[$i]'";
    $result= mysqli_query($con,$sql);

   if(mysqli_num_rows($result)){

while($row=mysqli_fetch_assoc($result)){
echo "<img src='../images/".$row['pic']."' >";
break;
echo "<br>";
}
}  
    echo '<p style="text-align: center;font-size: 15px; color: white;margin-bottom: 10px;">Name : ';
    echo $arusername[$i];
    echo '</p>
    <p style="text-align: center;font-size: 15px;opacity: 0.7;margin-bottom: 10px;">Email : ';
    echo $aremail[$i];
    echo '</p>
    <p style="text-align: center;font-size: 15px;opacity: 0.7;margin-bottom: 10px;">Contact : ';
    echo $arcontact[$i];
    echo '</p>
    <p style="text-align: center;font-size: 15px;opacity: 0.7;margin-bottom: 10px;">Members : ';
    echo $armembers[$i];
    echo '</p>   
</div>';
}



echo '   </div>        
        <div class=" right profile" id="profile" style="height:100vh;">
            <h1 style="text-align: center;font-size: 30px;margin-top:20px;color:blue;">My Profile</h1>';

        //changin pic
            $sql = "SELECT pic FROM owner where email='$_SESSION[email]'";
            $result= mysqli_query($con,$sql);

           if(mysqli_num_rows($result)){

        while($row=mysqli_fetch_assoc($result)){
        echo "<label for='pic' ><img src='../images/".$row['pic']."' style=' cursor: pointer;'></label>";
        break;
      echo "<br>";
    }
    }

           
echo'
            <span style="margin:0 auto;display:block;width:400px;margin-bottom:30px;">';

            echo '<form method="POST" action="../html pages/dashboardowner.php" enctype="multipart/form-data" style="display:flex;justify-content:center;align-items:center;">
            <input type="file" id="pic" name="uploadfile" value="" style="display:none;">
            <button type="submit" name="upload" style="display:inline-block;margin-top:0">UPLOAD</button> 
            </form>
            </span>
            ';

            $name=$fname." ".$lname;
            
            echo '
            <label for="name"> <b>Name :  </b><h4 style="color:teal;display:inline-block;margin:0 0 0 15px;">';echo $name;echo ' </h4>
            <span style="margin-left:100px;cursor:pointer;"> <a onclick="editname()"> <i class="fa fa-pencil" aria-hidden="true"></i></a> </span>
            </label>';
          

           echo ' <label for="name"> <b>Email :  </b><h4 style="color:teal;display:inline-block;margin:0 0 0 15px;">';echo $email;echo ' </h4></label>';
           
         

           echo ' <label for="name"> <b>Contact :  </b><h4 style="color:teal;display:inline-block;margin:0 0 0 15px;">';echo $contact;echo ' </h4>
           <span style="margin-left:85px;cursor:pointer;"> <a onclick="editcontact()"> <i class="fa fa-pencil" aria-hidden="true"></i></a> </span>
           </label>';
           
           echo ' <label for="name"> <b>Post :  </b><h4 style="color:teal;display:inline-block;margin:0 0 0 15px;">';echo "Owner";echo ' </h4></label>';
           echo'
        </div>
  

        <div class=" right application" id="complaint" >
                    <h1 style="text-align: center;font-size: 30px;margin:20px 0 50px 0;color:blue;">Complaint!</h1>
           <form action="../php/message.php" method="POST">
                 <label for="">
                     To
                     </label>
                     <input type="text" placeholder="Email" name="tomailid" required>
                     <input type="text" name="frommailid" style="display:none;" value="';echo $email;echo '">
                    <label for="">
                    Description </label>
                    <textarea cols="80" rows="10" name="message" required></textarea>
                    <button type="submit"> Send</button>
                    </form>

                    <div class="notification">
<h2 style="text-align:center;margin-bottom:30px;">Notifications</h2>
';
$sql = "SELECT toid,message,date,fromid FROM notifications where fromid='$email'";
$result= mysqli_query($con,$sql);
if(mysqli_num_rows($result)){
    echo '<h3 style="margin:0 20px 15px 20px;color:green;"><u>';echo "Sent";echo'</u></h3>'; 
while($row=mysqli_fetch_assoc($result)){
    echo '
<ul>
<li>
<p><b>To: </b><span style="color:blue;"> ';echo $row['toid'];echo'</span></p>

<p><b>Date: </b><span style="color:green;">';echo $row['date'];echo'</p>
<p><b>Message: </b>';echo $row['message'];echo'</p>
</li>
</ul>';

}
}

$sql = "SELECT toid,message,date,fromid FROM notifications where toid='$email'";
$result= mysqli_query($con,$sql);
if(mysqli_num_rows($result)){
   echo '<h3 style="margin:0 20px 15px 20px;color:green;"><u>';echo "Received";echo'</u></h3>'; 

while($row=mysqli_fetch_assoc($result)){
    echo '
<ul>
<li>
<p><b>From: </b><span style="color:blue;"> ';echo $row['fromid'];echo'</span></p>

<p><b>Date: </b><span style="color:green;">';echo $row['date'];echo'</p>
<p><b>Message: </b>';echo $row['message'];echo'</p>
</li>
</ul>';

}
}
    echo '
                    </div>


            </div>

';


//DashBoard showing
echo '
<div class="right dashboard" id="dashboard">
            <h2 style="text-align: center;color: white;margin: 20px 0;">My Homes</h2>
            <time id="time"></time>
             <h3 id="date"></h3>
             
            ';


            //Showing homes of Owner
            $sql34="SELECT status,city,rooms,acrooms,address,contact,room_type,cost FROM house where email='$_SESSION[email]'";
            $result34= mysqli_query($con,$sql34);
                 $j=0;
                 if(mysqli_num_rows($result34)){
                    while($row=mysqli_fetch_assoc($result34)){
                   echo'
                        <table>
                        <tr >
                            <td width="250px" rowspan="3" >';

                
                    echo "<img src='../images/".$picarray[$j]."'>";
                       
                            
                            echo '</td>
                            <tr><td style="color: rgb(86, 14, 219);">
                           
                             <h3 style="color: black;">Specification:</h3>  
                             <p>';
                            echo $row['rooms']; 
                             echo '</p>
                             <p>House-Id : ';
                             echo $houseidarray[$j];
                               $j++;
                             echo '</p>   
                            <p>Address : ';
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
                              <tr>
                             <td class="cn1" style="float: left; color: black; padding:5px 5px 5px 20px;margin-top:5px;">
                                 Contact No: ';
                                  echo $row['contact'];
                                    echo '</td>';
                        
                          echo' <td class="cn" style="float: right;">
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
    
</div>


<section id="editname">
<a style="display:block;margin:10px 10px 10px 10px;cursor:pointer;" onclick="close1()"><i class="fa fa-times" aria-hidden="true" style="color:white;font-size:15px;"></i></a>
<img src="../images/h4.jpg" alt="">
<h2 style="text-align: center;color:orangered;">Welcome!</h2>

<form action="dashboardowner.php" method="POST">

<label for="">Name </label>

<input type="text" name="myname" id="" required>

<input type="submit" value="Enter" name="entern">
</form>


</section>

<section id="editcontact">
<a style="display:block;margin:10px 10px 10px 10px;cursor:pointer;" onclick="close2()"><i class="fa fa-times" aria-hidden="true" style="color:white;font-size:15px;"></i></a>
<img src="../images/h4.jpg" alt="">
<h2 style="text-align: center;color:orangered;">Welcome!</h2>

<form action="dashboardowner.php" method="POST">

<label for="">Contact </label>

<input type="text" name="mycontactno" id="" required>

<input type="submit" value="Enter" name="mycontact">
</form>


</section>
';


if(isset($_POST['entern'])){
     

    $host = "localhost";  
    $user = "root";  
  
    $password = '';  
    $db_name = "rental house management";  
      
    $con = mysqli_connect($host, $user, $password, $db_name); 
     
    $myname = $_POST['myname'];
    $sql2 = "UPDATE account SET username='$myname' where email='$email'"; 
    mysqli_query($con, $sql2);
   
}

if(isset($_POST['mycontact'])){
 

    $host = "localhost";  
    $user = "root";  
  
    $password = '';  
    $db_name = "rental house management";  
      
    $con = mysqli_connect($host, $user, $password, $db_name); 
     
    $mycontactno = $_POST['mycontactno'];
    $sql2 = "UPDATE owner SET phone='$mycontactno' where email='$email'"; 
    mysqli_query($con, $sql2);
}

echo '

<script src="clock.js"></script>
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

        function editname(){
          
           
           var x=document.getElementById("editname");
           x.style.display="block";
           x.style.top="200px";
           x.style.position="fixed";
          
          }

          function close1(){
          
           
           document.getElementById("editname").style.top="-500px";
           document.getElementById("editname").style.position="absolute";
          
          }

          function editcontact(){
      
           
           var y=document.getElementById("editcontact");
           y.style.display="block";
           y.style.position="fixed";
           y.style.top="200px";
          
          }
          function close2(){
          
          
           document.getElementById("editcontact").style.top="-500px";
           document.getElementById("editcontact").style.position="absolute";
          }
      
     
    </script>

</body>
</html>
';
}
?>