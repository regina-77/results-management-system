<?php
if( $_SERVER ["REQUEST_METHOD"]==="POST"){
    $mysqli= require __DIR__ . "/database.php";
$sql= sprintf("SELECT * FROM users_table 
       WHERE email= '%s'",
     $mysqli->real_escape_string($_POST["email"]));

     $result = $mysqli->query($sql);
$user = $result->fetch_assoc();


 if($user){
    if(password_verify($_POST["password"], $user ["password-hash"])){
    die('login successful');
 }}}
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/kimeiga/bahunya/dist/bahunya.min.css">
   <!--<link rel="stylesheet" href="path_to_attricss_file.css" type="text/css">-->
    <!--<link rel="stylesheet" href="https://unpkg.com/mvp.css@1.12/mvp.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">-->
</head>
<body> 
    <form method="post">
        <label for="email">email</label>
        <input type="email" name="email" id="email">

        <label for="password"></label>
        <input type="password" name="password" id="pasword">

        <button>login</button>
    </form>
</body>
</html>
