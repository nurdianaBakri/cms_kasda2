  <select class="form-control js-example-basic-single" id="bank_penerima" name="bank_penerima" >  
   <?php  
      foreach ($bank as $bank){ ?> 
        <option value="<?php echo $bank['KD_BANK'] ?>" <?php if($bank['KD_BANK']==$KD_BANK){ echo "selected";} ?>><?php echo $bank['KD_BANK']." - ".$bank['NM_BANK'] ?></option>  
        <?php } ?>  
    </select>