<?php
session_start();
$_SESSION["houseid"]="";
?>

<?php
$host = "localhost";  
$user = "root";  
$password = '';  
$db_name = "rental house management";   
$con = mysqli_connect($host, $user, $password, $db_name);  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OnlineRentalSystem</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    
    <link rel="stylesheet" href="../css files/Bhagatsearch.css" >
    <style>
       body{
    background-color:orangered;
}
        .buy:hover{
            background-color: rgb(241, 48, 14);
    transform: scale(1.1);
    box-shadow: 0 4px 6px 2px green;
    color:white;
    font-size:15px;
}


#buy{
    display:inline-block;
    width:120px;
    height:45px;
    border:none;
    border-radius:25px;
    font-size:20px;
    background-color: rgb(168, 108, 218);
    color: white;
}
.fa-tasks,.fa-home,.fa-tasks{
        margin-right: 15px;
       font-size: 20px;
       
    }
    </style>  
</head>
<body>
  
    <div class="header">
            <img src="../images/h.jpg"  alt="">
            <p>House <span style="color: gray; opacity: 0.7;font-size:30px;">Management</span></p>
            <div class="nav">
                <ul>
                    <li><a href="../index.html"><i class="fa fa-home" aria-hidden="true"></i>home</a></li>
                    <li><a href="#"><i class="fa fa-tasks" aria-hidden="true"></i>About us</a></li>
                    <li><a href="#"><i class="fa fa-tasks" aria-hidden="true"></i>Policy</a></li>
                  
                </ul>
            </div>
          
        </div>
    <section id="home">
        <h1 class="h-primary">Welcome to Online rental system</h1>
        
        <p>YOU CAN BOOK YOUR HOME HERE</p>

        <button class = "btn" >book now</button>
    </section>

    <section id="Search">

        <h1 class="h-primary center">SEARCH YOUR DREAM HOME</h1>
        <div id="Search-box">        
            <form action="Bhagatsearch.php" method="POST" >

                 <div class="form-group">
                     <div class="loc">
                 <label for="location">Societies:</label>
                 <select name="Location" id="location">
                     <option value="Radha valley">Radha Valley</option>
                    
                     <option value="HR Conclave">HR Conclave</option>
                 
                     <option value="Kanha Dham">Kanha Dham</option>
                 </select>
                </div>
                <div class="loc">
                 <label for="type">Type:</label>
                 <select name="type" id="type">
                     <option value="" >---none---</option>
                     <option value="P.G">P.G</option>
                     <option value="Flat">Flat</option>
                     <option value="Local House" >Local House</option>
                     <option value="Girls P.G">Girls P.G</option>
                     <option value="Boys P.G">Boys P.G</option>
                   
                    </select>
                    </div>
</div>
            
              
                <div class="form-group">
                    <div class="loc">
                    
                    <label for="Bed-rooms">Bed-Rooms:</label>
                    <input type="text" name="bhk" id="Bed-rooms" placeholder="Rooms ie.2bhk">
</div>
<div class="loc">
                 <label for="city">City:</label>
                 <input type="text" name="city" id="city"  placeholder="Enter city" required>
                </div>
</div>
            

                <div id="button">
              
                <input type="submit" value="Search" style="margin-right:20px;">
                <input type="reset" value="Reset">
        
        </div>

        </form>

         </div>   
    </section>
    <section class="search-content">
    
    <?php  
    
     $rooms= $_POST['bhk'];  
     $city = $_POST['city'];
     $type=$_POST['type'];
     $arhouseid=array();
     $i=0;
     if($rooms=="" && $type==""){
         $sql="SELECT status,city,rooms,acrooms,address,contact,room_type,cost,pic,house_id FROM house where city='$city' and status='Available'";
     }
     else if($rooms==""){
        $sql="SELECT status,city,rooms,acrooms,address,contact,room_type,cost,pic,house_id FROM house where city='$city' and room_type='$type' and status='Available'";
    
     } 
     else{
     $sql="SELECT status,city,rooms,acrooms,address,contact,room_type,cost,pic,house_id FROM house where rooms='$rooms' and city='$city' and room_type='$type' and status='Available'";
     }
     $result= mysqli_query($con,$sql);
     if(mysqli_num_rows($result)){
        while($row=mysqli_fetch_assoc($result)){
            $arhouseid[$i]=$row['house_id'];
            
           echo '<table class="my-tag">';
            echo "<tr>";
           echo "<td width='250px' rowspan='3' >";
          echo "<img src='../images/".$row['pic']."' >";
          echo "</td>";
          echo "<tr>";
              echo "<td style='color: rgb(86, 14, 219);'> ";
               
                 echo "<h3>Specification:</h3>";  
                 echo "<p>";
                  echo $row['rooms'] ;
                  echo "</p>" ;  
                  echo' <p>House-Id : ';
                echo $arhouseid[$i];
                echo "<p>Address: ";
                echo $row['address']; 
                 echo "</p>";   
                 echo "<p>";
                echo $row['city'] ;
                echo ", up</p> ";
                     
                    echo "<p>";
                    echo " Ac rooms: ";
                    echo $row['acrooms'];
                    echo " , Room Type: ";
                    echo $row['room_type'];
                    echo "</p>";
                     echo "<h3>".$row['status']."</h3>";
  
                echo "</td>";
               
             echo "</tr>";

            echo  "<tr>";
             echo "<td class='cn1' style='float: left; color: black; padding:5px 5px 5px 20px;margin-top:5px;'>";
                echo  "Contact No: ";
                echo $row['contact'];
                    echo "</td>";
               echo '<td  class="buy" style="float: right;">';
               echo '<form action="LogIn.php" method="POST">';
            echo '<input style="display:none;" type="text" name="Buy" value="';echo $arhouseid[$i]; echo'">';
             echo '<input type="submit" id="buy" value="Buy">';
             echo '</form>';
           echo "</td>";
           echo "<td class='cn' style='float: right;'>";
           echo  "Rent ";
           echo $row['cost'];
           echo "/-"; 
          echo "</td>";
         echo "</tr>";
         echo "</tr>";
              
             echo "</table>" ;
             $i++;
           
        }
     }
     else {
        echo '<h2 style="text-align:center;color:green;margin-top:50px">No Result Found</h2>'; 
     }
 
    ?>
    
    </section>

    <section class="servicescontainer">
        <h1 class="h-primary center">our services </h1>
        <div id="services">
            <div class="box">
                <img src="../images/security.jpg" alt="security barrier image">
                <h2 class="h-secondary center">Live Safely.</h2>
                <p class = "center">we provide Societies which have security guards, baarier entry and CCTV survillance at each point.</p>
            </div>
            <div class="box">
                <img src="../images/money.jpg" alt="money image">
                <h2 class="h-secondary center">Affordable Houses</h2>
                <p class = "center">the prices are very flexible and affordable.</p>
            </div>
            <div class="box">
                <img src="../images/corporative.jpg" alt="hand shaking image">
                <h2 class="h-secondary center">Corporative Societies</h2>
                <p class = "center">We have societies which are very corporative.</p>
            </div>
        </div>
       
    </section>
    <section class="House-section"> 
        <h1 class="h-primary center">Most viewed houses</h1>
        <div id="houseimage">
        <div class="houses">
        
                <img src="../images/apart5.jpg" alt="house image">

            </div>
            <div class="houses">
                <img src="../images/apart4.jpg" alt="House image">

            </div>
            <div class="houses">
                <img src="../images/apart3.jpg" alt="House image">

            </div>
            <div class="houses">
                <img src="../images/apart2.jpg" alt="House image">
            </div>
        </div>
    
    </section>
    
    <div class="content-box">
        <div class="about">
            <h2 class="h-secondary center">ABOUT US</h2>
            <p>My name is bhagat singh and i am pursuing my B.Tech 3rd year from GLA Uniiversity.Currently I work rental house management project and this is the result of our project 
            with my team members.This web is all for those people who need to find home homes in strane place.
                  </p>


        </div>
        <div class="details">
            <h2 class="h-secondary center">Details</h2>
            <p>
                
                <ul>
                    <li><a href="#"></a>Blog</li>
                </ul>
                <ul>
                    <li ><a href="#"></a>Privacy</li>
                </ul>
                <ul>
                    <li ><a href="#"></a>Terms</li>
                </ul>
                <ul>
                    <li ><a href="#"></a>Details</li>
                </ul>
                 <ul>
                    <li><a href="#"></a>Contact Us</li>
                </ul>
            </p>
        </div>
     
    </div>
    
    
    <footer>
        <div class="center">
             &copy;: ALL rights reserved.
        </div>
    </footer> 

    <script>
 var x = document.querySelector(".search-content");
 x.onclick=hello;
 function hello(e){ 
       console.log(e.target);
 }
    </script>



   

</body>
</html>
