        
     <select class="form-control js-example-basic-single" id="KD_SKPD" name="KD_SKPD"  >  
       <?php  
          foreach ($skpd as $skpd){ ?> 
            <option value="<?php echo $skpd['kd_gabungan'] ?>" <?php if($skpd['kd_gabungan']==$KD_SKPD){echo "selected";} ?>><?php echo $skpd['kd_gabungan']." - ".$skpd['nama_skpd'] ?></option>
            <?php }   ?>
      </select> 

      <script type="text/javascript">
        $(document).ready(function() {
        $('.js-example-basic-single').select2();
      });
      </script>