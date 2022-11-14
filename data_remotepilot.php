<?php include "header.php"; ?>

<div class="container">

<?php
$view = isset($_GET['view']) ? $_GET['view'] : null;

switch($view){
	default:
	?>
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Data Remote Pilot</h3>
			</div>
			<div class="panel-body">
				<a class="btn btn-primary" style="margin-bottom: 10px" href="data_remotepilot.php?view=tambah">Tambah Data</a>
				<table class="table table-bordered table-striped">
					<tr>
						<th>No</th>
						<th>nrp</th>
						<th>Nama Remote Pilot</th>
						<th>Program Studi</th>
						<th>Tanggal Lulus</th>
						<th>Nomor sertifikat</th>
						<th>Sertifikat</th>
					</tr>
					<?php
					$sql=mysqli_query($konek, "SELECT * FROM sertifikat ORDER BY id ASC");
					$no=1;
					while($d=mysqli_fetch_array($sql)){
						echo "<tr>
							<td width='40px' align='center'>$no</td>
							<td>$d[nrp]</td>
							<td>$d[nama_rp]</td>
							<td>$d[kelas]</td>
							<td>$d[tgl_lulus]</td>
							<td>$d[no_sertifikat]</td>
							<td width='180px' align='center'>
								<a class='btn btn-danger btn-sm' href='buatQRCode.php?nrp=$d[nrp]&nomor=$d[no_sertifikat]'>Buat Kode QR</a>
								<a class='btn btn-success btn-sm' href='cetak_sertifikat.php?id=$d[id]' target='_blank'>Cetak</a>
							</td>
						</tr>";
						$no++;
					}
					?>
				</table>
			</div>
		</div>
	</div>

<?php
	break;
	case "tambah":

	$max_nrp = mysqli_query($konek, "SELECT MAX(nrp) FROM sertifikat");
	$current_nrp_counter = $max_nrp->fetch_array()[0] + 1
?>
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Tambah Data Remote Pilot</h3>
			</div>
			<div class="panel-body">
				
				<form method="post" enctype="multipart/form-data" action="aksi_remotepilot.php?act=insert">
					<table class="table">
						<tr>
							<td width="160">nrp</td>
							<td>
								<div class="col-md-4"><input class="form-control" type="text" value="<?= $current_nrp_counter ?>" name="nrp" required /></div>
							</td>
						</tr>
						<tr>
							<td>Nama Remote Pilot</td>
							<td><div class="col-md-6"><input class="form-control" type="text" name="nama" required /></div></td>
						</tr>
						<tr>
							<td>Kelas</td>
							<td>
								<div class="col-md-6">
									<select name="kelas" class="form-control">
									<option value="Initial Course">Initial Course</option>
									<option value="Flight Review">Flight Review</option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td>Tanggal Lulus</td>
							<td><div class="col-md-4"><input class="form-control" type="date" name="tgllulus" required /></div></td>
						</tr>
						<tr>
							<td>No. Sertifikat</td>
							<td><div class="col-md-6"><input class="form-control" type="text" name="nosertifikat" required /></div></td>
						</tr>
						<tr>
							<td>Pasfoto</td>
							<td><div class="col-md-6"><input class="form-control" type="file" name="gambar" required /></div></td>
						</tr>
						<tr>
							<td></td>
							<td>
							<div class="col-md-6">
								<input class="btn btn-primary" type="submit" value="Simpan" />
								<a class="btn btn-danger" href="data_remotepilot.php">Kembali</a>
								</div>
							</td>
						</tr>
					</table>
				</form>

			</div>
		</div>
	</div>

<?php
	break;
}
?>

</div>

<?php include "footer.php"; ?>