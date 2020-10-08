<form role="form" id="myForm">
    <input type="hidden"  name="jenis_aksi" value="tambah" id="jenis_aksi">
    <input type="hidden"  name="id_interface" value="" id="ID_INTERFACE">
    <div class="row">
        <div class="col-md-2">
            <label>KD Kasda</label>
        </div>
        <div class="col-md-10">
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
    </div>
    <div class="row">
        <div class="col-md-2">
            <label>Username Database</label>
        </div>
        <div class="col-md-4" >
            <input type="text" name="username" id="USERNAME" class="form-control form_visible">
        </div>
         <div class="col-md-2">
            <label>Password Database</label>
        </div>
        <div class="col-md-4" >
            <input type="text" name="password" id="PASSWORD" class="form-control form_visible">
        </div>
    </div> 

    <div class="row">
        <div class="col-md-2">
            <label>Nama Database</label>
        </div>
        <div class="col-md-4" >
            <input type="text" name="db_name" id="DB_NAME" class="form-control form_visible">
        </div>

         <div class="col-md-2">
            <label>Host</label>
        </div>
        <div class="col-md-4" >
            <input type="text" name="host" id="HOST" class="form-control form_visible">
        </div>
    </div> 
    
</form>

<button type="button" class="btn btn-warning waves-effect" onclick="reset()">
    <i class="material-icons">cached</i>
    <span>Reset</span>
</button>
<button type="button" class="btn btn-success waves-effect button_print" onclick='save();'>
    <i class="material-icons">print</i>
    <span>save</span>
</button> 

<script type="text/javascript">
     $( document ).ready(function() {  
        $('select').select2();  
    }); 
</script>