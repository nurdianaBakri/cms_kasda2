<select class="form-control" name="USERNAME" id="USERNAME" onchange="get_status()"> 
        <?php foreach ($data as $key) {  ?>
            <option value="<?= $key['USERNAME']; ?>"> <?= $key['USERNAME']." - ".$key['NM_USER'];?></option> 
        <?php }  ?> 
    </select>  