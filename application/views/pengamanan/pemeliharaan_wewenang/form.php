<form role="form" id="myForm">   

    <input type="hidden"  name="jenis_aksi" value="<?= $jenis_aksi ?>" id="jenis_aksi">
    <input type="hidden"  name="kd_wewenang_old" value="<?= $kd_wewenang ?>" id="kd_wewenang_old">  

        <div class="row">
            <div class="col-md-2">
                <label>Kode wewenang</label>
            </div>
            <div class="col-md-4">
                <input type="text" pattern="[0-9]+" title="please enter number only"  maxlength="2" class="form-control" name="kd_wewenang" id="kd_wewenang"  value="<?= $kd_wewenang ?>">
            </div>
            
            <div class="col-md-2">
                <label>Nama wewenang</label>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" name="nama_wewenang" id="nama_wewenang"  value="<?= $nama_wewenang ?>">
            </div>
        </div>   
    </form>   
