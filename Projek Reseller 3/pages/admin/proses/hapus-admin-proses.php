<?php
include '../../../koneksi.php';

$id_admin = $_POST['id-admin'];

mysqli_query($db,
    "DELETE FROM tbadmin
    WHERE id_kontak='$id_admin'"
);
header("location: ../../../index.php?p=index-data&p2=admin");
?>