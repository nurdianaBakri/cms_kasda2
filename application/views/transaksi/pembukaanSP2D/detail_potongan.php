                      <div class="panel panel-success">
                        <div class="panel-heading"><a data-toggle="collapse" href="#collapse1">2 - Data Potongan</a></div>
                          <div class="panel-body">
 
                              <div id="collapse1" class="panel-collapse collapse">
                        
                                <div class="table-responsive"> 
                                  <?php
                                  if ($jumlah_potongan<=0)
                                  {
                                    echo "Tidak ada data potongan";
                                  }
                                  else
                                  { ?>
                                        <table class="table table-striped all_potongan">
                                          <tr>
                                            <td>Akun</td>
                                            <td>Nilai Pajak</td>
                                            <td>Masa</td>
                                            <td>Tahun</td>
                                            <td>KD Billing</td>
                                          </tr>

                                         <?php  
                                            foreach ($data as $key):  ?> 
                                             <tr>
                                              <td> <?= $key['KD_MAP'].' - '.$key['URAIAN']?> </td>
                                             <!--  <td> <?php echo number_format(substr($key['Nilai'], 0, strpos($key['Nilai'], ".")),2); ?> </td> -->
                                              <td> <?= $key['Nilai']; ?> </td>
                                              <td>  <?= $key['Masa']; ?> </td>
                                              <td>  <?= $key['Tahun']; ?> </td> 
                                              <td>  
                                                <?php if ($key['kd_billing']==NULL || $key['kd_billing']=="")
                                                {
                                                  echo "<input type='text' class='form-control' name='kd_billing[]'>";

                                                  echo "<input type='hidden' name='Kd_Rek_1[]' value='".$key['Kd_Rek_1']."'>"; 
                                                  echo "<input type='hidden' name='Kd_Rek_2[]' value='".$key['Kd_Rek_2']."'>";
                                                  echo "<input type='hidden' name='Kd_Rek_3[]' value='".$key['Kd_Rek_3']."'>";
                                                  echo "<input type='hidden' name='Kd_Rek_4[]' value='".$key['Kd_Rek_4']."'>";
                                                  echo "<input type='hidden' name='Kd_Rek_5[]' value='".$key['Kd_Rek_5']."'>";
                                                }
                                                else 
                                                {
                                                  echo $key['kd_billing'];
                                                } ?> 
                                              </td> 
                                            </tr>
                                          <?php endforeach ?> 
                                        </table>  
                                  <?php } ?> 
                                    
                                </div>
                              </div>
                            </div>
                          </div>

 