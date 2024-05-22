<?php
    @include 'config.php';

    if (isset($_POST['submit'])) {

        $name = mysqli_real_escape_string($koneksi, $_POST['name']);
        $email = mysqli_real_escape_string($koneksi, $_POST['email']);
        $password = md5($_POST['password']);
        $conpassword = md5($_POST['conpassword']);
        $user_type = $_POST['user_type'];

        $select = " SELECT * FROM tb_user WHERE email = '$email' && password = '$password' ";

        $result = mysqli_query($koneksi, $select);

        if (mysqli_num_rows($result) > 0) {

            $error[] = 'user already exist!';

        } else {

            if ($password != $conpassword) {

                $error[] = 'password not matced!';

            } else {

                $insert = "INSERT INTO tb_user (name, email, password, user_type) VALUES ('$name', '$email', '$password', '$user_type')";
                
                mysqli_query ($koneksi, $insert);
                header ("Location: login_form.php");

            }

        }

    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>register form</title>

        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div class="form-container">
            <form action="" method="post">
                <h3>Register Now</h3>

                <?php 
                    if (isset($error)) {

                        foreach ($error as $error) {

                            echo '<span class="error-msg">'.$error.'</span>';

                        }

                    }
                ?>

                <input type="text" name="name" required placeholder="Enter your name">
                <input type="email" name="email" required placeholder="Enter your email">
                <input type="password" name="password" required placeholder="Enter your password">
                <input type="password" name="conpassword" required placeholder="Confirm your password">
                <select name="user_type">
                    <option value="user">user</option>
                    <option value="admin">admin</option>
                </select>
                <input type="submit" name="submit" value="register" class="form-btn">
                <p>already have an account? <a href="login_form.php">login now</a></p>
            </form>
        </div>
    </body>
</html>