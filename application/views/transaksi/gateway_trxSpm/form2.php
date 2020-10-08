<style type="text/css">  
.loading {
width: 10%;
height: auto;
}
</style>
            <div class="panel panel-success">
                <div class="panel-heading"><h3>Informasi Hasil Import</h3> </div>
                <div class="panel-body">
                        <input type="hidden" name="url_inquery" value="<?php echo $url_inquery ?>" id="url_inquery"> 
                          <?php 
                            $username = $this->session->userdata('username');  
                            $kd_kasda = $this->session->userdata('KD_KASDA');  
                         ?>  
                          <input type="hidden" id="username" name="username" value="<?php echo $username ?>" > 
                          <input type="hidden" id="kd_kasda" name="kd_kasda" value="<?php echo $kd_kasda ?>" >  
                          <input type="hidden" id="status" name="status" value="0" >  

                          <div class="row">  

                           <div class="col-md-6"> 
                                <div class="row"> 
                                  <div class="col-md-4">
                                    <label for="tgl_terakhir_import"> Tanggal Terakhir Import</label>
                                  </div>
                                  <div class="col-md-8">
                                      <input type="date"  class="form-control input-visible" name="tgl_terakhir_import"  id="tgl_terakhir_import">
                                  </div> 
                                </div> 

                                <div class="row"> 
                                  <div class="col-md-4">
                                    <label for="jam_terakhir_import"> Jam Terakhir Import</label>
                                  </div>
                                  <div class="col-md-8">
                                      <input type="text"  class="form-control input-visible" name="jam_terakhir_import"  id="jam_terakhir_import">
                                  </div> 
                                </div>  
                            </div>

                            <div class="col-md-6">
                              
                                <div class="row"> 
                                  <div class="col-md-4">
                                    <label for="jmlData">Total Data</label>
                                  </div>
                                  <div class="col-md-8">
                                      <input type="text"  class="form-control input-visible" id="jmlData" value="0" readonly> 
                                  </div> 
                                </div>   
                                
                            <!-- <div class="row"> 
                                  <div class="col-md-4">
                                    <label for="berhasil_diImport">Berhasil di Import</label>
                                  </div>
                                  <div class="col-md-8">
                                      <input type="text"  class="form-control input-visible" id="berhasil_diImport" value="0" readonly> 
                                  </div> 
                                </div>  -->
 
                                 <div class="row"> 
                                  <div class="col-md-4">
                                    <label for="gagal_diImport">Gagal Di Import</label>
                                  </div>
                                  <div class="col-md-8">
                                      <input type="text"  class="form-control input-visible" name="gagal_diImport"  id="gagal_diImport" value="0" readonly>
                                  </div> 
                                </div>  
                            </div>
                        </div>  
                        <center>
                          <img src="<?= base_url() ?>assets/images/loade.gif" class="loading">  
                        </center> 
                </div>  

                <script type="text/javascript">
                   $(document).ready(function(){  
                        $('.loading').hide(); 
                    });  
                </script>