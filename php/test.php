<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello eb</h1>
  
</body>
</html>
<?php   
 $host = "localhost";  
 $user = "root";  
 $password = '';  
 $db_name = "rental house management";   
 $con = mysqli_connect($host, $user, $password, $db_name); 

// SELECT DATEDIFF('2020-10-30','2020-10-01') AS 'RE'; 

$dat=date("Y-m-d");
// $sql11 = "INSERT INTO datee(datt1,datt2) VALUES ('2020-02-13','$dat')"; 
// $sql11="SELECT datt1,datt2 from datee";
// mysqli_query($con,$sq);
//  $result2= mysqli_query($con,$sql11);
// $ab="";
// $bc="";
//   if(mysqli_num_rows($result2)){

//     while($row=mysqli_fetch_assoc($result2)){
//         $ab=$row['datt1'];

//         $bc=$row['datt2'];
        
//         echo '<h1>';echo $ab;echo'</h1>'; 
        
//         echo '<h1>';echo $bc;echo' </h1>'; 
       
        
//     break;
//     }
// }
// $a=date_create($ab);
// $b=date_create($bc);
// $a=date_create("2020-10-10");
// $b=date_create("2019-09-10");
// $c=date_diff($b,$a);
// echo '<h1>';echo $c->format("%R%a days");echo' helhklk </h1>'; 
//       echo '<h1>';echo $dat;echo' helfdlo </h1>'; 
echo '<h1>';echo $dat;echo' helfdlo </h1>'; 
      mysqli_close($con);
?> 
