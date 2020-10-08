
                <?php
                    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                ?> 

             <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo base_url()."assets/" ?>images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">John Doe</div>
                    <div class="email">john.doe@example.com</div> 
                </div>
            </div>
            <!-- #User Info --> 

            <div class="menu">  
                <ul class="list">
                    <li class="header">MAIN UTAMA</li>
                    <li class="<?php if(strpos($actual_link, 'cms_kasda/Home') !== false){  echo "active";} ?> ">
                        <a href="<?php echo base_url('Home')?>">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="<?php 
                    if(strpos($actual_link, 'parameterorganisasi') !== false || strpos($actual_link, 'parameterrekeningbank') !== false || strpos($actual_link, 'parameter') !== false){ echo "active";} 

                    ?>">
                        <a href="#" class="menu-toggle">
                            <i class="material-icons">folder</i>
                            <span>1000 - PARAMETER</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="<?php if(strpos($actual_link, 'parameterorganisasi') !== false){  echo "active";} ?> ">
                                <a href="#" class="menu-toggle">
                                    <i class="material-icons">folder</i>
                                    <span>1001 - Organisasi</span>
                                </a>
                                <ul class="ml-menu"> 
                                     <li class="<?php if(strpos($actual_link, 'parameterorganisasi/PemeliharaanKasda') !== false){  echo "active";} ?> ">
                                        <a  href="<?php echo base_url('parameterorganisasi/PemeliharaanKasda')?>">1101 - Pemeliharaan KASDA</a>
                                    </li>
                                    <li class="<?php if(strpos($actual_link, 'parameterorganisasi/PemeliharaanUrusan') !== false){  echo "active";} ?> ">
                                        <a  href="<?php echo base_url('parameterorganisasi/PemeliharaanUrusan')?>">1102 - Pemeliharaan Urusan</a>
                                    </li>
                                    <li class="<?php if(strpos($actual_link, 'parameterorganisasi/PemeliharaanBidang') !== false){  echo "active";} ?> ">
                                        <a href="<?php echo base_url('parameterorganisasi/PemeliharaanBidang')?>">1103 - Pemeliharaan Bidang</a>
                                    </li>
                                    <li class="<?php if(strpos($actual_link, 'parameterorganisasi/PemeliharaanUnit') !== false){  echo "active";} ?> " >
                                        <a href="<?php echo base_url('parameterorganisasi/PemeliharaanUnit')?>">1104 - Pemeliharaan Unit</a>
                                    </li>
                                    <li class="<?php if(strpos($actual_link, 'parameterorganisasi/PemeliharaanSubUnit') !== false){  echo "active";} ?> " >
                                        <a  href="<?php echo base_url('parameterorganisasi/PemeliharaanSubUnit')?>">1105 - Pemeliharaan Sub Unit</a>
                                    </li>
                                    <li class="<?php if(strpos($actual_link, 'parameterorganisasi/Skpd') !== false){  echo "active";} ?> ">
                                        <a  href="<?php echo base_url('parameterorganisasi/Skpd')?>">1106 - Import SKPD</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="<?php if(strpos($actual_link, 'parameterrekeningbank') !== false){  echo "active";} ?> ">
                                <a href="#" class="menu-toggle">
                                    <i class="material-icons">folder</i>
                                    <span>1003 - Rekening Bank</span>
                                </a>
                                <ul class="ml-menu">
                                    <li class="<?php if(strpos($actual_link, 'parameterrekeningbank/Rekening_potongan') !== false){  echo "active";} ?> ">
                                        <a href="<?php echo base_url('parameterrekeningbank/Rekening_potongan')?>">1305 - Pemeliharaan Rek Potongan</a>
                                    </li>
                                    <li class="<?php if(strpos($actual_link, 'parameterrekeningbank/Rekening_sumber') !== false){  echo "active";} ?> ">
                                        <a href="<?php echo base_url('parameterrekeningbank/Rekening_sumber')?>">1306 - Pemeliharaan Rek Sumber</a>
                                    </li>
                                    <li class="<?php if(strpos($actual_link, 'parameterrekeningbank/Rekening_kasda') !== false){  echo "active";} ?> ">
                                        <a href="<?php echo base_url('parameterrekeningbank/Rekening_kasda')?>">1307 - Pemeliharaan Rek Kasda</a>
                                    </li>
                                    <li class="<?php if(strpos($actual_link, 'parameterrekeningbank/Rekening_skpd') !== false){  echo "active";} ?> ">
                                        <a href="<?php echo base_url('parameterrekeningbank/Rekening_skpd')?>">1307 - Pemeliharaan Rek SKPD</a>
                                    </li>
                                </ul>
                            </li> 

                            <li class="<?php if(strpos($actual_link, 'parameter/PemeliharaanBank') !== false){  echo "active";} ?> ">
                                <a href="<?php echo base_url('parameter/PemeliharaanBank')?>" >
                                    <span>1006 - Pemeliharaan Bank</span>
                                </a>
                            </li>
                            <li class="<?php if(strpos($actual_link, 'parameter/PemeliharaanJenisSPM') !== false){  echo "active";} ?> ">
                                <a href="<?php echo base_url('parameter/PemeliharaanJenisSPM')?>" >
                                    <span>1018 - Pemeliharaan Jenis SPM</span>
                                </a>
                            </li>
                            <li class="<?php if(strpos($actual_link, 'parameter/PemeliharaanMAP') !== false){  echo "active";} ?> ">
                                <a href="<?php echo base_url('parameter/PemeliharaanMAP')?>" >
                                    <span>1020 - Pemeliharaan MAP</span>
                                </a>
                            </li>
                            <li class="<?php if(strpos($actual_link, 'parameter/Aproval_rek_kasda') !== false){  echo "active";} ?> ">
                                <a href="<?php echo base_url('parameter/Aproval_rek_kasda')?>"  >
                                    <span>1353 - Approval Rekening KASDA</span>
                                </a>
                            </li>
                            <li class="<?php if(strpos($actual_link, 'parameter/Pemeliharaan_akses_rek_koran') !== false){  echo "active";} ?> ">
                                <a href="<?php echo base_url('parameter/Pemeliharaan_akses_rek_koran')?>" >
                                    <span>1354 - Pemeliharaan Akses Rekening Koran</span>
                                </a>
                            </li>
                            <li class="<?php if(strpos($actual_link, 'parameter/Maping_Map') !== false){  echo "active";} ?> ">
                                <a href="<?php echo base_url('parameter/Maping_Map')?>" >
                                    <span>1357 - Mapping Map</span>
                                </a>
                            </li>
                            <li class="<?php if(strpos($actual_link, 'parameter/KonfigurasiKasda') !== false){  echo "active";} ?> ">
                                <a href="<?php echo base_url('parameter/KonfigurasiKasda')?>" >
                                    <span>1359 - Konfigurasi Kasda</span>
                                </a>
                            </li>
                            <li class="<?php if(strpos($actual_link, 'parameter/Potongantransaksi') !== false){  echo "active";} ?> ">
                                <a href="<?php echo base_url('parameter/Potongantransaksi')?>" >
                                    <span>xxxx - Potongan Transaksi</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?php if(strpos($actual_link, 'transaksi') !== false){  echo "active";} ?> ">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">folder</i>
                            <span>2000 - TRANSAKSI</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="<?php if(strpos($actual_link, 'transaksi') !== false){  echo "active";} ?> ">
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons">folder</i>
                                    <span>2400 - SP2D (Interface SIMDA)</span>
                                </a>
                                <ul class="ml-menu">
                                    <li li class="<?php if(strpos($actual_link, 'transaksi/Verifikasi_sp2d') !== false){  echo "active";} ?> ">
                                        <a  href="<?php echo base_url('transaksi/Verifikasi_sp2d')?>">2402 - Verifikasi SP2D</a>
                                    </li>
                                    <li class="<?php if(strpos($actual_link, 'transaksi/Koreksi_verifikasi') !== false){  echo "active";} ?> ">
                                        <a href="<?php echo base_url('transaksi/Koreksi_verifikasi')?>">2404 - Koreksi Verifikasi SP2D</a>
                                    </li>
                                    <li class="<?php if(strpos($actual_link, 'transaksi/Gateway_server') !== false){  echo "active";} ?> ">
                                        <a href="<?php echo base_url('transaksi/Gateway_server')?>">2405 - Gateway Server</a>
                                    </li>
                                    <li class="<?php if(strpos($actual_link, 'transaksi/Hapus_sp2d') !== false){  echo "active";} ?> ">
                                        <a href="<?php echo base_url('transaksi/Hapus_sp2d')?>">2408 - Hapus SP2D</a>
                                    </li>
                                    <li class="<?php if(strpos($actual_link, 'transaksi/Pencairan_sp2d') !== false){  echo "active";} ?> ">
                                        <a href="<?php echo base_url('transaksi/Pencairan_sp2d')?>">2410 - Pencairan SP2D</a>
                                    </li>
                                    <li class="<?php if(strpos($actual_link, 'transaksi/Pembukaan_SP2D') !== false){  echo "active";} ?> ">
                                        <a href="<?php echo base_url('transaksi/Pembukaan_SP2D')?>">2411 - Pembukaan SP2D</a>
                                    </li>
                                    <!-- <li class="<?php if(strpos($actual_link, 'transaksi/Pembukaan_SP2D') !== false){  echo "active";} ?> ">
                                        <a href="#">2412 - Pembukaan SP2D Non Anggaran</a>
                                    </li>
                                    <li class="<?php if(strpos($actual_link, 'transaksi/pencairan_sp2d_nihil') !== false){  echo "active";} ?> ">
                                    <a href="<?php echo base_url('transaksi/Pembukaan_SP2D')?>">2413 - Pencairan SP2D Nihil</a>
                                    </li>  
                                    <li class="<?php if(strpos($actual_link, 'transaksi/pencairan_sp2d_non_anggaran') !== false){  echo "active";} ?> ">
                                        <a href="<?php echo base_url('transaksi/Pembukaan_SP2D')?>">2414 - Pencairan SP2D Non Anggaran</a>
                                    </li> 
                                    <li class="<?php if(strpos($actual_link, 'transaksi/verifikasi_sp2d_non_anggaran') !== false){  echo "active";} ?> ">
                                        <a href="<?php echo base_url('transaksi/Pembukaan_SP2D')?>">2415 - Verifikasi SP2D Non Anggaran</a>
                                    </li> -->
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="<?php if(strpos($actual_link, 'Laporan') !== false){  echo "active";} ?> ">
                        <a href="#" class="menu-toggle">
                            <i class="material-icons">folder</i>
                            <span>3000 - LAPORAN</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="<?php if(strpos($actual_link, 'Laporan/LapTrsans') !== false){  echo "active";} ?> ">
                                <a href="#" class="menu-toggle">
                                    <i class="material-icons">folder</i>
                                    <span>3001 - Transaksi</span>
                                </a>
                                <ul class="ml-menu">
                                    <li class="<?php if(strpos($actual_link, 'Laporan/LapTrsans/Laporan_rekKoran') !== false){  echo "active";} ?> ">
                                        <a href="<?php echo base_url('Laporan/LapTrsans/Laporan_rekKoran')?>">3028 - Laporan Rekening Koran</a>
                                    </li>
                                    <!-- <li class="<?php if(strpos($actual_link, 'Laporan/L_transaksi/lap_rekkoran') !== false){  echo "active";} ?> ">
                                        <a href="<?php echo base_url('Laporan/L_transaksi/lap_rekkoran')?>">3030 - Laporan Rekening Koran</a>
                                    </li> -->
                                    <li class="<?php if(strpos($actual_link, 'Laporan/LapTrsans/sp2d_sudah_cair') !== false){  echo "active";} ?> ">
                                        <a href="<?php echo base_url('Laporan/LapTrsans/sp2d_sudah_cair')?>">3101 - Daftar SP2D Sudah Cair</a>
                                    </li>
                                    <li class="<?php if(strpos($actual_link, 'Laporan/LapTrsans/sp2d_belum_cair') !== false){  echo "active";} ?> ">
                                        <a href="<?php echo base_url('Laporan/LapTrsans/sp2d_belum_cair')?>">3102 - Daftar SP2D Belum Cair</a>
                                    </li>
                                    <li class="<?php if(strpos($actual_link, 'Laporan/LapTrsans/rekap_pencairan_sp2d') !== false){  echo "active";} ?> ">
                                        <a href="<?php echo base_url('Laporan/LapTrsans/rekap_pencairan_sp2d')?>">3103 - Laporan Rekap Pencairan SP2D</a>
                                    </li>
                                    <li class="<?php if(strpos($actual_link, 'Laporan/LapTrsans/Status_per_sp2d') !== false){  echo "active";} ?> ">
                                        <a href="<?php echo base_url('Laporan/LapTrsans/Status_per_sp2d')?>">3104 - Laporan Status Per SP2D</a>
                                    </li>
                                    <li class="<?php if(strpos($actual_link, 'Laporan/LapTrsans/Koreksi_sp2d') !== false){  echo "active";} ?> ">
                                        <a href="<?php echo base_url('Laporan/LapTrsans/Koreksi_sp2d')?>">3107 - Laporan Koreksi Verifikasi SP2D</a>
                                    </li>
                                    <li class="<?php if(strpos($actual_link, 'Laporan/LapTrsans/LapPembukaansp2d') !== false){  echo "active";} ?> ">
                                        <a href="<?php echo base_url('Laporan/LapTrsans/LapPembukaansp2d')?>">3109 - Rekap Pembukaan SP2D</a>
                                    </li>
                                    <li class="<?php if(strpos($actual_link, 'Laporan/LapTrsans/LapVerifikasi') !== false){  echo "active";} ?> ">
                                        <a href="<?php echo base_url('Laporan/LapTrsans/LapVerifikasi')?>">3110 - Rekap Verifikasi SP2D</a>
                                    </li>
                                    <li class="<?php if(strpos($actual_link, 'Laporan/LapTrsans/CetakUlang') !== false){  echo "active";} ?> ">
                                        <a href="<?php echo base_url('Laporan/LapTrsans/CetakUlang')?>">3112 - Cetak Ulang</a>
                                    </li>
                                    <li class="<?php if(strpos($actual_link, 'Laporan/LapTrsans/DaftarStatusSP2D') !== false){  echo "active";} ?> ">
                                        <a href="<?php echo base_url('Laporan/LapTrsans/DaftarStatusSP2D')?>">3114 - Daftar Status SP2D</a>
                                    </li>
                                    <li class="<?php if(strpos($actual_link, 'Laporan/LapTrsans/Sp2dgagalImport') !== false){  echo "active";} ?> ">
                                        <a  href="<?php echo base_url('Laporan/LapTrsans/Sp2dgagalImport')?>">3116 - Laporan SP2D Gagal Import</a>
                                    </li>
                                    <li class="<?php if(strpos($actual_link, 'Laporan/LapTrsans/Sp2dBerhasilImport') !== false){  echo "active";} ?> ">
                                        <a href="<?php echo base_url('Laporan/LapTrsans/Sp2dBerhasilImport')?>">3117 - Laporan SP2D Berhasil Import</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="<?php if(strpos($actual_link, 'Laporan/L_security') !== false){  echo "active";} ?> ">
                                <a href="#" class="menu-toggle">
                                    <i class="material-icons">folder</i>
                                    <span>3002 - Security</span>
                                </a>
                                <ul class="ml-menu">
                                    <li class="<?php if(strpos($actual_link, 'Laporan/L_security/daftar_user_kasda') !== false){  echo "active";} ?> ">
                                        <a href="<?php echo base_url('Laporan/L_security/daftar_user_kasda')?>">3008 - Daftar User KASDA</a>
                                    </li>
                                    <li class="<?php if(strpos($actual_link, 'Laporan/L_security/daftar_terminal') !== false){  echo "active";} ?> ">
                                        <a href="<?php echo base_url('Laporan/L_security/daftar_terminal')?>">3011 - Daftar Terminal</a>
                                    </li>
                                    <li class="<?php if(strpos($actual_link, 'Laporan/L_security/lap_log_security') !== false){  echo "active";} ?> ">
                                        <a href="<?php echo base_url('Laporan/L_security/lap_log_security')?>">3105 - Laporan Log Security</a>
                                    </li>
                                    <li class="<?php if(strpos($actual_link, 'Laporan/L_security/lap_log_parameter') !== false){  echo "active";} ?> ">
                                        <a href="<?php echo base_url('Laporan/L_security/lap_log_parameter')?>">3106 - Laporan Log Parameter</a>
                                    </li>
                                    <li class="<?php if(strpos($actual_link, 'Laporan/L_security/lap_log_activity') !== false){  echo "active";} ?> ">
                                        <a href="<?php echo base_url('Laporan/L_security/lap_log_activity')?>">3108 - Laporan Log Activity</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="<?php if(strpos($actual_link, 'Laporan/L_parameter') !== false){  echo "active";} ?> ">
                                <a href="#" class="menu-toggle">
                                    <i class="material-icons">folder</i>
                                    <span>3003 - Parameter</span>
                                </a>
                                <ul class="ml-menu">
                                    <li class="<?php if(strpos($actual_link, 'Laporan/L_parameter/daftar_skpd') !== false){  echo "active";} ?> ">
                                        <a href="<?php echo base_url('Laporan/L_parameter/daftar_skpd')?>">3010 - Daftar SKPD</a>
                                    </li>
                                    <li class="<?php if(strpos($actual_link, 'Laporan/L_parameter/daftar_kasda') !== false){  echo "active";} ?> ">
                                        <a href="<?php echo base_url('Laporan/L_parameter/daftar_kasda')?>">3023 - Daftar KASDA</a>
                                    </li>
                                    <li class="<?php if(strpos($actual_link, 'Laporan/L_parameter/daftar_rek_kasda') !== false){  echo "active";} ?> ">
                                        <a href="<?php echo base_url('Laporan/L_parameter/daftar_rek_kasda')?>">3026 - Daftar Rekening KASDA</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="<?php if(strpos($actual_link, 'Security') !== false){  echo "active";} ?> ">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">folder</i>
                            <span>4000 - SECURITY</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="<?php if(strpos($actual_link, 'Security/pm_user') !== false){  echo "active";} ?> ">
                                <a href="<?php echo base_url('Security/pm_user')?>">
                                <span>4004 - Pemeliharaan User</span>
                                </a>
                            </li>
                           <li class="<?php if(strpos($actual_link, 'Security/pm_wewenang') !== false){  echo "active";} ?> ">
                                <a href="<?php echo base_url('Security/pm_wewenang')?>" >
                                <span>4005 - Pemeliharaan Wewenang</span>
                                </a>
                            </li>
                            <li class="<?php if(strpos($actual_link, 'Security/pm_terminal') !== false){  echo "active";} ?> ">
                                <a href="<?php echo base_url('Security/pm_terminal')?>" >
                                <span>4006 - Pemeliharaan Terminal</span>
                                </a>
                            </li>
                            <li class="<?php if(strpos($actual_link, 'pengamanan/PemeliharaanMenu') !== false){  echo "active";} ?> ">
                                <a href="<?php echo base_url('pengamanan/PemeliharaanMenu')?>">
                                <span>4010 - Pemeliharaan Menu</span>
                                </a>
                            </li>
                            <li  class="<?php if(strpos($actual_link, 'Security/pm_wmenu') !== false){  echo "active";} ?> ">
                                <a href="<?php echo base_url('Security/pm_wmenu')?>" >
                                <span>4011 - Pemeliharaan Wewenang Menu</span>
                                </a>
                            </li>
                            <li  class="<?php if(strpos($actual_link, 'Security/pm_tuser') !== false){  echo "active";} ?> ">
                                <a href="<?php echo base_url('Security/pm_tuser')?>" >
                                <span>4012 - Pemeliharaan Terminal User</span>
                                </a>
                            </li>
                           <li class="<?php if(strpos($actual_link, 'Security/pm_wuser') !== false){  echo "active";} ?> ">
                                <a href="<?php echo base_url('Security/pm_wuser')?>" >
                                <span>4013 - Pemeliharaan Wewenang User</span>
                                </a>
                            </li>
                            <li class="<?php if(strpos($actual_link, 'Security/change_password') !== false){  echo "active";} ?> ">
                                <a href="<?php echo base_url('Security/change_password')?>" >
                                <span>4014 - Change Password</span>
                                </a>
                            </li>
                            <li class="<?php if(strpos($actual_link, 'Security/override_password') !== false){  echo "active";} ?> ">
                                <a href="<?php echo base_url('Security/override_password')?>" >
                                <span>4015 - Override Password</span>
                                </a>
                            </li>
                            <li class="<?php if(strpos($actual_link, 'Security/pm_hari_libur') !== false){  echo "active";} ?> ">
                                <a href="<?php echo base_url('Security/pm_hari_libur')?>">
                                <span>4016 - Pemeliharaan Hari Libur</span>
                                </a>
                            </li>
                            <li class="<?php if(strpos($actual_link, 'Security/pm_tgl_libur') !== false){  echo "active";} ?> ">
                                <a href="<?php echo base_url('Security/pm_tgl_libur')?>" >
                                <span>4017 - Pemeliharaan Tanggal Libur</span>
                                </a>
                            </li>
                           <li  class="<?php if(strpos($actual_link, 'Security/pm_jam_transaksi') !== false){  echo "active";} ?> ">
                                <a  href="<?php echo base_url('Security/pm_jam_transaksi')?>">
                                <span>4018 - Pemeliharaan Jam Transaksi</span>
                                </a>
                            </li>
                            <li class="<?php if(strpos($actual_link, 'Security/audit_trail') !== false){  echo "active";} ?> ">
                                <a href="<?php echo base_url('Security/audit_trail')?>" >
                                <span>4019 - Audit Trail</span>
                                </a>
                            </li>
                            <li class="<?php if(strpos($actual_link, 'Security/pembukaan_blokir_user') !== false){  echo "active";} ?> ">
                                <a href="<?php echo base_url('Security/pembukaan_blokir_user')?>" >
                                <span>4020 - Pembukaan Blokir User</span>
                                </a>
                            </li>
                            <li class="<?php if(strpos($actual_link, 'Security/app_user_admin') !== false){  echo "active";} ?> ">
                                <a href="<?php echo base_url('Security/app_user_admin')?>" >
                                <span>4021 - Approvel User Admin</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?php if(strpos($actual_link, 'Utility') !== false){  echo "active";} ?> ">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">folder</i>
                            <span>5000 - UTILITY</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="<?php if(strpos($actual_link, 'Utility/pesan_masuk') !== false){  echo "active";} ?> ">
                                <a href="<?php echo base_url('Utility/pesan_masuk')?>">
                                    <span>5001 - Pesan Masuk</span>
                                </a>
                            </li>
                            <li class="<?php if(strpos($actual_link, 'Utility/kirim_pesan') !== false){  echo "active";} ?> ">
                                <a href="<?php echo base_url('Utility/kirim_pesan')?>">
                                    <span>5002 - Kirim Pesan</span>
                                </a>
                            </li>
                            <li class="<?php if(strpos($actual_link, 'Utility/pm_pengumuman') !== false){  echo "active";} ?> ">
                                <a href="<?php echo base_url('Utility/pm_pengumuman')?>">
                                    <span>5003 - Pemeliharaan Pengumuman</span>
                                </a>
                            </li>
                            <li class="<?php if(strpos($actual_link, 'Utility/monitoring_saldo') !== false){  echo "active";} ?> ">
                                <a href="<?php echo base_url('Utility/monitoring_saldo')?>">
                                    <span>5005 - Monitoring Saldo</span>
                                </a>
                            </li>
                            <li class="<?php if(strpos($actual_link, 'Utility/mng_sp2d') !== false){  echo "active";} ?> ">
                                <a href="<?php echo base_url('Utility/mng_sp2d')?>">
                                    <span>5006 - Monitoring SP2D</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?php if(strpos($actual_link, 'Proses') !== false){  echo "active";} ?> ">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">folder</i>
                            <span>6000 - PROSES</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="<?php if(strpos($actual_link, 'Proses/rekon_pencairan_sp2d') !== false){  echo "active";} ?> ">
                                <a href="<?php echo base_url('Proses/rekon_pencairan_sp2d')?>">
                                    <span>6001 - Rekon Pencairan SP2D</span> 
                                </a>
                            </li>
                            <li class="<?php if(strpos($actual_link, 'Proses/bt_kasda') !== false){  echo "active";} ?> ">
                                <a href="<?php echo base_url('Proses/bt_kasda')?>" >
                                    <span>6002 - Buka Tutup KASDA</span> 
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul> 
            </div>