<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Data User</title>
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
    </head>

    <body style="min-height: 100vh; display: flex; justify-content: center; align-items: center; flex-direction: column;">
        <h1>Data User</h1>
        <br>

        <?php 
            @include 'config.php';
            $data = $koneksi -> query ("SELECT * FROM tb_user");
        ?>

        <table class="table" style="width: 70%;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                </tr>
            </thead>

            <?php
                if (isset($data)) {
                    foreach ($data as $item) {

                    }

                }
            ?>

                <tr>
                    <td><?php echo $item['id'] ?></td>
                    <td><?php echo $item['name'] ?></td>
                    <td><?php echo $item['email'] ?></td>
                </tr>
        </table>
        <br>

        <div style="display: flex; flex-direction: row; justify-content: space-between;">
            <a href="admin_page.php" class="btn-data">Kembali</a>
            <a href="register_form.php" class="btn-data">Tambah Pengguna</a>
        </div>
    </body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
