
    <section class="content">
        <div class="container-fluid">
            <!-- CPU Usage -->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>PEMELIHARAAN REK SUMBER</h2> 
                                </div>

                                 <button class="btn pull-right btn-success" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Tambah Rek. Sumber</button>
                            </div>

                        </div>
                        <div class="body"> 

                            <div class="row clearfix"> 
                                    <div class="panel panel-success">
                                        <div class="body">

                                            <input type="hidden" name="url" id="url" value="<?= $url ?>"> 
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

                                            <div class="table-responsive table_container">
                                                
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


<script src="<?php echo base_url()."assets/" ?>fungsi/fgs_pemeluharaaanRekSumber.js"></script> 

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

         function get_form() { 
            var url = "<?php echo base_url() ?>"+"/parameterrekeningbank/Rekening_sumber/get_form";
            $.ajax( {
                type: "POST",
                url: url,
                data: {  },
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
          
        function update_and_save()
        {    
          var data  = $("#myForm").serialize(); 
          var url = "<?php echo base_url() ?>"+'/parameterrekeningbank/Rekening_sumber/save';
           $.ajax( {  
                type: "POST",
                url: url,
                data: data,
                success: function( response ) {  
                    try{  
                        // $("#largeModal").modal('hide'); 
                        var obj = jQuery.parseJSON(response);
                        // alert( obj['pesan']);  
                        $('.modal-body').text( obj['pesan']); 
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
            var data  = $("#myForm").serialize(); 
            var url = "<?php echo base_url() ?>"+'/parameterrekeningbank/Rekening_sumber/hapus'; 
              $.ajax( {
                type: "POST",
                url: url,
                data: data,
                dataType: "json",
                success: function( response ) { 
                    try{      
                        console.log(response.pesan);
                        $('.modal-body').text(response.pesan);
                        $('.modal-footer').show();
                         $('#largeModal').modal({
                            backdrop: 'static',
                            keyboard: false
                        }); 

                         //reload tabel
                        reload_data(); 
                        get_form();

                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
        }   
 
    </script>
 
