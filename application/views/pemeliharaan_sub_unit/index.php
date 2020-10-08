
    <section class="content">  
        <div class="container-fluid">
            <!-- CPU Usage -->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>PEMELIHARAAN SUB UNIT</h2>
                                </div>
                                 <!-- <button type="button" class="btn btn-success waves-effect"  style="position: absolute; right: 10px; top: 5px;" onclick="edit('')">
                                        <i class="material-icons">add_circle</i>
                                        <span>Sub Unit</span>
                                </button>  -->
                            </div>
                        </div>
                        <div class="body">

                            <div class="form_container"></div>
                            
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="table-responsive">
                                        
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>   

    <script type="text/javascript">   

        $(document).ready(function(){ 
            get_form();   
        });  
        
        function get_form() { 
            var url = "<?php echo base_url() ?>"+"/parameterorganisasi/PemeliharaanSubUnit/form";
            $.ajax( {
                type: "POST",
                url: url,
                data: {  },
                dataType: "html",
                success: function( response ) {  
                    try{   
                        $('.form_container').html(response);   
                        reload_data();
                    }catch(e) {   
                        alert('Exception while request..');
                    }  
                }
            } );  
        }  

         function reload_data() { 
            var url = "<?php echo base_url() ?>"+"/parameterorganisasi/PemeliharaanSubUnit/reload_data"; 
            var KD_KASDA =$('#KD_KASDA').val();
            console.log(KD_KASDA);
            $.ajax( {
                type: "POST",
                url: url,
                data: {
                    KD_KASDA:KD_KASDA
                  },
                dataType: "html",
                success: function( response ) { 
                    // console.log(response); 

                    $('#KD_SUB_UNIT').val('');  
                    $('#NM_SUB_UNIT').val('');  

                    get_unit();
                    try{   
                        $('.table-responsive').html(response); 
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
        }    
         
 
        function update_and_save()
        {    
          var data  = $("#myForm").serialize(); 
          var url = "<?php echo base_url() ?>"+'/parameterorganisasi/PemeliharaanSubUnit/save';
          console.log(data);
           $.ajax( {  
                type: "POST",
                url: url,
                data: data,
                success: function( response ) {  
                    console.log(response);
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
                         
                        //reload tabel
                        reload_data();
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
        } 

          function hapus(primary) {   
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
                do_hapus(primary);
            } 
          }) 
        }   
        

         function do_hapus(primary) {  
            var url = "<?php echo base_url() ?>"+'/parameterorganisasi/PemeliharaanSubUnit/hapus/'+primary; 
              $.ajax( {
                type: "POST",
                url: url,
                data: {  },
                dataType: "json",
                success: function( response ) { 
                    try{      
                        // console.log(response.pesan);
                        $('.modal-body').text(response.pesan);
                        $('.modal-footer').show(); 
                         $('#largeModal').modal({
                            backdrop: 'static',
                            keyboard: false
                        }); 

                         //reload tabel
                        reload_data(); 
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
        }  

        function edit(primary) {   

        //GET DATA DARI DATABASE
        var url ="<?php echo base_url()."parameterorganisasi/PemeliharaanSubUnit/detail/" ?>"+primary; 
        console.log(url);
         $.ajax( {
            type: "POST",
            url: url,
            dataType: "Json",
            data: { },
            success: function( response ) {    
                console.log(response);
                try{       
                    $('#KD_URUSAN').val(response.KD_URUSAN).trigger('change');  
                 
                    $('#KD_BIDANG_OLD').val(response.KD_BIDANG); 
                    $('#KD_UNIT_OLD').val(response.KD_UNIT);  

                    $('#KD_SUB_UNIT').val(response.KD_SUB_UNIT);  
                    $('#NM_SUB_UNIT').val(response.NM_SUB_UNIT);  
                    $('#KD_DATA_SUB_UNIT').val(response.KD_DATA_SUB_UNIT);  
                    $('#jenis_aksi').val(response.jenis_aksi);   

                }catch(e) {  
                    alert('Exception while request..');
                }  
            }
        } );  
    } 
    </script>
 
