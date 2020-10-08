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

<div class="panel panel-success">
<div class="panel-heading">Data Koreksi verifikasi SP2D </div>
  <div class="panel-body">   

      <div class="table-responsive"> 

         <table class="table table-bordered table-striped table-hover js-basic-example dataTable"> 
             <thead>
                <tr> 
                    <th>Taggal</th>
                    <th>No SP2D</th>
                    <th>Alasan Pembatalan</th>  
                </tr>
            </thead>
             <tbody id="tbody-data">  
                  <tr>  
                      <td> xx</td>
                      <td> xx</td>
                      <td> xx</td>   
                  </tr>    
            </tbody>
        </table> 
    </div>
 
  </div>
</div> 
