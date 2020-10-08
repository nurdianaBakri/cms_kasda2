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

    <center>
        <h2> LAPORAN DAFTAR STATUS SP2D </h2> 
    </center> 

    <table class="table table-bordered table-striped table-hover js-basic-example dataTable"  border="1">
        <thead>
            <tr>
                <th width="10%">No.</th>
                <th width="15%">Tanggal</th>
                <th width="5%">KODE SKPD</th>
                <th width="20%">NO SP2D</th>
                <th width="20%">NO. SPM</th>
                <th width="10%">JENIS</th>
                <th width="15%">NO. REKENING</th>
                <th width="15%">PENERIMA</th>
                <th width="40%">STATUS</th>
                <th width="15%">JUMLAH(Rp.)</th>
            </tr>
        </thead>
    <tbody>  

    <?php 
    if ($is_empty==true)
    {  ?> 
        <tr> 
            <td colspan="10"> Data Kosong </td>  
        </tr>   
    <?php 
    }
    else
    { 
    ?>
    <tr>
        <td>1</td>
        <td><?= $laporan['TglCair']; ?></td>
        <td><?= $laporan['Kd_Urusan'].".".$laporan['Kd_Bidang'].".".$laporan['Kd_Unit'].".".$laporan['Kd_Sub']; ?></td> 
        <td><?= $laporan['No_SP2D']; ?></td>
        <td><?= $laporan['No_SPM']; ?></td>
        <td><?= $laporan['Jn_SPM']; ?></td>
        <td><?= $laporan['Rek_Penerima']; ?></td>
        <td><?= $laporan['Nm_Penerima']; ?></td>
        <td><?php 
                if ($laporan['STATUS']!==3)
                {
                    echo "Belum Cair";
                }
                else{
                    echo "Sudah Cair"; 
                } 
            ?></td> 
        <td><?= number_format($laporan['TOTAL_SP2D'],2);?></td>  
    </tr>  
     
    <tr> 
        <td colspan="3">Total : </td> 
        <td colspan="7"><?= number_format($laporan['TOTAL_SP2D'],2);?></td>  
    </tr>   
    <?php } ?>
    
    </tbody>
    </table> 
</body>

  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>

