<?php
session_start();

include "connection.php";

if (isset($_SESSION["a"])) {

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
        <link rel="stylesheet" href="profile.css">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="icon" href="img/logo.png" type="image/x-icon" />

    </head>

    <body class="body">
        <div class="container rounded bg-info mt-5 mb-5">
        <a href="adminDashbord.php"> <button class="btn btn-light mt-1">Dashbord</button></a>

            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-3"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                        <span>
                        </span>
                      
                    </div>
                     
                </div>

                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-12"><label class="labels">Gender</label>
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
                            <div class="col-md-12"><label class="labels">Age</label><input type="text" class="form-control" placeholder="Age" id="age" value=""></div>
                          <div class="col-md-12"><label class="labels"> Post Add Date</label><input type="date" class="form-control" value="" id="date" placeholder="Birth of Year"></div> 
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels"> Education</label>
                                <select class="form-select" id="education">
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
                            <div class="col-md-12"><label class="labels">Job</label><input type="text" class="form-control" placeholder="Software Engenerr" id="job" value=""></div>
                            <div class="col-md-12"><label class="labels">city</label><input type="text" class="form-control" placeholder="enter address line 2" id="city" value=""></div>
                            <div class="col-md-12"><label class="labels">Religon</label>
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
                            <div class="col-md-12"><label class="labels">Email </label><input type="text" class="form-control" placeholder="abc@gmail.com" id="email" value=""></div>
                            <div class="col-md-12"><label class="labels">Contact No</label><input type="text" class="form-control" placeholder="0789133375" id="contact" value=""></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Province</label>
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

                            <div class="col-md-12"><label class="labels">description</label>
                                <textarea class="form-control" id="description" rows="3"></textarea>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center experience"><span>Adithional</span></div><br>
                        <div class="col-md-12"><label class="labels">Favarite things</label> <textarea class="form-control" id="add" rows="3"></textarea>
                        </div> <br>
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button" onclick="addpost();">Add post</button></div>

                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>


        <script src="script.js"></script>
    </body>

    </html>
<?php
} else {

    echo ("You are not a Valid Admin ");
}
?>