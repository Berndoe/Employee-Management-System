<!-- update Employee modal -->

<div class="modal fade trial" id="updateEmployee<?php echo $row['employee_Id'];?>" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="update_employee" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="employeeModal">Update Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="update_employee_proc.php" method="POST">
                    
                    <input class="form-control" type="hidden" name="employee_Id" autocomplete="off" value="<?php echo $row['employee_Id'];?>">
                    <input class="form-control" type="text" name="first_name" autocomplete="off" value="<?php echo $row['first_name'];?>"><br>
                    <input class="form-control" type="text" name="last_name" autocomplete="off" value="<?php echo $row['last_name'];?>"><br>
                    <input class="form-control" type="text" name="date_of_birth" autocomplete="off" value="<?php echo $row['date_of_birth'];?>"><br>

                    <select class="custom-select form-control" name="department_Id" >
                        <option value="<?php echo $row['department_Id'] ?>" selected><?php echo $row['department_name'] ?></option>
                        <?php

                            $result = mysqli_query($conn,"SELECT * FROM Department ORDER BY department_name ASC");
                            while($fetch = mysqli_fetch_array($result)) {
                            ?>
                            <option value="<?=$fetch["department_Id"];?>"><?= $fetch["department_name"];?></option>
                            <?php
                            }
                        ?>
                    </select><br><br>
                    
                    <select class="custom-select form-control" name="role_Id" >
                        <option value="<?php echo $row['role_Id'] ?>" selected><?php echo $row['role_name'] ?></option>
                        <?php

                            $result = mysqli_query($conn,"SELECT * FROM EmployeeRole ORDER BY role_name ASC");
                            while($fetch = mysqli_fetch_array($result)) {
                            ?>
                            <option value="<?=$fetch["role_Id"];?>"><?= $fetch["role_name"];?></option>
                            <?php
                            }
                        ?>
                    </select><br><br>

                    <input class="form-control" type="number" name="asset_Id" autocomplete="off" value="<?php echo $row['asset_Id']; ?>" placeholder="Asset ID" ><br>

            </div>
            <div class="d-grid gap-2 col-11 mx-auto" style="margin-top: 10;">
                <button type="button" class="btn btn-secondary option" data-dismiss="modal">Back</button>
                <button type="submit" name="update_employee" class="btn btn-primary" onclick="check()">Update Employee</button>
            </div><br>
            </form>
        </div>
    </div>
</div>


<script>
    function check() {
        console.log("i've been clicked yay");
    }
</script>


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

