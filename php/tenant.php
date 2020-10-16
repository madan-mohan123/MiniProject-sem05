<?php   
    include('connection.php'); 
     
    $name = $_POST['name'];  
    $email = $_POST['email'];
    $member=$_POST['member'];
    $purpose=$_POST['purpose'];  
    $address=$_POST['address']; 
    $contact=$_POST['contact']; 
    $room=$_POST['room'];
    $join=$_POST['join'];
    $leave=$_POST['leave']; 
    $proof=$_POST['proofid'];   

         $sql = "INSERT INTO tenant(USERNAME,EMAIL,MEMBERS,PURPOSE,ROOMS,CONTACT_NO,PROOF_ID,LEAVE_house,JOIN_house,ADDRESS) VALUES ('$name','$email','$member','$purpose','$room','$contact','$proof','$leave','$join','$address') "; 
         if($con->query($sql) === TRUE){
echo "Data successfully inserted";
}
else
{
echo " sorry". "<br>". $sql ."<br>" 
. $con->error;
} 
$con->close();        
?> 