<?php

include "connection.php";

$pageno = isset($_POST["page"]) ? $_POST["page"] : 1;
$education = isset($_POST["education"]) ? $_POST["education"] : '';
$religion = isset($_POST["religion"]) ? $_POST["religion"] : '';
$province = isset($_POST["province"]) ? $_POST["province"] : '';
$gender = isset($_POST["gender"]) ? $_POST["gender"] : '';
$fage = isset($_POST["fage"]) ? $_POST["fage"] : '';
$tage = isset($_POST["tage"]) ? $_POST["tage"] : '';

$status = 0;

$q = "SELECT * FROM `customer` 
INNER JOIN `education` ON `customer`.`education_education_id` = `education`.`education_id`
INNER JOIN `gender` ON `customer`.`gender_gender_id` = `gender`.`gender_id`
INNER JOIN `province` ON `customer`.`province_province_id` = `province`.`province_id`
INNER JOIN `religion` ON `customer`.`religion_religion_id` = `religion`.`religion_id`";

$conditions = [];

// Function to check if a value is a valid selection
function is_valid_selection($value) {
    return !empty($value) && $value !== '0' && $value !== 'Select Education' && $value !== 'select your religion' && $value !== 'select your province';
}

// Search by education
if (is_valid_selection($education)) {
    $conditions[] = "`education`.`education_id` = '" . $education . "'";
}

// Search by religion
if (is_valid_selection($religion)) {
    $conditions[] = "`religion`.`religion_id` = '" . $religion . "'";
}

// Search by province
if (is_valid_selection($province)) {
    $conditions[] = "`province`.`province_id` = '" . $province . "'";
}

// Search by gender
if (is_valid_selection($gender)) {
    $conditions[] = "`gender`.`gender_id` = '" . $gender . "'";
}

// Search by age range
if (!empty($fage) && !empty($tage)) {
    $conditions[] = "`customer`.`age` BETWEEN '" . $fage . "' AND '" . $tage . "'";
} elseif (!empty($fage)) {
    $conditions[] = "`customer`.`age` >= '" . $fage . "'";
} elseif (!empty($tage)) {
    $conditions[] = "`customer`.`age` <= '" . $tage . "'";
}

// Add condition for customer status
$conditions[] = "`customer`.`customer_status` = '1'";

// Add conditions to query
if (count($conditions) > 0) {
    $q .= " WHERE " . implode(" AND ", $conditions);
}

$q .= " ORDER BY `customer`.`age` ASC";

$rs = Database::search($q);
$num = $rs->num_rows;

$results_per_page = 4;
$num_of_pages = ceil($num / $results_per_page);
$page_results = max(0, ($pageno - 1) * $results_per_page);

$q2 = $q . " LIMIT $results_per_page OFFSET $page_results";
$rs2 = Database::search($q2);
$num2 = $rs2->num_rows;

if ($num2 == 0) {
    ?>
    <div class="d-flex flex-column justify-content-center mt-5 align-items-center">
        <h5>Search No Results</h5>
        <p>We're Sorry, We cannot find any matches for your search terms.</p>
    </div>
    <?php
} else {
    for ($i = 0; $i < $num2; $i++) {
        $d = $rs2->fetch_assoc();
        ?>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-4 mb-5 d-flex justify-content-center">
            <div class="card bg-light" style="width: 100%; max-width: 300px;">
                <a href="singerUserview.php?s=<?php echo $d['id'] ?>">
                <?php if ($d['gender_name'] == 'male') { ?>
                    <img src="resources/male1.png" class="card-img-top" style="width: 100%; height: 200px;">
                <?php } elseif ($d['gender_name'] == 'female') { ?>
                    <img src="resources/female1.png" class="card-img-top" style="width: 100%; height: 200px;">
                <?php } ?>
                </a>
                <div class="card-body bg">
                    <h6 class="card-title"><?php echo $d['gender_name']; ?></h6>
                    <h6 class="card-text"><?php echo $d['city']; ?></h6>
                    <h6 class="card-text"><?php echo $d['job']; ?></h6>
                    <h6 class="card-text"><?php echo $d['age']; ?></h6>
                    <div class="d-grid gap-2">
                        <a href="singerUserview.php?s=<?php echo $d['id'] ?>">
                            <button class="btn btn-outline-primary mb-2 col-12">
                                <i class="bi bi-eye"></i><span>More</span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    <div class="d-flex justify-content-center mb-5">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <!-- Previous Button -->
            <li class="page-item">
                <a class="page-link" <?php if ($pageno <= 1) echo 'href="#"'; else { ?> onclick="advanceesarch(<?php echo ($pageno - 1); ?>);" <?php } ?> aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>

            <!-- Page Numbers -->
            <?php
            $start = max(1, $pageno - 1);
            $end = min($num_of_pages, $pageno + 1);

            if ($start > 1) {
                echo '<li class="page-item"><a class="page-link" onclick="advanceesarch(1);">1</a></li>';
                if ($start > 2) {
                    echo '<li class="page-item"><span class="page-link">...</span></li>';
                }
            }

            for ($y = $start; $y <= $end; $y++) {
                if ($y == $pageno) {
                    echo '<li class="page-item active"><a class="page-link" onclick="advanceesarch(' . $y . ');">' . $y . '</a></li>';
                } else {
                    echo '<li class="page-item"><a class="page-link" onclick="advanceesarch(' . $y . ');">' . $y . '</a></li>';
                }
            }

            if ($end < $num_of_pages) {
                if ($end < $num_of_pages - 1) {
                    echo '<li class="page-item"><span class="page-link">...</span></li>';
                }
                echo '<li class="page-item"><a class="page-link" onclick="advanceesarch(' . $num_of_pages . ');">' . $num_of_pages . '</a></li>';
            }
            ?>

            <!-- Next Button -->
            <li class="page-item">
                <a class="page-link" <?php if ($pageno >= $num_of_pages) echo 'href="#"'; else { ?> onclick="advanceesarch(<?php echo ($pageno + 1); ?>);" <?php } ?> aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>

    <?php
}
?>
