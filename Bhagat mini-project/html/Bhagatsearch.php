<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OnlineRentalSystem</title>
    
    <link rel="stylesheet" href="../css/Bhagatsearch.css" >
    <link rel="stylesheet" media="screen and (max-width: 1300px)" href="../css/BhagatResponsive.css">
   <style>
       table{
    width: 90%;
    margin:30px auto;
    background-color: rgba(172, 218, 236, 0.7);
 
    border-radius: 20px; 
    
}
table:nth-child(even){
    background-color: rgba(129, 119, 119, 0.7); 
}
table,tr,td{
    border-collapse: collapse;
 
}
table tr{
    margin-bottom: 30px;
  
    border-spacing: 20px;
  
}
td{
  padding:20px 20px 0 20px;
  font-size: 20px;
  color: white;
}
td img{
    width: 200px;
    height: 200px;
    border-radius: 10px;
}
.buy{
width: 100px;
border-radius: 25px;
padding:10px;
background-color: rgb(168, 108, 218);
color: white;

margin: 5px 30px;
font-size: 20px;
height: 25px;
display: flex;
align-items: center;
justify-content: center;
}
.cn{
width: 150px;
border-radius: 25px;
padding:10px;
background-color: rgb(214, 119, 30);
color: white;

font-size: 20px;
height: 25px;
display: flex;
align-items: center;
justify-content: center;
margin: 5px 30px;
}
p{
    color: white;
}
.buy:hover{
    background-color: goldenrod;
}
   </style>
</head>
<body>
    <!-- <nav id="navbar">
         <div id="logo">
        <img src="../../images/h.jpg"  alt="">
        </div>
        <ul>
            <li class="item"><a href="../../index.html">Home</a></li>
            <li class="item"><a href="#c">About Us</a></li>
            <li class="item"><a href="#S">Services</a></li>
            <li class="item"><a href="#">Contact Us</a></li>
        </ul>
    </nav> -->
    <div class="header">
            <img src="../../images/h.jpg"  alt="">
            <p>House <span style="color: gray; opacity: 0.7;font-size:30px;">Management</span></p>
            <div class="nav">
                <ul>
                    <li><a href="#">home</a></li>
                    <li><a href="../../html pages/signup.html">signup</a></li>
                    <li><a href="../../html pages/LogIn.html">login</a></li>
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
                     <option value="O MAx">O MAX</option>
                     <option value="HR Conclave">HR Conclave</option>
                     <option value="Refinery NAagr">Refinery Nagar</option>
                     <option value="Kanha Dham">Kanha Dham</option>
                 </select>
                </div>
                <div class="loc">
                 <label for="type">Type:</label>
                 <select name="type" id="type">
                     <option value="Apartments">Apartments</option>
                     <option value="Villa">Villa</option>
                     <option value="Cottage">Cottage</option>
                     <option value="House">House</option>
                     
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
    
       
     include('../../php/connection.php'); 
     $bhk= $_POST['bhk'];  
     $city = $_POST['city'];
     if($bhk==""){
         $sql="SELECT status,city,bhk,acrooms FROM house where city='$city'";
     }
     else{
     $sql="SELECT status,city,bhk,acrooms FROM house where BHK='$bhk' and city='$city'";
     }
     $result= mysqli_query($con,$sql);
     
     if(mysqli_num_rows($result)){
        while($row=mysqli_fetch_assoc($result)){
            
           echo "<table>";
          
            echo "<tr>";
           echo "<td width='250px' rowspan='3' >";
          echo "<img src='../../images/h5.jpg' alt='madan'>";
          echo "</td>";
          echo "<tr>";
              echo "<td style='color: rgb(86, 14, 219);'> ";
               
                 echo "<h3>Specification:</h3>";  
                 echo "<p>";
                  echo $bhk ;
                  echo "</p>" ;  
                echo "<p>Address: sant nagar near pushpanjali</p>";   
                 echo "<p>";
                echo $city ;
                echo ", up</p> ";
                     
                    echo "<p>";
                    echo " Ac rooms";
                    echo "</p>";
                     echo "<h3>Available now</h3>";
  
                echo "</td>";
               
             echo "</tr>";

            echo  "<tr>";
             echo "<td class='cn1' style='float: left; color: black; padding:5px 5px 5px 20px;margin-top:5px;'>";
                echo  "contact no. 985632752";
                    echo "</td>";
               echo "<td  class='buy' style='float: right;'>";
             echo "<a href='../../html pages/LogIn.html'>Buy</a>";
           echo "</td>";
           echo "<td class='cn' style='float: right;'>";
           echo  "Rent 4000/-"; 
          echo "</td>";
         echo "</tr>";
         echo "</tr>";
              
             echo "</table>" ;
           
        }
     }
     else {
         echo "No Result Found";
      
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
