<?php 
$host= "localhost";
$dbname= "logindb";
$username= "root";
$password ="";

$mysqli = new mysqli($host,$username,$password,$dbname);
 if($mysqli->connect_errno){
    die("connection error:" . $mysqli_connect_error);
 }
return $mysqli;














?>