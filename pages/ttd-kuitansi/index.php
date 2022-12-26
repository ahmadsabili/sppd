<?php
$query = mysqli_query($koneksi, "SELECT * FROM ttd_kuitansi WHERE id_ttd_kuitansi = 1");
$ttd = mysqli_fetch_assoc($query);
?>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">TTD Kuitansi</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <button class="btn btn-sm btn-warning mb-2" id="edit-button-ttd"><i class="fas fa-edit"></i>&nbsp; Edit data</button>
                            <button class="btn btn-sm btn-default mb-2" id="cancel-button-ttd" style="display: none;"><i class="fas fa-ban"></i>&nbsp; Batal edit data</button>
                            <form action="controllers/ttd-kuitansi/update.php" method="POST">
                                <div class="form-group">
                                    <label for="nama_kabag">Nama Kabag</label>
                                    <input type="text" class="form-control" id="nama_kabag" name="nama_kabag" required value="<?= $ttd['nama_kabag'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nip_kabag">NIP Kabag</label>
                                    <input type="text" class="form-control" id="nip_kabag" name="nip_kabag" required value="<?= $ttd['nip_kabag'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nama_bendahara">Nama Bendahara</label>
                                    <input type="text" class="form-control" id="nama_bendahara" name="nama_bendahara" required value="<?= $ttd['nama_bendahara'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nip_bendahara">NIP Bendahara</label>
                                    <input type="text" class="form-control" id="nip_bendahara" name="nip_bendahara" required value="<?= $ttd['nip_bendahara'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nama_pptk">Nama PPTK</label>
                                    <input type="text" class="form-control" id="nama_pptk" name="nama_pptk" required value="<?= $ttd['nama_pptk'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nip_pptk">NIP PPTK</label>
                                    <input type="text" class="form-control" id="nip_pptk" name="nip_pptk" required value="<?= $ttd['nip_pptk'] ?>" readonly>
                                </div>
                                <div class="card-action">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary" id="submit-button-ttd" style="display: none;">Simpan</button>
                                        <a href="index.php?page=profil-instansi" class="btn btn-danger">Kembali</a>
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