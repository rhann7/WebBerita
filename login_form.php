<?php
    @include 'config.php';

    session_start();

    if (isset($_POST['submit'])) {

        $email = mysqli_real_escape_string($koneksi, $_POST['email']);
        $password = md5($_POST['password']);

        $select = " SELECT * FROM tb_user WHERE email = '$email' && password = '$password' ";

        $result = mysqli_query($koneksi, $select);

        if (mysqli_num_rows($result) > 0) {

            $row = mysqli_fetch_array($result);

            if ($row['user_type'] == 'admin') {

                $_SESSION['admin_name'] = $row['name'];
                header ("Location: admin_page.php");

            } else if ($row['user_type'] == 'user') {

                $_SESSION['user_name'] = $row['name'];
                header ("Location: user_page.php");

            }

        } else {

            $error[] = "incorrect email or password!";

        }

    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>login form</title>

        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div class="form-container">
            <form action="" method="post">
                <h3>Login Now</h3>

                <?php 
                    if (isset($error)) {

                        foreach ($error as $error) {

                            echo '<span class="error-msg">'.$error.'</span>';

                        }
                        
                    }
                ?>

                <input type="email" name="email" required placeholder="Enter your email">
                <input type="password" name="password" required placeholder="Enter your password">
                <input type="submit" name="submit" value="login" class="form-btn">
                <p>don't have an account? <a href="register_form.php">register now</a></p>
            </form>
        </div>
    </body>
</html>