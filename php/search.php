<?php
include('connection.php'); 
     
 
$rooms= $_POST['bhk'];  
$city = $_POST['city'];
if($rooms==""){
    $sql="SELECT status,city,rooms,acrooms FROM house where city='$city'";
}
else{
$sql="SELECT status,city,rooms,acrooms FROM house where rooms='$rooms' and city='$city'";
}
$result= mysqli_query($con,$sql);

if(mysqli_num_rows($result)){
   while($row=mysqli_fetch_assoc($result)){
       echo " BHK :" . $row["rooms"];
       echo " , STATUS :" . $row["status"];
       echo " , CITY :" . $row["city"];
       echo " , ACROOMS :" . $row["acrooms"] . "<br>";
      
   }
}
else {
    echo '<h2 style="text-align:center;color:green;">No Result Found</h2>';
 
}
mysqli_close($con);

?>

