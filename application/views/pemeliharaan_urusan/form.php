 
      <form id="myForm">
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
                      <input type="hidden" id="jenis_aksi" name="jenis_aksi" value="<?php echo $jenis_aksi ?>" >
   
                        <div class="row ">
                          <div class="col-md-2">
                            <label for="kode">Kode Urusan</label>
                          </div>
                          <div class="col-md-10">
                            <input type="text" id="KD_URUSAN" maxlength="1" name="KD_URUSAN" class="form-control" value="<?php echo $data['KD_URUSAN'] ?>" >
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-2">
                            <label for="nama">Nama Urusan</label>
                          </div>
                          <div class="col-md-10">
                            <input type="text" class="form-control input-visible" id="NM_URUSAN" name="NM_URUSAN" value="<?php echo $data['NM_URUSAN'] ?>" required />
                          </div>
                        </div> 
                    </div>
                </div>  
            </div>
        </div> 
        </form>
 
          <?php 
            $this->load->view('include/button_action'); 
        ?>

        <script type="text/javascript">  
 
            function cek_validasi() {
                 // Validating Fields
                var NM_URUSAN = $("#NM_URUSAN").val();
                var KD_URUSAN = $("#KD_URUSAN").val(); 

                if (!(NM_URUSAN == "" || KD_URUSAN == "")) { 
                    // To Enable Submit Button
                    $("#submit").removeAttr('disabled'); 
                }
            }  

            function reset_form(){
                $('.input-visible').val(""); 
            }  

        </script>