 
<div id="collapseOne_2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_2">
  <div class="panel-body">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <form action="" id="myForm"> 
        <?php $USERNAME = $this->session->userdata('username'); ?>
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
            <label for="kd_bidang">Kode Map</label>
          </div>
          <div class="col-md-10">
            <select class="form-control" id="KD_MAP" name="KD_MAP"  style="width: 100%">
              <?php  foreach ($map as $map) {?>
                <option value="<?php echo $map->KD_MAP ?>" <?php if($KD_MAP==$map->KD_MAP){ echo "selected"; } ?> ><?php echo $map->KD_MAP." - ".$map->URAIAN ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        
        <br> 
        <div class="row">
          <div class="col-md-2">
            <label for="NO_REK">No Rekening </label>
          </div>
          <div class="col-md-4">
            <input type="number" id="NO_REK" class="form-control input-visible" name="NO_REK" onkeyup="get_pemilik_rekening(this.value)" value="<?php echo $NO_REK ?>" >
          </div> 

          <div class="col-md-2">
            <label for="NM_PEMILIK">Nama Pemilik <i class="loading"><img src="<?php echo base_url()."assets/loading.gif" ?>" width="30" height="30"></i></label>
          </div>
          <div class="col-md-4">
            <input type="text" id="NM_PEMILIK" name="NM_PEMILIK" class="form-control input-visible" readonly value="<?php echo $NM_PEMILIK ?>">
          </div> 
        </div> 
      </form> 
    </div>
  </div>
</div>

<script type="text/javascript">

    $(document).ready(function(){  
      $('.loading').hide();
      $('select').select2(); 
    });   

    function get_pemilik_rekening(no_rek) { 
      if (no_rek.length>=13 )
      { 
        //loading show
        $('.loading').show();
          var url = "<?php echo base_url() ?>"+"/parameterrekeningbank/Rekening_potongan/get_pemilik_rekening/"+no_rek;   
          // console.log(url);
          $.ajax( {
              type: "POST",
              url: url,
              data: {  },
              dataType: "Json",
              success: function( response ) { 
                // console.log(response);
                 $('.loading').hide(); 

                 // cek_validasi();
                  try{   
                   if (response.Status==true)
                    { 
                      $('#NM_PEMILIK').val(response.Message.result.NICKNM); 
                    }
                    else
                    {
                      alert(response.Message);
                      $('#NM_PEMILIK').val("");  
                    } 
                  }catch(e) {  
                      alert('Exception while request..');
                  }  
              }
          } );   
      }  
    } 

   function cek_validasi() {
   // Validating Fields
      var NO_REK = $("#NO_REK").val();
      var NM_PEMILIK = $("#NM_PEMILIK").val();  

      console.log();

      if (!(NO_REK == "" || NM_PEMILIK == "" )) { 
          // To Enable Submit Button
          $("#submit").removeAttr('disabled'); 
      }
    }  

  </script>