<?php
// Include the database configuration
include "config.php";

if (isset($_POST['loginBtn'])) {

    $email = $_POST['email'];

    $password = $_POST['pass'];

    $email_filter = "SELECT * FROM credentials WHERE email = '$email' LIMIT 1";
	
	$result = mysqli_query($conn, $email_filter);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_array($result);

        $user_email = $row['email'];

        $password_hash = $row['pass'];

        if(password_verify($password, $password_hash)) {

            session_start();

            $_SESSION['email'] = $user_email;

            $_SESSION['pass'] = $password_hash;
            
            echo "
                <script>
                    alert('Successfully logged in');
                    window.location.href = 'Home Page.php';
                </script>";

        }

        else {
            echo"
                <script>
                    alert('Incorrect email or password');
                    window.location.href = 'index.php';
                </script>";
        }

    }

    else {

        echo "An error occured. Please try again later";
    }
}

?>