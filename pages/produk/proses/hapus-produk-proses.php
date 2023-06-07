<?php

if (isset($_GET['id'])) {
    $id_produk = $_GET['id'];

    mysqli_query($db,
        "DELETE FROM tbgambarproduk
        WHERE id_produk='$id_produk'"
    );

    mysqli_query($db,
        "DELETE FROM tbecommerce
        WHERE id_produk='$id_produk'"
    );

    mysqli_query($db,
        "DELETE FROM tbproduk
        WHERE id_produk='$id_produk'"
    );
}

header("location: ./index.php?p=index-data&p2=list-produk");
?>