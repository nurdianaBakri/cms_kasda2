 <form role="form" id="myForm">    
    <input type="text"  name="jenis_aksi" value="<?= $jenis_aksi ?>" id="jenis_aksi"> 

<div class="row">
    <div class="col-md-2">
            <label>KD Kasda</label>
        </div>
        <div class="col-md-10">    
            <input readonly type="text" class="form-control" value="<?= $data['KD_KASDA'].' - '.$data['NM_KASDA']; ?>" name="KD_KASDA2">
            <input type="hidden" value="<?= $data['KD_KASDA']; ?>" name="KD_KASDA"> 
        </div>
    </div>   

    <div class="row">
        <div class="col-md-2">
            <label>User ID</label>
        </div>
        <div class="col-md-10" >
             <input readonly type="text" name="USERNAME" class="form-control" value="<?= $data['USERNAME']; ?>" name="USERNAME"> 
        </div> 
    </div>    

    <div class="row">
        <div class="col-md-2">
            <label>Nama User</label>
        </div>
        <div class="col-md-10 "> 
            <input readonly type="text" class="form-control" value="<?= $data['NM_USER']; ?>" name="NM_USER"> 
        </div> 
    </div>   

    <div class="row">
        <div class="col-md-2">
            <label>Kode wewenang</label>
        </div>
        <div class="col-md-10 "> 
            <select class="form-control" name="LEVEL_USER" id="LEVEL_USER" style="width: 100%">
                <?php foreach ($wewenang as $key) {  ?>
                <option value="<?= $key['kd_wewenang']; ?>" <?php if( $key['kd_wewenang']==$data['LEVEL_USER']){ echo "selected"; } ?>> <?= $key['kd_wewenang']." - ".$key['nama_wewenang'];?></option>
                <?php }  ?>
            </select>
        </div> 
    </div>   
</form>    