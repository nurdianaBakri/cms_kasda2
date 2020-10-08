<script src="<?php echo base_url()."assets/" ?>plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="<?php echo base_url()."assets/" ?>plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>

<script type="text/javascript">
    $(function () {
    $('.js-basic-example').DataTable({
        responsive: true, 
        autoWidth : false, 
    });   
});
</script>  


<form role="form" id="myForm2">   

<h3>HARI LIBUR</h3>

<input type="hidden" value="<?= $KD_KASDA; ?>" name="KD_KASDA">

    <div class="panel panel-success">
        <div class="body">  
            <div class="table-responsive" id="table-responsive">
                <table class="table js-basic-example dataTable">
                <!-- <table class="table table-bordered table-striped table-hover js-basic-example dataTable"> -->
                    <thead>
                        <tr> 
                            <th width="5%">Hari</th>  
                            <th width="20%">Status Aktif</th>  
                        </tr> 
                    </thead>
                <tbody>   
                    <tr>          
                        <td>Senin</td>    
                        <td> 
                            <input type="checkbox" id="basic_checkbox_1" class="filled-in" id="SENIN" name="SENIN" <?php if($data['SENIN']== "on"){ echo "checked";}  ?>  />
                            <label for="basic_checkbox_1"> </label>
                        </td>        
                    </tr>    

                    <tr>          
                        <td>Selasa</td>    
                        <td> 
                            <input type="checkbox" id="basic_checkbox_2" class="filled-in" id="SELASA" name="SELASA"   <?php if($data['SELASA']=="on"){ echo "checked";}  ?>  />
                            <label for="basic_checkbox_2"> </label>
                        </td>        
                    </tr>     

                    <tr>          
                        <td>Rabu</td>    
                        <td> 
                            <input type="checkbox" id="basic_checkbox_3" class="filled-in" id="RABU" name="RABU"  <?php if($data['RABU']=="on"){ echo "checked";}  ?>  />
                            <label for="basic_checkbox_3"> </label>
                        </td>        
                    </tr>     

                    <tr>          
                        <td>Kamis</td>    
                        <td> 
                            <input type="checkbox" id="basic_checkbox_4" class="filled-in" id="KAMIS" name="KAMIS" <?php if($data['KAMIS']=="on"){ echo "checked";}  ?>  />
                            <label for="basic_checkbox_4"> </label>
                        </td>        
                    </tr>     

                    <tr>          
                        <td>Jum'at</td>    
                        <td> 
                            <input type="checkbox" id="basic_checkbox_5" class="filled-in" id="JUMAT" name="JUMAT"  <?php if($data['JUMAT']=="on"){ echo "checked";}  ?>  />
                            <label for="basic_checkbox_5"> </label>
                        </td>        
                    </tr>     

                    <tr>          
                        <td>Sabtu</td>    
                        <td> 
                            <input type="checkbox" id="basic_checkbox_6" class="filled-in" id="SABTU" name="SABTU"   <?php if($data['SABTU']=="on"){ echo "checked";}  ?>  />
                            <label for="basic_checkbox_6"> </label>
                        </td>        
                    </tr>     

                    <tr>          
                        <td>Minggu</td>    
                        <td> 
                            <input type="checkbox" id="basic_checkbox_7" class="filled-in" id="MINGGU" name="MINGGU"  <?php if($data['MINGGU']=="on"){ echo "checked";}  ?>  />
                            <label for="basic_checkbox_7"> </label>
                        </td>        
                    </tr>     
                </tbody>
                </table>
            </div> 
        </div>
    </div>  
</form>

<button type="button" class="btn btn-warning waves-effect" onclick="reset()">
    <i class="material-icons">cached</i>
    <span>Reset</span>
</button> 

<button type="button" class="btn btn-success waves-effect button_print" onclick='save();'>
    <i class="material-icons">print</i>
    <span>save</span>
</button>   
