    <section class="content">
        <div class="container-fluid">
            <!-- CPU Usage -->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2><?PHP echo $title; ?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="body">   
                            <?php if ($this->session->flashdata('pesan')!="")
                            {
                                echo $this->session->flashdata('pesan');
                            } ?> 
                            <input type="hidden" name="url" value="<?php echo $url ?>" id="url">
                            
                            <div class="panel panel-success form_container"> 

                                <div class="panel-heading">1 - Data SP2D</div>
                                <div class="panel-body form_continer"> 

                                    <form role="form" id="myForm">

                                    <div class="row">
                                        <div class="col-md-2">
                                                <label>KASDA</label>
                                            </div>
                                            <div class="col-md-10"> 
                                                <?php   
                                                    if ($this->session->userdata('LEVEL_USER')=="SU") {
                                                       ?> 
                                                            <select class="form-control" name="KD_KASDA" id="KD_KASDA" onchange="get_form_no_rekByNoKasda(this.value)"> 
                                                                <?php foreach ($kasda as $key) {  ?>
                                                                    <option value="<?= $key->KD_KASDA; ?>"> <?= $key->KD_KASDA." - ".$key->NM_KASDA;?></option> 
                                                                <?php }  ?> 
                                                            </select> 
                                                    <?php }
                                                    else
                                                    { 
                                                            //get nama kasda by kd_kasda 
                                                            $KD_KASDA = $this->session->userdata('KD_KASDA');
                                                            $this->db->select('NM_KASDA');
                                                            $this->db->where('KD_KASDA',$KD_KASDA);
                                                            $nm_kasda =  $this->db->get('ref_kasda')->row()->NM_KASDA;
                                                        ?> 
                                                        <input readonly type="text" class="form-control" value="<?= $KD_KASDA.' - '.$nm_kasda; ?>" name="KD_KASDA2">
                                                        <input readonly type="hidden" class="form-control" value="<?= $this->session->userdata('KD_KASDA'); ?>" name="KD_KASDA">
                                                <?php }  ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>NO REKENING</label>
                                            </div>
                                            <div class="col-md-10" id="no_rekening"> 
                                                <select class="form-control" name="no_rekening" id="no_rekening2"> 
                                                <?php foreach ($rekening as $key) {  ?>
                                                    <option value="<?= $key['NO_REK']; ?>"> <?= $key['NO_REK']." - ".$key['NM_PEMILIK'];?></option> 
                                               <?php }  ?> 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Tanggal</label>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="date" class="form-control" name="tglawal" value="<?php echo date("Y-m-d");?>" >
                                            </div>
                                            <div class=" col-md-2">
                                                <label>&nbsp&nbsp&nbsps/d</label>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="date" class="form-control" name="tglakhir" value="<?php echo date("Y-m-d");?>"   >
                                            </div>
                                        </div>   
                                    </form> 

                                    <div class="row">
                                    <div class="col-md-2">
                                        <label>Tanggal</label>
                                    </div>
                                    <div class="col-md-10">
                                        <button type="button" class="btn btn-success waves-effect">
                                        <i class="material-icons">cached</i>
                                            <span>Reset</span>
                                        </button>
                                        <button type="button" class="btn btn-success waves-effect" onclick="reload_data()">
                                            <i class="material-icons">cached</i>
                                            <span>Inquiry</span>
                                        </button>
                                        <button type="button" class="btn btn-success waves-effect button_print" disabled onclick='printLaporan();'>
                                            <i class="material-icons">print</i>
                                            <span>Print</span>
                                        </button>
                                        <button type="submit" class="btn btn-success waves-effect button_export_to_excel" disabled onclick='exportToExel();'>
                                                <i class="material-icons">import_export</i>
                                            <span>Export as Exel</span>
                                        </button>  
                                    </div>
                                    
                                </div>   

                                           
                            </div>  
                        </div>

                        <div class="row clearfix ">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table_container">
                                
                            </div>
                        </div>
 
                </div>
            </div>
        </div>
    </section>  

    <script>  
    function get_form_no_rekByNoKasda(no_kasda) { 
            var url_controller  = $('#url').val();
            var data = $('#myForm').serialize();
            var url = "<?php echo base_url() ?>"+url_controller+"getRekSumberByKdKasda/"+no_kasda;

            $.ajax( {
                type: "POST",
                url: url,
                data:data,
                dataType: "html",
                success: function( response ) { 
                    // console.log(response);
                    try{     
                        $("#no_rekening").html(response);  
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
        }     
 
        function reload_data() {    
            var url_controller  = $('#url').val();
            var data = $('#myForm').serialize();
            var url = "<?php echo base_url() ?>"+url_controller+"reload_data";
            console.log(url);

            $('.table_container').html("loading ..."); 
            
            $.ajax( {
                type: "POST",
                url: url,
                data:data,
                dataType: "html",
                success: function( response ) { 
                    try{    
                        $(".button_print").removeAttr("disabled"); 

                        //aktifkan tombol export data ke exel 
                        $(".button_export_to_excel").removeAttr("disabled"); 

                        $('.table_container').html(response); 
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );  
        }     

        function printLaporan() { 
            var url_controller  = $('#url').val();
            var data = $('#myForm').serialize();
            var url = "<?php echo base_url() ?>"+url_controller+"print"; 
            $.ajax( {
                type: "POST",
                url: url,
                data:data,
                dataType: "html",
                success: function( response ) { 
                    try{   
                        var w = window.open('about:blank');
                        w.document.open();
                        w.document.write(response);
                        w.document.close(); 
                    }catch(e) {  
                        alert('Exception while request..');
                    }  
                }
            } );   
        }  

        function exportToExel() {   
            var url_controller  = $('#url').val();
            var data = $('#myForm').serialize();
            var url = "<?php echo base_url() ?>"+url_controller+"exportToExel"; 
            // console.log(data);

            var form2 = $('#myForm'); 
            form2.attr('action',"<?php echo base_url() ?>"+url_controller+"exportToExel");
            form2.attr('method','POST');
            form2.submit(); 
        }  
        </script>