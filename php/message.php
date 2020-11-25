
<?php
session_start();
?>
<?php   
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "rental house management";   
    $con = mysqli_connect($host, $user, $password, $db_name);  
     
    $frommail = $_POST['frommailid'];  
    $tomail = $_POST['tomailid'];  
    $message = $_POST['message'];
 $cdate=date("Y-m-d");
$control=0;
 $sql="SELECT email FROM account where email='$tomail'";
 $result= mysqli_query($con,$sql);
 
 if(mysqli_num_rows($result)){
 
     while($row=mysqli_fetch_assoc($result)){
 $control=1;
        
     }
    }
    else{
        if($_SESSION[hpost]=="Owner"){
            header("Location: ../html pages/dashboardowner.php");

            }
            else{
              
               header("Location: ../html pages/dashboardtenant.php");
               
            }  
    }


    if($control==1){
    $sql1 = "INSERT INTO notifications(fromid,toid,message,date) VALUES ('$frommail','$tomail','$message','$cdate')"; 
         if($con->query($sql1) === TRUE){
            if($_SESSION[hpost]=="Owner"){
             header("Location: ../html pages/dashboardowner.php");

             }
             else{
               
                header("Location: ../html pages/dashboardtenant.php");
                
             }
            }
            else{
                echo '<h1 style=text-align:center;">';echo "Error ?";echo '</h1>';
            }
        }
        else{

        }
      


?>