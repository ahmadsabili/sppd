<?php
$query = mysqli_query($koneksi, "SELECT * FROM profil_instansi WHERE id_profil_instansi = 1");
$instansi = mysqli_fetch_assoc($query);
?>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Profil Instansi</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <button class="btn btn-sm btn-warning mb-2" id="edit-button-instansi"><i class="fas fa-edit"></i>&nbsp; Edit data</button>
                            <button class="btn btn-sm btn-default mb-2" id="cancel-button-instansi" style="display: none;"><i class="fas fa-ban"></i>&nbsp; Batal edit data</button>
                            <form action="controllers/instansi/update.php" method="POST">
                                <input type="hidden" name="id_instansi" value="<?= $instansi['id_instansi'] ?>">
                                <div class="form-group">
                                    <label for="nama_instansi">Nama Instansi</label>
                                    <input type="text" class="form-control" id="nama_instansi" name="nama_instansi" required value="<?= $instansi['nama_instansi'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan" required value="<?= $instansi['keterangan'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" required value="<?= $instansi['alamat'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="kota">Kota</label>
                                    <input type="text" class="form-control" id="kota" name="kota" required value="<?= $instansi['kota'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="kode_pos">Kode Pos</label>
                                    <input type="text" class="form-control" id="kode_pos" name="kode_pos" required value="<?= $instansi['kode_pos'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="no_telp">No Telp</label>
                                    <input type="text" class="form-control" id="no_telp" name="no_telp" required value="<?= $instansi['no_telp'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="fax">Fax</label>
                                    <input type="text" class="form-control" id="fax" name="fax" required value="<?= $instansi['fax'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="pimpinan_tertinggi">Pimpinan Tertinggi</label>
                                    <input type="text" class="form-control" id="pimpinan_tertinggi" name="pimpinan_tertinggi" required value="<?= $instansi['pimpinan_tertinggi'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nama_pimpinan_tertinggi">Nama Pimpinan Tertinggi</label>
                                    <input type="text" class="form-control" id="nama_pimpinan_tertinggi" name="nama_pimpinan_tertinggi" required value="<?= $instansi['nama_pimpinan_tertinggi'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nip_pimpinan_tertinggi">NIP Pimpinan Tertinggi</label>
                                    <input type="text" class="form-control" id="nip_pimpinan_tertinggi" name="nip_pimpinan_tertinggi" required value="<?= $instansi['nip_pimpinan_tertinggi'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="jabatan_pimpinan_tertinggi">Jabatan Pimpinan Tertinggi</label>
                                    <input type="text" class="form-control" id="jabatan_pimpinan_tertinggi" name="jabatan_pimpinan_tertinggi" required value="<?= $instansi['jabatan_pimpinan_tertinggi'] ?>" readonly>
                                </div>
                                <div class="card-action">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary" id="submit-button-instansi" style="display: none;">Simpan</button>
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