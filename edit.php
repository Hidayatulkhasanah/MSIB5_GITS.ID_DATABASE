<?php

    include_once("connection.php");

    // Update
    if (isset($_POST['update'])) {
        $id_user = $_POST['id_user'];

        $nama = $_POST['nama'];
        $jabatan = $_POST['jabatan'];
        $jenis_kelamin = $_POST['jenis_kelamin'];

        // query untuk update data
        $query = mysqli_query($connect,
        "UPDATE tb_user SET nama='$nama', jabatan='$jabatan', jenis_kelamin='$jenis_kelamin' WHERE id_user='$id_user' ");

        header('Location: index.php');
    }

    // Ambil data user
    $id_user = $_GET['id_user'];

    $query = mysqli_query($connect, "SELECT * FROM tb_user WHERE id_user='$id_user'");

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
    <script src="https://cdn.tailwindcss.com"></script>
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
                <td>
                    <select type="text" name="jenis_kelamin">
                    <option>Laki-laki</option>
                    <option>Perempuan</option>
                </td> 
            <tr>
                <td><input type="hidden" name="id_user" value="<?php echo $_GET['id_user'] ?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>