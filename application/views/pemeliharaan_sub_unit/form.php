 

<div class="panel panel-success">
  <div id="collapseOne_2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_2">
    <div class="panel-body">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <form id="myForm">
          <input type="hidden" id="USER_INPUT" name="USER_INPUT" value="<?= $this->session->userdata('username') ?>" >
          <input type="hidden" id="USER_UPDATE" name="USER_UPDATE" value="<?= $this->session->userdata('username') ?>" >
          <input type="hidden" id="jenis_aksi" name="jenis_aksi" value="<?php echo $jenis_aksi ?>" >
          <input type="hidden" name="KD_BIDANG" value="<?php echo $data['KD_BIDANG'] ?>" >
          <input type="hidden" name="KD_UNIT" value="<?php echo $data['KD_UNIT'] ?>" >
          <input type="hidden" id="KD_DATA_SUB_UNIT" name="KD_DATA_SUB_UNIT" value="<?php echo $data['KD_DATA_SUB_UNIT'] ?>" >

          <input type="hidden" id="KD_URUSAN_OLD" value="" >
          <input type="hidden" id="KD_BIDANG_OLD" value="" >
          <input type="hidden" id="KD_UNIT_OLD" value="" > 
          
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="row">
              <div class="col-md-2">
                <label for="kd_bidang">Kasda</label>
              </div>
              <div class="col-md-10"> 
                   <?php   
                      if ($this->session->userdata('LEVEL_USER')=="SU") {
                         ?> 
                              <select class="form-control" name="KD_KASDA" id="KD_KASDA" onchange="reload_data(this.value)"> 
                                  <?php foreach ($kasda as $key) {  ?>
                                      <option value="<?= $key->KD_KASDA; ?>"> <?= $key->KD_KASDA." - ".$key->NM_KASDA;?></option> 
                                  <?php }  ?> 
                              </select> 
                      <?php }
                      else
                      { 
                            //get nama kasda by kd_kasda 
                            $KD_KASDA = $this->session->userdata('KD_KASDA');
                            $this->db->select('NM_KASDA');
                            $this->db->where('KD_KASDA',$KD_KASDA);
                            $nm_kasda =  $this->db->get('ref_kasda')->row()->NM_KASDA;
                        ?> 
                          <input readonly type="text" class="form-control" value="<?= $KD_KASDA.' - '.$nm_kasda; ?>" name="KD_KASDA2">
                          <input readonly type="hidden" class="form-control" value="<?= $this->session->userdata('KD_KASDA'); ?>" name="KD_KASDA">
                  <?php }  ?>     
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                <label for="kd_bidang">Urusan</label>
              </div>
              <div class="col-md-10">
                <select class="form-control" id="KD_URUSAN" name="KD_URUSAN" onchange="get_bidang()">
                  <?php
                  if ($jenis_aksi=="add")
                  {
                  foreach ($urusan as $urusan): ?>
                  <option value="<?php echo $urusan->KD_URUSAN ?>"><?php echo $urusan->KD_URUSAN." - ".$urusan->NM_URUSAN ?></option>
                  <?php endforeach ?>
                  <?php }
                  else  {
                  foreach ($urusan as $urusan): ?>
                  <option value="<?php echo $urusan->KD_URUSAN ?>" <?php if ($urusan->KD_URUSAN == $data['KD_URUSAN']) echo ' selected';?>><?php echo $urusan->KD_URUSAN." - ".$urusan->NM_URUSAN ?></option>
                  <?php endforeach ?>
                  <?php  } ?>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                <label for="kd_bidang">Bidang</label>
              </div>
              <div class="col-md-10">
                <select id="KD_BIDANG" name="KD_BIDANG" class="form-control" onchange="get_unit()">
                  
                </select>
              </div>
            </div>
            <div class="row" >
              <div class="col-md-2">
                <label for="KD_UNIT">Unit</label>
              </div>
              <div class="col-md-10">
                <select id="KD_UNIT" name="KD_UNIT" class="form-control" >
                  
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                <label for="KD_SUB_UNIT">Kode Sub Unit</label>
              </div>
              <div class="col-md-10">
                <input type="text" class="form-control" id="KD_SUB_UNIT" name="KD_SUB_UNIT" value="<?php echo $data['KD_SUB_UNIT'] ?>" maxlength="2">
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-2">
                <label for="NM_SUB_UNIT">Nama Sub Unit</label>
              </div>
              <div class="col-md-10">
                <input type="text" class="form-control" id="NM_SUB_UNIT" name="NM_SUB_UNIT" value="<?php echo $data['NM_SUB_UNIT'] ?>" >
              </div>
            </div>
          </div>
        </form>

        <?php
          $this->load->view('include/button_action');
        ?>  

      </div>
    </div>
  </div>
</div>
  

<script type="text/javascript">  

   $(document).ready(function(){   
     get_bidang();   
     $('select').select2(); 
  });   

  function get_bidang() {
      var data = $('#myForm').serialize(); 
      var url = "<?php echo base_url() ?>"+'/parameterorganisasi/PemeliharaanSubUnit/get_bidang/'; 

      $.ajax( {  
          type: "POST",
          url: url,
          data: data,
          dataType: "html",
          success: function( response ) {  
              try{    
                  $("#KD_BIDANG").html(response);  

                  var KD_BIDANG= $('#KD_BIDANG_OLD').val();
                  if (KD_BIDANG!=='')
                  { 
                      $('#KD_BIDANG').val(KD_BIDANG).trigger('change');  
                  }  
                  // $("#KD_BIDANG").html(response); 
                  get_unit();
              }catch(e) {  
                  alert('Exception while request..');
              }  
          }
      } );    
  } 

  function get_unit() {
      var data = $('#myForm').serialize(); 
      var url = "<?php echo base_url() ?>"+'/parameterorganisasi/PemeliharaanSubUnit/get_unit/';
      // console.log(data);

      $.ajax( {  
          type: "POST",
          url: url,
          data: data,
          dataType: "html",
          success: function( response ) {  
              // console.log(response);
              // console.log(response.last_query);
              try{   
                 $("#KD_UNIT").html(""); 
                  $("#KD_UNIT").html(response); 

                  var KD_UNIT= $('#KD_UNIT_OLD').val();
                  if (KD_UNIT!=='')
                  { 
                      $('#KD_UNIT').val(KD_UNIT).trigger('change');  
                  }  

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
      var KD_SUB_UNIT = $("#KD_SUB_UNIT").val(); 
      var NM_SUB_UNIT = $("#NM_SUB_UNIT").val(); 

      /*console.log("KD_KASDA : "+KD_KASDA);
      console.log("KD_URUSAN : "+KD_URUSAN);
      console.log("KD_BIDANG : "+KD_BIDANG);
      console.log("KD_UNIT : "+KD_UNIT);
      console.log("KD_SUB_UNIT : "+KD_SUB_UNIT);
      console.log("NM_SUB_UNIT : "+NM_SUB_UNIT);
*/
      if (!(KD_KASDA == "" || KD_URUSAN == "" || KD_BIDANG == "" || KD_UNIT == "" || KD_SUB_UNIT == ""  || NM_SUB_UNIT == "")) { 
          // To Enable Submit Button
          $("#submit").removeAttr('disabled'); 
      }
  }  

  function reset_form(){
      $('.input-visible').val(""); 
  }  

</script>