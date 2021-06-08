var ctx = document.getElementById("myChart4").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'pie',
  data: {
    datasets: [{
      data: [

        50,
        40,
        30,

      ],
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
