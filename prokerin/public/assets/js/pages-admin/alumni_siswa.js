$(document).ready(function () {
    var filter = $('#search').val();
    var role = $('#role').data('role');
    root = window.location.protocol + '//' + window.location.host;
    var table = $('#table9').DataTable({
        dom: "<'row'<'ol-sm-12 col-md-6 btn-table'><'col-sm-12 col-md-6  pdf-button'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        bLengthChange: false,
        ordering: false,
        info: true,
        filtering: false,
        searching: true,
        serverside: true,
        processing: true,
        serverSide: true,
        "responsive": true,
        "autoWidth": false,
        ajax: {
            url: "/admin/alumni_siswa/ajax",

            type: "get",

        },
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'nama',
                name: 'nama'
            },
            {
                data: 'kelas',
                name: 'kelas'
            },
            {
                data: 'tahun_lulus',
                name: 'tahun_lulus'
            },
            {
                data: 'jurusan',
                name: 'jurusan'
            },
            {
                data: 'action',
                name: 'action'
            }
        ],
    });

    if(role === 'bkk' || role === 'admin')
    {
            $('.btn-table').append(
            '<a href="' + root + '/admin/alumni_siswa/tambah"class="btn btn-primary "> Tambah Data <i class="fas fa-plus"></i></button></a>'
        );
       $('#table9_filter').prepend(
    // '<a href="'+root+'/admin/export/excel/penelusuran_tamantan"class="btn btn-success mr-3  ml-2"> Excel <i class="fas fa-cloud-download-alt"></i></a>'+
        '<button class="btn btn-danger dropdown-toggle mr-3" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+
            'Import <i class="fas fa-cloud-download-alt"></i>'+
        '</button>'+
        '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">'+
            '<a class="dropdown-item" href="#">Template</a>'+
            '<a class="dropdown-item" href="#">Import File</a>'+
        '</div>'
);


    }


    // search engine
    $("#search").keyup(function () {
        table.search(this.value).draw();
    })

    // hapus data
    $('body').on('click', '#hapus', function () {
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
                    url: root + "/admin/alumni_siswa/delete/" + id,
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
