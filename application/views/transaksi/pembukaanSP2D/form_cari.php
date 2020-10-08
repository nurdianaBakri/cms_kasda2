
<div class="modal fade" id="cari" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="carisp2d">CARI SP2D</h4>
      </div>
      <div class="body">
        <div class="panel panel-success">
          <div class="panel-heading" role="tab" id="headingOne_2">
            <h4 class="panel-title">Kriteria Pencarian</h4>
          </div>
          <div id="collapseOne_2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_2">
            <div class="panel-body">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <form id="cari_sp2d">
                  <div class="row">
                    <div class="col-md-4">
                      <select class="form-control" onchange="ubah_base_cari(this.value)" name="base_cari" id="base_cari">
                        <option value="cariBytgl">Berdasarkan Tgl SP2D</option>
                        <option value="cariByno_sp2d">Berdasarkan No.SP2D</option>
                      </select>
                      
                    </div>
                    <div class="col-md-8">
                      <div class="row cariBytgl">
                        <div class="col-md-5">
                          <input type="date" id="SEARCH_DARI" class="form-control input-visible" name="SEARCH_DARI" required value="<?= date('Y-m-d') ?>">
                        </div>
                        <div class="col-md-2">
                          <label for="SEARCH_SAMPAI">S/D</label>
                        </div>
                        <div class="col-md-5">
                          <input type="date" id="SEARCH_SAMPAI" class="form-control input-visible" name="SEARCH_SAMPAI" required value="<?= date('Y-m-d') ?>">
                        </div>
                      </div>
                      <div class="row cariByno_sp2d">
                        <input type="text" class="form-control col-md-12" id="No_SP2D2" name="No_SP2D" required>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-12">
                      <button type="button" class="btn btn-success" onclick="cari_sp2d()">Cari</button>
                      <button type="button" class="btn btn-success"  onclick="open_modal()">Cancel</button>
                    </div>
                  </div>
                  <div class="row hasil_cari">
                    
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

          <script type="text/javascript">

            $('#cari_sp2d').on('keyup keypress', function(e) {  
            // $("#cari_sp2d").submit(function(e){ 

              var keyCode = e.keyCode || e.which;
              if (keyCode === 13) { 
                e.preventDefault();
                return false;
              } 

            }); 
          </script>
 