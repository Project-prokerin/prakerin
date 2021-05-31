$(document).ready(function () {

    name = $('#nam').data('id');
    $('#table-1').dataTable({
        "dom": "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>t<'row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-6'p>>"
    });

    $("#table-1_filter").prepend(
        '<a href="/petugas/export/'+name+'" class="btn btn-success rounded-pill mr-3">Export Excel <i class="far fa-plus-square"></i></a>'+
        '<a href="/petugas/'+name+'/create" class="btn btn-primary rounded-pill mr-3">Tambah '+name+' <i class="far fa-plus-square"></i></a>'
    )
    $('.hapus').on('click', function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Apa anda yakin?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                console.log('berhasil');
                $(this).closest('form').submit();
            }
        })
    })
});
