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
    $filename="";

    if (isset($_POST['upload'])) { 
        $filename = $_FILES["pic"]["name"]; 
        $tempname = $_FILES["pic"]["tmp_name"];     
            $folder = "..//images/".$filename; 
            
            //move image into folder
            move_uploaded_file($tempname, $folder);
         
  
    }
    

        $sql = "INSERT INTO house(ROOM_TYPE,CITY,ADDRESS,CONTACT,ROOMS,ACROOMS,EMAIL,STATUS,cost,pic) VALUES ('$room_type','$city','$address','$contact','$rooms','$acrooms','$email','Available','$cost','$filename')"; 
         if($con->query($sql) === TRUE){


echo  '
<script>
alert("YOUR HOME DETAILS SUUCCESFULLY SAVED");
</script>
';

 header("Location: ../html pages/dashboardowner.php");
}
else
{
    echo  '
    <script>
    alert("YOUR HOME DETAILS Not SUUCCESFULLY SAVED! Some Error");
    </script>
    ';
} 
$con->close();        
?> 