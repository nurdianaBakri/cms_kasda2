<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>CMS || KASDA</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url('assets/favicon.ico')?>" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap1.css')?>" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url('assets/plugins/node-waves/waves.css')?>" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url('assets/plugins/animate-css/animate.css')?>" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="<?php echo base_url('assets/plugins/waitme/waitMe.css')?>" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="<?php echo base_url('assets/plugins/morrisjs/morris.css')?>" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url('assets/css/style1.css')?>" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url('assets/css/themes/all-themes1.css')?>" rel="stylesheet" />
   
    <!--style-->
    <?php $this->load->view('style')?>
    
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <?php $this->load->view('top_bar')?>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- Menu -->
            <?php $this->load->view('menu')?>
            <!-- end Menu -->
        </aside>
        <!-- #END# Left Sidebar -->
           <!-- right sidebar -->
            <?php $this->load->view('right_sidebar')?>
        <!-- #END# right sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="body">
                <!-- CPU Usage -->
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="header">
                                <div class="row clearfix">
                                    <div class="col-xs-12 col-sm-6">
                                        <h2>PEMELIHARAAN HARI LIBUR</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="body">
                                <div class="panel panel-success">
                                    <div class="panel-heading" role="tab" id="headingOne_2">
                                        <h4 class="panel-title">
                                            Data Organisasi
                                        </h4>
                                    </div>
                                    <div id="collapseOne_2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_2">
                                        <div class="panel-body">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                              <form action="/action_page.php">
                                                <div class="row">
                                                <div class="col-15">
                                                    <label for="kd_kasda">Kode Kasda</label>
                                                </div>
                                                <div class="col-50">
                                                   <select class="form-control"  name="kd_kasda">
                                                       <option></option>
                                                       <option>00001 - PEMERINTAH KOTA MATARAM</option>
                                                       <option>00002 - PEMERINTAH KABUPATEN LOMBOK BARAT</option>
                                                       <option>00003 - PEMERINTAH DAERAH KABUPATEN SUMBAWA </option>
                                                       <option>00004 - PEMKAB LOMBOK UTARA</option>
                                                       <option>00005 - DEPARTEMEN KEUANGAN</option>
                                                       <option>00006 - PEMERINTAH DAERAH PROVINSI NUSA TENGGARA BARAT</option>
                                                       <option>00007 - PEMERINTAH DAERAH KABUPATEN DOMPU</option>
                                                       <option>00008 - PEMDA LOMBOK TENGAH</option>
                                                       <option>00009 - PEMERINTAH DAERAH KAB. LOMBOK TIMUR</option>
                                                       <option>00010 - PEMERINTAH KABUPATEN BIMA</option>
                                                       <option>00011 - PEMERINTAH KOTA BIMA</option>
                                                       <option>00012 - PEMERINTAH DAERAH SUMBAWA BARAT</option>
                                                       <option>00013 - BAPPENDA PROVINSI NTB</option>
                                                       <option>99999 - SUPER USER</option>
                                                   </select>
                                                </div>
                                            </div>
                                              </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="body">
                                <div class="panel panel-success">
                                    <div class="panel-heading" role="tab" id="headingOne_2">
                                        <h4 class="panel-title">
                                            Hari Libur
                                        </h4>
                                    </div>
                                    <div id="collapseOne_2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_2">
                                        <div class="panel-body">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                              <form action="/action_page.php">
                                                <div class="demo-checkbox">
                                                    <div class="row">
                                                        <input type="checkbox" id="md_checkbox_senin" class="filled-in chk-col-green" />
                                                        <label for="md_checkbox_senin">Senin</label>
                                                        <input type="checkbox" id="md_checkbox_Rabu" class="filled-in chk-col-green" />
                                                        <label for="md_checkbox_Rabu">Rabu</label>
                                                        <input type="checkbox" id="md_checkbox_jumat" class="filled-in chk-col-green" />
                                                        <label for="md_checkbox_jumat">Jumat</label>
                                                        <input type="checkbox" id="md_checkbox_minggu" class="filled-in chk-col-green" />
                                                        <label for="md_checkbox_minggu">Minggu</label>
                                                    </div>
                                                    <div class="row">
                                                        <input type="checkbox" id="md_checkbox_selasa" class="filled-in chk-col-green" />
                                                        <label for="md_checkbox_selasa">Selasa</label>
                                                        <input type="checkbox" id="md_checkbox_kamis" class="filled-in chk-col-green" />
                                                        <label for="md_checkbox_kamis">Kamis</label>
                                                        <input type="checkbox" id="md_checkbox_sabtu" class="filled-in chk-col-green" />
                                                        <label for="md_checkbox_sabtu">Sabtu</label>
                                                    </div>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="body">
                                <div class="panel panel-success">
                                    <div class="body">
                                        <button type="button" class="btn btn-success waves-effect">
                                            <i class="material-icons">cached</i>
                                            <span>Reset</span>
                                        </button>
                                        <button type="button" class="btn btn-success waves-effect" disabled>
                                            <i class="material-icons">cached</i>
                                            <span>Inquiry</span>
                                        </button>
                                        <button type="button" class="btn btn-success waves-effect">
                                            <i class="material-icons">save</i>
                                            <span>Save</span>
                                        </button>
                                        <button type="button" class="btn btn-success waves-effect" disabled>
                                            <i class="material-icons">print</i>
                                            <span>Print</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js')?>"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.js')?>"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url('assets/plugins/jquery-slimscroll/jquery.slimscroll.js')?>"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url('assets/plugins/node-waves/waves.js')?>"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="<?php echo base_url('assets/plugins/jquery-countto/jquery.countTo.js')?>"></script>

    <!-- Morris Plugin Js -->
    <script src="<?php echo base_url('assets/plugins/raphael/raphael.min.js')?>"></script>
    <script src="<?php echo base_url('assets/plugins/morrisjs/morris.js')?>"></script>

    <!-- ChartJs -->
    <script src="<?php echo base_url('assets/plugins/chartjs/Chart.bundle.js')?>"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="<?php echo base_url('assets/plugins/flot-charts/jquery.flot.js')?>"></script>
    <script src="<?php echo base_url('assets/plugins/flot-charts/jquery.flot.resize.js')?>"></script>
    <script src="<?php echo base_url('assets/plugins/flot-charts/jquery.flot.pie.js')?>"></script>
    <script src="<?php echo base_url('assets/plugins/flot-charts/jquery.flot.categories.js')?>"></script>
    <script src="<?php echo base_url('assets/plugins/flot-charts/jquery.flot.time.js')?>"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="<?php echo base_url('assets/plugins/jquery-sparkline/jquery.sparkline.js')?>"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url('assets/js/admin.js')?>"></script>
    <script src="<?php echo base_url('assets/js/pages/index.js')?>"></script>
    <script src="<?php echo base_url('assets/js/pages/forms/basic-form-elements.js')?>"></script>

    <!-- Demo Js -->
    <script src="<?php echo base_url('assets/js/demo.js')?>"></script>
</body>

</html>
