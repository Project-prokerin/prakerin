$(document).ready(function () {
    var filter = $('#search').val();
    if ($('#role').text() == 'admin') {
        url = "/admin/disposisi/ajax";
    } else if ($('#role').text() == 'kepsek') {
        url = "/admin/kepsek/disposisi/ajax";
    }
    console.log($('#role').text());
    var table = $('#table-6').DataTable({
        dom: '<<"row"<"col-sm-12 col-md-6 btn-table"><"col-sm-12 col-md-6"f>>>t<"bottom"<"row"<"col-6"i><"col-6 mb-4"p>>>',
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
                data: 'Pojkatujuan',
                name: 'Pojkatujuan'
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
    if ($('#role').text() == 'admin') {
        $('.btn-table').append(
            '<a href="/admin/surat_masuk/tambah"class="btn btn-primary rounded-pill ml-3"> Tambah Data <i class="fas fa-plus"></i></button></a>'
        );
    } else if ($('#role').text() == 'kepsek') {
        $('.btn-table').append(
            '<a href="/admin/kepsek/surat_masuk/tambah"class="btn btn-primary rounded-pill ml-3"> Tambah Data <i class="fas fa-plus"></i></button></a>'
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
                    url: "/admin/disposisi/delete/" + id,
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
