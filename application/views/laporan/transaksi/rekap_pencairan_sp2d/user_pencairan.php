      <select class="form-control" name="user_id"> 
        <?php foreach ($data as $key) {  ?>
            <option value="<?= $key->USER_PENCAIRAN; ?>"> <?= $key->USER_PENCAIRAN;?></option> 
        <?php }  ?> 
    </select>  
   