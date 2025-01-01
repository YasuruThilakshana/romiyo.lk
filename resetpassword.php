<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="img/logo.png" type="image/x-icon" />
    <title>Romiyo - Reset password</title>

    <style>
        body, html {
            height: 100%;
            margin: 0;
        }
        .normal-sign-body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
        .signInbox {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            border-radius: 8px;
        }
    </style>
</head>
<body  class="normal-sign-body">
      <!-- Reset password Box--> 
<div class="signInbox   " id="signInbox">


<h1 class="text-center text-warning "> Reset Password</h1>

<div class="d-none">
    <input type="hodden" id="vcode" value="<?php echo($_GET["vcode"])?>"/>
</div>


<div class="mt-2">
   <label for="form-label" >password</label>
   <input type="password" class="form-control" id="np" value=""/>
</div>
<div class="mt-2">
   <label for="form-label" >Re-enter password</label>
   <input type="password" class="form-control" id="np2" value=""/>
</div>

<div class=" d-none" id="msgDiv2">
   <div class="alert alert-danger" id="msg2"> </div>
</div>
<div class="mt-2">
    <button class="btn btn-secondary col-12" onclick="resetPassword();" >Update Password</button>
</div>



</div>

      <!-- Reset password Box--> 

      <script src="script.js"></script>

   
</body>
</html>