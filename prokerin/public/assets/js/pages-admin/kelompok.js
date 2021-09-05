$(document).ready(function() {
    var filter = $('#search').val();
    root = window.location.protocol + '//' + window.location.host;
    role = $('#role').data('role');

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
            url: root+"/admin/kelompok/ajax/",
            type: "get",
        },
        columns: [{
                data: 'no',
                name: 'no'
            },
            {
                data: 'guru',
                name: 'guru.nama'
            },
            // { data: 'no_telpon',name:'no_telpon'},
            // { data: 'jurusan',name:'jurusan'},
            {
                data: 'nama_perusahaan',
                name: 'nama_perusahaan'
            },
            // { data: 'data_prakerin',name:'data_prakerin.'},
            {
                data: 'action',
                name: 'action'
            }
        ],
        order: [
            [0, 'asc']
        ]
    });

    if (role != "hubin" && role != "kaprog"  && role != "admin"  ) {
    
    
    }else {
        $('.btn-table').append(
            '<a href="'+root+'/admin/kelompok/tambah"class="btn btn-primary "> Tambah Data <i class="fas fa-plus"></i></button></a>'
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
                    url: root+"/admin/kelompok/destroy_all/" + id,
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

});

$(document).ready(function() {


    $(document).on('click', '#kelompoks', function() {
        swal("Masukan Nomor Kertas", {
                content: "input",
            })
            .then((value) => {
                var id = $(this).data('no');
                var nomor = value;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: root+"/admin/export/pdf/kelompok/" + id + "/" + nomor,
                    type: "POST",
                    data: {
                        "id": id,
                        "nomor": nomor,
                    },
                    xhrFields: {
                        responseType: 'blob'
                    },
                    success: function(response) {
                        // swal(`Berhasil Di download!`);
                        swal({
                            title: "Success!",
                            text: "Berhasil Di Download",
                            icon: "success",
                        });
                        var blob = new Blob([response]);
                        var link = document.createElement('a');
                        link.href = window.URL.createObjectURL(blob);
                        link.download = "Sample.pdf";
                        link.click();
                    },
                    error: function(blob) {
                        console.log(blob);
                        swal({
                            title: "Error!",
                            text: "Gagal Di Download",
                            icon: "error",
                        });


                    }
                });

            });
    })

    });
