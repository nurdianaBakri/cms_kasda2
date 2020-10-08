 <form role="form" id="myForm">

    <div class="row">
        <div class="col-md-2">
                <label>KASDA</label>
            </div>
            <div class="col-md-10"> 
                <?php   
                if ($this->session->userdata('LEVEL_USER')=="SU") {
                   ?> 
                        <select class="form-control" name="KD_KASDA" onchange="get_user_id(this.value)" id="kd_kasda"> 
                            <?php foreach ($kasda as $key) {  ?>
                                <option value="<?= $key->KD_KASDA; ?>"> <?= $key->KD_KASDA." - ".$key->NM_KASDA;?></option> 
                            <?php }  ?> 
                        </select> 
                    <?php }
                    else
                    { ?> 
                        <input readonly type="hidden" class="form-control" value="<?= $this->session->userdata('KD_KASDA'); ?>" name="KD_KASDA">
                        <input readonly type="text" class="form-control" value="<?= $this->session->userdata('KD_KASDA')." - ". $this->session->userdata('NM_KASDA'); ?>" >
                <?php }  ?>
            </div>
        </div>
    
        <div class="row">
            <div class="col-md-2">
                <label>Tanggal</label>
            </div>
            <div class="col-md-4">
                <input type="date" class="form-control" name="tglawal" value="<?php echo date("Y-m-d");?>" >
            </div>
            <div class=" col-md-2">
                <label>&nbsp&nbsp&nbsps/d</label>
            </div>
            <div class="col-md-4">
                <input type="date" class="form-control" name="tglakhir" value="<?php echo date("Y-m-d");?>"   >
            </div>
        </div> 

        <div class="row">
            <div class="col-md-2">
                <label>Jenis SP2D</label>
            </div>
            <div class="col-md-4">
                <select class="form-control" name="jenis_spm">  
                    <?php foreach ($kd_spm as $key) {  ?>
                        <option value="<?= $key['KD_JENIS_SPM']; ?>"> <?= $key['KD_JENIS_SPM']." - ".$key['NM_JENIS_SPM'];?></option> 
                    <?php }  ?> 

                    <option value="0">0 - Semua</option>
                </select>
            </div> 
        </div>  
</form> 

<button type="button" class="btn btn-success waves-effect">
    <i class="material-icons">cached</i>
    <span>Reset</span>
</button>
<button type="button" class="btn btn-success waves-effect" onclick="reload_data()">
    <i class="material-icons">cached</i>
    <span>Inquiry</span>
</button>

<button type="button" class="btn btn-success waves-effect button_print" disabled onclick='printLaporan();'>
    <i class="material-icons">print</i>
    <span>Print</span>
</button>

<button type="submit" class="btn btn-success waves-effect button_export_to_excel" disabled onclick="export_to_excel()">
    <i class="material-icons">import_export</i>
    <span>Export as Exel</span>
</button> 


<script type="text/javascript">
$(document).ready(function(){ 
    $('select').select2();  
}); 
</script>