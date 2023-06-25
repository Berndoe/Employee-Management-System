<?php  include "config.php"; ?>
<!-- New Asset modal -->
<div class="modal fade" id="new_asset" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="new_asset" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="assetModal">New Asset</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="" method="POST">
                <input class="form-control" type="number" name="asset_Id" placeholder="Asset ID" id="employeeID" required><br>
                <input class="form-control" type="text" name="asset_name" placeholder="Asset Name" required><br>          
                <div class="d-grid gap-2 col-11 mx-auto" style="margin-top: 10;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                    <button type="submit" class="btn btn-primary" name="add-asset">Add Asset</button>
                </div>
        </div>
        </form>
      </div>
    </div>
  </div>

  <?php 

        if(isset($_POST['add-asset'])) {

        $asset_id = $_POST['asset_Id'];

        $asset_name = $_POST['asset_name'];

        $authentic_asset = "SELECT * FROM Assets WHERE Assets.asset_Id = '$asset_id'";

        $result = mysqli_query($conn, $authentic_asset);
    
         if(mysqli_num_rows($result) > 0) {
    
          echo "<script>
            alert('Asset Already Exists');
            window.location.href = 'Asset Page.php';
          </script>"; 
         }
         else { 
          
          $new_asset = "INSERT INTO Assets(asset_Id, asset_name) VALUES('$asset_id','$asset_name')";
          
          $added_asset = mysqli_query($conn, $new_asset);

          echo "<script>
                alert('Successfully Added New Asset');
                window.location.href = 'Asset Page.php';
              </script>";
         }

        }
  ?>
