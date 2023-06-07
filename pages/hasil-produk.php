<?php
if (isset($_GET['id'])) {
    $idProduk = $_GET['id'];

    $q_tampil_produk = mysqli_query($db, "SELECT *  FROM tbproduk WHERE id_produk = '$idProduk'");
    $r_tampil_produk = mysqli_fetch_array($q_tampil_produk);

    $q_tampil_gambar = mysqli_query($db, "SELECT * FROM tbgambarproduk WHERE id_produk = '$idProduk'");
    
    $gambar1 = "1" . $_GET['id'];
    $q_tampil_preview1 = mysqli_query($db, "SELECT * FROM tbgambarproduk 
                                        WHERE id_produk = '$idProduk' 
                                        AND id_gambar = '$gambar1'");
    $r_tampil_preview1 = mysqli_fetch_array($q_tampil_preview1);

    $q_tampil_link = mysqli_query($db, "SELECT * FROM tbecommerce WHERE id_produk = '$idProduk'");
    if (mysqli_num_rows($q_tampil_produk) > 0) {
        ?>
        
<div class="container-ket-produk">
    <div class="tampil-produk-box">
        <div class="ket-produk1">
            <div class="gambar-produk1">
                <div class="preview-gambar-produk" style="background-image: url('http://localhost/Projek%20Reseller%203/image/produk/<?php echo $r_tampil_preview1['nama_gambar']; ?>')">
                </div>
                <div class="list-gambar-produk">
                    <?php 
                    while ($r_tampil_gambar = mysqli_fetch_array($q_tampil_gambar)) {
                        ?>
                        
                        <div class="gambar-produk-child" style="background-image: url('http://localhost/Projek%20Reseller%203/image/produk/<?php echo $r_tampil_gambar['nama_gambar']; ?>')"></div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="ket-produk2">
                <div class="nama-produk">
                    <?php echo $r_tampil_produk['nama_produk']; ?>
                </div>
                <div class="kategori-produk">
                    <?php echo $r_tampil_produk['kategori']; ?>
                </div>
                <div class="harga-produk">
                    Rp. <?php echo number_format($r_tampil_produk['harga'], 0, ',', '.'); ?>
                </div>
                <div class="link-produk">
                    <div class="tab-menu">
                        <button class="tab-link active" data-target="link">
                            Link Toko
                        </button>
                        <button class="tab-link" data-target="deskripsi">
                            Deskripsi
                        </button>
                    </div>
                    <div class="tab-content">
                        <div id="link" class="tab-pane active">
                            <div class="link-produk-btn1">
                                <div class="toggle-pesan" onclick="togglePesanBox()">
                                    <button class="tombol-pesan">
                                        <i class="fab fa-whatsapp"></i>
                                    </button>
                                    <p>Hubungi Kami</p>
                                </div>
                                <!-- Kotak pesan -->
                                <div class="pesan-box" id="pesanBox">
                                    <div class="atur-display-pesan">
                                        <button class="tombol-silang" onclick="togglePesanBox()">
                                            <i class="fas fa-times"></i>
                                        </button>
                                        <div class="atur-display-isi">
                                            <textarea class="teks-pesan" id="textareaPesan" placeholder="Tulis pesan Anda">Halo Admin, Saya ingin bertanya mengenai  produk : <?php echo $r_tampil_produk['nama_produk'] ?>,

Isi pesan : </textarea>
                                            <button class="kirim-pesan" onclick="kirimPesan()"><i class='bx bxs-send'></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php
                        if (mysqli_num_rows($q_tampil_link) > 0) {
                            while($r_tampil_link = mysqli_fetch_array($q_tampil_link)) {
                                ?>
                                
                            <a href="<?php echo $r_tampil_link['link_ecomproduk'] ?>" class="link-produk-btn" target="_blank"><?php echo $r_tampil_link['nama_ecomproduk'] ?></a>

                                <?php
                            }
                        }
                        ?>
                        </div>
                        <div id="deskripsi" class="tab-pane">
                            <textarea class="deskripsi-isi" cols="30" rows="10" disabled><?php echo $r_tampil_produk['deskripsi'] ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="deskripsi-produk1">

        </div>
    </div>
    <div class="kilas-produk1-box">
        Kilas produk
    </div>
</div>

<script>
    // // preview gambar
    // // Ambil elemen-elemen yang diperlukan
    // var previewGambarProduk = document.querySelector('.preview-gambar-produk');
    // var listGambarProduk = document.querySelectorAll('.gambar-produk-child');

    // // Tambahkan event listener pada setiap elemen .gambar-produk-child
    // listGambarProduk.forEach(function(gambarProduk) {
    //     gambarProduk.addEventListener('mousemove', function() {
    //         // Ambil URL gambar latar belakang dari elemen yang diklik
    //         var gambarURL = window.getComputedStyle(gambarProduk).getPropertyValue('background-image');
            
    //         // Ubah gambar latar belakang pada elemen .preview-gambar-produk
    //         previewGambarProduk.style.backgroundImage = gambarURL;
    //     });
    // });

    // preview and active
    // Ambil elemen-elemen yang diperlukan
    var previewGambarProduk = document.querySelector('.preview-gambar-produk');
    var listGambarProduk = document.querySelectorAll('.gambar-produk-child');

    // Tambahkan event listener pada setiap elemen .gambar-produk-child
    listGambarProduk.forEach(function(gambarProduk) {
        gambarProduk.addEventListener('mousemove', function() {
            // Ambil URL gambar latar belakang dari elemen yang diklik
            var gambarURL = window.getComputedStyle(gambarProduk).getPropertyValue('background-image');

            // Ubah gambar latar belakang pada elemen .preview-gambar-produk
            previewGambarProduk.style.backgroundImage = gambarURL;

            // Loop melalui semua elemen .gambar-produk-child
            for (var i = 0; i < listGambarProduk.length; i++) {
                var child = listGambarProduk[i];

                // Ambil background image dari child
                var backgroundImage = window.getComputedStyle(child).getPropertyValue('background-image');

                // Cek apakah background image di child sama dengan background image di preview
                if (backgroundImage === gambarURL) {
                    // Tambahkan kelas "active" pada child yang sesuai
                    child.classList.add('active');
                } else {
                    // Hapus kelas "active" pada child yang tidak sesuai
                    child.classList.remove('active');
                }
            }
        });
    });

    // magnifier
    // Tambahkan event listener pada elemen .preview-gambar-produk
    previewGambarProduk.addEventListener('mousemove', function(event) {
    // Ambil posisi kursor relatif terhadap elemen .preview-gambar-produk
    const x = event.clientX - this.getBoundingClientRect().left;
    const y = event.clientY - this.getBoundingClientRect().top;

    // Hitung persentase posisi kursor relatif terhadap lebar dan tinggi elemen
    const percentX = (x / this.offsetWidth) * 100;
    const percentY = (y / this.offsetHeight) * 100;

    // Atur posisi background image dengan persentase yang sesuai
    previewGambarProduk.style.backgroundPosition = `${percentX}% ${percentY}%`;
    previewGambarProduk.style.backgroundSize = '200%';
    });

    // Tambahkan event listener pada elemen .preview-gambar-produk
    previewGambarProduk.addEventListener('mouseleave', function() {
    // Reset background position dan background size saat kursor meninggalkan elemen .preview-gambar-produk
    previewGambarProduk.style.backgroundPosition = 'center';
    previewGambarProduk.style.backgroundSize = 'contain';
    });

    // tab panel
    // Ambil elemen-elemen yang diperlukan
    var tabLinks = document.querySelectorAll('.tab-link');
    var tabPanes = document.querySelectorAll('.tab-pane');

    // Tambahkan event listener pada setiap tab link
    tabLinks.forEach(function(tabLink) {
    tabLink.addEventListener('click', function() {
        var target = tabLink.getAttribute('data-target');

        // Hilangkan kelas "active" dari semua tab link dan tab pane
        tabLinks.forEach(function(link) {
        link.classList.remove('active');
        });
        tabPanes.forEach(function(pane) {
        pane.classList.remove('active');
        });

        // Tambahkan kelas "active" pada tab link dan tab pane yang sesuai dengan target
        tabLink.classList.add('active');
        document.getElementById(target).classList.add('active');
    });
    });


    // kotak pesan
    // Fungsi untuk membuka/menutup kotak pesan
    var pesanBoxVisible = false;

    function togglePesanBox() {
        var pesanBox = document.getElementById('pesanBox');
        if (!pesanBoxVisible) {
            pesanBox.style.display = 'block';
            pesanBoxVisible = true;
        } else {
            pesanBox.style.display = 'none';
            pesanBoxVisible = false;
        }
    }

    // Fungsi untuk mengirim pesan ke WhatsApp
    function kirimPesan() {
        var teksPesan = document.querySelector('.teks-pesan').value;
        var encodedPesan = encodeURIComponent(teksPesan);
        var whatsappURL = 'https://wa.me/6285349111065?text=' + encodedPesan;
        window.open(whatsappURL, '_blank');
    }

    //   automatic height textarea
    // Ambil elemen textarea
    var textareaPesan = document.getElementById('textareaPesan');

    // Fungsi untuk mengatur tinggi textarea
    function aturTinggiTextarea() {
        textareaPesan.style.height = 'auto'; // Setel kembali ke tinggi otomatis
        textareaPesan.style.height = textareaPesan.scrollHeight + 'px'; // Atur tinggi textarea sesuai tinggi konten
    }

    // Panggil fungsi aturTinggiTextarea saat textarea berubah
    textareaPesan.addEventListener('input', aturTinggiTextarea);

    // Panggil fungsi aturTinggiTextarea saat halaman dimuat
    window.addEventListener('load', aturTinggiTextarea);

    </script>
            <?php
        }
    }
?>