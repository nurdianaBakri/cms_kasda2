<!DOCTYPE HTML>
<html>
<head>
<title>Print </title> 
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="<?php echo base_url()."assets/" ?>/bootstrap.min.css">
</head>  
<body onload="window.print()"> 
    <center>
        <h1> LAPORAN REKENING KORAN </h1> 
    </center> 
    <table class="table table-bordered table-striped table-hover js-basic-example dataTable"  border="1">
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
                                echo "<td>".number_format( $key2->TXAMT,2)."</td>"; 
                            } 
                            else
                            {
                                echo "<td>".number_format( $key2->TXAMT,2)."</td>"; 
                                echo "<td>0.00</td>"; 
                            } 
                    ?> 
                    <td><?php  echo $key2->SisaSaldo;  ?></td>  
                    <td><?php echo $key2->USERID; ?></td>  
                </tr>    
            <?php   }  } ?>   
        </tbody> 
    </table> 
</body>

  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>

