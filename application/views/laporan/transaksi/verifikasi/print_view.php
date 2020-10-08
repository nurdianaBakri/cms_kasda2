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
                <th width="10%">No.</th>
                <th width="15%">Tanggal</th>
                <th width="20%">NO SP2D</th>
                <th width="20%">NO. SPM</th>
                <th width="15%">Nilai Transfer (Rp.)</th>
                <th width="40%">Nilai Potongan (Rp.)</th>
                <th width="40%">Nilai Pajak (Rp.)</th>
                <th width="40%">Nilai SP2D (Rp.)</th>
                <th width="15%">Status</th>
            </tr>
        </thead>
    <tbody> 

    <?php 
         $i=1; 
         $nilai_tranfer=0;  
         $nilai_potongan=0;  
         $TOTAL_SP2D=0;    
         $nilai_pajak=0;    
         foreach ($laporan as $key) {  
             $timestamp = strtotime($key['tgl_verifikasi']);     
             $nilai_potongan1 = $key['TOTAL_SP2D'] - $key['Nilai'];
         ?> 
         <tr>
             <td><?= $i; ?></td>
             <td><?= date('d-m-Y', $timestamp); ?></td>
             <td><?= $key['No_SP2D']; ?></td>
             <td><?= $key['No_SPM']; ?></td>
             <td><?= number_format($key['Nilai'],2); ?></td>
             <td><?= number_format($nilai_potongan1,2); ?></td>
             <td><?= "0.00" ?></td>
             <td><?= number_format($key['TOTAL_SP2D'],2); ?></td>
            <td><?php 
                if ($key['STATUS']==0)
                {
                    echo "Import";
                }
                else if ($key['STATUS']==1)
                {
                    echo "Input";
                }
                else if ($key['STATUS']==2)
                {
                    echo "Verifikasi";
                }
                else
                {
                    echo "Cair";
                }
            ?></td>  
          </tr>    
            <?php 
            $nilai_tranfer = $nilai_tranfer+$key['Nilai'];
            $nilai_pajak = 0;
            $nilai_potongan = $nilai_potongan+$nilai_potongan1;
            $TOTAL_SP2D = $TOTAL_SP2D+$key['TOTAL_SP2D'];
            $i++; } ?>

            <tr>
                <td colspan="4">Total : </td> 
                <td><?= number_format($nilai_tranfer,2); ?></td>
                <td><?= number_format($nilai_potongan,2); ?></td>
                <td><?= number_format($nilai_pajak,2); ?></td>
                <td colspan="2"><?= number_format($TOTAL_SP2D,2); ?></td> 
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

