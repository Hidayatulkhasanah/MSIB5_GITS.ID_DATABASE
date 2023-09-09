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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="container p-4">
        <h1 class="mb-3" style="font-size: 30px;">Edit Data User</h1>
        <div class="card card-body bg-warning">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="index.php"><button class="btn btn-secondary">Kembali</button></a>
        </div>
            <form action="edit.php" method="POST" name="editUser">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Nama Lengkap :</label>
                  <input type="text" name="nama" value="<?= $nama ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                <select name="jabatan" value="<?= $jabatan ?>" class="form-select" aria-label="Default select example">
                    <option selected>Jabatan</option>
                    <option value="1">Petugas</option>
                    <option value="2">Mahasiswa</option>
                </select>
                </div>
                <div class="mb-3">
                <select name="jenis_kelamin" value="<?= $jenis_kelamin ?>" class="form-select" aria-label="Default select example">
                    <option selected>Jenis Kelamin</option>
                    <option value="1">L</option>
                    <option value="2">P</option>
                </select>
                </div>
                <td><input type="hidden" name="id_user" value="<?php echo $_GET['id_user'] ?>"></td>
                <button name="update" value="Update" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    
</body>
</html>