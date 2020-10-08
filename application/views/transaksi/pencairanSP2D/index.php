  
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
                                <!-- <form method="POST" action="<?php echo base_url()."transaksi/Pencairan_sp2d/save" ?>">  -->
                                <form method="POST" id="myForm">  
                                    <div class="form_container"></div>  
                                    <div class="data_potongan"></div>  
                                   
                                </form>    
                                 <button type="submit" id="submit" class="btn btn-success waves-effect" onclick="inputPIN()">
                                        <i class="material-icons">subdirectory_arrow_right</i>  <span>Transaksi</span>
                                </button> 
                                <button class="btn btn-warning waves-effect" id="reset" onclick="reset_form()">
                                    <i class="material-icons">cached</i>  <span>Reset</span>
                                </button> 
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

    <script type="text/javascript">    

        $(document).ready(function(){ 
            get_form();    
            $('.cariByno_sp2d').hide();
        });    

        function show_alert(pesan) {
            Swal.fire({
              position: 'top',
              type: 'error',
              title: 'Oops...',
              text: pesan, 
          });
        } 

        var password_ = ""; 
        /*function button_pencairan() { 

            var url_controller  = $('#url').val(); 
            var url = "<?php echo base_url() ?>"+url_controller+"konfirmKirimSMS";
            console.log(url); 
            $.ajax( {
                type: "POST",
                url: url,
                data: {},
                dataType: "html",
                success: function( response ) { 
                    // console.log(response);
                    try{ 
                          $('#exampleModal2 .modal-body').html(response);
                          $('#exampleModal2 .modal-title').text('Konfirmasi kirim PIN untuk mencairkan SP2D');
                          $('#exampleModal2 .modal-footer').hide();  
                          $('#exampleModal2').modal('show'); 
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );         
        }     */

       /* function kirimSMS() {
            var NO_SP2D  = $('#NO_SP2D').val();  
            var url_controller  = $('#url').val(); 
            var url = "<?php echo base_url() ?>"+url_controller+"kirimSMS";
            // console.log(url); 
            console.log(NO_SP2D); 
            $.ajax( {
                type: "POST",
                url: url,
                data: {
                    NO_SP2D : NO_SP2D  
                },
                dataType: "html",
                success: function( response ) { 
                    console.log(response);
                    try{ 

                        //check apakah balikan HTML login apa tidak 
                        if(response.match(/\<!DOCTYPE.+\>/)) {
                           alert("Ada sudah habis, silahkan login kembali");
                        }
                        else
                        { 
                           inputPIN();
                        }
                        
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );
        }*/

        function inputPIN() {
            var url_controller  = $('#url').val(); 
            var url = "<?php echo base_url() ?>"+url_controller+"form_konfimasi_pencairan";
            console.log(url); 
            $.ajax( {
                type: "POST",
                url: url,
                data: {},
                dataType: "html",
                success: function( response ) { 
                    // console.log(response);
                    try{ 
                          $('#exampleModal2 .modal-body').html(response);
                          $('#exampleModal2 .modal-title').text('Masukkan PIN pencairan untuk mencairkan SP2D');
                          $('#exampleModal2 .modal-footer').hide();  
                          $('#exampleModal2').modal('show'); 
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );      
        }

        function konfirmasi() { 
            password_ =  $('#password_user').val();
            var KD_KASDA  = $('#KD_KASDA').val();  
            var NO_SP2D  = $('#NO_SP2D').val();   
            //check apakah password sama apa ndak
            var url_controller  = $('#url').val();  
            var url = "<?php echo base_url() ?>"+url_controller+"save";
            console.log(url); 
            $.ajax( {
                type: "POST",
                url: url,
                data: {
                    password_ : password_,
                    NO_SP2D : NO_SP2D,
                    KD_KASDA : KD_KASDA
                },
                dataType: "json",
                success: function( response ) { 
                    console.log(response);
                    try{ 
                        if (response.status==true)
                        {
                            $('#exampleModal2 .modal-body').text(response.pesan+". Print bukti pencairan ?");
                        }
                        else
                        {
                            $('#exampleModal2 .modal-body').text(response.pesan);
                        }   
                        $('#exampleModal2 .modal-title').text('Proses pencairan SP2D');
                        $('#exampleModal2').modal('show'); 
                         // alert_confirm(response);
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
        }

         function get_form() {   
            var url_controller  = $('#url').val(); 
            var url = "<?php echo base_url() ?>"+url_controller+"get_form";
            console.log(url);
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
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  

            dissable_button();
        }  


         function print_buktiPencairan() {
            var NO_SP2D = $("#NO_SP2D").val();   
            var url_controller  = $('#url').val();  

            // var res = NO_SP2D.replace("/", "_"); 
            var res = NO_SP2D.replace(/\//g, '_');
            var url = "<?php echo base_url() ?>"+url_controller+"buktiPencairan/"+res;
            console.log(url);
            var win = window.open(url, '_blank');  
        }  

        function get_rek_by_reksumber() {  
          //get kd_kasda 
          var url_controller  = $('#url').val(); 
          var KD_SUMBER_DANA = $('#KD_SUMBER_DANA').val();
            var url = "<?php echo base_url() ?>"+url_controller+'get_rek_by_reksumber/'+KD_SUMBER_DANA;
            console.log(url);
            $.ajax( {  
                type: "POST",
                url: url,
                data: {},
                dataType: "html",
                success: function( response ) {   
                  try{    
                    $('#NO_REK_BYkdSumberDana').html(response); 
                  }catch(e) {  
                    alert('Exception while request..');
                  }  
                }
            } );    
        }    

        function dissable_button() {
          //If there is text in the input, then enable the button
            $('#submit').prop('disabled', true);
            $('#reset').prop('disabled', true);  
        }
 
        function open_modal() {
          $('#cari').modal('toggle'); 
        }  
    </script> 

      <!-- Modal -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> 
              </div>
              <div class="modal-body">
                ...
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="print_buktiPencairan()"  >Ya</button> 
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button> 
              </div>
            </div>
          </div>
        </div>

    <?php 
      $this->load->view('transaksi/pembukaanSP2D/form_cari'); 
    ?>