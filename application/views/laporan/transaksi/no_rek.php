<select class="form-control" name="no_rekening" id="no_rekening"> 
    <?php foreach ($data as $key) {  ?>
        <option value="<?= $key['NO_REK']; ?>"> <?= $key['NO_REK']." - ".$key['NM_PEMILIK'];?></option> 
    <?php }  ?> 
</select>