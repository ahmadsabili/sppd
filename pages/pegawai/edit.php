<?php
$golongan = mysqli_query($koneksi, "SELECT * FROM golongan");

$id_pegawai = $_GET['id_pegawai'];
$query = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE id_pegawai = '$id_pegawai'");

$pegawai = mysqli_fetch_assoc($query);
?>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Edit Pegawai</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="controllers/pegawai/update.php" method="POST">
                                <input type="hidden" name="id_pegawai" value="<?= $pegawai['id_pegawai'] ?>">
                                <div class="form-group">
                                    <label for="NIP">NIP Pegawai</label>
                                    <input type="text" class="form-control" id="NIP" name="nip" required value="<?= $pegawai['nip'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Pegawai</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required value="<?= $pegawai['nama'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="pangkat">Pangkat</label>
                                    <input type="text" class="form-control" id="pangkat" name="pangkat" required value="<?= $pegawai['pangkat'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="golongan_id">Golongan</label>
                                    <select class="form-control select2" id="golongan_id" name="golongan_id">
                                        <?php foreach ($golongan as $k) : ?>
                                            <option value="<?= $k['id_golongan'] ?>" <?= $pegawai['golongan_id'] == $k['id_golongan'] ? 'selected' : '' ?>><?= $k['nama_golongan'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="jabatan">Jabatan</label>
                                    <input type="text" class="form-control" id="jabatan" name="jabatan" required value="<?= $pegawai['jabatan'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="unit_kerja">Unit Kerja</label>
                                    <input type="text" class="form-control" id="unit_kerja" name="unit_kerja" required value="<?= $pegawai['unit_kerja'] ?>">
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