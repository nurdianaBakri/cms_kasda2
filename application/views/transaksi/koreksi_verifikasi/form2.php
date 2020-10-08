 

            <div class="panel panel-success">
                <div class="panel-heading">Form</div>
                <div class="panel-body">
                        <input type="hidden" name="url_inquery" value="<?php echo $url_inquery ?>" id="url_inquery"> 
                          <?php 
                            $username = $this->session->userdata('username');  
                            $KD_KASDA = $this->session->userdata('KD_KASDA');  
                         ?>  
                          <input type="hidden" id="username" name="username" value="<?php echo $username ?>" > 
                          <input type="hidden" id="KD_KASDA" name="KD_KASDA" value="<?php echo $KD_KASDA ?>" >  

                          <div class="row">
                            <div class="col-md-2">
                                <label for="No_SP2D">No. SP2D</label>
                            </div>
                            <div class="col-md-10 No_SP2D"> 
                              <b class="loading">Loading...</b> 
                            </div> 
                        </div>

                        <div class="row"> 
                            <div class="col-md-2">
                              <label for="alasan">Alasan Pembatalan</label>
                            </div>
                            <div class="col-md-10">
                                 <textarea class="form-control input-visible" name="alasan" id="alasan" onkeyup="cek_validasi()"></textarea>
                            </div> 
                        </div> 
                         
                         <div class="row">
                            <div class="col-md-2">
                              <label for="tanggal">Tanggal</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" id="tanggal" class="form-control" name="tanggal" value="<?php echo $tanggal ?>" readonly >
                            </div>  
                        </div>  
   
                    </div> 
                </div> 

                <script type="text/javascript">  

                    $(document).ready(function(){ 
                        form_no_sp2d();     
                    });   

                  function cek_validasi() {  
                     // Validating Fields
                    var No_SP2D = $("#No_SP2D").val();
                    var alasan = $("#alasan").val();

  
                    if (!(No_SP2D == "" || alasan=="" )) { 
                    // To Enable Submit Button
                      $("#submit").removeAttr('disabled'); 
                    }
                  }    

                  function form_no_sp2d() {  
                    var url_controller  = $('#url').val(); 
                    var KD_KASDA  = $('#KD_KASDA').val(); 
                    var url = "<?php echo base_url() ?>"+url_controller+"form_no_sp2d";
                    $.ajax( {
                        type: "POST",
                        url: url,
                        data: {  
                            KD_KASDA:KD_KASDA
                         },
                        dataType: "html",
                        success: function( response ) { 
                            try{   
                                $('.No_SP2D').html(response);
                            }catch(e) {  
                                alert('Exception while request..');
                            }  
                        }
                    } );  
                } 
                </script>


                          