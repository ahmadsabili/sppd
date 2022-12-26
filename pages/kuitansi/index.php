<?php
$kuitansi = mysqli_query($koneksi, "SELECT kuitansi.*, nppd.tujuan_perjalanan, nppd.lama_perjalanan, sppd.pegawai_id, pegawai.nama, kota.nama_kota
FROM kuitansi
JOIN sppd ON kuitansi.sppd_id = sppd.id_sppd
JOIN spt ON sppd.spt_id = spt.id_spt
JOIN nppd ON spt.nppd_id = nppd.id_nppd
JOIN kota ON nppd.kota_id = kota.id_kota
JOIN pegawai ON sppd.pegawai_id = pegawai.id_pegawai
");

$no_tabel = 1;
?>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Kuitansi</h4>
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
                                            <th>Tujuan</th>
                                            <th>Lama</th>
                                            <th>Lumpsum</th>
                                            <th>Penginapan</th>
                                            <th>Transportasi</th>
                                            <th>Total</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($kuitansi as $data) : ?>
                                            <tr>
                                                <td><?= $no_tabel++ ?></td>
                                                <td><?= $data['nama'] ?></td>
                                                <td><?= $data['tujuan_perjalanan'] ?></td>
                                                <td><?= $data['lama_perjalanan'] ?> hari</td>
                                                <td><?= $data['total_lumpsum'] ?></td>
                                                <td><?= $data['total_penginapan'] ?></td>
                                                <td><?= $data['total_transportasi'] ?></td>
                                                <td>
                                                    <?php
                                                    $total = $data['total_lumpsum'] + $data['total_penginapan'] + $data['total_transportasi'];
                                                    echo $total;
                                                    ?>
                                                </td>
                                                <td>
                                                    <a href="index.php?page=print-kuitansi&id_kuitansi=<?= $data['id_kuitansi'] ?>" class="btn btn-secondary btn-sm"><i class="fas fa-print"></i></a>
                                                    <a href="controllers/kuitansi/delete.php?id_kuitansi=<?= $data['id_kuitansi'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')"><i class="fas fa-trash"></i></a>
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