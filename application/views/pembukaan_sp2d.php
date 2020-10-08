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

    <!-- JQuery DataTable Css -->
    <link href="<?php echo base_url()."assets/" ?>plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

     <!-- Bootstrap Material Datetime Picker Css -->
    <link href="<?php echo base_url()."assets/" ?>plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- Bootstrap DatePicker Css -->
    <link href="<?php echo base_url()."assets/" ?>plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />

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
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="header">
                                <div class="row clearfix">
                                    <div class="col-xs-12 col-sm-6">
                                        <h2 >PEMBUKAAN SP2D</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="body">
                            <!-- Nav tabs -->
                                <ul class="nav nav-tabs tab-nav-right tab-col-teal" role="tablist">
                                    <li role="presentation" class="active"><a href="#sp2d" data-toggle="tab">1 - Data SP2D</a></li>
                                    <li role="presentation"><a href="#profile" data-toggle="tab">2 - Data Potongan</a></li>
                                </ul>

                            <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="sp2d">
                                        <div class="body">
                                            <div class="panel panel-success">
                                                <div class="panel-heading" role="tab" id="headingOne_2">
                                                    <h4 class="panel-title">Data SP2D</h4>
                                                </div>
                                                <div id="collapseOne_2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_2">
                                                    <div class="panel-body">
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <form action="/action_page.php">
                                                            <div class="row">
                                                                <div class="col-15">
                                                                    <label for="kd_bidang">Kode SKPD</label>
                                                                </div>
                                                                <div class="col-70">
                                                                    <select class="form-control">
                                                                        <option></option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-5">
                                                                &nbsp<button type="button" class="btn btn-success" data-toggle="modal" data-target="#cari">....</button>
                                                                </div>
                                                            </div>
                                                            <div class="row ">
                                                                <div class="col-15">
                                                                    <label for="nosp2d">No. SP2D</label>
                                                                </div>
                                                                <div class="col-45">
                                                                    <input class="form-control" type="text" id="nosp2d" name="nosp2d">
                                                                </div>
                                                                <div class="col-15">
                                                                    <label for="tglsp2d">&nbsp&nbspTanggal SP2D</label>
                                                                </div>
                                                                <div class="col-10">
                                                                    <div class="input-daterange" id="bs_datepicker_component_container" style="position: relative;">
                                                                        <input type="text" class="form-control" name="tglsp2d" value="<?php echo date("m/d/Y");?>" >
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-15">
                                                                    <label for="keperluan">Keperluan</label>
                                                                </div>
                                                                <div class="col-70">
                                                                    <input type="text" class="form-control" id="keperluan" name="keperluan">
                                                                </div>
                                                            </div>
                                                            <div class="row ">
                                                                <div class="col-15">
                                                                    <label for="nosp2d">No. SPM</label>
                                                                </div>
                                                                <div class="col-45">
                                                                    <input type="text" class="form-control" id="nosp2d" name="nosp2d">
                                                                </div>
                                                                <div class="col-15">
                                                                    <label for="tglsp2d">&nbsp&nbspTanggal SPM</label>
                                                                </div>
                                                                <div class="col-10">
                                                                    <div class="date" id="bs_datepicker_container" style="position: relative;">
                                                                        <input type="text" class="form-control" name="tglsp2d" value="<?php echo date("m/d/Y");?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-15">
                                                                    <label for="jspm">Jenis SPM</label>
                                                                </div>
                                                                <div class="col-45">
                                                                    <select class="form-control" >
                                                                        <option></option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-15">
                                                                    <label for="tglcari">&nbsp&nbspTanggal Cari</label>
                                                                </div>
                                                                <div class="col-10">
                                                                    <input type="tglcari" class="form-control" name="tglcari" value="<?php echo date("m/d/Y");?>" disabled>
                                                                </div>
                                                            </div>
                                                             <hr>
                                                            <div class="row">
                                                                <div class="col-15">
                                                                    <label for="kota">Bank</label>
                                                                </div>
                                                                <div class="col-70">
                                                                    <select disabled>
                                                                        <option></option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-15">
                                                                    <label for="norek">No. Rekening[F2]</label>
                                                                </div>
                                                                <div class="col-35">
                                                                    <input type="number" class="form-control" id="norek" name="norek">
                                                                </div>
                                                                <div class="col-10" margin-lift="-5" >
                                                                    <label for="nonpwp">&nbsp&nbsp&nbsp NPWP</label>
                                                                </div>
                                                                <div class="col-25">
                                                                    <input type="number" id="nonpwp" value="d" name="nonpwp" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-15">
                                                                    <label for="nmpemilik">Nama Pemilik</label>
                                                                </div>
                                                                <div class="col-70">
                                                                    <input type="number" id="nmpemilik" name="nmpemilik" disabled>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-15">
                                                                    <label for="sd">Sumber Dana</label>
                                                                </div>
                                                                <div class="col-20">
                                                                    <input type="text" class="form-control" id="sd" name="sd">
                                                                </div>
                                                                <div class="col-15" margin-lift="-5" >
                                                                    <label for="nonpwp">&nbsp&nbsp&nbsp No. Rekening</label>
                                                                </div>
                                                                <div class="col-35">
                                                                    <select disabled>
                                                                        <option></option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- MODALS -->
                                                
                                        <div class="modal fade" id="cari" tabindex="-1" role="dialog">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="carisp2d">CARI SP2D</h4>
                                                    </div>
                                                    <div class="body">
                                                        <div class="panel panel-success">
                                                            <div class="panel-heading" role="tab" id="headingOne_2">
                                                                <h4 class="panel-title">Kriteria Pencarian</h4>
                                                            </div>
                                                            <div id="collapseOne_2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_2">
                                                                <div class="panel-body">
                                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                        <form action="/action_page.php">
                                                                        <div class="row ">
                                                                            <div class="input-daterange" id="bs_datepicker_range_container" style="position: relative;">
                                                                                <div class="col-30">
                                                                                    <input name="group5" type="radio" id="radio_tgl" class="with-gap radio-col-green" />
                                                                                    <label for="radio_tgl">Berdasarkan Tgl. Pembukaan SP2D</label>
                                                                                </div>
                                                                                <div class="col-10">
                                                                                    <input type="text" class="form-control" name="tglawal" value="<?php echo date("m/d/Y");?>" >
                                                                                </div>
                                                                                <div class=" col-4">
                                                                                    <label>&nbsp&nbsps/d </label>
                                                                                </div>
                                                                                <div class="col-10">
                                                                                    <input type="text" class="form-control" name="tglakhir" value="<?php echo date("m/d/Y");?>"   >
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row ">
                                                                            <div class="col-30">
                                                                                <input name="group5" type="radio" id="radio_nosp2d" class="with-gap radio-col-green" />
                                                                                <label for="radio_nosp2d">Berdasarkan No.SP2D</label>
                                                                            </div>
                                                                            <div class="col-65">
                                                                                <input type="text" class="form-control" id="no_sp2d" name="no_sp2d">
                                                                            </div>
                                                                        </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-success waves-effect">Cari</button>
                                                                <button type="button" class="btn btn-success waves-effect">Ok</button>
                                                                <button type="button" class="btn btn-success waves-effect" data-dismiss="modal">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="body">
                                                        <!--tabel -->
                                                        <div class="row clearfix">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="panel panel-success">
                                                                    <div class="body">
                                                                        <div class="table-responsive">
                                                                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th >No.SP2D</th>
                                                                                        <th >Tgl.SP2D</th>
                                                                                        <th >No.SPM</th>
                                                                                        <th >Kd.SP2D</th>
                                                                                        <th >Nilai</th>
                                                                                        <th >Nama Bank</th>
                                                                                        <th >Tahun</th>
                                                                                    </tr>
                                                                                </thead>
                                                                            <tbody>
                                                                                           
                                                                            </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="body">
                                            <div class="panel panel-success">
                                                <div class="panel-heading" role="tab" id="headingOne_2">
                                                    <h4 class="panel-title">Nilai Pencairan</h4>
                                                </div>
                                                <div id="collapseOne_2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_2">
                                                    <div class="panel-body">
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <form action="/action_page.php">
                                                                <div class="row">
                                                                    <div class="col-15">
                                                                        <label for="nsp2d">Nilai SP2D</label>
                                                                    </div>
                                                                    <div class="col-25">
                                                                        <input type="text" id="nsp2d" name="nsp2d" pattern="^\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" placeholder=".00" class="text-right">
                                                                    </div>
                                                                    <div class="col-10">
                                                                        <label> </label>
                                                                    </div>
                                                                    <div class="col-10">
                                                                        <label for="np" >Nilai Potongan</label>
                                                                    </div>
                                                                    <div class="col-25">
                                                                        <input type="text" id="np" name="np" placeholder=".00" class="text-right" disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-15">
                                                                        <label for="nt">Nilai Transfer</label>
                                                                    </div>
                                                                    <div class="col-25">
                                                                        <input type="text" id="nt" name="nt" placeholder=".00" class="text-right" disabled>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="profile">
                                       <div class="row clearfix">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="body">
                                                    <div class="panel panel-success">
                                                        <div class="panel-heading" role="tab" id="headingOne_2">
                                                            <h4 class="panel-title">Data Potongan</h4>
                                                        </div>
                                                        <div id="collapseOne_2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_2">
                                                            <div class="panel-body">
                                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                    <form action="/action_page.php">
                                                                        <div class="row">
                                                                            <div class="col-15">
                                                                                <label for="kd_akun">Kode Akun</label>
                                                                            </div>
                                                                            <div class="col-70">
                                                                                <select class="form-control">
                                                                                    <option></option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-15">
                                                                                <label for="np">Nilai Pajak</label>
                                                                            </div>
                                                                            <div class="col-25">
                                                                                <input type="text" id="np" name="np" pattern="^\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" placeholder="1,000,000.00" class="text-right form-control" >
                                                                            </div>
                                                                            <div class="col-10">
                                                                                <label> </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-15">
                                                                                <label for="masa">Masa</label>
                                                                            </div>
                                                                            <div class="col-10">
                                                                                <select class="form-control">
                                                                                    <option></option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-15">
                                                                                <label for="tahun">Tahun</label>
                                                                            </div>
                                                                            <div class="col-5">
                                                                                <input type="text" id="tahun" name="tahun"  value="<?php echo date("Y");?>" disabled>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-success">
                                                    <div class="body">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                                <thead>
                                                                    <tr>
                                                                        <th width="30%">Kode Akun</th>
                                                                        <th width="30%">Nilai Pajak(Rp.)</th>
                                                                        <th width="15%">Masa</th>
                                                                        <th width="15%">Tahun</th>
                                                                        <th width="10%"></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <!--button action -->
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

<script>
    // Jquery Dependency

$("input[data-type='currency']").on({
    keyup: function() {
      formatCurrency($(this));
    },
    blur: function() { 
      formatCurrency($(this), "blur");
    }
});


function formatNumber(n) {
  // format number 1000000 to 1,234,567
  return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}


function formatCurrency(input, blur) {
  // appends $ to value, validates decimal side
  // and puts cursor back in right position.
  
  // get input value
  var input_val = input.val();
  
  // don't validate empty input
  if (input_val === "") { return; }
  
  // original length
  var original_len = input_val.length;

  // initial caret position 
  var caret_pos = input.prop("selectionStart");
    
  // check for decimal
  if (input_val.indexOf(".") >= 0) {

    // get position of first decimal
    // this prevents multiple decimals from
    // being entered
    var decimal_pos = input_val.indexOf(".");

    // split number by decimal point
    var left_side = input_val.substring(0, decimal_pos);
    var right_side = input_val.substring(decimal_pos);

    // add commas to left side of number
    left_side = formatNumber(left_side);

    // validate right side
    right_side = formatNumber(right_side);
    
    // On blur make sure 2 numbers after decimal
    if (blur === "blur") {
      right_side += "00";
    }
    
    // Limit decimal to only 2 digits
    right_side = right_side.substring(0, 2);

    // join number by .
    input_val = left_side + "." + right_side;

  } else {
    // no decimal entered
    // add commas to number
    // remove all non-digits
    input_val = formatNumber(input_val);
    input_val = input_val;
    
    // final formatting
    if (blur === "blur") {
      input_val += ".00";
    }
  }
  
  // send updated string to input
  input.val(input_val);

  // put caret back in the right position
  var updated_len = input_val.length;
  caret_pos = updated_len - original_len + caret_pos;
  input[0].setSelectionRange(caret_pos, caret_pos);
}
</script>
