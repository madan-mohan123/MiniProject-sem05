<?php
session_start();
?>

<?php   
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "rental house management";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
     
    $firstname = $_POST['firstname'];  
    $lastname = $_POST['lastname'];  
    $email = $_POST['email'];
    $gender=$_POST['gender'];
    $address = $_POST['address'];  
    $phone = $_POST['phone'];  
    $country_code = $_POST['country_code'];
    $account=$_POST['account'];
    
      
    $sql1="SELECT email,password,hpost,username FROM account where  email='$email'";
    $result= mysqli_query($con,$sql1);

         $sql = "INSERT INTO owner(FIRSTNAME,LASTNAME,EMAIL,GENDER,ADDRESS,PHONE,COUNTRY_CODE,account_no) VALUES ('$firstname','$lastname','$email','$gender','$address','$phone','$country_code','$account')"; 
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



