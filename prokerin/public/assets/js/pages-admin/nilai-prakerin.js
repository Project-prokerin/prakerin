$(document).ready(function () {
    var filter = $('#search').val();
    root = window.location.protocol + '//' + window.location.host;
    // function data() {


    datas = []
    $.ajax({
        url: root + "/admin/nilai_prakerin/column/ajax",
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
            // ini buat filter
            let val = '';
            // call ajax
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
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: root + "/admin/nilai_prakerin/ajax",
                    type: "POST",
                    data: function (data) {
                        data.filter = val;
                        return data
                    },
                },
                columns: column
            });
            $('.btn-table').append(
                '<a href="' + root + '/admin/siswa/tambah"class="btn btn-primary "> Tambah Data <i class="fas fa-plus"></i></button></a>'
            );
            $('#table9_filter').prepend(
                '<select name="filter_absen" id="filter_absen" class="form-control filter_absen w-50" >' +
                '<option value="">FILTER ABSEN</option>' +
                '</select>' +
                '<a href="' + root + '/admin/export/excel/nilai_prakerin"class="btn btn-success mr-3  ml-2"> Excel <i class="fas fa-cloud-download-alt"></i></button></a>'
            );
            $.ajax({
                url: root + "/admin/nilai_prakerin/get_option/ajax",
                type: "get",
                success: function (response) {
                    console.log(response.kelas);

                    response.kelas.forEach(element => {
                        $('.filter_absen').append('<option value="' + element.id + '">' + element.level + ' ' + element.jurusan.singkatan_jurusan + '</option>');
                    });

                    $('#filter_absen').change(function () {
                        val = $(this).val();
                        table.draw();
                    })

                },

                error: function (data) {
                    console.log('Error:', data);
                }
            });


        },

        error: function (data) {
            console.log('Error:', data);
        }
    });





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
                    url: root + "/admin/nilai_prakerin/delete/" + id,
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
