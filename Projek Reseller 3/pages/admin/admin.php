<div class="posi-admin">
    <div class="input-admin">

        <div class="select-box1">

            <div class="select-option1">
                <input type="text" name="" placeholder="Pilih User" id="soValue1" readonly>
                <a href="index.php?p=index-data&p2=admin"><i class='bx bx-user-plus'></i></a>
            </div>
            <div class="content-option">
                <div class="search-user">
                    <input type="text" name="" id="optionSearch1" placeholder="Search">
                </div>
                <ul class="list-option">
                    <?php
                    $queryadmin = "SELECT * FROM tbadmin";
                    $q_tampil_admin = mysqli_query($db, $queryadmin);
                    if(mysqli_num_rows($q_tampil_admin) > 0){
                        while($r_tampil_admin = mysqli_fetch_array($q_tampil_admin)){
                            ?>
                    <li>
                        <a href="index.php?p=index-data&p2=admin&idk=<?php echo $r_tampil_admin['id_kontak']; ?>">
                            <?php echo $r_tampil_admin['nama_pemilik']; ?>
                        </a>
                    </li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </div>
            
        </div>
        
    </div>
    
    <div class="posi-ket-admin">
    <div class="tampil-admin">
        <?php
        if (isset($_GET['idk'])) {
            $id_admin = $_GET['idk'];
        }else{
            $id_admin = $_SESSION['id_admin'];
        }
        $q_terpilih_admin = mysqli_query($db, "SELECT * FROM tbadmin WHERE id_kontak = '$id_admin'");
        $r_terpilih_admin = mysqli_fetch_array($q_terpilih_admin);
        if (empty($r_terpilih_admin['foto'])or($r_terpilih_admin['foto']=='-')) {
            $foto = "Reseller.png";
        }else {
            $foto = $r_terpilih_admin['foto'];
        }
        ?>

        <form action="" method="post" class="form-admin-pilih" id="form-admin-pilih" enctype="multipart/form-data">
            <div class="foto-admin" style="background-image: url(http://localhost/Projek%20Reseller%203/image/admin/<?php echo $foto ?>);">
                <input type="file" name="foto" id="foto-admin" class="ket-admin-foto" disabled>
                <input type="hidden" name="foto_awal" value="<?php echo $r_terpilih_admin['foto'] ?>">
                <p id="file-name-chosen" id="file-name-chosen" class="file-name-chosen">No file chosen</p>
                <!-- <img src="./image/admin/"> -->
            </div>

            <div class="ket-admin">
                    <input type="hidden" name="id-admin" value="<?php echo $r_terpilih_admin['id_kontak'] ?>">
                    <input type="text" name="nama-admin" id="nama-admin" class="input-data-admin text-nama" value="<?php echo $r_terpilih_admin['nama_pemilik'] ?>" disabled >
                    <input type="text" name="email-admin" id="email-admin" class="input-data-admin" value="<?php echo $r_terpilih_admin['email'] ?>" disabled >
                    <div class="input-data-admin ket-admin-pass">
                        <input type="password" name="pass-admin" class="input-data-admin pass-admin-box" id="pass-admin" value="<?php echo $r_terpilih_admin['pass'] ?>" disabled >
                        <button type="button" class="toggle-pass-btn" id="toggle-pass-admin" disabled><i class='bx bxs-low-vision'></i></button>
                    </div>
                    <div class="btn-admin-box">
                        <input type="button" class="submit-btn" id="edit-admin-btn" value="Edit" >
                        <input type="submit" name="simpan" formaction="pages/admin/proses/edit-admin-proses.php" id="simpan-admin" class="submit-btn" value="Simpan" disabled>
                        <input type="submit" name="hapus" formaction="pages/admin/proses/hapus-admin-proses.php" id="hapus-admin" class="submit-btn" value="Hapus">
                    </div>
            </div>

            <script>
                // file name image
                const fotoAdminDis = document.getElementById("foto-admin");
                const namaFileAdminDis = document.getElementById("file-name-chosen");

                fotoAdminDis.addEventListener("change", function() {
                    const files = fotoAdminDis.files;
                    if (files.length > 0) {
                    namaFileAdminDis.textContent = files[0].name;
                    } else {
                    namaFileAdminDis.textContent = "No file chosen";
                    }
                });

                // disable enable input
                var formAdminPilih = document.getElementById("form-admin-pilih");
                var fotoAdminEdit = document.getElementById("foto-admin");
                var editAdminButton = document.getElementById('edit-admin-btn');
                var namaAdminDis = document.querySelector('#nama-admin');
                var emailAdminDis = document.querySelector('#email-admin');
                var submitAdminDis = document.querySelector('#simpan-admin');

                editAdminButton.addEventListener('click', function() {
                    event.preventDefault();
                    
                    if (namaAdminDis.disabled) {
                        var confirmation = confirm("Apakah Anda Yakin Akan Mengedit Data Ini?");
                        if (confirmation) {
                            fotoAdminEdit.disabled = false;
                            namaAdminDis.disabled = false;
                            emailAdminDis.disabled = false;
                            submitAdminDis.disabled = false;
                            toggleAdminPass.disabled = false;
                            passAdminDis.disabled = false;
                            editAdminButton.value = 'Batal';
                        }
                    }else{
                        fotoAdminEdit.disabled = true;
                        namaAdminDis.disabled = true;
                        emailAdminDis.disabled = true;
                        submitAdminDis.disabled = true;
                        toggleAdminPass.disabled = true;
                        passAdminDis.disabled = true;
                        editAdminButton.value = 'Edit';
                        formAdminPilih.reset();
                    }
                });

                // Haous confirm
                var hapusAdminButton = document.getElementById('hapus-admin');
                hapusAdminButton.addEventListener('click', function(){
                    event.preventDefault();
                    var confirmDelete = confirm('Apakah Anda Yakin Akan Hapus Data Ini?');
                    if (confirmDelete) {
                        hapusAdminButton.form.action = 'pages/admin/proses/hapus-admin-proses.php';
                        hapusAdminButton.form.submit();
                    }else{
                        
                    }
                })

                // hide show pass
                var passAdminDis = document.querySelector('#pass-admin');
                var toggleAdminPass = document.getElementById('toggle-pass-admin');
                toggleAdminPass.addEventListener("mousedown", function(event) {
                    event.preventDefault(); // Mencegah refresh halaman
                    passAdminDis.type = "text";
                });
                
                toggleAdminPass.addEventListener("mouseup", function(event) {
                    event.preventDefault();
                    passAdminDis.type = "password";
                });
            </script>
            
        </form>

    </div>
    </div>
</div>