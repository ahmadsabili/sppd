<?php
$sppd = mysqli_query($koneksi, "SELECT * FROM sppd JOIN pegawai ON sppd.pegawai_id = pegawai.id_pegawai");

$no_tabel = 1;
?>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Surat Perintah Perjalanan Dinas (SPPD)</h4>
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
                                            <th>No SPPD</th>
                                            <th>Tugas</th>
                                            <th>Tujuan</th>
                                            <th>Kuitansi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($sppd as $data) : ?>
                                            <tr>
                                                <td><?= $no_tabel++ ?></td>
                                                <td><?= $data['nama'] ?></td>
                                                <td><?= $data['no_sppd'] ?></td>
                                                <td>
                                                    <?php
                                                    $spt = mysqli_query($koneksi, "SELECT nppd_id FROM spt WHERE id_spt = '$data[spt_id]'");
                                                    $spt = mysqli_fetch_assoc($spt);

                                                    $nppd = mysqli_query($koneksi, "SELECT tujuan_perjalanan, kota_id FROM nppd WHERE id_nppd = '$spt[nppd_id]'");
                                                    $nppd = mysqli_fetch_assoc($nppd);

                                                    echo $nppd['tujuan_perjalanan'];
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $kota = mysqli_query($koneksi, "SELECT nama_kota FROM kota WHERE id_kota = '$nppd[kota_id]'");
                                                    $kota = mysqli_fetch_assoc($kota);

                                                    echo $kota['nama_kota'];
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $cek_kuitansi = mysqli_query($koneksi, "SELECT * FROM kuitansi WHERE sppd_id = '$data[id_sppd]'");
                                                    
                                                    if (mysqli_num_rows($cek_kuitansi) > 0) {
                                                        echo "<a href='index.php?page=edit-kuitansi&id_sppd=$data[id_sppd]' class='btn btn-sm btn-success'><i class='fas fa-check'></i></a>";
                                                    } else {
                                                        echo "<a href='index.php?page=tambah-kuitansi&id_sppd=$data[id_sppd]' class='btn btn-sm btn-primary'><i class='fas fa-plus'></i></a>";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <a href="index.php?page=print-sppd&id_sppd=<?= $data['id_sppd'] ?>" class="btn btn-secondary btn-sm"><i class="fas fa-print"></i></a>
                                                    <a href="controllers/sppd/delete.php?id_sppd=<?= $data['id_sppd'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')"><i class="fas fa-trash"></i></a>
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