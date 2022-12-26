<?php
$kendaraan = mysqli_query($koneksi, "SELECT * FROM kendaraan");

$no_tabel = 1;
?>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Daftar Kendaraan</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="float-right">
                                <a href="index.php?page=tambah-kendaraan" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kendaraan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($kendaraan as $data) : ?>
                                            <tr>
                                                <td><?= $no_tabel++ ?></td>
                                                <td><?= $data['nama_kendaraan'] ?></td>
                                                <td>
                                                    <a href="index.php?page=edit-kendaraan&id_kendaraan=<?= $data['id_kendaraan'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                    <a href="controllers/kendaraan/delete.php?id_kendaraan=<?= $data['id_kendaraan'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')"><i class="fas fa-trash"></i></a>
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