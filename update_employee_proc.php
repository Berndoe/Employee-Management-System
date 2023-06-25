
<?php

    include "config.php";
 
    if( isset($_POST['update_employee'])) {
        
      $employee_id = $_POST['employee_Id'];
  
      $first_name = $_POST['first_name'];
  
      $last_name = $_POST['last_name'];
  
      $dob = $_POST['date_of_birth'];
  
      $department_name = $_POST['department_Id'];
  
      $job_desc = $_POST['role_Id'];

      $authentic_employee = "SELECT * FROM Employee WHERE Employee.employee_Id = '$employee_id'";
      
      $result = mysqli_query($conn, $authentic_employee);

    if(mysqli_num_rows($result) > 0) {
            $updatequery= "UPDATE Employee SET first_name='$first_name',last_name= '$last_name',
            date_of_birth='$dob', department_Id= '$department_name',role_Id='$job_desc'
            WHERE Employee.employee_Id='$employee_id'";
        echo"<script>console.log('access granted')</script>";

        $updated_employee = mysqli_query($conn, $updatequery);

        echo "<script>
            alert('Successfuly Updated Employee');
            window.location.href = 'Employee Page.php';
        </script>"; 
        }
        else { 
           echo "<script>
                alert('An error occured. Please try again later');
                window.location.href = 'Employee Page.php';
            </script>";
        }
    }
  
  ?>