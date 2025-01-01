<?php
session_start();

include "connection.php";


$email = $_POST["e"];
$password = $_POST["pw"];

if(empty($email)){

    echo("Please Enter Your Email Address");

}else if(strlen($email) > 100){

    echo("Your Email Address should be less than 100 Characters");


}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

    echo("Your Email addres is Invalid");

}else if(empty($password)){

    echo("Please Enter Your  password");

}else if(strlen($password) < 5 || strlen($password) > 25){

    echo("Your User Name should be less than 25 Characters");

}else {

   $rs = Database::search("SELECT * FROM `admin` WHERE `email`='".$email."' AND `password`='".$password."'");

   $num = $rs->num_rows;
   if($num > 0){

    echo("You are Already Exists");

   }else{
        Database::iud("INSERT INTO `admin`(`email`,`password`) VALUES ('".$email."','".$password."')");

        echo("Success");


   }

}


?>