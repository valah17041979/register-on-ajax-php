
<?php

session_start();
if(!isset($_SESSION["email"])){
header("Location: register_login.php");
exit(); }
?>