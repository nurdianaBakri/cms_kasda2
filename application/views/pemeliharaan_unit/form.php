 
                <div class="panel-body">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <form id="myForm" >

                      <input type="hidden" id="USER_INPUT" name="USER_INPUT" value="<?= $this->session->userdata('username') ?>" > 
                      <input type="hidden" id="USER_UPDATE" name="USER_UPDATE" value="<?= $this->session->userdata('username') ?>" >
                      <input type="hidden" id="jenis_aksi" name="jenis_aksi" value="<?php echo $jenis_aksi ?>" > 
                      <input type="hidden" id="KD_DATA_UNIT" name="KD_DATA_UNIT" value="<?php echo $data['KD_DATA_UNIT'] ?>" > 

                        <div class="row">
                            <div class="col-md-3">
                                <label for="kd_bidang">Kasda</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control" id="KD_KASDA" name="KD_KASDA" onchange="reload_data()">  
                               <?php
                                  foreach ($kasda as $kasda): ?>
                                    <option value="<?php echo $kasda->KD_KASDA ?>"><?php echo $kasda->KD_KASDA." - ".$kasda->NM_KASDA ?></option>
                                    <?php endforeach ?>  
                              </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="kd_bidang">Kode Urusan</label>
                            </div>
                            <div class="col-md-9">
                              <select class="form-control" id="KD_URUSAN" name="KD_URUSAN" onchange="get_bidang('')">  
                                <?php 
                                  foreach ($urusan as $urusan): ?>
                                    <option value="<?php echo $urusan->KD_URUSAN ?>"><?php echo $urusan->KD_URUSAN." - ".$urusan->NM_URUSAN ?></option>
                                    <?php endforeach ?>  
                               </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="kd_bidang">Kode Bidang</label>
                            </div>
                            <div class="col-md-9">
                               <select class="form-control" name="KD_BIDANG" id="KD_BIDANG">
                                <?php 
                                  foreach ($bidang as $bidang): ?>
                                    <option value="<?php echo $bidang->KD_BIDANG ?>" ><?php echo $bidang->KD_BIDANG." - ".$bidang->NM_BIDANG ?></option>
                                    <?php endforeach ?>  
                               </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="KD_UNIT">Kode Unit</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text"  class="form-control input-visible" id="KD_UNIT" name="KD_UNIT"  value="<?php echo $data['KD_UNIT'] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="NM_UNIT">Nama Unit</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control input-visible" id="NM_UNIT" name="NM_UNIT" value="<?php echo $data['NM_UNIT'] ?>" >
                            </div>
                        </div>
                    </form> 
              <center>
                  <?php  
                    $this->load->view('include/button_action_4'); 
                    ?>
              </center>  

              </div>
              </div>   
           

        <script type="text/javascript">   

            var KD_BIDANG="";

            $(document).ready(function(){   
               get_bidang(''); 
               // get_kode_unit(); 
               $('select').select2(); 
            });   

            function get_bidang(KD_BIDANG) {
                var data = $('#myForm').serialize(); 
                var url = "<?php echo base_url() ?>"+'/parameterorganisasi/PemeliharaanUnit/get_bidang/';

                $.ajax( {  
                    type: "POST",
                    url: url,
                    data: data,
                    dataType: "html",
                    success: function( response ) {  
                        // console.log(response);
                        try{    
                            $("#KD_BIDANG").html(response); 

                            if (KD_BIDANG!=='')
                            { 
                                $('#KD_BIDANG').val(KD_BIDANG).trigger('change');  
                            } 
                            // get_kode_unit();
                        }catch(e) {  
                            alert('Exception while request..');
                        }  
                    }
                } );    
            } 


            function cek_validasi() {
                 // Validating Fields
                var KD_KASDA = $("#KD_KASDA").val();
                var KD_URUSAN = $("#KD_URUSAN").val(); 
                var KD_BIDANG = $("#KD_BIDANG").val(); 
                var KD_UNIT = $("#KD_UNIT").val(); 
                var NM_UNIT = $("#NM_UNIT").val(); 

                if (!(KD_KASDA == "" || KD_URUSAN == "" || KD_BIDANG == "" || KD_UNIT == "" || NM_UNIT == "")) { 
                    // To Enable Submit Button
                    $("#submit").removeAttr('disabled'); 
                }
            }  

            function reset_form(){
                $('.input-visible').val(""); 
            }  

        </script>