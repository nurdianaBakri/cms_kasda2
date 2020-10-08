<script src="<?php echo base_url()."assets/" ?>plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="<?php echo base_url()."assets/" ?>plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script> 

<script type="text/javascript">
    $(function () {
    $('.js-basic-example').DataTable({
        responsive: true, 
        autoWidth : false, 
    });   
});
</script>  


<form role="form" id="myForm2">   

<input type="hidden" value="<?= $kd_wewenang; ?>" name="kd_wewenang">

    <div class="panel panel-success">
        <div class="body">  
            <div class="table-responsive" id="table-responsive">
                <table class="table js-basic-example dataTable">
                <!-- <table class="table table-bordered table-striped table-hover js-basic-example dataTable"> -->
                    <thead>
                        <tr> 
                            <th width="5%">Kode Menu</th>  
                            <th width="20%">Nama Menu</th>  
                        </tr> 
                    </thead>
                <tbody>  
                 <?php       
                    
                    $data2 = explode(",",$data['id_menu']);  
                    foreach ($menu1 as $key) { ?>  
                    <tr style="background-color:grey;">          
                        <td> 
                            <input type="checkbox" id="basic_checkbox_<?php echo $key['id_menu'] ?>" class="filled-in" id="id_menu" name="id_menu[]" value="<?php echo $key['id_menu'] ?>"  <?php if(in_array($key['id_menu'], $data2)){ echo "checked";}  ?>  />
                            <label for="basic_checkbox_<?php echo $key['id_menu'] ?>"><?php echo $key['id_menu'] ?></label>
                        </td>        
                        <td><?= $key['menu_name'] ?></td>    
                    </tr>    
                    <?php    
                    
                    //get menu level 3
                    $where = array(
                        // 'level_menu' => 2,
                        'parent_menu' => $key['id_menu'],
                    ); 
                    $menu2 = $this->M_pemeliharaanMenu->detail($where);

                    if($menu2->num_rows()>0){
                        foreach ($menu2->result_array() as $key2) { ?> 
                            <tr>   
                                <td> 
                                    <input type="checkbox" id="basic_checkbox_<?php echo $key2['id_menu'] ?>" class="filled-in" id="id_menu" name="id_menu[]" value="<?php echo $key2['id_menu'] ?>" <?php if(in_array($key2['id_menu'], $data2)){ echo "checked";}  ?>   />
                                    <label for="basic_checkbox_<?php echo $key2['id_menu'] ?>"><?php echo $key2['id_menu'] ?></label>
                                 </td>           
                                <td><?= $key2['menu_name'] ?></td>    
                            </tr>  

                            <!-- get menu level 3 -->
                            <?php $where = array(
                                // 'level_menu' => 3,
                                'parent_menu' => $key2['id_menu'],
                            ); 
                            $menu3 = $this->M_pemeliharaanMenu->detail($where);
                            if($menu3->num_rows()>0){
                                foreach ($menu3->result_array() as $key3) { ?> 
                                    <tr> 
                                        <td> 
                                            <input type="checkbox" id="basic_checkbox_<?php echo $key3['id_menu'] ?>" class="filled-in" id="id_menu" name="id_menu[]" value="<?php echo $key3['id_menu'] ?>"  <?php if(in_array($key3['id_menu'], $data2)){ echo "checked";}  ?>/>
                                            <label for="basic_checkbox_<?php echo $key3['id_menu'] ?>"><?php echo $key3['id_menu'] ?></label>
                                        </td>      
                                        <td><?= $key3['menu_name'] ?></td>    
                                    </tr>
                                <?php }
                            }   
                        }  
                    }  
                            
                } ?> 
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
