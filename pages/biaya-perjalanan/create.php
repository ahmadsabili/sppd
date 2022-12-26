<?php
$kota = mysqli_query($koneksi, "SELECT * FROM kota");
$golongan = mysqli_query($koneksi, "SELECT * FROM golongan");
?>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Tambah Biaya Perjalanan</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="controllers/biaya-perjalanan/store.php" method="POST">
                                <div class="form-group">
                                    <label for="kota_id">Pilih Kota</label>
                                    <select class="form-control select2" id="kota_id" name="kota_id">
                                        <?php foreach ($kota as $k) : ?>
                                            <option value="<?= $k['id_kota'] ?>"><?= $k['nama_kota'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="golongan_id">Pilih Golongan</label>
                                    <select class="form-control select2" id="golongan_id" name="golongan_id">
                                        <?php foreach ($golongan as $k) : ?>
                                            <option value="<?= $k['id_golongan'] ?>"><?= $k['nama_golongan'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="lumpsum">Lumpsum</label>
                                    <input type="number" class="form-control" id="lumpsum" min="1" name="lumpsum" required>
                                </div>
                                <div class="form-group">
                                    <label for="penginapan">Penginapan</label>
                                    <input type="number" class="form-control" id="penginapan" min="1" name="penginapan" required>
                                </div>
                                <div class="form-group">
                                    <label for="transportasi">Transportasi</label>
                                    <input type="number" class="form-control" id="transportasi" min="1" name="transportasi" required>
                                </div>
                                <div class="card-action">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="index.php?page=biaya-perjalanan" class="btn btn-danger">Batal</a>
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