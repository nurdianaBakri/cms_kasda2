<form role="form" id="myForm">
    <input type="hidden"  name="jenis_aksi" value="tambah" id="jenis_aksi">
    <input type="hidden"  name="id" value="" id="id">
    
    <div class="row">
        <div class="col-md-2">
            <label>Nama API (tanpa space)</label>
        </div>
        <div class="col-md-4" >
            <input type="text" name="name_api" id="name_api" class="form-control form_visible">
        </div>
         <div class="col-md-2">
            <label>API URL</label>
        </div>
        <div class="col-md-4" >
            <input type="text" name="api_url" id="api_url" class="form-control form_visible">
        </div>
    </div>  
</form>

<button type="button" class="btn btn-warning waves-effect" onclick="reset()">
    <i class="material-icons">cached</i>
    <span>Reset</span>
</button>
<button type="button" class="btn btn-success waves-effect button_print" onclick='save();'>
    <i class="material-icons">print</i>
    <span>save</span>
</button> 

<script type="text/javascript">
     $( document ).ready(function() {  
        $('select').select2();  
    }); 
</script>