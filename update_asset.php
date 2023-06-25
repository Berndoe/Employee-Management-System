 <!-- Update asset modal -->
 <div class="modal fade" id="update_asset<?php echo $row['employee_Id']?>" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="update_asset" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="assetModal">Update Asset</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="update_asset_proc.php" method="POST">
                <input class="form-control" type="hidden" placeholder="Employee ID" name="employee_Id" value="<?php echo $row['employee_Id'];?>" id="employeeID">
                <input class="form-control" type="number" placeholder="Asset ID" id="asset_Id" name="asset_Id" value="<?php echo $row['asset_Id'];?>" ><br>        
                <div class="d-grid gap-2 col-11 mx-auto" style="margin-top: 10;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                    <button type="submit" class="btn btn-primary" name="update_asset">Update Asset</button>
                </div>
              </form>
        </div>
      </div>
      </div>
    </div>

