<div class="nav-manip-produk">
    <form method="POST" class="form-pencarian-box">
        <input type="text" name="pencarian" class="pencarian-produk-box1" id="">
        <button type="submit" name="search" class="search-btn1"><i class='bx bx-search'></i></button>
    </form>

    <a href="index.php?p=index-data&p2=input-produk-proses" class="link-input-produk">
        <i class='bx bx-plus'></i>
        <span>Produk Baru</span>
    </a>
</div>
<form action="" method="POST">
    <?php
    if (isset($_POST['pencarian'])) {
        echo '<input type="submit" name="" class="btn-kategori-box btn-cancel" value="X" formaction="index.php?p=index-data&p2=list-produk">';
    }
    ?>
    <div class="kategori-box1">
        <?php
        $q_kategori_produk = mysqli_query($db, "SELECT DISTINCT kategori FROM tbproduk");
        $daftar_kategori = array();
        
        while ($r_kategori_produk = mysqli_fetch_array($q_kategori_produk)) {
            $daftar_kategori[] = $r_kategori_produk['kategori'];
        }

        // Hapus duplikasi kategori
        $daftar_kategori_unik = array_unique($daftar_kategori);


        // Menampilkan input text dengan kategori
        foreach ($daftar_kategori_unik as $kategori) {
            echo '<input type="submit" name="pencarian" class="btn-kategori-box" value="' . $kategori . '">';
        }
        ?>
    </div>
</form>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

extract($_GET);
if (isset($_POST['pencarian'])) {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $pencarian = trim(mysqli_real_escape_string($db, $_POST['pencarian']));
        if($pencarian != ""){
            $sql = "SELECT * FROM tbproduk WHERE nama_produk LIKE '%$pencarian%'
                    OR kategori LIKE '%$pencarian%'
                    OR harga LIKE '%$pencarian%'";
            
            $query = $sql;
        }else {
            $query = "SELECT * FROM tbproduk";
        }
    }else {
        $query = "SELECT * FROM tbproduk";
    }
}else {
    $query = "SELECT * FROM tbproduk";
}
?>
<form method="post" enctype="multipart/form-data" class="form-box-produk1">
    <div class="posi-produk1">
        <div class="center-posi-produk1">
<?php
$q_tampil_produk = mysqli_query($db, $query);
if (mysqli_num_rows($q_tampil_produk) > 0) {
    while ($r_tampil_produk = mysqli_fetch_array($q_tampil_produk)) {
        $id_produk = $r_tampil_produk['id_produk'];
        $keygambar = "1" . $id_produk;
        ?>
        
        <div class="produk-box1">
            <?php
            $q_tampil_gambar = mysqli_query($db, "SELECT * FROM tbgambarproduk
                                                WHERE id_produk = '$id_produk'
                                                AND nama_gambar LIKE '%$keygambar%' ");
            $r_tampil_gambar = mysqli_fetch_array($q_tampil_gambar);
            ?>
            <div class="ket-produk-box1" style="background-image: url(http://localhost/Projek%20Reseller%203/image/produk/<?php echo $r_tampil_gambar['nama_gambar'] ?>);">
                <span class="kategori-list">
                    <?php echo $r_tampil_produk['kategori'] ?>
                </span>
                <span class="nama-produk-list">
                    <?php echo $r_tampil_produk['nama_produk'] ?>
                </span>
            </div>
            <div class="btn-produk1">
                <input type="submit" value="Edit" name="edit" formaction="index.php?p=index-data&p2=edit-produk-proses&id=<?php echo $id_produk ?>">
                <input type="submit" name="hapus" class="hapus-produk" value="Hapus" data-idproduk="<?php echo $r_tampil_produk['id_produk']; ?>">
            </div>
        </div>
    
        <?php
    }
}
?>
        </div>
    </div>
    <script>
        // Ambil semua tombol "Hapus"
        var hapusProdukButtons = document.querySelectorAll('.hapus-produk');

        // Tambahkan event listener ke setiap tombol "Hapus"
        hapusProdukButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();

                // Ambil nilai id_produk dari atribut data-idproduk
                var idProduk = button.getAttribute('data-idproduk');

                var confirmDelete = confirm('Apakah Anda Yakin Akan Hapus Produk Ini?');
                if (confirmDelete) {
                    // Set aksi formulir dengan ID Produk yang sesuai
                    button.form.action = 'index.php?p=index-data&p2=hapus-produk-proses&id=' + idProduk;
                    button.form.submit();
                } else {
                    // Tambahkan logika jika pengguna membatalkan penghapusan
                }
            });
        });

    </script>
</form>