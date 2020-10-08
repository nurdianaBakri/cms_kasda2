 
                <form id="myForm">
        <div class="panel panel-success">
            <div class="panel-heading" role="tab" id="headingOne_2">
                <h4 class="panel-title">
                    Informasi Pemda
                </h4>
            </div>
            <div id="collapseOne_2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_2">
                <div class="panel-body">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 

                      <input type="hidden" id="USER_INPUT" name="USER_INPUT" value="00001" >
                      <input type="hidden" id="USER_UPDATE" name="USER_UPDATE" value="00001" >
                      <input type="hidden" id="jenis_aksi" name="jenis_aksi" value="<?php echo $jenis_aksi ?>" >

                       <div class="row">
                            <div class="col-md-2">
                                <label for="KD_KASDA">Kode Pemda</label>
                            </div>
                            <div class="col-md-10"> 
                                <input type="text" class="form-control" id="KD_KASDA" name="KD_KASDA" value="<?php echo $data_kasda['KD_KASDA'] ?>" <?php if ($jenis_aksi=="edit"){ echo "readonly"; } ?> maxlength="5">
                            </div>
                        </div>

    
                        <div class="row">
                          <div class="col-md-2">
                            <label for="nama">Nama Pemda</label>
                          </div>
                          <div class="col-md-10">
                            <input type="text" id="NM_KASDA" name="NM_KASDA" value="<?php echo $data_kasda['NM_KASDA'] ?>"  class="form-control field_wajib" required />
                          </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label for="alamat">Alamat</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" id="ALAMAT_KASDA" name="ALAMAT_KASDA" value="<?php echo $data_kasda['ALAMAT_KASDA'] ?>"  class="form-control field_wajib" required />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label for="kota">Kota</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" id="KOTA" name="KOTA" value="<?php echo $data_kasda['KOTA'] ?>"  class="form-control field_wajib" required />
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="no">No. Telp 1</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="number" id="NO_TELP_1" name="NO_TELP_1" value="<?php echo $data_kasda['NO_TELP_1'] ?>"  class="form-control field_wajib" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4" >
                                        <label for="no2">No. Telp 2</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="number" id="NO_TELP_2"  name="NO_TELP_2" value="<?php echo $data_kasda['NO_TELP_2'] ?>"  class="form-control field_wajib" required /> 
                                    </div>
                                </div>
                            </div>  
                        </div>
                        <div class="row">

                             <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4" >
                                       <label for="no">No. Fax</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" id="FAX" name="NO_FAX" value="<?php echo $data_kasda['NO_FAX'] ?>"  class="form-control field_wajib" required />
                                    </div>
                                </div>
                            </div> 

                             <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4" >
                                         <label for="no2">NPWP</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" id="NPWP"  name="NPWP" value="<?php echo $data_kasda['NPWP'] ?>"  class="form-control field_wajib" required />
                                    </div>
                                </div>
                            </div>  
                        </div> 
                    </div> 
                </div>  
            </div>
        </div> 

        <div class="panel panel-success">
            <div class="panel-heading" role="tab" id="headingOne_2">
                <h4 class="panel-title">
                    Pejabat Pemda
                </h4>
            </div>
            <div id="collapseOne_2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_2">
                <div class="panel-body">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
                        <div class="row">

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4" >
                                       <label for="KEPALA_DAERAH">Kepala Daerah</label>
                                    </div>
                                    <div class="col-md-8">
                                         <input type="text" id="KEPALA_DAERAH" class="form-control" name="KEPALA_DAERAH" value="<?php echo $data_kasda['KEPALA_DAERAH'] ?>" /> 
                                    </div>
                                </div>
                            </div>  
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="KBUD">KBUD</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" id="KBUD" class="form-control" name="KBUD" value="<?php echo $data_kasda['KBUD'] ?>" />
                                    </div>
                                </div>
                            </div>   
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-md-4">
                                    <label for="JABATAN">Jabatan</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="JABATAN" class="form-control" name="JABATAN" value="<?php echo $data_kasda['JABATAN'] ?>" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-4">
                                    <label for="NIP_KBUD">NIP</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="number" id="NIP_KBUD" class="form-control" name="NIP_KBUD" value="<?php echo $data_kasda['NIP_KBUD'] ?>" />
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6"> 
                                <div class="col-md-4">
                                    <label for="SEKDA">SEKDA</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="SEKDA" class="form-control" name="SEKDA" value="<?php echo $data_kasda['SEKDA'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                <div class="col-md-4">
                                    <label for="PPKD">PPKD</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="PPKD" class="form-control" name="PPKD"  value="<?php echo $data_kasda['PPKD'] ?>">
                                </div>
                            </div>
                           
                        </div>
                        <div class="row">
                            <div class="col-md-6">

                                <div class="col-md-4">
                                    <label for="NIP_SEKDA">NIP</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="number" id="NIP_SEKDA" class="form-control" name="NIP_SEKDA" value="<?php echo $data_kasda['NIP_SEKDA'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                <div class="col-md-4">
                                    <label for="NIP_PPKD">NIP</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="number" id="NIP_PPKD" class="form-control" name="NIP_PPKD" value="<?php echo $data_kasda['NIP_PPKD'] ?>">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">  
                                <div class="col-md-2">
                                    <label for="BUD">BUD</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" id="BUD" name="BUD" value="<?php echo $data_kasda['BUD'] ?>"  class="form-control field_wajib" required />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">  
                                <div class="col-md-2">
                                    <label for="NIP_BUD">NIP</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="number" id="NIP_BUD" name="NIP_BUD" value="<?php echo $data_kasda['NIP_BUD'] ?>"  class="form-control field_wajib" required />
                                </div>
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
                var KD_KASDA = $("#KD_KASDA").val();
                var NM_KASDA = $("#NM_KASDA").val();
                var ALAMAT_KASDA = $("#ALAMAT_KASDA").val(); 
                var NO_TELP_1 = $('#NO_TELP_1').val();
                var NO_TELP_2 = $('#NO_TELP_2').val(); 
                var NPWP = $('#NPWP').val();
                var USER_INPUT = $('#USER_INPUT').val();
                var NO_FAX = $('#NO_FAX').val();
                var TGL_IMPLEMENTASI = $('#TGL_IMPLEMENTASI').val();
                var KOTA = $('#KOTA').val();
                var KD_KASDA = $('#KD_KASDA').val(); 
                var BUD = $('#BUD').val();
                var NIP_BUD = $('#NIP_BUD').val();

                if (!(KD_KASDA == "" || NM_KASDA == "" || ALAMAT_KASDA == "" || NPWP=="" || USER_INPUT=="" || NO_FAX=="" || TGL_IMPLEMENTASI=="" || KOTA=="" || KD_KASDA=="" || BUD=="" || NIP_BUD==="")) { 
                // To Enable Submit Button
                $("#submit").removeAttr('disabled'); 
                }
            } 

            function reset_form(){
                $('.field_wajib').val(""); 
            }  

        </script>