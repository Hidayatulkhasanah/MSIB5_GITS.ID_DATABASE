<?php

include_once("connection.php");

$result = mysqli_query($connect, 'SELECT * FROM tb_user');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="wid_userth=device-wid_userth, initial-scale=1.0">
    <title>Data Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
</head>
<body>
    <div class="container mt-4">
    <div class="card card-body">
    <a href="add.php">
        <button type="button" class="btn btn-success mb-3">Tambah User</button>
    </a>
    <table id="myTable" class="display">
    <thead>
        <tr>
        <th>Nama</th>
        <th>Jabatan</th>
        <th>Jenis Kelamin</th>
        <th>Aksi</th>
        </tr>
    </thead>
    <tbody>

<?php
    while($user_data = mysqli_fetch_array($result)) {
?>
    <tr>
        <td><?php echo $user_data['nama']; ?></td>
        <td><?php echo $user_data['jabatan']; ?></td>
        <td><?php echo $user_data['jenis_kelamin']; ?></td>
    <td>
        <a href="edit.php?id_user=<?php echo $user_data['id_user']; ?>">
        <button class="btn btn-warning">Edit</button></a>
        <a href="delete.php?id_user=<?php echo $user_data['id_user']; ?>"><button class="btn btn-danger">Delete</button></a>
    </td>
    </tr>
<?php
    }
?>
</tbody>
</table>
</div>
</div>
    <script type="text/javascript">
    $(document).ready(function () {
    $("#myTable").DataTable();
    });
</script>
</body>
</html>