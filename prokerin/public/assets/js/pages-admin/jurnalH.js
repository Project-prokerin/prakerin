$(document).ready(function () {
    var filter = $("#search").val();
    root = window.location.protocol + '//' + window.location.host;
        console.log(filter);
    var table = $('#table99').DataTable({
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
        "responsive": true,
        "autoWidth": false,
        ajax: {
            url: root+"/admin/jurnalH/ajax/",
            type: "get",
        },
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'nama_siswa',
                name: 'nama_siswa'
            },
            {
                data: 'tanggal',
                name: 'tanggal'
            },
            {
                data: 'datang',
                name: 'datang'
            },
            {
                data: 'pulang',
                name: 'pulang'
            }, //add colump di data tab;e
            {
                data: 'kegiatan_harian',
                name: 'kegiatan_harian'
            },
            {
                data: 'action',
                name: 'action'
            }
        ],
         columnDefs: [
        { targets: [2,5], 'createdCell':  function (td, cellData, rowData, row, col) {
                    $(td).addClass('text-left');
        }},
        ],
    });
    role = $('#role').data('role');
    if (role != 'kaprog' || role != 'tu') {
    
    }else {
        
        $('.btn-table').append(
            '<a href="'+root+'/admin/jurnalH/tambah"class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Tambah Data <i class="fas fa-plus"></i></button></a>'
        );
    }
    if(role == 'admin'){
        $('.btn-table').append(
            '<a href="'+root+'/admin/jurnal/tambah"class="btn btn-primary "> Tambah Data <i class="fas fa-plus"></i></button></a>'
        );   
    }

    $('#table99_filter').prepend(
        '<a href="'+root+'/admin/export/excel/jurnalH"class="btn btn-success mr-3  ml-2"> Excel <i class="fas fa-cloud-download-alt"></i></button></a>'
    );

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
                    url: root+"/admin/jurnalH/delete/" + id,
                    type: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
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




$('#submit').click(function (event) {
    event.preventDefault();
    var form = $('#contact_form'),
        url = form.attr('action'),
        method = form.attr('method');

    form.find('.invalid-feedback').remove();
    form.find('.form-control').removeClass('is-invalid')
    $.ajax({
        url: url,
        method: method,
        data: form.serialize(),
        success: function name(params) {
            form.trigger('reset');
            $('#exampleModal').modal('hide');
            alert = Swal.fire({
                title: 'Berhasil',
                text: 'Anda sudah absen hari ini',
                icon: 'success',
                confirmButtonText: 'tutup'
            })

            setInterval(() => {
                alert
            }, 3000);

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


//edit
$(document).on('click', '#editButton', function (event) {
    event.preventDefault();
    let href = $(this).attr("data-attr");

    $.ajax({
        url: href,
        beforeSend: function () {
            $('#loader').show();
        },
        // return the result
        success: function (result) {
            $('#editModal').modal("show");
            $('#editBody').html(result).show();
        },
        complete: function () {
            $('#loader').hide();
        },
        error: function (jqXHR, testStatus, error) {
            console.log(error);
            alert("Page " + href + " cannot open. Error:" + error);
            $('#loader').hide();
        },
        timeout: 8000
    })
});

$('#update').click(function (event) {
    event.preventDefault();
    var form = $('#edit_form'),
        url = form.attr('action'),
        method = form.attr('method');
    var nama = $(".id_siswa option:selected").text();
    form.find('.invalid-feedback').remove();
    form.find('.form-control').removeClass('is-invalid')
    $.ajax({
        url: url,
        method: method,
        data: form.serialize(),
        success: function name(params) {
            form.trigger('reset');
            $('#editModal').modal('hide');
            alert = Swal.fire({
                title: 'Berhasil',
                text: '' + nama + ' Berhasil Update Absen ',
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
