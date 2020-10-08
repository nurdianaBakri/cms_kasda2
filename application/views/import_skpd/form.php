<form id="myForm" action="<?php echo base_url()."parameterorganisasi/Skpd/cek_file" ?>" method="POST"  enctype="multipart/form-data"> 
        <div class="panel panel-success">
            <div class="panel-heading" role="tab" id="headingOne_2">
                <h4 class="panel-title"> 
                </h4>
            </div>
            <div id="collapseOne_2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_2">
                <div class="panel-body">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">   

                      <input type="hidden" id="USER_INPUT" name="USER_INPUT" value="00001" >
                      <input type="hidden" id="USER_UPDATE" name="USER_UPDATE" value="00001" >  

                          <div class="row">
                            <div class="col-md-2">
                                <label for="KD_URUSAN">Kasda</label>
                            </div>
                            <div class="col-md-10">
                                <select class="form-control" id="KD_KASDA" name="KD_KASDA" >  
                                 <?php
                                  if ($jenis_aksi=="add")
                                  { 
                                    foreach ($data_kasda as $data_kasda): ?>
                                      <option value="<?php echo $data_kasda->KD_KASDA ?>"><?php echo $data_kasda->KD_KASDA." - ".$data_kasda->NM_KASDA ?></option>
                                      <?php endforeach ?> 
                                  <?php }
                                  else  {   
                                     foreach ($data_kasda as $data_kasda): ?>
                                        <option value="<?php echo $data_kasda->KD_KASDA ?>" <?php if ($data_kasda->KD_KASDA == $data['KD_KASDA']) echo ' selected';?>><?php echo $data_kasda->KD_KASDA." - ".$data_kasda->NM_KASDA ?></option>
                                      <?php endforeach ?> 
                                  <?php  } ?>
                                </select>
                            </div>
                        </div>  
                                             
                        <div class="row">
                            <div class="col-md-2">
                                <label for="file">Nama File</label>
                            </div>
                            <div class="col-md-10">
                                <input type="file" class="form-control" id="file" name="file" > 
                            </div> 
                        </div>

                        <div class="hasil"></div> 
                        
                    </div>
                </div>  
            </div>
        </div> 

        <input type="submit" name="submit" value="submit" class="btn btn-success"> 
          
    </form>
 
        