<?php 
session_start();
if(isset($_SESSION['login'])){
	include "koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sertifikat</title>
	<link rel="icon" href="./assets/img/logo.png">
	<style type="text/css">
		body{
			font-family: Arial;
		}

		@media print{
			.no-print{
				display: none;
			}
		}

		table{
			border-collapse: collapse;
		}
	</style>
</head>
<body>
<table border="1" cellpadding="40" cellspacing="0" width="100%">
<tr>
	<td>
	<table width="100%">
		<?php
		$sql=mysqli_query($konek, "SELECT * FROM sertifikat WHERE id='$_GET[id]'");
		$d=mysqli_fetch_array($sql);
		?>
		<tr>
			<td colspan="3">
				<center>
				<img src="assets/img/logo.png" width="205px" >
				<h2>SERTIFIKAT KOMPETENSI<br/><i>CERTIFICATE OF COMPETENCE</i></h2>
				<P>No. <?php echo $d['no_sertifikat']; ?></P>
				<p>Dengan ini menyatakan bahwa<br/><i>This is to certify that</i></p>
				<p><span style="font-size:2em ;"><b><?php echo $d['nama_rp']; ?></b></span><br>
				NRP <?php echo $d['nrp']; ?></p>
				<p>Telah Kompeten pada Bidang <br/><i>Is competent in the area of</i></p>
				<h2>Remote Pilot Professional</h2>
				<p>Dengan Kelas :<br/><i>With Rating:</i></p>
				<h2>Sistem Pesawat Udara Kecil Tanpa Awak<br/><i>Small Unmanned Aircraft System</i></h2>
				<p>Sertifikat Berlaku untuk 2 (dua) Tahun<br/><i>This Certificate is valid for 2 (Two) Years</i></p>
				<p>Atas Nama PT Galeri Angkasa Sejahtera<br/><i>On Behalf of PT Galeri Angkasa Sejahtera</i></p>
				<p>Remote Pilot Academy</p>
				<br>
				</center>
			</td>
		</tr>
		<tr>
			<td><img src="temp/<?php echo $d['nrp'].".png"; ?>" width="160px"></td>
			<td></td>
			<td width="300px">
				<center><p>Jakarta, <?php echo tglIndonesia(date('Y-m-d')); ?><br/> CEO & Founder,</p></center>
				<img src="assets/img/signstamps.png" width="300px" style="margin: -60px 0px -45px -80px;">
				<center><p><b>Liu Purnomo</b></p></center>
			</td>
		</tr>
	</table>
	</td>
</tr>
</table>
<br>
<table border="1" cellpadding="40" cellspacing="0" width="100%">
<tr>
	<td>
	<table width="100%">
		<?php
		$sql=mysqli_query($konek, "SELECT * FROM sertifikat WHERE id='$_GET[id]'");
		$d=mysqli_fetch_array($sql);
		?>
		<tr>
			<td colspan="3">
			<img src="assets/img/darklogo.png" width="140px" >
			<br>
				<center>
				<img src="assets/img/silabus-sertifikasi.png" width="100%" >
				<p>
				Atas Nama PT Galeri Angkasa Sejahtera <br/><i>
				On Behalf of PT Galeri Angkasa Sejahtera</i><br/>Remote Pilot Academy</p>
				</center>
			</td>
		</tr>
		<tr>
			<td>
				<center><p></center>
				<br><br><br><br>
				<center><p><b><?php echo $d['nama_rp']; ?></b><br/>Tanda tangan pemilik <br/><i>Signature of holder</i></p></center>
			</td>
			<td><center><img src="assets/img/pasfoto/<?php echo $d['gambar']; ?>" height="150px"></center></td>
			<td width="300px">
				<center><p>Jakarta, <?php echo tglIndonesia(date('Y-m-d')); ?></p>
				<img src="assets/img/sign-as.png" height="110px" style="margin: -30px -30px;">
				<p><b>Agus Santoso</b><br/>Manajer Sertifikasi<br/><i>Certification Manager</i></p></center>
			</td>
		</tr>
	</table>
	</td>
</tr>
</table>
<center><a href="#" class="no-print" onclick="window.print();">Cetak/Print</a></center>
</body>
</html>

<?php
}else{
	header('location:login.php');
}
?>