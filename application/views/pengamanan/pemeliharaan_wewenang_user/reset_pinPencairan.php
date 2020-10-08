 
<form role="form" id="myForm">  
    <input type="text" name="url" value="<?php echo $url ?>" id="url"> 
    <input type="text"  name="USER_INPUT" value="<?= $this->session->userdata('username'); ?>" id="USER_INPUT">  
    <input type="text"  name="USERNAME" value="<?= $data['USERNAME'] ?>"  id="USERNAME">  
    <div class="row">  

        <div class="col-md-2">
            <label>Nama User</label>
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control" name="NM_USER" id="NM_USER" value="<?= $data['NM_USER'] ?>" readonly >
        </div>

         <div class="col-md-2">
            <label>PIN LAMA</label>
        </div>
        <div class="col-md-4">
            <input name="PIN_LAMA" min="0" maxlength="6" type="password" max="9" class="form-control"/> 
        </div>
    </div>  

     <div class="row">
        <div class="col-md-2">
            <label>PIN BARU</label>
        </div>
        <div class="col-md-4">
            <input min="0" maxlength="6" type="password" max="9" class="form-control" name="PIN_BARU" id="PIN_BARU" value="" >
        </div>
         <div class="col-md-2">
            <label>KONFIRMASI PIN BARU</label>
        </div>
        <div class="col-md-4">
            <input min="0" maxlength="6" type="password" max="9" class="form-control" name="CONF_PIN_BARU" id="CONF_PIN_BARU" value="" >
        </div>
    </div>  

      <div class="row">
        <div class="col-md-2">
            <label>PASSWORD</label>
        </div>
        <div class="col-md-4">
            <input min="0" maxlength="6" type="password" max="9" class="form-control" name="PASSWORD" id="PASSWORD">
        </div> 
    </div>  
</form>    