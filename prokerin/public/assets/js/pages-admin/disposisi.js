$(document).ready(function () {
    var filter = $('#search').val();
    if ($('#role').text() == 'admin') {
        url = "/admin/disposisi/ajax";
    } else if ($('#role').text() == 'kepsek') {
        url = "/admin/kepsek/disposisi/ajax";
    }
    console.log($('#role').text());
    var table = $('#table-6').DataTable({
        dom:
			"<'row'<'ol-sm-12 col-md-6 btn-table'><'col-sm-12 col-md-6  pdf-button'f>>" +
			"<'row'<'col-sm-12'tr>>" +
			"<'row'<'col-sm-5'i><'col-sm-7'p>>",
        bLengthChange: false,
        ordering: false,
        info: true,
        filtering: true,
        searching: true,
        serverside: true,
        processing: true,
        serverSide: true,
        "responsive": true,
        "autoWidth": false,
        ajax: {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            type: "post",
            data: function (data) {
                data = '';
                return data
            }
        },
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'surat',
                name: 'surat'
            },
            {
                data: 'Pokjatujuan',
                name: 'Pokjatujuan'
            },
            {
                data: 'Keterangan_disposisi',
                name: 'Keterangan_disposisi'
            },
            {
                data: 'action',
                name: 'action'
            },
        ],
    });
    role = $('#role').text();
    if (role == 'admin') {
        $('.btn-table').append(
            '<a href="/admin/disposisi/tambah"class="btn btn-primary "> Tambah Data <i class="fas fa-plus"></i></button></a>'
        );
    } else if (role == 'kepsek') {
        $('.btn-table').append(
            '<a href="/admin/disposisi/kepsek/tambah"class="btn btn-primary "> Tambah Data <i class="fas fa-plus"></i></button></a>'
        );

    }

    $('#table-6_filter').prepend(
        '<a href="#"class="btn btn-danger  ml-3"> PDF <i class="fas fa-cloud-download-alt"></i></button></a>' +
        '<a href="#"class="btn btn-success mr-3  ml-2"> Excel <i class="fas fa-cloud-download-alt"></i></button></a>'
);

    // search engine
    $("#search").keyup(function () {
        table.search(this.value).draw();
    })
    // hapus data
    $('body').on('click', '#hapus', function () {
         if ($('#role').text() == 'admin') {
        url = "/admin/disposisi/delete/";
    } else if ($('#role').text() == 'kepsek') {
        url = "/admin/kepsek/disposisi/delete/";
    }
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
                console.log(id);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: url + id,
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
