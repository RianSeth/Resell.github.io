<div class="posi-admin">
    <div class="posi-ket-admin">
        <div class="tampil-admin">
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
            </form>
        </div>
    </div>
</div>