$(document).ready( function () {
    var filter = $("#search").val();
    console.log(filter);
    var table = $('#table8').DataTable({
        dom:
        "<'row'<'ol-sm-12 col-md-6 btn-table'><'col-sm-12 col-md-6  pdf-button'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        bLengthChange: false,
        ordering:false,
        info: true,
        filtering:false,
        searching: true,
        serverside: true,
        processing: true,
        "responsive": true,
        "autoWidth": false,
        ajax:{
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/admin/jurnal/ajax/",
        type: "post",
        data: function (data) {
            data = '';
            return data
        }
        },
        columns:[
        { data: 'DT_RowIndex', name: 'DT_RowIndex'},
        { data: 'id_siswa',name:'id_siswa'},
        { data: 'id_perusahaan',name:'id_perusahaan'},
        {
               data: 'tanggal_pelaksanaan',
               type: 'num',
               render: {
                  _: 'display',
                  sort: 'timestamp'
               }
            },
        { data: 'jam_masuk',name:'jam_masuk'},

        { data: 'action',name:'action'}
        ],
    });


    $('.btn-table').append(
        '<a href="/admin/jurnal/tambah"class="btn btn-primary "> Tambah Data <i class="fas fa-plus"></i></button></a>'
    );
    $('#table8_filter').prepend(
        '<a href="#"class="btn btn-danger  ml-3"> PDF <i class="fas fa-cloud-download-alt"></i></button></a>' +
        '<a href="/export/excel/jurnal"class="btn btn-success mr-3  ml-2"> Excel <i class="fas fa-cloud-download-alt"></i></button></a>'
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
                    url: "/admin/jurnal/delete/"+ id,
                    type: "DELETE",

                    data: { _token: '{{csrf_token()}}' },
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

