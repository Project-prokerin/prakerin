// auth times session
$.ajax({
     headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: '/log',
    data: '',
    method: 'POST',
    success:function name(data) {
        $('.waktu_log').html(data.waktu)
    },
    fail:function name(params) {

    }
})
