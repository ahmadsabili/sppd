<?php
$id_golongan = $_GET['id_golongan'];

$query = mysqli_query($koneksi, "SELECT * FROM golongan WHERE id_golongan = '$id_golongan'");

$golongan = mysqli_fetch_assoc($query);

?>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Edit Golongan</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="controllers/golongan/update.php" method="POST">
                                <input type="hidden" name="id_golongan" value="<?= $golongan['id_golongan'] ?>">
                                <div class="form-group">
                                    <label for="nama_golongan">Nama Golongan</label>
                                    <input type="text" class="form-control" id="nama_golongan" name="nama_golongan" required value="<?= $golongan['nama_golongan'] ?>">
                                </div>
                                <div class="card-action">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="index.php?page=golongan" class="btn btn-danger">Batal</a>
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