<?php 
    include "config.php";
    const number = 8;

    $recordsPerPage = number;

    if (isset($_GET['page'])) {
      $currentPage = $_GET['page'];
    }
    else {
      $currentPage = 1;
    }

    // getting starting record index for employee and salary section
    $start = ($currentPage - 1) * $recordsPerPage;

    $totalRecordsQuery = "SELECT COUNT(*) AS total FROM Employee";
    $totalResult = mysqli_query($conn, $totalRecordsQuery);
    $totalRecords = mysqli_fetch_assoc($totalResult)['total'];

    $totalPages = ceil($totalRecords / $recordsPerPage);

    // for assets
    $totalRecordAssets = "SELECT COUNT(*) AS assets_number FROM Employee WHERE Employee.asset_Id IS NOT NULL";
    $totalAssetResult = mysqli_query($conn, $totalRecordAssets);
    $totalAssets = mysqli_fetch_assoc($totalAssetResult)['assets_number'];

    $totalPagesAssets = ceil($totalAssets / $recordsPerPage);


?>