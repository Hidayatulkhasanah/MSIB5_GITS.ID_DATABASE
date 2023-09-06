<?php

// Memanggil koneksi menuju database
include_once("connection.php");

// Memanggil data dari database
$result = mysqli_query($connect, 'SELECT * FROM tb_user');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="wid_userth=device-wid_userth, initial-scale=1.0">
    <title>Data Users</title>
</head>
<body>

    <a href="add.php">Tambah User</a>

    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Jenis Kelamin</th>
            <th>Aksi</th>
        </tr>
        <?php
            while($user_data = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td><?php echo $user_data['nama']; ?></td>
            <td><?php echo $user_data['jabatan']; ?></td>
            <td><?php echo $user_data['jenis_kelamin']; ?></td>
            <td>
                <a href="edit.php?id_user=<?php echo $user_data['id_user']; ?>">Edit</a>
                <a href="delete.php?id_user=<?php echo $user_data['id_user']; ?>">Delete</a>
            </td>
        </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>