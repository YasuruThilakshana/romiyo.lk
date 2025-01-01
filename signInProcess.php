<?php

session_start();

include "connection.php";


$un = $_POST["u"];
$pw = $_POST["p"];
$rm = $_POST["r"];


// echo($un);
// echo($pw);
// echo($rm);

if(empty($un)){
    echo("Please Enter Your UserName");
}else if(empty($pw)){
    echo("Please Enter Your Password");
}else{
   $rs = Database::search("SELECT * FROM `user` WHERE `user_name` ='".$un."'AND `password`='".$pw."'");
    $num = $rs->num_rows;
    $d = $rs->fetch_assoc();

    if($num == 1){ 
        //Home
        if($d["user_type"] == 'u'){

            echo ("Success");

            $_SESSION["u"] = $d;

            if($rm == "true"){
                setcookie("user_name",$un,time() + (60*60*24*365));
                setcookie("password",$pw,time() + (60*60*24*365));
            }else{
                setcookie("user_name","",-1);
                setcookie("password","",-1);
            }
        }else{
            echo("Inactive usar");
        }
    }
    else{
        echo ("Invalid UserName Or Password");
    }
    
}

?>