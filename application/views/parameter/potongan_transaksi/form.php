
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
                                                    <label for="BATAS_BAWAH">BATAS BAWAH</label>
                                                </div>
                                                <div class="col-md-4"> 
                                                    <input type="number" id="BATAS_BAWAH" name="BATAS_BAWAH" class="form-control input-visible" value="<?php echo $BATAS_BAWAH ?>">
                                                </div>

                                                  <div class="col-md-2">
                                                    <label for="BATAS_ATAS">BATAS ATAS</label>
                                                </div>
                                                <div class="col-md-4">  
                                                    <input type="number" id="BATAS_ATAS" name="BATAS_ATAS" class="form-control input-visible" value="<?php echo $BATAS_ATAS ?>"> 
                                                </div>
                                            </div>   

                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label for="POTONGAN">POTONGAN</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="number" id="POTONGAN" name="POTONGAN" class="form-control input-visible" value="<?php echo $POTONGAN ?>">
                                                </div>
                                            </div>   
                                             
                                        </form> 
                                        </div>
                                    </div>
                                </div>  