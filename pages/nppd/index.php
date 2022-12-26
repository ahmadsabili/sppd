<?php
$nppd = mysqli_query($koneksi, "SELECT * FROM nppd JOIN kota ON nppd.kota_id = kota.id_kota JOIN kendaraan ON nppd.kendaraan_id = kendaraan.id_kendaraan");

$no_tabel = 1;
?>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Nota Permintaan Perjalanan Dinas (NPPD)</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="float-right">
                                <a href="index.php?page=tambah-nppd" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Penugasan Kepada</th>
                                            <th>Golongan</th>
                                            <th>Tujuan</th>
                                            <th>Transportasi</th>
                                            <th>Tanggal Pergi</th>
                                            <th>Tanggal Pulang</th>
                                            <th>Lama</th>
                                            <th>SPT</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($nppd as $data) : ?>
                                            <tr>
                                                <td><?= $no_tabel++ ?></td>
                                                <td>
                                                    <?php
                                                    $pegawai_id = $data['pegawai_id'];
                                                    $pegawai = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE id_pegawai IN ($pegawai_id)");
                                                    $no = 1;
                                                    foreach ($pegawai as $data_pegawai) {
                                                        echo $no++ . ') ' . $data_pegawai['nama'] . "<br>";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $pegawai_id = $data['pegawai_id'];
                                                    $pegawai = mysqli_query($koneksi, "SELECT * FROM pegawai JOIN golongan ON pegawai.golongan_id = golongan.id_golongan WHERE id_pegawai IN ($pegawai_id)");
                                                    $no = 1;
                                                    foreach ($pegawai as $data_pegawai) {
                                                        echo 'Golongan ' . $data_pegawai['nama_golongan'] . "<br>";
                                                    }
                                                    ?>
                                                <td><?= $data['nama_kota'] ?></td>
                                                <td><?= $data['nama_kendaraan'] ?></td>
                                                <td><?= date("d-m-Y", strtotime($data['tanggal_pergi'])) ?></td>
                                                <td><?= date("d-m-Y", strtotime($data['tanggal_pulang'])) ?></td>
                                                <td><?= $data['lama_perjalanan'] ?> hari</td>
                                                <td>
                                                    <?php
                                                    $cek_spt = mysqli_query($koneksi, "SELECT * FROM spt WHERE nppd_id = '$data[id_nppd]'");
                                                    if (mysqli_num_rows($cek_spt) > 0) {
                                                        $spt = mysqli_fetch_assoc($cek_spt);
                                                        if ($spt['no_spt'] == '') {
                                                            echo '<a href="index.php?page=edit-spt&id_spt=' . $spt['id_spt'] . '" class="btn btn-warning btn-sm" title="Edit SPT"><i class="fas fa-clock"></i></a>';
                                                        } else {
                                                            echo '<a href="index.php?page=edit-spt&id_spt=' . $spt['id_spt'] . '" class="btn btn-success btn-sm"  title="Lihat SPT"><i class="fas fa-check"></i></a>';
                                                        }
                                                    } else {
                                                        echo '<a href="index.php?page=tambah-spt&id_nppd=' . $data['id_nppd'] . '" class="btn btn-primary btn-sm" title="Buat SPT"><i class="fas fa-plus"></i></a>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <a href="index.php?page=print-nppd&id_nppd=<?= $data['id_nppd'] ?>" class="btn btn-secondary btn-sm"><i class="fas fa-print"></i></a>
                                                    <a href="index.php?page=edit-nppd&id_nppd=<?= $data['id_nppd'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                    <a href="controllers/nppd/delete.php?id_nppd=<?= $data['id_nppd'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')"><i class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>