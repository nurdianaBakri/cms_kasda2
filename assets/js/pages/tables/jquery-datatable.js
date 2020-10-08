$(function () {
    $('.js-basic-example').DataTable({
        responsive: true, 
        autoWidth : false, 
        paging: false,
        scrollX: true, 
    }); 

    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});