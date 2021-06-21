    root = window.location.protocol + '//' + window.location.host;


    function time(){
    $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: root + '/time',
            type: 'POST',
            data: '',
            success : function (data) {
                $('#waktu_log').html(data)
            },
            erorr:function (data ) {
                console.log('Error:', data);
            }
        });
    }

    setInterval(() => {
        time();
    }, 1000);
