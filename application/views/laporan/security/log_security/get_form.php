<form role="form" id="myForm">
    <input type="hidden"  name="jenis_aksi" value="tambah" id="jenis_aksi">
    <input type="hidden"  name="id_interface" value="" id="ID_INTERFACE">
    <div class="row">
        <div class="col-md-2">
            <label>KD Kasda</label>
        </div>
        <div class="col-md-8">
            <?php
            if ($this->session->userdata('is_super_admin')==TRUE || $this->session->userdata('is_super_admin')==1) {
            ?>
            <select class="form-control" name="KD_KASDA" id="KD_KASDA" onchange="reload_data()">
                <?php foreach ($kasda as $key) {  ?>
                    <option value="<?= $key->KD_KASDA; ?>"> <?= $key->KD_KASDA." - ".$key->NM_KASDA;?></option>
                <?php }  ?>
            </select>
            <?php }
            else
            {
                //get nama kasda by kd_kasda
                $KD_KASDA = $this->session->userdata('KD_KASDA');
                $this->db->select('NM_KASDA');
                $this->db->where('KD_KASDA',$KD_KASDA);
                $nm_kasda =  $this->db->get('ref_kasda')->row()->NM_KASDA;
            ?>
            <input readonly type="text" class="form-control" value="<?= $KD_KASDA.' - '.$nm_kasda; ?>" name="KD_KASDA2">
            <input readonly type="hidden" class="form-control" value="<?= $this->session->userdata('KD_KASDA'); ?>" name="KD_KASDA">
            <?php }  ?>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-warning waves-effect" onclick="print_user()">
                <i class="material-icons">print</i>
                <span>Print</span>
            </button> 
        </div>
    </div>  
</form> 
            

<script type="text/javascript">
     $( document ).ready(function() {  
        $('select').select2();  
    }); 

     function print_user() {    

        var url_controller  = $('#url').val(); 
        var url = "<?php echo base_url() ?>"+url_controller+"print/"+$('#KD_KASDA').val();
        console.log(url); 

        var win = window.open(url, '_blank');
        if (win) {
            //Browser has allowed it to be opened
            win.focus();
        } else {
            //Browser has blocked it
            alert('Please allow popups for this website');
        } 
    }    
</script>