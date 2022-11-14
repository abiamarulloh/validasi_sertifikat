<?php
if(isset($_GET['nomor']) && $_GET['nomor'] !=''){
    //tampung data kiriman
    $nrp=$_GET['nrp'];
    $link="https://remotepilot.id/validasi.php?no_sertifikat=";
    $nomor = $_GET['nomor'];

    // include file qrlib.php
    include "phpqrcode/qrlib.php";

    //Nama Folder file QR Code kita nantinya akan disimpan
    $tempdir = "temp/";

    //jika folder belum ada, buat folder 
    if (!file_exists($tempdir)){
        mkdir($tempdir);
    }

    #parameter inputan
    $isi_teks = $link.$nomor;
    $namafile = $nrp.".png";
    $quality = 'H'; //ada 4 pilihan, L (Low), M(Medium), Q(Good), H(High)
    $ukuran = 5; //batasan 1 paling kecil, 10 paling besar
    $padding = 2;

    QRCode::png($isi_teks,$tempdir.$namafile,$quality,$ukuran,$padding);

    header('location:data_remotepilot.php');

}else{
    header('location:data_remotepilot.php');
}
?>