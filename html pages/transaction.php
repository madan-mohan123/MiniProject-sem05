
<?php
session_start();
?>
<?php
$host = "localhost";  
$user = "root";  
$password = '';  
$db_name = "rental house management"; 
$con = mysqli_connect($host, $user, $password, $db_name); 
?>
<?php
if($_SESSION[houseid]!="" && $_SESSION[email]!=""){
    // echo '<h1> hell : ';echo $_SESSION[houseid] ;echo '</h1>';
    $sql="SELECT cost FROM house where house_id='$_SESSION[houseid]'";
    $result= mysqli_query($con,$sql);
    $cost="";
    if(mysqli_num_rows($result)){
        while($row=mysqli_fetch_assoc($result)){
     $cost=$row['cost'];
        }
    }

    echo'
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <link rel="stylesheet" href="../css files/transaction.css"> 
</head>
<body>
    <main class="accontainer" id="close">
       
        <h2 style="text-align: center;margin: 0 20px 20px 20px; clear: both;">Choose your Transaction</h2>
        <section class="image">
        <img src="../images/sbi.jpg" alt="">
        <img src="../images/hdfc.jpg" alt="">
        <img src="../images/paytm.jpg" alt="">
        </section>
        
               <form action="../php/transaction.php" method="POST">
                   <label for="credit">
                   <input type="radio" name="info" id="credit">
                   Credit cart
                   </label>
                   <label for="debit">
                   <input type="radio" name="info" id="debit" checked>
                   Debit card
                   </label>
                   <label for="net">
                   <input type="radio" name="info" id="net">
                  Net Banking
                   </label>
        
        <input type="text" name="cardno" id="acount" placeholder="xxxx xxxx xxxx" required>
        <input type="datetime" name="expdate" id="date" placeholder="MM/YYYY" required>
        <input type="text" name="ccv" id="ccv" placeholder="CCV" required>

         <label for="" style="margin: 20px 0 10px 20px;"> Payable Amount</label>';

        echo '<input type="text" name="amount" id="amount" value="Rs ';echo $cost; echo '" readonly>';
        echo ' <button type="submit">
            next
        </button>
        </form>
      
      </main> 
</body>
</html>';

}   
?>