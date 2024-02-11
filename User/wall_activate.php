
<?php 
    
session_start();
error_reporting(E_ALL ^ E_WARNING);
$email=$_SESSION['email'];
$user=$_SESSION['username'];
$pic=$_SESSION['pic'];

require_once 'connection.php';

$bal = 10000;
$sql = "update login set payment=$bal where email='$email'";
if($conn->query($sql) === TRUE)
{
    header("location:Profile.php");
}
else
{
    header("location:Profile.php");
}

?>
