
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
                      <label for="KD_MAP">Kode Map</label>
                  </div>
                  <div class="col-md-10">
                      <input type="text" class="form-control"  id="KD_MAP" name="KD_MAP" value="<?= $KD_MAP ?>">
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-2">
                      <label for="URAIAN">Nama Map</label>
                  </div>
                  <div class="col-md-10">
                      <input type="text" class="form-control"  id="URAIAN" name="URAIAN" value="<?= $URAIAN ?>">
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
            var URAIAN = $("#URAIAN").val();
            var KD_MAP = $("#KD_MAP").val();   

            if (!(URAIAN == ""  || KD_MAP == "" )) { 
                // To Enable Submit Button
                $("#submit").removeAttr('disabled'); 
            }
        }  

        function reset_form(){
            $('.input-visible').val(""); 
        }  

    </script>