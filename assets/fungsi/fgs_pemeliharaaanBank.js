
var save_method; //for save method string  
var url_controller = $('#url').val();
 
$(document).ready(function() { 
    reload_data();
    $('select').select2();   
});  

 function reload_data() {    
    $('.table-responsive').text("Loading ... ");   
    var url = url_controller+"reload_data";
    // console.log(url); 
    var KD_KASDA = $('#KD_KASDA').val();  
    
    $.ajax( {
        type: "POST",
        url: url,
        data:{ },
        dataType: "html",
        success: function( response ) {       
            try{       
                $('.table-responsive').html(response);  
            }catch(e) {  
                alert('Exception while request..');
            }  
        }
    } );  
}      
  
function cek_validasi() {
   // Validating Fields
  var KD_KASDA = $("#KD_KASDA").val();
  var KD_CAB = $("#KD_CAB").val(); 
  var KD_SUMBER_DANA = $("#KD_SUMBER_DANA").val(); 
  var NO_REK = $("#NO_REK").val(); 
  var NM_PEMILIK = $("#NM_PEMILIK").val(); 

  if (!(KD_KASDA == "" || KD_CAB == "" || KD_SUMBER_DANA == "" || NO_REK == "" || NM_PEMILIK == "")) { 
      // To Enable Submit Button
      $("#btnSave").removeAttr('disabled'); 
  }
  else
  {
     $("#btnSave").addAttr('disabled'); 
  }
}  


function add_person()
{  
    save_method = 'add'; 
    //Ajax Load data from ajax
    $.ajax({
        url : url_controller+"get_form",
        type: "GET",
        dataType: "html",
        success: function(response)
        {  
           $('.form_container').html(response);
            $('#modal_form').modal('show'); // show bootstrap modal
            $('.modal-title').text('Tambah Pemeliharaan Rekening Kasda'); // Set Title to Bootstrap modal title
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    }); 
}

function reset_button() { 
        $('#btnSave').attr('disabled',false); //set button enable  
}
 
function edit(id)
{
    save_method = 'update';  
    //Ajax Load data from ajax  
    $.ajax({
        url : url_controller+"detail",
        type: "POST",
        data : {
            KD_DATA : id
        },
        dataType: "html",
        success: function(data)
        {   
           $('.form_container').html(data);  
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Ubah Pemeliharaan Rekening Kasda');
             // Set title to Bootstrap modal title 
             // reload_data();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}
  
 
function save()
{
    $('#btnSave').text('menyimpan...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;
 
    if(save_method == 'add') {
        url = url_controller+"ajax_add";
    } else {
        url = url_controller+"ajax_add";
    }

    var data = $('#myForm').serialize(); 
    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: data,
        dataType: "JSON",
        success: function(data)
        {  
            $('.form_container').html(data.pesan); 
            if (data.status==true)
            {
                 $('#btnSave').text('save'); //change button text
                 $('#btnSave').attr('disabled',true); //set button enable  
            }  
            else
            { 
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable  
            }
             reload_data(); 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
 
        }
    });
}
 
function delete_(id)
{
    if(confirm('Apakah anda yakin menghapus data ?'))
    {
        // ajax delete data to database
        $.ajax({
            url : url_controller+"hapus",
            type: "POST",
            data: {
                KD_DATA : id
            },
            dataType: "JSON",
            success: function(data)
            { 
                 $('.form_container').html(data.pesan); 
                if (data.status==true)
                {
                     $('#btnSave').text('save'); //change button text
                     $('#btnSave').attr('disabled',true); //set button enable  
                }  
                else
                { 
                    $('#btnSave').text('save'); //change button text
                    $('#btnSave').attr('disabled',false); //set button enable  
                } 

                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Hapus Rekening Potongan'); // Set title to Bootstrap modal title
                
                reload_data(); 
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
 
    }
}