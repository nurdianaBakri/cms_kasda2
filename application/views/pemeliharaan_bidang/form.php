 
<div id="collapseOne_2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_2">
    <div class="panel-body">
        <div class="panel-body">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <form name="myForm" id="myForm">

                    <input type="hidden" id="USER_INPUT" name="USER_INPUT" value="00001" >
                    <input type="hidden" id="USER_UPDATE" name="USER_UPDATE" value="00001" >
                    <input type="hidden" id="jenis_aksi" name="jenis_aksi" value="<?php echo $jenis_aksi ?>" >
                    <input type="hidden" id="KD_DATA_BIDANG" name="KD_DATA_BIDANG" value="<?php echo $data['KD_DATA_BIDANG'] ?>" >
                    
                    <div class="row">
                        <div class="col-md-3">
                            <label for="KD_URUSAN">Kode Urusan</label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-control" id="KD_URUSAN" name="KD_URUSAN" onchange="reload_data()">
                                <?php
                                if ($jenis_aksi=="add")
                                {
                                foreach ($urusan as $urusan) {?>
                                <option value="<?php echo $urusan->KD_URUSAN ?>"><?php echo $urusan->KD_URUSAN." - ".$urusan->NM_URUSAN ?></option>
                                <?php }
                                }
                                else  {   foreach ($urusan as $urusan){ ?>
                                <option value="<?php echo $urusan->KD_URUSAN ?>" <?php if ($urusan->KD_URUSAN == $data['KD_URUSAN']) echo ' selected';?>><?php echo $urusan->KD_URUSAN." - ".$urusan->NM_URUSAN ?></option>
                                <?php }
                                } ?>
                            </select>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="KD_BIDANG">Kode Bidang</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="KD_BIDANG" name="KD_BIDANG" value="<?php echo $data['KD_BIDANG'] ?>" maxlength="2">
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-3">
                            <label for="NM_BIDANG">Nama Bidang</label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="NM_BIDANG" name="NM_BIDANG" value="<?php echo $data['NM_BIDANG'] ?>" >
                        </div>
                    </div>
                </form> 

            </div>
            <center>
                <button type="button" class="btn btn-success waves-effect reset"  onclick="reset_form()">
                    <i class="material-icons">cached</i>
                    <span>Reset</span>
                </button> 
                
                <button type="submit" id="submit" class="btn btn-success waves-effect" onclick="update_and_save()">
                    <i class="material-icons saveupdate">save</i>
                    <span>Save</span>
                </button>
                
                <button type="button" class="btn btn-success waves-effect" disabled>
                    <i class="material-icons">print</i>
                    <span>Print</span>
                </button>
            </center>
            
        </div>
    </div>
    
</div>
        
    <script type="text/javascript">
       $(document).ready(function(){   
        $('select').select2(); 
    });    

       function update_and_save()
        {     
          var check = validateForm();
          console.log(check);
          if (check==false)
          {

          }
          else{
                var data  = $("#myForm").serialize();   
                  console.log(data);

                  var url = "<?php echo base_url() ?>"+'/parameterorganisasi/PemeliharaanBidang/save';  
                   $.ajax( {  
                        type: "POST",
                        url: url,
                        data: data,
                        success: function( response ) {  
                            try{  
                                // $("#largeModal").modal('hide'); 
                                var obj = jQuery.parseJSON(response);  
                                    //tampilkan modal
                                $('.modal-body').text( obj['pesan']); 
                                $('.modal-footer').show();
                                 $('#largeModal').modal({
                                    backdrop: 'static',
                                    keyboard: false
                                });

                                 reload_data(); 
                            }catch(e) {  
                                alert('Exception while request..');
                            }  
                        }
                    } ); 
            }
                  
        } 

    function get_kode_terakhir() {
        var KD_URUSAN = $('#KD_URUSAN').val(); 
        var url = "<?php echo base_url() ?>"+'/parameterorganisasi/PemeliharaanBidang/get_kode_bidang_by_kode_urusan/'+KD_URUSAN;
          // console.log(url); 

        $.ajax( {  
            type: "POST",
            url: url,
            data: {},
            success: function( response ) {  
                // console.log(response);
                try{   
                    $("#KD_BIDANG").val(response); 
                }catch(e) {  
                    alert('Exception while request..');
                }  
            }
        } );   
    }
             

    function validateForm() {
      var KD_BIDANG = document.forms["myForm"]["KD_BIDANG"].value;
      var NM_BIDANG = document.forms["myForm"]["NM_BIDANG"].value; 
      if (KD_BIDANG == "" || NM_BIDANG  == "") {
        alert("Name must be filled out");
        $("#submit").removeAttr('disabled'); 

        return false;
      }
      else
      {
        return true;
      }
    }


    function reset_form(){
        $('.input-visible').val(""); 
    }  

</script>