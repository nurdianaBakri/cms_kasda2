 <?php
  if ($jenis_aksi=="add")
  { 
    foreach ($user as $user): ?>
      <option value="<?php echo $user['USERNAME'] ?>"><?php echo $user['USERNAME'] ?></option>
      <?php endforeach ?> 
  <?php }
  else  {   
     foreach ($user as $user): ?>
        <option value="<?php echo $user['USERNAME'] ?>" <?php if($user['USERNAME']==$data['USERNAME']){echo "selected"; } ?> ><?php echo $user['USERNAME']." - ".$user['USERNAME'] ?></option>
      <?php endforeach ?> 
  <?php  } ?>