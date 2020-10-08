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
                                    <button class="btn pull-right btn-success" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Tambah Wewenang</button>
                                </div>
                        </div>
                        <div class="body">   
                            <?php if ($this->session->flashdata('pesan')!="")
                            {
                                echo $this->session->flashdata('pesan');
                            } ?> 
                            <input type="hidden" name="url" value="<?php echo $url ?>" id="url">
                             
                        <div class="row clearfix ">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table_container" id="table_container">
                                
                            </div>
                        </div> 
                </div>
            </div>
        </div>
    </section>  


    <script src="<?php echo base_url()."assets/" ?>fungsi/fgs_pemWewenang.js"></script> 

    <!-- Bootstrap modal -->
    <div class="modal fade" id="modal_form" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title">Form Cabang</h3>
                </div>
                <div class="modal-body form_container"> 
                    
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnSave" onclick="save()" class="btn btn-success">Save</button>
                    <button type="button" class="btn btn-danger" onclick="reset_button()" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script>  
    /*$( document ).ready(function() {  
        $('#loading').hide(); 
        reload_data(); 
    }); 

    function detail(kd_wewenang) {    
        $('#kd_wewenang_old').val(kd_wewenang);

        $('#jenis_aksi').val('update');
        var url_controller  = $('#url').val(); 
        var url = "<?php echo base_url() ?>"+url_controller+"detail/"+kd_wewenang;
            // console.log(url);
        $.ajax( {
            type: "POST",
            url: url,
            data:{ 
            },
            dataType: "Json",
            success: function( response ) { 
                // console.log(response);
                try{      
                    $('#kd_wewenang').val(response.kd_wewenang);
                    $('#nama_wewenang').val(response.nama_wewenang); 
                }catch(e) {  
                    alert('Exception while request..');
                }  
            }
        } );   
    }    

   
    function hapus() {    
 
        var url_controller  = $('#url').val(); 
        var url = "<?php echo base_url() ?>"+url_controller+"hapus";
            console.log(url);
        var data = $('#myForm').serialize();

        if ($('#kd_wewenang').val()=="")
        {
            alert("Kode wewenang harus ada, jika ingin menghapus data");
        }
        else
        {
            Swal.fire({
                position: 'top',
                title: 'Informasi',
                text: "Yakin ingin menghapus data ?",
                type: 'success',
                showCancelButton: true,
                confirmButtonColor: '#1f7d50',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',

              }).then((result) => {  
                if (result.value) {   
                    do_hapus();
                } 
              }) 
        } 
    }    

    function do_delete() {
        // body...
        $.ajax( {
            type: "POST",
            url: url,
            data:data,
            dataType: "Json",
            success: function( response ) {  
                try{      
                    $('.panel-heading').text(response.pesan);   
                    reload_data();
                    reset();
                }catch(e) {  
                    alert('Exception while request..');
                }  
            }
        } );   
    }

    function reset() {   
        $('#jenis_aksi').val('tambah');
        $('#kd_wewenang').val(null);
        $('#nama_wewenang').val(null); 
    }  

    function save() {   
        $('#loading').show(); 
        $('.table_container').hide();  

        var url_controller  = $('#url').val();
        var data = $('#myForm').serialize();
        var url = "<?php echo base_url() ?>"+url_controller+"save";
        console.log(url); 
        
        $.ajax( {
            type: "POST",
            url: url,
            data:data,
            dataType: "Json",
            success: function( response ) {   
                // console.log(response); 
                $('#loading').hide();   
                try{     
                    //aktifkan tombol print  
                    $('.panel-heading').text(response.pesan);  
                    reload_data();
                    reset(); 
                }catch(e) {  
                    alert('Exception while request..');
                }  
            }
        } );  
    }      
      
    function reload_data() {   
        $('#loading').show(); 
        $('.table_container').hide();  

        var url_controller  = $('#url').val();
        var data = $('#myForm').serialize();
        var url = "<?php echo base_url() ?>"+url_controller+"reload_data";
        // console.log(url); 
        
        $.ajax( {
            type: "POST",
            url: url,
            data:data,
            dataType: "html",
            success: function( response ) {   
                $('#loading').hide(); 
                $('.table_container').show();  
                // console.log(response);
                try{     
                    //aktifkan tombol print 
                    $(".button_print").removeAttr("disabled");   
                    $('.table_container').html(response); 

                }catch(e) {  
                    alert('Exception while request..');
                }  
            }
        } );  
    }      */
 
    </script>