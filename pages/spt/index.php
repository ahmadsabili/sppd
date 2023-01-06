<?php
$no_tabel = 1;
$pegawai_id = $_SESSION['pegawai_id'];
?>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Surat Perintah Tugas (SPT)</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <?php if ($_SESSION['role'] == 'user') {
                                    $spt = mysqli_query($koneksi, "SELECT * FROM spt JOIN nppd ON spt.nppd_id = nppd.id_nppd WHERE pegawai_id = '$pegawai_id'");
                                ?>
                                <table id="basic-datatables" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No SPT</th>
                                            <th>Tugas</th>
                                            <th>Tanggal Pergi</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Lama Perjalanan</th>
                                            <th>Laporan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($spt as $data) : ?>
                                            <tr>
                                                <td><?= $no_tabel++ ?></td>
                                                <td>
                                                    <?php
                                                    $cek_spt = mysqli_query($koneksi, "SELECT * FROM spt WHERE nppd_id = '$data[id_nppd]'");
                                                    if (mysqli_num_rows($cek_spt) > 0) {
                                                        $spt = mysqli_fetch_assoc($cek_spt);
                                                        if ($spt['no_spt'] == null) {
                                                            echo '-';
                                                        } else {
                                                            echo $spt['no_spt'];
                                                        }
                                                    } else {
                                                        echo '-';
                                                    }
                                                    ?>
                                                </td>
                                                <td><?= $data['tujuan_perjalanan'] ?></td>
                                                <td><?= $data['tanggal_pergi'] ?></td>
                                                <td><?= $data['tanggal_pergi'] ?></td>
                                                <td><?= $data['lama_perjalanan'] ?></td>
                                                <td>
                                                    <?php
                                                    $cek_perjalanan_dinas = mysqli_query($koneksi, "SELECT * FROM perjalanan_dinas WHERE spt_id = '$data[id_spt]'");
                                                    if (mysqli_num_rows($cek_perjalanan_dinas) > 0) {
                                                        $perjalanan_dinas = mysqli_fetch_assoc($cek_perjalanan_dinas);
                                                        echo '<a href="index.php?page=perjalanan-dinas&id_perjalanan_dinas=' . $perjalanan_dinas['id_perjalanan_dinas'] . '" class="btn btn-success btn-sm"><i class="fas fa-check"></i></a>';
                                                    } else {
                                                        echo '<a href="index.php?page=tambah-perjalanan-dinas&id_spt=' . $data['id_spt'] . '" class="btn btn-secondary btn-sm"><i class="fas fa-plus"></i></a>';
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <?php } ?>
                                
                                <?php if ($_SESSION['role'] == 'admin') {
                                    $spt = mysqli_query($koneksi, "SELECT * FROM spt JOIN nppd ON spt.nppd_id = nppd.id_nppd");
                                ?>
                                <table id="basic-datatables" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Golongan</th>
                                            <th>No SPT</th>
                                            <th>Tugas</th>
                                            <th>SPPD</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($spt as $data) : ?>
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
                                                </td>
                                                <td>
                                                    <?php
                                                    $cek_spt = mysqli_query($koneksi, "SELECT * FROM spt WHERE nppd_id = '$data[id_nppd]'");
                                                    if (mysqli_num_rows($cek_spt) > 0) {
                                                        $spt = mysqli_fetch_assoc($cek_spt);
                                                        if ($spt['no_spt'] == null) {
                                                            echo '-';
                                                        } else {
                                                            echo $spt['no_spt'];
                                                        }
                                                    } else {
                                                        echo '-';
                                                    }
                                                    ?>
                                                </td>
                                                <td><?= $data['tujuan_perjalanan'] ?></td>
                                                <td>
                                                    <?php
                                                    $cek_sppd = mysqli_query($koneksi, "SELECT * FROM sppd WHERE spt_id = '$data[id_spt]'");
                                                    if (mysqli_num_rows($cek_sppd) > 0) {
                                                        $sppd = mysqli_fetch_assoc($cek_sppd);
                                                        echo '<a href="index.php?page=sppd&id_sppd=' . $sppd['id_sppd'] . '" class="btn btn-success btn-sm"><i class="fas fa-check"></i></a>';
                                                    } else {
                                                        echo '<a href="index.php?page=tambah-sppd&id_spt=' . $data['id_spt'] . '" class="btn btn-secondary btn-sm"><i class="fas fa-plus"></i></a>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <a href="index.php?page=print-spt&id_spt=<?= $data['id_spt'] ?>" class="btn btn-secondary btn-sm"><i class="fas fa-print"></i></a>
                                                    <a href="index.php?page=edit-spt&id_spt=<?= $data['id_spt'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                    <a href="index.php?page=hapus-spt&id_spt=<?= $data['id_spt'] ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>