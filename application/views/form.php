<html>
<head>
	<title>Form Import</title>
	
	<!-- Load File jquery.min.js yang ada difolder js -->
	<script src="<?php echo base_url('excel/js/jquery.min.js'); ?>"></script> 
	<script>
		$(document).ready(function(){
			// Sembunyikan alert validasi kosong
			$("#kosong").hide();
			var KD_KASDA2 = $('#KD_KASDA2').val();
			  $('#KD_KASDA2').val(KD_KASDA2);
		});
	</script>
</head>

<body>
	<h3>Form Import</h3>
	<hr>
	
	<a href="<?php echo base_url("excel/format.xlsx"); ?>">Download Format</a>
	<br>
	<br>
	
	<!-- Buat sebuah tag form dan arahkan action nya ke controller ini lagi -->
	<form method="post" action="<?php echo base_url("parameterorganisasi/Skpd/form"); ?>" enctype="multipart/form-data">

		 <input type="hidden" id="USER_INPUT" name="USER_INPUT" value="00001" >
          <input type="hidden" id="USER_UPDATE" name="USER_UPDATE" value="00001" >  

              <div class="row">
                <div class="col-md-2">
                    <label for="KD_URUSAN">Kasda</label>
                </div>
                <div class="col-md-10">
                    <select class="form-control" id="KD_KASDA2" name="KD_KASDA2" >  
                     <?php
                      if ($jenis_aksi=="add")
                      { 
                        foreach ($data_kasda as $data_kasda): ?>
                          <option value="<?php echo $data_kasda->KD_KASDA ?>"  >
                          	<?php echo $data_kasda->KD_KASDA." - ".$data_kasda->NM_KASDA ?>
                          	</option>
                          <?php endforeach ?> 
                      <?php }
                      else  {   
                         foreach ($data_kasda as $data_kasda): ?>
                            <option value="<?php echo $data_kasda->KD_KASDA ?>" <?php if ($data_kasda->KD_KASDA == $data['KD_KASDA']) echo ' selected';?>><?php echo $data_kasda->KD_KASDA." - ".$data_kasda->NM_KASDA ?></option>
                          <?php endforeach ?> 
                      <?php  } ?>
                    </select>
                </div>
            </div>  
 
		<!-- 
		-- Buat sebuah input type file
		-- class pull-left berfungsi agar file input berada di sebelah kiri
		-->
		<input type="file" name="file">
		
		<!--
		-- BUat sebuah tombol submit untuk melakukan preview terlebih dahulu data yang akan di import
		-->
		<input type="submit" name="preview" value="Preview">
	</form>
	
	<?php
	if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form  
		if(isset($upload_error)){ // Jika proses upload gagal
			echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
			die; // stop skrip
		}
		
		// Buat sebuah tag form untuk proses import data ke database
		echo "<form method='post' action='".base_url("parameterorganisasi/Skpd/import")."'>";

		echo "<input type='text' name='KD_KASDA2' value='' id='KD_KASDA2'>";

		
		// Buat sebuah div untuk alert validasi kosong
		echo "<div style='color: red;' id='kosong'>
		Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
		</div>";
		
		echo "<table border='1' cellpadding='8'>
		<tr>
			<th colspan='5'>Preview Data</th>
		</tr>
		<tr>
			<th>KD 1</th>
			<th>KD 2</th>
			<th>KD 3</th>
			<th>KD 4</th>
			<th>FULL CODE </th> 
			<th>NAME CODE </th> 
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
		echo "<button type='submit' name='import'>Import</button>";
		echo "<a href='".base_url("parameterorganisasi/Skpd")."'>Cancel</a>"; 
		
		echo "</form>";
	}
	?>
</body>
</html>
