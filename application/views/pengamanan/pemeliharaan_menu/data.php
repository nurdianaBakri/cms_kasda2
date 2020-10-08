 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>

<script type="text/javascript">
    $(function () {
    $('.js-basic-example').DataTable({
        responsive: true, 
        autoWidth : false, 
    });   
});
</script>      

<div class="panel panel-success">
        <div class="body">  
            <div class="table-responsive" id="table-responsive">
                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                    <thead>
                        <tr> 
                            <th width="5%">Kode Menu</th> 
                            <th width="20%">Nama Menu</th>
                            <th width="20%">Class Name</th>  
                            <th width="15%">Level Menu</th> 
                            <th width="15%">Aksi</th> 
                        </tr> 
                    </thead>
                <tbody> 

                <?php     
                    foreach ($menu as $key) { ?> 
                    <tr> 
                        <td><?= $key['id_menu']; ?></td>  
                        <td><?= $key['menu_name']; ?></td> 
                        <td><?= $key['class_name']; ?></td> 
                        <td><?= $key['level_menu']; ?></td> 
                        <td>
                            <button class="btn btn-success" onclick="detail('<?= $key['id_menu']; ?>')"> Detail </button>
                        </td> 
                    </tr>    
                 <?php } ?> 
                </tbody>
                </table>
            </div>
        </div>
    </div> 