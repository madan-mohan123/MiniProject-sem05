<?php
session_start();
?>
<?php
$_SESSION["email"]="";
$_SESSION["hpost"]="";
$_SESSION["username"]="";
// include('../html pages/Login.php');
header("Location: ../html pages/Login.php");
?>