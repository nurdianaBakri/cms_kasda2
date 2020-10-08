<style>
#logo {
  width: 10%;
  height: auto;
}
</style> 

<div class="panel panel-success">
        <div class="body">   
          <!--   <table>
                <tr>
                    <td> 
                        <img src="<?= base_url()."assets/images/logo/logo_kota_mataram.png"?>" alt="Kota Mataram" id="logo"> 
                    </td>
                    <td>
                        PEMERINTAH DAERAH PROFINSI <br> Jl. Pejanggik No.30 MATARAM
                    </td>
                    <td>
                        <p>RPT-ID : <?= $id_menu; ?></p>
                    <p><?= date('Y, M d')."   ".date('H:i'); ?></p>
                    <p>Dicetak Oleh : <?= $this->session->userdata('nama'); ?></p>
                    </td>
                </tr>
            </table>   -->
            
            <div class="table-responsive" id="table-responsive">
                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                    <thead>
                        <tr> 
                            <th width="5%" rowspan="2">No.</th>
                            <th width="20%" rowspan="2">KODE SKPD</th>
                            <th width="85%" rowspan="2">NAMA SKPD</th> 
                        </tr> 
                    </thead>
                <tbody> 

                <?php   
                    $i=1;  
                    $TOTAL_SP2D=0;      
                    foreach ($laporan as $key) {   ?> 
                    <tr>
                        <td><?= $i++; ?></td> 
                        <td><?= $key['kd_gabungan']; ?></td> 
                        <td><?= $key['nama_skpd']; ?></td> 
                    </tr>    
                 <?php } ?> 
                </tbody>
                </table>
            </div>
        </div>
    </div>