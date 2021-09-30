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
                        // mengambil token jika memakai url
                        // jika tidak redirect ke dashboard
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
});


