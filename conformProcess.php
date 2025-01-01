<?php

include "connection.php";

$userId = $_POST["c"];

Database::iud("UPDATE `customer` SET `customer_status` = 1 WHERE `id` = '".$userId."';");


echo("Proposal is added");






?>