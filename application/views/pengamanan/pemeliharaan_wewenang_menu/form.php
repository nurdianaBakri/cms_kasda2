  <form role="form" id="myForm">    
    <input type="hidden"  name="jenis_aksi" value="tambah" id="jenis_aksi">
    <input type="hidden"  name="kd_wewenang_old" value="" id="kd_wewenang_old"> 

        <div class="row">
            <div class="col-md-2">
                <label>Kode wewenang</label>
            </div>
            <div class="col-md-10 kd_wewenang"> 
                    <select class="form-control"  name="kd_wewenang" id="kd_wewenang" onchange="reload_data()">
                    <?php foreach ($data as $key ) { ?>
                        <option value="<?= $key['kd_wewenang'] ?>"><?=  $key['kd_wewenang']." - ".$key['nama_wewenang'] ?></option> 
                    <?php } ?>
                </select>
            </div> 
        </div>   
    </form>   

    <script type="text/javascript">
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('select').select2();
            reload_data();  
        });
    </script>
