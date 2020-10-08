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

                          <div class="row">  
                                
                           <div class="col-md-6"> 
                                <div class="row"> 
                                  <div class="col-md-4">
                                    <label for="tgl_terakhir_import"> Tanggal Terakhir Import</label>
                                  </div>
                                  <div class="col-md-8">
                                      <input type="date"  class="form-control" name="tgl_terakhir_import"  id="tgl_terakhir_import">
                                  </div> 
                                </div> 

                                <div class="row"> 
                                  <div class="col-md-4">
                                    <label for="jam_terakhir_import"> Jam Terakhir Import</label>
                                  </div>
                                  <div class="col-md-8">
                                      <input type="text"  class="form-control" name="jam_terakhir_import"  id="jam_terakhir_import">
                                  </div> 
                                </div>  
                            </div>

                            <div class="col-md-6">
                              
                                <div class="row"> 
                                  <div class="col-md-4">
                                    <label for="jmlData">Total Data</label>
                                  </div>
                                  <div class="col-md-8">
                                      <input type="text"  class="form-control" id="jmlData" value="0" readonly> 
                                  </div> 
                                </div>  
                                
                                <div class="row"> 
                                  <div class="col-md-4">
                                    <label for="berhasil_diImport">Berhasil di Import</label>
                                  </div>
                                  <div class="col-md-8">
                                      <input type="text"  class="form-control" id="berhasil_diImport" value="0" readonly> 
                                  </div> 
                                </div> 
 
                                 <div class="row"> 
                                  <div class="col-md-4">
                                    <label for="gagal_diImport">Gagal Di Import</label>
                                  </div>
                                  <div class="col-md-8">
                                      <input type="text"  class="form-control" name="gagal_diImport"  id="gagal_diImport" value="0" readonly>
                                  </div> 
                                </div>  
                            </div>
                        </div>   
                </div>  