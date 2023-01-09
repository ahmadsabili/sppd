<?php
// Require composer autoload
require_once '../../vendor/autoload.php';

// Require config
require_once '../../config/koneksi.php';
require_once '../../config/timezone.php';
setlocale(LC_ALL, 'id_ID.ISO-8859-1');

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

$daysOfWeek = array(
    'Sunday' => 'Minggu',
    'Monday' => 'Senin',
    'Tuesday' => 'Selasa',
    'Wednesday' => 'Rabu',
    'Thursday' => 'Kamis',
    'Friday' => 'Jumat',
    'Saturday' => 'Sabtu'
  );
  
  $months = array(
    'January' => 'Januari',
    'February' => 'Februari',
    'March' => 'Maret',
    'April' => 'April',
    'May' => 'Mei',
    'June' => 'Juni',
    'July' => 'Juli',
    'August' => 'Agustus',
    'September' => 'September',
    'October' => 'Oktober',
    'November' => 'November',
    'December' => 'Desember'
  );

// Fetching data from the database
$id_sppd = $_GET['id_sppd'];
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

$tanggal_pergi = new DateTime($nppd['tanggal_pergi']);
$tanggal_tanggal_pergi = $tanggal_pergi->format('d');
$tahun_tanggal_pergi = $tanggal_pergi->format('Y');
$bulan_tanggal_pergi = $tanggal_pergi->format('F');
$formatted_bulan_tanggal_pergi = $months[$bulan_tanggal_pergi];

$tanggal_pulang = new DateTime($nppd['tanggal_pulang']);
$tanggal_tanggal_pulang = $tanggal_pulang->format('d');
$tahun_tanggal_pulang = $tanggal_pulang->format('Y');
$bulan_tanggal_pulang = $tanggal_pulang->format('F');
$formatted_bulan_tanggal_pulang = $months[$bulan_tanggal_pulang];

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

<div style="text-align: left; margin-left: 450px">
    <p style="font-size: 12px; margin-top: 10px">
        Lembar ke &nbsp; : <br>
        Kode No &nbsp;&nbsp;&nbsp;&nbsp; : <br>
        Nomor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
    </p>
</div>

<p style="text-align: center; font-size: 16px; margin-top: 5px">
    <b><u>SURAT PERINTAH PERJALANAN DINAS</u><br>
    (SPPD)
    </b>
</p>

<table width="100%" border="1" cellspacing="0" cellpadding="6">
    <tr>
        <td>1.</td>
        <td>Pejabat yang memberi perintah</td>
        <td>'. $sppd['pejabat_pemberi_perintah'] .'</td>
    </tr>
    <tr>
        <td>2.</td>
        <td>Nama / NIP pegawai yang diperintah</td>
        <td>'. $sppd['nama'] .' / '. $sppd['nip'] .'</td>
    </tr>
    <tr>
        <td>3.</td>
        <td>
            a. Pangkat dan Golongan menurut PP No.11 tahun 2011 <br>
            b. Jabatan <br>
            c. Tingkat menurut peraturan perjalanan
        </td>
        <td>
            '. $sppd['pangkat'] .' / Golongan '. $sppd['nama_golongan'] .' <br>
            '. $sppd['jabatan'] .' <br>
            &nbsp;
        </td>
    </tr>
    <tr>
        <td>4.</td>
        <td>Maksud Perjalanan Dinas</td>
        <td>'. $nppd['tujuan_perjalanan'] . '</td>
    </tr>
    <tr>
        <td>5.</td>
        <td>Alat Angkutan yang Dipergunakan</td>
        <td>'. $nppd['nama_kendaraan'] . '</td>
    </tr>
    <tr>
        <td>6.</td>
        <td>
            a. Tempat Berangkat <br>
            b. Tempat Tujuan
        </td>
        <td> &nbsp; <br>'. $nppd['nama_kota'] . '</td>
    </tr>
    <tr>
        <td>7.</td>
        <td>
            a. Lama Perjalanan Dinas <br>
            b. Tanggal Berangkat <br>
            c. Tanggal Kembali
        </td>
        <td>
            '. $nppd['lama_perjalanan'] .' Hari <br>
            '. $tanggal_tanggal_pergi .' '. $formatted_bulan_tanggal_pergi .' '. $tahun_tanggal_pergi .' <br>
            '. $tanggal_tanggal_pulang .' '. $formatted_bulan_tanggal_pulang .' '. $tahun_tanggal_pulang .'
        </td>
    </tr>
    <tr>
        <td>8.</td>
        <td>
            Pengikut <br>
            a. <br>
            b. <br>
            c.
        </td>
        <td>
            &nbsp;
        </td>
    </tr>
    <tr>
        <td>9.</td>
        <td>
            Pembina Anggaran <br>
            a. Instansi <br>
            b. Mata Anggaran
        </td>
        <td>
            &nbsp; <br>
            '. $sppd['instansi'] .' <br>
            '. $sppd['mata_anggaran'] .'
        </td>
    </tr>
</table>
';

$html .= '
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