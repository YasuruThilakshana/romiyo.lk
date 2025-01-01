<?php
session_start();

include "connection.php";


$email = $_POST["ae"];
$password = $_POST["ap"];

//echo($username);

if(empty($email)){
    echo("Please Enter your Email ");
}else if(empty($password)){
    echo("Please Enter Your Password");
}else{
    $rs = Database::search("SELECT * FROM `admin` WHERE `email`='".$email."' AND `password`='".$password."'");
    $num = $rs->num_rows;
    if($num == 1){

        $d = $rs->fetch_assoc();

        if($d["type"] == 'a'){
            echo ("Success");


            $_SESSION["a"] = $d;

           }else{
    
            echo ("You don't have an Admin Account");
    
           }
     
             
    }else{
        echo("Invalid Username Or Password");

    }
}
?>