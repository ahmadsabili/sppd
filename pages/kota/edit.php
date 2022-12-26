<?php
$id_kota = $_GET['id_kota'];

$query = mysqli_query($koneksi, "SELECT * FROM kota WHERE id_kota = '$id_kota'");

$kota = mysqli_fetch_assoc($query);

?>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Edit kota</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="controllers/kota/update.php" method="POST">
                                <input type="hidden" name="id_kota" value="<?= $kota['id_kota'] ?>">
                                <div class="form-group">
                                    <label for="nama_kota">Nama Kota</label>
                                    <input type="text" class="form-control" id="nama_kota" name="nama_kota" required value="<?= $kota['nama_kota'] ?>">
                                </div>
                                <div class="card-action">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="index.php?page=kota" class="btn btn-danger">Batal</a>
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