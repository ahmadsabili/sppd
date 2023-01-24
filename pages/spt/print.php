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
    'default_font' => 'Arial',
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

if ($nppd['tanggal_pergi'] == $nppd['tanggal_pulang']) {
    $tanggal = date('d-m-Y', strtotime($nppd['tanggal_pergi']));
} else {
    $tanggal = date('d-m-Y', strtotime($nppd['tanggal_pergi'])) . ' s/d ' . date('d-m-Y', strtotime($nppd['tanggal_pulang']));
}

// Write some HTML code:
$html = '
<table style="border-bottom: 3px solid; margin-left: 5px">
    <tr>
        <td style="width: 20%; text-align: center;">
            <img src="../../../assets/img/logo.png" style="width: 55px;">
        </td>
        <td style="width: 70%; text-align: center;">
            <p style="font-size: 16px">PEMERINTAH PROVINSI SUMATERA SELATAN</p>
            <p style="font-size: 18px; font-weight: bold">' . $instansi['nama_instansi'] .'</p>
            <p style="font-size: 12px; font-weight: bold">' . $instansi['alamat'] . '</p>
            <p style="font-size: 12px">Telepon (0711) ' . $instansi['no_telp'] . ', No. Fax. (0711) ' . $instansi['fax'] . ' Kode Pos '. $instansi['kode_pos'] .' </p>
            <p style="font-size: 12px">Email: <u>bpkad@sumselprov.go.id</u> &nbsp; Website: <u>www.sumselprov.go.id</u></p>
        </td>
        <td style="width: 10%;"></td>
    </tr>
</table>

<p style="text-align: center; font-size: 14px; margin-top: 10px">
    <u><b>SURAT PERINTAH TUGAS</b></u> <br>
    Nomor : ' . $spt['no_spt'] . '
</p>
<table>
    <tr>
        <td width="30%">Yang Memberi Perintah</td>
        <td>:</td>
        <td>KEPALA BADAN PENGELOLA KEUANGAN DAN ASET DAERAH</td>
    </tr>
</table>
<br>
<table>
';

foreach ($pegawai as $p) {
    $html .= '<tr>
        <td>Nama / NIP</td>
        <td style="padding-left: 55px">:</td>
        <td>'.$p['nama'].' / '. $p['nip']  .'</td>
    </tr>
    <tr>
        <td>Pangkat / Jabatan</td>
        <td style="padding-left: 55px;">:</td>
        <td>'. $p['pangkat'] .' ('. $p['nama_golongan'] .') / '.$p['jabatan'].'</td>
    </tr>
    <tr>
        <td>Jabatan</td>
        <td style="padding-left: 55px;">:</td>
        <td>'.$p['jabatan'].'</td>
    </tr>';
}

$html .= '
</table>
<br>
<table>
    <tr>
        <td>Urusan</td>
        <td style="padding-left: 55px">:</td>
        <td>'. $nppd['tujuan_perjalanan'] .'</td>
    </tr>
    <tr>
        <td>Tujuan Perjalanan</td>
        <td style="padding-left: 55px">:</td>
        <td>'. $nppd['nama_kota'] .'</td>
    </tr>
    <tr>
        <td>Lama / Tanggal</td>
        <td  style="padding-left: 55px">:</td>
        <td>'. $nppd['lama_perjalanan'] .' hari / '. $tanggal .'</td>
    </tr>
    <tr>
        <td>Keterangan</td>
        <td  style="padding-left: 55px">:</td>
        <td> - </td>
    </tr>
</table>
<br>
<div style="padding-left: 65%">
    <p>
        Dikeluarkan di: '. $instansi['kota'] .' <br>
        Pada Tanggal: '. date("d-m-Y") .'<br>
        <hr style="color: black; margin-top: 0; padding-top: 0">
        a.n KEPALA<br>'. $instansi['pimpinan_tertinggi'] .' <br>
        <br><br><br><br><br><br>
        <u>'. $instansi['nama_pimpinan_tertinggi'] .'</u><br>
        '. $instansi['jabatan_pimpinan_tertinggi'] .'<br>
        NIP.'. $instansi['nip_pimpinan_tertinggi'] .'
    </p>
</div>
';
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output("nppd ''.pdf", "I", true);