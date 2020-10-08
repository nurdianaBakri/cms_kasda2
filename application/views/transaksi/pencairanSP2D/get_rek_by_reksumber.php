   <?php 
    if ($jenis_aksi=="add")
    { 
      foreach ($data as $data){ ?> 
        <option value="<?php echo $data['NO_REK'] ?>"><?php echo $data['NO_REK']." - ".$data['NM_PEMILIK'] ?></option>  
        <?php } ?> 
    <?php }
    else  {   
       foreach ($data as $data){ ?> 
        <option value="<?php echo $data['NO_REK'] ?>" <?php if($data['NO_REK']==$data['NO_REK']){echo "selected";} ?>><?php echo $data['NO_REK']." - ".$data['NM_PEMILIK'] ?></option> 
        <?php } ?> 
    <?php  } ?> 