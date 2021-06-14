$(document).ready( function () {
    var filter = $('#search').val();

    role = $('#role').data('role');

    function column(role){
        if(role == "hubin"){
            return [{ data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'nama_surat', name:'nama_surat'},
            { data: 'status', name:'status'},
            { data: 'tgl_surat', name:'tgl_surat'},
            { data: 'action', name:'action'},]
        }else if(role == 'kepsek' || role == 'kaprog' || role == 'admin'){
            return [{ data: 'DT_RowIndex', name: 'DT_RowIndex'},
            { data: 'nama_surat', name:'nama_surat'},
            { data: 'dari', name:'dari'},
            { data: 'jabatan', name:'jabatan'},
            { data: 'status', name:'status'},
            { data: 'tgl_surat', name:'tgl_surat'},
            { data: 'action', name:'action'},]
        }
    }
    var table = $('#table80').DataTable({
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
        url: '/admin/surat_keluar/ajax/',
        type: "post",
        data: function (data) {
            data = '';
            return data
        }
        },
        columns:column(role),

    });

if(role == 'admin'){
    $('.btn-table').append(
            '<a href="/admin/surat_keluar/tambah"class="btn btn-primary  "> Tambah Data <i class="fas fa-plus"></i></button></a>'
    );
}else if (role == "hubin") {
      $('.btn-table').append(
            '<a href="/admin/'+role+'/surat_keluar/tambah"class="btn btn-primary  "> Tambah Data <i class="fas fa-plus"></i></button></a>'
    );
}


$('#table80_filter').prepend(
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
                    url: '/admin/surat_keluar/delete/' + id,
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


