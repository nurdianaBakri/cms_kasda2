    <script type="text/javascript">

          $(document).ready(function(){
                reload_data();
            });


        function edit(KD_URUSAN) {  
            $('.modal-footer').hide();  

            //GET DATA DARI DATABASE
            var url ="<?php echo base_url()."parameterorganisasi/PemeliharaanUrusan/detail/" ?>"+KD_URUSAN;
            console.log(url);

             $.ajax( {
                type: "POST",
                url: url,
                data: { },
                success: function( response ) {
                    try{   
                        //masukkan form ke modal 
                        $(".modal-body").html(response);
                        if (KD_URUSAN!=""){
                            $('.modal-title').text("Detail Data Urusan");
                        }
                        else
                        {
                            $('.modal-title').text("Tambah Data Urusan"); 
                        }

                        $('#largeModal').modal({
                            backdrop: 'static',
                            keyboard: false
                        }); 
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } ); 

        }

    function update_and_save()
    {   
        var url = "<?php echo base_url() ?>"+'/parameterorganisasi/PemeliharaanUrusan/save'; 
        var data  = $("#myForm").serialize(); 
        // console.log(data);
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

                    //reload tabel
                    reload_data();
                }catch(e) {  
                    alert('Exception while request..');
                }  
            }
        } );   
    }  


    function reload_data() {
        $.ajax( {
            type: "POST",
            url: "<?php echo base_url()."parameterorganisasi/PemeliharaanUrusan/reload_data" ?>",
            data: {  },
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

    function hapus(KD_URUSAN) {
          $.ajax( {
            type: "POST",
            url: "<?php echo base_url()."parameterorganisasi/PemeliharaanUrusan/hapus/" ?>"+KD_URUSAN,
            data: {  },
            dataType: "json",
            success: function( response ) { 
                try{    
                    console.log(response.pesan);
                    $('.modal-body').text( response.pesan);
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
</script>

<section class="content">
        <div class="container-fluid">
            <!-- CPU Usage -->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>PEMELIHARAAN URUSAN</h2> 
                                </div>

                                <button type="button" class="btn btn-success waves-effect"  style="position: absolute; right: 10px; top: 5px;" onclick="edit('')">
                                        <i class="material-icons">add_circle</i>
                                        <span>Urusan</span>
                                </button> 
                            </div>
                        </div>

                        <div class="body"> 
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
     