<select class="form-control"  name="username" id="username" onchange="get_wewenang(this.value)">
    <?php foreach ($data as $key ) { ?>
        <option value="<?= $key['USERNAME'] ?>"><?=  $key['USERNAME']." - ".$key['NM_USER'] ?></option> 
    <?php } ?>
</select>