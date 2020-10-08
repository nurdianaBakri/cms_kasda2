<input type="hidden" name="url" value="<?php echo $url ?>" id="url"> 
<form role="form" id="myForm">
    <input type="hidden"  name="jenis_aksi" value="<?= $jenis_aksi ?>" id="jenis_aksi">
    <input type="hidden"  name="username_old"   id="username_old" value="<?= $old_username ?>">
    <input type="hidden"  name="USER_INPUT" value="<?= $this->session->userdata('username'); ?>" id="USER_INPUT">
    <div class="row">
        <div class="col-md-2">
            <label>KD Kasda</label>
        </div>
        <div class="col-md-10">
            <?php
            if ($this->session->userdata('is_super_admin')==TRUE || $this->session->userdata('is_super_admin')==1) {
            ?>
            <select class="form-control" name="KD_KASDA" id="KD_KASDA" style="width: 100%">
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
            <label>User ID</label>
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control" name="USERNAME" id="USERNAME" maxlength="5" value="<?= $USERNAME ?>" <?php if ($jenis_aksi=="update") {
                echo "readonly";
            } ?>>
        </div>

          <div class="col-md-2">
            <label>Nama User</label>
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control" name="NM_USER" id="NM_USER" value="<?= $NM_USER ?>" >
        </div>
    </div>
   
    <div class="row">
        <div class="col-md-2">
            <label>Status</label>
        </div>
        <div class="col-md-4 status_user">
            <select class="form-control"  name="status_user" id="status_user" style="width: 100%">
                <option value="0" <?php if($status_user==0){ echo "selected";} ?>> Tidak Aktif</option>
                <option value="1" <?php if($status_user==1){ echo "selected";} ?>>Aktif</option>
            </select>
        </div>
        <div class="col-md-2">
            <label>Password Expired</label>
        </div>
        <div class="col-md-4">
            <input type="date" class="form-control" name="password_expired" id="password_expired" value="<?= $PASSWORD_EXPIRED ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <label>Max. Error Login</label>
        </div>
        <div class="col-md-4">
            <input type="number" class="form-control" name="max_error_login" id="MAX_ERROR_LOGIN" value="<?= $MAX_ERROR_LOGIN ?>">
        </div>
        <div class="col-md-2">
            <label>Status Login</label>
        </div>
        <div class="col-md-4 status_login">
            <select class="form-control"  name="status_login" id="status_login" style="width: 100%">
                <option value="0" <?php if($status_login==0){ echo "selected";} ?>> Tidak</option>
                <option value="1" <?php if($status_login==1){ echo "selected";} ?>>Ya</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <label>No. HP</label>
        </div>
        <div class="col-md-4">
            <input type="number" class="form-control" name="NO_HP" id="NO_HP" value="<?= $NO_HP ?>">
        </div> 
    </div>
</form> 

<script type="text/javascript">
    $( document ).ready(function() {   
        $('select').select2();    
    }); 
</script>