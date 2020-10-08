  <?php foreach ($sumber_dana as $sumber_dana): ?>
    <option value="<?php echo $sumber_dana['KD_SUMBER_DANA'] ?>"><?php echo $sumber_dana['KD_SUMBER_DANA']." - ".$sumber_dana['NM_SUMBER_DANA'] ?></option>
    <?php endforeach ?>  