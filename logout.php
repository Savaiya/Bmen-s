<?php 
session_start();
session_destroy();
header("location:User/Home.php");
?>
