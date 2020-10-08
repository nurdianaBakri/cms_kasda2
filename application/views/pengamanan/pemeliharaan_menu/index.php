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
                            
                            <div class="panel panel-success">  
                                <div class="panel-body form_container">   </div>  
                            </div> 
                        <p id="loading">Loading...</p>  
                        <div class="row clearfix ">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table_container" id="table_container">
                                
                            </div>
                        </div> 
                </div>
            </div>
        </div>
    </section>  
    
     <script src="<?php echo base_url()."assets/" ?>fungsi/fgs_pemUser.js"></script> 

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
    $( document ).ready(function() {  
        $('#loading').hide();  
        get_form();

        reload_data(); 
    }); 

     function get_form() {  
       
        var url_controller  = $('#url').val(); 
        var url = "<?php echo base_url() ?>"+url_controller+"get_form";
            console.log(url);
        $.ajax( {
            type: "POST",
            url: url,
            data:{ },
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

    function detail(id_menu) {  
        $('#jenis_aksi').val('update');
        var url_controller  = $('#url').val(); 
        var url = "<?php echo base_url() ?>"+url_controller+"detail";
            console.log(url);
        $.ajax( {
            type: "POST",
            url: url,
            data:{
                id_menu:id_menu
            },
            dataType: "Json",
            success: function( response ) { 
                try{      
                    $('#id_menu_old').val(response.id_menu);
                    $('#id_menu').val(response.id_menu);
                    $('#menu_name').val(response.menu_name);
                    $('#class_name').val(response.class_name); 
                    $("#level_menu").val(response.level_menu); 
                    get_perent_menu(response.level_menu, response.parent_menu); 

                }catch(e) {  
                    alert('Exception while request..');
                }  
            }
        } );   
    }  

    function get_perent_menu(level_menu, id_parent) { 
        var url_controller  = $('#url').val(); 
        var url = "<?php echo base_url() ?>"+url_controller+"get_perent_menu/"+level_menu+'/'+id_parent;
            console.log(url);
        $.ajax( {
            type: "POST",
            url: url,
            data:{ },
            dataType: "html",
            success: function( response ) { 
                try{      
                    $('.parent_menu').html(response); 
                }catch(e) {  
                    alert('Exception while request..');
                }  
            }
        } );   
    }

    function level_menu() { 
        var url_controller  = $('#url').val(); 
        var url = "<?php echo base_url() ?>"+url_controller+"get_level_menu";
            console.log(url);
        $.ajax( {
            type: "POST",
            url: url,
            data:{ },
            dataType: "html",
            success: function( response ) { 
                try{      
                    $('.level_menu').html(response); 
                }catch(e) {  
                    alert('Exception while request..');
                }  
            }
        } );   
    }

    function reset() {  
        get_perent_menu(0,null); 
        $('#jenis_aksi').val('tambah');
        $('#id_menu').val(null);
        $('#menu_name').val(null);
        $('#class_name').val(null); 
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
                console.log(response); 
                $('#loading').hide();   
                try{     
                    reset();
                    //aktifkan tombol print 
                    $(".button_print").removeAttr("disabled");   
                    // $('.panel-heading').text(response.pesan);  

                    alert_sukses(response.pesan);  
                    reload_data();

                }catch(e) {  
                    alert('Exception while request..');
                }  
            }
        } );  
    }      

    function hapus() {
        $('#loading').show(); 
        $('.table_container').hide();  

        var url_controller  = $('#url').val();
        var data = $('#myForm').serialize();
        var url = "<?php echo base_url() ?>"+url_controller+"hapus";
         
        $.ajax( {
            type: "POST",
            url: url,
            data:data,
            dataType: "Json",
            success: function( response ) {   
                console.log(response); 
                $('#loading').hide();   
                try{     
                    //aktifkan tombol print 
                    reset();
                    
                    $(".button_print").removeAttr("disabled");   
                    $('.panel-heading').text(response.pesan);  
                    reload_data();

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
        console.log(url); 
        
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
    }      
 
    </script>