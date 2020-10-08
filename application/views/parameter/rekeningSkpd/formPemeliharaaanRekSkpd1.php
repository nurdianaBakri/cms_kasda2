
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
                        <label for="kd_bidang">Kode Kasda</label>
                    </div>
                    <div class="col-md-10">
                        <select class="form-control" id="KD_KASDA" name="KD_KASDA" onchange="get_kode_sumber_dana(this.value)">  
                       <?php
                        if ($jenis_aksi=="add")
                        { 
                          foreach ($kasda as $kasda): ?>
                            <option value="<?php echo $kasda->KD_KASDA ?>"><?php echo $kasda->KD_KASDA." - ".$kasda->NM_KASDA ?></option>
                            <?php endforeach ?> 
                        <?php }
                        else  {   
                           foreach ($kasda as $kasda): ?>
                              <option value="<?php echo $kasda->KD_KASDA ?>" <?php if($kasda->KD_KASDA==$data['KD_KASDA']){echo "selected"; } ?> ><?php echo $kasda->KD_KASDA." - ".$kasda->NM_KASDA ?></option>
                            <?php endforeach ?>
                        <?php  } ?>
                      </select>
                    </div>
                </div>
 
                 <div class="row">
                    <div class="col-md-2">
                        <label for="kd_bidang">Kode SKPD</label>
                    </div>
                    <div class="col-md-10"> 
                        <select class="form-control" id="KD_SKPD" name="KD_SKPD" onchange="get_kode_sumber_dana(this.value)">  
                       <?php

                        if ($jenis_aksi=="add")
                        { 
                          foreach ($skpd as $skpd){ ?> 
                            <option value="<?php echo $skpd['kd_gabungan'] ?>"><?php echo $skpd['kd_gabungan']." - ".$skpd['nm_urusan'] ?></option>

                            <?php foreach ($skpd['data_bidang'] as $data_bidang){  ?>  
                              <option value="<?php echo $data_bidang['kd_gabungan'] ?>"><?php echo $data_bidang['kd_gabungan']." - ".$data_bidang['nm_bidang'] ?></option>
        
                                  <?php foreach ($data_bidang['data_unit'] as $data_unit){  ?>  
                                    <option value="<?php echo $data_unit['kd_gabungan'] ?>"><?php echo $data_unit['kd_gabungan']." - ".$data_unit['nm_unit'] ?></option>

                                      <?php foreach ($data_unit['data_sub_unit'] as $data_sub_unit){  ?>  
                                        <option value="<?php echo $data_sub_unit['kd_gabungan'] ?>"><?php echo $data_sub_unit['kd_gabungan']." - ".$data_sub_unit['nm_sub_unit'] ?></option>
                                      <?php } ?> 

                                  <?php } ?> 

                              <?php } ?> 
                            <?php } ?> 
                        <?php }
                        else  {   
                           foreach ($skpd as $skpd){ ?> 
                            <option value="<?php echo $skpd['kd_gabungan'] ?>" <?php if($skpd['kd_gabungan']==$data['KD_SKPD']){echo "selected";} ?>><?php echo $skpd['kd_gabungan']." - ".$skpd['nm_urusan'] ?></option>

                            <?php foreach ($skpd['data_bidang'] as $data_bidang){  ?>  
                              <option value="<?php echo $data_bidang['kd_gabungan'] ?>" <?php if($data_bidang['kd_gabungan']==$data['KD_SKPD']){echo "selected";} ?>><?php echo $data_bidang['kd_gabungan']." - ".$data_bidang['nm_bidang'] ?></option>
        
                                  <?php foreach ($data_bidang['data_unit'] as $data_unit){  ?>  
                                    <option value="<?php echo $data_unit['kd_gabungan'] ?>" <?php if($data_unit['kd_gabungan']==$data['KD_SKPD']){echo "selected";} ?>><?php echo $data_unit['kd_gabungan']." - ".$data_unit['nm_unit'] ?></option>

                                      <?php foreach ($data_unit['data_sub_unit'] as $data_sub_unit){  ?>  
                                        <option value="<?php echo $data_sub_unit['kd_gabungan'] ?>" <?php if($data_sub_unit['kd_gabungan']==$data['KD_SKPD']){echo "selected";} ?>><?php echo $data_sub_unit['kd_gabungan']." - ".$data_sub_unit['nm_sub_unit'] ?></option>
                                      <?php } ?> 

                                  <?php } ?> 

                              <?php } ?> 
                            <?php } ?> 
                        <?php  } ?>
                      </select>
                    </div>
                </div>

                  <div class="row">
                    <div class="col-md-2">
                        <label for="kd_bidang">Kode Cabang</label>
                    </div>
                    <div class="col-md-10">
                        <select class="form-control" id="KD_CAB" name="KD_CAB">  
                       <?php
                        if ($jenis_aksi=="add")
                        { 
                          foreach ($cabang as $cabang): ?>
                            <option value="<?php echo $cabang->KD_CAB ?>"><?php echo $cabang->KD_CAB." - ".$cabang->URAIAN ?></option>
                            <?php endforeach ?> 
                        <?php }
                        else  {   
                           foreach ($cabang as $cabang): ?>
                              <option value="<?php echo $cabang->KD_CAB ?>" <?php if($cabang->KD_CAB==$data['KD_CAB']){echo "selected"; } ?> ><?php echo $cabang->KD_CAB." - ".$cabang->URAIAN ?></option>
                            <?php endforeach ?> 
                        <?php  } ?>
                      </select>
                    </div>
                </div>  
                  
                 <div class="row">
                    <div class="col-md-2">
                        <label for="NO_REK">No Rekening </label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" id="NO_REK" class="form-control input-visible" name="NO_REK" onkeyup="get_pemilik_rekening(this.value)" value="<?php echo $NO_REK ?>" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label for="NM_PEMILIK">Nama Pemilik <i class="loading"><img src="<?php echo base_url()."assets/loading.gif" ?>"  width="30" height="30"></i></label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" id="NM_PEMILIK" name="NM_PEMILIK" class="form-control input-visible" readonly value="<?php echo $NM_PEMILIK ?>">
                    </div>
                </div>  

                  <div class="row">
                    <div class="col-md-2">
                        <label for="STATUS">Status  </label>
                    </div>
                    <div class="col-md-10"> 
                       <select name="STATUS" id="STATUS" class="form-control">
                          <?php
                          if ($jenis_aksi=="add")
                          { ?>
                             <option value="1">Aktif</option>
                             <option value="0">Tidak Aktif</option>
                          <?php }
                          else  {   ?>
                             <option value="1" <?php if($data['STATUS']=="1"){ echo "selected";} ?>>Aktif</option>
                              <option value="0" <?php if($data['STATUS']=="0"){ echo "selected";} ?>>Tidak Aktif</option>
                          <?php  } ?>
                      </select>  
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

        $(document).ready(function(){   
            get_kode_sumber_dana(); 
            $('.loading').hide(); 
             $('select').select2();  
        });   

        function get_kode_sumber_dana() {
            var data = $('#myForm').serialize(); 
            var url = "<?php echo base_url() ?>"+'/parameterrekeningbank/Rekening_kasda/get_kd_sumber_dana/';
            $.ajax( {  
                type: "POST",
                url: url,
                data: data,
                dataType: "html",
                success: function( response ) {   
                    try{   
                        $("#KD_SUMBER_DANA").html(response);  
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );    
        }  

         function get_pemilik_rekening(no_rek) { 
              if (no_rek.length==13 )
              { 
                //loading show
                $('.loading').show();
                  var url = "<?php echo base_url() ?>"+"/parameterrekeningbank/Rekening_potongan/get_pemilik_rekening/"+no_rek;   
                  console.log(url);
                  $.ajax( {
                      type: "POST",
                      url: url,
                      data: {  },
                      dataType: "Json",
                      success: function( response ) { 
                        console.log(response);
                         $('.loading').hide(); 
                         cek_validasi();
                          try{   
                              $('#NM_PEMILIK').val(response.data.NICKNM); 
                          }catch(e) {  
                              alert('Exception while request..');
                          }  
                      }
                  } );   
              }  
            }  

        function cek_validasi() {
             // Validating Fields
            var KD_KASDA = $("#KD_KASDA").val();
            var KD_CAB = $("#KD_CAB").val(); 
            var KD_SUMBER_DANA = $("#KD_SUMBER_DANA").val(); 
            var NO_REK = $("#NO_REK").val(); 
            var NM_PEMILIK = $("#NM_PEMILIK").val(); 
            var KD_SKPD = $("#KD_SKPD").val(); 

            if (!(KD_KASDA == "" || KD_SKPD == "" || KD_CAB == "" || KD_SUMBER_DANA == "" || NO_REK == "" || NM_PEMILIK == "")) { 
                // To Enable Submit Button
                $("#submit").removeAttr('disabled'); 
            }
        }  

        function reset_form(){
            $('.input-visible').val(""); 
        }  

    </script>