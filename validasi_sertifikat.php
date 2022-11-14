<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="./assets/img/rpa-logo-pavicon.png">

    <title>Validasi Sertifikat Remote Pilot</title>

    <!-- Bootstrap core CSS -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./assets/style.css" rel="stylesheet">

</head>
<body>
  <div class="container">
    <div class="col-md-4 col-md-offset-4">
      <center>
        <img src="assets/img/darklogo.png" alt="" width="100%" style="padding: 20px;">
      </center>
      <div class="panel panel-primary">
        <div class="panel-heading">
          <center>
            <h3 class="panel-title"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> CEK KEABSAHAN SERTIFIKAT</h3>
          </center>
        </div>
        <div class="panel-body">
          <form method="get" action="validasi.php?no_sertifikat=<?php $_GET = 'no_sertifikat'; ?>">
            <div class="form-group">
              <input type="text" class="form-control" name="no_sertifikat" placeholder="Nomor Sertifikat" />
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-lg btn-primary btn-block" value="Cek Sertifikat" />
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-4 col-md-offset-4">
      <div class="panel panel-danger">
        <div class="panel-heading"> 
          <center>
            <h3 class="panel-title">Keterangan</h3>
          </center>
        </div>
        <div class="panel-body">
        <p>Masukkan Nomor Sertifikat Untuk Mengecek Validasi Sertifikat, 
          Anda juga bisa melakukan <i>scanning</i> pada QRCode yang tertera di sertifikat Anda</p>
          <a href="https://remotepilot.id/sertifikat" class="btn btn-lg btn-danger btn-block">Login Sebagai Admin</a>
        </div>
      </div>
    </div>
  </div>


  <footer class="footer">
    <div class="container"> 
      <center>
        <p class="text-muted">&#169;2022 <a href="https://remotepilot.id" target="_blank">Remote Pilot Academy</a> </p>
      </center>
    </div>
  </footer>


<!-- Bootstrap core JavaScript
================================================== -->
<script src="./assets/js/jquery.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
</body>
</html>