<select class="form-control"  name="kd_wewenang" id="kd_wewenang">
    <?php foreach ($data as $key ) { ?>
        <option value="<?= $key['kd_wewenang'] ?>"><?=  $key['kd_wewenang']." - ".$key['nama_wewenang'] ?></option> 
    <?php } ?>
</select>