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
    <section class="content">
        <div class="container-fluid">
            <!-- CPU Usage -->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>Gateway Server</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                <div class="body">
                                    <div class="panel panel-success">
                                        <div class="panel-heading" role="tab" id="headingOne_2">
                                            <h4 class="panel-title">
                                                Informasi Import
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
                                                                <div class="col-25">
                                                                    <label>&nbsp&nbsp&nbsp&nbsp&nbspJumlah Transaksi</label>
                                                                </div>
                                                                <div class="col-10">
                                                                    <input type="text" name="jml_transaksi" disabled>
                                                                </div>
                                                                <div class="col-25">
                                                                    <label>&nbsp&nbsp&nbsp&nbspTotal Transaksi</label>
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
                                                Informasi Hasil Import
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end cpu usage-->
                        
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
