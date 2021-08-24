<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DATA PERUSAHAAN MANGANG SMK TARUNA BHAKTI</title>
    {{-- font google --}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ribeye&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bowlby+One+SC&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Martel:wght@300&display=swap" rel="stylesheet">

</head>
<style>
    @font-face {
        font-family: 'Bowlby One SC', cursive;
        src: url({{ storage_path('fonts/BowlbyOneSC-Regular.ttf') }}) format('truetype');
        /* src: url("asset(font/BowlbyOneSC-Regular.ttf)"); */
        font-weight: normal;
    }

    .logo {
        width: 150px;
        height: 150px;
        margin-top: -20px;
        float: left;

    }

    .font1 {
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif
    }

    .font2 {
        font-family: 'Ribeye', cursive;
    }

    .font3 {
        font-family: sans-serif
    }

    .font4 {
        font-family: 'Bowlby One SC', cursive;
    }

    .font5 {
        font-family: 'Noto Sans', sans-serif;
    }

    .font6 {
        font-family: 'Martel', serif;
    }

    h1 {
        font-family: sans-serif;
    }

    .hr-1 {
        border-bottom: 1px solid black;
        margin-top: -10px;

    }

    .hr-2 {
        border-bottom: 3px solid black;
        margin-top: -6px;
    }

    .hr-3 {
        border-bottom: 1px solid black;
        margin-top: -6px;

    }

    .container {
        padding-right: 43px;
        padding-left: 43px;
        font-family: 'Martel', serif;
        margin-bottom: 14px;


    }

    .container-table {
        padding-right: 43px;
        padding-left: 43px;
        font-family: 'Martel', serif;


    }

    table {
        border-collapse: collapse;
        font-size: 13px;
        margin-top: -6px;
        p
    }

    thead th {
        background-color: rgb(182, 208, 211);
        text-align: center;
        font-family: 'Noto Sans', sans-serif;

        font-weight: 500;
    }

    td,
    th {
        border: 1px solid #999;
        text-align: center;
        padding: 0.2rem;
    }

    .ttd {
        margin-top: -35px;
        text-align: right;
        font-size: 20px;
    }

    .kiri-bawah {
        margin-top: -50px;
        float: left;

    }

    .kiri-bawah ol {
        margin-top: -30px;
        font-size: 14px;


    }

</style>
<!-- header buka -->

<body style="font-family: 'Bowlby One SC', cursive;">
    <div>
        <div>
            <div>
                {{-- <img  alt="" style="width: 150px; height: 150px;"> --}}
                <img class="logo" src="https://pbs.twimg.com/profile_images/753761871300218880/OC5yL5QZ.jpg" alt=""
                    srcset="">
            </div>
            <div>
                <h2 class="font4"
                    style="margin-top: -30px; margin-left: -20px; text-align:center;       font-weight: lighter;">
                    YAYASAN SETYA BHAKTI</b></h2>
                <h1 class="font2" style="margin-top: -25px; margin-left: -10px; text-align:center;"><span>SMK TARUNA
                        BHAKTI</span></h1>
                <h5 style="margin-top: -25px; margin-right: -5px; text-align:center; "><b>TERAKREDITASI: "A" No :
                        02.00/203/BAN-SM/XII/2018</b></h5>
                <h5 style="margin-top: -25px; margin-right: -5px; text-align:center; "><b>Izin No:
                        421.4/1150/DISDIK/2004 - NPSN: 20229232</b></h5>
                <h6 style="margin-top: -20px; margin-right: -5px; text-align:center;" class="font5">KOMPETENSI KEAHLIAN:
                </h6>
                <h6 style="margin-top: -25px; margin-right: -5px; text-align:center;" class="font5">PODUKSI DAN SIARAN
                    PROGRAM TELEVISI | TEKNIK ELEKTRONIKA INDUSTRI</h6>
                <h6 style="margin-top: -25px; margin-right: -5px; text-align:center;" class="font5">TEKNIK KOMPUTER DAN
                    JARINGAN | MULTIMEDIA | REKAYASA PERANGKAT LUNAK</h6>
            </div>
            <div style="clear: both;">
                <h6 style="margin-top: -20px;  text-align:center;" class="font5">JALAN PEKAPURAN CURUG CIMANGGIS DEPOK
                    16953 TELP.:(021) 8744810 FAKS.:(021) 87743374 </h6>
                <h5 style="margin-top: -25px;  text-align:center;" class="font5"><b
                        style="font-size: 15px; font-weight: bold;">Website : </b> <a
                        href="https://smktarunabhakti.net/">https://smktarunabhakti.net/</a> <b
                        style="font-size: 15px; font-weight: bold;"> &nbsp;E-mail :</b> <a
                        href="taruna@smktarunabhakti.net ">taruna@smktarunabhakti.net</a></h5>
                <hr class="hr-1">
                <hr class="hr-2">
                <hr class="hr-3">
                <h6 class="font6" style="margin-top: 1px; font-size: 14px;">No &nbsp;&nbsp;&nbsp;&nbsp; :&nbsp;
                    {{ $nomor }}/421.5-SMK.TB/HUBIN/PRAKERIN/{{$bulan}}/{{$tahun}}</h6>
                <h6 class="font6" style="margin-top: -32px; font-size: 14px; ">Lamp :&nbsp; -</h6>
                <h6 class="font6" style="margin-top: -32px; font-size: 14px; ">Hal &nbsp;&nbsp;&nbsp; :&nbsp; <a href=""
                        style=" color:black; font-weight: bolder;">Pelaksanaan Prakerin</a></h6>
                <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -15px;">Kepada</h6>
                <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px; ">Yth.
                    &nbsp;&nbsp;&nbsp; <b style="font-weight: bolder;">Bapak / Ibu Pimpinan PT {{$perusahaan}} </b> </h6>
                <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -30px; ">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$alamat_perusahaan}} </h6>
                <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -30px; ">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Di </h6>
                <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -30px; ">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tempat </h6>
                <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px; ">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dengan hormat, </h6>
                <div class="container">
                    <div style="width: 660px;text-align:justify;">
                        <p style="font-size: 14px; margin-top: -25px; " class="font6">
                            Salam sejahtera kami sampaikan semoga Bapak/Ibu selalu dalam keadaaan sehat wal'afiat serta
                            selalu diberikan kelancaran dalam menjalankan
                            segala aktivitasnya.
                        </p>
                        <p style="font-size: 14px;  " class="font6">
                            Dalam rangka pelaksanaan salah satu program SMK Taruna Bhakti di bidang Hubungan Industri
                            yang salah satunya adalah pelaksanaan <b>Praktek Kerja Industri (PRAKERIN)</b>
                            bagi peserta didik tingkat kelas XII(Dua Belas),dengan ini SMK Taruna Bhakti mengucapkan
                            terima kasih atas kesediaannya menerima peserta didik kami untuk melaksanakan
                            prakerin di tempat saudara,dan untuk itu mulai hari {{$hari_from}} tanggal {{$date_from}} kami
                            akan mengantarkan peserta didik kami untuk mulai melaksanakan prakerin di tempat
                            saudara selama {{$jumlah_bulan}}  sampai dengan tanggal {{$date_end}} dengan data sebagai berikut :
                        </p>
                    </div>
                    <div class="container-table">
                        <table class="font5">
                            <thead>
                                <tr>
                                    <th style="width: 60px;">No</th>
                                    <th style="width: 100px;">NIPD</th>
                                    <th style="width: 160px;">Nama Peserta Didik</th>
                                    <th style="width: 180px;">Kompetensi Keahlian</th>
                                </tr>
                            </thead>
                            <tbody>


                                @foreach ($kelompok as $kel)

                              
                                    <tr>
                                      <td>{{ $loop->iteration }}</td>
                                      <td>{{ $kel->siswa->nipd }}</td>
                                      <td>{{ $kel->siswa->nama_siswa }}</td>
                                <td>{{ App\Models\kelas::where('level',$kel->siswa->kelas)->first()->jurusan->jurusan}}</td>

                                  </tr>


                                @endforeach
                            </tbody>
                        </table>
                    </div>

                   @if ($tandatangan_kepsek == '')
                           <div class="bwhtbl" style="width:660px;text-align: justify;">
                               <p style="font-size: 14px; margin-top: 3px; " class="font6">
                                   Besar harapan kami permohonan ini bisa terkabulkan demi terjalinnya kerjasama antara
                                   SMK Taruna Bhakti dengan perusahaan/instansi yang bapak/ibu pimpin demi terciptanya
                                   link and match antara dunia pendidikan dengan dunia usaha/industri.
                                   <br>
                                   Demikian permohonan ini kami sampaikan.Atas perhatian dan kerjasamanya kami ucapkan
                                   terima kasih.
                               </p>
                           </div>
                           <div class="ttd">
                               <h6 class="font6" style="margin-right: 28px;" >Depok, {{ $waktu }}</h6>
                               <h6 class="font6" style="margin-top: -30px;">{{$jabatanT}}</h6>
                           </div>
                       
                       
                       
                           <div class="kiri-bawah">
                               <h6 style="font-size: 14px;">Tembusan Yth:</h6>
                               <ol>
                                   <li>Ketua Yayasan Setya Bhakti</li>
                                   <li>Waka. Bidang Kurikulum</li>
                                   <li>Pertinggal</li>
                               </ol>
                           </div>
                           <div style="text-align: right;">
                               <h6 style="font-size: 14px; margin-top: 80px;margin-right:30px;">{{$namaT}}</h6>
                               <h6 style="font-size: 14px; font-weight: light; margin-top: -30px;margin-right:10px;">NIK. {{$nikT}}</h6>
                           </div>
                       
                   @else 
                                <div class="bwhtbl" style="width:660px;text-align: justify;">
                                    <p style="font-size: 14px; margin-top: 3px; " class="font6">
                                        Besar harapan kami permohonan ini bisa terkabulkan demi terjalinnya kerjasama antara
                                        SMK Taruna Bhakti dengan perusahaan/instansi yang bapak/ibu pimpin demi terciptanya
                                        link and match antara dunia pendidikan dengan dunia usaha/industri.
                                        <br>
                                        Demikian permohonan ini kami sampaikan.Atas perhatian dan kerjasamanya kami ucapkan
                                        terima kasih.
                                    </p>
                             </div>

                             <div class="ttd" style="margin-top: -18px;">
                                 <h6 class="font6" style="margin-bottom: 10px; margin-right: 28px;" >Depok, {{ $waktu }}</h6>
                                 <h6 class="font6" style="margin-top: -10px;">{{$jabatanT}}</h6>
                             </div>
                         
                         
                             <div class="kiri-bawah">
                                 <h6 style="font-size: 14px;">Tembusan Yth:</h6>
                                 <ol>
                                     <li>Ketua Yayasan Setya Bhakti</li>
                                     <li>Waka. Bidang Kurikulum</li>
                                     <li>Pertinggal</li>
                                 </ol>
                             </div>
                             <div style="text-align: right; margin-top: 10px; ">
                                 <img src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path("$tandatangan_kepsek->path_gambar")))}}" style="margin-bottom: 10px; margin-top: 1px; z-index: 2; width: 125px; height: 105px;margin-right:20px;"/> 
                                 <h6 style="font-size: 14px; margin-top: -5px;margin-right:30px;">{{$namaT}}</h6>
                                 <h6 style="font-size: 14px; font-weight: light; margin-top: -30px;margin-right:10px;">NIK. {{$nikT}}</h6>
                             </div>

                   @endif


                </div>


            </div>


        </div>
        <!-- header tutup -->

        {{-- <div class="container"> --}}
        <!-- garis -->
        {{-- <div class="garis" > --}}

        {{-- </div> --}}
        <!-- garis tupp -->
        <!-- lampiran -->
        {{-- <div class="isi" > --}}
        {{-- <h6> No : 063/421.5-SMK.TB/HUBIN/PRAKERIN/II/2021 </h6> --}}
        {{-- <h6> Lamp : - </h6> --}}
        {{-- <h6> Hal : <b><u>Pelaksanaan Prakerin</u></b> </h6> --}}
        {{-- </div> --}}
        <!-- lampitup -->

        {{-- <h6>Kepada</h6> --}}
        {{-- <h6> Yth. --}}
        {{-- <b >Bapak / Ibu Pimpinan PT Abadiri Paradipa  (ABDIRA)</b> </h6> --}}
        {{-- <div class="isi2">
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
        </div> --}}

        {{-- <table cellspacing='0'>
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
    </table> --}}
        <!-- textbawah -->
        {{-- <div class="bawah"> --}}
        {{-- <h6>Besar harapan kami kepada saudara agar membimbing serta mendidik peserta didik kami dalam pelaksanaan prakerinnya agar bisa menjadi insan yang bermutu --}}
        {{-- dan berkualitas. --}}
        {{-- </h6> --}}
        {{-- <h6>Demikian Surat ini kami sampaikan.Atas perhatian dan Kerjasamanya diucapkan terima kasih.</h6> --}}
        {{--  --}}
        {{-- </div> --}}

    </div>


    </div>
</body>
{{--  --}}

</html>
