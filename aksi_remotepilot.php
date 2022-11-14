<?php
session_start();
if(!isset($_SESSION['login'])){
	header('location:login.php');
}
include "koneksi.php";

// jika ada get act
if(isset($_GET['act'])){

	//proses simpan data
	if($_GET['act']=='insert'){
		//variabel dari elemen form
		$nrp 	= $_POST['nrp'];
		$nama 	= $_POST['nama'];
		$kelas  = $_POST['kelas'];
		$tgl	= $_POST['tgllulus'];
		$nosertifikat = $_POST['nosertifikat'];

		//upload gambar
		$gambar = upload();
		if(!$gambar) {
			return false;
		}
		
		if($nrp=='' || $nama=='' || $kelas=='' || $tgl=='' || $nosertifikat=='' || $gambar==''){
			header('location:data_remotepilot.php?view=tambah');
		}else{			
			//proses simpan data admin
			$simpan = mysqli_query($konek, "INSERT INTO sertifikat(nrp,nama_rp,kelas,tgl_lulus,no_sertifikat,gambar) 
							VALUES ('$nrp','$nama','$kelas','$tgl','$nosertifikat','$gambar')");

			function upload() {

				$namaFile = $_FILES['gambar']['name'];
				$ukuranFile = $_FILES['gambar']['size'];
				$error = $_FILES['gambar']['error'];
				$tmpName = $_FILES['gambar']['tmp_name'];

				//cek apakah ada gambar yang di upload
				if($error === 4){
					echo "<script> alert ('Belum ada gambar'); </script>";
					return false;
				}

				$extensiGambarValid = ['jpg', 'jpeg', 'png', 'webp'];
				$extensiGambar = explode('.', $namaFile);
				$extensiGambar = strtolower(end($extensiGambar));
				if( !in_array($extensiGambar, $extensiGambarValid)){
					echo "<script> alert ('hanya boleh file dengan extensi jpg, jpeg, atau webp'); </script>";
					return false;
				}

				//cek ukuran file
				if( $ukuranFile > 1000000) {
					echo "<script> alert ('Ukuran gambar terlalu besar, maksimal 1 MB'); </script>";
					return false;
				}

				//lolos cek gambar siap di upload
				move_uploaded_file($tmpName, 'assets/img/pasfoto/' . $namaFile);
			}
			
			if($simpan){
				// BUAT QRCODE
				// tampung data kiriman
				$nomor = $nosertifikat;
			
				// include file qrlib.php
				include "phpqrcode/qrlib.php";
			
				//Nama Folder file QR Code kita nantinya akan disimpan
				$tempdir = "temp/";
			
				//jika folder belum ada, buat folder 
				if (!file_exists($tempdir)){
					mkdir($tempdir);
				}
			
				#parameter inputan
				$isi_teks = $nomor;
				$namafile = $nrp.".png";
				$quality = 'H'; //ada 4 pilihan, L (Low), M(Medium), Q(Good), H(High)
				$ukuran = 5; //batasan 1 paling kecil, 10 paling besar
				$padding = 2;
			
				QRCode::png($isi_teks,$tempdir.$namafile,$quality,$ukuran,$padding);

				header('location:data_remotepilot.php');
			}else{
				header('location:data_remotepilot.php');
			}
		}
	} // akhir proses simpan data

	else{
		header('location:data_remotepilot.php');
	}

} // akhir get act

else{
	header('location:data_remotepilot.php');
}
?>