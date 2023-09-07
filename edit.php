<?php

    include_once("connection.php");

    // Update
    if (isset($_POST['update'])) {
        $id = $_POST['id'];

        $nama = $_POST['nama'];
        $jabatan = $_POST['jabatan'];
        $jenis_kelamin = $_POST['jenis_kelamin'];

        // query untuk update data
        $query = mysqli_query($connect,
        "UPDATE users SET name='$nama', email='$jabatan', mobile='$jenis_kelamin' WHERE id='$id' ");

        header('Location: index.php');
    }

    // Ambil data user
    $user_id = $_GET['user_id'];

    $query = mysqli_query($connect, "SELECT * FROM users WHERE id='$id'");

    while($user_data = mysqli_fetch_array($query)) {
        $nama = $user_data['nama'];
        $jabatan = $user_data['jabatan'];
        $jenis_kelamin = $user_data['jenis_kelamin'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membuat User</title>
</head>
<body>
    <a href="index.php">Kembali</a>

    <form action="edit.php" method="POST" name="editUser">
        <table border="0">
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?= $nama ?>"></td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td><input type="text" name="jabatan" value="<?= $jabatan ?>"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td><input type="text" name="jenis_kelamin" value="<?= $jenis_kelamin ?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>