
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
                      <input type="text" id="jenis_aksi" name="jenis_aksi" value="<?php echo $jenis_aksi ?>" >
   
                        <div class="row ">
                          <div class="col-md-2">
                            <label for="kode">Kode Pemda</label>
                          </div>
                          <div class="col-md-10">
                            <input type="number" id="KD_KASDA" maxlength="20" minlength="5" name="KD_KASDA" class="form-control" value="<?php echo $data_kasda['KD_KASDA'] ?>" <?php if ($jenis_aksi=="edit"){ echo "disabled='true'"; } ?>>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-2">
                            <label for="nama">Nama Pemda</label>
                          </div>
                          <div class="col-md-10">
                            <input type="text" id="NM_KASDA" name="NM_KASDA" value="<?php echo $data_kasda['NM_KASDA'] ?>" required>
                          </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label for="alamat">Alamat</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" id="ALAMAT_KASDA" name="ALAMAT_KASDA" value="<?php echo $data_kasda['ALAMAT_KASDA'] ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label for="kota">Kota</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" id="KOTA" name="KOTA" value="<?php echo $data_kasda['KOTA'] ?>" required>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="no">No. Telp 1</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="number" id="NO_TELP_1" name="NO_TELP_1" value="<?php echo $data_kasda['NO_TELP_1'] ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4" >
                                        <label for="no2">No. Telp 2</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="number" id="NO_TELP_2" value="" name="NO_TELP_2" value="<?php echo $data_kasda['NO_TELP_2'] ?>" required> 
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
                                        <input type="text" id="FAX" name="FAX" value="<?php echo $data_kasda['NO_FAX'] ?>" required>
                                    </div>
                                </div>
                            </div> 

                             <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4" >
                                         <label for="no2">NPWP</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" id="NPWP"  name="NPWP" value="<?php echo $data_kasda['NPWP'] ?>" required>
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
                                         <input type="text" id="KEPALA_DAERAH" name="KEPALA_DAERAH" value="<?php echo $data_kasda['KEPALA_DAERAH'] ?>" required> 
                                    </div>
                                </div>
                            </div>  
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="KBUD">KBUD</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" id="KBUD" name="KBUD" value="<?php echo $data_kasda['KBUD'] ?>" required>
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
                                    <input type="text" id="JABATAN" name="JABATAN" value="<?php echo $data_kasda['JABATAN'] ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-4">
                                    <label for="NIP_KBUD">NIP</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="number" id="NIP_KBUD" name="NIP_KBUD" value="<?php echo $data_kasda['NIP_KBUD'] ?>" required>
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
                                    <input type="text" id="SEKDA" name="SEKDA" value="<?php echo $data_kasda['SEKDA'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                <div class="col-md-4">
                                    <label for="PPKD">PPKD</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" id="PPKD" name="PPKD"  value="<?php echo $data_kasda['PPKD'] ?>">
                                </div>
                            </div>
                           
                        </div>
                        <div class="row">
                            <div class="col-md-6">

                                <div class="col-md-4">
                                    <label for="NIP_SEKDA">NIP</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="number" id="NIP_SEKDA" name="NIP_SEKDA" value="<?php echo $data_kasda['NIP_SEKDA'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                <div class="col-md-4">
                                    <label for="NIP_PPKD">NIP</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="number" id="NIP_PPKD" name="NIP_PPKD" value="<?php echo $data_kasda['NIP_PPKD'] ?>">
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
                                    <input type="text" id="BUD" name="BUD" value="<?php echo $data_kasda['BUD'] ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">  
                                <div class="col-md-2">
                                    <label for="NIP_BUD">NIP</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="number" id="NIP_BUD" name="NIP_BUD" value="<?php echo $data_kasda['NIP_BUD'] ?>" required>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-success waves-effect reset">
            <i class="material-icons">cached</i>
            <span>Reset</span>
        </button>

        <button type="button" class="btn btn-success waves-effect" disabled>
            <i class="material-icons">cached</i>
            <span>Inquiry</span>
        </button>

        <?php  

        echo $jenis_aksi;
        if ($jenis_aksi=="edit")
        { ?>
                <button type="submit" class="btn btn-success waves-effect add">
                    <i class="material-icons saveupdate">update</i>
                    <span>Update</span>
                </button>  
        <?php }
        else if($jenis_aksi=="add")
        { ?>
                <button type="submit" class="btn btn-success waves-effect add">
                    <i class="material-icons saveupdate">save</i>
                    <span>Save</span>
                </button>  
        <?php } ?> 

        <button type="button" class="btn btn-success waves-effect">
            <i class="material-icons">delete_sweep</i>
            <span>Delete</span>
        </button>
        <button type="button" class="btn btn-success waves-effect" disabled>
            <i class="material-icons">print</i>
            <span>Print</span>
        </button> 


    <script>  
       $(document).ready(function() {  

            // $("#KD_KASDA").keyup(function() {   
            //     var KD_KASDA = $('#KD_KASDA').val(); 
            //     var panjang = KD_KASDA.length; 

            //     //  checkForm();  
            //     var url = "<?PHP echo base_url()."parameter/PemeliharaanKasda/cari_kesda/" ?>"+KD_KASDA;    
            //     if(panjang==5){  
            //         get_data_kasda(url);  
            //     }  
            //     else{ 
            //         $('#KD_KASDA').prop("disabled", false);  
            //         dissable_form(true); 
            //         reset_form();
            //     }
            // });  

            // $(".reset").click(function() { 
            //     reset_form(); 
            // }); 

            $( ".add" ).on( "click", function( event ) { 
                $.ajax( {
                    type: "POST",
                    url: "<?php echo base_url()."parameterorganisasi/PemeliharaanKasda/save" ?>",
                    data: {
                        NM_KASDA: $('#NM_KASDA').val(),
                        NPWP: $('#NPWP').val(),
                        ALAMAT_KASDA:  $('#ALAMAT_KASDA').val(),
                        USER_UPDATE: $('#USER_UPDATE').val(),
                        USER_INPUT: $('#USER_INPUT').val(),
                        KOTA: $('#KOTA').val(),
                        NO_TELP_1: $('#NO_TELP_1').val(),  
                        NO_TELP_2: $('#NO_TELP_2').val(),  
                        NO_FAX: $('#FAX').val(),  
                        NIP_SEKDA: $('#NIP_SEKDA').val(), 
                        SEKDA: $('#SEKDA').val(), 
                        KEPALA_DAERAH: $('#KEPALA_DAERAH').val(), 
                        JABATAN: $('#JABATAN').val(), 
                        KBUD: $('#KBUD').val(), 
                        NIP_KBUD: $('#NIP_KBUD').val(), 
                        PPKD: $('#PPKD').val(), 
                        NIP_PPKD: $('#NIP_PPKD').val(), 
                        BUD: $('#BUD').val(), 
                        NIP_BUD: $('#NIP_BUD').val(), 
                        jenis_aksi: $('#jenis_aksi').val(), 
                        KD_KASDA: $('#KD_KASDA').val(), 
                    },
                    success: function( response ) {
                        console.log(response);  
                        try{  
                            var obj = jQuery.parseJSON(response);
                            alert( obj['pesan']);  
                        }catch(e) {  
                            alert('Exception while request..');
                        }  
                    }
                } ); 
            });
        });

        function dissable_form(seting){
            $('#NM_KASDA').prop("disabled", seting);
            $('#NPWP').prop("disabled", seting);
            $('#KEPALA_DAERAH').prop("disabled", seting);
            $('#JABATAN').prop("disabled", seting);
            $('#ALAMAT_KASDA').prop("disabled", seting);
            $('#KOTA').prop("disabled", seting);
            $('#NO_TELP_1').prop("disabled", seting); 
            $('#NO_TELP_2').prop("disabled", seting); 
            $('#FAX').prop("disabled", seting); 
            $('#NIP_SEKDA').prop("disabled", seting); 
            $('#SEKDA').prop("disabled", seting); 
            $('#KBUD').prop("disabled", seting); 
            $('#NIP_KBUD').prop("disabled", seting); 
            $('#BUD').prop("disabled", seting); 
            $('#NIP_BUD').prop("disabled", seting); 
            $('#PPKD').prop("disabled", seting); 
            $('#NIP_PPKD').prop("disabled", seting); 
        }

        function reset_form(){
            $('#NM_KASDA').val("");
            $('#NPWP').val("");
            $('#KEPALA_DAERAH').val("");
            $('#JABATAN').val("");
            $('#ALAMAT_KASDA').val("");
            $('#KOTA').val("");
            $('#NO_TELP_1').val("");  
            $('#NO_TELP_2').val("");  
            $('#FAX').val("");  
            $('#NIP_SEKDA').val(""); 
            $('#SEKDA').val(""); 
            $('#KBUD').val(""); 
            $('#NIP_KBUD').val(""); 
            $('#PPKD').val(""); 
            $('#NIP_PPKD').val(""); 
            $('#BUD').val(""); 
            $('#NIP_BUD').val(""); 
        }  

        function remove_spae(string) {
            return string.replace(/\s/g,'');
        }

        function get_data_kasda(url){ 
            dissable_form(false);   
            $('#AKSI_EDIT').val('false'); 

            $.ajax({    //create an ajax request to display.php
                type: "GET",
                url: url,             
                dataType: "json",   //expect html to be returned                
                success: function(response){  
                    console.log(response); 
                    if(response==null || response==""){
                        reset_form();   
                        $('#KD_KASDA').prop("disabled", false);  
                    }else
                    {
                        $('input').prop("disabled", false); 
                        $('#KD_KASDA').prop("disabled", false); 
                        $('#AKSI_EDIT').val('true');  
                        $('#NM_KASDA').val(response.NM_KASDA);
                        $('#NPWP').val(response.NPWP);
                        $('#KEPALA_DAERAH').val(response.KEPALA_DAERAH);
                        $('#JABATAN').val(response.JABATAN);
                        $('#ALAMAT_KASDA').val(response.ALAMAT_KASDA);
                        $('#KOTA').val(response.KOTA);
                        $('#NO_TELP_1').val(response.NO_TELP_1); 
                        $('#NO_TELP_2').val(response.NO_TELP_2); 
                        $('#FAX').val(response.NO_FAX); 
                        $('#NIP_SEKDA').val(response.NIP_SEKDA); 
                        $('#SEKDA').val(response.SEKDA); 
                        $('#KBUD').val(response.KBUD); 
                        $('#NIP_KBUD').val(response.NIP_KBUD); 
                        $('#BUD').val(response.BUD); 
                        $('#NIP_BUD').val(response.NIP_BUD); 
                        $('#PPKD').val(response.PPKD); 
                        $('#NIP_PPKD').val(response.NIP_PPKD); 
                    } 
                }
            });
        }

    </script> 