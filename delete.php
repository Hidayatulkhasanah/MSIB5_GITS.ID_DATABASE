<?php

    include_once("connection.php");

    $id_user = $_GET['id_user'];

    $delete = mysqli_query($connect, "DELETE FROM tb_user WHERE id_user='$id_user'");

    header("Location:index.php");
?>