

<?php

include "connection.php";

$userId = $_POST["c"];

Database::iud("DELETE FROM `customer` WHERE `id`='".$userId."'");

echo("Item successfully remove from Database.");

?>










