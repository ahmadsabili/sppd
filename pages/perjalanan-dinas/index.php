<?php
$id_pegawai = $_SESSION['pegawai_id'];

if ($_SESSION['role'] == 'admin') {
    $perjalanan_dinas = mysqli_query($koneksi, "SELECT * FROM perjalanan_dinas JOIN pegawai ON perjalanan_dinas.pegawai_id = pegawai.id_pegawai JOIN spt ON perjalanan_dinas.spt_id = spt.id_spt");
} else {
    $perjalanan_dinas = mysqli_query($koneksi, "SELECT * FROM perjalanan_dinas JOIN pegawai ON perjalanan_dinas.pegawai_id = pegawai.id_pegawai JOIN spt ON perjalanan_dinas.spt_id = spt.id_spt WHERE pegawai_id = '$id_pegawai'");
}

$no_tabel = 1;
?>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Perjalanan Dinas</h4>
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
                                            <th>No SPT</th>
                                            <th>Hasil</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($perjalanan_dinas as $data) : ?>
                                            <tr>
                                                <td><?= $no_tabel++ ?></td>
                                                <td><?= $data['nama'] ?></td>
                                                <td><?= $data['no_spt'] ?></td>
                                                <td><?= $data['hasil'] ?></td>
                                                <td><?= $data['tanggal'] ?></td>
                                                <td>
                                                    <a href="pages/perjalanan-dinas/print.php?id_perjalanan_dinas=<?= $data['id_perjalanan_dinas'] ?>" class="btn btn-secondary btn-sm"><i class="fas fa-print"></i></a>
                                                    <a href="controllers/perjalanan-dinas/delete.php?id_perjalanan_dinas=<?= $data['id_perjalanan_dinas'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data?')"><i class="fas fa-trash"></i></a>
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