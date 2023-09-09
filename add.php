<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membuat Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="container p-4">
        <h1 class="mb-3" style="font-size: 30px;">Input Data User</h1>
        <div class="card card-body bg-success">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="index.php"><button class="btn btn-secondary">Kembali</button></a>
        </div>
            <form action="add.php" method="POST" name="addUser">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Nama Lengkap :</label>
                  <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                <select name="jabatan" class="form-select" aria-label="Default select example">
                    <option selected>Jabatan</option>
                    <option value="1">Petugas</option>
                    <option value="2">Mahasiswa</option>
                </select>
                </div>
                <div class="mb-3">
                <select name="jenis_kelamin" class="form-select" aria-label="Default select example">
                    <option selected>Jenis Kelamin</option>
                    <option value="1">L</option>
                    <option value="2">P</option>
                </select>
                </div>
                <button name="Submit" value="add" class="btn btn-dark">Submit</button>
            </form>
        </div>
    </div>
    

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