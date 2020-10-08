
    <div id="collapseOne_2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_2">
        <div class="panel-body">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <form action="" id="myForm"> 
                 <?php  
                    $USERNAME = $this->session->userdata('username'); 
                 ?>   
                 <input type="hidden" id="USER_INPUT" name="USER_INPUT" value="<?php echo $USERNAME ?>" >
                  <input type="hidden" id="USER_UPDATE" name="USER_UPDATE" value="<?php echo $USERNAME ?>" >
                  <input type="hidden" id="jenis_aksi" name="jenis_aksi" value="<?php echo $jenis_aksi ?>" > 
                  <input type="hidden" id="KD_DATA" name="KD_DATA" value="<?php echo $KD_DATA ?>" > 

                <div class="row">
                    <div class="col-md-2">
                        <label for="kd_bidang">Kode Kasda</label>
                    </div>
                    <div class="col-md-10">
                        <select class="form-control" id="KD_KASDA" name="KD_KASDA" style="width: 100%">
                          <?php foreach ($kasda as $kasda): ?>
                          <option value="<?php echo $kasda->KD_KASDA ?>" <?php if($KD_KASDA==$kasda->KD_KASDA){ echo "selected"; } ?> ><?php echo $kasda->KD_KASDA." - ".$kasda->NM_KASDA ?></option>
                          <?php endforeach ?> 
                        </select>
                    </div>
                </div>
                <br>
                 <div class="row">
                    <div class="col-md-2">
                        <label for="KD_SUMBER_DANA">Kode Sumber Dana</label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="KD_SUMBER_DANA" name="KD_SUMBER_DANA"  value="<?php echo $KD_SUMBER_DANA ?>">
                    </div>

                     <div class="col-md-2">
                        <label for="NM_SUMBER_DANA">Nama Sumber Dana</label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" id="NM_SUMBER_DANA" class="form-control" name="NM_SUMBER_DANA" value="<?php echo $NM_SUMBER_DANA ?>">
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
        var KD_SUMBER_DANA = $("#KD_SUMBER_DANA").val();
        var NM_SUMBER_DANA = $("#NM_SUMBER_DANA").val();  

        if (!(KD_SUMBER_DANA == "" || NM_SUMBER_DANA == "" )) { 
            // To Enable Submit Button
            $("#submit").removeAttr('disabled'); 
        }
      }   
    </script>

                                   