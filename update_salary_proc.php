<?php
    include "config.php";
 
    if(isset($_POST['update_salary'])){
      $employee_id = $_POST['employee_Id'];
  
      $salary = $_POST['salary'];

      $payment_status = $_POST['payment_status'];
    
      $updatequery=mysqli_query($conn, "UPDATE Employee SET salary='$salary', payment_status = '$payment_status', payment_status_update_time = NOW() WHERE employee_Id='$employee_id'");
     if ($updatequery) {
      echo "<script>
          alert('Successfully Updated Employee-Salary Record');
          window.location.href = 'Salary Page.php';
        </script>";
     }
     else {
      echo "<script>
              alert('An error occured. Please try again.');
              window.location.href = 'Salary Page.php';
            </script>";
     }
    }
  
  ?>