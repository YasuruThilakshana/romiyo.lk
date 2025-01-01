 <?php

  include "connection.php";

  session_start();

 // $user = $_SESSION['u'];

  if (isset($_SESSION["u"])){

    $rs =  Database::search(" SELECT * FROM `customer` INNER JOIN `education` ON `customer`.`education_education_id` = `education`.`education_id` INNER JOIN `gender` ON 
    `customer`.`gender_gender_id` = `gender`.`gender_id` INNER JOIN `province` ON `customer`.`province_province_id` = `province`.`province_id` 
    INNER JOIN `religion` ON `customer`.`religion_religion_id` = `religion`.`religion_id`");
   
       $d = $rs->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="icon" href="img/logo.png" type="image/x-icon" />

    <style>
      .body1{
        background-color: palevioletred;

      }
    </style>

</head>
<body class="body1">
<div class="container rounded bg-info mt-5 mb-5">
        <a href="index.php"> <button class="btn btn-light mt-1">HOME</button></a>

            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-3"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                        <span>
                        </span>
                        <img src="img/number.png" class="mt-3" style="width: 100%;" alt="">
                    </div>

                </div>

                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Add Your Proposal</h4>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-12"><label class="labels">Gender <label style="color: red;">*(compalsory)</label> </label>
                                <select class="form-select" id="gender1">
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
                            <div class="col-md-12"><label class="labels">Age <label style="color: red;">*(compalsory)</label></label><input type="text" class="form-control" placeholder="Age" id="age1" value=""></div>
                          <div class="col-md-12"><label class="labels"> Post Add Date</label><input type="date" class="form-control" value="" id="date1" placeholder="Birth of Year"></div> 
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels"> Education <label style="color: red;">*(compalsory)</label></label>
                                <select class="form-select" id="education1">
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
                            <div class="col-md-12"><label class="labels">Job</label><input type="text" class="form-control" placeholder="Doctor" id="job1" value=""></div>
                            <div class="col-md-12"><label class="labels">city <label style="color: red;">*(compalsory)</label></label><input type="text" class="form-control" placeholder="colombo" id="city1" value=""></div>
                            <div class="col-md-12"><label class="labels">Religon <label style="color: red;">*(compalsory)</label></label>
                                <select class="form-select" id="religion1">
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
                            <div class="col-md-12"><label class="labels">Email </label><input type="text" class="form-control" placeholder="abc@gmail.com" id="email1" value=""></div>
                            <div class="col-md-12"><label class="labels">Contact No <label style="color: red;">*(compalsory)</label></label><input type="text" class="form-control" placeholder="0789133375" id="contact1" value=""></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Province <label style="color: red;">*(compalsory)</label></label>
                                <select class="form-select" id="province1">
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

                            <div class="col-md-12"><label class="labels">description <label style="color: red;">*(compalsory)</label></label>
                                <textarea class="form-control" id="description1" rows="3"></textarea>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 py-5 mt-2">
                        <div class="col-md-12"><label class="labels">Favarite things</label> <textarea class="form-control" id="add1" rows="3"></textarea>
                        </div> <br>
                       
                        <div class="mt-2 text-center"><label for="" style="font-weight: bold;" >step 01</label></div>
                        <div class="mt-2 text-center"><button class="btn  profile-button" style="background-color: palevioletred; font-weight:bold" type="button" onclick="addproposal();">Add Your Proposal</button></div>
                       

                        <div class="mt-2 text-center"><label for="" style="font-weight: bold;">step 02</label></div>
                        <div class="mt-2 text-center"><a href="https://wa.me/94701852150"><button class="btn  profile-button" style="background-color: palevioletred; font-weight:bold" type="button" >Contact WhatsApp</button></a></div>
                       

                        <img src="img/Romiyo.lk.post.png" class="mt-3" style="width: 100%; height: 50vh; " alt="">

                    </div>
                    <!-- <div class="p-3 py-5 ">
                        <img src="img/posting.png" class="" style="width: 100%; height: 50vh; " alt="">
                        
                    </div> -->

                </div>
            </div>
        </div>
        </div>
        </div>

  

  



<script src="script.js"></script>
</body>
</html>

<?php

  }else{

    header("location:signin.php");
    
  }
  
  ?>



