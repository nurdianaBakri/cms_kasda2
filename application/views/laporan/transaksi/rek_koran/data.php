  
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
            <?php 
            if ($tanggal_invalid==true || $no_rek_is_null==true || $internalError==true || $xternalError==true)
            {
                echo "<h3>".$this->session->flashdata('pesan')."</h3>";
            }
            else{  ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th width="20%">TGL.TX</th>
                                <th width="15%">No. BUKTI</th>
                                <th width="5%">TX</th>
                                <th width="20%">KETERANGAN</th>
                                <th width="15%">MUTASI DEBET</th>
                                <th width="15%">MUTASI KREDIT</th>
                                <th width="15%">SALDO AKHIR</th>
                                <th width="15%">OP_ID</th>
                            </tr>
                        </thead>
                    <tbody> 
                    <?php   
                    // var_dump($data);

                       foreach ( $data->Message as $key2)  {    
                        if (!isset($key2->TXDATE) && !isset($key2->TXID) && !isset($key2->TXCODE)  && !isset($key2->TXMSG)  && !isset($key2->DBCR)  && !isset($key2->SisaSaldo) && !isset($key2->USERID))
                        {
                             
                        }
                        else{
                            ?>
                            <tr>
                                <td><?php 
                                    $date33 = $key2->TXDATE;
                                    echo date('d F, Y', strtotime($date33));  
                                ?></td>
                                <td>   <?php  echo $key2->TXID; ?>
                                </td> 
                                <td> 
                                    <?php 
                                        echo $key2->TXCODE;  
                                    ?>
                                </td> 
                                <td> 
                                    <?php 
                                        echo $key2->TXMSG;  
                                    ?>
                                </td>
                                <?php  
                                    if ($key2->DBCR==1){
                                        echo "<td>0.00</td>";
                                        echo "<td>".number_format( abs($key2->TXAMT),2)."</td>"; 
                                    } 
                                    else
                                    {
                                        echo "<td>".number_format( abs($key2->TXAMT),2)."</td>"; 
                                        echo "<td>0.00</td>"; 
                                    } 
                                ?> 
                                <td><?php  echo  str_replace("-","",$key2->SisaSaldo);  ?></td>  
                                <td><?php echo $key2->USERID; ?></td>  
                            </tr>    
                        <?php   }  } ?>   
                    </tbody>
                </table> 
            <?php } ?> 
            </div>
        </div>
    </div>