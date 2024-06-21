<?php
session_start();
$errors=[];
if(empty($_REQUEST["name"])) $errors["name"] = "name is required";
if(empty($_REQUEST["email"])) $errors["email"] = "email is required";
if(empty($_REQUEST["phone"])) $errors["pw"] = "phone is required";
if(empty($_REQUEST["pw"])) $errors["pw"] = "password is required";
if(empty($_REQUEST["pc"])) $errors["pc"] = "password confirmation is required";
if($_REQUEST["pc"]!=$_REQUEST["pw"]){
    $errors["pc"] = "password confirmation is must be equal to password";
}

$name=HTMLSPECIALCHARS(trim($_REQUEST["name"]));
$email=filter_var($_REQUEST["email"],FILTER_SANITIZE_EMAIL);
$password=$_REQUEST["pw"];
$password_confirmation=$_REQUEST["pc"];
$phone=$_REQUEST["phone"];


if(!empty($_REQUEST["email"]) && !filter_var($_REQUEST["email"],FILTER_VALIDATE_EMAIL)) $errors["email"] = "Email invalid format";

if(empty($errors)){

}
else{
    $_SESSION["errors"]=$errors;
    header("location:register.php");
}

echo $name ."<br>";
echo $phone."<br>";
echo $email."<br>";
echo $password;
