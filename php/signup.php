<?php   
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "rental house management";   
    $con = mysqli_connect($host, $user, $password, $db_name);  
     
    $username = $_POST['name'];  
    $password = $_POST['password'];  
    $email = $_POST['email'];
    $hpost=$_POST['post'];
    $check=0;  

    $sqll="SELECT email FROM account where email='$email'";
    $resultl= mysqli_query($con,$sqll);


    if(mysqli_num_rows($resultl)){
        while($row=mysqli_fetch_assoc($resultl)){
         $check=1;

         $alertnotify=0;
         if($alertnotify==0){
     
             echo "<script>prompt('This account is already has exist')</script>";
             $alertnotify=1;
            }
        if($alertnotify==1){
                header("Location: ../html pages/signup.html");
            }
        //  header("Location: ../html pages/signup.html");
        
    }
}
   
if($check==0){
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
}
$con->close();        
?> 