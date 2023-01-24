<?php
$pegawai = mysqli_query($koneksi, "SELECT * FROM pegawai");
$kota = mysqli_query($koneksi, "SELECT * FROM kota");
$kendaraan = mysqli_query($koneksi, "SELECT * FROM kendaraan");

$id_nppd = $_GET['id_nppd'];
$query = mysqli_query($koneksi, "SELECT * FROM nppd WHERE id_nppd = '$id_nppd'");
$nppd = mysqli_fetch_assoc($query);

$pegawai_id = $_SESSION['pegawai_id'];
?>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Tambah Nota Permintaan Perjalanan Dinas (NPPD)</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="controllers/nppd/update.php" method="POST">
                                <input type="hidden" name="id_nppd" value="<?= $nppd['id_nppd']?>">
                                <input type="hidden" name="pegawai_id" value="<?= $pegawai_id ?>">
                                <!-- <div class="form-group">
                                    <label for="pegawai">Pegawai</label>
                                    <select multiple class="form-control select2" id="pegawai" name="pegawai_id[]" required>
                                        <?php foreach ($pegawai as $p) : ?>
                                            <option
                                            value="<?= $p['id_pegawai'] ?>"
                                            <?php foreach ($pegawai_id as $id) : ?>
                                                <?php if ($id == $p['id_pegawai']) : ?>
                                                    selected
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                            >
                                            <?= $p['nama'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div> -->
                                <div class="form-group">
                                    <label for="lokasi_tujuan">Lokasi Tujuan</label>
                                    <select class="form-control select2" id="lokasi_tujuan" name="kota_id">
                                        <?php foreach ($kota as $k) : ?>
                                            <option value="<?= $k['id_kota'] ?>" <?= $nppd['kota_id'] == $k['id_kota'] ? 'selected' : '' ?>><?= $k['nama_kota'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tujuan_perjalanan">Tujuan Perjalanan</label>
                                    <textarea class="form-control" id="tujuan_perjalanan" rows="3" name="tujuan_perjalanan" required><?= $nppd['tujuan_perjalanan']?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="kendaraan">Transportasi / Kendaraan</label>
                                    <select class="form-control select2" id="kendaraan" name="kendaraan_id">
                                        <?php foreach ($kendaraan as $k) : ?>
                                            <option value="<?= $k['id_kendaraan'] ?>" <?= $nppd['kendaraan_id'] == $k['id_kendaraan'] ? 'selected' : '' ?>><?= $k['nama_kendaraan'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_pergi">Tanggal Pergi</label>
                                    <input type="date" class="form-control" id="tanggal_pergi" name="tanggal_pergi" required value="<?= $nppd['tanggal_pergi']?>">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_pulang">Tanggal Pulang</label>
                                    <input type="date" class="form-control" id="tanggal_pulang" name="tanggal_pulang" required value="<?= $nppd['tanggal_pulang']?>">
                                </div>
                                <div class="form-group">
                                    <label for="lama_perjalanan">Lama Perjalanan (hari)</label>
                                    <input type="number" class="form-control" id="lama_perjalanan" min="1" name="lama_perjalanan" required value="<?= $nppd['lama_perjalanan']?>">
                                </div>
                                <div class="card-action">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="index.php?page=nppd" class="btn btn-danger">Batal</a>
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