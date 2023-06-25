<?php
    include "config.php";
    include "last_updated.php";

    session_start();
    
    if (!isset($_SESSION['email']) || !isset($_SESSION['pass'])) {
      header("Location: index.php");
      exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Home</title>
    
</head>
<header>
    <!-- navigation bar content  -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #0298cf;">
        <a class="navbar-brand" href="./Home Page.php" style="color: white;">Axon Employee Management System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-item nav-link active" href="Employee Page.php" style="color: white;">Employees <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="Salary Page.php" style="color: white;">Salaries</a>
            <a class="nav-item nav-link" href="Asset Page.php" style="color: white;">Assets</a>
            <a class="nav-item nav-link" href="logout.php" style="color: white;">
              Log Out
            </a>
          </div>
        </div>
      </nav>
    </header>

 <style>
    /* header styling */
    .nav-item {
        margin-left: 200px;
        padding-left:50%;
        font-size: 18px;
    }

    .card {
      margin-top: 13%;
      display: flex;
      
    }

    .card-deck {
      padding-left: 120px;
      padding-right: 120px;
    }

    .number {
      font-size: 400%;
      font-weight: bolder;
    }
 </style>

<body>
    <!-- cards -->
    <?php

    // Number of employees display
     $employee_sql = "SELECT * FROM Employee";
     if($result = mysqli_query($conn, $employee_sql)) { $number_of_employees = mysqli_num_rows($result); }

    //  Number of paid salaries
    $salary_sql = "SELECT * FROM Employee WHERE payment_status ='Paid'";
    if($result = mysqli_query($conn, $salary_sql)) { $number_of_paid_employees = mysqli_num_rows($result); }

    // number of assets assigned
    $assets_sql = "SELECT * FROM Employee, Assets WHERE Employee.asset_Id = Assets.asset_Id";
    if($result = mysqli_query($conn, $assets_sql)) { $asset_number = mysqli_num_rows($result); }
     
  ?>


    <div class="card-deck">   
      
      <!-- Number of employees -->
      <div class="card">
        <div class="card-body">
          <p class="card-title">Number of Employees</p>
          <p class="card-text number" style="color:#0298cf">
            <?php echo $number_of_employees?>
          </p>
        </div>
        <div class="card-footer">
          <small class="text-muted"><?php echo $employee_display;?></small>
        </div>
      </div>

      <!-- Paid salaries -->
      <div class="card">
        <div class="card-body">
          <p class="card-title">Paid Salaries</p>
          <p class="card-text number" style="color:crimson">
            <?php echo $number_of_paid_employees ?>
          </p>
        </div>
        <div class="card-footer">
          <small class="text-muted"><?php echo $salary_display; ?></small>
        </div>
      </div>

      <!-- Number of assets -->
      <div class="card">
        <div class="card-body">
          <p class="card-title">Assets Assigned</p>
          <p class="card-text number" style="color:green;">
            <?php echo $asset_number ?>
          </p>
        </div>
        <div class="card-footer">
          <small class="text-muted"><?php echo $asset_display;?></small>
        </div>
      </div>
  
  </div>

    <!-- Footer -->
    <footer class="page-footer font-small blue fixed-bottom" style="background-color: #0298cf">
        <div class="footer-copyright text-center py-3">
        <p style="color: white;">Copyright © 2022 Axon Information Systems - All Rights Reserved.</p>
        </div>  
    </footer>
      
</body>
</html>