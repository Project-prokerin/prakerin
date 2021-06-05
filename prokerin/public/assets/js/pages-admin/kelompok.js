$(document).ready(function() {
    var filter = $('#search').val();
    console.log(filter);
    var table = $('#table30').DataTable({
        dom: 't<"bottom"<"row"<"col-6"i><"col-6"p>>>',
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
            url: "/admin/kelompok/ajax/",
            type: "post",
            data: function(data) {
                data = '';
                return data
            }
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
                    url: "/admin/kelompok/destroy_all/" + id,
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
                    url: "/admin/export/pdf/kelompok/" + id + "/" + nomor,
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