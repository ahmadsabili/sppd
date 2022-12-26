<?php
$id_sppd = $_GET['id_sppd'];
$query = mysqli_query($koneksi, "SELECT sppd.*, pegawai.*, nppd.lama_perjalanan
FROM sppd
INNER JOIN pegawai ON sppd.pegawai_id = pegawai.id_pegawai
INNER JOIN spt ON sppd.spt_id = spt.id_spt
LEFT JOIN nppd ON spt.nppd_id = nppd.id_nppd
WHERE id_sppd = '$id_sppd'");
$sppd = mysqli_fetch_assoc($query);

// ambil data golongan
$golongan = mysqli_query($koneksi, "SELECT * FROM golongan WHERE id_golongan = '$sppd[golongan_id]'");
$golongan = mysqli_fetch_assoc($golongan);

// ambil data biaya perjalanan berdasarkan golongan
$biaya_perjalanan = mysqli_query($koneksi, "SELECT * FROM biaya_perjalanan WHERE golongan_id = '$golongan[id_golongan]'");
$biaya_perjalanan = mysqli_fetch_assoc($biaya_perjalanan);
?>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Tambah Kuitansi</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="controllers/kuitansi/store.php" method="POST">
                                <input type="hidden" name="sppd_id" value="<?= $sppd['id_sppd'] ?>">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" readonly value="<?= $sppd['nama'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="golongan">Golongan</label>
                                    <input type="text" class="form-control" id="golongan" name="golongan" readonly value="<?= $golongan['nama_golongan'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="kota_id">Tujuan</label>
                                    <input type="text" class="form-control" id="kota_id" name="kota_id" readonly value="<?= $sppd['nama'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="lama_perjalanan">Lama Perjalanan (hari)</label>
                                    <input type="number" class="form-control" id="lama_perjalanan" min="1" name="lama_perjalanan" readonly value="<?= $sppd['lama_perjalanan'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="lumpsum">Lumpsum</label>
                                    <input type="number" class="form-control" id="lumpsum" name="lumpsum" readonly value="<?= $biaya_perjalanan['lumpsum'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="total_lumpsum">Total Lumpsum</label>
                                    <input type="number" class="form-control" id="total_lumpsum" min="1" name="total_lumpsum">
                                </div>
                                <div class="form-group">
                                    <label for="penginapan">Penginapan</label>
                                    <input type="number" class="form-control" id="penginapan" min="1" name="penginapan" readonly value="<?= $biaya_perjalanan['penginapan'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="total_penginapan">Total Penginapan</label>
                                    <input type="number" class="form-control" id="total_penginapan" min="1" name="total_penginapan">
                                </div>
                                <div class="form-group">
                                    <label for="total_transportasi">Transportasi</label>
                                    <input type="number" class="form-control" id="total_transportasi" min="1" name="total_transportasi" required value="<?= $biaya_perjalanan['transportasi'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="diterima_dari">Diterima Dari</label>
                                    <input type="text" class="form-control" id="diterima_dari" name="diterima_dari" required>
                                </div>
                                <div class="form-group">
                                    <label for="untuk_pembayaran">Untuk Pembayaran</label>
                                    <input type="text" class="form-control" id="untuk_pembayaran" name="untuk_pembayaran" required>
                                </div>
                                <div class="card-action">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="index.php?page=sppd" class="btn btn-danger">Batal</a>
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