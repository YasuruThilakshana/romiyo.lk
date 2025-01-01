<?php

include "connection.php";
session_start();
$_SESSION["u"];

$gender = $_POST["gender"];
$age = $_POST["age"];
$date = $_POST["date"];
$education = $_POST["education"];
$job = $_POST["job"];
$city = $_POST["city"];
$religion = $_POST["religion"];
$email = $_POST["email"];
$contact = $_POST["contact"];
$province = $_POST["province"];
$description = $_POST["description"];
$add = $_POST["add"];


//echo($gender);

if(empty($gender)){
    echo("Pleace Enter Your Gnder");
}else if(empty($age)){
    echo("Pleace Enter Your age ");
}else if(empty($date)){
    echo("Pleace Enter Post Add Date  ");
}else if(empty($education)){
    echo("Pleace Enter Education Qulification ");
}else if(strlen($job) > 45){
    echo("you can type maximum number 45 ");
}else if(empty($city)){
    echo("Please Enter Your city ");
}else if(empty($religion)){
    echo("Please Enter Your religion ");
}else if(strlen($email) > 100){
    echo("you can type maximum number 100 ");
}else if(empty($contact)){
    echo("Please Enter Your contact number ");
}else if(strlen($contact) > 45){
    echo("you can type maximum number 45 ");
}else if(empty($province)){
    echo("Please Enter Your Province ");
}else if(empty($description)){
    echo("Please Enter description ");
}else {

 Database::iud("INSERT INTO `customer`(`age`,`city`,`email`,`contact_no`,`description`,`gender_gender_id`,`province_province_id`,`religion_religion_id`,`education_education_id`,`time_added`,`job`,`favarite`,`customer_status`) 
VALUES ('".$age."','".$city."','".$email."','".$contact."','".$description."','".$gender."','".$province."','".$religion."','".$education."','".$date."','".$job."','".$add."','2');");



echo "success";




}












?>