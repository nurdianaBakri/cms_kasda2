
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

                                <button class="btn pull-right btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
                                <button class="btn pull-right btn-success" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Tambah Cabang</button>
                            </div>
                        </div>
                        <div class="body">

                            <input type="hidden" name="url" value="<?php echo $url ?>" id="url">  
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 

                                    <div class="panel panel-success">
                                        <div class="body">
                                            <div class="table-responsive">


                                            	<table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
										            <thead>
										                <tr>
										                    <th>KD CABANG</th>
										                    <th>ALAMAT KANTOR</th>
										                    <th>URAIAN</th>
										                    <th>KOTA</th> 
										                    <th style="width:125px;">AKSI</th>
										                </tr>
										            </thead>
										            <tbody>
										            </tbody>
										 
										            <tfoot>
										            <tr>
										                <th>KD CABANG</th>
										                <th>ALAMAT KANTOR</th>
										                <th>URAIAN</th>
										                <th>KOTA</th> 
										                <th>AKSI</th>
										            </tr>
										            </tfoot>
										        </table>

                                                
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
 
    <script src="<?php echo base_url()."assets/" ?>fungsi/fgs_konfigurasiCabang.js"></script>
 

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Form Cabang</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">KODE CAB</label>
                            <div class="col-md-9">
                                <input name="KD_CAB" placeholder="First Name" class="form-control" type="text">
                                <input name="KD_CAB_OLD" placeholder="First Name" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">URAIAN</label>
                            <div class="col-md-9">
                                <input name="URAIAN" placeholder="Last Name" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">KOTA</label>
                            <div class="col-md-9"> 
                            	<input name="KOTA" placeholder="Last Name" class="form-control" type="text"> 
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">ALAMAT KANTOR</label>
                            <div class="col-md-9">
                                <textarea name="ALAMAT_KANTOR" placeholder="Address" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div> 
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


