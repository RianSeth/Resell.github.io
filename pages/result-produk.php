<div class="result-box1">
    <form method="POST">
        <div class="filter-box1">
            <div class="ket-filter">
                Filter
            </div>

            <div class="filter-kategori">
                <span>
                    Kategori
                </span>
                <div class="all-kategori-box">
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
            </div>
        </div>
    </form>

    <form method="POST" class="result-width-box">
        <div class="result-produk-box1">
            <div class="result-info1">
                <?php
                // Menghitung total barang di database
                $queryTotalBarang = mysqli_query($db, "SELECT COUNT(*) AS total FROM tbproduk");
                $dataTotalBarang = mysqli_fetch_assoc($queryTotalBarang);
                $totalBarang = $dataTotalBarang['total'];

                if (isset($_POST['pencarian'])) {
                    $pencarian = $_POST['pencarian'];
                    $queryJumlahBarang = mysqli_query($db, "SELECT COUNT(*) AS jumlah FROM tbproduk 
                                                    WHERE nama_produk LIKE '%$pencarian%'
                                                    OR kategori LIKE '%$pencarian%'
                                                    OR harga LIKE '%$pencarian%'");
                    $dataJumlahBarang = mysqli_fetch_assoc($queryJumlahBarang);
                    $jumlahBarang = $dataJumlahBarang['jumlah'];

                    if ($_POST['pencarian'] == NULL) {
                        echo "Menampilkan total " . number_format($totalBarang) . " barang";
                        $q_tampil_produk = mysqli_query($db, "SELECT * FROM tbproduk");
                    }elseif ($jumlahBarang == 0) {
                        echo "<div class='tidak-ditemukan'>
                                    <div class='icon-tak-ditemu'>
                                        <i class='bx bx-question-mark'></i>
                                    </div>
                                    <div class='text-tak-ditemu'>
                                        <span>
                                            Oops, tidak tidak ditemukan
                                        </span>
                                        kata kunci \"$pencarian\" tidak ada.
                                    </div>
                                </div>";
                        $q_tampil_produk = mysqli_query($db, "SELECT * FROM tbproduk");
                    } else {
                        // Menampilkan total barang
                        echo "Menampilkan " . number_format($jumlahBarang) . " barang dari total " . number_format($totalBarang) . " untuk kata kunci \"$pencarian\"";   
                        $q_tampil_produk = mysqli_query($db, "SELECT * FROM tbproduk 
                                                            WHERE nama_produk LIKE '%$pencarian%'
                                                            OR kategori LIKE '%$pencarian%'
                                                            OR harga LIKE '%$pencarian%'");
                    }
                }else {
                    echo "Menampilkan total " . number_format($totalBarang) . " barang";
                    $q_tampil_produk = mysqli_query($db, "SELECT * FROM tbproduk");
                }
                ?>

            </div>

            <div class="result-list-produk">
                <div class="wrapper1">
                    <ul class="carousel1">
                        <?php
                        while($r_tampil_produk = mysqli_fetch_array($q_tampil_produk)) {
                            $idGambar = "1" . $r_tampil_produk['id_produk'];
                            $q_tampil_gambar = mysqli_query($db, "SELECT * FROM tbgambarproduk WHERE id_gambar = '$idGambar'");
                            $r_tampil_gambar = mysqli_fetch_array($q_tampil_gambar);
                            ?>

                        <a href="index.php?p=hasil-produk&id=<?php echo $r_tampil_produk['id_produk'] ?>" style="color: #000">
                            <li class="card1">
                                <div class="img"><img src="./image/produk/<?php echo $r_tampil_gambar['nama_gambar'] ?>" alt="img" draggable="false"></div>
                                <h2><?php echo $r_tampil_produk['nama_produk']; ?></h2>
                                <span>Rp <?php echo number_format($r_tampil_produk['harga'], 0, ',', '.'); ?></span>
                            </li>
                        </a>

                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>

        <div class="margin-bawah"></div>
            
        </div>    
    </form>
    
</div>