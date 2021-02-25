<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DATA PERUSAHAAN MANGANG SMK TARUNA BHAKTI</title>
    {{-- font google --}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Ribeye&display=swap" rel="stylesheet">
   
</head>
<style>
 
    .logo{
        width: 210px;
        height: 210px;
        margin-top:20px;
    }
    .font1{
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif
    }
    .font2{
        font-family: 'Ribeye', cursive;
    }
    .font3{
        font-family: sans-serif
    }
</style>
<body>
    <div >
        <div >
            <div>
                    <img class="logo" src="{{asset('images/tb.png')}}"  alt="" srcset="">
            </div>
            <div >
                <div >
                    <h4 class="font1"><b>YAYASAN SETYA BHAKTI</b></h4>
                    <h1 class="font2">SMK TARUNA BHAKTI</h1>
                    <h6 class="font3"><b>TERAKREDITASI: "A" No: 02.00/203/BAN-SM/XII/2018</b></h6>
                    <h6 class="font3"><small><b>Izin No: 421.4/1150/DISDIK/2004 - NPSN : 20229232 </b></small></h6>
                    <h6 class="font3"> <small> KOMPENTENSI KEAHLIAN : </small></h6>
                    <h6 class="font3"> <small> PRODUKSI DAN SIARAN PROGRAM TELEVISI | TEKNIK ELEKTRONIKA INDUSTRI </small></h6>
                    <h6 class="font3"> <small> TEKNIK KOMPUTER DAN JARINGAN | MULTIMEDIA | REKAYASA PERANGKAT LUNAK</small></h6>
                </div>
        
            </div>
         
            
        </div>
        
        
        <table border="1">
        <thead>
            <tr>
              <th>NO</th>
              <th>NIPD</th>
              <th>Nama Peserta Didik</th>
              <th>Kompetensi Keahlian</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kelompok as $kel)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$kel->data_prakerin->siswa->nipd}}</td>
                <td>{{$kel->data_prakerin->nama}}</td>
                <td>{{$kel->data_prakerin->jurusan}}</td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>
</body>
{{--  --}}
</html>