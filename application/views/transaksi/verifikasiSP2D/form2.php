            <div class="panel panel-success">
                <div class="panel-heading">1 - Data SP2D</div>
                <div class="panel-body form_utama">
                        <input type="hidden" name="url_inquery" value="<?php echo $url_inquery ?>" id="url_inquery"> 
                          <?php 
                            $username = $this->session->userdata('username');  
                            $kd_kasda = $this->session->userdata('KD_KASDA');  
                         ?>  
                          <input type="hidden" id="username" name="username" value="<?php echo $username ?>" > 
                          <input type="hidden" id="KD_KASDA" name="KD_KASDA" value="<?php echo $kd_kasda ?>" > 
                          <input type="hidden" id="jenis_aksi" name="jenis_aksi" value="<?php echo $jenis_aksi ?>" > 
                          <input type="hidden" id="KD_DATA" name="KD_DATA" value="<?php echo $KD_DATA ?>" > 

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
                                <input type="text" id="NO_SP2D" class="form-control input-visible" name="NO_SP2D" value="<?php echo $NO_SP2D ?>" > 
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
                                <input type="text" id="Keterangan" class="form-control input-visible" name="Keterangan" value="<?php echo $Keterangan ?>" readonly >
                            </div>  
                        </div> 
                         
                        <div class="row"> 
                            <div class="col-md-2">
                              <label for="No_SPM">No. SPM</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" id="No_SPM" class="form-control input-visible" name="No_SPM" value="<?php echo $No_SPM ?>" readonly >
                            </div> 
                          
                            <div class="col-md-2">
                              <label for="Tgl_SPM">TGL. SPM</label>
                            </div>
                            <div class="col-md-4">
                                <input type="date" id="Tgl_SPM" class="form-control input-visible" name="Tgl_SPM" value="<?php echo $Tgl_SPM ?>" readonly >
                            </div> 
                        </div> 

                         <div class="row">
                            <div class="col-md-2">
                              <label for="Jn_SPM">JENIS SPM</label>
                            </div>
                            <div class="col-md-4">
                                 <select class="form-control" id="Jn_SPM" name="Jn_SPM" >  
                               <?php  
                                  foreach ($spm as $spm){ ?> 
                                    <option value="<?php echo $spm['KD_JENIS_SPM'] ?>"><?php echo $spm['KD_JENIS_SPM']." - ".$spm['NM_JENIS_SPM'] ?></option>  
                                    <?php } ?>  >  
                              </select>
                            </div>  
                            <div class="col-md-2">
                              <label for="TGL_CAIR">TGL CAIR</label>
                            </div>
                            <div class="col-md-4">
                              <input type="date" id="TGL_CAIR" class="form-control input-visible" name="TGL_CAIR" value="<?php echo $TGL_CAIR ?>">
                            </div>  
                        </div> 
                           <hr> 
                          
                        <div class="row">
                            <div class="col-md-2">
                              <label for="NO_REK">NO. Rekening</label>
                            </div>
                            <div class="col-md-4">
                                <input type="number" id="NO_REK" class="form-control input-visible" name="NO_REK"   value="<?php echo $NO_REK ?>" required readonly>
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
                                  foreach ($rek_sumber as $rek_sumber){ ?> 
                                    <option value="<?php echo $rek_sumber['KD_SUMBER_DANA'] ?>"><?php echo $rek_sumber['KD_SUMBER_DANA']." - ".$rek_sumber['NM_SUMBER_DANA'] ?></option>  
                                    <?php } ?>  
                              </select>
                            </div>  
                            <div class="col-md-2">
                              <label for="NO_REK_BYkdSumberDana">No. Rek</label>
                            </div>
                            <div class="col-md-4">
                              <select class="form-control" id="NO_REK_BYkdSumberDana" name="NO_REK_BYkdSumberDana" readonly>   
                              </select>
                            </div>  
                        </div> 

                         <hr>
                         <div class="row">
                            <div class="col-md-2">
                              <label for="NILAI_SP2D">Nilai SP2D</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" id="NILAI_SP2D" class="form-control input-visible" name="NILAI_SP2D" value="<?php echo number_format($NILAI_SP2D,2) ?>" required  readonly>
                            </div>  
                            <div class="col-md-2">
                              <label for="NILAI_POTONGAN">Potongan</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" id="NILAI_POTONGAN" class="form-control input-visible" name="NILAI_POTONGAN" value="<?php echo number_format($NILAI_POTONGAN,2) ?>" required readonly>
                            </div>  
                        </div>  
                          
                        <div class="row">
                            <div class="col-md-2">
                              <label for="NILAI_TRANSFER">Nilai Transfer</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" id="NILAI_TRANSFER" class="form-control input-visible" name="NILAI_TRANSFER" value="<?php echo number_format($NILAI_TRANSFER,2) ?>" required readonly>  
                            </div>  
                        </div>  
                    </div> 
                </div>   

                <script type="text/javascript">  

                  $("document").ready(function(){
                    $('input[type="text"]').on("keyup bind cut copy paste", function () {
                        //Put your validation logic here - this is the code that will fire on each keyup
                        cek_validasi();

                    });
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

                    if (!(KD_SKPD == "" || NO_SP2D=="" || Keterangan=="" || TGL_CAIR=="" )) { 
                        // To Enable Submit Button
                        $("#submit").removeAttr('disabled'); 
                    }
                    else
                    {
                      $('#submit').attr('disabled', 'disabled');  
                    }  
                  } 


                  /* $('#myForm > input').keyup(function() {

                          var empty = false;
                          $('#myForm > input').each(function() {
                              if ($(this).val() == '') {
                                  empty = true;
                              }
                          console.log(empty);

                          });

                          console.log(empty);

                          if (empty) {
                              $('#submit').attr('disabled', 'disabled'); // updated according to http://stackoverflow.com/questions/7637790/how-to-remove-disabled-attribute-with-jquery-ie
                          } else {
                              $('#submit').removeAttr('disabled'); // updated according to http://stackoverflow.com/questions/7637790/how-to-remove-disabled-attribute-with-jquery-ie
                          }
                      }); */  
              

              function reset_form(){
                  $('.input-visible').val(""); 
              }   
               
                  function cek_no_sp2d() {
                    var url_controller  = $('#url').val();   
                    var KD_KASDA  = $('#KD_KASDA').val();  
                    var NO_SP2D  = $('#NO_SP2D').val();  
                    var url = "<?php echo base_url() ?>"+"transaksi/Pembukaan_sp2d/cek_no_sp2d";   
                    console.log(url); 
                    $.ajax( {
                        type: "POST",
                        url: url,
                        data: { 
                          NO_SP2D : NO_SP2D,
                          KD_KASDA : KD_KASDA,
                        },
                        dataType: "json",
                        success: function( response ) { 
                          console.log(response); 
                          if (response.ada==true)
                          {   
                            //AUTO SELECT KODE_SKPD WHERE KD_SKPD SAMA DENGAN OUTPUT QUERY
                            get_rek_by_reksumber();
                            form_kd_skpd(response.Kd_Urusan+"."+response.Kd_Bidang+"."+response.Kd_Unit+"."+response.Kd_Sub);   
                            // get_bank_penerima(response.Bank_Penerima);   

                            $("#NO_REK_BYkdSumberDana").val(response.No_Rekening);  
                            $('#Keterangan').val(response.Keterangan); 
                            $('#Tgl_SP2D').val(response.Tgl_SP2D);  
                            $('#No_SPM').val(response.No_SPM);  
                            $('#Tgl_SPM').val(response.Tgl_SPM);  
                            $('#Jn_SPM').val(response.Jn_SPM);  
                            $('#TGL_CAIR').val(response.TglCair);  
                            $('#NO_REK').val(response.Rek_Penerima);  
                            $('#NPWP').val(response.NPWP);  
                            $('#NM_PEMILIK').val(response.Nm_Penerima);  

                            $('#NILAI_SP2D').autoNumeric('init');
                            $('#NILAI_SP2D').autoNumeric('set', response.TOTAL_SP2D);
 
                            $('#NILAI_TRANSFER').autoNumeric('init');
                            $('#NILAI_TRANSFER').autoNumeric('set', response.Nilai); 

                            // $('#TGL_CAIR').val(response.TGL_CAIR);  

                            $('#NILAI_POTONGAN').autoNumeric('init');
                            $('#NILAI_POTONGAN').autoNumeric('set', response.TOTAL_SP2D - response.Nilai);  
                            // $('#NILAI_POTONGAN').val(response.TOTAL_SP2D - response.Nilai);   
  
                            getPotonganByNoSP2D();  
                            //update field kd_skpd   

                            // console.log(response);   
                            if (response.STATUS==1)
                            {
                              $('.loading').hide(); 
                            }
                            else
                            {
                              $('.loading').hide();
                            }  
                            cek_validasi();    

                            //HIDE MODAL CARI
                            $('#cari').modal('toggle'); 

                            //TAMPILKAN ALERT SAAT USER CLICK SALAH SATU SPD2D
                            $("#exampleModal .modal-body").html(response.pesan); 
                            $("#exampleModal #exampleModalLabel").html("Pencarian SP2D"); 
                            $("#exampleModal").modal(); 

                           /* $(document).on('show.bs.modal', '.modal', function (event) {
                                var zIndex = 1040 + (10 * $('.modal:visible').length);
                                $(this).css('z-index', zIndex);
                                setTimeout(function() {
                                    $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
                                }, 0);
                            });*/
                            

                            // $('#exampleModal').focus()

                          }
                          else 
                          {   
                            var now = new Date(); 
                            var day = ("0" + now.getDate()).slice(-2);
                            var month = ("0" + (now.getMonth() + 1)).slice(-2); 
                            var today = now.getFullYear()+"-"+(month)+"-"+(day); 
                            
                            $("#NO_REK_BYkdSumberDana").val("");  
                            $('#Keterangan').val(""); 
                            $('#No_SPM').val("");  
                            $('#Tgl_SP2D').val(today);  
                            $('#Tgl_SPM').val(today);  
                            $('#TGL_CAIR').val("");  
                            $('#Jn_SPM').val("");  
                            $('#NO_REK').val("");  
                            $('#NPWP').val("");  
                            $('#NM_PEMILIK').val("");  
                            $('#NILAI_SP2D').val("");   
                            $('#NILAI_TRANSFER').val("");   
                            $('#NILAI_POTONGAN').val("");  

                            alert("Data tidak terdaftar"); 
                          }  
                        }
                    } );    
                }  

                $('#NO_SP2D').keypress(function(event){
  
                  var keycode = (event.keyCode ? event.keyCode : event.which);
                  if(keycode == '13'){
                    cek_no_sp2d();  
                  }

                }); 

              function getPotonganByNoSP2D() {  

                  var url_controller  = $('#url').val();  
                  var NO_SP2D  = $('#NO_SP2D').val();  

                  var url = "<?php echo base_url() ?>"+url_controller+"/getPotonganByNoSP2D/";   
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
                      }
                  } );    
                }     

                function form_kd_skpd(KD_SKPD) {
                  console.log(KD_SKPD);  
                  $("#KD_SKPD").val(KD_SKPD);
                  var url_controller  = $('#url').val();   
                  var url = "<?php echo base_url() ?>"+url_controller+"get_kd_skpd";   
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

              /*  function get_bank_penerima(KD_BANK) { 
                  var url_controller  = $('#url').val();   
                  var url = "<?php echo base_url() ?>"+url_controller+"get_bank_penerima";  
                  console.log(url); 
                  $.ajax( {
                      type: "POST",
                      url: url,
                      data: { 
                        KD_BANK:KD_BANK, 
                      },
                      dataType: "html",
                      success: function( response ) {  
                        $('.bank_penerima').html(response); 
                      }
                  } );       
                } */

                </script>


                          