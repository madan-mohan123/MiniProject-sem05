
<?php   
    include('connection.php'); 
     
    $username = $_POST['name'];  
    $password = $_POST['password'];  
    $email = $_POST['email'];
    $hpost=$_POST['post'];
      


         $sql = "INSERT INTO account(USERNAME,PASSWORD,EMAIL,HPOST) VALUES ('$username','$password','$email','$hpost')"; 
         if($con->query($sql) === TRUE){
             if($hpost=="Tenant"){
           
             header("Location: ../html pages/tenant1.html");

             }
             else{
               
                header("Location: ../html pages/amitowner.html");
                
             }

}
else
{
echo " sorry". "<br>". $sql ."<br>" 
. $con->error;
} 
$con->close();        
?> 



