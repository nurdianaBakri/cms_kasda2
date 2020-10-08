<!DOCTYPE html>
<html>

<head>
	<title>Html2Pdf</title>
    <link rel="stylesheet" type="text/css" href="examples.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<style>
	</style>
</head>

<body>
	<div id="html" style='position: absolute;'>  

	<br>
	<br> 
	
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<table class="table table-bordered" style="font-size: 10px;">
				<thead>
					<tr>
						<th scope="col" colspan="3"> Tanggal Cetak : <?php echo date('d, M Y h:i:sa');?></th> 
					</tr>
				</thead>
				<tbody>
					<tr>
						<td scope="row">DATA ENTRY</td> 
						<td scope="row">CHECKER</td>
						<td scope="row">APPROVAL</td>
					</tr>
					<tr>
						<td> </td> 
						<td rowspan="2"> </td> 
						<td rowspan="2"> </td>  
					</tr>
					<tr>
						<td style="font-size: 10px;"><?= $this->session->userdata('username'); ?></td>   
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-md-1"></div>
	</div> 
	</div>

	<script src='https://html2canvas.hertzen.com/dist/html2canvas.js'></script>
    <script src='<?= base_url().'assets/jsPDF-master'; ?>/dist/jspdf.debug.js'></script> 

	<script>  
		var pdf = new jsPDF('p', 'pt', 'A4');
		var canvas = pdf.canvas;

		pdf.html(document.getElementById('html'), {
			callback: function (pdf) {
				var iframe = document.createElement('iframe');
				iframe.setAttribute('style', 'position:absolute;right:0; top:0; bottom:0; height:100%; width:650px; padding:20px;');
				document.body.appendChild(iframe);
				iframe.src = pdf.output('datauristring');
				// iframe.src = pdf.save('cetakulang');  
			}
		});  
 
	</script>
</body>

</html>