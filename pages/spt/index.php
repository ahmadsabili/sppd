<?php
$spt = mysqli_query($koneksi, "SELECT * FROM spt JOIN nppd ON spt.nppd_id = nppd.id_nppd");

$no_tabel = 1;
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
                                                            echo 'SPT belum ditentukan';
                                                        } else {
                                                            echo $spt['no_spt'];
                                                        }
                                                    } else {
                                                        echo 'SPT belum ditentukan';
                                                    }
                                                    ?>
                                                </td>
                                                <td><?= $data['tujuan_perjalanan'] ?></td>
                                                <td>
                                                    <?php
                                                    $spt = mysqli_query($koneksi, "SELECT * FROM spt WHERE nppd_id = '$data[id_nppd]'");

                                                    if (mysqli_num_rows($spt) > 0) {
                                                        $spt = mysqli_fetch_assoc($spt);
                                                        $cek_sppd = mysqli_query($koneksi, "SELECT * FROM sppd WHERE spt_id = '$spt[id_spt]'");
                                                        if (mysqli_num_rows($cek_sppd) > 0) {
                                                            $sppd = mysqli_fetch_assoc($cek_sppd);
                                                            echo '<a href="index.php?page=edit-sppd&id_sppd=' . $sppd['id_sppd'] . '" class="btn btn-success btn-sm"><i class="fas fa-check"></i></a>';
                                                        } else {
                                                            echo '<a href="index.php?page=tambah-sppd&id_spt=' . $spt['id_spt'] . '" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i></a>';
                                                        }
                                                    } else {
                                                        echo 'Tentukan SPT terlebih dahulu';
                                                    }

                                                    
                                                    
                                                    ?>
                                                </td>
                                                <td>
                                                    <a href="index.php?page=print-spt&id_spt=<?= $data['id_spt'] ?>" class="btn btn-secondary btn-sm"><i class="fas fa-print"></i></a>
                                                    <a href="index.php?page=edit-spt&id_spt=<?= $data['id_spt'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                    <a href="controllers/spt/delete.php?id_spt=<?= $data['id_spt'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')"><i class="fas fa-trash"></i></a>
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