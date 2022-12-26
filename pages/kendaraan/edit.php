<?php
$id_kendaraan = $_GET['id_kendaraan'];

$query = mysqli_query($koneksi, "SELECT * FROM kendaraan WHERE id_kendaraan='$id_kendaraan'");
$kendaraan = mysqli_fetch_array($query);
?>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Edit Kendaraan</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="controllers/kendaraan/update.php" method="POST">
                                <input type="hidden" name="id_kendaraan" value="<?= $kendaraan['id_kendaraan'] ?>">
                                <div class="form-group">
                                    <label for="nama_kendaraan">Nama Kendaraan</label>
                                    <input type="text" class="form-control" id="nama_kendaraan" name="nama_kendaraan" required value="<?= $kendaraan['nama_kendaraan'] ?>">
                                </div>
                                <div class="card-action">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="index.php?page=kendaraan" class="btn btn-danger">Batal</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>