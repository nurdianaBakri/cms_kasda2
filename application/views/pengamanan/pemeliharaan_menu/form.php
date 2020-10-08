<form role="form" id="myForm">   

    <input type="hidden"  name="jenis_aksi" value="tambah" id="jenis_aksi">
    <input type="hidden"  name="id_menu_old" value="" id="id_menu_old">

        <div class="row">
            <div class="col-md-2">
                    <label>KD MENU</label>
                </div>
                <div class="col-md-10">  
                    <input type="number" class="form-control" name="id_menu" id="id_menu">
                </div>
            </div>  

            <div class="row">
                <div class="col-md-2">
                    <label>Nama Menu</label>
                </div>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="menu_name"   id="menu_name">
                </div> 
            </div>   

            <div class="row">
                <div class="col-md-2">
                    <label>Class Name</label>
                </div>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="class_name" id="class_name" >
                </div> 
            </div>    

            <div class="row">
                <div class="col-md-2">
                    <label>Level Menu</label>
                </div>
                <div class="col-md-4 level_menu">
                    
                </div>
                
                <div class="col-md-2">
                    <label>Parrent Menu</label>
                </div>
                <div class="col-md-4 parent_menu">
                   
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

    <button type="button" class="btn btn-danger waves-effect button_print" disabled onclick='hapus();'>
        <i class="material-icons">print</i>
        <span>Delete</span>
    </button>  

    <script type="text/javascript">
    $( document ).ready(function() {     
        level_menu();

        //get level
        get_perent_menu(1,null);
    });  
    </script>