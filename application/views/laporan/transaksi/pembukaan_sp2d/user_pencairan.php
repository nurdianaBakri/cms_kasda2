      <select class="form-control" name="user_id"> 
        <?php foreach ($data as $key) {  ?>
            <option value="<?= $key->user_input; ?>"> <?= $key->user_input;?></option> 
        <?php }  ?> 
    </select>  
   