$(document).ready( function () {
    filter = $('#search').val();
    root = window.location.protocol + '//' + window.location.host;
    role = $('#role').data('role');

    function columns(role){
        if(role == "kepsek" || role == "admin"){
            return [
            { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'nama', name:'nama'},
            { data: 'untuk', name:'untuk'},
            { data: 'jabatan', name:'jabatan'},
            { data: 'status', name:'jabatan'},
            { data: 'disposisi', name:'disposisi'},
            { data: 'action', name:'action'},
            ]
        }else if(role == "tu"){
            return [
            { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'nama', name:'nama'},
            { data: 'untuk', name:'untuk'},
            { data: 'jabatan', name:'jabatan'},
            { data: 'status', name:'status'},
            { data: 'disposisi', name:'disposisi'},
            { data: 'action', name:'action'},
            ]
        }else if(role == "pokja") {
            return [
            { data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'nama', name:'nama'},
            { data: 'dari', name:'dari'},
            { data: 'jabatan', name:'jabatan'},
            { data: 'status', name:'status'},
            { data: 'disposisi', name:'disposisi'},
            { data: 'action', name:'action'},
            ]
        }
    }
    console.log(role);
    var table = $('#table-1').DataTable({
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
        url: root+'/admin/surat_masuk/ajax',
        type: "post",
        data: function (data) {
            data = '';
            return data
        }
        },
        columns:columns(role),

    });
// $('.btn-table').append(
//         '<a href="/admin/surat_masuk/kepsek/tambah"class="btn btn-primary  "> Tambah Data <i class="fas fa-plus"></i></button></a>'
// );

if(role == 'admin' || role == 'tu'){
    $('.btn-table').append(
            '<a href="'+root+'/admin/surat_masuk/tambah"class="btn btn-primary  "> Tambah Data <i class="fas fa-plus"></i></button></a>'
    );
}

   $('#table-1_filter').prepend(
        '<a href="'+root+'/admin/surat_masuk/export/excel/"class="btn btn-success mr-3  ml-2"> Excel <i class="fas fa-cloud-download-alt"></i></button></a>'
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
                    url: root+'/admin/surat_masuk/delete/' + id,
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
                        url: root+'/admin/disposisi/delete/' + id,
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


$('body').on('click','#surat-batal', function () {
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
                        url: root+'/admin/surat_masuk/batal/' + id,
                        type: "DELETE",
                        data: '',
                        success: function (data) {
                            console.log(data);
                            table.draw();
                            Swal.fire(
                                'success',
                                'Surat Masuk berhasil di batalkan.',
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


