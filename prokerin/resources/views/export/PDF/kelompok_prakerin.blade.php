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
  border: #ccc 1px solid;
  margin-left: 20px;
}
 
table th {
  padding: 15px 35px;
  border-left:1px solid #e0e0e0;
  border-bottom: 1px solid #e0e0e0;
  background-color: #74b9ff;
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
}
.garis{
  width: auto;
  height: 10px;
  background-color: black;
  margin-bottom: 20px;
}
.isi2{
  width: auto;
  font-size: 18px;
  line-height: 20px;
  padding-left: 40px;
}.bawah{
  width: auto;
  font-size: 18px;
  line-height: 20px;
  padding-left: 40px;
}.container{
  font-family: Georgia, 'Times New Roman', Times, serif;
  font-size: 19px;
}
</style>
<!-- header buka -->
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
        <!-- header tutup -->
 
        <div class="container">
      <!-- garis -->
      <div class="garis" > 

      </div>
      <!-- garis tupp -->
      <!-- lampiran -->
      <div class="isi" >
      <h6> No : 063/421.5-SMK.TB/HUBIN/PRAKERIN/II/2021 </h6>
      <h6> Lamp : - </h6>
      <h6> Hal : <b><u>Pelaksanaan Prakerin</u></b> </h6>
    </div>
      <!-- lampitup -->
      
      <h6>Kepada</h6>
      <h6> Yth. 
         <b >Bapak / Ibu Pimpinan PT Abadiri Paradipa  (ABDIRA)</b> </h6>
      <div class="isi2">
      <h6>jln Gama Setia Barat 2 No 8 Bhakti Jaya Kec. Sukmajaya Kota Depok 16418</h6>
      <h6 >di</h6>
      <h6>Tempat</h6>
      <h6>Dengan hormat</h6>
      <h6>Salam sejahtera kami sampaikan semoga Bapak/Ibu selalu dalam keadaaan sehat wal'afiat serta selalu diberikan kelancaran dalam menjalankan
         segala aktivitasnya.</h6>
         <h6>Dalam rangka pelaksanaan salah satu program SMK Taruna Bhakti di bidang Hubungan Industri yang salah satunya adalah pelaksanaan <b>Praktek Kerja Industri (PRAKERIN)</b> 
        bagi peserta didik tingkat kelas XII(Dua Belas),dengan ini SMK Taruna Bhakti mengucapkan terima kasih atas kesediaannya menerima peserta didik kami untuk melaksanakan
        prakerin di tempat saudara,dan untuk itu mulai hari selasa tanggal 22 Februari 2021 kami akan mengantarkan peserta didik kami untuk mulai melaksanakan prakerin di tempat
        saudara selama 3 bulan sampai dengan tanggal 22 Mei 2021 dengan data sebagai berikut :</h6>
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
    <!-- textbawah -->
    <div class="bawah">
      <h6>Besar harapan kami kepada saudara agar membimbing serta mendidik peserta didik kami dalam pelaksanaan prakerinnya agar bisa menjadi insan yang bermutu 
        dan berkualitas.
      </h6>
      <h6>Demikian Surat ini kami sampaikan.Atas perhatian dan Kerjasamanya diucapkan terima kasih.</h6>

    </div>
  
  </div>


</div>
</body>
{{--  --}}
</html>