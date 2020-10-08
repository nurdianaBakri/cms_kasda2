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
                                        <h2>BUKA TUTUP KASDA</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="body">
                                <div class="panel panel-success">
                                    <div class="panel-heading" role="tab" id="headingOne_2">
                                        <h4 class="panel-title">
                                            Informasi
                                        </h4>
                                    </div>
                                    <div id="collapseOne_2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_2">
                                        <div class="panel-body">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                              <form action="/action_page.php">
                                                <div class="row ">
                                                  <div class="col-25">
                                                    <label for="tgl_buka">Tgl. Buka KASDA</label>
                                                  </div>
                                                  <div class="col-25">
                                                    <input type="text" id="tgl_buka" name="tgl_buka_kasda" disabled>
                                                  </div>
                                                </div>
                                                <div class="row">
                                                  <div class="col-25">
                                                    <label for="userid">Userid</label>
                                                  </div>
                                                  <div class="col-25">
                                                    <input type="text" id="userid" name="Userid" disabled>
                                                  </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-25">
                                                        <label for="nm_user">Nama User</label>
                                                    </div>
                                                    <div class="col-25">
                                                        <input type="text" id="nm_user" name="nm_user" disabled>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-25">
                                                        <label for="jssc">Jumlah SP2D Sudah Cair</label>
                                                    </div>
                                                    <div class="col-25">
                                                        <input type="text" id="jssc" name="jssc" disabled>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-25">
                                                        <label for="jsbc">Jumlah SP2D Belum Cair</label>
                                                    </div>
                                                    <div class="col-25">
                                                        <input type="number" id="jsbc" name="jsbc" disabled>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-25">
                                                        <label for="jsbi">Jumlah SP2D Berhasil Import</label>
                                                    </div>
                                                    <div class="col-25">
                                                        <input type="number" id="jsbi" name="jsbi" disabled>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-25">
                                                        <label for="jsgi">Jumlah SP2D Gagal Import</label>
                                                    </div>
                                                    <div class="col-25">
                                                        <input type="number" id="jsgi" name="jsgi" disabled>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-25">
                                                        <label for="sr">Status Rekon</label>
                                                    </div>
                                                    <div class="col-25">
                                                        <input type="number" id="sr" name="sr" disabled>
                                                    </div>
                                                </div>
                                              </form>
                                            </div>
                                        </div>
                                        <div class="body">
                                            <div class="panel panel-success">
                                                <div class="body">
                                                    <button type="button" class="btn btn-success waves-effect" disabled>
                                                        <span>Buka KASDA</span>
                                                    </button>
                                                    <button type="button" class="btn btn-success waves-effect" >
                                                        <span>Tutup KASDA</span>
                                                    </button>
                                                    <button type="button" class="btn btn-success waves-effect" >
                                                        <span>Verified</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="body">
                                <div class="panel panel-success">
                                    <div class="body">
                                        <button type="button" class="btn btn-success waves-effect" disabled>
                                            <i class="material-icons">cached</i>
                                            <span>Reset</span>
                                        </button>
                                        <button type="button" class="btn btn-success waves-effect" disabled>
                                            <i class="material-icons">cached</i>
                                            <span>Inquiry</span>
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

    <!-- Demo Js -->
    <script src="<?php echo base_url('assets/js/demo.js')?>"></script>
</body>

</html>
