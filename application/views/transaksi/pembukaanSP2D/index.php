  
    <section class="content">
        <div class="container-fluid">
            <!-- CPU Usage -->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2><?PHP echo $title; ?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="body">   
                            <?php if ($this->session->flashdata('pesan')!="")
                            {
                                echo $this->session->flashdata('pesan');
                            } ?>

                            <input type="hidden" name="url" value="<?php echo $url ?>" id="url">

                          <?php  $kd_kasda = $this->session->userdata('KD_KASDA'); ?>   
                          <input type="hidden" id="kd_kasda" name="kd_kasda" value="<?php echo $kd_kasda ?>" > 
                            
                            <div class="panel ">
                                <form method="POST" action="<?php echo base_url()."transaksi/Pembukaan_sp2d/save" ?>"> 

                                <div class="form_container"></div>  
                                <div class="data_potongan"></div>  

                                <button type="submit" id="submit" class="btn btn-success waves-effect" disabled>
                                  <i class="material-icons saveupdate">save</i>  <span>save</span>
                                </button> 
                              </form>  
                            </div> 

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>   


    <link href="<?= base_url()."assets/select2/" ?>select2.min.css" rel="stylesheet" />
    <script src="<?= base_url()."assets/select2/" ?>select2.min.js"></script>  
    <script type="text/javascript" src="<?= base_url()."assets/autoNumeric/" ?>autoNumeric.js"></script>  

    <?php  $this->load->view('transaksi/pencairanSP2D/cari_skpd_by_kdskpd');  ?>  
    <?php  $this->load->view('transaksi/get_bank_penerima');  ?>  
      
    <script type="text/javascript">   

        $(document).ready(function(){ 
            get_form();    
            $('.cariByno_sp2d').hide();   
        });   
 
         function get_form() {   
            var url_controller  = $('#url').val(); 
            var url = "<?php echo base_url() ?>"+url_controller+"get_form";
            // console.log(url);
            $.ajax( {
                type: "POST",
                url: url,
                data: {  },
                dataType: "html",
                success: function( response ) { 
                    try{   
                        $('.form_container').html(response); 
                        get_kd_skpd();  
                        // get_bank_penerima();  
                        get_rek_by_reksumber();
                        $('.loading').hide(); 
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
        }     

        function get_kd_skpd() {
            var NO_SP2D = $("#NO_SP2D").val();   
            var url_controller  = $('#url').val(); 
            var url = "<?php echo base_url() ?>"+url_controller+"get_kd_skpd";
            // console.log(url);
            $.ajax( {
                type: "POST",
                url: url,
                data: { 
                  No_SP2D : NO_SP2D,
                },
                dataType: "html",
                success: function( response ) { 
                    try{   
                        $('.KD_SKPD').html(response);
                        get_potongan(); 
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
        } 

          $('#NO_SP2D').keypress(function(event){ 
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if(keycode == '13'){ 
              cek_no_sp2d();
              get_potongan(); 
            } 
          }); 



        function get_rek_by_reksumber() {  
          //get kd_kasda 
          var url_controller  = $('#url').val(); 
          var KD_SUMBER_DANA = $('#KD_SUMBER_DANA').val();
            var url = "<?php echo base_url() ?>"+url_controller+'get_rek_by_reksumber/'+KD_SUMBER_DANA;
            // console.log(url);
            $.ajax( {  
                type: "POST",
                url: url,
                data: {},
                dataType: "html",
                success: function( response ) {   
                    // console.log(response);
                    try{    
                        $('#NO_REK_BYkdSumberDana').html(response); 
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );    
        }     

        function open_modal() {
          $('#cari').modal('toggle'); 
        }  
    </script>


    <?php 
      $this->load->view('transaksi/pembukaanSP2D/form_cari'); 
    ?>
