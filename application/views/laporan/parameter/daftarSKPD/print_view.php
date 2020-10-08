<!DOCTYPE HTML>
<html>
<head>
<title>Print </title> 

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="<?php echo base_url()."assets/" ?>/bootstrap.min.css">

<style>
img {
  width: 50%;
  height: auto;
}
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
<script> 
   var doc = new jsPDF();
    var specialElementHandlers = {
        '#editor': function (element, renderer) {
            return true;
        }
    };

    $('#cmd').click(function () {
        doc.fromHTML($('#content').html(), 15, 15, {
            'width': 170,
                'elementHandlers': specialElementHandlers
        });
        doc.save('sample-file.pdf');
    });
</script> 

</head>

<body onload="window.print()">   

    <div class="row">
        <div class="col-md-7">
            <div class="row">
                <div class="col-md-4">
                <img src="<?= base_url()."assets/images/logo/logo_kota_mataram.png"?>" alt="Kota Mataram">
                </div>
                <div class="col-md-8">PEMERINTAH DAERAH PROFINSI <br> Jl. Pejanggik No.30 MATARAM</div>
            </div>
        </div>
        <div class="col-md-5">
            <p>RPT-ID : <?= $id_menu; ?></p>
            <p><?= date('Y, M d')."   ".date('H:i'); ?></p>
            <p>Dicetak Oleh : <?= $this->session->userdata('nama'); ?></p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <center>
                <h2> <?= $judul_tabel; ?></h2>  
                <h4> <?= $judul_sub_tabel; ?></h4>   
            </center> 
        </div> 
    </div> 
     
    <table class="table table-bordered table-striped table-hover js-basic-example dataTable"  border="1">
        <thead>
            <tr> 
                <th width="10%" rowspan="2">No.</th>
                <th width="15%" rowspan="2">SKPD</th>
                <th width="20%" rowspan="2">NO SP2D</th>
                <th width="20%" rowspan="2">NO. SPM</th>
                <th width="15%" rowspan="2">PENERIMA</th>
                <th width="40%" rowspan="2">Nilai SP2D (Rp.)</th>
                <th width="15%" colspan="3"> Status</th> 
            </tr>
            <tr> 
                <th width="15%">Data Entry</th>
                <th width="15%">Checker</th>
                <th width="15%">Pencairan</th> 
            </tr>
        </thead>
        <tbody> 

        <?php   
            $i=1;  
            $TOTAL_SP2D=0;      
            foreach ($laporan as $key) {  
                $timestamp = strtotime($key['tgl_verifikasi']);     
                $nilai_potongan1 = $key['TOTAL_SP2D'] - $key['Nilai'];
            ?>  
            <tr>
                <td><?= $i; ?></td>
                <td><?php
                    $where = array(
                        'KD_URUSAN' => $key['Kd_Urusan'], 
                        'KD_BIDANG' => $key['Kd_Bidang'], 
                        'KD_UNIT' => $key['Kd_Unit'], 
                        'KD_SUB_UNIT' => $key['Kd_Sub'], 
                    );
                    $this->db->where($where);
                    $NM_SUB_UNIT = $this->db->get('ref_sub_unit')->row()->NM_SUB_UNIT; 
                    echo $NM_SUB_UNIT; 
                ?></td>
                <td><?= $key['No_SP2D']; ?></td> 
                <td><?= $key['No_SPM']; ?></td> 
                <td><?= $key['Nm_Penerima']; ?></td>
                <td><?= number_format($key['TOTAL_SP2D'],2); ?></td> 
                <td><?= $key['user_input']; ?></td>
                <td><?= $key['user_verifikasi'] ?></td>
                <td><?= $key['USER_PENCAIRAN'] ?></td>
            </tr>    
            <?php  
            $TOTAL_SP2D = $TOTAL_SP2D+$key['TOTAL_SP2D'];
            $i++; } ?>

            <tr>
            <td colspan="4">Total : </td>  
            <td colspan="5"><?= number_format($TOTAL_SP2D,2); ?></td> 
        </tr>    
        </tbody>
    </table> 
</body>

  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>

