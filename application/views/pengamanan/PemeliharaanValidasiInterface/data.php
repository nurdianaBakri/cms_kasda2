<form role="form" id="myForm2">
    <input type="hidden" value="<?= $kd_kasda; ?>" name="kd_kasda">
    <div class="panel panel-success">
        <div class="body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Keterangan</th>
                        <th>Jenis validasi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // var_dump($data);
                    if (sizeof($data)>0)
                    {
                        $data2 = explode(",",$data['id_validasi_interface']);
                    }
                    else{
                        $data2 = array(  );
                    }
                    foreach ($validasi_interface as $key) { ?>
                    <tr>
                        <td>
                            <input type="checkbox" id="basic_checkbox_<?php echo $key['id_validasi_interface'] ?>" class="filled-in" id="id_validasi_interface" name="id_validasi_interface[]" value="<?php echo $key['id_validasi_interface'] ?>"  <?php if(in_array($key['id_validasi_interface'], $data2)){ echo "checked";}  ?>  />
                            <label for="basic_checkbox_<?php echo $key['id_validasi_interface'] ?>"><?php echo $key['keterangan_validasi'] ?></label>
                        </td>
                        <td><?= $key['jenis_validasi'] ?></td>
                    </tr>
                    <?php } ?> 
                </tbody>
            </table>
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