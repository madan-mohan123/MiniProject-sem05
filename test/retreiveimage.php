<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    img{
        width:700px;
        height:400px;
        margin:30px;
    }
</style>
<body>
    <?php

$con = mysqli_connect("localhost", "root", "", "rental house management");
$sql = "SELECT image FROM abc";
$result= mysqli_query($con,$sql);

if(mysqli_num_rows($result)){

    while($row=mysqli_fetch_assoc($result)){
       
        echo "<img src='images/".$row['image']."' >";
      echo "<br>";
    }
    }
     
    ?>
</body>
</html>