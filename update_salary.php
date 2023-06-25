<?php include "config.php"; ?>
 <!-- Update salary modal -->
 <div class="modal fade" id="update_salary<?php echo $row['employee_Id'];?>" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="update_salary" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="salaryModal">Update Salary</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="update_salary_proc.php" method="POST">
                <input class="form-control" type="hidden" name="employee_Id" value="<?php echo $row['employee_Id'];?>" placeholder="Employee ID" id="employee_Id">
                <input class="form-control" type="number" name="salary" value="<?php echo $row['salary'];?>" id="salary" placeholder="Salary (GHC)"><br>
                <div class="input-group">
                <select class="custom-select form-control" name="payment_status" >
                    <option value="<?php echo $row['payment_status'];?>" selected><?php echo $row['payment_status'] ?></option>
                    <?php

                        $result = mysqli_query($conn,"SELECT DISTINCT payment_status FROM Employee");
                        while($fetch = mysqli_fetch_array($result)) {
                        ?>
                        <option value="<?=$fetch["payment_status"];?>"><?= $fetch["payment_status"];?></option>
                        <?php
                        }
                    ?>
                </select>
                  </div><br>            
                <div class="d-grid gap-2 col-11 mx-auto" style="margin-top: 10;">
                    <button type="button" class="btn btn-secondary option" data-dismiss="modal">Back</button>
                    <button type="submit" class="btn btn-primary" name="update_salary">Update Salary</button>
                </div>
        </div>
        </form>
      </div>
    </div>
  </div>

 