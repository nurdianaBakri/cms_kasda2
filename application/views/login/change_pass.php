<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

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
                                
                                <div class="panel panel-success form_container"> 

                                    <div class="panel-heading">
                                        Silahkan ubah password Anda
                                    </div>
                                    <div class="panel-body"> 

                                        <form role="form" id="myForm" method="POST" action="<?php echo base_url()."Login/do_change_pass" ?>">     

                                        <div class="row">
                                            <div class="col-md-2">
                                                    <label>KD Kasda</label>
                                                </div>
                                                <div class="col-md-10">   
                                                    <?php     
                                                        //get nama kasda by kd_kasda 
                                                        $KD_KASDA = $this->session->userdata('KD_KASDA');
                                                        $this->db->select('NM_KASDA');
                                                        $this->db->where('KD_KASDA',$KD_KASDA);
                                                        $nm_kasda =  $this->db->get('ref_kasda')->row()->NM_KASDA;
                                                        ?> 
                                                        <input readonly type="text" class="form-control" value="<?= $KD_KASDA.' - '.$nm_kasda; ?>" name="KD_KASDA2" id="KD_KASDA2">

                                                        <input readonly type="hidden" class="form-control" value="<?= $this->session->userdata('KD_KASDA'); ?>" name="KD_KASDA" id="KD_KASDA"> 
                                                </div>
                                            </div>   

                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label>User Id</label>
                                                </div>
                                                <div class="col-md-4" >
                                                    <input type="text" readonly class="form-control" name="USERNAME" id="USERNAME" value="<?php echo $this->session->userdata('username') ?>"> 
                                                </div> 

                                                <div class="col-md-2">
                                                    <label>Password Lama</label>
                                                </div>
                                                <div class="col-md-4" >
                                                    <input  type="password" class="form-control" value="" name="PASSWORD_LAMA" id="PASSWORD_LAMA"> 
                                                </div> 
                                            </div>    

                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label>Password Baru</label>
                                                </div>
                                                <div class="col-md-4"> 
                                                    <input  type="password" class="form-control" value="" name="PASSWORD_BARU" id="PASSWORD_BARU">  
                                                </div> 

                                                <div class="col-md-2">
                                                    <label>Konfirmasi Password Baru</label>
                                                </div>
                                                <div class="col-md-4"> 
                                                    <input  type="password" class="form-control" value="" name="KONFIRMASI_PASSWORD_BARU" id="KONFIRMASI_PASSWORD_BARU">  
                                                </div> 
                                            </div>   

                                            <button type="submit" class="btn btn-success waves-effect button_print">
                                            <i class="material-icons">save</i>
                                            <span>save</span>
                                        </button>    
                                        </form>    
                                         

                                       
                                </div>  
                            </div>   
                            
                    </div>
                </div>
            </div> 
        </section>    