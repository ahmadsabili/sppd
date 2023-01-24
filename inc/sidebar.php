<div class="sidebar">
    
    <div class="sidebar-background"></div>
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav">
                <li class="nav-item <?= !isset($_GET['page']) ? 'active' : '' ?>">
                    <a href="index.php">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <?php if ($_SESSION['role'] == 'user') : ?>
                <li class="nav-item <?= $_GET['page'] == 'nppd' ? 'active' : '' ?>">
                    <a href="index.php?page=nppd">
                        <i class="fas fa-envelope"></i>
                        <p>NPPD</p>
                    </a>
                </li>
                <li class="nav-item <?= $_GET['page'] == 'spt' ? 'active' : '' ?>">
                    <a href="index.php?page=spt">
                        <i class="fas fa-envelope"></i>
                        <p>SPT</p>
                    </a>
                </li>
                <li class="nav-item <?= $_GET['page'] == 'perjalanan-dinas' ? 'active' : '' ?>">
                    <a href="index.php?page=perjalanan-dinas">
                        <i class="fas fa-plane"></i>
                        <p>Perjalanan Dinas</p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if ($_SESSION['role'] == 'admin') : ?>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Master Data</h4>
                </li>
                <li class="nav-item <?= $_GET['page'] == 'nppd' || $_GET['page'] == 'spt' || $_GET['page'] == 'sppd'  ? 'active' : '' ?>">
                    <a data-toggle="collapse" href="#sppd">
                        <i class="fas fa-envelope-open"></i>
                        <p>SPPD</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="sppd">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="index.php?page=nppd">
                                    <span class="sub-item">NPPD</span>
                                </a>
                            </li>
                            <li>
                                <a href="index.php?page=spt">
                                    <span class="sub-item">SPT</span>
                                </a>
                            </li>
                            <li>
                                <a href="index.php?page=sppd">
                                    <span class="sub-item">SPPD</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item <?= $_GET['page'] == 'pegawai' || $_GET['page'] == 'golongan'  ? 'active' : '' ?>">
                    <a data-toggle="collapse" href="#pegawai">
                        <i class="fas fa-user-tie"></i>
                        <p>Pegawai</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="pegawai">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="index.php?page=pegawai">
                                    <span class="sub-item">Daftar Pegawai</span>
                                </a>
                            </li>
                            <li>
                                <a href="index.php?page=golongan">
                                    <span class="sub-item">Golongan</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item <?= $_GET['page'] == 'kota' || $_GET['page'] == 'biaya-perjalanan' || $_GET['page'] == 'kendaraan' ? 'active' : '' ?>">
                    <a data-toggle="collapse" href="#biaya">
                        <i class="fas fa-money-bill-wave"></i>
                        <p>Biaya</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="biaya">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="index.php?page=kota">
                                    <span class="sub-item">Kota</span>
                                </a>
                            </li>
                            <li>
                                <a href="index.php?page=biaya-perjalanan">
                                    <span class="sub-item">Biaya Perjalanan</span>
                                </a>
                            </li>
                            <li>
                                <a href="index.php?page=kendaraan">
                                    <span class="sub-item">Kendaraan</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Master Laporan</h4>
                </li>
                <li class="nav-item <?= $_GET['page'] == 'kuitansi' || $_GET['page'] == 'perjalanan-dinas' ? 'active' : '' ?>">
                    <a data-toggle="collapse" href="#laporan">
                        <i class="fas fa-print"></i>
                        <p>Laporan</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="laporan">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="index.php?page=kuitansi">
                                    <span class="sub-item">Kuitansi</span>
                                </a>
                            </li>
                            <li>
                                <a href="index.php?page=perjalanan-dinas">
                                    <span class="sub-item">Perjalanan Dinas</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Setting</h4>
                </li>
                <li class="nav-item <?= $_GET['page'] == 'profil-instansi' ? 'active' : '' ?>">
                    <a data-toggle="collapse" href="#instansi">
                        <i class="fas fa-cogs"></i>
                        <p>Setting</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="instansi">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="index.php?page=profil-instansi">
                                    <span class="sub-item">Profil Instansi</span>
                                </a>
                            </li>
                            <li>
                                <a href="index.php?page=ttd-kuitansi">
                                    <span class="sub-item">TTD Kuitansi</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>