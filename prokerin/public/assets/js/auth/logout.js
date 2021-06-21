$(document).ready( function () {
    $('#logout').click(function () {
    root = window.location.protocol + '//' + window.location.host;
    url = root + '/logout';
    Swal.fire({
    title: 'Apa anda ingin logout?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Hapus',
    cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                    url: url,
                    type: "POST",

                    data:'',
                    success: function (data) {
                    //        Swal.fire(
                    //     'success',
                    //     'Anda berhasil logout!.',
                    //     'success'
                    // )
                        root = window.location.protocol + '//' + window.location.host;
                        window.location.href = root + "/";
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {}
    })
});


// waktu login
 root = window.location.protocol + '//' + window.location.host;
$.ajax({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: root+'/time',
    method: 'POST',
    data: '',
    success:function (data) {
        console.log(data);
        $('#waktu_log').html(data.waktu)
    },
    fail:function (params) {

    }
})

});
