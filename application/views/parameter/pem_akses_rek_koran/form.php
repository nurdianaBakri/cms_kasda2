
                                <div id="collapseOne_2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_2">
                                    <div class="panel-body">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                          <form id="myForm"> 
                                            <input type="hidden" name="url_inquery" value="<?php echo $url_inquery ?>" id="url_inquery"> 
                                               
                                              <input type="hidden" id="jenis_aksi" name="jenis_aksi" value="<?php echo $jenis_aksi ?>" > 
                                              <input type="hidden" id="KD_DATA" name="KD_DATA" value="<?php echo $KD_DATA ?>" > 

                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label for="kd_bidang">Kode Kasda</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <select class="form-control" id="KD_KASDA" name="KD_KASDA" onchange="get_user(this.value)">  
                                                   <?php 
                                                      foreach ($kasda as $kasda): ?>
                                                        <option value="<?php echo $kasda->KD_KASDA ?>"><?php echo $kasda->KD_KASDA." - ".$kasda->NM_KASDA ?></option>
                                                        <?php endforeach ?>   
                                                  </select>
                                                </div>
                                            </div>

                                              <div class="row">
                                                <div class="col-md-2">
                                                    <label for="KD_USER">User</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <select class="form-control" id="KD_USER" name="KD_USER">  
                                                   <?php 
                                                      foreach ($user as $user): ?>
                                                        <option value="<?php echo $user['USERNAME'] ?>"><?php echo $user['USERNAME'] ?></option>
                                                        <?php endforeach ?>  
                                                  </select>
                                                </div>
                                            </div>  
                                        </form> 
                                        </div>
                                    </div>
                                </div>  
 

                               <script type="text/javascript"> 

                                      $(document).ready(function(){   
                                        $('select').select2();  
                                    });   

 
                                    function get_user(KD_KASDA) { 
                                        var url_controller  = $('#url').val();   
                                        var data = $('#myForm').serialize();  
                                        var url = "<?php echo base_url() ?>"+url_controller+'get_user';
                                         
                                        $.ajax( {  
                                            type: "POST",
                                            url: url,
                                            data: data,
                                            dataType: "html",
                                            success: function( response ) {   
                                                try{   
                                                    $("#KD_USER").html(response);  
                                                    reload_data(); 
                                                }catch(e) {  
                                                    alert('Exception while request..');
                                                }  
                                            }
                                        } );    
                                    }    

                                    function cek_validasi() {
                                         // Validating Fields
                                        var ADMIN_REK = $("#ADMIN_REK").val(); 

                                        if (!(ADMIN_REK == ""  )) { 
                                            // To Enable Submit Button
                                            $("#submit").removeAttr('disabled'); 
                                        }
                                    }  

                                    function reset_form(){
                                        $('.input-visible').val(""); 
                                    }  

                                </script>