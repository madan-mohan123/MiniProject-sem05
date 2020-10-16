<?php
include('connection.php'); 
     
 
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
       echo " BHK :" . $row["bhk"];
       echo " , STATUS :" . $row["status"];
       echo " , CITY :" . $row["city"];
       echo " , ACROOMS :" . $row["acrooms"] . "<br>";
      
   }
}
else {
    echo "No Result Found";
 
}
mysqli_close($con);

?>

