<?php
// Require composer autoload
require_once '../../vendor/autoload.php';

// Require config
require_once '../../config/koneksi.php';
require_once '../../config/timezone.php';

// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'format' => 'A4',
    'default_font' => 'times',
    'default_font_size' => 11,
    'margin_left' => 15,
]);
$mpdf->SetTitle('Nota Permintaan Perjalanan Dinas');

$now = date('YmdHis');
$no = 1;

// Fetching data from the database
$id_nppd = $_GET['id_nppd'];

$query = mysqli_query($koneksi, "SELECT * FROM nppd JOIN kota ON nppd.kota_id = kota.id_kota JOIN kendaraan ON nppd.kendaraan_id = kendaraan.id_kendaraan WHERE id_nppd = '$id_nppd'");
$nppd = mysqli_fetch_assoc($query);

$pegawai_id = $nppd['pegawai_id'];

$pegawai = mysqli_query($koneksi, "SELECT * FROM pegawai JOIN golongan ON pegawai.golongan_id = golongan.id_golongan WHERE id_pegawai IN ($pegawai_id)");
$pegawai = mysqli_fetch_all($pegawai, MYSQLI_ASSOC);

$instansi = mysqli_query($koneksi, "SELECT * FROM profil_instansi");
$instansi = mysqli_fetch_assoc($instansi);

// Write some HTML code:

$html = '<style>
.float-right {
    float: right;
}
</style>
<h3 style="text-align: center;"><u>NOTA PERMINTAAN PERJALANAN DINAS</u></h3>
<table>';

foreach ($pegawai as $p) {
    $html .= '<tr>
        <td>'.$no++.'.</td>
        <td>Nama</td>
        <td style="padding-left: 10px">:</td>
        <td>'.$p['nama'].'</td>
    </tr>
    <tr>
        <td></td>
        <td>NIP</td>
        <td style="padding-left: 10px;">:</td>
        <td>'.$p['nip'].'</td>
    </tr>
    <tr>
        <td></td>
        <td>Pangkat / Golongan</td>
        <td style="padding-left: 10px;">:</td>
        <td>'. $p['pangkat'] .' / Golongan '.$p['nama_golongan'].'</td>
    </tr>
    <tr>
        <td></td>
        <td>Jabatan</td>
        <td style="padding-left: 10px;">:</td>
        <td>'.$p['jabatan'].'</td>
    </tr>';
}

$html .= '</table>';
$html .= '<p>Mohon diberikan Surat Perintah Tugas dan Surat Perintah Perjalanan Dinas</p>';
$html .= '<table>
    <tr>
        <td>1.</td>
        <td>Tujuan</td>
        <td style="padding-left: 10px">:</td>
        <td><b>'.$nppd['nama_kota'].'</b></td>
    </tr>
    <tr>
        <td>2.</td>
        <td>Maksud Perjalanan Dinas</td>
        <td style="padding-left: 10px;">:</td>
        <td>'.$nppd['tujuan_perjalanan'].'</td>
    </tr>
    <tr>
        <td>3.</td>
        <td>Kendaraan yang Digunakan</td>
        <td style="padding-left: 10px;">:</td>
        <td>'. $nppd['nama_kendaraan'] . '</td>
    </tr>
    <tr>
        <td>4.</td>
        <td>Lama Perjalanan</td>
        <td style="padding-left: 10px;">:</td>
        <td>'.$nppd['lama_perjalanan'].' hari</td>
    </tr>
    <tr>
        <td></td>
        <td>a. Tanggal Berangkat</td>
        <td style="padding-left: 10px;">:</td>
        <td>'. date("d-m-Y", strtotime($nppd['tanggal_pergi'])) .'</td>
    </tr>
    <tr>
        <td></td>
        <td>b. Tanggal Kembali</td>
        <td style="padding-left: 10px;">:</td>
        <td>'. date("d-m-Y", strtotime($nppd['tanggal_pulang'])) .'</td>
    </tr>
</table>
<div style="text-align: right">
    <p>
        DIKELUARKAN DI: '. $instansi['kota'] .' <br>
        TANGGAL: '. date("d-m-Y") .' <br>
        <b>
        KUASA PENGGUNA ANGGARAN <br>
        '. $instansi['nama_instansi'] .' <br>
        PEMERINTAH PROVINSI SUMATERA SELATAN
        </b>
    </p>
</div>
';
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output("nppd ''.pdf", "I", true);