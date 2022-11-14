<?php 
include "koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hasil Validasi Sertifikat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="./assets/img/rpa-logo-pavicon.png">
	<!-- Bootstrap core CSS -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="./">Validasi Sertifikat</a>
        </div>
    </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Hasil Validasi Sertifikat</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">                                
                        <tr>
                            <td colspan="3">
                                <center>
                                <img src="assets/img/logo.png" width="250px">
                                <h1>REMOTE PILOT ACADEMY</h1>
                            </td>
                        </tr>
                    </table>
                    <?php
                    $sql=mysqli_query($konek, "SELECT * FROM sertifikat WHERE no_sertifikat='$_GET[no_sertifikat]'");
                    $d=mysqli_fetch_array($sql);

                    if(mysqli_num_rows($sql) < 1){
                        ?>
                        <div class="alert alert-danger">
                            <center>
                            <strong>Maaf, Data tidak ditemukan..!</strong><br>
                            <i>Silakan Hubungi Remote Pilot Academy di Halaman <a href="https://remotepilot.id/contact-us">Kontak</a> </i>
                            </center>
                        </div>
                        <?php
                    }else{
                    ?>
                    <center>
                        <p>Status Sertifikat
                        <br/><span style="font-size: 1.5em;"> <b>
                            Valid Sampai <?php 
                            $tgl1 = $d['tgl_lulus'];
                            $tgl2 = date('Y-m-d', strtotime('+2 year', strtotime($tgl1)));
                            echo $tgl2; 
                            ?></b></span>
                        </p>
                        <p>Nama Remote Pilot <br/> <span style="font-size: 1.5em;"> <b><?php echo $d['nama_rp']; ?></b> </span></p>
                        <p>Kelas <br/> <span><b><?= $b['kelas']; ?></b></span> </p>
                        <p>Nomor Sertifikat <br/> <span style="font-size: 1.5em;"> <b> <?php echo $d['no_sertifikat']; ?></b> </span></p>
                        <img src="assets/img/pasfoto/<?php echo $d['gambar']; ?>" alt="Foto <?php echo $d['nama_rp']; ?>" width="250px">
                    </center>
                    <?php } ?>
                </div>
                <div class="panel-footer">
                    <center><a class="btn btn-danger" href="./validasi_sertifikat.php">Kembali</a></center>
                </div>
            </div>
        </div>
    </div>
</body>
</html>