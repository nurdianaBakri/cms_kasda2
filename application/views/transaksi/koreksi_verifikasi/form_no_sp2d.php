  <select class="form-control js-example-basic-single" id="No_SP2D" name="No_SP2D" >  
   <?php  
      foreach ($data->result_array() as $data){ ?> 
        <option value="<?php echo $data['No_SP2D'] ?>"><?php echo $data['No_SP2D'] ?></option>  
        <?php } ?>  
    </select>