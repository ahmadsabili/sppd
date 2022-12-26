<?php
$golongan = mysqli_query($koneksi, "SELECT * FROM golongan");
?>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Tambah Pegawai</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="controllers/pegawai/store.php" method="POST">
                                <div class="form-group">
                                    <label for="NIP">NIP Pegawai</label>
                                    <input type="text" class="form-control" id="NIP" name="nip" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Pegawai</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="pangkat">Pangkat</label>
                                    <input type="text" class="form-control" id="pangkat" name="pangkat" required>
                                </div>
                                <div class="form-group">
                                    <label for="golongan_id">Golongan</label>
                                    <select class="form-control select2" id="golongan_id" name="golongan_id">
                                        <?php foreach ($golongan as $k) : ?>
                                            <option value="<?= $k['id_golongan'] ?>"><?= $k['nama_golongan'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="jabatan">Jabatan</label>
                                    <input type="text" class="form-control" id="jabatan" name="jabatan" required>
                                </div>
                                <div class="form-group">
                                    <label for="unit_kerja">Unit Kerja</label>
                                    <input type="text" class="form-control" id="unit_kerja" name="unit_kerja" required>
                                </div>
                                <div class="card-action">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="index.php?page=pegawai" class="btn btn-danger">Batal</a>
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