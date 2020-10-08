
                                <div id="collapseOne_2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_2">
                                    <div class="panel-body">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                          <form id="myForm"> 
                                            <input type="hidden" name="url_inquery" value="<?php echo $url_inquery ?>" id="url_inquery"> 
                                              <?php 
                                                $USERNAME = $this->session->userdata('username');  
                                             ?>  
                                              <input type="hidden" id="USER_INPUT" name="USER_INPUT" value="<?php echo $USERNAME ?>" >
                                              <input type="hidden" id="USER_UPDATE" name="USER_UPDATE" value="<?php echo $USERNAME ?>" >
                                              <input type="hidden" id="jenis_aksi" name="jenis_aksi" value="<?php echo $jenis_aksi ?>" > 
                                              <input type="hidden" id="KD_DATA" name="KD_DATA" value="<?php echo $KD_DATA ?>" > 
 
                                              <div class="row">
                                                <div class="col-md-3">
                                                    <label for="KD_KASDA">Kode KASDA</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <select class="form-control" id="KD_KASDA" name="KD_KASDA" onchange="get_mapping_map_by_kd_kasda()" style="width: 100%;">  
                                                   <?php
                                                    if ($jenis_aksi=="add")
                                                    { 
                                                      foreach ($kasda as $kasda): ?>
                                                        <option value="<?php echo $kasda->KD_KASDA ?>"><?php echo $kasda->KD_KASDA." - ".$kasda->NM_KASDA ?></option>
                                                        <?php endforeach ?> 
                                                    <?php }
                                                    else  {   
                                                       foreach ($kasda as $kasda): ?>
                                                          <option value="<?php echo $kasda->KD_KASDA ?>" <?php if($kasda->KD_KASDA==$data['KD_KASDA']){echo "selected"; } ?> ><?php echo $kasda->KD_KASDA." - ".$kasda->NM_KASDA ?></option>
                                                        <?php endforeach ?> 
                                                    <?php  } ?>
                                                  </select>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="KD_MAP">Kode MAPPING MAP</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <select class="form-control" id="KD_MAP" name="KD_MAP" style="width: 100%;">  
                                                   <?php
                                                    if ($jenis_aksi=="add")
                                                    { 
                                                      foreach ($map as $map): ?>
                                                        <option value="<?php echo $map->KD_MAP ?>"><?php echo $map->KD_MAP." - ".$map->URAIAN ?></option>
                                                        <?php endforeach ?> 
                                                    <?php }
                                                    else  {   
                                                       foreach ($map as $map): ?>
                                                          <option value="<?php echo $map->KD_MAP ?>" <?php if($map->KD_MAP==$data['KD_MAP']){echo "selected"; } ?> ><?php echo $map->KD_MAP." - ".$map->URAIAN ?></option>
                                                        <?php endforeach ?> 
                                                    <?php  } ?>
                                                  </select>
                                                </div>
                                            </div> 

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="KD_MAP_SIMDA">Kode MAP SIMDA</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" id="KD_MAP_SIMDA" name="KD_MAP_SIMDA" class="form-control input-visible" value="<?php echo $KD_MAP_SIMDA ?>">
                                                </div>
                                            </div>   
                                        </form>
                                        
                                          <?php 
                                              // $this->load->view('include/button_action_2'); 
                                          ?> 
                                        </div>
                                    </div>
                                </div>  
 

                               <script type="text/javascript">   

                                    $(document).ready(function(){   
                                        get_mapping_map_by_kd_kasda(); 
                                        $('.loading').hide(); 
                                        $('select').select2();  

                                    });   

                                    function get_mapping_map_by_kd_kasda() { 

                                      //get kd_kasda 
                                      var url_controller  = $('#url').val(); 
                                      var kd_kasda = $('#KD_KASDA').val();
                                        var url = "<?php echo base_url() ?>"+url_controller+'/get_mapping_map_by_kd_kasda/'+kd_kasda;
                                        $.ajax( {  
                                            type: "POST",
                                            url: url,
                                            data: {},
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

                                    function cek_validasi() {
                                         // Validating Fields
                                        var KD_KASDA = $("#KD_KASDA").val();
                                        var KD_MAP = $("#KD_MAP").val(); 
                                        var KD_MAP_SIMDA = $("#KD_MAP_SIMDA").val(); 

                                        if (!(KD_KASDA == "" || KD_MAP_SIMDA == "" || KD_MAP_SIMDA == "")) { 
                                            // To Enable Submit Button
                                            $("#submit").removeAttr('disabled'); 
                                        }
                                    }  

                                    function reset_form(){
                                        $('.input-visible').val(""); 
                                    }  

                                </script>