<?php
include "connection.php";

$pagenumber = 0;
$page = isset($_POST["p"]) ? $_POST["p"] : 1;

if ($page != 0) {
    $pagenumber = $page;
} else {
    $pagenumber = 1;
}

$q  = " SELECT * FROM `customer` INNER JOIN `education` ON `customer`.`education_education_id` = `education`.`education_id` INNER JOIN `gender` ON 
 `customer`.`gender_gender_id` = `gender`.`gender_id` INNER JOIN `province` ON `customer`.`province_province_id` = `province`.`province_id` 
 INNER JOIN `religion` ON `customer`.`religion_religion_id` = `religion`.`religion_id` WHERE `customer`.`customer_status` = '1' ORDER BY `customer`.`time_added` ASC";

$rs = Database::search($q);
$num = $rs->num_rows;

$results_per_page = 8;
$num_of_pages = ceil($num / $results_per_page);

$page_result = ($pagenumber - 1) * $results_per_page;

$q2 = $q . " LIMIT $results_per_page OFFSET $page_result";
$rs2 = Database::search($q2);
$num2 = $rs2->num_rows;

if ($num2 == 0) {
    echo ("Not Available Person");
} else {
    // load Stock
    for ($i = 0; $i < $num2; $i++) {
        $d =  $rs2->fetch_assoc();
?>

        <!-- cart -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-4 mb-5 d-flex justify-content-center">
    <div class="card bg-light" style="width: 100%; max-width: 300px;">
        <a href="singerUserview.php?s=<?php echo $d['id'] ?>">

        <?php
        if($d['gender_name'] == 'male'){
            ?>
         <img src="resources/male1.png" class="card-img-top" style="width: 100%; height: 200px; ">


           <?php
        }else if($d['gender_name'] == 'female'){
            ?>
        <img src="resources/female1.png" class="card-img-top" style="width: 100%; height: 200px; ">


         <?php
        }
        
        ?>

        </a>
        <div class="card-body bg">
            <h6 class="card-title"><?php echo $d['gender_name']; ?></h6>
            <h6 class="card-text"><?php echo $d['city']; ?></h6>
            <h6 class="card-text"><?php echo $d['job']; ?></h6>
            <h6 class="card-text"><?php echo $d['age']; ?></h6>
            <div class="d-grid gap-2">
            <a href="singerUserview.php?s=<?php echo $d['id'] ?>">
                <button class="btn btn-outline-primary mb-2 col-12 " ><i class="bi bi-eye"></i><span>More</span>  </button>
                </a>
            </div>
        </div>
    </div>
</div>


    <?php
    }
    ?>
    <!-- pagination -->
    <div class="d-flex justify-content-center mb-5">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <!-- Previous Button -->
            <li class="page-item">
                <a class="page-link" <?php if ($pagenumber <= 1) {
                                            echo 'href="#"';
                                        } else { ?> onclick="lordUser(<?php echo ($pagenumber - 1); ?>);" <?php } ?> aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>

            <!-- Page Numbers -->
            <?php
            $start = max(1, $pagenumber - 1);
            $end = min($num_of_pages, $pagenumber + 1);

            if ($start > 1) {
                echo '<li class="page-item"><a class="page-link" onclick="lordUser(1);">1</a></li>';
                if ($start > 2) {
                    echo '<li class="page-item"><span class="page-link">...</span></li>';
                }
            }

            for ($y = $start; $y <= $end; $y++) {
                if ($y == $pagenumber) {
                    echo '<li class="page-item active"><a class="page-link" onclick="lordUser(' . $y . ');">' . $y . '</a></li>';
                } else {
                    echo '<li class="page-item"><a class="page-link" onclick="lordUser(' . $y . ');">' . $y . '</a></li>';
                }
            }

            if ($end < $num_of_pages) {
                if ($end < $num_of_pages - 1) {
                    echo '<li class="page-item"><span class="page-link">...</span></li>';
                }
                echo '<li class="page-item"><a class="page-link" onclick="lordUser(' . $num_of_pages . ');">' . $num_of_pages . '</a></li>';
            }
            ?>

            <!-- Next Button -->
            <li class="page-item">
                <a class="page-link" <?php if ($pagenumber >= $num_of_pages) {
                                            echo 'href="#"';
                                        } else { ?> onclick="lordUser(<?php echo ($pagenumber + 1); ?>);" <?php } ?> aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>

    <!-- pagination -->
<?php
}
?>