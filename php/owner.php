<?php
session_start();
?>
<?php   
    include('connection.php'); 
     
    $room_type = $_POST['room_type'];  
    $city = $_POST['city'];  
    $address = $_POST['address'];
    $contact=$_POST['contact'];
    $rooms=$_POST['rooms'];
    $acrooms=$_POST['acrooms'];
    $cost=$_POST['cost'];
     $email=$_SESSION[email]; 


         $sql = "INSERT INTO house(ROOM_TYPE,CITY,ADDRESS,CONTACT,ROOMS,ACROOMS,EMAIL,STATUS,cost) VALUES ('$room_type','$city','$address','$contact','$rooms','$acrooms','$email','Available','$cost')"; 
         if($con->query($sql) === TRUE){
echo  '
<script>
alert("YOUR HOME DETAILS SUUCCESFULLY SAVED");
</script>
';


}
else
{
echo " sorry". "<br>". $sql ."<br>" 
. $con->error;


} 
$con->close();        
?> 