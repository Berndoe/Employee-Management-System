 <!-- Delete assets modal -->
 <div class="modal fade" id="del_asset<?php echo $row['employee_Id']?>" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="del_asset" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="assetModal">Delete Asset</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="text-align: center;">
        <form action="" method="POST">
        <input type="hidden" name="employee_Id" value="<?php echo $row['employee_Id'];?>">
            Are you sure you want to delete this record?       
            <div class="d-grid gap-2 col-11 mx-auto" style="margin-top: 10;">
                <button type="submit" class="btn btn-primary delBtn" id="delete_asset" name="delete_asset">Yes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-left: -2;">No</button>
            </div>
        </form>
        </div>
      </div>
    </div>
    </div>

  <?php
     include "config.php";
 
    if(isset($_POST['delete_asset'])){
      $employee_id = $_POST['employee_Id'];

      $authentic_employee = "SELECT * FROM Employee WHERE Employee.employee_Id = '$employee_id'";

      $result = mysqli_query($conn, $authentic_employee);

      if(mysqli_num_rows($result) > 0) {
          $updatequery= "UPDATE Employee SET asset_Id = NULL,
          asset_update_time = NOW() WHERE employee_Id='$employee_id'";
          
          $updated_query = mysqli_query($conn, $updatequery);
      
        echo "<script>
            alert('Successfully Deleted Employee-Asset Record');
            window.location.href = 'Asset Page.php';
          </script>";
      }
     else {
      echo "<script>
              alert('An error occured. Please try again.');
              window.location.href = 'Asset Page.php';
            </script>";
     }
    }
  
  ?>