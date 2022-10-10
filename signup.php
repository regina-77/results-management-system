<?php
if(empty($_POST['name'])){
    die('name is required');
}else {
    $name = trim(htmlspecialchars($_POST['name']));
}
if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    die('valid email is reguired');
}else{
    $email= trim(htmlspecialchars($_POST['email']));
}
if(strlen($_POST['password'])<8){
    die('password should contain atleast 8 characters');
}
if(!preg_match('/[a-z]/i' , $_POST['password'])){
    die('the password should contain atleast one letter');
}
if(!preg_match('/[0-9]/' , $_POST['password'])){
    die('the password should contain atleast one number');
}
if($_POST['password'] !== $_POST['password_confirmation']){
    die("passwords must match");
}
$password_hash = password_hash($_POST['password'] ,PASSWORD_DEFAULT);
$mysqli = require __DIR__ . "/database.php" ;

$sql = "INSERT INTO users_table (name, email, password_hash)
VALUES (?,?,?)";
$stmt = $mysqli->stmt_init();

if(!$stmt->prepare($sql)){
    die("sql error:" . $mysqli->error);
}
$stmt->bind_param("sss" ,
            $_POST["name"],
            $_POST["email"],
            $password_hash);

$stmt->execute();
Header ("Location: signupsuccess.html");
exit;



?> 