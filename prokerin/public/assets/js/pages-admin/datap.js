$(document).ready( function () {
    root = window.location.protocol + '//' + window.location.host;
    filter = $('#search').val();
    role = $('#role').data('role');

    console.log(filter);
    var table = $('#table19').DataTable({
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
        url: root + "/admin/data_prakerin/ajax/",
        type: "get",
        },
        columns:[
        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
        { data: 'nama',name:'nama'},
        { data: 'kelas',name:'kelas'},
        { data: 'jurusan',name:'jurusan'},
        { data: 'perusahaan',name:'perusahaan.nama'},
        { data: 'status',name:'status'},
        {
        data: 'tgl_mulai',
        type: 'num',
        render: {
            _: 'display',
            sort: 'timestamp'
        }
        },{
        data: 'tgl_selesai',
        type: 'num',
        render: {
            _: 'display',
            sort: 'timestamp'
        }
        },
        { data: 'tgl_pelaksanaan',name:'tgl_pelaksanaan'},
        { data: 'action',name:'action'}
        ],
        order: [[0,'asc']],
          columnDefs: [
        { targets: [5], 'createdCell':  function (td, cellData, rowData, row, col) {
                if (cellData == 'Pengajuan') { // untuk MEWARNAI COLUMN TABLE
                    $(td).addClass('bg-primary  text-white');
                }else if(cellData == 'Magang'){
                    $(td).addClass('bg-warning  text-white');
                }else if(cellData == "Selesai"){
                    $(td).addClass('bg-success  text-white');
                }else if(cellData == "Batal"){
                    $(td).addClass('bg-danger  text-white');
                }
        }},
        ],
    });

    if(role != "kaprog" && role != "kepsek" && role != "pembimbing" && role != "tu" && role != "bkk")
    {
        $('.btn-table').append(
            '<a href="'+root+'/admin/data_prakerin/tambah"class="btn btn-primary "> Tambah Data <i class="fas fa-plus"></i></button></a>'
        );
    }
    if(role == "hubin" || role == 'kaprog' || role == 'admin')
    $('#table19_filter').prepend(
    '<a href="'+root+'/admin/export/excel/data_prakerin"class="btn btn-success mr-3  ml-2"> Excel <i class="fas fa-cloud-download-alt"></i></button></a>'
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
                url: root + "/admin/data_prakerin/delete/"+ id,
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

})
});
