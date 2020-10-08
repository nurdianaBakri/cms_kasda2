<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>CMS || KASDA</title>

   <link rel="icon" href="<?php echo base_url()."assets/" ?>favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url()."assets/" ?>plugins/bootstrap/css/bootstrap1.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url()."assets/" ?>plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url()."assets/" ?>plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="<?php echo base_url()."assets/" ?>plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="<?php echo base_url()."assets/" ?>css/style1.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url()."assets/" ?>css/themes/all-themes1.css" rel="stylesheet" />
 
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
            <!-- CPU Usage -->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>REKON PENCAIRAN SP2D</h2>
                                </div>
                            </div>
                        </div>
                        <div class="body">
                            <div class="panel panel-success">
                                <div id="collapseOne_2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_2">
                                    <div class="panel-body">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                          <form action="/action_page.php">
                                            <div class="row">
                                                <div class="col-10">
                                                    <label for="kd_kasda">KASDA</label>
                                                </div>
                                                <div class="col-85">
                                                   <select class="form-control">
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
                        <div class="row clearfix">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="body">
                                    <div class="panel panel-success">
                                        <div class="panel-heading" role="tab" id="headingOne_2">
                                            <h4 class="panel-title">
                                                Transaksi CMS
                                            </h4>
                                        </div>
                                        <div id="collapseOne_2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_2">
                                            <div class="panel-body">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                  <form action="/action_page.php">
                                                    <!--tabel-->
                                                    <div class="row clearfix">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                                <thead>
                                                                    <tr>
                                                                        <th width="5%">No.</th>
                                                                        <th width="25%">No. SP2D</th>
                                                                        <th width="30%">No.Rekening</th>
                                                                        <th width="40%">Nilai TRX(Rp.)</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                                           
                                                                </tbody>
                                                            </table>
                                                            <div class="row">
                                                                <div class="col-30">
                                                                    <label>&nbsp&nbsp&nbsp&nbspJumlah Transaksi</label>
                                                                </div>
                                                                <div class="col-10">
                                                                    <input type="text" name="jml_transaksi" disabled>
                                                                </div>
                                                                <div class="col-25">
                                                                    <label>&nbspTotal Transaksi</label>
                                                                </div>
                                                                <div class="col-35">
                                                                    <input type="text" name="jml_transaksi" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end tabel-->
                                                  </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="body">
                                    <div class="panel panel-success">
                                        <div class="panel-heading" role="tab" id="headingOne_2">
                                            <h4 class="panel-title">
                                                Transaksi Bank
                                            </h4>
                                        </div>
                                        <div id="collapseOne_2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_2">
                                            <div class="panel-body">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                  <form action="/action_page.php">
                                                    <!--tabel-->
                                                    <div class="row clearfix">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                                <thead>
                                                                    <tr>
                                                                        <th width="5%">No.</th>
                                                                        <th width="25%">No. SP2D</th>
                                                                        <th width="30%">No.Rekening</th>
                                                                        <th width="40%">Nilai TRX(Rp.)</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                                           
                                                                </tbody>
                                                            </table>
                                                            <div class="row">
                                                                <div class="col-30">
                                                                    <label>&nbsp&nbsp&nbsp&nbspJumlah Transaksi</label>
                                                                </div>
                                                                <div class="col-10">
                                                                    <input type="text" name="jml_transaksi" disabled>
                                                                </div>
                                                                <div class="col-25">
                                                                    <label>&nbspTotal Transaksi</label>
                                                                </div>
                                                                <div class="col-35">
                                                                    <input type="text" name="jml_transaksi" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end tabel-->
                                                  </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end cpu usage-->
                        
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
                                    <!-- <button type="button" class="btn btn-success waves-effect">
                                        <i class="material-icons">save</i>
                                        <span>Save</span>
                                    </button>
                                    <button type="button" class="btn btn-success waves-effect">
                                        <i class="material-icons">delete_sweep</i>
                                        <span>Delete</span>
                                    </button> -->
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
    </section>

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url()."assets/" ?>plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url()."assets/" ?>plugins/bootstrap/js/bootstrap.js"></script>


    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url()."assets/" ?>plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url()."assets/" ?>plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo base_url()."assets/" ?>plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo base_url()."assets/" ?>plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url()."assets/" ?>plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url()."assets/" ?>plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="<?php echo base_url()."assets/" ?>plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="<?php echo base_url()."assets/" ?>plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="<?php echo base_url()."assets/" ?>plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="<?php echo base_url()."assets/" ?>plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="<?php echo base_url()."assets/" ?>plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url()."assets/" ?>js/admin.js"></script>
    <!-- <script src="<?php echo base_url()."assets/" ?>js/pages/tables/jquery-datatable.js"></script> -->

<script type="text/javascript">
    $(function () {
    $('.js-basic-example').DataTable({
        responsive: true, 
        autoWidth : false, 
    });   
});
</script>

    <!-- Demo Js -->
    <script src="<?php echo base_url()."assets/" ?>js/demo.js"></script>

</body>

</html>
