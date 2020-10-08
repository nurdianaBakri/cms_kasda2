
    <div id="collapseOne_2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_2">
        <div class="panel-body">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <form id="myForm">   
                  <?php 
                    $USERNAME = $this->session->userdata('username');  
                 ?>  
                  <input type="hidden" id="USER_INPUT" name="USER_INPUT" value="<?php echo $USERNAME ?>" >
                  <input type="hidden" id="USER_UPDATE" name="USER_UPDATE" value="<?php echo $USERNAME ?>" >
                  <input type="hidden" id="jenis_aksi" name="jenis_aksi" value="<?php echo $jenis_aksi ?>" > 
                  <input type="hidden" id="KD_DATA" name="KD_DATA" value="<?php echo $KD_DATA ?>" > 
                  <input type="hidden" id="KD_KASDA" name="KD_KASDA" value="0" > 
                  
                  <div class="row">
                      <div class="col-md-2">
                          <label for="KD_JENIS_SPM">Kode Jenis SPM</label>
                      </div>
                      <div class="col-md-4">
                          <input type="text" class="form-control"  id="KD_JENIS_SPM" name="KD_JENIS_SPM" value="<?php echo $KD_JENIS_SPM ?>">
                      </div>

                      <div class="col-md-2">
                          <label for="NM_JENIS_SPM">Nama Jenis SPM</label>
                      </div>
                      <div class="col-md-4">
                          <input type="text" class="form-control" id="NM_JENIS_SPM" name="NM_JENIS_SPM" value="<?php echo $NM_JENIS_SPM ?>">
                      </div>
                  </div> 
            </form> 
            </div>
        </div>
    </div>  


   <script type="text/javascript">  

        $(document).ready(function(){  
            $('.loading').hide(); 
        });    
         
        function cek_validasi() {
             // Validating Fields
            var KD_JENIS_SPM = $("#KD_JENIS_SPM").val();
            var NM_JENIS_SPM = $("#NM_JENIS_SPM").val();   

            if (!(KD_JENIS_SPM == ""  || NM_JENIS_SPM == "" )) { 
                // To Enable Submit Button
                $("#submit").removeAttr('disabled'); 
            }
        }  

        function reset_form(){
            $('.input-visible').val(""); 
        }  

    </script>