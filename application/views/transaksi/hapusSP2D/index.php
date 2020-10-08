
    <section class="content">
        <div class="container-fluid">
            <!-- CPU Usage -->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>Hapus SP2D</h2>
                                </div>
                            </div>
                        </div>
                        <div class="body">  
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

    <script type="text/javascript">    
        $(document).ready(function(){ 
            reload_data();   
        }); 

         function reload_data() { 
            var url = "<?php echo base_url() ?>"+"/transaksi/Hapus_sp2d/reload_data";
            $.ajax( {
                type: "POST",
                url: url,
                data: {  },
                dataType: "html",
                success: function( response ) { 
                    // console.log(response);
                    try{   
                        $('.table-responsive').html(response); 
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
        }     

         function hapus(No_SP2D) {   

            if (confirm("Yakin ingin menghapus "+No_SP2D+" ? ")) {
                var url = "<?php echo base_url() ?>"+'/transaksi/Hapus_sp2d/hapus'; 
                $.ajax( {
                    type: "POST",
                    url: url,
                    data: {
                        No_SP2D : No_SP2D
                    },
                    dataType: "json",
                    success: function( response ) {  
                        try{      
                            //reload tabel
                            reload_data();    
                        }catch(e) {  
                            alert('Exception while request..');
                        }  

                        alert(response.pesan);
                    }
                } );  
            }
            else{
                return false;
            } 
        }   
    </script>
 
