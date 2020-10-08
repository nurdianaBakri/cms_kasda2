 
      <form id="myForm">
        <?php $USERNAME = $this->session->userdata('username'); ?>
        <input type="hidden" id="USER_INPUT" name="USER_INPUT" value="<?php echo $USERNAME ?>" >
        <input type="hidden" id="jenis_aksi" name="jenis_aksi" value="<?php echo $jenis_aksi ?>" >
        <input type="hidden" id="KD_DATA" name="KD_DATA" value="<?php echo $KD_DATA ?>" >
        <div class="form-group row">
          <div class="col-sm-3 col-form-label">
            <label for="kd_bidang">Kode Kasda</label>
          </div>
          <div class="col-sm-9"> 
             <select class="form-control" id="KD_KASDA" name="KD_KASDA" style="width: 100%" onchange="get_kode_sumber_dana(this.value)">
              <?php foreach ($kasda as $kasda): ?>
              <option value="<?php echo $kasda->KD_KASDA ?>" <?php if($KD_KASDA==$kasda->KD_KASDA){ echo "selected"; } ?> ><?php echo $kasda->KD_KASDA." - ".$kasda->NM_KASDA ?></option>
              <?php endforeach ?> 
            </select> 
          </div>
        </div> 
        <div class="form-group row">
          <div class="col-sm-3 col-form-label">
            <label for="kd_bidang">Kode Sumber Dana</label>
          </div>
          <div class="col-sm-9" >
            <select class="form-control" id="KD_SUMBER_DANA" name="KD_SUMBER_DANA" style="width: 100%">
              
            </select>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-3 col-form-label">
            <label for="NO_REK">No Rekening </label>
          </div>
          <div class="col-sm-9">
            <input type="text" id="NO_REK" class="form-control input-visible" name="NO_REK" onkeyup="get_nama_pemilik2(this.value)" value="<?php echo $NO_REK ?>" >
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-3 col-form-label">
            <label for="NM_PEMILIK">Nama Pemilik  </label>
          </div>
          <div class="col-sm-9">
            <input type="text" id="NM_PEMILIK" name="NM_PEMILIK" class="form-control input-visible" readonly value="<?php echo $NM_PEMILIK ?>">

            <p class="p_alert"></p>
          </div>
        </div>
      </form> 
 

     <script type="text/javascript">    

      $(document).ready(function(){   
          get_kode_sumber_dana();  
          $('select').select2();   
      });   

      function get_nama_pemilik2(no_rek) {  
      if (no_rek.length==13 )
      { 
          var url = "<?php echo base_url() ?>"+"parameterrekeningbank/Rekening_potongan/get_pemilik_rekening/"+no_rek;   
          // console.log(url);
          $.ajax( {
              type: "POST",
              url: url,
              data: {  },
              dataType: "Json",
              success: function( response )
              {   
                if (response.Status==false)
                { 
                  var pesan="";
                  if(response.Message==null)
                  { 
                      pesan  = 'Tidak dapat terhubung ke API, silahkan coba lagi dengan cara menekan enter pada fileld "No. Rekening"'; 
                  }
                  else
                  { 
                      pesan  = response.Message;
                  }  
                  $('.p_alert').text(pesan);  
                } 
                else{
                  $('#NM_PEMILIK').show(); 
                  $('#NPWP').show(); 
                  $('#NM_PEMILIK').val(response.Message.result.NICKNM); 
                  $('#NPWP').val(response.Message.result.NPWP);  
                }                                     
                cek_validasi();  
              }
          } );   
      }   
  }         

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
  

  </script>