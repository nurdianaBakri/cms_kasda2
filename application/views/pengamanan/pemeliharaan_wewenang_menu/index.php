 

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
                            
                            <div class="panel panel-success "> 

                                <div class="panel-heading"> </div>
                                <div class="panel-body form_container">   
                                 
                            </div>  
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

    <script>  
    $( document ).ready(function() {  
        $('#loading').hide(); 

        //get value dari kd wewenang  
        get_form(); 
    }); 

    function get_form() {     

        var url_controller  = $('#url').val(); 
        var url = "<?php echo base_url() ?>"+url_controller+"get_form";
        console.log(url); 
        
        $.ajax( {
            type: "POST",
            url: url,
            data:{},
            dataType: "html",
            success: function( response ) {   
                // console.log(response);  
                try{     
                   $('.form_container').html(response);
                }catch(e) {  
                    alert('Exception while request..');
                }  
            }
        } );  
    }      

    function detail(kd_wewenang) {  

        $('#kd_wewenang_old').val(kd_wewenang);

        $('#jenis_aksi').val('update');
        var url_controller  = $('#url').val(); 
        var url = "<?php echo base_url() ?>"+url_controller+"detail";
            console.log(url);
        $.ajax( {
            type: "POST",
            url: url,
            data:{
                kd_wewenang:kd_wewenang
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
        var data = $('#myForm2').serialize();
        var url = "<?php echo base_url() ?>"+url_controller+"save";
        console.log(url); 
        
        $.ajax( {
            type: "POST",
            url: url,
            data:data,
            dataType: "json",
            success: function( response ) {   
                console.log(response); 
                $('#loading').hide();   
                try{     
                    // aktifkan tombol print  
                    reload_data(); 
                    alert(response.pesan);  
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

      
    function get_wewenang() {     

        var url_controller  = $('#url').val();
        var data = $('#myForm').serialize();
        var url = "<?php echo base_url() ?>"+url_controller+"get_wewenang";
        console.log(url); 
        
        $.ajax( {
            type: "POST",
            url: url,
            data:data,
            dataType: "html",
            success: function( response ) {   
               
                console.log(response);
                try{     
                    //aktifkan tombol print  
                    $('.kd_wewenang').html(response); 

                }catch(e) {  
                    alert('Exception while request..');
                }  
            }
        } );  
    }      
 
    </script>