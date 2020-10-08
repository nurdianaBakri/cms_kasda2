

  <!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo base_url()."assets/" ?>plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo base_url()."assets/" ?>plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>

     <!-- Custom Js --> 
    <!-- <script src="<?php echo base_url()."assets/" ?>js/pages/tables/jquery-datatable.js"></script> -->

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
                <th>KD KASDA</th>
                <th>NM KASDA</th>
                <th>NO TELP</th>
                <th>ALAMAT KASDA</th> 
                <th>NO FAX</th> 
                <th>KOTA</th>
               <!--  <th>KEPALA DAERAH</th>
                <th>JABATAN</th>
                <th>SEKDA</th>
                <th>NIP SEKDA</th>
                <th>KBUD</th>
                <th>NIP KBUD</th>
                <th>PPKD</th>
                <th>NIP PPKD</th> -->
                <th>BUD</th>
                <th>NIP BUD</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>KD KASDA</th>
                <th>NM KASDA</th>
                <th>NO TELP</th>  
                <th>ALAMAT KASDA</th> 
                <th>NO FAX</th> 
                <th>KOTA</th>
               <!--  <th>KEPALA DAERAH</th>
                <th>JABATAN</th>
                <th>SEKDA</th>
                <th>NIP SEKDA</th>
                <th>KBUD</th>
                <th>NIP KBUD</th>
                <th>PPKD</th>
                <th>NIP PPKD</th> -->
                <th>BUD</th>
                <th>NIP BUD</th>  
                <th>Aksi</th> 
            </tr>
        </tfoot>
        <tbody id="tbody-pm-kasda">

            <?php foreach ($data_kasda as $data_kasda) { ?>
                <tr>
                    <td><?php echo $data_kasda->KD_KASDA; ?> </td>
                    <td><?php echo $data_kasda->NM_KASDA; ?> </td>
                    <td><?php echo $data_kasda->NO_TELP_1; ?> </td>  
                    <td><?php echo $data_kasda->ALAMAT_KASDA; ?> </td> 
                    <td><?php echo $data_kasda->NO_FAX; ?> </td> 
                    <td><?php echo $data_kasda->KOTA; ?> </td>
                   <!--  <td><?php echo $data_kasda->KEPALA_DAERAH; ?> </td>
                    <td><?php echo $data_kasda->JABATAN; ?> </td>
                    <td><?php echo $data_kasda->SEKDA; ?> </td>
                    <td><?php echo $data_kasda->NIP_SEKDA; ?> </td>
                    <td><?php echo $data_kasda->KBUD; ?> </td>
                    <td><?php echo $data_kasda->NIP_KBUD; ?> </td>
                    <td><?php echo $data_kasda->PPKD; ?> </td>
                    <td><?php echo $data_kasda->NIP_PPKD; ?> </td> -->
                    <td><?php echo $data_kasda->BUD; ?> </td>
                    <td><?php echo $data_kasda->NIP_BUD; ?> </td>
                    <td>
                        <button  class="btn btn-success waves-effect m-r-20" onclick="edit('<?php echo $data_kasda->KD_KASDA ?>')">
                            Edit
                        </button>
                        <button  class="btn btn-danger waves-effect m-r-20"  onclick="hapus('<?php echo $data_kasda->KD_KASDA ?>')">Hapus</button>
                    </td>
                </tr>  
            <?php } ?>
            
        </tbody>
    </table>                            