<!-- [ navigation menu ] start -->

<nav class="pcoded-navbar menu-light">
    <div class="navbar-wrapper">
        <div class="navbar-content scroll-div">
            <ul class="nav pcoded-inner-navbar">
                <li class="nav-item"><a href="<?php echo base_url('beranda'); ?>" class="nav-link "><span
                            class="pcoded-micon"><i class="feather icon-home"></i></span><span
                            class="pcoded-mtext">Beranda</span></a></li>
                <li class="nav-item"><a href="<?php echo base_url('kehamilan'); ?>" class="nav-link "><span
                            class="pcoded-micon"><i class="fas fa-grin"></i></span><span
                            class="pcoded-mtext">Kehamilan</span></a></li>
                <li class="nav-item"><a href="<?php echo base_url('skrining'); ?>" class="nav-link "><span
                            class="pcoded-micon"><i class="fas fa-diagnoses"></i></span><span
                            class="pcoded-mtext">Skrining</span></a></li>
                <li class="nav-item"><a href="<?php echo base_url('persalinan'); ?>" class="nav-link "><span
                            class="pcoded-micon"><i class="fas fa-baby-carriage"></i></span><span
                            class="pcoded-mtext">Persalinan</span></a></li>
                <li class="pcoded-hasmenu"><a href="#!" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-printer"></i></span><span class="pcoded-mtext">Laporan</span></a>
                    <ul class="pcoded-submenu">
                        <li class=""><a href="<?php echo base_url('laporan/'); ?>wilayah" class="">Kehamilan
                                per Wilayah</a></li>
                        <li class=""><a href="<?php echo base_url('laporan/'); ?>risiko" class="">Risiko
                                Kehamilan</a></li>
                        <li class=""><a href="<?php echo base_url('laporan/'); ?>persalinan" class="">Persalinan</a></li>
                    </ul>
                </li>
                <?php
                $data = $this->session->userdata('session_aspirasi');
                if ($data['role'] == 'superadmin') {
                    ?>
                    <li class="pcoded-hasmenu"><a href="#!" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-settings"></i></span><span class="pcoded-mtext">Setting</span></a>
                        <ul class="pcoded-submenu">
                            <li class=""><a href="<?php echo base_url('setting/'); ?>lokasi" class="">Lokasi</a>
                            </li>
                            <li class=""><a href="<?php echo base_url('setting/'); ?>user" class="">User</a></li>
                            <li class=""><a href="#!" class="">Koordinat</a></li>
                        </ul>
                    </li>
                <?php } ?>
                <li class="nav-item"><a href="<?php echo base_url('halaman/logout_process'); ?>" class="nav-link "><span
                            class="pcoded-micon"><i class="feather icon-home"></i></span><span
                            class="pcoded-mtext">Keluar</span></a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- [ navigation menu ] end -->
