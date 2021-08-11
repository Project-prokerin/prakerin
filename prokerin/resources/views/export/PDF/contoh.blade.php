<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
    .box1{
        width: 300px;
        height: 200px;
        border: 1px solid black;
        margin-top: 10px;
    }
    table{
        border-collapse: collapse;

    }
    /* th, td {
            padding: 2px;
        } */
    </style>
</head>
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
                <div style="clear:both;">
                    <h6 style="margin-top: -20px;  text-align:center;margin-left: 120px;" class="font5">JALAN PEKAPURAN CURUG CIMANGGIS DEPOK
                        16953 TELP.:(021) 8744810 FAKS.:(021) 87743374 </h6>
                    <h5 style="margin-top: -25px;  text-align:center;margin-left: 110px;" class="font5"><b
                            style="font-size: 15px; font-weight: bold;">Website : </b> <a
                            href="https://smktarunabhakti.net/">https://smktarunabhakti.net/</a> <b
                            style="font-size: 15px; font-weight: bold;"> &nbsp;E-mail :</b> <a
                            href="taruna@smktarunabhakti.net ">taruna@smktarunabhakti.net</a></h5>
                    <hr class="hr-1">
                    <hr class="hr-2">
                    <hr class="hr-3">
                    <h4 style="text-align: center; font-size:20px;">{{$nama_Surat}}</h3>
                    <h6 class="font6" style="margin-top: 1px; font-size: 14px; text-align: center;">Nomor
                        &nbsp;&nbsp; :&nbsp;
                        {{$nomorSurat}}/421.5-SMK.TB/HUBIN/PRAKERIN/{{$bulan}}/{{$tahun}}</h6>
                    <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -15px; margin-left: 0px; text-align:left;">
                    Dasar Surat undangan dari Kementrian Pendidikan dan Kebudayaan, Kepala sekolah Menengah
                    Kejuruan (SMK) Taruna Bhakti Depok memberikan tugas Kepada :</h6>
                    <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -15px; text-align:left; margin-left:80px; ">
                        Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;: {{$nama}}</h6>
                    <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -15px;  text-align:left; margin-left:80px;">
                        NIK  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp; : {{$nik}}</h6>
                    <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -15px; text-align:left; margin-left:80px; ">
                        Jabatan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Tenaga Pendidik</h6>
                    <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -15px;  text-align:left; margin-left:80px;">
                        Unit Kerja &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: SMK Taruna Bhakti, Kota Depok </h6>


                    <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -15px; margin-left: 0px; text-align:left;">
                        Untuk melaksanakan tugas untuk mengikuti kegiatan <b>Magang</b> yang akan dilaksanakan pada&nbsp;&nbsp;&nbsp;:</h6>
                    <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -15px;  text-align:left; margin-left:80px;">
                        Hari &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$hari_from}} s.d. {{$hari_end}}</h6>
                    <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -15px;  text-align:left; margin-left:80px;">
                        Tanggal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$date_from}} s.d. {{$date_end}} {{$date_year}}</h6>
                    <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -15px;  text-align:left; margin-left:80px;">
                        Pukul &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        : {{$pukul}} </h6>
                    <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -15px;  text-align:left; margin-left:80px;">
                        Tempat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$tempat}} </h6>
                    <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -15px;  text-align:left; margin-left:80px;">
                        Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{strip_tags($alamat)    }} </h6>

                </div>
                <div class="container">
                    <div style="width:660px;">
                        <p style="font-size: 14px; margin-top: -40px; text-align:left; " class="font6">
                            Demikian surat tugas ini dibuat untuk dapat dipergunakan dengan sebaik-baiknya dan dilaksanakan dengan penuh tanggung jawab.
                        </p>


                    </div>
                </div>
                <div class="ttd">
                    <h6 class="font6" style="margin-right:123px;">Depok, </h6>
                    <h6 class="font6" style="margin-top: -30px;">Kepala SMK Taruna Bhakti</h6>
                </div>

                <div class="box1" style="margin-top: -70px; text-align:left;">
                    <p style="margin-left: 10px; margin-top:-1px;">Pegawai tersebut telah datang kepada kami untuk kepentingan dinas</p>
                    <p style="margin-left: 10px; margin-top:-10px;">Tiba tanggal:</p>
                    <p style="margin-left: 10px; margin-top:-10px;">Kembali tanggal:</p>
                    <p style="text-align: center; margin-top:-10px; margin-bottom:10px;">Yang menerima</p>
                    <p style="text-align:center; margin-top:60px; ">(....................................................)</p>
                </div>

                


                <div class="kiri-bawah">
                    <p style="font-size: 14px; text-align:left; margin-top:50px;">Tembusan Yth:</p>
                    <ol style="margin-top: -10px">
                        <li>Ketua Yayasan Setya Bhakti</li>
                        <li>Waka. Bidang Kurikulum</li>
                        <li>Pertinggal</li>
                    </ol>
                </div>


                @if (!empty($tandatangan_kepsek))
                
                <div style="text-align: right; margin-top:-60px;">
                    <img src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path("$tandatangan_kepsek")))}}" style="margin-top: 1px; z-index: 2; width: 120px; height: 100px;margin-right:20px;"/> 
        
                    <h6 style="font-size: 14px; margin-top: -10px;margin-right:30px;">Ramadin Tarigan, ST  <br><span style="font-size: 14px; font-weight: light;margin-right:-20px; ">NIK. 19760329200411101 </span></h6>
                    
                </div>
                @else
                <div style="text-align: right; margin-top:20px;">
                    <h6 style="font-size: 14px; margin-top: 50px;margin-right:30px;">Ramadin Tarigan, ST</h6>
                    <h6 style="font-size: 14px; font-weight: light; margin-top: -30px;margin-right:10px;">NIK. 19760329200411101</h6>
                </div>
                @endif



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

                <div>
                    <h6 style="margin-top: -20px;  text-align:center;margin-left: 120px;" class="font5">JALAN PEKAPURAN CURUG CIMANGGIS DEPOK
                        16953 TELP.:(021) 8744810 FAKS.:(021) 87743374 </h6>
                    <h5 style="margin-top: -25px;  text-align:center;margin-left: 110px;" class="font5"><b
                            style="font-size: 15px; font-weight: bold;">Website : </b> <a
                            href="https://smktarunabhakti.net/">https://smktarunabhakti.net/</a> <b
                            style="font-size: 15px; font-weight: bold;"> &nbsp;E-mail :</b> <a
                            href="taruna@smktarunabhakti.net ">taruna@smktarunabhakti.net</a></h5>
                    <hr class="hr-1">
                    <hr class="hr-2">
                    <hr class="hr-3">

                    <h6 class="font6" style="margin-top: 1px; font-size: 14px; text-align: left;">Nomor
                        &nbsp;&nbsp; :&nbsp;
                        {{$nomorSurat}}/421.5-SMK.TB/HUBIN/PRAKERIN/{{$bulan}}/{{$tahun}}</h6>
                    <h6 class="font6" style="margin-top: -32px; font-size: 14px; text-align:left; ">Lembar Ke &nbsp;&nbsp;&nbsp; :&nbsp; <a href=""
                        style=" color:black; font-weight: bolder;">1 (satu)</a></h6>

                        <h4 style="text-align: center; font-size:20px; margin-top:-20px;"> <u>Surat Perintah Perjalanan Dinas</u> </h4>
                        <h4 style="text-align: center; font-size:20px; margin-top:-25px;">(SPPD)</h4>

                        <table border="1" style="margin-top:-20px;">
                            <tr>
                                <td style="margin-left:10px; text-align:center;">1</td>
                                <td>Pejabat yang memberi perintah</td>
                                <td>Kepala SMK Taruna Bhakti,Kota Depok</td>
                              </tr>
                              <tr>
                                <td style="margin-left:10px; text-align:center;" >2</td>
                                <td>Nama/NIK Pegawai yang di perintah</td>
                                <td>{{$nama}}
                                    <br>NIK .{{$nik}}
                                </td>
                              </tr>
                              <tr>
                                <td style="margin-left:10px; text-align:center;">3</td>
                                <td>
                                    <ol type="a">
                                        <li>Jabatan</li>
                                        <li>Unit Kerja</li>
                                    </ol>
                                </td>
                                <td>
                                    <ol type="a">
                                        <li>Tenaga Pendidik/Kaprog.TEI</li>
                                        <li>SMK Taruna Bhakti</li>
                                    </ol>
                                </td>
                              </tr>
                              <tr>
                                <td style="margin-left:10px; text-align:center;">4</td>
                                <td>Maksud Perjalanan Dinas</td>
                                <td>Magang</td>
                              </tr>
                              <tr>
                                <td style="margin-left:10px; text-align:center;">5</td>
                                <td>Alat Angkutan Yang Dipergunakan</td>
                                <td>Darat (Transportasi Umum)</td>
                              </tr>
                              <tr>
                                <td style="margin-left:10px; text-align:center;">6</td>
                                <td>
                                    <ol type="a">
                                        <li>Tempat Berangkat</li>
                                        <li>Tempat Tujuan</li>
                                    </ol>
                                </td>
                                <td>
                                    <ol type="a">
                                        <li>SMK Taruna Bhakti</li>
                                        <li>{{$tempat}}
                                            <br>{{strip_tags($alamat)    }}.
                                        </li>
                                    </ol>
                                </td>
                              </tr>
                              <tr>
                                <td style="margin-left:10px; text-align:center;">7</td>
                                <td>
                                    <ol type="a">
                                        <li>Lama Perjalanan</li>
                                        <li>Tanggal Berangkat</li>
                                        <li>Tanggal Harus Kembali</li>
                                    </ol>
                                </td>
                                <td>
                                    <ol type="a">
                                        <li>{{$jumlah_hari}} hari</li>
                                        <li>{{$date_from}} {{$date_year}}</li>
                                        <li>{{$date_end}} {{$date_year}}</li>
                                    </ol>
                                </td>
                              </tr>
                              <tr>
                                <td style="margin-left:10px; text-align:center;">8</td>
                                <td>Pengikut</td>
                                <td>-</td>
                              </tr>
                              <tr>
                                <td style="margin-left:10px; text-align:center;">9</td>
                                <td>

                                    <ol type="a">
                                        <li>Instansi/Unit kerja</li>
                                        <li>Sub Bagian/Kelompok kerja</li>
                                    </ol>
                                </td>
                                <td>
                                    <ol type="a">
                                        <li>APBS SMK Taruna Bhakti</li>
                                        <li>Program Keahlian Teknik
                                             Elektronika Industri</li>
                                    </ol>
                                </td>
                              </tr>
                              <tr>
                                <td style="margin-left:10px; text-align:center;">10</td>
                                <td>Keterangan</td>
                                <td>Surat perintah ini supaya dilaksanakan dengan rasa penuh tanggung jawab.</td>
                              </tr>
                        </table>
                        <div style="text-align: left; margin-top:-60px; margin-left:490px;">
                            <h6 style="font-size: 14px; margin-top: 80px;">Dikeluarkan di :</h6>
                            <h6 style="font-size: 14px; margin-top: -30px;">Pada tanggal &nbsp;&nbsp;&nbsp;&nbsp;:</h6>
                            <h6 style="font-size: 14px; margin-top: -30px;">Kepala SMK Taruna Bhakti</h6>
                        </div>

                        <div style="text-align: left; margin-top:-50px; margin-left:490px;">
                            <h6 style="font-size: 14px; margin-top: 80px;">Ramadin Tarigan, ST</h6>
                            <h6 style="font-size: 14px; font-weight: light; margin-top: -30px;">NIK. 19760329200411101</h6>
                        </div>



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

                        <div>
                            <h6 style="margin-top: -20px;  text-align:center;margin-left: 120px;" class="font5">JALAN PEKAPURAN CURUG CIMANGGIS DEPOK
                                16953 TELP.:(021) 8744810 FAKS.:(021) 87743374 </h6>
                            <h5 style="margin-top: -25px;  text-align:center;margin-left: 110px;" class="font5"><b
                                    style="font-size: 15px; font-weight: bold;">Website : </b> <a
                                    href="https://smktarunabhakti.net/">https://smktarunabhakti.net/</a> <b
                                    style="font-size: 15px; font-weight: bold;"> &nbsp;E-mail :</b> <a
                                    href="taruna@smktarunabhakti.net ">taruna@smktarunabhakti.net</a></h5>
                            <hr class="hr-1">
                            <hr class="hr-2">
                            <hr class="hr-3">

                            <h6 class="font6" style="margin-top: 1px; font-size: 14px; text-align: left;">Nomor
                                &nbsp;&nbsp; :&nbsp;
                                {{$nomorSurat}}/421.5-SMK.TB/HUBIN/PRAKERIN/{{$bulan}}/{{$tahun}}</h6>
                            <h6 class="font6" style="margin-top: -32px; font-size: 14px; text-align:left; ">Lembar Ke &nbsp;&nbsp;&nbsp; :&nbsp; <a href=""
                                style=" color:black; font-weight: bolder;">1 (satu)</a></h6>

                                <h4 style="text-align: center; font-size:20px; margin-top:-20px;"> <u>Laporan Perjalanan Dinas</u> </h4>

                                <h6 style="font-size: 14px; margin-top: -10px;"><div class="">
                                ............................................................................................................................................................................................................
                                ............................................................................................................................................................................................................
                                ............................................................................................................................................................................................................
                                ............................................................................................................................................................................................................
                                ............................................................................................................................................................................................................
                                ............................................................................................................................................................................................................
                                ............................................................................................................................................................................................................
                                ............................................................................................................................................................................................................
                                ............................................................................................................................................................................................................
                                ............................................................................................................................................................................................................
                                ............................................................................................................................................................................................................
                                ............................................................................................................................................................................................................
                                ............................................................................................................................................................................................................
                                ............................................................................................................................................................................................................
                                ............................................................................................................................................................................................................
                                ............................................................................................................................................................................................................
                                ............................................................................................................................................................................................................
                                ............................................................................................................................................................................................................
                                ............................................................................................................................................................................................................
                                ............................................................................................................................................................................................................
                                ............................................................................................................................................................................................................
                                ............................................................................................................................................................................................................
                                ............................................................................................................................................................................................................
                                ............................................................................................................................................................................................................
                                ............................................................................................................................................................................................................
                                ............................................................................................................................................................................................................
                                ............................................................................................................................................................................................................
                                ............................................................................................................................................................................................................
                                ............................................................................................................................................................................................................
                                ............................................................................................................................................................................................................
                                ............................................................................................................................................................................................................
                                ............................................................................................................................................................................................................
                                ............................................................................................................................................................................................................
                                ............................................................................................................................................................................................................
                            </div></h6>
                        </div>
                        <p style="font-size: 14px; margin-top: 10px; text-align:right; " class="font6">
                           Depok,.....................................................2021
                        </p>
                        <p style="font-size: 14px; margin-top: 90px; text-align:right; " class="font6">
                            ................................................................
                         </p>
                </div>

                <table border="1" style="width: 700px;">
                    <tr>
                        <td>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                        <td>
                            <ol type="I">
                                <li>Berangkat Dari :</li>
                                <h5 style="margin-top: 2px;">Ke :</h5>
                                <h5 style="margin-top: -20px;">Pada Tanggal :</h5>
                            </ol>
                            <p style="text-align: center; margin-top:-20px;">
                                Kepala SMK Taruna Bhakti
                            </p>
                            <h5 style="text-align: center; margin-top:50px;">
                                <B>Ramadin Tarigan,ST</B>
                            </h5>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <p style="margin-left: 40px;">Tiba Di :</p>
                            <p style="margin-left: 40px; margin-bottom:50px;">Pada tanggal :   &nbsp;&nbsp;
                        </td>
                        <td>
                            <p style="margin-left: 40px;">Berangkat Dari :</p>
                            <p style="margin-left: 40px; margin-bottom:50px;">Pada tanggal : &nbsp;&nbsp;&nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p style="margin-left: 40px;">Tiba Di :</p>
                            <p style="margin-left: 40px; margin-bottom:50px;">Pada tanggal :   &nbsp;&nbsp;
                        </td>
                        <td>
                            <p style="margin-left: 40px;">Berangkat Dari :</p>
                            <p style="margin-left: 40px; margin-bottom:50px;">Pada tanggal : &nbsp;&nbsp;&nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p style="margin-left: 40px;">Tiba Di :</p>
                            <p style="margin-left: 40px; margin-bottom:50px;">Pada tanggal :   &nbsp;&nbsp;
                        </td>
                        <td>
                            <p style="margin-left: 40px;">Berangkat Dari :</p>
                            <p style="margin-left: 40px; margin-bottom:50px;">Pada tanggal : &nbsp;&nbsp;&nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p style="margin-left: 40px;">Tiba Di :</p>
                            <p style="margin-left: 40px; margin-bottom:50px;">Pada tanggal :   &nbsp;&nbsp;
                        </td>
                        <td>
                            <p style="margin-left: 40px;">Berangkat Dari :</p>
                            <p style="margin-left: 40px; margin-bottom:50px;">Pada tanggal : &nbsp;&nbsp;&nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p style="margin-left: 40px;">Tiba Di :</p>
                            <p style="margin-left: 40px; margin-bottom:50px;">Pada tanggal :   &nbsp;&nbsp;
                                <p style="margin-top:20px; margin-left:30px;">
                                    Kepala SMK Taruna Bhakti
                                </p>
                                <h5 style="margin-top:50px; margin-left:30px;">
                                    <B>Ramadin Tarigan,ST</B>
                                </h5>
                        </td>
                        <td>
                            <p style="margin-left: 30px;">Telah diperiksa,dengan keterangan bahwa <br>
                            perjalanan tersebut atas perintah dan <br>
                            semata-mata untuk kepentingan jabatan <br>
                            dalam waktu sesingkat-singkatnya</p>

                                <p style="text-align: center; margin-top:10px;">
                                    Kepala SMK Taruna Bhakti
                                </p>
                                <h5 style="text-align: center; margin-top:50px;">
                                    <B>Ramadin Tarigan,ST</B>
                                </h5>
                        </td>
                    </tr>
                    <tr>
                        <td>Catatan Lain lain </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                    </tr>
                </table>





            </div>
        </div>
    </body>

</html>