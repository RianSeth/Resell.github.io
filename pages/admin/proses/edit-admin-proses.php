<?php
include'../../../koneksi.php';

$id_admin = $_POST['id-admin'];
$nama = $_POST['nama-admin'];
$email = $_POST['email-admin'];
$pass = $_POST['pass-admin'];

if (isset($_POST['simpan'])) {
    extract($_POST);
    $nama_foto = $_FILES['foto']['name'];

    if (!empty($nama_foto)) {
        $lokasi_foto = $_FILES['foto']['tmp_name'];
        $tipe_foto = pathinfo($nama_foto, PATHINFO_EXTENSION);
        $file_foto = "foto".$id_admin.".".$tipe_foto;

        $folder_simpan = "../../../image/admin/$file_foto";
        echo $nama_foto;
        echo $lokasi_foto;
        echo $tipe_foto;
        echo $file_foto;
        echo $folder_simpan;

        @unlink("$folder_simpan");
        move_uploaded_file($lokasi_foto, "$folder_simpan");
    }else{
        $file_foto = $foto_awal;
    }

    mysqli_query($db, 
        "UPDATE tbadmin
        SET nama_pemilik = '$nama', email = '$email', pass = '$pass', foto = '$file_foto'
        WHERE id_kontak = '$id_admin'"
    );
    header("location: ../../../index.php?p=index-data&p2=admin");
}
?>