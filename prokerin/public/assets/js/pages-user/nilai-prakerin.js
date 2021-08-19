$(document).ready(function () {
    var filter = $('#search').val();
    root = window.location.protocol + '//' + window.location.host;
    // function data() {

    // get header




    // ini buat filter
    table_ajax();
    header_ajax();
    $('.jurusan').change(function () {
        val = $(this).val();
        datas = []
        table_ajax(val);
        header_ajax(val);
    })

    function header_ajax(val = 1) {
        $.ajax({
            url: root + "/siswa/nilai_prakerin/column/ajax/" + val,
            type: "get",
            success: function (response) {
                console.log(response);
                $('#table9 tr').eq(0).empty().append();
                $('#table9 tr ').eq(0).append('<th>No</th>' + '<th style="width:100px;">Nama Siswa</th>');
                response.data.forEach(element => {
                    if (element.aspek_yang_dinilai) {
                        $('#table9 tr ').eq(0).append('<th>' + element.aspek_yang_dinilai + '</th>');
                    } else {
                        $('#table9 tr ').eq(0).append('<th>Aspek Nilai kosong</th>');
                    }

                });
                $('#table9 tr ').eq(0).append('<th style="width:100px;">Action</th>');
            },

            error: function (data) {
                console.log('Error:', data);
            }
        });
    }

    // ajax
    function table_ajax(val = 1) {
        $.ajax({
            url: root + "/siswa/nilai_prakerin/column/ajax/" + val,
            type: "get",
            success: function (response) {
                column = [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        mData: "DT_RowIndex",
                        sName: "DT_RowIndex"
                    },
                    {
                        data: 'nama_siswa',
                        name: 'nama_siswa'
                    },
                ]
                // masukan aspek yang di nilai
                response.data.forEach(element => {
                    column.push({
                        data: element.aspek_yang_dinilai,
                        name: element.aspek_yang_dinilai
                    });
                });
                // masukan action nya
                column.push({
                    data: 'action',
                    name: 'action',
                    mData: "action",
                    sName: "action"
                });
                console.log(column)
                // call ajax
                let value = '';
                var table = $('#table9').DataTable({
                    dom: "<'row'<'ol-sm-12 col-md-6 btn-table'><'col-sm-12 col-md-6  pdf-button'>>" +
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
                        url: root + "/siswa/nilai_prakerin/ajax",
                        type: "POST",
                        data: function (data) {
                            data.filter = val;
                            return data
                        },
                    },
                    columns: column
                });
                // table.draw();
                $('.jurusan').change(function (e) {
                    table.clear().destroy();
                    table.draw();
                })
                // $('.btn-table').append(
                //     '<a href="' + root + '/siswa/nilai_prakerin/tambah"class="btn btn-primary "> Tambah Data <i class="fas fa-plus"></i></button></a>'
                // );
                // $('#table9_filter').prepend(
                //     // '<select name="filter_absen" id="filter_absen" class="form-control filter_absen w-50" >' +
                //     // '<option value="">FILTER JURUSAN</option>' +
                //     // '</select>' +
                //     '<a href="' + root + '/admin/export/siswa/nilai_prakerin"class="btn btn-success mr-3  ml-2"> Excel <i class="fas fa-cloud-download-alt"></i></button></a>'
                // );

                // search engine
                $("#search").keyup(function () {
                    console.log(this.value);
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
                                url: root + "/siswa/nilai_prakerin/delete/" + id,
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

            },

            error: function (data) {
                console.log('Error:', data);
            }
        });
    }


    





});

function belumAdaNilai(){
    alert('Nilai Belum terdaftar! ');
}