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
            <p>Dicetak Oleh : <?= $this->session->userdata('username')."/".$this->session->userdata('nama'); ?></p>
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
                            <th width="5%" colspan="2">No.</th>   
                            <th width="20%">NO SP2D</th>   
                            <th width="20%">Nilai</th>   
                        </tr> 
                    </thead>
                <tbody> 

                <?php     
                    $kd_rek=0;    
                    $i=1;    
                    // var_dump($data);
                    foreach ($data['laporan'] as $key) {

                    if ($kd_rek!=$key['kd_rek']) { ?>
                        <tr>
                            <td colspan="4" style="font-weight: bold;"><?php
                            $i=1; 
                            $data_map = $this->db->query("EXEC get_maping_map @KD_KASDA='".$KD_KASDA."',@KD_MAP='".$key['kd_rek']."'")->row_array(); 

                            echo $data_map['KD_MAP']." - ".$data_map['URAIAN']; ?> 
                        </td>  
                        </tr>   
                    <?php } ?> 
                        <tr>
                            <td > </td> 
                            <td><?= $i++; ?></td> 
                            <td><?= $key['No_SP2D']; ?></td>   
                            <td><?= number_format($key['Nilai'],2); ?></td> 
                        </tr>    
                 <?php 
                    $kd_rek = $key['kd_rek']; 
                } ?> 
                </tbody>
                </table>
    </table> 
</body>

  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>

