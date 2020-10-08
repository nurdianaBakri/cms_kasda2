<script>  

   function cek_no_sp2d() {
      var url_controller  = $('#url').val();   
      var KD_KASDA  = $('#KD_KASDA').val();  
      var NO_SP2D  = $('#NO_SP2D').val();  
      var url = "<?php echo base_url() ?>"+"transaksi/Pembukaan_sp2d/cek_no_sp2d";   
      console.log(url); 
      $.ajax( {
          type: "POST",
          url: url,
          data: { 
            NO_SP2D : NO_SP2D,
            KD_KASDA : KD_KASDA,
            STATUS : 1,
          },
          dataType: "Json",
          success: function( response ) { 
            console.log(response); 
            if (response.ada==true)
            {   
              //AUTO SELECT KODE_SKPD WHERE KD_SKPD SAMA DENGAN OUTPUT QUERY
              get_rek_by_reksumber();
              form_kd_skpd(response.Kd_Urusan+"."+response.Kd_Bidang+"."+response.Kd_Unit+"."+response.Kd_Sub);   
              // get_bank_penerima(response.Bank_Penerima);   

              $("#NO_REK_BYkdSumberDana").val(response.No_Rekening);  
              $('#Keterangan').val(response.Keterangan); 
              $('#Tgl_SP2D').val(response.Tgl_SP2D);  
              $('#No_SPM').val(response.No_SPM);  
              $('#Tgl_SPM').val(response.Tgl_SPM);  
              $('#Jn_SPM').val(response.Jn_SPM);  
              $('#TGL_CAIR').val(response.TGL_CAIR);  
              $('#NO_REK').val(response.Rek_Penerima);  
              $('#NPWP').val(response.NPWP);  
              $('#NM_PEMILIK').val(response.Nm_Penerima);  
              $('#NO_SP2D').val(response.No_SP2D);  

              $('#NILAI_SP2D').autoNumeric('init');
              $('#NILAI_SP2D').autoNumeric('set', response.TOTAL_SP2D);

              $('#NILAI_TRANSFER').autoNumeric('init');
              $('#NILAI_TRANSFER').autoNumeric('set', response.Nilai);  

              $('#NILAI_POTONGAN').autoNumeric('init');
              $('#NILAI_POTONGAN').autoNumeric('set', response.TOTAL_SP2D - response.Nilai); 

              get_potongan(response.Status_Cair);  
              // getPotonganByNoSP2D();  
              //update field kd_skpd    
              
              get_nama_pemilik2(response.Rek_Penerima);   
            }
            else 
            {   
              var now = new Date(); 
              var day = ("0" + now.getDate()).slice(-2);
              var month = ("0" + (now.getMonth() + 1)).slice(-2); 
              var today = now.getFullYear()+"-"+(month)+"-"+(day); 
              
              $("#NO_REK_BYkdSumberDana").val("");  
              $('#Keterangan').val(""); 
              $('#No_SPM').val("");  
              $('#Tgl_SP2D').val(today);  
              $('#Tgl_SPM').val(today);  
              $('#TGL_CAIR').val("");  
              $('#Jn_SPM').val("");  
              $('#NO_REK').val("");  
              $('#NPWP').val("");  
              $('#NM_PEMILIK').val("");  
              $('#NILAI_SP2D').val("");   
              $('#NILAI_TRANSFER').val("");   
              $('#NILAI_POTONGAN').val("");  

             } 

              //HIDE MODAL CARI
              $('#cari').modal('hide'); 

              //TAMPILKAN ALERT SAAT USER CLICK SALAH SATU SPD2D
              $("#exampleModal .modal-body").html(response.pesan); 
              $("#exampleModal #exampleModalLabel").html("Pencarian SP2D"); 
              $("#exampleModal").modal();  
            
            $('.loading').hide();
          }
      } );   

      $('.loading').hide();
  }   

  function get_potongan(Status_Cair) {   
    var url_controller  = $('#url').val();  
    var KD_KASDA  = $('#kd_kasda').val(); 
    var NO_SP2D  = $('#NO_SP2D').val(); 
    var url = "<?php echo base_url() ?>"+"transaksi/Pembukaan_sp2d/get_potongan";
    // console.log(url);
    $.ajax( {
        type: "POST",
        url: url,
        data: { 
          KD_KASDA: KD_KASDA,
          NO_SP2D: NO_SP2D,
        },
        dataType: "html",
        success: function( response ) {  
            try{   
                $('.data_potongan').html(response); 
 
                //jika sudah di cairkan dissable button 
                if (Status_Cair=="1" || Status_Cair==1)
                { 
                  dissable_button();
                }  
            }catch(e) {  
                alert('Exception while request..');
            }  
        }
    } );  
} 

    function get_nama_pemilik2(no_rek) {  
      if (no_rek.length==13 )
      { 
          var url = "<?php echo base_url() ?>"+"parameterrekeningbank/Rekening_potongan/get_pemilik_rekening/"+no_rek;   
          // console.log(url);
          $.ajax( {
              type: "POST",
              url: url,
              data: {  },
              dataType: "Json",
              success: function( response )
              {   
                if (response.Status==false)
                { 
                  var pesan="";
                  if(response.Message==null)
                  { 
                      pesan  = 'Tidak dapat terhubung ke API, silahkan coba lagi dengan cara menekan enter pada fileld "No. Rekening"'; 
                  }
                  else
                  { 
                      pesan  = response.Message;
                  }  
                  $('.modal-body').text(pesan);
                  $('.modal-title').text('Terjadi kesalahan');
                  $('#exampleModal').modal('show');
                } 
                else{
                  $('#NM_PEMILIK').show(); 
                  $('#NPWP').show(); 
                  $('#NM_PEMILIK').val(response.Message.result.NICKNM); 
                  $('#NPWP').val(response.Message.result.NPWP);  
                }                                     
                cek_validasi();  
              }
          } );   
      }   
  }        

function ubah_base_cari(kd_base_cari) { 
    if (kd_base_cari=="cariBytgl")
    {
      $('.cariBytgl').show();
      $('.cariByno_sp2d').hide();
    }
    else
    {
      $('.cariBytgl').hide();
      $('.cariByno_sp2d').show();
    }
  }

function cari_sp2d() {  
    //get kd_kasda  
    var SEARCH_DARI = null;
    var SEARCH_SAMPAI = null;
    var NO_SP2D = null;
    var KD_KASDA = null;
    var STATUS = $('#STATUS_SP2D').val();
    console.log(STATUS);

    var url_controller  = $('#url').val();  
    var url = "<?php echo base_url() ?>"+'transaksi/Pembukaan_sp2d/cari_sp2d'; 
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
      KD_KASDA = $('#KD_KASDA').val(); 
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
          STATUS : STATUS,
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


  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> 
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button> 
      </div>
    </div>
  </div>
</div>