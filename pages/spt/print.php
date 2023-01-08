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

$mpdf->SetTitle('Surat Perintah Tugas');

$now = date('YmdHis');
$no = 1;

// Fetching data from the database
$id_spt = $_GET['id_spt'];
$spt = mysqli_query($koneksi, "SELECT * FROM spt WHERE id_spt = '$id_spt'");
$spt = mysqli_fetch_assoc($spt);

$id_nppd = $spt['nppd_id'];

$query = mysqli_query($koneksi, "SELECT * FROM nppd JOIN kota ON nppd.kota_id = kota.id_kota JOIN kendaraan ON nppd.kendaraan_id = kendaraan.id_kendaraan WHERE id_nppd = '$id_nppd'");
$nppd = mysqli_fetch_assoc($query);

$pegawai_id = $nppd['pegawai_id'];
$pegawai = mysqli_query($koneksi, "SELECT * FROM pegawai JOIN golongan ON pegawai.golongan_id = golongan.id_golongan WHERE id_pegawai IN ($pegawai_id)");
$pegawai = mysqli_fetch_all($pegawai, MYSQLI_ASSOC);

$instansi = mysqli_query($koneksi, "SELECT * FROM profil_instansi");
$instansi = mysqli_fetch_assoc($instansi);


// Write some HTML code:
$html = '
<table style="border-bottom: 3px solid; margin-left: 5px">
    <tr>
        <td style="width: 20%; text-align: center;">
            <img src="../../../assets/img/logo.png" style="width: 55px;">
        </td>
        <td style="width: 55%; text-align: center;">
            <p style="font-size: 14px">PEMERINTAH PROVINSI SUMATERA SELATAN</p>
            <p style="font-size: 16px; font-weight: bold">' . $instansi['nama_instansi'] .'</p>
            <p style="font-size: 12px">' . $instansi['alamat'] . '</p>
            <p style="font-size: 12px">Telp. ' . $instansi['no_telp'] . ' Fax. ' . $instansi['fax'] . ' Kode Pos '. $instansi['kode_pos'] .' </p>
        </td>
        <td style="width: 10%;"></td>
    </tr>
</table>

<p style="text-align: center; font-size: 14px; margin-top: 10px">
    <u>SURAT PERINTAH TUGAS</u> <br>
    Nomor : ' . $spt['no_spt'] . '
</p>
<table>
    <tr>
        <td width="25%">Menimbang</td>
        <td>:</td>
        <td>Bahwa untuk kelancaran dalam '. $nppd['tujuan_perjalanan'] .';</td>
    </tr>
    <tr>
        <td>Dasar</td>
        <td>:</td>
        <td>'. $spt['dasar_hukum'] .'</td>
    </tr>
</table>
<p style="text-align: center; font-weight: bold">MEMERINTAHKAN</p>
<table>
';

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

$html .= '
</table>
<br>
<table>
    <tr>
        <td>Untuk</td>
        <td style="padding-left: 50px">:</td>
        <td>'. $nppd['tujuan_perjalanan'] .'</td>
    </tr>
</table>
<br>
<div style="text-align: right">
    <p>
        DIKELUARKAN DI: '. $instansi['kota'] .' <br>
        PADA TANGGAL: '. date("d-m-Y") .' <br>
        <b>
        a.n '. $instansi['pimpinan_tertinggi'] .' <br>
        '. $instansi['nama_instansi'] .'
        </b>
        <br><br><br><br><br><br>
        <u><b>'. $instansi['nama_pimpinan_tertinggi'] .'</b></u><br>
        <b>'. $instansi['jabatan_pimpinan_tertinggi'] .'</b> <br>
        <b> NIP.'. $instansi['nip_pimpinan_tertinggi'] .'</b>
    </p>
</div>
';
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output("nppd ''.pdf", "I", true);