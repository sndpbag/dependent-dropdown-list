<?php

$conn = new mysqli("localhost","root","","india");

if($conn->connect_error)
{
    die("Connection failed: ". $conn->connect_error);
}


?>