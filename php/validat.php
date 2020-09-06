<?php      
    include('connection.php');  
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
    $email = $_POST['email'];
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $email = stripcslashes($email);
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password); 
        $email= mysqli_real_escape_string($con,$email); 
      
        $sql = "select user name,password,email from accountinfo where user name = '$username' and password = '$password' eamil='$email'";  
        $result = mysqli_query($con, $sql);  
       // $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
       // $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
       /// $count = mysqli_num_rows($result);  
          
       if(mysqli_num_rows($result) > 0){
           while($row = mysqli_fetch_array($result)){
            echo "<h1><center> Login successful </center></h1>";   
           }
       }
       else{
        echo "<h1> Login failed. Invalid username or password.</h1>";  
       }
        // if($count == 1){  
        //     echo "<h1><center> Login successful </center></h1>";  
        // }  
        // else{  
        //     echo "<h1> Login failed. Invalid username or password.</h1>";  
        // }     
?> 