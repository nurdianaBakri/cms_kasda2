  <?php
      if ($jenis_aksi=="add")
      { 
        foreach ($bidang as $bidang): ?>
          <option value="<?php echo $bidang['KD_BIDANG'] ?>"><?php echo $bidang['KD_BIDANG']." - ".$bidang['NM_BIDANG'] ?></option>
          <?php endforeach ?> 
      <?php }
      else  {   
         foreach ($bidang as $bidang): ?>
            <option value="<?php echo $bidang['KD_BIDANG'] ?>" <?php if ($bidang['KD_BIDANG'] == $data['KD_BIDANG']) echo ' selected';?>><?php echo $bidang['KD_BIDANG']." - ".$bidang['NM_BIDANG'] ?></option>
          <?php endforeach ?> 
      <?php  } ?>  