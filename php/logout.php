<?php
session_start();
?>
<?php
$_SESSION["email"]="";
$_SESSION["hpost"]="";
$_SESSION["username"]="";
$_SESSION["house_id"]="";
session_destroy();
header("Location: ../html pages/Login.php");

?>