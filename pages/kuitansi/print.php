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

$mpdf->SetTitle('Surat Perintah Perjalanan Dinas');

$now = date('YmdHis');
$no = 1;

// Fetching data from the database
$id_kuitansi = $_GET['id_kuitansi'];
$kuitansi = mysqli_query($koneksi, "SELECT * FROM kuitansi WHERE id_kuitansi = '$id_kuitansi'");
$kuitansi = mysqli_fetch_assoc($kuitansi);

$id_sppd = $kuitansi['sppd_id'];
$sppd = mysqli_query($koneksi, "SELECT * FROM sppd JOIN pegawai ON sppd.pegawai_id = pegawai.id_pegawai JOIN golongan ON pegawai.golongan_id = golongan.id_golongan WHERE id_sppd = '$id_sppd'");
$sppd = mysqli_fetch_assoc($sppd);

//spt
$id_spt = $sppd['spt_id'];
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

$id_bp = $kuitansi['biaya_perjalanan_id'];
$bp = mysqli_query($koneksi, "SELECT * FROM biaya_perjalanan WHERE id_biaya_perjalanan = '$id_bp'");
$bp = mysqli_fetch_assoc($bp);

//total biaya
$total = $kuitansi['total_lumpsum'] + $kuitansi['total_penginapan'] + $kuitansi['total_transportasi'];

// Write some HTML code:
$html = '
<div style="text-align: left; margin-left: 450px">
    <p style="font-size: 12px; margin-top: 10px">
        Lampiran SPPD No &nbsp; : <br>
        Tanggal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <br>
    </p>
</div>

<p style="text-align: center; font-size: 16px; margin-top: 5px">
    <b>RINCIAN BIAYA PERJALANAN DINAS - AKHIR<br>
    </b>
</p>

<table width="100%" border="1" cellspacing="0" cellpadding="6">
    <tr>
        <td>1.</td>
        <td>Pejabat yang memberi perintah</td>
        <td>'. $instansi['pimpinan_tertinggi'] .'</td>
    </tr>
    <tr>
        <td>2.</td>
        <td>
            a. Nama pegawai yang diperintah <br>
            b. Pangkat dan Golongan <br>
            c. Jabatan
        </td>
        <td>'
            . $sppd['nama'] . '<br>'
            . $sppd['pangkat'] . ' / Golongan ' . $sppd['nama_golongan'] . '<br>'
            . $sppd['jabatan'] .'
        </td>
    </tr>
    <tr>
        <td>3.</td>
        <td style="border: 0">Biaya Perjalanan</td>
        <td style="border: 0"></td>
    </tr>
</table>
<table width="100%" border="1" cellspacing="0" cellpadding="6">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Rincian</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>'
                . $sppd['nama'] . '<br>'
                . $sppd['pangkat'] . ' / Golongan ' . $sppd['nama_golongan'] .
            '</td>
            <td>
                Lumpsum &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; x '. $nppd['lama_perjalanan'] .' &nbsp;&nbsp;&nbsp;&nbsp; Rp '. $bp['lumpsum'] .' <br>
                Penginapan &nbsp;&nbsp; x '. $nppd['lama_perjalanan'] .' &nbsp;&nbsp;&nbsp;&nbsp; Rp '. $bp['penginapan'] .' <br>
                Transportasi &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rp '. $bp['transportasi'] .'
            </td>
            <td>
                Rp '. $kuitansi['total_lumpsum'] .' <br>
                Rp '. $kuitansi['total_penginapan'] .' <br>
                Rp '. $kuitansi['total_transportasi'] .' <br>
            </td>
            <tr>
                <td colspan="2">
                </td>
                <td>Sub Total</td>
                <td>Rp '. $total .'</td>
            </tr>
        </tr>
    </tbody>
</table>
';

$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output("nppd ''.pdf", "I", true);