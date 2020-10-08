
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
                                                <div class="col-md-2">
                                                    <label for="KD_KASDA">KODE CABANG</label>
                                                </div>
                                                <div class="col-md-10">
                                                   <input type="text" id="KD_CABANG" name="KD_CABANG" class="form-control input-visible" value="<?php echo $KD_CABANG ?>"> 
                                                </div>
                                            </div>  
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label for="ALAMAT_KANTOR">ALAMAT KANTOR</label>
                                                </div>
                                                <div class="col-md-10"> 
                                                    <input type="text" id="ALAMAT_KANTOR" name="ALAMAT_KANTOR" class="form-control input-visible" value="<?php echo $ALAMAT_KANTOR ?>"> 
                                                </div>
                                            </div> 

                                               <div class="row">
                                                <div class="col-md-2">
                                                    <label for="URAIAN">URAIAN</label>
                                                </div>
                                                <div class="col-md-10"> 
                                                    <input type="text" id="URAIAN" name="URAIAN" class="form-control input-visible" value="<?php echo $URAIAN ?>"> 
                                                </div>
                                            </div> 

                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label for="kota">KOTA</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" id="kota" name="kota" class="form-control input-visible" value="<?php echo $kota ?>">
                                                </div>
                                            </div>   
                                             
                                        </form>
                                          <?php 
                                              $this->load->view('include/button_action_2'); 
                                          ?> 
                                        </div>
                                    </div>
                                </div>  
 

                               <script type="text/javascript">  

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