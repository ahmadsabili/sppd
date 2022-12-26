<?php
$id_sppd = $_GET['id_sppd'];
$sppd = mysqli_query($koneksi, "SELECT * FROM sppd WHERE id_sppd = '$id_sppd'");
$sppd = mysqli_fetch_assoc($sppd);

$id_spt = $sppd['spt_id'];
$query = mysqli_query($koneksi, "SELECT nppd_id FROM spt WHERE id_spt = '$id_spt'");

$spt = mysqli_fetch_assoc($query);

// get id nppd
$id_nppd = $spt['nppd_id'];
$query_nppd = mysqli_query($koneksi, "SELECT * FROM nppd JOIN kota ON nppd.kota_id = kota.id_kota JOIN kendaraan ON nppd.kendaraan_id = kendaraan.id_kendaraan WHERE id_nppd = '$id_nppd'");
$nppd = mysqli_fetch_assoc($query_nppd);

// get pegawai
$pegawai = mysqli_query($koneksi, "SELECT * FROM pegawai");

// get pegawai id
$pegawai_id = explode(',', $nppd['pegawai_id']);
?>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Edit Surat Perintah Perjalanan Dinas (SPPD)</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="controllers/sppd/update.php" method="POST">
                                <input type="hidden" name="spt_id" value="<?= $id_spt?>">
                                <div class="form-group">
                                    <label for="pegawai">Pegawai</label>
                                    <select multiple class="form-control select2" id="pegawai" name="pegawai_id[]" readonly>
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
                                </div>
                                <div class="form-group">
                                    <label for="tujuan_perjalanan">Tujuan Perjalanan</label>
                                    <textarea class="form-control" id="tujuan_perjalanan" rows="3" name="tujuan_perjalanan" required readonly><?= $nppd['tujuan_perjalanan']?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="no_sppd">No SPPD</label>
                                    <input type="text" class="form-control" id="no_sppd" name="no_sppd" required value="<?= $sppd['no_sppd'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="pejabat_pemberi_perintah">Pejabat yang Memberi Perintah</label>
                                    <input type="text" class="form-control" id="pejabat_pemberi_perintah" name="pejabat_pemberi_perintah" required value="<?= $sppd['pejabat_pemberi_perintah'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="kota_id">Tujuan</label>
                                    <input type="text" class="form-control" id="kota_id" name="kota_id" required value="<?= $nppd['nama_kota'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="tujuan_perjalanan">Maksud Perjalanan Dinas</label>
                                    <input type="text" class="form-control" id="tujuan_perjalanan" name="tujuan_perjalanan" required value="<?= $nppd['tujuan_perjalanan'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="kendaraan_id">Transportasi / Kendaraan</label>
                                    <input type="text" class="form-control" id="kendaraan_id" name="kendaraan_id" required value="<?= $nppd['nama_kendaraan'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="lama_perjalanan">Lama Perjalanan</label>
                                    <input type="text" class="form-control" id="lama_perjalanan" name="lama_perjalanan" required value="<?= $nppd['lama_perjalanan'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_pergi">Tanggal Pergi</label>
                                    <input type="date" class="form-control" id="tanggal_pergi" name="tanggal_pergi" required value="<?= $nppd['tanggal_pergi'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_pulang">Tanggal Pulang</label>
                                    <input type="date" class="form-control" id="tanggal_pulang" name="tanggal_pulang" required value="<?= $nppd['tanggal_pulang'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="instansi">Instansi</label>
                                    <input type="text" class="form-control" id="instansi" name="instansi" required value="<?= $sppd['instansi'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="mata_anggaran">Mata Anggaran</label>
                                    <input type="text" class="form-control" id="mata_anggaran" name="mata_anggaran" required value="<?= $sppd['mata_anggaran'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea class="form-control" id="keterangan" rows="3" name="keterangan" required><?= $sppd['keterangan'] ?></textarea>
                                </div>
                                <div class="card-action">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="index.php?page=spt" class="btn btn-danger">Batal</a>
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