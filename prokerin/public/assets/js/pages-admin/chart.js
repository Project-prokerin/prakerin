$(document).ready(function () {
    var ctx = document.getElementById("myChart4").getContext('2d');

$.ajax({
    url: root + '/admin/dashboard/ajax', 
    type: "POST",
   data: {
        _token: "{{ csrf_token() }}",
        },

    success: function (data) {
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                datasets: [{
                    data: data.data,
                    backgroundColor: [

                        '#63ed7a',
                        '#ffa426',
                        '#fc544b',

                    ],
                    label: 'Dataset 1'
                }],
                labels: [

                    'Surat Masuk',
                    'Disposisi',
                    'Surat Keluar',

                ],
            },
            options: {
                responsive: true,
                legend: {
                    position: 'bottom',
                },
            }
        });

    },
    error: function (data) {
        console.log('Error:', data);
    }
});
})