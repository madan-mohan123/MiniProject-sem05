<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OnlineRentalSystem</title>
    
    <link rel="stylesheet" href="../css files/Bhagatsearch.css" >
    <link rel="stylesheet" media="screen and (max-width: 1300px)" href="../css/BhagatResponsive.css">

</head>
<body>
  
    <div class="header">
            <img src="../images/h.jpg"  alt="">
            <p>House <span style="color: gray; opacity: 0.7;font-size:30px;">Management</span></p>
            <div class="nav">
                <ul>
                    <li><a href="../index.html">home</a></li>
                    <li><a href="signup.html">signup</a></li>
                    <li><a href="LogIn.php">login</a></li>
                    <!-- <li ><a href="Bhagat mini-project/html/Bhagatsearch.php" style="background-color: teal;font-size: 20px; text-transform: none;padding: 10px 20px;">Search</a></li>
                   -->
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
                 <option value="P.G">P.G</option>
                     <option value="Flat">Flat</option>
                     <option value="Local House" selected>Local House</option>
                     
                    </select>
                    </div>
</div>
            
              
                <div class="form-group">
                    <div class="loc">
                    
                    <label for="Bed-rooms">Bed-Rooms:</label>
                    <input type="text" name="bhk" id="Bed-rooms" placeholder="like 3bhk">
</div>
<div class="loc">
                 <label for="city">City:</label>
                 <input type="text" name="city" id="city"  placeholder="mathura" required>
                </div>
</div>
            

                <div id="button">
              
                <input type="submit" value="Search" style="margin-right:20px;">
                <input type="reset" value="Reset">
        
        </div>


        </form>
         </div>   
    </section>
    <section class="search-content" >
    
    <?php  
     include('../php/connection.php'); 
     $rooms= $_POST['bhk'];  
     $city = $_POST['city'];
     $type=$_POST['type'];
     if($rooms==""){
         $sql="SELECT status,city,rooms,acrooms,address,contact,room_type,cost FROM house where city='$city' and room_type='$type'";
     }
     
     else{
     $sql="SELECT status,city,rooms,acrooms,address,contact,room_type,cost FROM house where rooms='$rooms' and city='$city' and room_type='$type'";
     }
     $result= mysqli_query($con,$sql);
     if(mysqli_num_rows($result)){
        while($row=mysqli_fetch_assoc($result)){
            
           echo "<table>";
          
            echo "<tr>";
           echo "<td width='250px' rowspan='3' >";
          echo "<img src='../images/h5.jpg' alt='madan'>";
          echo "</td>";
          echo "<tr>";
              echo "<td style='color: rgb(86, 14, 219);'> ";
               
                 echo "<h3>Specification:</h3>";  
                 echo "<p>";
                  echo $row['rooms'] ;
                  echo "</p>" ;  
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
               echo "<td  class='buy' style='float: right;'>";
             echo "<a href='LogIn.php'>Buy</a>";
           echo "</td>";
           echo "<td class='cn' style='float: right;'>";
           echo  "Rent ";
           echo $row['cost'];
           echo "/-"; 
          echo "</td>";
         echo "</tr>";
         echo "</tr>";
              
             echo "</table>" ;
           
        }
     }
     else {
        echo '<h2 style="text-align:center;color:green;margin-top:50px">No Result Found</h2>';
      
     }
     mysqli_close($con);
    
    
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
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque, harum delectus sequi eveniet eligendi animi culpa rem voluptatum accusantium inventore nam deleniti! Nobis.
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


</body>
</html>
