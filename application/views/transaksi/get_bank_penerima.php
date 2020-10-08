<script>
    function get_bank_penerima(KD_BANK) { 
        var url_controller  = $('#url').val();   
        var url = "<?php echo base_url() ?>"+"transaksi/Pembukaan_SP2D/get_bank_penerima";  

        var user_level = $('#level_user').val();
        console.log(url);  
        // console.log(user_level);  
        $.ajax( {
            type: "POST",
            url: url,
            data: { 
            KD_BANK:KD_BANK, 
            user_level:user_level, 
            },
            dataType: "html",
            success: function( response ) {  
            $('.bank_penerima').html(response); 
            }
        } );       
    } 
</script>