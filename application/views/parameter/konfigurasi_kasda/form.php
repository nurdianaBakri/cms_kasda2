
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
                                                    <select class="form-control" id="KD_KASDA" name="KD_KASDA" style="width: 100%;">  
                                                   <?php
                                                    if ($jenis_aksi=="add")
                                                    { 
                                                      foreach ($kasda as $kasda): ?>
                                                        <option value="<?php echo $kasda->KD_KASDA ?>"><?= $kasda->KD_KASDA." - ".$kasda->NM_KASDA ?></option>
                                                        <?php endforeach ?> 
                                                    <?php }
                                                    else  {   
                                                       foreach ($kasda as $kasda): ?>
                                                          <option value="<?= $kasda->KD_KASDA ?>" <?php if($kasda->KD_KASDA==$data['KD_KASDA']){echo "selected"; } ?> ><?php echo $kasda->KD_KASDA." - ".$kasda->NM_KASDA ?></option>
                                                        <?php endforeach ?> 
                                                    <?php  } ?>
                                                  </select>
                                                </div>
                                            </div>  
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="NM_KONFIGURASI">Nama Konfigurasi</label>
                                                </div>
                                                <div class="col-md-9">
                                                   <!--  <select class="form-control" id="NM_KONFIGURASI" name="NM_KONFIGURASI">  
                                                   <?php
                                                    if ($jenis_aksi=="add")
                                                    {  }   
                                                    else  {   
                                                      foreach ($nama_konfigurasi as $nm_konf): ?>
                                                        <option value="<?php echo $nm_konf->NM_KONFIGURASI ?>" <?php if($nm_konf->NM_KONFIGURASI==$data['NM_KONFIGURASI']){echo "selected";} ?>>
                                                            <?php echo $nm_konf->NM_KONFIGURASI ?>
                                                          </option>
                                                        <?php endforeach ?> 
                                                    <?php  } ?>
                                                  </select> -->

                                                    <input type="text" id="NM_KONFIGURASI" name="NM_KONFIGURASI" class="form-control input-visible" value="<?php echo $NM_KONFIGURASI ?>">

                                                </div>
                                            </div> 

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="VALUE">VALUE</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" id="VALUE" name="VALUE" class="form-control input-visible" value="<?php echo $VALUE ?>">
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
                                      
                                    function cek_validasi() {
                                         // Validating Fields
                                        var KD_KASDA = $("#KD_KASDA").val();
                                        var KD_MAP = $("#KD_MAP").val(); 
                                        var KD_MAP_SIMDA = $("#KD_MAP_SIMDA").val(); 

                                        if (!(KD_KASDA == "" || KD_MAP == "" || KD_MAP_SIMDA == "")) { 
                                            // To Enable Submit Button
                                            $("#submit").removeAttr('disabled'); 
                                        }
                                    }  

                                    function reset_form(){
                                        $('.input-visible').val(""); 
                                    }  

                                </script>