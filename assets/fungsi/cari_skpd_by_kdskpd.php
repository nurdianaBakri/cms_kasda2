

<script>

function cari_sp2d() {  
    //get kd_kasda  
    var SEARCH_DARI = null;
    var SEARCH_SAMPAI = null;
    var NO_SP2D = null;
    var KD_KASDA = null;

    var url_controller  = $('#url').val();  
    var url = "<?php echo base_url() ?>"+'transaksi/Verifikasi_sp2d/cari_sp2d'; 
    var base_cari = $('#base_cari').val(); 

    if (base_cari=="cariByno_sp2d")
    {
      SEARCH_DARI = null;
      SEARCH_SAMPAI = null;
      NO_SP2D = $('#No_SP2D2').val();
      KD_KASDA = $('#KD_KASDA').val();
    }
    else
    { 
      SEARCH_DARI = $('#SEARCH_DARI').val();
      SEARCH_SAMPAI = $('#SEARCH_SAMPAI').val();
      NO_SP2D = null; 
    }  

    $.ajax( {  
        type: "POST",
        url: url,
        data: {
          SEARCH_DARI : SEARCH_DARI,
          SEARCH_SAMPAI : SEARCH_SAMPAI,
          NO_SP2D : NO_SP2D,
          KD_KASDA : KD_KASDA,
        },
        dataType: "html",
        success: function( response ) {   
            try{    
             $('.hasil_cari').html(response);
            }catch(e) {  
                alert('Exception while request..');
            }  
        }
    } );    
  }  

  </script>