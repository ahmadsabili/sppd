<?php
$bp = mysqli_query($koneksi, "SELECT * FROM biaya_perjalanan bp JOIN kota k ON bp.kota_id = k.id_kota JOIN golongan g ON bp.golongan_id = g.id_golongan ORDER BY bp.golongan_id");

$no_tabel = 1;
?>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Biaya Perjalanan</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="float-right">
                                <a href="index.php?page=tambah-biaya-perjalanan" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tujuan</th>
                                            <th>Golongan</th>
                                            <th>Lumpsum</th>
                                            <th>Penginapan</th>
                                            <th>Transportasi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($bp as $data) : ?>
                                            <tr>
                                                <td><?= $no_tabel++ ?></td>
                                                <td>
                                                    <?= $data['nama_kota'] ?>
                                                </td>
                                                <td><?= $data['nama_golongan'] ?></td>
                                                <td><?= $data['lumpsum'] ?></td>
                                                <td><?= $data['penginapan'] ?></td>
                                                <td><?= $data['transportasi'] ?></td>
                                                <td>
                                                    <a href="index.php?page=print-biaya-perjalanan&id_biaya_perjalanan=<?= $data['id_biaya_perjalanan'] ?>" class="btn btn-primary btn-sm"><i class="fas fa-print"></i></a>
                                                    <a href="index.php?page=edit-biaya-perjalanan&id_biaya_perjalanan=<?= $data['id_biaya_perjalanan'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                    <a href="controllers/biaya-perjalanan/delete.php?id_biaya_perjalanan=<?= $data['id_biaya_perjalanan'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')"><i class="fas fa-trash"></i></a>
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