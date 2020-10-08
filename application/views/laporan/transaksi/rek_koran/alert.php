
<!DOCTYPE HTML>
<html>
<head>
<title>Print </title> 
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="<?php echo base_url()."assets/" ?>/bootstrap.min.css">
</head>  
<body onload="window.print()"> 
   
<div class="panel panel-success">
        <div class="body"> 
            <center>
                <h1> <?= $this->session->flashdata('pesan'); ?> </h1> 
            </center> 
        </div>
    </div>
    
</body>  
</html> 