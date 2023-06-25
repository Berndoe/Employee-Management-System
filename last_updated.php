<?php

include "config.php";
include "time_difference.php";

$employee_table_update = "SELECT insert_time FROM Employee ORDER BY insert_time DESC LIMIT 1";

$salary_table_update = "SELECT payment_status_update_time FROM Employee ORDER BY payment_status_update_time DESC LIMIT 1";

$asset_table_update = "SELECT asset_update_time FROM Employee ORDER BY asset_update_time DESC LIMIT 1";

$employee_display = determineTimeDisplay($employee_table_update);
$salary_display = determineTimeDisplay($salary_table_update);
$asset_display = determineTimeDisplay($asset_table_update);

?>