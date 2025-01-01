<?php
session_start();

if (isset($_SESSION["a"])) {

    
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin- Dashbord</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="icon" href="img/logo.png" type="image/x-icon" />

    </head>

    <body class="d-flex flex-column min-vh-100">

        <!-- admin navi -->
        <nav class="navbar navbar-expand-sm navbar-dark ">
            <div class="container-fluid col-4">
                <a class="navbar-brand" href="adminDashbord.php">
                    <img src="img/logo.png" alt="Logo" style="width:100px;" class="rounded-pill">
                </a>
            </div>
            <div class="col-5">
                <h1 class="welcome playwrite-au-vic-welcome">Romiyo.lk Admin</h1>

            </div>
            <div class="col-3">

                <a href="addpost.php"> <button class="btn btn-outline-info">POST ADD</button> </a> 
               

            </div>


        </nav>
        <!-- admin navi -->

        <!-- Content -->
        <div class="flex-grow-2 mt-4">

            <!-- Add An Admin Box-->

            <div class="col-6 container-fluid mt-5 border border-dark p-4 rounded-4 signInbox">
                <div class="col-12 " id="signInbox">


                    <h1 class="text-center text-warning ">Add An Admin</h1>
                    <div class="mt-3 col-12 mt-3">
                        <label for="form-label">User name</label>
                        <input type="text" class="form-control" id="e" value="" />
                    </div>

                    <div class="mt-2 col-12 mt-3">
                        <label for="form-label">Password</label>
                        <input type="password" class="form-control" id="pw" value="" />
                    </div>

                    <div class="mt-2 col-12 mt-4">
                        <button class="btn btn-outline-info col-12" onclick="AdminRegister();">Registor </button>
                    </div>


                </div>

            </div>
            

            <!-- Add An Admin Box-->


        </div>


        <!-- Content -->
         <div class="col-6 container-fluid mt-4">
       <a href="seepost.php"><button class="btn btn-outline-secondary col-12">See Post</button></a>  

         </div>

         <div class="col-6 container-fluid mt-4">
       <a href="conform.php"><button class="btn btn-outline-secondary col-12">Conform Proposal</button></a>  


         </div>






        <!-- Footer -->
        <footer class="footer mt-auto py-3 bg-light">
            <div class="container-fluid text-center">
                &copy; <span>Romiyo.lk</span>
            </div>
        </footer>
        <!-- Footer -->

        <script src="script.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>



    </body>

    </html>

<?php
} else {

    echo ("You are not a Valid Admin ");
}

?>