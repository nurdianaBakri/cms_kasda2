
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

                                  <button class="btn pull-right btn-success" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Tambah Rek. SKPD</button>
                            </div>
                        </div>
                        <div class="body">

                            <input type="hidden" name="url" value="<?php echo $url ?>" id="url">
                            <form action="#" id="form1" class="form-horizontal">
                                
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">FILTER KODE KASDA</label>
                                        <div class="col-md-9">
                                            <select class="form-control" id="KD_KASDA" name="KD_KASDA" style="width: 100%" onchange="reload_data()">
                                                <?php foreach ($kasda as $kasda): ?>
                                                <option value="<?php echo $kasda->KD_KASDA ?>"><?php echo $kasda->KD_KASDA." - ".$kasda->NM_KASDA ?></option>
                                                <?php endforeach ?> ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </form>


                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="panel panel-success">
                                        <div class="body">
                                            <div class="table-responsive">
                                                
                                            </div>   
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 

    <script src="<?php echo base_url()."assets/" ?>fungsi/fgs_pemeliharaaanRekSKPD.js"></script> 

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



 



    <script type="text/javascript">   

        /*$(document).ready(function(){ 
            get_form();   
            reload_data();  
             $('select').select2();   
        }); */

         /*function reload_data() { 
            var url_controller  = $('#url').val();
            var data = $('#myForm').serialize();
            var url = "<?php echo base_url() ?>"+url_controller+"/reload_data";
            console.log(url);
            $.ajax( {
                type: "POST",
                url: url,
                data:data,
                dataType: "html",
                success: function( response ) { 
                    try{   
                        $('.table-responsive').html(response); 
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
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
        }     
 
        function update_and_save()
        {    
          var url_controller  = $('#url').val();   
          var data  = $("#myForm").serialize();
          var url = "<?php echo base_url() ?>"+url_controller+'save'; 
          console.log(data); 
           $.ajax( {  
                type: "POST",
                url: url,
                data: data,
                success: function( response ) {   
                    console.log(response);
                    try{    
                        var obj = jQuery.parseJSON(response);  
                        //SHOOW MODAL 
                         $('.modal-body').text(obj.pesan);
                        $('.modal-footer').show();
                         $('#largeModal').modal({
                            backdrop: 'static',
                            keyboard: false
                        }); 

                        reload_data();
                        get_form();   
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
        } 

         function hapus() { 
            var url_controller  = $('#url').val();    
            var data  = $("#myForm").serialize(); 
            var url = "<?php echo base_url() ?>"+url_controller+'/hapus/'; 
            console.log(data);
              $.ajax( {
                type: "POST",
                url: url,
                data: data,
                dataType: "json",
                success: function( response ) {   
                    try{      
                        // var obj = jQuery.parseJSON(response);  
                        // console.log(obj.pesan); 
                        $('.modal-body').text(response.pesan);
                        $('.modal-footer').show();
                         $('#largeModal').modal({
                            backdrop: 'static',
                            keyboard: false
                        });  
                         //reload tabel
                        get_form();    
                        reload_data(); 
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
        }  

        function edit(primary) {  
            $('.modal-footer').hide();
            var url_controller  = $('#url').val();   

            //GET DATA DARI DATABASE 
            var data  = $("#myForm").serialize(); 
            var url ="<?php echo base_url()?>"+url_controller+"/detail"; 
            console.log(url);
             $.ajax( {
                type: "POST",
                url: url,
                data: {KD_DATA : primary},
                success: function( response ) { 
 
                    try{   
                        //masukkan form ke modal 
                        $(".form_container").html(response); 
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
        }*/
    </script>
 
