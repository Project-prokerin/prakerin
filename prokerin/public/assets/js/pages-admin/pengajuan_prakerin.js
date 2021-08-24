$(document).ready(function() {
    var filter = $('#search').val();
        root = window.location.protocol + '//' + window.location.host;
        role = $('#role').data('role');

        function column(role) {
            if (role == "kepsek" ) {
                return [{ data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'guru', name: 'guru' },
                { data: 'nama_perusahaan', name: 'nama_perusahaan' },
                { data: 'persetujuan', name: 'persetujuan' },
                { data: 'action', name: 'action' },]
            } else if ( role == 'hubin' || role == 'kaprog' || role == 'admin' || role == "tu" || role == "bkk") {
                return [{ data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'guru', name: 'guru' },
                { data: 'nama_perusahaan', name: 'nama_perusahaan' },
                { data: 'status', name: 'status' },
                // { data: 'persetujuan', name: 'persetujuan' },
                { data: 'action', name: 'action' },]
            }
        }    
    var table = $('#table30').DataTable({
        dom:
        "<'row'<'ol-sm-12 col-md-6 btn-table'><'col-sm-12 col-md-6  pdf-button'f>>" +
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
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: root+"/admin/pengajuan_prakerin/ajax",
            type: "post",
            data: function(data) {
                data = '';
                return data
            }
        },
        columns: column(role),

      
        
    });
    console.log(role);
    if (role == "hubin" || role == "kaprog" || role == "admin" ) {
        $('.btn-table').append(
            '<a href="'+root+'/admin/pengajuan_prakerin/tambah"class="btn btn-primary "> Tambah Data <i class="fas fa-plus"></i></button></a>'
        );
    }


    // search engine
    $("#search").keyup(function() {
        table.search(this.value).draw();
    })

    // hapus data
    $('body').on('click', '#hapus', function() {
        // sweet alert
        Swal.fire({
            title: 'Apa anda yakin?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value) {
                id = $(this).data('no');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: root+"/admin/pengajuan_prakerin/destroy/" + id,
                    type: "DELETE",
                    data: '',
                    success: function(data) {
                        console.log(data);
                        table.draw();
                        Swal.fire(
                            'success',
                            'Data anda berhasil di hapus.',
                            'success'
                        )
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {}
        })

    })



    $('body').on('click', '#acc', function() {
        // sweet alert
        Swal.fire({
            title: 'Acc persetujuan?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value) {
                no = $(this).data('no');
                console.log(no);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: root+"/admin/pengajuan_prakerin/acc/" + no,
                    type: "POST",
                    data: '',
                    success: function(data) {
                        console.log(data);
                        table.draw();
                        Swal.fire(
                            'success',
                            'Berhasil Acc !.',
                            'success'
                        )
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {}
        })

    })

        $('body').on('click', '#tolak', function () {

            
            // sweet alert
            Swal.fire({
                title: 'tolak persetujuan?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.value) {
                    no = $(this).data('no');
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: root + "/admin/pengajuan_prakerin/tolak/" + no,
                        type: "POST",
                        data: '',
                        success: function (data) {
                            console.log(data);
                            table.draw();
                            Swal.fire(
                                'success',
                                'Berhasil di batalkan !.',
                                'success'
                            )
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {}
            })

        })

});






$(document).on('click', '#accButton', function (event) {
    event.preventDefault();
    let href = $(this).attr("data-attr");
    console.log(href)
    $.ajax({
        url: href,
        beforeSend: function () {
            $('#loader').show();
        },
        // return the result
        success: function (result) {
            $('#accModal').modal("show");
            $('#accBody').html(result).show();
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


$('#setujuimagang').click(function (event) {
    event.preventDefault();
    var form = $('#accmagang_form'),
        url = form.attr('action'),
        method = form.attr('method');
    form.find('.invalid-feedback').remove();
    form.find('.form-control').removeClass('is-invalid')
    $.ajax({
        url: url,
        method: method,
        data: form.serialize(),
        success: function name(data) {
            console.log(data.data);
            form.trigger('reset');
            $('#accModal').modal('hide');
            alert = Swal.fire({
                title: 'Berhasil',
                text: ' Berhasil Magang! ',
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












// $(document).ready(function() {

// // Ori
//     $(document).on('click', '#kelompoks', function() {
       

//         swal("Masukan Nomor Surat", {
//                 content: "input",
//             })
//             .then((value) => {
//                 var id = $(this).data('no');
//                 // var nomor = value;
//                 $.ajaxSetup({
//                     headers: {
//                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                     }
//                 });

              

//                 $.ajax({
//                     url: root+"/admin/export/pdf/pengajuan_prakerin/"+id+"/" + value,
//                     type: "POST",
//                     data: {
//                         "id": id,
//                         "nomor": value,
//                     },
//                     xhrFields: {
//                         responseType: 'blob'
//                     },
//                     success: function(response) {
//                         swal({
//                             title: "Success!",
//                             text: "Berhasil Di Download",
//                             icon: "success",
//                         });
//                         var blob = new Blob([response]);
//                         var link = document.createElement('a');
//                         link.href = window.URL.createObjectURL(blob);
//                         link.download = "Prakerin.pdf";
//                         link.click();
//                     },
//                     error: function(blob) {
//                         console.log(id,blob);
//                         swal({
//                             title: "Error!",
//                             text: "Gagal Di Download",
//                             icon: "error",
//                         });


//                     }
//                 });

//             });
//     })










// });




$(document).on('click', '#kelompoks', function (event) {
    event.preventDefault();
    let href = $(this).attr("data-attr");
    console.log(href)
    
    $.ajax({
        url: href,
        beforeSend: function () {
            $('#loader').show();
        },
        // return the result
        success: function (result) {
            $('#downloadModal').modal("show");
            $('#downloadBody').html(result).show();
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

$('#download').click(function (event) {
    event.preventDefault();
    var form = $('#export_form'),
        url = form.attr('action'),
        method = form.attr('method');
    form.find('.invalid-feedback').remove();
    form.find('.form-control').removeClass('is-invalid');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url,
        type: method,
        data: form.serialize(),
        xhrFields: {
            responseType: 'blob'
        },
        success: function name(data) {
            console.log(data.data);
            form.trigger('reset');
            $('#downloadModal').modal('hide');
            alert = Swal.fire({
                title: 'Berhasil',
                text: ' Berhasil Download Surat Pengajuan! ',
                icon: 'success',
                confirmButtonText: 'tutup'
            })
            var blob = new Blob([data]);
                        var link = document.createElement('a');
                        link.href = window.URL.createObjectURL(blob);
                        link.download = "Prakerin.pdf";
                        link.click();

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



