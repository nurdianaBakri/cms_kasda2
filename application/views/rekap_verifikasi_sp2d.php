<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>CMS || KASDA</title>

    <!-- Favicon-->
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

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="<?php echo base_url()."assets/" ?>plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- Bootstrap DatePicker Css -->
    <link href="<?php echo base_url()."assets/" ?>plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="<?php echo base_url()."assets/" ?>plugins/waitme/waitMe.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="<?php echo base_url()."assets/" ?>plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />


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
                                    <h2>REKAP VERIFIKASI SP2D</h2>
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
                                                <div class="col-15">
                                                    <label>KASDA</label>
                                                </div>
                                                <div class="col-75">
                                                   <select class="form-control" name="kd_kasda">
                                                       <option></option>
                                                   </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-15">
                                                    <label>Userid</label>
                                                </div>
                                                <div class="col-75">
                                                   <select class="form-control" name="userid">
                                                       <option></option>
                                                   </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-daterange" id="bs_datepicker_range_container" style="position: relative;">
                                                    <div class="col-15">
                                                        <label>Tanggal</label>
                                                    </div>
                                                    <div class="col-10">
                                                        <input type="text" class="form-control" name="tglawal" value="<?php echo date("m/d/Y");?>" >
                                                    </div>
                                                    <div class=" col-5">
                                                        <label>&nbsp&nbsp&nbsps/d</label>
                                                    </div>
                                                    <div class="col-10">
                                                        <input type="text" class="form-control" name="tglakhir" value="<?php echo date("m/d/Y");?>"   >
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-success">
                                <div class="body">
                                    <button type="button" class="btn btn-success waves-effect">
                                        <i class="material-icons">cached</i>
                                        <span>Reset</span>
                                    </button>
                                    <button type="button" class="btn btn-success waves-effect">
                                        <i class="material-icons">cached</i>
                                        <span>Inquiry</span>
                                    </button>
                                    <button type="button" class="btn btn-success waves-effect" disabled>
                                        <i class="material-icons">print</i>
                                        <span>Print</span>
                                    </button>
                                    <button type="button" class="btn btn-success waves-effect" disabled>
                                        <i class="material-icons">import_export</i>
                                        <span>Export as PDF</span>
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

    <!-- Custom Js -->
    <script src="<?php echo base_url()."assets/" ?>js/admin.js"></script>
    <script src="<?php echo base_url()."assets/" ?>js/pages/forms/basic-form-elements.js"></script>

    <!-- Autosize Plugin Js -->
    <script src="<?php echo base_url()."assets/" ?>plugins/autosize/autosize.js"></script>

    <!-- Moment Plugin Js -->
    <script src="<?php echo base_url()."assets/" ?>plugins/momentjs/moment.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="<?php echo base_url()."assets/" ?>plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Bootstrap Datepicker Plugin Js -->
    <script src="<?php echo base_url()."assets/" ?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

    <!-- Demo Js -->
    <script src="<?php echo base_url()."assets/" ?>js/demo.js"></script>


</body>

</html>
