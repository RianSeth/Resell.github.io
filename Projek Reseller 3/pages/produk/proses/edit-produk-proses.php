<form method="POST" enctype="multipart/form-data">
    <?php
    if (isset($_GET['id'])) {
        $idProduk = $_GET['id'];

        $q_tampil_produk = mysqli_query($db, "SELECT * FROM tbproduk WHERE id_produk = '$idProduk'");

        if (mysqli_num_rows($q_tampil_produk) > 0) {
            $r_tampil_produk = mysqli_fetch_array($q_tampil_produk);

            $idGambar1 = "1" . $idProduk;
            $idGambar2 = "2" . $idProduk;
            $idGambar3 = "3" . $idProduk;
            $idGambar4 = "4" . $idProduk;
            $q_tampil_gambar1 = mysqli_query($db, "SELECT * FROM tbgambarproduk WHERE id_gambar = '$idGambar1'");
            $q_tampil_gambar2 = mysqli_query($db, "SELECT * FROM tbgambarproduk WHERE id_gambar = '$idGambar2'");
            $q_tampil_gambar3 = mysqli_query($db, "SELECT * FROM tbgambarproduk WHERE id_gambar = '$idGambar3'");
            $q_tampil_gambar4 = mysqli_query($db, "SELECT * FROM tbgambarproduk WHERE id_gambar = '$idGambar4'");
            if (mysqli_num_rows($q_tampil_gambar1) > 0) {
                $r_tampil_gambar1 = mysqli_fetch_array($q_tampil_gambar1);
                $r_tampil_gambar1 = $r_tampil_gambar1['nama_gambar'];
            }else {
                $r_tampil_gambar1 = "Reseller.png";
            }
            
            if (mysqli_num_rows($q_tampil_gambar2) > 0) {
                $r_tampil_gambar2 = mysqli_fetch_array($q_tampil_gambar2);
                $r_tampil_gambar2 = $r_tampil_gambar2['nama_gambar'];
            }else {
                $r_tampil_gambar2 = "Reseller.png";
            }
            
            if (mysqli_num_rows($q_tampil_gambar3) > 0) {
                $r_tampil_gambar3 = mysqli_fetch_array($q_tampil_gambar3);
                $r_tampil_gambar3 = $r_tampil_gambar3['nama_gambar'];
            }else {
                $r_tampil_gambar3 = "Reseller.png";
            }

            if (mysqli_num_rows($q_tampil_gambar4) > 0) {
                $r_tampil_gambar4 = mysqli_fetch_array($q_tampil_gambar4);
                $r_tampil_gambar4 = $r_tampil_gambar4['nama_gambar'];
            }else {
                $r_tampil_gambar4 = "Reseller.png";
            }
            ?>

    <div class="ket-produk-box">
            
        <div class="display-produk-box" style="position: relative; left: 80%;">
            <div class="ket-input-box">
                <input type="submit" name="simpan" class="btn-simpan-produk" value="Save">
            </div>
        </div>

        <!-- Nama -->
        <div class="display-produk-box">
            <div class="ket-input-box">
                <span>Nama Produk</span>
                <span class="tag-wajib">
                    Wajib
                </span>
            </div>
            <div class="input-box-produk">
                <input type="text" name="nama" class="nama-box" id="" value="<?php echo $r_tampil_produk['nama_produk'] ?>" required>
            </div>
        </div>

        <!-- kategori -->
        <div class="display-produk-box">
            <div class="ket-input-box">
                <span>Kategori</span>
                <span class="tag-wajib">
                    Wajib
                </span>
            </div>

            <div class="input-box-produk">
                <input type="text" name="kategori" class="kategori-box" id="" value="<?php echo $r_tampil_produk['kategori'] ?>" required>
            </div>
        </div>

        <!-- gambar -->
        <div class="display-produk-box">
            <div class="ket-input-box">
                <span>Gambar Produk</span>
                <span class="tag-wajib">
                    Wajib
                </span>
            </div>

            <div class="input-box-produk">
                <div class="img-produk-box" id="img-produk-box1" style="background-image: url('http://localhost/Projek%20Reseller%203/image/produk/<?php echo $r_tampil_gambar1 ?>')">
                    <input type="file" name="gambar1" class="img-box1" id="input-image-produk1">
                </div>

                <div class="img-produk-box" id="img-produk-box2" style="background-image: url('http://localhost/Projek%20Reseller%203/image/produk/<?php echo $r_tampil_gambar2 ?>')">
                    <input type="file" name="gambar2" class="img-box2" id="input-image-produk2">
                </div>

                <div class="img-produk-box" id="img-produk-box3" style="background-image: url('http://localhost/Projek%20Reseller%203/image/produk/<?php echo $r_tampil_gambar3 ?>')">
                    <input type="file" name="gambar3" class="img-box3" id="input-image-produk3">
                </div>

                <div class="img-produk-box" id="img-produk-box4" style="background-image: url('http://localhost/Projek%20Reseller%203/image/produk/<?php echo $r_tampil_gambar4 ?>')">
                    <input type="file" name="gambar4" class="img-box4" id="input-image-produk4">
                </div>
            </div>
        </div>

        <!-- harga -->
        <div class="display-produk-box">
            <div class="ket-input-box">
                <span>Harga</span>
                <span class="tag-wajib">
                    Wajib
                </span>
            </div>

            <div class="input-box-produk">
                <div class="input-harga-box">
                    <span class="mata-uang-box">
                        Rp
                    </span>
                    <input type="text" class="harga-box" id="input-harga-produk" value="<?php echo $r_tampil_produk['harga'] ?>" oninput="formatUang(this)" required>
                    <input type="hidden" name="harga" class="harga-box" id="input-harga-hidden" value="<?php echo $r_tampil_produk['harga'] ?>">
                </div>
            </div>
        </div>

        <!-- tautan -->
        <div class="display-produk-box">
            <div class="ket-input-box">
                <span>Tautan Produk</span>
                <span class="tag-wajib">
                    Wajib
                </span>
            </div>
            
            <div class="input-box-produk">
                <div class="link-produk-box">
                    <div id="input-box-link-produk" class="box-link-produks">
                            <?php
                            $q_tampil_tautan = mysqli_query($db, "SELECT * FROM tbecommerce WHERE id_produk = '$idProduk'");
                            if (mysqli_num_rows($q_tampil_tautan)) {
                                while ($r_tampil_tautan = mysqli_fetch_array($q_tampil_tautan)) {
                                ?>
                        <div class="input-box-link-produk">
                            <input type="text" name="nama-ecom-produk[]" class="nama-ecom-produk" id="" placeholder="Masukkan nama E-Commerce" value="<?php echo $r_tampil_tautan['nama_ecomproduk'] ?>" required>
                            <input type="text" name="link-ecom-produk[]" class="link-ecom-produk" id="" placeholder="Masukkan tautan produk" value="<?php echo $r_tampil_tautan['link_ecomproduk'] ?>" required>
                        </div>
                                <?php
                                }
                            }
                            ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- deskripsi -->
        <div class="display-produk-box">
            <div class="ket-input-box">
                <span>Deskripsi</span>
                <span class="tag-wajib">
                    Wajib
                </span>
            </div>

            <div class="input-box-produk">
                <textarea name="deskripsi" id="" cols="30" rows="10" ><?php echo $r_tampil_produk['deskripsi'] ?></textarea>
            </div>
        </div>

        <div class="display-produk-box">
            <div class="ket-input-box">
                <input type="submit" name="simpan" class="btn-simpan-produk" value="Save">
            </div>
        </div>

    </div>

    <script>

        // tampilkan sementara gambar
        var filePreviewDiv1 = document.getElementById("img-produk-box1");
        var fileInputImage1 = document.getElementById("input-image-produk1");
        var filePreviewDiv2 = document.getElementById("img-produk-box2");
        var fileInputImage2 = document.getElementById("input-image-produk2");
        var filePreviewDiv3 = document.getElementById("img-produk-box3");
        var fileInputImage3 = document.getElementById("input-image-produk3");
        var filePreviewDiv4 = document.getElementById("img-produk-box4");
        var fileInputImage4 = document.getElementById("input-image-produk4");

        fileInputImage1.addEventListener("change", function(event) {
            var file = event.target.files[0]; // Mendapatkan file yang diunggah
            // Membaca file sebagai URL data (data URL)
            var reader = new FileReader();
            reader.onload = function(e) {
                var imageUrl = e.target.result;
                // Mengatur background image pada elemen div
                filePreviewDiv1.style.backgroundImage = "url('" + imageUrl + "')";
                };
            reader.readAsDataURL(file);
        });

        fileInputImage2.addEventListener("change", function(event) {
            var file = event.target.files[0]; // Mendapatkan file yang diunggah
            // Membaca file sebagai URL data (data URL)
            var reader = new FileReader();
            reader.onload = function(e) {
                var imageUrl = e.target.result;
                // Mengatur background image pada elemen div
                filePreviewDiv2.style.backgroundImage = "url('" + imageUrl + "')";
                };
            reader.readAsDataURL(file);
        });

        fileInputImage3.addEventListener("change", function(event) {
            var file = event.target.files[0]; // Mendapatkan file yang diunggah
            // Membaca file sebagai URL data (data URL)
            var reader = new FileReader();
            reader.onload = function(e) {
                var imageUrl = e.target.result;
                // Mengatur background image pada elemen div
                filePreviewDiv3.style.backgroundImage = "url('" + imageUrl + "')";
                };
            reader.readAsDataURL(file);
        });

        fileInputImage4.addEventListener("change", function(event) {
            var file = event.target.files[0]; // Mendapatkan file yang diunggah
            // Membaca file sebagai URL data (data URL)
            var reader = new FileReader();
            reader.onload = function(e) {
                var imageUrl = e.target.result;
                // Mengatur background image pada elemen div
                filePreviewDiv4.style.backgroundImage = "url('" + imageUrl + "')";
                };
            reader.readAsDataURL(file);
        });

        // Format uang
        function formatUang(input) {
        // Menghilangkan karakter selain digit dan titik desimal
        var value = input.value.replace(/[^\d.]/g, '');

        // Menghapus titik ribuan jika ada
        value = value.replace(/\./g, '');

        // Memformat nilai menjadi format uang
        var formattedValue = formatRupiah(value);

        // Menampilkan hasil format ke input
        input.value = formattedValue;

        // Menyimpan nilai ke input hidden
        var angka = value.replace(/\./g, '');
        document.getElementById('input-harga-hidden').value = angka;
        }

        function formatRupiah(angka) {
            var bilangan = angka.toString().replace(/\D/g, '');
            var reverse = bilangan.toString().split('').reverse().join('');
            var ribuan = reverse.match(/\d{1,3}/g);
            var hasil = ribuan.join('.').split('').reverse().join('');

            return hasil;
        }
    </script>

            <?php
        }
    }
    ?>

</form>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['simpan'])) {
        extract($_POST);
        $idProduk = $_GET['id'];
        $nama = $_POST['nama'];
        $kategori = $_POST['kategori'];
        $harga = $_POST['harga'];
        $deskripsi = $_POST['deskripsi'];

        mysqli_query($db,
                        "UPDATE tbproduk
                        SET nama_produk = '$nama', kategori = '$kategori', harga = '$harga', deskripsi = '$deskripsi'
                        WHERE id_produk = '$idProduk'"
        );

        $nama_file = $_FILES['gambar1']['name'];
        if (!empty($nama_file)) {
            // Baca lokasi file sementara dan nama file dari form
            $lokasi_file = $_FILES['gambar1']['tmp_name'];
            $tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
            $file_foto = "1" . $idProduk . "." . $tipe_file;

            $id_gambars = "1" . $idProduk;

            // Tentukan folder untuk menyimpan file
            $folder = "../../../image/produk/$file_foto";

            // Apabila file berhasil diupload
            move_uploaded_file($lokasi_file, "$folder");

            mysqli_query($db,
                            "UPDATE tbgambarproduk
                            SET nama_gambar = '$file_foto'
                            WHERE id_gambar = '$id_gambars'"
            );
        }

        $nama_file = $_FILES['gambar2']['name'];
        if (!empty($nama_file)) {
            // Baca lokasi file sementara dan nama file dari form
            $lokasi_file = $_FILES['gambar2']['tmp_name'];
            $tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
            $file_foto = "2" . $idProduk . "." . $tipe_file;

            $id_gambars = "2" . $idProduk;

            // Tentukan folder untuk menyimpan file
            $folder = "../../../image/produk/$file_foto";

            // Apabila file berhasil diupload
            move_uploaded_file($lokasi_file, "$folder");

            mysqli_query($db,
                            "UPDATE tbgambarproduk
                            SET nama_gambar = '$file_foto'
                            WHERE id_gambar = '$id_gambars'"
            );
        }

        $nama_file = $_FILES['gambar3']['name'];
        if (!empty($nama_file)) {
            // Baca lokasi file sementara dan nama file dari form
            $lokasi_file = $_FILES['gambar3']['tmp_name'];
            $tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
            $file_foto = "3" . $idProduk . "." . $tipe_file;

            $id_gambars = "3" . $idProduk;

            // Tentukan folder untuk menyimpan file
            $folder = "../../../image/produk/$file_foto";

            // Apabila file berhasil diupload
            move_uploaded_file($lokasi_file, "$folder");

            mysqli_query($db,
                            "UPDATE tbgambarproduk
                            SET nama_gambar = '$file_foto'
                            WHERE id_gambar = '$id_gambars'"
            );
        }

        $nama_file = $_FILES['gambar4']['name'];
        if (!empty($nama_file)) {
            // Baca lokasi file sementara dan nama file dari form
            $lokasi_file = $_FILES['gambar4']['tmp_name'];
            $tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
            $file_foto = "4" . $idProduk . "." . $tipe_file;

            $id_gambars = "4" . $idProduk;

            // Tentukan folder untuk menyimpan file
            $folder = "../../../image/produk/$file_foto";

            // Apabila file berhasil diupload
            move_uploaded_file($lokasi_file, "$folder");

            mysqli_query($db,
                            "UPDATE tbgambarproduk
                            SET nama_gambar = '$file_foto'
                            WHERE id_gambar = '$id_gambars'"
            );
        }

        // Ambil nilai-nilai yang dikirimkan melalui form
        $namaEcomProduk = $_POST['nama-ecom-produk'];
        $linkEcomProduk = $_POST['link-ecom-produk'];
        // Loop melalui setiap nilai yang dikirimkan
        for ($i = 0; $i < count($namaEcomProduk); $i++) {
            $no = $i + 1;
            $nama = $namaEcomProduk[$i];
            $link = $linkEcomProduk[$i];
            $idLink = $no . $idProduk;

            // Lakukan pembaruan ke database
            mysqli_query($db, 
                "UPDATE tbecommerce
                SET nama_ecomproduk = '$nama', link_ecomproduk = '$link'
                WHERE id_ecomproduk = '$idLink'
            ");
        }
    }
    header("location: index.php?p=index-data&p2=edit-produk-proses&id=$idProduk");
}
?>