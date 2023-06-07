<?php
session_start();
	include "../../koneksi.php";
	if( isset($_POST['login']))
	{
			$user	= isset($_POST['email']) ? $_POST['email'] : "";
			$pass	= isset($_POST['password']) ? $_POST['password'] : "";
			$qry	= mysqli_query($db,"SELECT * FROM tbadmin WHERE email = '$user' AND pass = '$pass'");
			$sesi	= mysqli_num_rows($qry);

			if ($sesi == 1)
			{
				$data_admin	= mysqli_fetch_array($qry);
				$_SESSION['id_admin'] = $data_admin['id_kontak'];
				$_SESSION['sesi'] = $data_admin['nama_pemilik'];
                $id_admin = $data_admin['id_kontak'];
				
				echo "<script>alert('Anda berhasil Log In');</script>";
				echo "<meta http-equiv='refresh' content='0; url=../../index.php?p=index-data&idk=$id_admin'>";
			}
			else
			{
				echo "<script>alert('Anda Gagal Log In');</script>";
				echo "<meta http-equiv='refresh' content='0; url=../../index.php?p=beranda'>";
			}
	}
	else
	{
	  include "index.php";
	};
?>