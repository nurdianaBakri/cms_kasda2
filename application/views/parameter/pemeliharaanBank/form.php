
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
                    <div class="col-sm-2">
                        <label for="KD_BANK">Kode Bank</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" id="KD_BANK" name="KD_BANK" value="<?php echo $KD_BANK ?>" >
                    </div>

                     <div class="col-sm-2">
                          <label for="NM_BANK">Nama Bank</label>
                      </div>
                      <div class="col-sm-4">
                          <input type="text" class="form-control" id="NM_BANK" name="NM_BANK" value="<?php echo $NM_BANK ?>" >
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
            var KD_BANK = $("#KD_BANK").val();
            var NM_BANK = $("#NM_BANK").val();   

            if (!(KD_BANK == ""  || NM_BANK == "" )) { 
                // To Enable Submit Button
                $("#submit").removeAttr('disabled'); 
            }
        }  

        function reset_form(){
            $('.input-visible').val(""); 
        }  

    </script>