<form method="POST" enctype="multipart/form-data">
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
                <input type="text" name="nama" class="nama-box" id="" required>
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
                <input type="text" name="kategori" class="kategori-box" id="" required>
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
                <div class="img-produk-box" id="img-produk-box1">
                    <input type="file" name="gambar[]" class="img-box1" id="input-image-produk1" required>
                </div>

                <div class="img-produk-box" id="img-produk-box2">
                    <input type="file" name="gambar[]" class="img-box2" id="input-image-produk2">
                </div>

                <div class="img-produk-box" id="img-produk-box3">
                    <input type="file" name="gambar[]" class="img-box3" id="input-image-produk3">
                </div>

                <div class="img-produk-box" id="img-produk-box4">
                    <input type="file" name="gambar[]" class="img-box4" id="input-image-produk4">
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
                    <input type="text" class="harga-box" id="input-harga-produk" oninput="formatUang(this)" required>
                    <input type="hidden" name="harga" class="harga-box" id="input-harga-hidden">
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
                        <div class="input-box-link-produk">
                            <input type="text" name="nama-ecom-produk[]" class="nama-ecom-produk" id="" placeholder="Masukkan nama E-Commerce" required>
                            <input type="text" name="link-ecom-produk[]" class="link-ecom-produk" id="" placeholder="Masukkan tautan produk" required>
                        </div>
                    </div>
                    <button class="addButton" id="addButton">
                        <i class='bx bx-layer-plus'></i>
                        <span>Tambah Link</span>
                    </button>
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
                <textarea name="deskripsi" id="" cols="30" rows="10"></textarea>
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

        // input link produk
        var btnTambahLink = document.getElementById('addButton');
        var container = document.getElementById('input-box-link-produk');
        var inputCounter = 0;

        btnTambahLink.addEventListener('click', function(event) {
            event.preventDefault();
            inputCounter++;

            // Buat div baru untuk mengelompokkan input
            var divElement = document.createElement('div');
            divElement.className = 'input-box-link-produk';

            // Buat input pertama
            var inputElement1 = document.createElement('input');
            inputElement1.type = 'text';
            inputElement1.name = 'nama-ecom-produk[]';
            inputElement1.placeholder = 'Masukkan nama E-Commerce';
            inputElement1.className = 'nama-ecom-produk';
            inputElement1.required = true;

            // Tambahkan input pertama ke dalam div
            divElement.appendChild(inputElement1);

            // Buat input kedua
            var inputElement2 = document.createElement('input');
            inputElement2.type = 'text';
            inputElement2.name = 'link-ecom-produk[]';
            inputElement2.placeholder = 'Masukkan tautan produk';
            inputElement2.className = 'link-ecom-produk';
            inputElement2.required = true;

            // Tambahkan input kedua ke dalam div
            divElement.appendChild(inputElement2);

            // Tambahkan div ke dalam container
            container.appendChild(divElement);
        });


    </script>
</form>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['simpan'])) {
        extract($_POST);
        $nama = $_POST['nama'];
        $kategori = $_POST['kategori'];
        $harga = $_POST['harga'];
        $deskripsi = $_POST['deskripsi'];

        // Mengambil huruf pertama dari setiap kata dalam nama
        $namaKata = explode(' ', $nama);
        $namaHuruf = '';
        foreach ($namaKata as $kata) {
            $namaHuruf .= substr($kata, 0, 1);
        }

        // Mengambil huruf pertama dari setiap kata dalam kategori
        $kategoriKata = explode(' ', $kategori);
        $kategoriHuruf = '';
        foreach ($kategoriKata as $kata) {
            $kategoriHuruf .= substr($kata, 0, 1);
        }

        // Query SQL untuk mendapatkan angka urutan produk
        $sql = "SELECT COUNT(*) as total FROM tbproduk";
        $result = mysqli_query($db, $sql);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $angkaUrutan = $row["total"] + 1;
        } else {
            $angkaUrutan = 1;
        }

        // Menggabungkan huruf dari nama, kategori, dan angka urutan menjadi ID produk
        $idProduk = $namaHuruf . $kategoriHuruf . $angkaUrutan;

        $sql = "INSERT INTO tbproduk
                VALUES('$idProduk','$nama','$kategori','$harga','$deskripsi')";
        $query = mysqli_query($db, $sql);
        if (!$query) {
            echo "Error: " . $sql . "<br>" . mysqli_error($db);
        }

        // -----------------------------------------------------------------

        // Mendapatkan jumlah gambar yang diunggah
        $jumlah_gambar = count($_FILES['gambar']['name']);

        $no = 1;
        // Looping untuk mengolah setiap gambar
        for ($i = 0; $i < $jumlah_gambar; $i++) {
            $nama_file = $_FILES['gambar']['name'][$i];
            if (!empty($nama_file)) {
                // Baca lokasi file sementara dan nama file dari form
                $lokasi_file = $_FILES['gambar']['tmp_name'][$i];
                $tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
                $file_foto = $no . $idProduk . "." . $tipe_file;

                // ID gambar
                $id_gambars = $no . $idProduk;

                // Tentukan folder untuk menyimpan file
                $folder = "./image/produk/$file_foto";

                // Apabila file berhasil diupload
                move_uploaded_file($lokasi_file, "$folder");

                // Simpan informasi gambar ke dalam database
                $sql = "INSERT INTO tbgambarproduk
                        VALUES('$id_gambars','$idProduk','$file_foto')";
                $query = mysqli_query($db, $sql);
                if (!$query) {
                    echo "Error: " . $sql . "<br>" . mysqli_error($db);
                }

                // menambahkan nomor gambar
                $no++;
            }
        }

        //----------------------------------------------------------------------

        // Mengambil nilai input dari formulir
        $namaEcommerce = $_POST['nama-ecom-produk'];
        $linkEcommerce = $_POST['link-ecom-produk'];

        for ($i = 0; $i < count($namaEcommerce); $i++) {
            $nama = mysqli_real_escape_string($db, $namaEcommerce[$i]);
            $link = mysqli_real_escape_string($db, $linkEcommerce[$i]);

            // id link
            $id_links = ($i + 1) . $idProduk;

            // Query SQL untuk menyimpan data ke dalam database
            $sql = "INSERT INTO tbecommerce 
                    VALUES ('$id_links','$idProduk','$nama', '$link')";
            $query = mysqli_query($db, $sql);
            if (!$query) {
                echo "Error: " . $sql . "<br>" . mysqli_error($db);
            }
        }

    }

    header("location: ../../../index.php?p=index-data&p2=list-produk");
    exit();
}
?>