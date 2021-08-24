$(document).ready( function () {
    var filter = $('#search').val();
    root = window.location.protocol + '//' + window.location.host;
    var table = $('#table12').DataTable({
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
        serverSide: true,
        "responsive": true,
        "autoWidth": false,
        ajax:{
        url: root+"/admin/perusahaan/ajax/",
        type: "get",
        },
        columns:[
        { data: 'DT_RowIndex', name: 'DT_RowIndex'},
        { data: 'nama', name:'nama'},
        { data: 'bidang_usaha', name:'bidang_usaha'},
        { data: 'alamat',name:'alamat'},
        { data: 'status_mou',name:'status_mou'},
        { data: 'tanggal_mou',name:'tanggal_mou'},

        { data: 'action',name:'action'}
        ],
    });
    role = $('#role').data('role');

    if(role != "kaprog" && role != "kepsek" && role != "pembimbing" && role != "tu" && role != "bkk")
    {
         $('.btn-table').append(
        '<a href="'+root+'/admin/perusahaan/tambah"class="btn btn-primary "> Tambah Data <i class="fas fa-plus"></i></button></a>'
    );
    }


    // $('#table12_filter').prepend(
    //     '<a href="'+root+'/admin/export/excel/perusahaan"class="btn btn-success mr-3  ml-2"> Excel <i class="fas fa-cloud-download-alt"></i></button></a>'
    // );

    $('#table12_filter').prepend(
        '<a href="'+root+'/admin/export/excel/perusahaan"class="btn btn-success mr-3  ml-2"> Excel <i class="fas fa-cloud-download-alt"></i></button></a>'+
        '<button class="btn btn-danger dropdown-toggle mr-3 ml-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+
            'Import <i class="fas fa-file-excel"></i>'+
        '</button>'+
        '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">'+
            '<a class="dropdown-item" href="'+root+'/admin/template/perusahaan/excel">Template Excel</a>'+
            '<button data-toggle="modal" data-target="#importExcel" class="dropdown-item" href="#">Import File</button>'+
        '</div>'
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
                    url: root+"/admin/perusahaan/delete/"+ id,
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
