<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membuat Users</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <a href="index.php">Kembali</a>

    <form action="add.php" method="POST" name="addUser">
        <table border="0">
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td><input type="text" name="jabatan"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>
                    <select type="text" name="jenis_kelamin">
                    <option>Laki-laki</option>
                    <option>Perempuan</option>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="add"></td>
            </tr>
        </table>
    </form>

    <!-- Handle permintaan POST dari form diatas -->
    <?php
        if(isset($_POST['Submit'])) {
            $nama = $_POST['nama'];
            $jabatan = $_POST['jabatan'];
            $jenis_kelamin = $_POST['jenis_kelamin'];

            // Memanggil koneksi menuju database
            include_once("connection.php");

            // Query untuk insert data ke database
            $result = mysqli_query($connect, 
            "INSERT INTO tb_user (nama,jabatan,jenis_kelamin) VALUES ('$nama','$jabatan','$jenis_kelamin')");

            echo "Berhasil menambah user. <a href='index.php'>melihat user</a>";
        }
    ?>
</body>
</html>