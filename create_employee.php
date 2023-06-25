<!-- New Employee Modal -->

<div class="modal fade" id="new_employee" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="new_employee" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="employeeModal">New Employee</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="" method="post" >
                <input class="form-control" type="number" name="employee_Id" autocomplete="on" placeholder="Employee ID" required><br>
                <input class="form-control" type="text" name="first_name" autocomplete="on" placeholder="First name" required><br>
                <input class="form-control" type="text" name="last_name" autocomplete="on" placeholder="Last name" required><br>
                <input class="form-control" type="text" name="date_of_birth" autocomplete="on" placeholder="Birthday (DD/MM/YY)" onfocus="(this.type='date')" onblur="(this.type='text')" required><br>
            <?php
            require_once "pagination.php";
            ;

            // department list dropdown 
            $sql = "SELECT * FROM Department ORDER BY department_name ASC";
            $result = mysqli_query($conn, $sql);
            echo "<select name='department_Id' class='custom-select form-control' id='department' required>";
            echo "<option disabled selected hidden>Department</option>";
            while ($row = mysqli_fetch_array($result)) {

              echo "<option value='" . $row['department_Id'] . "'>" . $row['department_name'] . "</option>";
            }
            echo "</select><br><br>";
        
            // job description list dropdown
            $job_sql = "SELECT * FROM EmployeeRole ORDER BY role_name ASC";
            $job_result = mysqli_query($conn, $job_sql);

            echo "<select name='role_Id' class='custom-select form-control' id='inputJobDesc' required>";
            echo "<option disabled selected hidden>Job Description</option>";

            while ($row = mysqli_fetch_array($job_result)) {
              echo "<option value='" . $row['role_Id'] . "'>" . $row['role_name'] . "</option>";
            }
            echo "</select><br>";
            ?><br>
            <input class="form-control" type="number" name="salary" autocomplete="on" placeholder="Salary" required><br>

            
            <?php
            // payment status drop down
            $payment_sql = "SELECT DISTINCT payment_status FROM Employee";
            $payment_result = mysqli_query($conn, $payment_sql);
            
            echo "<select name='payment_status' class='custom-select form-control' id='paymentStatus'>";
            echo "<option disabled selected hidden>Payment Status</option>";

            while($row = mysqli_fetch_array($payment_result)) {
              echo "<option value='" . $row['payment_status'] . "'>" . $row['payment_status'] . "</option>"; 
            }
            echo "</select><br><br>";
            ?>
            <input class="form-control" type="number" autocomplete="on" name="asset_Id" placeholder="Asset ID"><br>

          <div class="d-grid gap-2 col-11 mx-auto" style="margin-top: 10;">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
            <button type="submit" class="btn btn-primary" name="insert_employee">Add Employee</button>
          </div>
      </div>
      </form>
    </div>
  </div>
</div>

<?php

// New employee submission
if (isset($_POST['insert_employee'])) {
  $employee_id = $_POST['employee_Id'];

  $first_name = $_POST['first_name'];

  $last_name = $_POST['last_name'];
  
  $dob = $_POST['date_of_birth'];
 
  $salary = $_POST['salary'];
 
  $payment_status = $_POST['payment_status'];
 
  $department_name = $_POST['department_Id'];
 
  $job_desc = $_POST['role_Id'];
 
  $asset_id = $_POST['asset_Id'];

  $authentic_employee = "SELECT * FROM Employee WHERE Employee.employee_Id = '$employee_id'";
 
  $result = mysqli_query($conn, $authentic_employee);

  if (mysqli_num_rows($result) > 0) {
      echo "<script>
          alert('Employee Already Exists');
          window.location.href = 'Employee Page.php';
      </script>";
  } else {
      $insert_columns = "employee_Id, first_name, last_name, date_of_birth, department_Id, role_Id, salary, payment_status";
    
      $insert_values = "'$employee_id', '$first_name', '$last_name', '$dob', '$department_name', '$job_desc', '$salary', '$payment_status'";

      if (!empty($asset_id)) {
          // Check if the asset_id exists in the assets table before inserting
          $asset_query = "SELECT * FROM assets WHERE asset_Id = '$asset_id'";
         
          $asset_result = mysqli_query($conn, $asset_query);
          if (mysqli_num_rows($asset_result) == 0) {
              echo "<script>
                  alert('Invalid Asset ID');
                  window.location.href = 'Employee Page.php';
              </script>";
              exit();
          }

          // Include asset_Id in the insert query
          $insert_columns .= ", asset_Id";
         
          $insert_values .= ", '$asset_id'";
      }

      $new_employee = "INSERT INTO Employee ($insert_columns) VALUES ($insert_values)";

      

      $added_employee = mysqli_query($conn, $new_employee);

      if ($added_employee) {
        mysqli_query($conn, "UPDATE Employee SET insert_time = NOW() WHERE Employee.employee_Id = '$employee_id'");
          echo "<script>
              alert('Successfully Added New Employee');
              window.location.href = 'Employee Page.php';
          </script>";
      } else {
          echo "<script>
              alert('An error occurred while adding the employee. Please try again.');
              window.location.href = 'Employee Page.php';
          </script>";
      }
  }
}

?>