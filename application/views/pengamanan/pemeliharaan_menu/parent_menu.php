<select class="form-control"  name="parent_menu" id="parent_menu">
    <?php foreach ($data_parent as $key ) { ?>
        <option value="<?= $key['id_menu'] ?>" <?php if($key['id_menu']==$id_parent){ echo "selected"; } ?>><?= $key['menu_name'] ?></option> 
    <?php } ?>
</select>

<script type="text/javascript"> 
    $( document ).ready(function() {   
        $('select').select2();    
    });  
</script>