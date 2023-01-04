<?php
$id_spt = $_GET['id_spt'];
$id_pegawai = $_SESSION['pegawai_id'];

$spt = mysqli_query($koneksi, "SELECT * FROM spt JOIN nppd ON spt.nppd_id = nppd.id_nppd WHERE id_spt='$id_spt'");
$spt = mysqli_fetch_assoc($spt);

$pegawai = mysqli_query($koneksi, "SELECT * FROM pegawai JOIN golongan ON pegawai.golongan_id = golongan.id_golongan WHERE id_pegawai='$id_pegawai'");
$pegawai = mysqli_fetch_assoc($pegawai);
?>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Tambah Data Perjalanan Dinas</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="controllers/perjalanan-dinas/store.php" method="POST">
                                <input type="hidden" name="spt_id" value="<?= $id_spt ?>">
                                <input type="hidden" name="pegawai_id" value="<?= $id_pegawai ?>">
                                <div class="form-group">
                                    <label for="nama">Nama Pegawai</label>
                                    <input type="text" class="form-control" id="nama" name="nama" readonly value="<?= $pegawai['nama'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nip">NIP</label>
                                    <input type="text" class="form-control" id="nip" name="nip" readonly value="<?= $pegawai['nip'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="pangkat">Pangkat</label>
                                    <input type="text" class="form-control" id="pangkat" name="pangkat" readonly value="<?= $pegawai['pangkat'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="pangkat">Pangkat</label>
                                    <input type="text" class="form-control" id="pangkat" name="pangkat" readonly value="<?= $pegawai['pangkat'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="golongan">Golongan</label>
                                    <input type="text" class="form-control" id="golongan" name="golongan" readonly value="Golongan <?= $pegawai['nama_golongan'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="jabatan">Jabatan</label>
                                    <input type="text" class="form-control" id="jabatan" name="jabatan" readonly value="<?= $pegawai['jabatan'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="unit_kerja">Unit Kerja</label>
                                    <input type="text" class="form-control" id="unit_kerja" name="unit_kerja" readonly value="<?= $pegawai['unit_kerja'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea class="form-control" id="keterangan" rows="3" name="keterangan" required>Telah melaksanakan perjalanan dinas dalam rangka <?= $spt['tujuan_perjalanan'] ?>, berdasarkan Surat Perintah Tugas nomor: <?= $spt['no_spt'] ?>, dari tanggal <?= date('d-m-Y', strtotime($spt['tanggal_pergi']))?> s/d <?= date('d-m-Y', strtotime($spt['tanggal_pulang']))?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="hasil">Hasil</label>
                                    <textarea class="form-control" id="hasil" rows="3" name="hasil" required>Adapun hasil perjalanan dinas tersebut adalah: </textarea>
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