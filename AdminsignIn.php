<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="icon" href="img/logo.png" type="image/x-icon"/>
   
</head>
<body>
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Admin Login</h2>
              <p class="text-white-50 mb-5">Please enter your Email and password!</p>

              <div data-mdb-input-init class="form-outline form-white mb-4">
              <input type="text" class="form-control border-black" placeholder="Ex: Sahan" id="Aemail"/>
                <label class="form-label" for="typeEmailX">Email</label>
              </div>

              <div data-mdb-input-init class="form-outline form-white mb-4">
              <input type="password" class="form-control border-black" placeholder="Ex: Sahan" id="Apassword" />
                <label class="form-label" for="typePasswordX">Password</label>
              </div>


              <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit" onclick="adminsignin();">Login</button>


            </div>

           

          </div>
        </div>
      </div>
    </div>
  </div>
</section>



<script src="script.js"></script>
</body>
</html>