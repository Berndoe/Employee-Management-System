<?php
include "config.php";

if (isset($_POST['create_admin'])) {
   
    $first_name = $_POST['first_name'];

    $last_name = $_POST['last_name'];

    $email = $_POST['email'];

    $password = $_POST['pass']; 

    $encrypted_password = password_hash($password, PASSWORD_DEFAULT);  
    
    $authentication = "SELECT first_name, last_name, email FROM credentials WHERE email = '$email'" ;
    $authentication_result = mysqli_query($conn, $authentication);

    if(mysqli_num_rows($authentication_result) > 0) {
        echo "<script>
                alert('Account already exists');
                window.location.href = 'Sign Up Page.php';
            </script>";
    }
    else {
        $new_admin_query = "INSERT INTO credentials(first_name,last_name,email,pass) 
        VALUES('$first_name','$last_name','$email','$encrypted_password')";

        $add_admin = mysqli_query($conn, $new_admin_query);
        echo "<script>
                alert('Successfully added New Admin');
                window.location.href = 'index.php';
            </script>";    
    }
   }

$conn->close();
?>
