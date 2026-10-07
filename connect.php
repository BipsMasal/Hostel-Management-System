<?php
    $host="localhost";
    $user="root";
    $pw="";
    $db="hostel";

    $conn=mysqli_connect($host,$user,$pw,$db);

    if(!$conn){
        die("Connection not successfull due to ".mysqli_connect_error());
    }
?>