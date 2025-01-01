<?php
include "connection.php";

session_start();

$q = "SELECT * FROM `customer` INNER JOIN `education` ON `customer`.`education_education_id` = `education`.`education_id` INNER JOIN `gender` ON 
 `customer`.`gender_gender_id` = `gender`.`gender_id` INNER JOIN `province` ON `customer`.`province_province_id` = `province`.`province_id` 
 INNER JOIN `religion` ON `customer`.`religion_religion_id` = `religion`.`religion_id` ";

$rs = Database::search($q);
$d = $rs->fetch_assoc();


?>


<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Romiyo.lk - Leading Wedding Proposal and Matchmaking Platform in Sri Lanka</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="img/logo.png" type="image/x-icon" />
    <!-- seo -->
    <meta name="description" content="Romiyo.lk is the top matchmaking platform in Sri Lanka, helping individuals find their perfect partner for beautiful wedding proposals and lasting marriages.">
    <meta name="keywords" content="matchmaking, wedding proposals, Sri Lanka, find partner, marriage, Romiyo.lk">
    <link rel="canonical" href="https://www.romiyo.lk/">
    <meta property="og:title" content="Romiyo.lk - Leading Wedding Proposal and Matchmaking Platform in Sri Lanka">
    <meta property="og:description" content="Romiyo.lk is the top matchmaking platform in Sri Lanka, helping individuals find their perfect partner for beautiful wedding proposals and lasting marriages.">
    <meta property="og:url" content="https://www.romiyo.lk/">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://www.romiyo.lk/images/logo.png">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Romiyo.lk - Leading Wedding Proposal and Matchmaking Platform in Sri Lanka">
    <meta name="twitter:description" content="Romiyo.lk is the top matchmaking platform in Sri Lanka, helping individuals find their perfect partner for beautiful wedding proposals and lasting marriages.">
    <meta name="twitter:image" content="https://www.romiyo.lk/images/logo.png">
    <meta name="language" content="English">
    <!-- seo -->

    <style>
        .vision{
            font-family: 'Courier New', Courier, monospace;
            color:blue
        }
    </style>



</head>

<body class="d-flex flex-column min-vh-100" onload="lordUser(0);">
    <nav class="navbar navbar-expand-sm navbar-dark ">
        <div class="container-fluid col-4">
            <a class="navbar-brand" href="index.php">
                <img src="img/logo.png" alt="Logo" style="width:100px;" class="rounded-pill">
            </a>
        </div>
        <div class="col-5">
            <h1 class="welcome playwrite-au-vic-welcome">Welcome to Romiyo.lk</h1>

        </div>
        <div class="col-3">

          <a href="useraddpost.php"> <button class="btn btn-info" >Add post</button></a> 

        </div>


    </nav>

    <div class="container-fluid text-center">

    <div class="mt-3 ">

    <div class="col-12">

    <button class="btn btn-outline-info col-9"  onclick="viewFilter();"><i class="fa fa-search"></i> Search your partner</button>

    </div>
 <div class="col-12 mt-2">
     <!-- <button class="bg-dark">hello</button> -->
   <a href="signin.php"> <button class="btn btn-outline-info col-4 ms-2" >LogIn</button></a>
    <button class="btn btn-outline-info col-4 me-2"  onclick="signout();">Logout</button>

 </div>
   
    </div>

    </div>

    <!-- Carousel -->


    <!-- Carousel -->
    <!-- advance search -->
    <div class="d-none" id="filterId">
        <div class="container mt-4 ">
            <div class="border border-dark p-4 rounded-4">
                <div class="row mb-3">
                    <div class="col-md-6 mb-3">
                        <label for="education" class="form-label">Education</label>
                        <select id="education" class="form-select">
                            <Option>Select Education</Option>
                            <?php
                            $education_rs = Database::search("SELECT * FROM `education`");
                            $num_education = $education_rs->num_rows;

                            for ($i = 0; $i < $num_education; $i++) {

                                $education_d = $education_rs->fetch_assoc();
                            ?>
                                <option value="<?php echo $education_d["education_id"]; ?>"><?php echo $education_d["education_name"]; ?></option>
                            <?php

                            }
                            ?>
                        </select>

                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="religion" class="form-label">Religion</label>
                        <select class="form-select" id="religion">
                            <Option>select your religion</Option>
                            <?php
                            $religion_rs = Database::search("SELECT * FROM `religion`");
                            $num_religion = $religion_rs->num_rows;

                            for ($i = 0; $i < $num_religion; $i++) {

                                $religion_d = $religion_rs->fetch_assoc();
                            ?>
                                <option value="<?php echo $religion_d["religion_id"]; ?>"><?php echo $religion_d["religion_name"]; ?></option>
                            <?php

                            }
                            ?>
                        </select>

                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 mb-3">
                        <label for="province" class="form-label">Province</label>
                        <select class="form-select" id="province">
                            <Option>select your province</Option>
                            <?php
                            $province_rs = Database::search("SELECT * FROM `province`");
                            $num_province = $province_rs->num_rows;

                            for ($i = 0; $i < $num_province; $i++) {

                                $province_d = $province_rs->fetch_assoc();
                            ?>
                                <option value="<?php echo $province_d["province_id"]; ?>"><?php echo $province_d["province_name"]; ?></option>
                            <?php

                            }
                            ?>

                        </select>


                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" id="gender">
                            <option value="">Select Your Gender</option>
                            <?php
                            $gender_rs = Database::search("SELECT * FROM `gender`");
                            $num_gender = $gender_rs->num_rows;

                            for ($i = 0; $i < $num_gender; $i++) {

                                $gender_d = $gender_rs->fetch_assoc();
                            ?>
                                <option value="<?php echo $gender_d["gender_id"]; ?>"><?php echo $gender_d["gender_name"]; ?></option>
                            <?php

                            }
                            ?>
                        </select>

                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-5 mb-3">
                        <input type="text" class="form-control" id="fage" placeholder=" From Age ">
                    </div>
                    <div class="col-md-5 mb-3">
                        <input type="text" class="form-control" id="tage" placeholder="To Age ">
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-outline-info w-100" onclick="advanceesarch(0);">filter</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Advance Search -->


    <!-- Main content goes here -->

    <!-- Main content -->
    <div class="flex-grow-2 mt-4">
        <div class="container-fluid">
            <div class="row" id="uid">
                <!-- Cards will be loaded here -->
            </div>
        </div>
    </div>
    <!-- Main content -->



    <!-- Main content goes here -->

    <!-- Footer -->
    <footer class="footer mt-auto py-3 bg-light">
        <div class="container-fluid text-center">
            <h4>&copy; <span>Romiyo.lk</span></h4>
            <div class="row col-12  mt-2 ">
                <div class="col-4">
                    <div class="contact-info">

                       <a href="mailto:example@example.com?subject=Your Subject Here&body=Your Message Here"><i class="material-icons" style="font-size:24px">mail</i></a> 
                        <h6>Email: romiyosrilanka@gmail.com</h6>

                    </div>
                </div>
                <div class="col-4">
                  <a href="https://www.facebook.com/profile.php?id=61561553854194&mibextid=ZbWKwL"><i class="fa fa-facebook-official ms-4 " style="font-size:24px"></i></a>  
                   <a href="https://www.instagram.com/romiyo.lk7?igsh=aXlnZjJndWc1NmZ2"><i class="fa fa-instagram ms-4" style="font-size:24px"></i></a> 
                 <a href="https://wa.me/94701852150"><i class="fa fa-whatsapp ms-4" style="font-size:24px"></i></a>   
                </div>
                <div class="col-4">
                    <div class="contact-info">

                       <a href="tel:+0701852159"><i class="fa fa-mobile-phone" style="font-size:36px; "></i></a> 
                        <h6>Mobile: 0701852159</h6>

                    </div>

                </div>

            </div>
            <div class="row col-12 mt-2">

            <h6 class="mt-2 vision " style="font-weight: bold;"><span>To be the leading platform in Sri Lanka that brings together individuals seeking lifelong partners,<br>
            fostering meaningful connections that lead to beautiful wedding proposals and enduring marriages.</span></h6>
                

            </div>
        </div>
    </footer>
    <!-- Footer -->

    <script src="script.js"></script>
</body>

</html>