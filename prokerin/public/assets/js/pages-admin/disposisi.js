$(document).ready(function () {
    root = window.location.protocol + '//' + window.location.host;
    var filter = $('#search').val();
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
            url: root + '/admin/disposisi/ajax',
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
    if (role == 'admin' ||  role == 'kaprog' || role == 'kepsek') {
        $('.btn-table').append(
            '<a href="'+root+'/admin/disposisi/tambah"class="btn btn-primary "> Tambah Data <i class="fas fa-plus"></i></button></a>'
        );
          $('#table-6_filter').prepend('<a href="'+root+'/admin/disposisi/export/excel"class="btn btn-success mr-3  ml-2"> Excel <i class="fas fa-cloud-download-alt"></i></button></a>'
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
                console.log(id);
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
});
