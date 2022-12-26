<?php
$pegawai = mysqli_query($koneksi, "SELECT * FROM pegawai JOIN golongan ON pegawai.golongan_id = golongan.id_golongan");

$no_tabel = 1;
?>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Daftar Pegawai</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="float-right">
                                <a href="index.php?page=tambah-pegawai" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>Pangkat</th>
                                            <th>Golongan</th>
                                            <th>Jabatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pegawai as $data) : ?>
                                            <tr>
                                                <td><?= $no_tabel++ ?></td>
                                                <td><?= $data['nip'] ?></td>
                                                <td><?= $data['nama'] ?></td>
                                                <td><?= $data['pangkat'] ?></td>
                                                <td>Golongan <?= $data['nama_golongan'] ?></td>
                                                <td><?= $data['jabatan'] ?></td>
                                                <td>
                                                    <a href="index.php?page=edit-pegawai&id_pegawai=<?= $data['id_pegawai'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                    <a href="controllers/pegawai/delete.php?id_pegawai=<?= $data['id_pegawai'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')"><i class="fas fa-trash"></i></a>
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