<?php
// Require composer autoload
require_once '../../vendor/autoload.php';

// Require config
require_once '../../config/koneksi.php';
require_once '../../config/timezone.php';
setlocale(LC_ALL, 'id_ID.ISO-8859-1');

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

$date = new DateTime();
$tanggal = $date->format('d');
$month = $date->format('F');
$year = $date->format('Y');
$formattedMonth = $months[$month];
$todayMonth = $months[$month];

$today = date('l');
$today = $daysOfWeek[$today];

// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'format' => 'A4',
    'default_font' => 'times',
    'default_font_size' => 11,
    'margin_left' => 15,
]);

$mpdf->SetTitle('Laporan Perjalanan Dinas');

$now = date('YmdHis');
$no = 1;

// Fetching data from the database
$id_perjalanan_dinas = $_GET['id_perjalanan_dinas'];
$pd = mysqli_query($koneksi, "SELECT * FROM perjalanan_dinas JOIN spt ON perjalanan_dinas.spt_id = spt.id_spt JOIN pegawai ON perjalanan_dinas.pegawai_id = pegawai.id_pegawai JOIN golongan ON pegawai.golongan_id = golongan.id_golongan JOIN nppd ON spt.nppd_id = nppd.id_nppd JOIN kota ON nppd.kota_id = kota.id_kota WHERE id_perjalanan_dinas = '$id_perjalanan_dinas'");
$pd = mysqli_fetch_assoc($pd);

//spt
$id_spt = $pd['spt_id'];
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


$tanggal_pergi = new DateTime($pd['tanggal_pergi']);
$tanggal_tanggal_pergi = $tanggal_pergi->format('d');
$tahun_tanggal_pergi = $tanggal_pergi->format('Y');
$bulan_tanggal_pergi = $tanggal_pergi->format('F');
$formatted_bulan_tanggal_pergi = $months[$bulan_tanggal_pergi];

$tanggal_pulang = new DateTime($pd['tanggal_pulang']);
$tanggal_tanggal_pulang = $tanggal_pulang->format('d');
$tahun_tanggal_pulang = $tanggal_pulang->format('Y');
$bulan_tanggal_pulang = $tanggal_pulang->format('F');
$formatted_bulan_tanggal_pulang = $months[$bulan_tanggal_pulang];

// Write some HTML code:
$html = '
<p style="text-align: center; font-size: 16px; margin-top: 5px">
    <b><u>LAPORAN PERJALANAN DINAS</u></b><br>
</p>
<p>
    Pada hari ini '. $today . ', '.$tanggal .' '. $formattedMonth . ' '. $year .' saya yang bertanda tangan dibawah ini
</p>
<table>
    <tr>
        <td>Nama / NIP</td>
        <td>:</td>
        <td>'. $pd['nama'] .' / '. $pd['nip'] .'</td>
    </tr>
    <tr>
        <td>Pangkat / Golongan</td>
        <td>:</td>
        <td>'. $pd['pangkat'] .' / Golongan '. $pd['nama_golongan'] .'</td>
    </tr>
    <tr>
        <td>Jabatan</td>
        <td>:</td>
        <td>'. $pd['jabatan'] .'</td>
    </tr>
    <tr>
        <td>Unit Kerja</td>
        <td>:</td>
        <td>'. $pd['unit_kerja'] .'</td>
    </tr>
</table>
';

$formatter = new IntlDateFormatter('id_ID', IntlDateFormatter::LONG, IntlDateFormatter::NONE);

$tanggal_pergi = DateTime::createFromFormat('Y-m-d', $pd['tanggal_pergi']);
$tanggal_pulang = DateTime::createFromFormat('Y-m-d', $pd['tanggal_pulang']);

$html .= '
<p>
    Telah melaksanakan perjalanan dinas dalam rangka '. $pd['tujuan_perjalanan'] .', berdasarkan Surat Perintah Tugas nomor: '. $pd['no_spt'] .', dari tanggal '. $tanggal_tanggal_pergi .' '. $formatted_bulan_tanggal_pergi .' '. $tahun_tanggal_pergi .' sampai tanggal '. $tanggal_tanggal_pulang.' '. $formatted_bulan_tanggal_pulang.' '. $tahun_tanggal_pulang.' di '. $pd['nama_kota'] .'.
</p>
<p>
    Adapun hasil perjalanan dinas tersebut adalah sebagai berikut: '. $pd['hasil'] .'.
</p>
<p>
    Demikianlah laporan hasil perjalanan dinas ini dibuat untuk dipergunakan seperlunya.
</p>
';

$html .= '
<div style="text-align: right">
    <p>
        Palembang, '.$tanggal .' '. $formattedMonth . ' '. $year .' <br>
        Yang membuat laporan, <br>
        <br><br><br><br><br>
        <u><b>'. $pd['nama'] .'</b></u><br>
        NIP.'. $pd['nip'] .'
    </p>
</div>
';
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output("nppd ''.pdf", "I", true);