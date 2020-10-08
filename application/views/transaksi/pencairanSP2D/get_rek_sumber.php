<?php 
    if ($jenis_aksi=="add")
    { 
      foreach ($data as $data){ ?> 
        <option value="<?php echo $data['KD_SUMBER_DANA'] ?>"><?php echo $data['KD_SUMBER_DANA']." - ".$data['NM_SUMBER_DANA'] ?></option>  
        <?php } ?> 
    <?php }
    else  {   
       foreach ($data as $data){ ?> 
        <option value="<?php echo $data['KD_SUMBER_DANA'] ?>" <?php if($data['KD_SUMBER_DANA']==$data['KD_SUMBER_DANA']){echo "selected";} ?>><?php echo $data['KD_SUMBER_DANA']." - ".$data['NM_SUMBER_DANA'] ?></option> 
        <?php } ?> 
    <?php  } ?>