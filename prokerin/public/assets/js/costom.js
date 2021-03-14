// waktu login
$.ajax({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: '/log',
    data: '',
    method: 'post',
    success:function name(data) {
        $('.waktu_log').html(data.waktu)
    },
    fail:function name(params) {

    }
})
