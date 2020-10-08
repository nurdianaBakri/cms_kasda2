  
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

                                <form method="POST" action="<?php echo base_url()."transaksi/Koreksi_verifikasi/save" ?>">  
                                    <div class="processing"> 
                                        Sedang Mengimport
                                    </div> 
                                    <div class="form_container"></div>   
                                </form>    

                                <button type="submit" id="submit" class="btn btn-success waves-effect" onclick="start_inport()" >
                                  <i class="material-icons">play_arrow</i>  <span>Start</span>
                                </button> 
                                <button class="btn btn-info waves-effect" onclick="reset_form()" disabled>
                                  <i class="material-icons">cached</i>  <span>Refresh</span>
                                </button> 

                            </div> 

                        </div>
                    </div>
                </div>
            </div>

            <a href="http://localhost/cms_kasda/Gateway_server/index/<?php ?>"></a>
        </div>
    </section>    
       
    <script type="text/javascript">   

          $(document).ready(function(){ 
            get_form();    
            $('.processing').hide(); 
            // $('.alert_selesai_import').hide();

        });  

        function reset_form(){
            $('.input-visible').val(""); 
        }    
 

        function input_trx_spm(data, i, length) {   

            console.log(data);

            setTimeout(function(){  

                var url_controller  = $('#url').val();   
                    var url = "<?php echo base_url() ?>"+url_controller+"input_trx_spm";
                    console.log(url);     

                    $.ajax( {
                        type: "POST",
                        url: url,
                        data: data,
                        async: true, 
                        dataType: "json",
                        success: function( response_data ) {   
                            console.log(response_data); 
                            if (response_data.status==true) 
                            {    
                                var berhasil_diImport1= $('#berhasil_diImport').val();
                                berhasil_diImport = Number(berhasil_diImport1) + 1;
                                $('#berhasil_diImport').val(berhasil_diImport); 
                            }
                            else
                            {
                                //rekening tidak valid
                                var gagal_diImport= $('#gagal_diImport').val();
                                gagal_diImport =Number(gagal_diImport) + 1;
                                $('#gagal_diImport').val(gagal_diImport); 
                            }  
                            
                            // tanggal terakhir input 
                            var tgldanjam = data.trx.DateCreate;   

                            var tgl_terakhir_import = tgldanjam.substring(0, 10);
                            $('#tgl_terakhir_import').val(tgl_terakhir_import);   

                            var jam_terakhir_import = tgldanjam.substring(11,19);
                            $('#jam_terakhir_import').val(jam_terakhir_import); 

                            if (length==i) 
                            {
                                $('.loading').hide();  
                                alert("Proses import SPM berhasil");
                            } 

                            return 1;  
                        }, 
                        error: function(error) {
                            console.log(error); 
                        }
                    } ); 

            }, i*5000); 
            
        } 

        function start_inport() {
            var jmlresponL=0;

            $('.loading').show();  
            // attr() method applied here 
            $("#submit").prop('disabled', true); 

            var url_controller  = $('#url').val();  
            var url = "<?php echo base_url() ?>"+url_controller+"start_inport";
            console.log(url);
 
            //reset 
            reset_form();  
            $.ajax( {
                type: "POST",
                url: url,
                async: true,
                data: {  },
                dataType: "json",
                success: function(response) {    
                    console.log(response);  
                    $('#tgl_terakhir_import').val(response.tgl_terakhir_import); 
                    $('#jam_terakhir_import').val(response.jam_terakhir_import); 
                     
                    var rtx2 = response.balikan_server;  
                    if (rtx2==null)
                    {
                        $('.loading').hide();    
                        alert('Data sudah yang terbaru, tidak perlu mengimport data');
                    }  
                    else { 
                        //set jumlah data 
                        $('#jmlData').val(rtx2.length);   
                        $('#gagal_diImport').val(0); 

                        var i; 
                        var kl; 
                        var iMin1 = rtx2.length-1;  
                        for (i = 0; i < rtx2.length; ++i)
                        {   
                            console.log(rtx2[i]); 
                            input_trx_spm(rtx2[i], i, rtx2.length-1); 
                        } 
                                 
                    } 
                }, 
                error: function(error) {
                    console.log(error); 
                }
            } );  

            reset_form(); 
            $("#submit").prop('disabled', false);  
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
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
              $('.loading').hide(); 

        }     
    </script> 