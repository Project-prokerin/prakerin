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

    h1{
  font-family: sans-serif;
}
 
table {
  font-family: Arial, Helvetica, sans-serif;
  color: #666;
  text-shadow: 1px 1px 0px #fff;
  background: #eaebec;
  border: #ccc 1px solid;
}
 
table th {
  padding: 15px 35px;
  border-left:1px solid #e0e0e0;
  border-bottom: 1px solid #e0e0e0;
  background: #ededed;
}
 
table th:first-child{  
  border-left:none;  
}
 
table tr {
  text-align: center;
  padding-left: 20px;
}
 
table td:first-child {
  text-align: left;
  padding-left: 20px;
  border-left: 0;
}
 
table td {
  padding: 15px 35px;
  border-top: 1px solid #ffffff;
  border-bottom: 1px solid #e0e0e0;
  border-left: 1px solid #e0e0e0;
  background: #fafafa;
  background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
  background: -moz-linear-gradient(top, #fbfbfb, #fafafa);
}
 
table tr:last-child td {
  border-bottom: 0;
}
 
table tr:last-child td:first-child {
  -moz-border-radius-bottomleft: 3px;
  -webkit-border-bottom-left-radius: 3px;
  border-bottom-left-radius: 3px;
}
 
table tr:last-child td:last-child {
  -moz-border-radius-bottomright: 3px;
  -webkit-border-bottom-right-radius: 3px;
  border-bottom-right-radius: 3px;
}
 
table tr:hover td {
  background: #f2f2f2;
  background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
  background: -moz-linear-gradient(top, #f2f2f2, #f0f0f0);
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
                <center>
                    <h4 class="font1 text-center"><b>YAYASAN SETYA BHAKTI</b></h4>
                    <h1 class="font2">SMK TARUNA BHAKTI</h1>
                    <h6 class="font3"><b>TERAKREDITASI: "A" No: 02.00/203/BAN-SM/XII/2018</b></h6>
                    <h6 class="font3"><small><b>Izin No: 421.4/1150/DISDIK/2004 - NPSN : 20229232 </b></small></h6>
                    <h6 class="font3"> <small> KOMPENTENSI KEAHLIAN : </small></h6>
                    <h6 class="font3"> <small> PRODUKSI DAN SIARAN PROGRAM TELEVISI | TEKNIK ELEKTRONIKA INDUSTRI </small></h6>
                    <h6 class="font3"> <small> TEKNIK KOMPUTER DAN JARINGAN | MULTIMEDIA | REKAYASA PERANGKAT LUNAK</small></h6>
                    <h6 class="font3"><small>Jln Pekapuran Kel. Curug-Kec.Cimanggis Depok Kode Pos 16953 Telp (021) 8744810</small> </h6>
                    <h6 class="font3"> <small><b>Website</b><a href="http://www.smktarunabhakti.net"> http://www.smktarunabhakti.net </a> / <b>E-mail: taruna@smktarunabhakti.net</b> </small> </h6>
                </div>
        </center>
            </div>
         
            
        </div>
        
        
        <table cellspacing='0'>
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