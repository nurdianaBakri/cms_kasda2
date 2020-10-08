
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

                                  <button class="btn pull-right btn-success" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Tambah SPM</button>
                            </div>
                        </div>
                        <div class="body">

                            <input type="hidden" name="url" value="<?php echo $url ?>" id="url">
                             
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="panel panel-success">
                                        <div class="body">
                                            <div class="table-responsive">
                                                
                                            </div>   
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 

    <script src="<?php echo base_url()."assets/" ?>fungsi/fgs_pemeliharaaanJenisSPM.js"></script> 

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Form Cabang</h3>
            </div>
            <div class="modal-body form_container"> 
                
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-danger" onclick="reset_button()" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



 

 