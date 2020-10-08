 
              <form id="myForm">  
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

                <?php 
                  // var_dump($skpd); 
                ?>
 
                 <div class="row">
                    <div class="col-md-2">
                        <label for="kd_bidang">Kode SKPD</label>
                    </div>
                    <div class="col-md-10"> 
                        <select class="form-control" id="KD_SKPD" name="KD_SKPD" style="width: 100%">  
                       <?php 
                           foreach ($skpd as $skpd){ ?> 
                            <option value="<?php echo $skpd['kd_gabungan'] ?>" <?php if($skpd['kd_gabungan']==$KD_SKPD){echo "selected";} ?>><?php echo $skpd['kd_gabungan']." - ".$skpd['nama_skpd'] ?></option> 
                            <?php } ?>  
                      </select>
                    </div>
                </div>
  
                  
                 <div class="row">
                    <div class="col-md-2">
                        <label for="NO_REK">No Rekening </label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" id="NO_REK" class="form-control input-visible" name="NO_REK" onkeyup="get_nama_pemilik2(this.value)" value="<?php echo $NO_REK ?>" >
                    </div>

                    <div class="col-md-2">
                        <label for="NM_PEMILIK">Nama Pemilik  </label>
                    </div>
                    <div class="col-md-4">
                        <input type="text" id="NM_PEMILIK" name="NM_PEMILIK" class="form-control input-visible" readonly value="<?php echo $NM_PEMILIK ?>"> 
                    </div>
                </div>   

                  <div class="row">
                    <div class="col-md-2">
                        <label for="STATUS">Status  </label>
                    </div>
                    <div class="col-md-10"> 
                       <select name="STATUS" id="STATUS" class="form-control" style="width: 100%"> 
                         <option value="1" <?php if($STATUS=="1"){ echo "selected";} ?>>Aktif</option>
                          <option value="0" <?php if($STATUS=="0"){ echo "selected";} ?>>Tidak Aktif</option> 
                      </select>  
                    </div>
                </div>  
                
                <P class="p_alert"></P>

            </form> 
 
   <script type="text/javascript">  

        $(document).ready(function(){   
            // get_kode_sumber_dana(); 
            $('.loading').hide(); 
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
                      pesan  = "<div class='alert alert-danger' role='alert'>"+response.Message+"</div>";
                  }   

                  $('.p_alert').html(pesan);  
                } 
                else{ 
                  $('#NM_PEMILIK').val(response.Message.result.NICKNM);  
                }                                     
                cek_validasi();  
              }
          } );   
      }   
  }         

     /*   function get_kode_sumber_dana() {
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
        }   */
         
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