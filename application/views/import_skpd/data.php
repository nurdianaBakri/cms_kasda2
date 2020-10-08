 <!-- Jquery DataTable Plugin Js -->
<script src="<?php echo base_url()."assets/" ?>plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="<?php echo base_url()."assets/" ?>plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script type="text/javascript">
    $(function () {
    $('.js-basic-example').DataTable({
        responsive: true, 
        autoWidth : false, 
    });   
});
</script>

 <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
    <thead>
           <tr>
                <th width="15%">Kode Urusan</th>
                <th width="15%">Kode Bidang</th>
                <th width="15%">Kode Unit</th>
                <th width="15%">Kode Sub Unit</th> 
                <th width="35%">Nama SKPD</th>
                <th></th>
            </tr>
    </thead>
     <tbody id="tbody-data"> 
        <?php foreach ($data as $data) { ?>
            <tr>
                <td><?PHP echo $data->KD_URUSAN; ?></td>
                <td><?PHP echo $data->KD_BIDANG; ?></td>
                <td><?PHP echo $data->KD_UNIT; ?></td>
                <td><?PHP echo $data->KD_SUB_UNIT; ?></td>
                <td><?PHP echo $data->NM_SKPD; ?></td>
                <td> <button  class="btn btn-success waves-effect m-r-20" onclick="edit('<?php echo $data->KD_SKPD ?>')">
                        Edit
                    </button>
                    <button  class="btn btn-danger waves-effect m-r-20"  onclick="hapus('<?php echo $data->KD_SKPD ?>')">Hapus</button></td>

            </tr>  
        <?php } ?>
        
    </tbody>
</table>