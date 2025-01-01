<?php
include "connection.php";

$id = $_GET['s'];

$q = "SELECT * FROM `customer` INNER JOIN `education` ON `customer`.`education_education_id` = `education`.`education_id` INNER JOIN `gender` ON 
 `customer`.`gender_gender_id` = `gender`.`gender_id` INNER JOIN `province` ON `customer`.`province_province_id` = `province`.`province_id` 
 INNER JOIN `religion` ON `customer`.`religion_religion_id` = `religion`.`religion_id` WHERE `customer`.`id` = '".$id."'";

$rs = Database::search($q);
$d = $rs->fetch_assoc();


?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Romiyo.lk - Leading Wedding Proposal and Matchmaking Platform in Sri Lanka</title>
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


  <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="icon" href="img/logo.png" type="image/x-icon"/>
  <style>
    body {
      background:  radial-gradient(circle, #ff007f, #007fff);
      color: #333;
    }
    .profile-img {
      width: 150px;
      height: 150px;
      object-fit: cover;
      border-radius: 50%;
      border: 5px solid #fff;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
    }
    .personal-details {
      margin-top: 20px;
    }
    .card {
      margin-top: 20px;
      background-color: #fff;
      border: none;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }
    .card-header {
      background-color: #ff7e5f;
      color: #fff;
    }
    .btn-home {
      margin-top: 20px;
      background-color: #ff7e5f;
      color: #fff;
    }
    .btn-home:hover {
      background-color: #ff6b4f;
      color: #fff;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="text-center mt-3 mb-2">
           
             <?php
             if($d['gender_gender_id'] == '1'){
                 ?>
              <img src="resources/male1.png" class="card-img-top " style="width: 30%; height: 150px; ">
     
     
                <?php
             }else if($d['gender_gender_id'] == '2'){
                 ?>
             <img src="resources/female1.png" class="card-img-top" style="width: 30%; height: 150px; ">
     
     
              <?php
             }
             
             ?>
            
        
          <!-- <img src="your-image-url.jpg" alt="Profile Image" class="profile-img"> -->
          <p class="lead fw-bold"> <?php echo $d['favarite'];?></p>
          <a href="index.php" class="btn btn-home">Back to Home</a>
        </div>
        <div class="personal-details">
          
          <div class="card">
            <div class="card-header">
              Personal Details
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <p><strong>Age:</strong> <?php echo $d['age'];?></p>
                  <p><strong>City:</strong> <?php echo $d['city'];?></p>
                  <p><strong>Email:</strong> <?php echo $d['email'];?></p>
                 
                  <p><strong>Romiyo Id:</strong> YT24<?php echo $d['id'];?></p>
                  <p><strong>Gender:</strong> <?php echo $d['gender_name'];?></p>
                </div>
                <div class="col-md-6">
                  <p><strong>Province:</strong> <?php echo $d['province_name'];?></p>
                  <p><strong>Education:</strong> <?php echo $d['education_name'];?></p>
                  <p><strong>Religion:</strong> <?php echo $d['religion_name'];?></p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 mt-2">
          <img src="img/add.png" style="width: 100%; height:300px;" alt="">

          </div>
          <div class="card mb-3">
            <div class="card-header">
              Description
            </div>
            <div class="card-body">
                <p><?php echo $d['description'];?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
