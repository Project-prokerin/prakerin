$(document).ready(function () {
    $('#logout').click(function () {
        root = window.location.protocol + '//' + window.location.host;
        url = root + '/logout';
        Swal.fire({
            title: 'Apa anda ingin logout?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: url,
                    type: "POST",

                    data: '',
                    success: function (response) {
                        console.log(response);
                        // mengambil token jika memakai url
                        // jika tidak redirect ke dashboard
                        root = window.location.protocol + '//' + window.location.host;
                        switch (response.role) {
                            case 'apiSiswa':
                                window.location.href = "http://localhost:8000/siswa/dashboard?token=" + response.token;
                                break;
                            case 'apiGuru':
                                window.location.href = "http://localhost:8000/guru/dashboard?token=" + response.token;
                                break;
                            case 'apiManager':
                                window.location.href = "http://localhost:8000/manager/dashboard?token=" + response.token;
                                break;
                        }

                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {}
        })
    });
});
