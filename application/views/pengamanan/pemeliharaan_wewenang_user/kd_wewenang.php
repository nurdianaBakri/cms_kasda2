<select class="form-control"  name="kd_wewenang" id="kd_wewenang" >
    <?php foreach ($wewenang as $key ) { ?>
        <option value="<?= $key['kd_wewenang'] ?>" <?php if( $key['kd_wewenang']==$kd_wewenang ){echo "selected";} ?> ><?=  $key['kd_wewenang']." - ".$key['nama_wewenang'] ?></option> 
    <?php } ?>
</select>