<?php
session_start();
?>
<?php   
   $host = "localhost";  
   $user = "root";  
   $password = '';  
   $db_name = "rental house management";  
     
   $con = mysqli_connect($host, $user, $password, $db_name);  
     
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
    
    $sql1="SELECT email,password,hpost,username FROM account where  email='$email'";
    $result= mysqli_query($con,$sql1);

         $sql = "INSERT INTO tenant(USERNAME,EMAIL,MEMBERS,PURPOSE,ROOMS,CONTACT_NO,PROOF_ID,LEAVE_house,JOIN_house,ADDRESS) VALUES ('$name','$email','$member','$purpose','$room','$contact','$proof','$leave','$join','$address') "; 
         if($con->query($sql) === TRUE){
            if(mysqli_num_rows($result)){

                while($row=mysqli_fetch_assoc($result)){
                    $_SESSION["hpost"]= $row["hpost"];
                    $_SESSION["username"]=$row["username"];
                  
                }
               $_SESSION["email"]=$email;
            
            if($_SESSION[hpost]=="Owner"){
              
               header("Location: ../html pages/dashboardowner.php");
            }
            else{
               
               header("Location: ../html pages/dashboardtenant.php");
            }
            
             }
}
else
{
    echo '<h1 text="align:center">Some Error</h1>';
} 
$con->close();        
?> 