$(document).ready(function () {
    var filter = $('#search').val();
         root = window.location.protocol + '//' + window.location.host;
    role = $('#role').data('role');

    function column(role) {
        if (role == "hubin" || role == "tu" || role == "bkk") {
            return [{ data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'nama_surat', name: 'nama_surat' },
            { data: 'status', name: 'status' },
            { data: 'tgl_surat', name: 'tgl_surat' },
            { data: 'action', name: 'action' },]
        } else if (role == 'kepsek' || role == 'kaprog' || role == 'admin') {
            return [{ data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'nama_surat', name: 'nama_surat' },
            { data: 'dari', name: 'dari' },
            { data: 'jabatan', name: 'jabatan' },
            { data: 'status', name: 'status' },
            { data: 'persetujuan', name: 'persetujuan' },
            { data: 'tgl_surat', name: 'tgl_surat' },
            { data: 'action', name: 'action' },]
        }
    }
    var table = $('#table80').DataTable({
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
            url: root+'/admin/surat_keluar/ajax/',
            type: "get",
            data: function (data) {
                data = '';
                return data
            }
        },
        columns: column(role),

    });

    if (role == 'admin') {
        $('.btn-table').append(
            '<a href="'+root+'/admin/surat_keluar/tambah"class="btn btn-primary  "> Tambah Data <i class="fas fa-plus"></i></button></a>'
        );
    } else if (role == "hubin") {
        $('.btn-table').append(
            '<a href="'+root+'/admin/surat_keluar/tambah"class="btn btn-primary  "> Tambah Data <i class="fas fa-plus"></i></button></a>'
        );
    }


    $('#table80_filter').prepend(
        '<a href="'+root+'/admin/export/excel/surat_keluar"class="btn btn-success mr-3  ml-2"> Excel <i class="fas fa-cloud-download-alt"></i></button></a>'
    );
    // search engine
    $("#search").keyup(function () {
        table.search(this.value).draw();
    })


$('body').on('click', '#tolak', function () {
    // sweet alert
    Swal.fire({
        title: 'Tolak pengajuan ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Tolak',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.value) {
            id = $(this).attr('data-id');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: root+'/admin/surat_keluar/tolak/' + id,
                method: "PUT",
                success: function (data) {
                    console.log(data);
                    table.draw();
                    Swal.fire(
                        'success',
                        'Data anda berhasil di Tolak.',
                        'success'
                    )
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) { }
    })
});

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
                    url: root+'/admin/surat_keluar/delete/' + id,
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
            } else if (result.dismiss === Swal.DismissReason.cancel) { }
        })
    });
});





$(document).on('click', '#tandatanganButton', function (event) {
    event.preventDefault();
    let href = $(this).attr("data-attr");

    $.ajax({
        url: href,
        beforeSend: function () {
            $('#loader').show();
        },
        // return the result
        success: function (result) {
            $('#tandatanganModal').modal("show");
            $('#tandatanganBody').html(result).show();
        },
        complete: function () {
            $('#loader').hide();
        },
        error: function (jqXHR, testStatus, error) {
            // console.log(error);
            alert("Page " + href + " cannot open. Error:" + error);
            $('#loader').hide();
        },
        timeout: 8000
    })



});


$('#setujui').click(function (event) {
    event.preventDefault();
    var form = $('#tandatangan_form'),
        url = form.attr('action'),
        type = form.attr('method');
    form.find('.invalid-feedback').remove();
    form.find('.form-control').removeClass('is-invalid')
    $.ajax({
        url: url,
        type: type,
        data: form.serialize(),
        success: function name(data) {
            console.log(data.data);
            form.trigger('reset');
            $('#tandatanganModal').modal('hide');
            alert = Swal.fire({
                title: 'Berhasil',
                text: ' Berhasil Tanda tangan ',
                icon: 'success',
                confirmButtonText: 'tutup'
            })

            setInterval(() => {
                alert
            }, 7000);

            location.reload();
        },
        error: function (xhr) {
            console.log(xhr.responseJSON)
            var err = xhr.responseJSON;
            if ($.isEmptyObject(err) == false) {
                $.each(err.errors, function (key, value) {

                    $('#' + key).addClass('is-invalid').closest('.input-group').append(
                        '<div class="invalid-feedback">' + value + '</div>')
                    console.log(key);
                })
            }
        }
    });
})
