<?php
include "connection.php";

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$mobile = $_POST["mobile"];
$uname = $_POST["uname"];
$password = $_POST["password"];


if(empty($fname)){
    echo("Please Enter Your First Name");
}else if(strlen($fname) > 20){
    echo("Your first name should be less than 20 Characters");
}else if(empty($lname)){
    echo("Please Enter Your Last Name");
}else if(strlen($lname)> 20){
    echo("Your last Name should be less than 20 Characters");
}else if(empty($email)){
    echo("Please Enter Your Email Address");
}else if(strlen($email) > 100){
    echo("Your Email Address should be less than 100 Characters");
}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo("Your Email addres is Invalid");
}else if(empty($mobile)){
    echo("Please Enter Your Mobile");
}else if(strlen($mobile) != 10){
    echo("Your Mobile number must contain 10 Characters");
}else if(!preg_match("/07[0,1,2,3,4,5,6,7,8]{1}[0-9]{7}/",$mobile)){
    echo("Your Mobile Number is Invalid");
}else if(empty($uname)){
    echo("Please Enter Your User Name");
}else if(strlen($uname) > 20){
    echo("Your User Name should be less than 20 Characters");
}else if(empty($password)){
    echo("Please Enter Your Password");
}else if(strlen($password) < 5 || strlen($password) > 20){
    echo("Your User Name should be less than 20 Characters");
}else{
    $rs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."' OR `mobile`='".$mobile."' OR `user_name`='".$uname."'");
    $num = $rs->num_rows;
    if($num > 0){
     echo("Your are allreday exits");
    }else{
     Database::iud("INSERT INTO `user`(`fname`,`lname`,`email`,`mobile`,`user_name`,`password`)
     VALUES('".$fname."','".$lname."','".$email."','".$mobile."','".$uname."','".$password."')");
 
     echo("success");
   }



}










?>