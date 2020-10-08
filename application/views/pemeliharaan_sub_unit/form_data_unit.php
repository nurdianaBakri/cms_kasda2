  <?php
  if ($jenis_aksi=="add")
  { 
    foreach ($unit as $unit): ?>
      <option value="<?php echo $unit['KD_UNIT'] ?>"><?php echo $unit['KD_UNIT']." - ".$unit['NM_UNIT'] ?></option>
      <?php endforeach ?> 
  <?php }
  else  {   
     foreach ($unit as $unit): ?>
        <option value="<?php echo $unit['KD_UNIT'] ?>" <?php if ($unit['KD_UNIT'] == $data['KD_UNIT']) echo ' selected';?>><?php echo $unit['KD_UNIT']." - ".$unit['NM_UNIT'] ?></option>
      <?php endforeach ?> 
  <?php  } ?>  