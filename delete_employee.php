
<?php 
 include "config.php";
?>
<!-- Delete employee modal -->
<div class="modal fade" id="del_employee<?php echo $row['employee_Id'];?>" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="del_employee" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="employeeModal">Delete Employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align: center;">
      <form action="" method="POST">
        <input type="hidden" name="employee_Id" value="<?php echo $row['employee_Id']?>">
        Are you sure you want to delete this record?
        <div class="d-grid gap-2 col-11 mx-auto" style="margin-top: 10;">
          <button type="submit" class="btn btn-primary delBtn" id="delete_employee" name="delete_employee">Yes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-left: -2;">No</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>

<?php

    if(isset($_POST['delete_employee'])) {
    $employee_id = $_POST['employee_Id'];    

    $delete_employee = mysqli_query($conn, "DELETE FROM Employee WHERE employee_Id = '$employee_id'");

    if($delete_employee) {
      $new = mysqli_query($conn, "SELECT insert_time FROM Employee ORDER BY insert_time DESC LIMIT 1");
      $row = mysqli_fetch_assoc($new);

      // Get the insert_time value from the row
      $insertTime = $row['insert_time'];
      mysqli_query($conn,"UPDATE Employee SET insert_time = NOW() WHERE insert_time = '$insertTime'");

          echo "<script>
          alert('Successfully Removed Employee Record');
          window.location.href = 'Employee Page.php';
          </script>";
     }

    else {
      echo "<script>
          alert('An error occured. Please try again later.');
          window.location.href = 'Employee Page.php';
          </script>";
     }
    }

?>