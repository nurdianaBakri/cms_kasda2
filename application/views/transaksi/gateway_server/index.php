 <style type="text/css">
   .responsive {
      width: 5%;
      height: auto;
    }
 </style>
 
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
                                    <div class="form_container"></div>   

                                    <div class="row">   
                                     <div class="col-md-12">
                                        <img src="<?= base_url()."assets/loading.gif" ?>" alt="Nature" class="responsive" width="200" height="100">
                                     </div>
                                   </div>

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

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script> 
       
    <script type="text/javascript">   

        $(document).ready(function(){ 
            get_form();
            $('.responsive').hide();  
        });   

        function reset_form(){
            $('.input-visible').val(""); 
        }    

        function input_penguji2(data) { 
            var url_controller  = $('#url').val();   
            var url = "<?php echo base_url() ?>"+url_controller+"do_import_tmp_penguji";
            console.log(url);    
            console.log("data dari get import : ");    
            console.log(data);    

            $.ajax( {
                type: "POST",
                url: url,
                data: data,
                dataType: "json",
                success: function( response_data ) { 

                    $('.responsive').show();
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

                    $('.responsive').hide(); 
                },
                error: function(error) {
                    console.log(error); 
                }
            } ); 
        }

        function start_inport() {
            var url_controller  = $('#url').val();  
            var url = "<?php echo base_url() ?>"+url_controller+"start_inport";
            console.log(url);

            $('#gagal_diImport').val(0);
            $('#berhasil_diImport').val(0);
            $('#jmlData').val(0);

            $.ajax( {
                type: "POST",
                url: url,
                data: {  },
                dataType: "json",
                success: function(response) {    
                    $('#tgl_terakhir_import').val(response.tgl_terakhir_import); 
                    $('#jam_terakhir_import').val(response.jam_terakhir_import); 
                     
                    var rtx2 = response.balikan_server;   
                    console.log( response);     
                    var jumlah_hasil = response.balikan_server.length;
                    if (rtx2==null)
                    {  
                        alert("Data sudah yang terbaru, tidak perlu mengimport data"); 
                    }  
                    else 
                    {
                        //set jumlah data 
                        $('#jmlData').val(jumlah_hasil);   

                        var i;   
                        for (i = 0; i < jumlah_hasil; ++i) {  
                            input_penguji2(rtx2[i]); 
                        } 
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
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
        }     
    </script> 