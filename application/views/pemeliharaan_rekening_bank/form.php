 
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
                      <input type="hidden" id="KD_DATA_BIDANG" name="KD_DATA_BIDANG" value="<?php echo $data['KD_DATA_BIDANG'] ?>" >
   
                        <div class="row">
                            <div class="col-md-3">
                                <label for="KD_URUSAN">Kode Urusan</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control" id="KD_URUSAN" name="KD_URUSAN">  
                                <?php
                                if ($jenis_aksi=="add")
                                { 
                                    foreach ($urusan as $urusan) {?>
                                         <option value="<?php echo $urusan->KD_URUSAN ?>"><?php echo $urusan->KD_URUSAN." - ".$urusan->NM_URUSAN ?></option>
                                    <?php }
                                }
                                else  {   foreach ($urusan as $urusan){ ?>
                                             <option value="<?php echo $urusan->KD_URUSAN ?>" <?php if ($urusan->KD_URUSAN == $data['KD_URUSAN']) echo ' selected';?>><?php echo $urusan->KD_URUSAN." - ".$urusan->NM_URUSAN ?></option>
                                        <?php }  
                                    } ?>
                               </select>
                              
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="KD_BIDANG">Kode Bidang</label>
                            </div>
                            <div class="col-md-9"> 
                                <input type="text" class="form-control" id="KD_BIDANG" name="KD_BIDANG" value="<?php echo $data['KD_BIDANG'] ?>" maxlength="2">
                            </div>
                        </div>
                        <p></p>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="NM_BIDANG">Nama Bidang</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="NM_BIDANG" name="NM_BIDANG" value="<?php echo $data['NM_BIDANG'] ?>" >
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

         

        function get_kode_terakhir() {
            var KD_URUSAN = $('#KD_URUSAN').val(); 
            var url = "<?php echo base_url() ?>"+'/parameterorganisasi/PemeliharaanBidang/get_kode_bidang_by_kode_urusan/'+KD_URUSAN;
              // console.log(url); 

            $.ajax( {  
                type: "POST",
                url: url,
                data: {},
                success: function( response ) {  
                    // console.log(response);
                    try{   
                        $("#KD_BIDANG").val(response); 
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );   
        }
            
        function cek_validasi() {
             // Validating Fields
            var NM_URUSAN = $("#NM_URUSAN").val();
            var KD_URUSAN = $("#KD_URUSAN").val(); 
            var NM_BIDANG = $("#NM_BIDANG").val(); 

            if (!(NM_URUSAN == "" || KD_URUSAN == "" || NM_BIDANG == "")) { 
                // To Enable Submit Button
                $("#submit").removeAttr('disabled'); 
            }
        }  

        function reset_form(){
            $('.input-visible').val(""); 
        }  

    </script>