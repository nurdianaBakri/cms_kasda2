 
  <?php foreach ($bidang as $bidang): ?>
    <option value="<?php echo $bidang['KD_BIDANG'] ?>"><?php echo $bidang['KD_BIDANG']." - ".$bidang['NM_BIDANG'] ?></option>
    <?php endforeach ?>  