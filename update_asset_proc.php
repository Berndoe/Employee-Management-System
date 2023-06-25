<?php
    include "config.php";
 
    if(isset($_POST['update_asset'])){

      $employee_id = $_POST['employee_Id'];
  
      $asset_id = $_POST['asset_Id'];

      $authentic_employee = "SELECT * FROM Employee WHERE Employee.employee_Id = '$employee_id'";

      $result = mysqli_query($conn, $authentic_employee);

      if(mysqli_num_rows($result) > 0) {

      $updatequery="UPDATE Employee SET asset_Id = '$asset_id', 
      asset_update_time = NOW() WHERE employee_Id='$employee_id'";

      $updated_query = mysqli_query($conn, $updatequery);
        echo "<script>
            alert('Successfully Update Employee-Asset Record');
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