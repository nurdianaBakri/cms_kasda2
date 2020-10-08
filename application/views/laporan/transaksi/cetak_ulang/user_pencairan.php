      <select class="form-control" name="user_id"> 
        <?php foreach ($data as $key) {  ?>
            <option value="<?= $key->user_verifikasi; ?>"> <?= $key->user_verifikasi;?></option> 
        <?php }  ?> 
    </select>  
   