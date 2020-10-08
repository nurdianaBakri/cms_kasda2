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
              <form id="myForm"> 
                <div class="form_container"> </div> 
                <div class="data_potongan"> </div>
              </form>

              <button type="submit" id="submit" class="btn btn-success waves-effect" disabled="disabled" onclick="save()">
              <i class="material-icons">save</i>  <span>Verifikasi</span>
              </button>

              <button class="btn btn-warning waves-effect" onclick="reset_form()">
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

            // $( document ).ajaxStart(function() {
            //     $('.processing').show();
            // });

            // $(document).ajaxStop(function(){
            //     $('.processing').hide();
            // }); 
        });  
        
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
            console.log(url);
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
                        cek_validasi();
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
        }   

        function alert_confirm2(pesan) {

           $("#exampleModal .modal-body").html(pesan); 
           $("#exampleModal #exampleModalLabel").html("Proses Verifikasi SP2D"); 
           $("#exampleModal").modal(); 

            $("#KD_SKPD").val("");
            $("#NO_SP2D").val("");
            $("#Keterangan").val("");
            $("#No_SPM").val("");   
            $("#TGL_CAIR").val(""); 
            $("#Tgl_SPM").val(""); 
            $("#Tgl_SP2D").val("Y/m/d"); 
            $("#NILAI_TRANSFER").val(""); 
            $("#NILAI_POTONGAN").val(""); 
            $("#NILAI_SP2D").val("");  
            $("#NM_PEMILIK").val(""); 
            $("#NO_REK").val("");
            $('#NPWP').val("");    
            $('#Tgl_SP2D').val("Y/m/d");

            $('.data_potongan').hide(); 
            $('#submit').attr('disabled', 'disabled');  
        } 

         function save() {   
            var url_controller  = $('#url').val(); 
            var url = "<?php echo base_url() ?>"+url_controller+"save";
            console.log(url);
            var data = $("#myForm").serialize();
            console.log(data);
            $.ajax( {
                type: "POST",
                url: url,
                data: data,
                dataType: "html",
                success: function( response ) { 
                    // console.log(response);
                    try{     
                        alert_confirm2(response);
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
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
      
        function open_modal() {
          $('#cari').modal('toggle'); 
        } 

       function verifikasi() {  
        //get kd_kasda 
        var url_controller  = $('#url').val(); 
          var url = "<?php echo base_url() ?>"+url_controller+'save';
          console.log(url);
          var data = $(".form_container").serialize();
          $.ajax( {  
              type: "POST",
              url: url,
              data: data,
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
    </script>  
    <?php 
      $this->load->view('transaksi/pembukaanSP2D/form_cari'); 
    ?>