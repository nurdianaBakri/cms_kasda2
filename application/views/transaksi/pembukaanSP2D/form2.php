 

            <div class="panel panel-success">
                <div class="panel-heading">1 - Data SP2D</div>
                <div class="panel-body">
                        <input type="hidden" name="url_inquery" value="<?php echo $url_inquery ?>" id="url_inquery"> 
                          <?php 
                            $username = $this->session->userdata('username');  
                            $user_level = $this->session->userdata('LEVEL_USER');  
                            $KD_KASDA = $this->session->userdata('KD_KASDA');  
                         ?>  
                          <input type="hidden" id="username" name="username" value="<?php echo $username ?>" > 
                          <input type="hidden" id="level_user" value="<?php echo $user_level ?>" > 
                          <input type="hidden" id="KD_KASDA" name="KD_KASDA" value="<?php echo $KD_KASDA ?>" > 
                          <input type="hidden" id="jenis_aksi" name="jenis_aksi" value="<?php echo $jenis_aksi ?>" > 
                          <input type="hidden" id="KD_DATA" name="KD_DATA" value="<?php echo $KD_DATA ?>" > 
                          <input type="hidden" id="STATUS_SP2D" name="STATUS_SP2D" value="<?php echo $STATUS ?>" > 

                          <div class="row">
                            <div class="col-md-2">
                                <label for="KD_SKPD">Kode SKPD</label>
                            </div>
                            <div class="col-md-8 KD_SKPD"> 
                              <b class="loading">Loading...</b> 
                            </div>
                            <div class="col-md-2">
                               <a class="btn btn-success btn-block" onclick="open_modal()">...</a>
                            </div> 
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                              <label for="NO_SP2D">No. SP2D</label>  
                            </div>
                            <div class="col-md-4"> 
                                <input type="text" id="NO_SP2D" class="form-control input-visible" name="NO_SP2D" value="<?php echo $NO_SP2D ?>"> 
                            </div>  
                            <div class="col-md-2">
                              <label for="Tgl_SP2D">TGL. SP2D</label>
                            </div>
                            <div class="col-md-4">
                                <input type="date" id="Tgl_SP2D" class="form-control input-visible" name="Tgl_SP2D" value="<?php echo $Tgl_SP2D ?>" readonly>
                            </div> 
                        </div> 
                         
                         <div class="row">
                            <div class="col-md-2">
                              <label for="Keterangan">Keperluan</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" id="Keterangan" class="form-control input-visible" name="Keterangan" value="<?php echo $Keterangan ?>" >
                            </div>  
                        </div> 
                         
                        <div class="row"> 
                            <div class="col-md-2">
                              <label for="No_SPM">No. SPM</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" id="No_SPM" class="form-control input-visible" name="No_SPM" value="<?php echo $No_SPM ?>" >
                            </div> 
                          
                            <div class="col-md-2">
                              <label for="Tgl_SPM">TGL. SPM</label>
                            </div>
                            <div class="col-md-4">
                                <input type="date" id="Tgl_SPM" class="form-control input-visible" name="Tgl_SPM" value="<?php echo $Tgl_SPM ?>"  >
                            </div> 
                        </div> 

                         <div class="row">
                            <div class="col-md-2">
                              <label for="Jn_SPM">JENIS SPM</label>
                            </div>
                            <div class="col-md-4">
                                 <select class="form-control" id="Jn_SPM" name="Jn_SPM" >  
                               <?php 
                                if ($jenis_aksi=="add")
                                { 
                                  foreach ($spm as $spm){ ?> 
                                    <option value="<?php echo $spm['KD_JENIS_SPM'] ?>"><?php echo $spm['KD_JENIS_SPM']." - ".$spm['NM_JENIS_SPM'] ?></option>  
                                    <?php } ?> 
                                <?php }
                                else  {   
                                   foreach ($spm as $spm){ ?> 
                                    <option value="<?php echo $spm['KD_JENIS_SPM'] ?>" <?php if($spm['KD_JENIS_SPM']==$data['Jn_SPM']){echo "selected";} ?>><?php echo $spm['KD_JENIS_SPM']." - ".$spm['NM_JENIS_SPM'] ?></option> 
                                    <?php } ?> 
                                <?php  } ?>
                              </select>
                            </div>  
                            <div class="col-md-2">
                              <label for="TGL_CAIR">TGL CAIR</label>
                            </div>
                            <div class="col-md-4">

                            <?php     
                              $is_super_admin= $this->session->userdata('is_super_admin');
                              $is_data_entry= $this->session->userdata('is_data_entry');
                              $is_verifikator= $this->session->userdata('is_verifikator'); 

                              // var_dump($is_super_admin);
                              // var_dump($is_data_entry);
                              // var_dump($is_verifikator);
                            ?>
                              <input type="date" id="TGL_CAIR" class="form-control input-visible" name="TGL_CAIR" value="<?php echo $Tgl_SPM ?>" <?php if($is_data_entry==TRUE){ echo "readonly";} ?>>
                            </div>  
                        </div> 
                           <hr> 
                        <div class="row">
                            <div class="col-md-2">
                              <label for="NO_REK">NO. Rekening</label>
                            </div>
                            <div class="col-md-4">
                                <input type="number" id="NO_REK" class="form-control input-visible" name="NO_REK"  onkeyup="get_nama_pemilik2(this.value)" value="<?php echo $NO_REK ?>" required>
                            </div> 
                          
                            <div class="col-md-2">
                              <label for="NPWP">NPWP</label>
                            </div>
                            <div class="col-md-4">
                              <b class="loading">Loading...</b>
                                <input type="text" id="NPWP" class="form-control input-visible" name="NPWP" value="<?php echo $NPWP ?>" readonly>
                            </div> 
                        </div> 
                          <div class="row">
                            <div class="col-md-2">
                              <label for="NM_PEMILIK">NAMA PEMILIK</label>
                            </div>
                            <div class="col-md-10">
                                <b class="loading">Loading...</b>
                                <input type="text" id="NM_PEMILIK" class="form-control input-visible" name="NM_PEMILIK" value="<?php echo $NM_PEMILIK ?>" readonly>
                            </div>  
                        </div> 
                          <hr>
                         <div class="row">
                            <div class="col-md-2">
                              <label for="REK_SUMBER">Rekening Sumber</label>
                            </div>
                            <div class="col-md-4">
                                 <select class="form-control" id="KD_SUMBER_DANA" name="KD_SUMBER_DANA" onchange="get_rek_by_reksumber()">  
                               <?php 
                                if ($jenis_aksi=="add")
                                { 
                                  foreach ($rek_sumber as $rek_sumber){ ?> 
                                    <option value="<?php echo $rek_sumber['KD_SUMBER_DANA'] ?>"><?php echo $rek_sumber['KD_SUMBER_DANA']." - ".$rek_sumber['NM_SUMBER_DANA'] ?></option>  
                                    <?php } ?> 
                                <?php }
                                else  {   
                                   foreach ($rek_sumber as $rek_sumber){ ?> 
                                    <option value="<?php echo $rek_sumber['KD_SUMBER_DANA'] ?>" <?php if($rek_sumber['KD_SUMBER_DANA']==$data['KD_SUMBER_DANA']){echo "selected";} ?>><?php echo $rek_sumber['KD_SUMBER_DANA']." - ".$rek_sumber['NM_SUMBER_DANA'] ?></option> 
                                    <?php } ?> 
                                <?php  } ?>
                              </select>
                            </div>  
                            <div class="col-md-2">
                              <label for="NO_REK_BYkdSumberDana">No. Rek</label>
                            </div>
                            <div class="col-md-4">
                              <select class="form-control" id="NO_REK_BYkdSumberDana" name="NO_REK_BYkdSumberDana" >   
                              </select>
                            </div>  
                        </div> 

                         <hr>
                         <div class="row">
                            <div class="col-md-2">
                              <label for="NILAI_SP2D">Nilai SP2D</label>
                            </div>
                            <div class="col-md-4"> 
                                <input type="text" id="NILAI_SP2D" class="form-control input-visible rupiah"  data-a-dec="," data-a-sep="." name="NILAI_SP2D" onkeyup="kalkulasi_nilai_transfer()" value="<?php echo $NILAI_SP2D ?>" required >
                            </div>  
                            <div class="col-md-2">
                              <label for="NILAI_POTONGAN">Potongan</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" id="NILAI_POTONGAN" data-a-dec="," data-a-sep="." class="form-control input-visible" name="NILAI_POTONGAN" value="<?php echo $NILAI_POTONGAN ?>" required readonly>
                            </div>  
                        </div>  
                          
                        <div class="row">
                            <div class="col-md-2">
                              <label for="NILAI_TRANSFER">Nilai Transfer</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" id="NILAI_TRANSFER" data-a-dec="," data-a-sep="."  class="form-control input-visible" name="NILAI_TRANSFER" value="<?php echo $NILAI_TRANSFER ?>" required readonly>  
                            </div>  
                        </div>  
                    </div> 
                </div> 

              <script type="text/javascript" src="<?= base_url()."assets/autoNumeric/" ?>autoNumeric.js"></script>  
                <script type="text/javascript">  

                  $(document).ready(function(){  
                      $('.rupiah').autoNumeric('init'); 

                     /* $('#NILAI_TRANSFER').autoNumeric('init');*/ 
                      $('#NILAI_POTONGAN').autoNumeric('init');  
                  });    

                  function cek_validasi() {  
                   // Validating Fields
                  var KD_SKPD = $("#KD_SKPD").val();
                  var NO_SP2D = $("#NO_SP2D").val();
                  var Keterangan = $("#Keterangan").val();
                  var No_SPM = $("#No_SPM").val();   
                  var TGL_CAIR = $("#TGL_CAIR").val(); 
                  var Tgl_SPM = $("#Tgl_SPM").val(); 
                  var Tgl_SP2D = $("#Tgl_SP2D").val(); 
                  var NILAI_TRANSFER = $("#NILAI_TRANSFER").val(); 
                  var NILAI_POTONGAN = $("#NILAI_POTONGAN").val(); 
                  var NILAI_SP2D = $("#NILAI_SP2D").val();  
                  var NM_PEMILIK = $("#NM_PEMILIK").val(); 
                  var NO_REK = $("#NO_REK").val();   

                  if (!(KD_SKPD == "" || NO_SP2D=="" || Keterangan=="" )) { 
                      // To Enable Submit Button
                      $("#submit").removeAttr('disabled'); 
                  }
              }  

              function kalkulasi_nilai_transfer() { 
                var nilaipotonganTMP  = $('#NILAI_POTONGAN').val();  

                var sum = 0;
                $('.NILAI_PAJAK').each(function() {  
                    var self = $(this).autoNumeric('get'); 
                    sum += Number(self);
                    console.log(sum);
                });  

                $('#NILAI_POTONGAN').val(sum);

                var NILAI_TRANSFER  = $('#NILAI_TRANSFER');   


                // var self = $(this).autoNumeric('get');  
                // var NILAI_SP2D  = $('#NILAI_SP2D').val();   
                var NILAI_SP2D  = $('#NILAI_SP2D').autoNumeric('get');   
                var NILAI_TRANSFER_TMP = NILAI_SP2D - sum; 

                $('#NILAI_TRANSFER').autoNumeric('init');
                $('#NILAI_TRANSFER').autoNumeric('set', NILAI_TRANSFER_TMP);   
                
                // NILAI_TRANSFER.val( NILAI_TRANSFER_TMP);   
              }  

              function reset_form(){
                  $('.input-visible').val(""); 
              }   


              $('input#NO_SP2D').keypress(function(event){   
                console.log("cari by enter");
                
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if(keycode == '13'){ 
                  cek_no_sp2d();
                  get_potongan(); 
                } 
              });    

              function getPotonganByNoSP2D() { 
                $('.loading').show();   

                  var url_controller  = $('#url').val();  
                  var NO_SP2D  = $('#NO_SP2D').val();  

                  var url = "<?php echo base_url() ?>"+url_controller+"getPotonganByNoSP2D";   
                  console.log(url);
                  $.ajax( {
                      type: "POST",
                      url: url,
                      data: { 
                        No_SP2D :NO_SP2D
                      },
                      dataType: "html",
                      success: function( response ) {  
                        if (response!=null)
                        {  
                          $('.data_potongan').html(response); 
                        }
                        else
                        { 
                           get_potongan();
                        }
                          
                      }
                  } );    
                }     

                function form_kd_skpd(KD_SKPD) {  
                    // console.log(KD_SKPD);  
                  $("#KD_SKPD").val(KD_SKPD);
                  var url_controller  = $('#url').val();   
                  var url = "<?php echo base_url() ?>"+url_controller+"get_kd_skpd"; 
                  // console.log(url);  
                  $.ajax( {
                      type: "POST",
                      url: url,
                      data: { 
                        KD_SKPD :KD_SKPD
                      },
                      dataType: "html",
                      success: function( response ) {  
                        if (response!=null)
                        {  
                           $('.KD_SKPD').html(response);
                        }
                        else
                        { 
                           get_potongan();
                        } 
                      }
                  } );       
                }  
                </script>


                          