$(document).ready( function () {
    var filter = $('#search').val();
    console.log(filter);
    var table = $('#table13').DataTable({
        dom:
        "<'row'<'ol-sm-12 col-md-6 btn-table'><'col-sm-12 col-md-6  pdf-button'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        bLengthChange: false,
        ordering:false,
        info: true,
        filtering:false,
        searching: true,
        serverside: true,
        processing: true,
        serverSide: true,
        "responsive": true,
        "autoWidth": false,
        ajax:{
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/admin/pembekalan/ajax/",
        type: "post",
        data: function (data) {
            data = '';
            return data
        }
        },
        columns:[
        { data: 'DT_RowIndex', name: 'DT_RowIndex'},
        { data: 'siswa', name:'siswa'},
        { data: 'test_wpt_iq', name:'test_wpt_iq'},
        { data: 'personality_interview', name:'personality_interview'},
        { data: 'soft_skill',name:'soft_skill'},
        { data: 'file',name:'file'},
        { data: 'action',name:'action'}
        ],
        columnDefs: [
        { targets: [1,2,3,4], 'createdCell':  function (td, cellData, rowData, row, col) {
                if (cellData == 'belum') { // untuk MEWARNAI COLUMN TABLE
                    $(td).addClass('bg-danger text-white');
                }else if (cellData == 'sudah') {
                    $(td).addClass('bg-success text-white');
                }
        }},
        { targets: [5], 'createdCell':  function (td, cellData, rowData, row, col) {
                if (cellData == 'belum') { // untuk MEWARNAI COLUMN TABLE
                    $(td).addClass('bg-danger  text-white');
                }else{
                    $(td).addClass('bg-success text-white');
                }
        }},
        ],
    });

    $('.btn-table').append(
        '<a href="/admin/pembekalan/tambah"class="btn btn-primary "> Tambah Data <i class="fas fa-plus"></i></button></a>'
    );
    $('#table13_filter').prepend(
        '<a href="/export/excel/pembekalan"class="btn btn-success mr-3  ml-2"> Excel <i class="fas fa-cloud-download-alt"></i></button></a>'
    );

// search engine
$("#search").keyup(function () {
    table.search( this.value ).draw();
})

    // hapus data
$('body').on('click','#hapus', function () {
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
                    url: "/admin/pembekalan/delete/"+ id,
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
