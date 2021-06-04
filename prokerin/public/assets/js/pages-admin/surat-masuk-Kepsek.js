$(document).ready( function () {
    var filter = $('#search').val();
    console.log(filter);
    var table = $('#table-2').DataTable({
        dom:
			"<'row'<'ol-sm-12 col-md-6 btn-table'><'col-sm-12 col-md-6  pdf-button'f>>" +
			"<'row'<'col-sm-12'tr>>" +
			"<'row'<'col-sm-5'i><'col-sm-7'p>>",
        bLengthChange: false,
        ordering:false,
        info: true,
        filtering:true,
        searching: true,
        serverside: true,
        processing: true,
        serverSide: true,
        "responsive": true,
        "autoWidth": false,
        ajax:{
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/admin/kepsek/surat_masuk/ajax",
        type: "post",
        data: function (data) {
            data = '';
            return data
        }
        },
        columns:[
        { data: 'DT_RowIndex', name: 'DT_RowIndex'},
        { data: 'nama', name:'nama'},
        { data: 'untuk', name:'untuk'},
        { data: 'jabatan', name:'jabatan'},
        { data: 'status', name:'jabatan'},
        { data: 'disposisi', name:'disposisi'},
        { data: 'action', name:'action'},
        ],
    });
// $('.btn-table').append(
//         '<a href="/admin/kepsek/surat_masuk/tambah"class="btn btn-primary rounded-pill ml-3"> Tambah Data <i class="fas fa-plus"></i></button></a>'
// );
$('#table-2_filter').prepend(
        '<a href="#"class="btn btn-danger  ml-3"> PDF <i class="fas fa-cloud-download-alt"></i></button></a>' +
        '<a href="#"class="btn btn-success mr-3  ml-2"> Excel <i class="fas fa-cloud-download-alt"></i></button></a>'
);
// search engine
$("#search").keyup(function () {
    table.search( this.value ).draw();
})
// hapus data
$('body').on('click','#hapus', function () {
// sweet alert
    Swal.fire({
    title: 'Apa anda yakin?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Hapus',
    cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.value) {
            id = $(this).data('id');
            $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "/admin/kepsek/surat_masuk/delete/"+ id,
                    type: "DELETE",
                    data: '',
                    success: function (data) {
                        console.log(data);
                        table.draw();
                        Swal.fire(
                            'success',
                            'Data anda berhasil di hapus.',
                            'success'
                        )
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {}
    })
});

$('body').on('click','#hapus-disposisi', function () {
    // sweet alert
        Swal.fire({
        title: 'Apa anda yakin?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value) {
                id = $(this).data('id');
                $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "/admin/kepsek/disposisi/delete/"+ id,
                        type: "DELETE",
                        data: '',
                        success: function (data) {
                            console.log(data);
                            table.draw();
                            Swal.fire(
                                'success',
                                'Data anda berhasil di hapus.',
                                'success'
                            )
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {}
        })
    });
});


