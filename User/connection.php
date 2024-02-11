<?php

$conn=new mysqli("localhost", "root", "", "men");
if($conn->connect_error)
{
    die("connection is not connected" . $conn->connect_error);
}

?>