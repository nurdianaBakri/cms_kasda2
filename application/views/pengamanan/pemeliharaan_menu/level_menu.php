
  <select class="form-control"  name="level_menu" id="kd_level_menu" onchange="get_perent_menu(this.value,null)">
    <?php
    for ($i=1; $i < 4; $i++) { ?>
        <option value="<?= $i; ?>"> <?= $i; ?></option>
    <?php } ?> 
    </select>

    <script type="text/javascript"> 
      $( document ).ready(function() {   
        $('select').select2();    
    });  
    </script>
