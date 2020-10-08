<!DOCTYPE HTML>
<html>
<head>
<title>Print </title> 

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap.min.css"  crossorigin="anonymous">

<style>
img {
  width: 50%;
  height: auto;
}
</style>
</head>
 
<body onload="window.print()"> 

    <br> 
    <div class="row">
        <div class="col-md-12" style="font-weight: bold; text-align: center;">
             ****** BUKTI VERIFIKASI TRANSAKSI SP2D ******<br> <br> 
        </div> 
    </div> 

    <table class="table table-bordered table-striped table-hover js-basic-example dataTable"  border="1">
        
    <tbody>  
         <?php   
            $tgl_verifikasi = strtotime($data['tgl_verifikasi']);     
            $nilai_potongan1 = $data['TOTAL_SP2D'] - $data['Nilai']; 
         ?>  
         <tr>
            <td>Tanggal SP2D</td> 
            <td><?= date('d-m-Y',strtotime($data['Tgl_SP2D'])); ?></td> 
        </tr>
        <tr>
            <td>Tahun Anggaran</td> 
            <td><?= date('Y', strtotime($data['tgl_input'])); ?></td> 
        </tr>
        <tr>
            <td>Tanggal Verifikasi</td> 
            <td><?= date('d-m-Y', strtotime($data['tgl_verifikasi'])); ?></td> 
        </tr>
        <tr>
            <td>Tanggal Cair</td> 
            <td><?= date('d-m-Y', strtotime($data['TglCair'])); ?></td> 
        </tr> 
        <tr>
            <td>NO SP2D</td>
            <td><?= $data['No_SP2D']; ?></td>
        </tr> 
        <tr>
            <td>NO. SPM</td>
            <td><?= $data['No_SPM']; ?></td>
        </tr> 
        <tr>
            <td>NO. Rekening</td>
            <td><?= $data['Rek_Penerima']; ?></td>
        </tr> 
        <tr>
            <td>Nama Penerima</td>
            <td><?= $data['Nm_Penerima']; ?></td>
        </tr> 
        <tr>
            <td>NPWP</td>
            <td><?= $data['NPWP']; ?></td>
        </tr> 
        <tr>
            <td>Jumlah (Total SP2D - Potongan)</td> 
            <td><?= "Rp. ".number_format($data['Nilai'],2) ; ?></td>
        </tr> 
        <tr>
            <td>Terbilang</td>
            <td><?=  "<b>".$Nilai."</b>"; ?></td>
        </tr> 
        <tr>
            <td>Approval Code</td>
            <td><?= $jumlah_print; ?></td>
        </tr>  
 
    </tbody>
    </table> 
</body> 

    

</html>

