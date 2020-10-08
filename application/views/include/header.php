
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>CMS KASDA</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon"> 

    <link rel="icon" href="<?php echo base_url()."assets/" ?>favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="<?php echo base_url()."assets/" ?>css-1.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()."assets/" ?>icon.css" rel="stylesheet" type="text/css">
   
    <!-- Bootstrap Core Css --> 
    <link href="<?php echo base_url()."assets/" ?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Waves Effect Css -->

    <!-- <link href="<?php echo base_url()."assets/" ?>plugins/node-waves/waves.css" rel="stylesheet" /> -->
    <!-- Animation Css -->

    <!-- <link href="<?php echo base_url()."assets/" ?>plugins/animate-css/animate.css" rel="stylesheet" /> -->
    <!-- Bootstrap Material Datetime Picker Css -->

    <!-- <link href="<?php echo base_url()."assets/" ?>plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" /> -->
    <!-- Bootstrap DatePicker Css -->

    <!-- <link href="<?php echo base_url()."assets/" ?>plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" /> -->
    <!-- Wait Me Css -->

    <!-- <link href="<?php echo base_url()."assets/" ?>plugins/waitme/waitMe.css" rel="stylesheet" /> -->
    <!-- Bootstrap Select Css -->

    <link href="<?php echo base_url()."assets/" ?>plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <!-- Custom Css -->

    <link href="<?php echo base_url()."assets/" ?>css/style.css" rel="stylesheet">
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url()."assets/" ?>css/themes/all-themes.css" rel="stylesheet" />  

     <!-- Jquery Core Js -->
    <script src="<?php echo base_url()."assets/" ?>plugins/jquery/jquery.min.js"></script>

     <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url()."assets/" ?>plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <!-- <script src="<?php echo base_url()."assets/" ?>plugins/bootstrap-select/js/bootstrap-select.js"></script> -->

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url()."assets/" ?>plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Bootstrap Notify Plugin Js -->
    <!-- <script src="<?php echo base_url()."assets/" ?>plugins/bootstrap-notify/bootstrap-notify.js"></script> -->

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url()."assets/" ?>plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url()."assets/" ?>js/admin.js"></script>
    <script src="<?php echo base_url()."assets/" ?>js/pages/ui/modals.js"></script>

    <!-- Demo Js -->
    <script src="<?php echo base_url()."assets/" ?>js/demo.js"></script>   
        
    <!-- Jquery Validation Plugin Css -->
    <script src="<?php echo base_url()."assets/" ?>plugins/jquery-validation/jquery.validate.js"></script>

    <!-- JQuery Steps Plugin Js -->
    <script src="<?php echo base_url()."assets/" ?>plugins/jquery-steps/jquery.steps.js"></script>

    <!-- Sweet Alert Plugin Js -->
    <script src="<?php echo base_url()."assets/" ?>plugins/sweetalert/sweetalert.min.js"></script> 
 
    <script src="<?php echo base_url()."assets/" ?>js/pages/forms/form-validation.js"></script> 
  
    <!-- Autosize Plugin Js -->
    <script src="<?php echo base_url()."assets/" ?>plugins/autosize/autosize.js"></script>

    <!-- Moment Plugin Js -->
    <script src="<?php echo base_url()."assets/" ?>plugins/momentjs/moment.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="<?php echo base_url()."assets/" ?>plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Bootstrap Datepicker Plugin Js -->
    <script src="<?php echo base_url()."assets/" ?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
 
    <script src="<?php echo base_url()."assets/" ?>js/pages/forms/basic-form-elements.js"></script>   
    <script src="<?php echo base_url()."assets/" ?>sweat_alert/sweetalert2@9.js"></script>
    <script src="<?php echo base_url()."assets/" ?>sweat_alert/sweetalert2.min.js"></script> 
    <script src="<?php echo base_url()."assets/" ?>sweat_alert/promise-polyfill.js"></script> 
    <script src="<?php echo base_url()."assets/" ?>sweat_alert/jspdf.min.js"></script> 

    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/assets_login/" ?>vendor/select2/select2.min.css">
    <script src="<?php echo base_url()."assets/assets_login/" ?>vendor/select2/select2.min.js"></script>
    <!--===============================================================================================--> 

    <!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo base_url()."assets/" ?>plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo base_url()."assets/" ?>plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>

    <script type="text/javascript">
       $(document).ready(function(){     

        /*$( document ).ajaxStart(function() { 
             Swal.fire({
                type: 'info',
                position: 'top-end',
                title: "loading...",
                // showConfirmButton: false,
                showCancelButton: false,
                showConfirmButton: false
                // timer: 1500
            });
        });

        $(document).ajaxStop(function(){
            Swal.close();
        });  */
        // $('select').select2(); 
    });  

    function alert_sukses(pesan) { 
        alert(pesan);
    } 
    </script>
    
</head>

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
   
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <img src="<?php echo base_url('assets/images/bank_ntb.png')?>" width="45" height="45">   
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?php echo base_url() ?>">  CMS KASDA</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse"> 

                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">account_circle</i> 
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header"><?php echo $this->session->userdata('nama'); ?></li>
                            <li class="body">
                                <ul class="menu">
                                    <li>
                                        <a href="<?php echo base_url()."Login/logout" ?>">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">exit_to_app</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Logout</h4> 
                                            </div>
                                        </a>
                                    </li> 
                                </ul>
                            </li> 
                        </ul>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
           
            <!-- Menu --> 
                <?php  $this->load->view('include/menu_2');  ?>  
            <!-- #Menu -->
            <!-- Footer -->

             <!-- #END# Left Sidebar -->
           <!-- right sidebar -->
            <?php $this->load->view('include/right_sidebar')?>
        <!-- #END# right sidebar -->
        
            <div class="legal">
                 <div class="copyright">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="row">
                            <div class="col-25">
                                <label for="kode">Kode Menu</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="kode" name="kodepemda" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->

    </section>