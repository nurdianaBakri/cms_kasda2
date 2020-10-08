<?php 
		$this->load->view('include/header'); 

		?> 
		    <section class="content"> 
		        <div class="container-fluid">
		            <!-- CPU Usage -->
		            <div class="row clearfix">
		                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		                    <div class="card">
		                         
		                        <div class="body">   
		                            <div class="row clearfix">
		                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
										<?php


										if(isset($upload_error)){ // Jika proses upload gagal
											echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
											die; // stop skrip
										}
										
										// Buat sebuah tag form untuk proses import data ke database
										echo "<form method='post' action='".base_url("parameterorganisasi/Skpd/import")."'>"; 

										?>
  
		                                <select id="KD_KASDA" name="KD_KASDA" >  
		                                 <?php 
		                                    foreach ($data_kasda as $data_kasda): ?>
		                                      <option value="<?php echo $data_kasda->KD_KASDA ?>" <?php if($data_kasda->KD_KASDA==$KD_KASDA){echo "selected";} ?>><?php echo $data_kasda->KD_KASDA." - ".$data_kasda->NM_KASDA ?></option>
		                                      <?php endforeach ?>   
		                                </select>  

										<?php 
										echo "<table border='1' cellpadding='8' class='table table-striped'>
										 
										<tr>
											<th>KD Urusan</th>
											<th>KD Bidang</th>
											<th>KD Unit</th>
											<th>KD Sub Unit</th>
											<th>Full Code </th> 
											<th>Nama </th> 
										</tr>";
										
										$numrow = 1;
										$kosong = 0;
										
										// Lakukan perulangan dari data yang ada di excel
										// $sheet adalah variabel yang dikirim dari controller
										foreach($sheet as $row){ 
											// Ambil data pada excel sesuai Kolom 
											$KD_1 = substr($row['A'], 0, 1); // Ambil data NIS  
											$KD_2 = substr($row['A'], 4, 2); // Ambil data NIS 
											$KD_3 = substr($row['A'], 8, 2); // Ambil data NIS 
											$KD_4 = substr($row['A'], 13, 3); // Ambil data NIS 

											$FULL_CODE = $row['A']; // Ambil data NIS
											$name_code = $row['B']; // Ambil data nama 
											
											// Cek jika semua data tidak diisi
											if(empty($KD_1) && empty($name_code) && empty($FULL_CODE) && empty($KD_2) && empty($KD_3) && empty($KD_4) )
												continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
											
											// Cek $numrow apakah lebih dari 1
											// Artinya karena baris pertama adalah nama-nama kolom
											// Jadi dilewat saja, tidak usah diimport
											if($numrow > 1){
												// Validasi apakah semua data telah diisi
												$KD_1_td = ( ! empty($KD_1))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
												$name_code_td = ( ! empty($name_code))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah 
												$FULL_CODE_td = ( ! empty($FULL_CODE))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah 
												$KD_2_td = ( ! empty($KD_2))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah 
												$KD_3_td = ( ! empty($KD_3))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah 
												$KD_4_td = ( ! empty($KD_4))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah 
												
												// Jika salah satu data ada yang kosong
												if(empty($KD_1) or empty($name_code) or empty($FULL_CODE)  or empty($KD_2_td) or empty($KD_3_td) or empty($KD_4_td) ){
													$kosong++; // Tambah 1 variabel $kosong
												}
												
												echo "<tr>";
												echo "<td".$KD_1_td.">".$KD_1."</td>";
												echo "<td".$KD_2_td.">".$KD_2."</td>"; 
												echo "<td".$KD_3_td.">".$KD_3."</td>"; 
												echo "<td".$KD_4_td.">".$KD_4."</td>"; 
												echo "<td".$FULL_CODE_td.">".$FULL_CODE."</td>"; 
												echo "<td".$name_code_td.">".$name_code."</td>"; 
												echo "</tr>";
											} 
											$numrow++; // Tambah 1 setiap kali looping
										}
										
										echo "</table>";
										 
										echo "<hr>";
										
										// Buat sebuah tombol untuk mengimport data ke database
										echo "<button type='submit' name='import' class='btn btn-success'>Import</button>";
										echo "<a href='".base_url("parameterorganisasi/Skpd")."'>Cancel</a>"; 
										
										echo "</form>"; 


										?>

										</div>
		                            </div> 
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </section>    
 
	<?php $this->load->view('include/footer'); ?>