<?php
$id_spt = $_GET['id_spt'];
$query = mysqli_query($koneksi, "SELECT * FROM spt WHERE id_spt = '$id_spt'");

$spt = mysqli_fetch_assoc($query);

// get id nppd
$id_nppd = $spt['nppd_id'];
$query_nppd = mysqli_query($koneksi, "SELECT pegawai_id, tujuan_perjalanan FROM nppd WHERE id_nppd = '$id_nppd'");
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
                <h4 class="page-title">Edit Surat Perintah Tugas(SPT)</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="controllers/spt/update.php" method="POST">
                                <input type="hidden" name="id_spt" value="<?= $id_spt?>">
                                <div class="form-group">
                                    <label for="pegawai">Pegawai</label>
                                    <select multiple class="form-control select2" id="pegawai" name="pegawai_id[]" disabled>
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
                                    <label for="no_spt">No SPT</label>
                                    <input type="text" class="form-control" id="no_spt" name="no_spt" required value="<?= $spt['no_spt']?>">
                                </div>
                                <div class="form-group">
                                    <label for="dasar_hukum">Dasar Hukum</label>
                                    <input type="text" class="form-control" id="dasar_hukum" name="dasar_hukum" required value="<?= $spt['dasar_hukum']?>">
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