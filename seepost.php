<?php

include "connection.php";
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

        <!-- basic search -->
        <!-- <div class="col-12 mt-2">
            <input type="text" class="col-6 ms-2" style="border-radius: 10%;" id="cid" placeholder="Type Id number">
            <button class="col-3 btn btn-info" onclick="search();">Search Id number</button>
        </div> -->
            
        <!-- basic search -->


        <!-- content -->
        <div class="container-fluid mt-5 me-2 ms-2">

            <table class="table">

                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">contact no</th>
                        <th scope="col">added date</th>
                        <th scope="col">delete</th>
                    </tr>
                </thead>
                <?php

                $rs =   Database::search("SELECT * FROM `customer` WHERE `customer`.`customer_status` = '1';");

                $num = $rs->num_rows;

                for ($i = 0; $i < $num; $i++) {
                    # code...
                    $d = $rs->fetch_assoc();
                ?>
                    <tbody>
                        <tr>
                            <th scope="row">YT24<?php echo $d["id"]; ?></th>
                            <td><?php echo $d["contact_no"]; ?></td>
                            <td><?php echo $d["time_added"]; ?></td>
                            <td><button onclick="removeuser(<?php echo $d['id']; ?>);">delete</button></td>
                        </tr>
                    </tbody>
                <?php
                }

                ?>


            </table>



        </div>


        <!-- content -->





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