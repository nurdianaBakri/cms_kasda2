                      <div class="panel panel-success">
                        <div class="panel-heading"><a data-toggle="collapse" href="#collapse1">2 - Data Potongan</a></div>
                          <div class="panel-body">
 
                              <div id="collapse1" class="panel-collapse collapse">
                                <div class="table-responsive"> 
 
                                    <table class="table table-striped">
                                      <tr>
                                        <td>Kode Akun</td>
                                        <td>Nilai Pajak</td>
                                        <td>Masa (Bulan)</td>
                                        <td>Tahun</td> 
                                      </tr>

                                      <?php   
                                        // var_dump($data); 
                                        $bulan =date('m'); 
                                      foreach ($data as $key ) {  ?>
                                        <tr>
                                          <td>
                                            <input type="hidden" name="KD_MAP[]" value="<?= $key['KD_MAP']; ?>">
                                            <?= $key['KD_MAP'].' - '.$key['URAIAN']?>
                                          </td> 
                                          <td>    
                                              <input type="text" name="NILAI_PAJAK[]" class="form-control NILAI_PAJAK rupiah"  data-a-dec="," data-a-sep="."  onkeyup="kalkulasi_nilai_transfer()" onkeydown="kalkulasi_nilai_transfer()" value="<?= $key['Nilai']?>"   > 
                                          </td>   
                                          <td>
                                            <select class="form-control" name="Masa[]">
                                              <?php for ($i=1; $i < 13; $i++) { ?>
                                                <option value="<?php echo $i ?>" size="1" <?php if ($bulan==$i) {
                                                  echo "selected";
                                                } ?>> <?= $i; ?></option>
                                              <?php } ?>
                                            </select>
                                          </td> 
                                          <td>
                                            <input type="text" readonly class="form-control" name="Tahun" value="<?= date('Y') ?>" size="2">
                                          </td> 
                                        </tr> 
                                      <?php } ?> 
                                    </table>  
                                  </div> 
                              </div> 

                          </div>
                        </div> 

                        <script type="text/javascript">
                          $(document).ready(function(){  
                              $('.rupiah').autoNumeric('init');
                          });
                        </script>
