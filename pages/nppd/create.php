<?php
$pegawai = mysqli_query($koneksi, "SELECT * FROM pegawai ORDER BY nama ASC");
$kota = mysqli_query($koneksi, "SELECT * FROM kota");
$kendaraan = mysqli_query($koneksi, "SELECT * FROM kendaraan");

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
                            <form action="controllers/nppd/store.php" method="POST">
                                <input type="hidden" name="pegawai_id" value="<?= $pegawai_id ?>">
                                <!-- <div class="form-group">
                                    <label for="pegawai">Pegawai</label>
                                    <select multiple class="form-control select2" id="pegawai" name="pegawai_id[]" required>
                                        <?php foreach ($pegawai as $p) : ?>
                                            <option value="<?= $p['id_pegawai'] ?>"><?= $p['nama'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div> -->
                                <div class="form-group">
                                    <label for="lokasi_tujuan">Lokasi Tujuan</label>
                                    <select class="form-control select2" id="lokasi_tujuan" name="kota_id">
                                        <?php foreach ($kota as $k) : ?>
                                            <option value="<?= $k['id_kota'] ?>"><?= $k['nama_kota'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tujuan_perjalanan">Tujuan Perjalanan</label>
                                    <textarea class="form-control" id="tujuan_perjalanan" rows="3" name="tujuan_perjalanan" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="kendaraan">Transportasi / Kendaraan</label>
                                    <select class="form-control select2" id="kendaraan" name="kendaraan_id">
                                        <?php foreach ($kendaraan as $k) : ?>
                                            <option value="<?= $k['id_kendaraan'] ?>"><?= $k['nama_kendaraan'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_pergi">Tanggal Pergi</label>
                                    <input type="date" class="form-control" id="tanggal_pergi" name="tanggal_pergi" required>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_pulang">Tanggal Pulang</label>
                                    <input type="date" class="form-control" id="tanggal_pulang" name="tanggal_pulang" required>
                                </div>
                                <div class="form-group">
                                    <label for="lama_perjalanan">Lama Perjalanan (hari)</label>
                                    <input type="number" class="form-control" id="lama_perjalanan" min="1" name="lama_perjalanan" required readonly>
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