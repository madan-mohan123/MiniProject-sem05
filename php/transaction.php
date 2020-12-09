
<?php
session_start();
?>
<?php
include('connection.php'); 
     
     $account = $_POST['cardno'];  
     $amount=$_POST['amount'];


     $dat=date("Y-m-d");
       $owneraccount="";
$owneremail="";

       $sql1="SELECT email FROM house where house_id='$_SESSION[houseid]'";
      $result1= mysqli_query($con,$sql1);

   if(mysqli_num_rows($result1)){

    while($row=mysqli_fetch_assoc($result1)){
        
     $owneremail=$row['email'];
       
    }
  }

    $sql2="SELECT account_no FROM owner where email='$owneremail'";
      $result2= mysqli_query($con,$sql2);
   if(mysqli_num_rows($result2)){

    while($row=mysqli_fetch_assoc($result2)){
        
     $owneraccount=$row['account_no'];
       
    }
          $sql11 = "INSERT INTO bankaccount(Tenant_account,payment,date,Owner_account,house_id) VALUES ('$account','$amount','$dat','$owneraccount','$_SESSION[houseid]')"; 
          $sql22 = "UPDATE tenant SET house_id='$_SESSION[houseid]' where email='$_SESSION[email]'"; 
          mysqli_query($con, $sql22); 

          if($con->query($sql11) === TRUE){
             
            $sqlsta = "UPDATE house SET status='Unavailable' where house_id='$_SESSION[houseid]'"; 
            mysqli_query($con, $sqlsta); 
            
               $_SESSION[houseid]="";

               

               //messages 
               $alertnotify=0;
               $message="Welcome , I Am Your Tenant Now.";
               $sql1 = "INSERT INTO notifications(fromid,toid,message,date) VALUES ('$_SESSION[email]','$owneremail','$message','$dat')"; 
               if($con->query($sql1) === TRUE){
                  }
               if($alertnotify==0){

               echo '<script>alert("Transaction successfully Completed")</script>';
               $alertnotify=1;
              }
              if($alertnotify==1){
              header("Location: ../html pages/dashboardtenant.php");
              }
              }
 
 }
 else
 {
 echo " sorry". "<br>". $sql ."<br>" 
 . $con->error;
 } 
 mysqli_close($con);   

 ?>    
 