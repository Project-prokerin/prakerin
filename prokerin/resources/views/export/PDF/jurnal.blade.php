<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .kanan-atas{
            float: right;
            margin-top: -120px;
        }
        .kiri-bawah{
            float: right;
        }
        table{
            border-collapse: collapse;
            width: 550px;
            margin-left: 50px;

        }
        td{
            padding: 13px;
        }
        tr{
            padding: 5px;
        }
        .kri-bwh{
            float: right;
            margin-right:30px;
        }
        .kri-bwhs{
            float: right;
            margin-right: 30px;
        }
        .box1{
        width: 500px;
        height: 400px;
        border: 1px solid black;
        margin-left: 70px;
        }.kri-bwhsk{
            float: right;
            margin-right: 30px;
            margin-bottom: 120px;
        }
        .text-center{
            text-align: center;
        }
        .kotak{
            position: absolute;
            border: 1px solid black;
            height: 20px;
            width: 30px;
        }
    </style>
</head>
<body>
    {{-- Page1 --}}
    <div class="container">
        <h4 class="" style="text-align:center;margin-left:-30px;">A.	SURAT PERNYATAAN PESERTA DIDIK PESERTA PRAKERIN</h4>
        <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: 40px; margin-left: 90px; text-align:left;">
            Yang Bertanda tangan di bawah ini :</h6>
        <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -15px;  text-align:left; margin-left:90px;">
            Nama Peserta didik  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp; : &nbsp; {{$identitas_siswa->nama_siswa}}</h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -15px;  text-align:left; margin-left:90px;">
                NIPD/NISN &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;{{$identitas_siswa->nipd}}
                 </h6>
                <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -15px;  text-align:left; margin-left:90px;">
                    Tempat Tanggal Lahir &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp; : &nbsp; {{$identitas_siswa->tempat_lahir}} &nbsp; {{$identitas_siswa->tanggal_lahir->format('d-m-Y')}} </h6>
                    <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -15px;  text-align:left; margin-left:90px;">
                        Kelas/Tingkat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp; {{$identitas_siswa->kelas->level}} &nbsp; {{$identitas_siswa->kelas->jurusan->singkatan_jurusan}}({{$identitas_siswa->kelas->jurusan->jurusan}})
                     </h6>
                        <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -15px;  text-align:left; margin-left:90px;">
                            Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;: &nbsp; {{$identitas_siswa->alamat}} </h6>
                        <p style="margin-left: 260px">RT...........RW..............No..............Telp..............................</p>
                        <p style="margin-left: 260px">Kelurahan............................................................................</p>
                        <p style="margin-left: 260px">Kecamatan...........................................................................</p>
                        <p style="margin-left: 260px">Kabupaten/Kota...................................................................</p>

                        <p class="" style="margin-left:85px;">Sebagai Peserta Praktek Kerja Industri SMK Taruna Bhakti TP. 2020/2021 menyadari <br> bahwa pendidikan dengan Praktek Kerja
                           Industri (Prakerin) merupakan program <br> dari Departemen Pendidikan Nasional dalam upaya meningkatkan mutu tamatan Sekolah
                           Menengah Kejuruan, untuk mempersiapkan tenaga kerja yang terampil, siap kerja dan mampu <br> mengembangkan sikap profesional berdasarkan Inpres No.9 Tahun 2016 tentang Revitalisasi Sekolah Menengah Kejuruan
                           Dalam Rangka Peningkatan Kualitas Dan Daya Saing Sumber Daya Manusia Indonesi, dengan ini menyatakan bahwa :</p>

                           <ol type="a" style="margin-left: 64px">
                            <li>Memahami tentang arti pentingnya Program Praktek kerja Industri (Prakerin) <br> yang dilaksanakan bersama DU/DI.</li>
                            <li>Berjanji akan memenuhi tata tertib serta disiplin yang ditetapkan oleh DU/DI <br> tempat saya melaksanakan Praktek Kerja Industri (Prakerin).</li>
                            <li>Akan memegang teguh kerahasiaan DU/DI tempat saya Melaksanakan Praktek <br> Kerja Industri (Prakerin), serta menjunjung tinggi nama baik dan kehormatan
                                <br> Sekolah (SMK Taruna Bhakti), Tenaga Pendidik (Guru), DU/DI, Pimpinan <br> perusahaan beserta Stafnya.</li>
                        </ol>
                        <p style="margin-left: 80px;margin-bottom:170px;">
                            Demikian surat pernyataan ini saya buat dan saya tanda tangani dengan sebenar-benarnya tanpa paksaan dan tekanan dari pihak manapun, serta diiringi dengan rasa bangga dan sadar akan segala akibatnya
                        </p>
    </div>

    {{-- Page2 --}}
    <div class="container">
        <p style="text-align: justify;width:650px;margin-bottom:40px;">
            Saya menyadari jika saya melakukan pelanggaran atas surat pernyataan ini, saya bersedia menerima sanksi sesuai dengan peraturan yang berlaku disekolah serta dikeluarkan dari sekolah secara tidak hormat
        </p>
        <p style="margin-bottom: 80px">mengetahui,
            <br>Orang Tua / Wali Murid
        </p>
        <u>...........................................</u>

        <div class="kanan-atas">
            <p>Depok,..............................2021</p><br>
            <p style="margin-top: -20px">Yang membuat pernyataan</p><br><br>
            <p style="margin-top: -10px"><i>materai 6000</i></p>
            <u>................................................</u>
        </div>

        <p style="text-align: center;margin-top:100px;">Menyetujui,</p>
        <p class="font6" style="margin-top: 100px;">Kepala SMK Taruna Bhakti</p>
        <p class="font6" style="margin-top: 100px;margin-bottom:-2000px;"><b><u>Ramadin Tarigan,ST</u></b></p>

        <div class="kiri-bawah" style="margin-right:10px; margin-bottom: 400px;">
            <p style="margin-top: -110px">Wali Kelas</p>
            <u>...........................................</u>
        </div>
    </div>

    {{-- Page3 --}}
    <div class="container">
        <div>
            <h4 class="" style="text-align:;margin-left:90px;">B.    IDENTITAS PESERTA DIDIK PRAKERIN TP. 2020/2021</h4>
            <h6 class="font6" style="font-weight: 300px;font-size: 15px; margin-top: 40px; margin-left: 90px; text-align:left;">
                <b>I.  Profile Peserta Didik </b>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px;  text-align:left; margin-left:110px;">
                Nama Peserta didik<span style="margin-left: 90px;">
                                    : &nbsp; {{$identitas_siswa->nama_siswa}}
                                </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px;  text-align:left; margin-left:110px;">
                NIPD / NISN<span style="margin-left: 123px;">
                            : &nbsp;  {{$identitas_siswa->nipd}}
                        </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px;  text-align:left; margin-left:110px;">
                Tempat Tanggal Lahir<span style="margin-left: 73px;">
                                        :&nbsp; &nbsp;{{$identitas_siswa->tempat_lahir}} &nbsp; {{$identitas_siswa->tanggal_lahir}}
                                    </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px;  text-align:left; margin-left:110px;">
                Kelas / Tingkat<span style="margin-left: 112px;">
                                : &nbsp; {{$identitas_siswa->kelas->level}} &nbsp; {{$identitas_siswa->kelas->jurusan->singkatan_jurusan}}({{$identitas_siswa->kelas->jurusan->jurusan}})
                            </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px;  text-align:left; margin-left:110px;">
                Nama Orang Tua / Wali<span style="margin-left: 63px;">
                                        :&nbsp;
                                    </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px;  text-align:left; margin-left:110px;">
                Alamat<span style="margin-left: 157px;">
                        : &nbsp; {{$identitas_siswa->alamat}}
                    </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px;  text-align:left; margin-left:110px;">
                <span style="margin-left: 206px;">
                    RT. .... RW. .... No. .... Telp. ........................................
                </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px;  text-align:left; margin-left:110px;">
                <span style="margin-left: 206px;">
                    Kelurahan......................................................................
                </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px;  text-align:left; margin-left:110px;">
                <span style="margin-left: 206px;">
                    Kecamatan.....................................................................
                </span>
            </h6>
        </div>

        <div>
            <h6 class="font6" style="font-weight: 300px;font-size: 15px; margin-top: -20px; margin-left: 90px; text-align:left;">
                <b>II.  Profile Sekolah</b>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px;  text-align:left; margin-left:110px;">
                1. Nama Sekolah<span style="margin-left: 103px;">
                                    : SMK Taruna Bhakti Depok
                               </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px;  text-align:left; margin-left:110px;">
                2. Alamat Sekolah<span style="margin-left: 95px;">
                                    : Jl. Pekapuran Kel. Curug Kec. Cimanggis
                                 </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px;  text-align:left; margin-left:110px;">
                3. No. Telp. / Fax.<span style="margin-left: 96px;">
                                        : 021 - 8744810
                                   </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px;  text-align:left; margin-left:110px;">
                4. Paket Keahlian<span style="margin-left: 100px;">
                                : Rekayasa Perangkat Lunak
                            </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px;  text-align:left; margin-left:110px;">
                5. Kepala Program Keahlian<span style="margin-left: 40px;">
                                        : Puguh Rismadi Ismail. S.Kom
                                    </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px;  text-align:left; margin-left:110px;">
                6. Pembimbing Dari Sekolah<span style="margin-left: 37px;">
                                            :.......................................................................................
                                          </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px;  text-align:left; margin-left:125px;">
                No Contact Person<span style="margin-left: 79px;">
                                    : .......................................................................................
                                 </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px;  text-align:left; margin-left:110px;">
                7. Pembimbing Prakerin<span style="margin-left: 63px;">
                                        : &nbsp; {{$dataP_siswa->guru->nama}}
                                      </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px;  text-align:left; margin-left:125px;">
                No Contact Person<span style="margin-left: 79px;">
                                    : &nbsp; {{$dataP_siswa->guru->no_telp}}
                                 </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px;  text-align:left; margin-left:110px;">
                8. Tanggal Mulai Prakerin<span style="margin-left: 52px;">
                                        : {{$dataP_siswa->tgl_mulai->format('d-m-Y')}}

                                         </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px;  text-align:left; margin-left:110px;">
                9. Tanggal Selesai Prakerin<span style="margin-left: 46px;">
                                        : {{$dataP_siswa->tgl_selesai->format('d-m-Y')}}

                                           </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px;  text-align:left; margin-left:110px;">
                10. Jumlah Hari Efektif Prakerin<span style="margin-left: 17px;">
                                                    :.......................................................................................
                                                </span>
            </h6>
        </div>

        <div class="" style="float: right;margin-top: 50px;">
            <p>Depok,..............................2021</p><br>
            <p style="margin-top: -20px">Peserta Didik Prakerin</p><br><br>
            <u>................................................</u>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>

    {{-- Page4 --}}
    <div class="container">
        <div style="">
            <h4 class="" style="margin-left:90px;">
                C.    IDENTITAS INDUSTRI / PERUSAHAAN TEMPAT PELAKSANAAN<br>
                <span style="margin-left: 19px;">PRAKTIK KERJA INDUSTRI (PRAKERIN)</span>
            </h4>
        </div>

        <div>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: 30px;  text-align:left; margin-left:110px;">
                1. Nama Industri / Perusahaan<span style="margin-left: 70px;">
                                                    : &nbsp; {{$dataP_siswa->perusahaan->nama}}
                                             </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px;  text-align:left; margin-left:110px;">
                2. Bidang Usaha<span style="margin-left: 146px;">
                                    : &nbsp; {{$dataP_siswa->perusahaan->jurusan->jurusan}}
                                 </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px;  text-align:left; margin-left:110px;">
                3. Alamat Perusahaan<span style="margin-left: 116px;">
                                        : &nbsp; {{$dataP_siswa->perusahaan->alamat}}
                                   </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px;  text-align:left; margin-left:110px;">
                4. No. Telp. / Fax.<span style="margin-left: 136px;">
                                        : .........................................................................
                                   </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px;  text-align:left; margin-left:110px;">
                5. Alamat Web / Blog Perusahaan<span style="margin-left: 48px;">
                                        : &nbsp; {{$dataP_siswa->perusahaan->link}}
                                    </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px;  text-align:left; margin-left:110px;">
                6. E-mail Perusahaan<span style="margin-left: 119px;">
                                            : &nbsp; {{$dataP_siswa->perusahaan->email}}
                                          </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px;  text-align:left; margin-left:110px;">
                7. Nama Pimpinan / Direktur<span style="margin-left: 76px;">
                                        : &nbsp; {{$dataP_siswa->perusahaan->nama_pemimpin}}
                                      </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px;  text-align:left; margin-left:110px;">
                8. Nama Pembimbing Prakerin<span style="margin-left: 65px;">
                                            : &nbsp; {{$dataP_siswa->guru->nama}}
                                         </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px;  text-align:left; margin-left:110px;">
                9. Contact Person Pembimbing<span style="margin-left: 64px;">
                                                : &nbsp; {{$dataP_siswa->guru->no_telp}}
                                           </span>
            </h6>
        </div>

        <div class="" style="float: right;margin-top: 80px;margin-right: 60px;">
            <p>...................., ..........................2021</p><br>
            <p style="margin-top: -20px">Direktur/Kepala .............................</p><br><br>
            <u>........................................................</u>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>

    {{-- Page5 --}}
    <div class="container">
        <h4 class="" style="text-align:center;margin-left:-30px;">D.	    TATA TERTIB PESERTA DIDIK DALAM PELAKSANAAN PRAKERIN</h4>
        <div>
            <h6 class="font6" style="font-weight: 300px;font-size: 15px; margin-top: -0px;  text-align:left; margin-left:87px;">
                1.	Peserta Didik menyediakan sendiri Seluruh perlengkapan dan biaya selama melaksanakan kegiatan
                <span style="margin-left: 15px;">Praktik Kerja Industri.</span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 15px; margin-top: -29px;  text-align:left; margin-left:87px;">
                2.	Peserta Didik yang akan berangkat Praktik Kerja Industri wajib melaporkan kepada Pokja dan
                <span style="margin-left: 15px;">membawa surat pengantar dari sekolah.</span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 15px; margin-top: -29px;  text-align:left; margin-left:87px;">
                3.	Selama Praktik Kerja Industri Peserta Didik wajib : <br>
                    <span style="margin-left: 15px;">a.	Mentaati segala peraturan dan tata tertib yang ada di industri / perusahaan.</span> <br>
                    <span style="margin-left: 15px;">b.	Melaksanakan kegiatan praktik sesuai waktu yang di setujui pihak industri.</span> <br>
                    <span style="margin-left: 15px;">c.	Mengisi daftar hadir , jurnal Harian dan membuat laporan kegiatan praktik.</span> <br>
                    <span style="margin-left: 15px;">d.	Menjaga nama baik sekolah.</span> <br>

            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 15px; margin-top: -29px;  text-align:left; margin-left:87px;">
                4.	Peserta Didik dilarang pindah tempat kerja industri lain atau menghentikan kegiatan praktik
                <span  style="margin-left: 15px;">sebelum waktunya berakhir tanpa persetujuan dan ijin dari sekolah dan industri.</span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 15px; margin-top: -29px;  text-align:left; margin-left:87px;">
                5.	Peserta Didik wajib menyerahkan jurnal kegiatan, fotocopy sertifikat dengan menunjukan aslinya
                <span  style="margin-left: 15px;">dan daftar nilai ke Pokja Kompetensi Keahlian.</span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 15px; margin-top: -29px;  text-align:left; margin-left:87px;">
                6.	Bagi Peserta Didik yang belum mendapatkan tempat praktik atau menunggu waktu praktik
                <span  style="margin-left: 15px;">dan/atau selesai praktik wajib selalu hadir disekolah.</span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 15px; margin-top: -29px;  text-align:left; margin-left:87px;">
                7.	Peserta Didik yang melaksanakan praktik kurang dari 4 bulan/640 jam wajib melengkapi
                <span  style="margin-left: 15px;">kekurangan waktu prakerin tersebut di hari lain yang tidak mengganggu kegiatan PBM.</span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 15px; margin-top: -29px;  text-align:left; margin-left:87px;">
                8.	Peserta Didik yang melanggar tata tertib : <br>
                    <span style="margin-left: 15px;">a.	Diberi peringatan lisan atau tertulis.</span> <br>
                    <span style="margin-left: 15px;">b.	Dibatalkan kegiatan prakteknya dan wajib mengganti kegiatan praktik di hari yang lain</span> <br>

            </h6>
        </div>

        <h4 class="" style="text-align:center;margin-left:-176px; margin-top: 50px;">E.    UJUAN PRAKTIK KERJA INDUSTRI (PRAKERIN)</h4>
        <div>
            <h6 class="font6" style="font-weight: 300px;font-size: 15px; margin-top: -0px;  text-align:left; margin-left:87px;">
                Pelaksanaan praktik kerja industri (Prakerin) diselenggarakan Sekolah  Menengah Kejuruan <br>
                <span style="margin-left: px;">dengan tujuan :</span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 15px; margin-top: -20px;  text-align:left; margin-left:87px;">
                1.	Memberikan pengalaman kerja langsung (real) untuk menanamkan (internalize) iklim <br>
                <span style="margin-left: 15px;">kerja positif yang berorientasi pada peduli mutu proses dan hasil kerja.</span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 15px; margin-top: -29px;  text-align:left; margin-left:87px;">
                2.	Menanamkan etos kerja yang tinggi bagi peserta didik untuk memasuki dunia kerja <br>
                <span style="margin-left: 15px;">menghadapi tuntutan pasar kerja global.</span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 15px; margin-top: -29px;  text-align:left; margin-left:87px;">
                3.	Memenuhui hal-hal yang belum dipenuhi di sekolah agar mencapai keutuhan standar <br>
                <span  style="margin-left: 15px;">kompetensi lulusan.</span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 15px; margin-top: -29px;  text-align:left; margin-left:87px;">
                4.	Mengaktualisasikan penyelenggaraan Model Pendidikan Sistem Ganda (PSG) antara <br>
                <span  style="margin-left: 15px;">SMK dan Institusi Pasangan (DUDI), memadukan secara sistematis dan sistemik</span> <br>
                <span  style="margin-left: 15px;">program pendidikan di SMK dan program latihan di dunia kerja (DUDI).</span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 15px; margin-top: -20px;  text-align:left; margin-left:87px;">
                Untuk kelancaran pelaksanaan Prakerin dan mengetahui perkembangan Peserta Didik <br>
                <span style="margin-left: px;">selama praktik kerja industri, maka dibuat perangkat : <b><i>“ Jurnal Kegiatan Prakerin “</i></b></span>
            </h6>
        </div>
        <br><br>
    </div>

    {{-- Page6 --}}
    <div class="container">
        <h4 class="" style="text-align:center;margin-left:-234px;">F.	TUJUAN PENGISIAN JURNAL PRAKERIN</h4>
        <div>
            <h6 class="font6" style="font-weight: 300px;font-size: 15px; margin-top: -10px;  text-align:left; margin-left:87px;">
                Dengan dibuatnya jurnal kegiatan Peserta Didik dalam rangka Praktik Kerja Industri <br>
                <span style="margin-left: px;">(PRAKERIN) diharapakan :</span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 15px; margin-top: -20px;  text-align:left; margin-left:87px;">
                1.	Mengetahui perkembangan peserta didik selama mengikuti praktik keahlian di  <br>
                    <span style="margin-left: 15px;">dunia usaha dan dunia industri (DU/DI), yang meliputi :</span> <br>
                    <span style="margin-left: 15px;">a.	Kegiatan harian / mingguan peserta didik</span> <br>
                    <span style="margin-left: 15px;">b.	Kemampuan kerja peserta didik</span> <br>
                    <span style="margin-left: 15px;">c.	Nilai yang diperoleh dari penilaian pihak Perusahaan (DU/DI)</span> <br>
                    <span style="margin-left: 15px;">d.	Catatan- catatan penting dari peserta didik dan pembimbing (DU/DI)</span> <br>
                    <span style="margin-left: 30px;">selama pelaksanaan Prakerin.</span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 15px; margin-top: -29px;  text-align:left; margin-left:87px;">
                2.	Jurnal merupakan sebagai bukti atas kegiatan praktik kerja peserta didik di <br>
                <span style="margin-left: 15px;">dunia usaha dan industri (DU/DI)</span>
            </h6>
        </div>

        <h4 class="" style="text-align:center;margin-left:-300px; margin-top: 60px;">G.	PETUNJUK PENGISIAN JURNAL</h4>
        <div style="margin-bottom: 70px;">
            <h6 class="font6" style="font-weight: 300px;font-size: 15px; margin-top: -0px;  text-align:left; margin-left:87px;">
                Jurnal kegiatan peserta didik di buat atau di isi selama peserta didik melaksanakan <br>
                <span style="margin-left: px;">prakerin di industri tempat praktik. Dalam pengisian jurnal diharapkan memperhatikan</span> <br>
                <span style="margin-left: px;">hal-hal sebagai berikut ini :</span>

            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 15px; margin-top: -20px;  text-align:left; margin-left:87px;">
                1.	Petunjuk untuk peserta didik : <br>
                <span style="margin-left: 15px;">a.	Membaca secara keseluruhan isi jurnal sehingga dapat memahami maksud dan </span> <br>
                <span style="margin-left: 30px;">tujuan serta cara-cara penggunannya.</span> <br>

                <span style="margin-left: 15px;">b.	Mengisi data atau informasi sesuai yang di minta pada setiap bagian jurnal</span> <br>

                <span style="margin-left: 15px;">c.	Melakukan praktik atau kegiatan di perusahaan sesuai dengan paket keahlian </span> <br>
                <span style="margin-left: 30px;">Rekayasa Perangkat Lunak</span> <br>

                <span style="margin-left: 15px;">d.	Memastikan agar pembimbing membaca setiap jurnal dan mengisi hal-hal yang </span> <br>
                <span style="margin-left: 30px;">diperlukan dan memberikan paraf.</span> <br>

            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 15px; margin-top: -29px;  text-align:left; margin-left:87px;">
                2.	Petunjuk untuk Pembimbing Sekolah <br>
                <span style="margin-left: 15px;">a.	Membaca dan memahami jurnal dengan seksama</span> <br>

                <span style="margin-left: 15px;">b.	Membimbing peserta didik dengan langkah-langkah yang ada di dalam jurnal</span> <br>

                <span style="margin-left: 15px;">c.	Menjalin hubungan yang baik dengan pembimbing dari perusahan (DU/DI) </span> <br>
                <span style="margin-left: 30px;">dalam hal pengisian jurnal.</span> <br>

                <span style="margin-left: 15px;">d.	Melakukan monitoring kemajuan peserta didik di tempat industri / perusahaan </span> <br>
                <span style="margin-left: 30px;">dengan cara memeriksa jurnal dan mendiskusikan dengan pembimbing dari</span> <br>
                <span style="margin-left: 30px;">industri / perusahaan (DU/DI).</span> <br>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 15px; margin-top: -29px;  text-align:left; margin-left:87px;">
                3.	Petunjuk Pembimbing Industri / Perusahaan (DU/DI) <br>

                <span style="margin-left: 15px;">a.	Bekerjasama dengan pihak sekolah dalam menentukan jenis keahlian yang </span> <br>
                <span style="margin-left: 30px;">dikerjakan oleh peserta didik di dunia kerja indstri / Perusahaan.</span> <br>

                <span style="margin-left: 15px;">b.	Memberikan dukungan dalam melaksanakan prakerin dengan menyediakan </span> <br>
                <span style="margin-left: 30px;">fasilitas sesuai dengan paket keahlian yang telah di sepakati bersama oleh pihak sekolah.</span> <br>

                <span style="margin-left: 15px;">c.	Memberikan bimbingan dan pelatihan kepada peserta didik yang sedang </span> <br>
                <span style="margin-left: 30px;">melaksanakan PRAKERIN.</span> <br>

                <span style="margin-left: 15px;">d.	Memberikan penilaian atas hasil kerja peserta didik yang sedang melaksanakan </span> <br>
                <span style="margin-left: 30px;">PRAKERIN sesuai dengan format-format yang ada pada jurnal.</span> <br>
            </h6>
        </div>
    </div>

    {{-- Page7 --}}
    <div class="container">
        <h4 class="" style="text-align:center;margin-left:-330px;">H.	PEMBEKALAN PRAKTIK</h4>
        <div>
            <h6 class="font6" style="font-weight: 300px;font-size: 15px; margin-top: -10px;  text-align:left; margin-left:87px;">
                <span style="margin-left: 17px">Materi pembekalan PKL bagi peserta didik meliputi :</span>
            </h6>
            <p style="margin-top: -30px">
                <ol type="1" style="margin-left: 90px">
                    <li>Karakteristik budaya kerja di industri</li>
                    <li>tata aturan kerja di industri</li>
                    <li>Penyusunan Jurnal</li>
                    <li>Pembuatan dokumen Portofolio</li>
                    <li>penilaian PKL</li>
                </ol>
            </p>
        </div>
        <h4 class="" style="text-align:center;margin-left:-10px;">I.	PROSES PENGAJUAN SURAT PERMOHONAN TEMPAT PRAKERIN</h4>
        <div>
            <span style="margin-left: 105px;">a. Peserta didik yang akan melaksanakan PRAKERIN melakukan pembinaan oleh Tim  </span> <br>
            <span style="margin-left: 120px;">BKK dalam hal pengisian jurnal.</span> <br>

            <span style="margin-left: 105px;">b.	Peserta didik yang akan melaksanakan PRAKERIN menyelesaikan persyaratan    </span> <br>
            <span style="margin-left: 120px;">PRAKERIN sesuai dengan jurusan masing-masing (Peserta didik menbuat 5 aplikasi </span> <br>
            <span style="margin-left: 120px;">(berbasis android dan web) dalam bentuk portofolio).</span> <br>

            <span style="margin-left: 105px;">c.	Kepala Program memvalidasi persyaratan PRAKERIN sesuai dengan kemampuan Peserta   </span> <br>
            <span style="margin-left: 120px;">Didik dan mengelompokkannya. </span> <br>

            <span style="margin-left: 105px;">d.	Kepala Program mengadakan survei/mencari informasi mengenai tempat PRAKERIN    </span> <br>
            <span style="margin-left: 120px;">langsung ke industri yang bersangkutan. </span> <br>

            <span style="margin-left: 105px;">e.	Kepala Program membentuk kelompok/group sesuai dengan kapasitas yang ada di </span> <br>
            <span style="margin-left: 120px;">industri. </span> <br>

            <span style="margin-left: 105px;">f.	Kepala Program melalui Penanggung Jawab jurusan mengajukan permohonan kepada  </span> <br>
            <span style="margin-left: 120px;">pokja Hubin. </span> <br>

            <span style="margin-left: 105px;">g.	Peserta didik atau pokja Hubin mengirimkan surat permohonan ke industri melalui surel  </span> <br>
            <span style="margin-left: 120px;"> atau dikirim langsung (jika lewat surel dapat langsung melalui sekolah).</span> <br>

            <span style="margin-left: 105px;">h.	Peserta didik sebelum melaksanakan PRAKERIN wajib mengisi surat pernyatan yang   </span> <br>
            <span style="margin-left: 120px;">ditanda tangan diatas materai.</span> <br>

            <span style="margin-left: 105px;">i.	Peserta didik melaksanakan PRAKERIN sesuai periode yang ditentukan oleh industri.  </span> <br>

            <span style="margin-left: 105px;">j.	Setelah selesai PRAKERIN peserta didik wajib menyelesaikan Laporan Prakerin.  </span> <br>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>

    {{-- Page8 --}}
    <div class="container">
        <h4 class="" style="text-align:center;margin-left:70px;">J.	STRUKTUR KOMPETENSI PROGRAM KEAHLIAN REKAYASA PERANGKAT
        <h4 class="" style="text-align:center;margin-left:-240px;margin-top:-10px;">LUNAK BERDASARKAN KURIKULUM 2013</h4>
        <div>
            <table border="1">
                <tr>
                    <td style="background-color: purple">C2. Dasar Program Keahlian</td>
                </tr>
                <tr>
                    <td>1. Komputer dan Jaringan Dasar</td>
                </tr>
                <tr>
                    <td>2. Pemrograman Dasar</td>
                </tr>
                <tr>
                    <td>3. Dasar Desain Grafis</td>
                </tr>
                <tr>
                    <td  style="background-color: purple">C3. Paket Keahlian Rekayasa Perangkat Lunak</td>
                </tr>
                <tr>
                    <td>1. Pemodelan Perangkat Lunak</td>
                </tr>
                <tr>
                    <td>2. Basis Data</td>
                </tr>
                <tr>
                    <td>3. Pemograman Berorientasi Objek</td>
                </tr>
                <tr>
                    <td>4. Pemograman Web dan perangkat Bergerak</td>
                </tr>
                <tr>
                    <td>5. Produk Kreatif dan Kewirausahaan</td>
                </tr>
            </table>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>

    {{-- Page9 --}}
    <div class="container">
        <h4 class="" style="text-align:center;margin-left:10px;">K.	PEMETAAN PROFILE KOMPETENSI TAMATAN</h4>
        <br><br><br>
        <div style="text-align: center;">
            <img src="https://i.postimg.cc/tgc6d1Mz/qwqwq.jpg" alt="">
        </div>
    </div>

    {{-- Page10 --}}
    <div class="container">
        <h4 class="" style="text-align:center;margin-left:-380px;margin-bottom:480px;">L.	PROGRAM PRAKERIN</h4>
        <div>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -450px;  text-align:left; margin-left:80px;">
            Nama Peserta Didik<span style="margin-left: 70px;">
                                                    : .........................................................................
                                            </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -30px;  text-align:left; margin-left:80px;">
                Kelas<span style="margin-left: 150px;">
                                                    : .........................................................................
                                                </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -30px;  text-align:left; margin-left:80px;">
                Kompetensi Keahlian<span style="margin-left: 60px;">
                                                    : <u>Rekayasa Perangkat Lunak</u>
                                                </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -30px;  text-align:left; margin-left:80px;">
            Nama Industri<span style="margin-left: 100px;">
                                                    : .........................................................................
                                            </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -30px;  text-align:left; margin-left:80px;">
                Nama Pembimbing<span style="margin-left: 73px;">
                                                        : .........................................................................
                                                </span>
                </h6>
                <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -30px;  text-align:left; margin-left:80px;">
                    Alamat Industri<span style="margin-left: 93px;">
                                                            : .........................................................................
                                                    </span>
                    </h6>
                    <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -30px;  text-align:left; margin-left:80px;">
                        Waktu PKL<span style="margin-left: 115px;">
                                                                : .........................................................................
                                                        </span>
                        </h6>
        </div>
        <div>
            <table border="1" style="margin-top: -300px;margin-left:60px;">
                <tr>
                    <th style="background-color: skyblue;width:50px;">No</th>
                    <th style="background-color: skyblue;width:150px;">Kompentensi Dasar</th>
                    <th style="background-color: skyblue;width:150px;">Topic Pembelajaran</th>
                    <th style="background-color: skyblue;width:150px;"> Urutan Waktu Pelaksanaan</th>
                    <th style="background-color: skyblue;width:100px;">Paraf</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>
        <div class="kri-bwh">
            <p>......................,..............20.......</p>
            <p style="margin-bottom: 50px">Pembimbing industri</p>
            <p>..............................................</p>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>

    {{-- Page11 --}}
    <div class="container">
        <h4 class="" style="text-align:center;margin-left:-260px;">M.	JURNAL KEGIATAN PRAKERIN</h4>
        <h4 class="" style="text-align:center;margin-left:-10px;">A. JAM KERJA PRAKERIN</h4>
        <div>
            <table border="1" style="text-align: center;">
            <tr>
                <th style="background-color: skyblue;width:150px;">Hari</th>
                <th style="background-color: skyblue;width:150px;">Jam Masuk</th>
                <th style="background-color: skyblue;width:150px;">Jam Istirahat</th>
                <th style="background-color: skyblue;width:150px;">Jam pulang</th>
            </tr>

           @foreach ($jurnalP_siswa as $junalP)

            @if ($junalP->hari_pelaksanaan->isoFormat('dddd') === 'Senin')
            <tr>
                <td>Senin</th>
                <td>{{date('h: i A', strtotime($junalP->jam_masuk))}}</th>
                <td>{{date('h: i A', strtotime($junalP->jam_istirahat))}}</th>
                <td>{{date('h: i A', strtotime($junalP->jam_pulang))}}</th>
            </tr>
            @elseif($junalP->hari_pelaksanaan->isoFormat('dddd') === 'Selasa')
            <tr>
                <td>Selasa</th>
                <td>{{date('h: i A', strtotime($junalP->jam_masuk))}}</th>
                <td>{{date('h: i A', strtotime($junalP->jam_istirahat))}}</th>
                <td>{{date('h: i A', strtotime($junalP->jam_pulang))}}</th>
            </tr>
            @elseif($junalP->hari_pelaksanaan->isoFormat('dddd') === 'Rabu')
            <tr>
                <td>Rabu</th>
                <td>{{date('h: i A', strtotime($junalP->jam_masuk))}}</th>
                <td>{{date('h: i A', strtotime($junalP->jam_istirahat))}}</th>
                <td>{{date('h: i A', strtotime($junalP->jam_pulang))}}</th>
            </tr>
            @elseif($junalP->hari_pelaksanaan->isoFormat('dddd') === 'Kamis')
            <tr>
                <td>Kamis</th>
                <td>{{date('h: i A', strtotime($junalP->jam_masuk))}}</th>
                <td>{{date('h: i A', strtotime($junalP->jam_istirahat))}}</th>
                <td>{{date('h: i A', strtotime($junalP->jam_pulang))}}</th>
            </tr>
            @elseif($junalP->hari_pelaksanaan->isoFormat('dddd') === 'Jumat')
            <tr>
                <td>Jumat</th>
                <td>{{date('h: i A', strtotime($junalP->jam_masuk))}}</th>
                <td>{{date('h: i A', strtotime($junalP->jam_istirahat))}}</th>
                <td>{{date('h: i A', strtotime($junalP->jam_pulang))}}</th>
            </tr>
            @endif
            @endforeach

        </table>
        </div>
        <div class="kri-bwhs" style="margin-top: 50px;">
            <p>......................,..............20.......</p>
            <p style="margin-bottom:50px;">Pembimbing industri</p>
            <p>..............................................</p>
        </div>
        <br><br><br><br><br><><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>

    {{-- Page12 --}}
    <div class="container">
        <h4 class="" style="text-align:center;margin-left:-130px;">N.	KEGIATAN MENGIDENTIFIKASI / INVENTARISASI ALAT</h4>
        <div>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -15px;  text-align:left; margin-left:90px;">
                Kegiatan 2 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp; :Mengidentifikasi peralatan di perusahaan </h6>
                <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -30px;  text-align:left; margin-left:90px;">
                    Tugas &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :Mengisi form.01  dibawah ini </h6>
                    <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -15px;  text-align:left; margin-left:90px;">
                        petunjuk &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp; :
                        <ol type="1" style="margin-left: 100px;">
                            <li>Siapkan form.01 seperti dibawah ini</li>
                            <li>Lakukan pengamatan dan catatlah peralatan – peralatan /mesin-mesin yang ada diperusahaan</li>
                            <li>Mintalah petunjuk dan konsultasikan tugas ini kepada
                                pembimbing perusahaan/industri
                            </li>
                        </ol>
                    </h6>
            <p>Form. 01 - Daftar Spesifikasi Peralatan di Perusahaan / Industri</p>
        </div>
        <div>
            <table border="1" style="margin-left: 10px;width:700px;margin-top: 30px;">
                <tr>
                    <th style="background-color: skyblue;width:150px;padding:4;">No</th>
                    <th style="background-color: skyblue;width:150px;padding:10;">Nama Alat/Komputer</th>
                    <th style="background-color: skyblue;width:150px;padding:10;">Spesifikasi/ukuran</th>
                    <th style="background-color: skyblue;width:150px;padding:5;">Jumlah</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>

    {{-- Page13 --}}
    <div class="container">
        <h4 class="" style="text-align:center;margin-left:-130px;">O.	KEGIATAN PRAKTIK DI PERUSAHAAN ATAU INDUSTRI </h4>
        <div>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -15px;  text-align:left; margin-left:90px;">
                Kegiatan 3 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp; :Melaksanakan kegiatan rutin pekerjaan di  perusahaan/ industri
                sesuai jobsheet atau <span style="margin-left: 130px"> kompetensi keahlian</span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 15px; margin-top: -29px;  text-align:left; margin-left:87px;">
                Petunjuk<br>
                <span style="margin-left: 15px;">1. Mintalah Bimbingan pada pembimbing industri untuk  mengerjakan setiap
                    pekerjaan
            </span> <br>

                <span style="margin-left: 15px;">  2. Buatlah catatan setiap kali praktik</span> <br>

                <span style="margin-left: 15px;">  3. Bacalah buku – buku yang berkaitan dengan praktik kerja  </span> <br>
                <span style="margin-left: 30px;">dalam hal pengisian jurnal.</span> <br>
            </span> <br>
            </h6>
        </div>
        <div>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: 30px;  text-align:left; margin-left:110px;">
                1. Jenis Pekerjaan<span style="margin-left: 70px;">
                                                    : .........................................................................
                                             </span>
                                             <span style="margin-left: 170px;">
                                                : .........................................................................
                                         </span>
                                         <span style="margin-left: 170px;">
                                            : .........................................................................
                                     </span>

            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: 30px;  text-align:left; margin-left:110px;">
                2. Jenis Keterampian<span style="margin-left: 50px;">
                                                    : .........................................................................
                                             </span>
                                             <span style="margin-left: 170px;">
                                                : .........................................................................
                                         </span>
                                         <span style="margin-left: 170px;">
                                            : .........................................................................
                                     </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: 30px;  text-align:left; margin-left:110px;">
                3. Alat dan bahan<span style="margin-left: 70px;">
                                                    : .........................................................................
                                             </span>
                                             <span style="margin-left: 170px;">
                                                : .........................................................................
                                         </span>
                                         <span style="margin-left: 170px;">
                                            : .........................................................................
                                     </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: 30px;  text-align:left; margin-left:110px;">
                4. Keselamatan Kerja<span style="margin-left: 50px;">
                                                    : .........................................................................
                                             </span>
                                             <span style="margin-left: 170px;">
                                                : .........................................................................
                                         </span>
                                         <span style="margin-left: 170px;">
                                            : .........................................................................
                                     </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: 30px;  text-align:left; margin-left:110px;">
                5. Langkah Kerja<span style="margin-left: 70px;">
                                                    : .........................................................................
                                             </span>
                                             <span style="margin-left: 170px;">
                                                : .........................................................................
                                         </span>
                                         <span style="margin-left: 170px;">
                                            : .........................................................................
                                     </span>
            </h6>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>

    {{-- Page14 --}}
    <div class="container">
        <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-bottom: 100px;  text-align:left; margin-left:110px;">
            6. Gambar Kerja  </h6>
        <div class="box1" style="margin-left: 100px;">
        </div>
        <div class="kri-bwhsk" style="margin-top: 50px;">
            <p>......................,..............,.......</p>
            <p style="margin-bottom:50px;">Pembimbing industri</p>
            <p>..............................................</p>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>

    {{-- Page15-21 --}}
    @for ($j = 1; $j <= 3; $j++)
    <div class="container">
       @php
           $no = ['','P','Q','R'];
       @endphp
        <h4 style="text-align:center;margin-left:-10px;">{{ $no[$j] }}.	JURNAL HARIAN KEGIATAN PRAKERIN</h4>
        <div>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: 5px; margin-left:90px;">
                Nama Peserta didik  <span style="margin-left: 90px;">
                                        : &nbsp;{{$identitas_siswa->nama_siswa}}
                                    </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px; margin-left:90px;">
                Kompetensi Keahlian <span style="margin-left: 78px;">
                                        : <u>{{$dataP_siswa->kelas->jurusan->jurusan}}</u>
                                    </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px; margin-left:90px;">
                Nama Industri   <span style="margin-left: 119px;">
                                    : &nbsp;{{$dataP_siswa->perusahaan->nama}}
                                </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px; margin-left:90px;">
                Nama Pembimbing <span style="margin-left: 91px;">
                                    : {{$dataP_siswa->guru->nama}}
                                </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px; margin-left:90px;">
                Alamat Industri     <span style="margin-left: 111px;">
                                        : {{$dataP_siswa->perusahaan->alamat}}
                                    </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px; margin-left:90px;">
                Waktu PKL<span style="margin-left: 135px;">
                        : .......................................................................................
                    </span>
            </h6>
        </div>
        <div>
            <table border="1" style="margin-top: 40px;margin-left:-px;">
                <tr>
                    <th style="background-color: skyblue;width: 40px">No</th>
                    <th style="background-color: skyblue;width: 150px;">Kompentensi Dasar</th>
                    <th style="background-color: skyblue;width: 250px;">Topic Pembelajaran / Pekerjaan</th>
                    <th style="background-color: skyblue;width: 130px;">Tanggal Pelaksanaan</th>
                    <th style="background-color: skyblue;width: 120px;">Paraf</th>
                </tr>
                    @php

                    @endphp
                @if ($j > 1 )
                    @php $l = ($j - 1) * 30 + 1   @endphp

                @else
                    @php $l = 1  @endphp
                @endif
                @for ($i = $l; $i <= 30 * $j ; $i++)
                    @if ($i <= (30 * $j) and $i % (30 * $j) !== 0)
                    @if (count($jurnalP_siswa ) - 1 >= $i)
                         <tr>
                        <td>{{ ($j > 1) ? $i - (30 * ($j - 1)) : $i  }}</td>
                        <td>{{ $jurnalP_siswa[$i]['kompetisi_dasar'] }}</td>
                        <td>{{ $jurnalP_siswa[$i]['topik_pekerjaan'] }}</td>
                        <td>{{ $jurnalP_siswa[$i]['hari_pelaksanaan']->isoFormat('D MMMM Y') }}</td>
                        <td></td>
                    </tr>
                    @else
                    <tr>
                        <td>{{ ($j > 1) ? $i - (30 * ($j - 1)) : $i  }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    @endif
                    @else
                    <tr>
                        <td>{{($j > 1) ? $i - (30 * ($j - 1)) : $i  }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    @endif
                @endfor

            </table>
        </div>
        <br><br><br><br><br><br><br><br><br>
    </div>
    @endfor
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

    {{-- Page22-27 --}}
    @for ($v = 1; $v < $jumlah_bulan; $v++)
    <div class="container">

        <h4 style="text-align:center;margin-left:-53px;">S.	DAFTAR HADIR SISWA JURNAL HARIAN KEGIATAN PRAKERIN</h4>
        <div>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: 5px; margin-left:90px;">
                Nama Perusahaan <span style="margin-left: 99px;">
                                    : {{$dataP_siswa->perusahaan->nama}}
                                </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px; margin-left:90px;">
                Nama Peserta didik  <span style="margin-left: 90px;">
                                        : {{$identitas_siswa->nama}}
                                    </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px; margin-left:90px;">
                Paket Keahlian  <span style="margin-left: 114px;">
                                    : <u>{{$dataP_siswa->kelas->jurusan->jurusan}}</u>
                                </span>
            </h6>
        </div>

        <div>
            <table border="1" style="margin-top: 10px;margin-left:25px;">
                <tr>
                    <th style="background-color: skyblue;width: 40px" rowspan="2">No</th>
                    <th style="background-color: skyblue;width: 210px;" rowspan="2">Hari / Tanggal</th>
                    <th style="background-color: skyblue;" colspan="2">Waktu</th>
                    <th style="background-color: skyblue;width: 180px;" rowspan="2">Paraf Pembimbing</th>
                </tr>
                <tr>
                    <th style="background-color: skyblue;width: 100px">Datang</th>
                    <th style="background-color: skyblue;width: 100px;">Pulang</th>
                </tr>
                @php

            @endphp
        @if ($v > 1 )
            @php $l = ($v - 1) * 30 + 1  @endphp
        @else
            @php $l = 1  @endphp
        @endif
        @for ($i = $l; $i <= 30 * $v ; $i++)
            @if ($i <= (30 * $v) and $i % (30 * $v) !== 0)
            @if (count($jurnalH_siswa ) - 1 >= $i)
                <tr>
                <td>{{ ($v > 1) ? $i - (30 * ($v - 1)) : $i  }}</td>
                <td>{{ $jurnalH_siswa[$i]['tanggal']->isoFormat('D MMMM Y') }}</td>
                <td>{{ $jurnalH_siswa[$i]['datang']->format('h:i') }}</td>
                <td>{{ $jurnalH_siswa[$i]['pulang']->format('h:i') }}</td>
                <td></td>
            </tr>
            @else
            <tr>
                <td>{{ ($v > 1) ? $i - (30 * ($v - 1)) : $i  }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            @endif
            @else
            <tr>
                <td>{{($v > 1) ? $i - (30 * ($v - 1)) : $i  }}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            @endif
        @endfor
            </table>
        </div>

        <div class="container">
            <div class="" style="float: right;margin-top: 50px;margin-right: 40px;">
                <p>................., .....................................</p><br>
                <p style="margin-top: -20px">Pembimbing Industri/Perusahaan</p><br><br>
                <u>........................................................</u>
            </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>
    @endfor

    {{-- Page28 --}}
    <div class="container">
        <h4 style="text-align:center;margin-left:-53px;">V.	KRITERIA PENILAIAN ASPEK TEKNIS DAN ASPEK NON TEKNIS</h4>
        <div>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: 5px; margin-left:90px;">
                Nama Peserta didik  <span style="margin-left: 90px;">
                                        : .......................................................................................
                                    </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px; margin-left:90px;">
                N I P D <span style="margin-left: 156px;">
                                    : .......................................................................................
                                </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px; margin-left:90px;">
                Kompetensi Keahlian  <span style="margin-left: 78px;">
                                    : <u>Rekayasa Perangkat Lunak</u>
                                </span>
            </h6>
        </div>

        <div>
            <h4 style="text-align:center;margin-left:-432px;">A.	ASPEK TEKNIS</h4>
            <table border="1" style="margin-top: -10px;margin-left:86px;">
                <tr>
                    <th style="width: 40px" rowspan="2">NO</th>
                    <th style="width: 210px;" rowspan="2">UNSUR PENILAIAN</th>
                    <th style="" colspan="3">NILAI</th>
                </tr>
                <tr>
                    <th style="width: 100px">ANGKA</th>
                    <th style="width: 100px">HURUF</th>
                    <th style="width: 100px;">KUALIFIKASI</th>
                </tr>
                <tr>
                    <td class="text-center">1</td>
                    <td>Disiplin</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-center">2</td>
                    <td>Jujur</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-center">3</td>
                    <td>Tanggung Jawab</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                 <tr>
                    <td class="text-center">4</td>
                    <td>Keselamatan Kerja</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>

        <div>
            <h4 style="text-align:center;margin-left:-393px;margin-top: 30px">B.	ASPEK NON TEKNIS</h4>
            <table border="1" style="margin-top: -10px;margin-left:86px;">
                <tr>
                    <th style="width: 40px" rowspan="2">NO</th>
                    <th style="width: 210px;" rowspan="2">UNSUR PENILAIAN</th>
                    <th style="" colspan="3">NILAI</th>
                </tr>
                <tr>
                    <th style="width: 100px">ANGKA</th>
                    <th style="width: 100px">HURUF</th>
                    <th style="width: 100px;">KUALIFIKASI</th>
                </tr>
                <tr>
                    <td class="text-center">1</td>
                    <td>Algoritma Pemrograman</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-center">2</td>
                    <td>Basisdata</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-center">3</td>
                    <td>Pemrograman Web/Mobile</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>

        <div>
            <h4 style="text-align:center;margin-left:-435px;margin-top: 20px;">C.	KETERANGAN</h4>
            <h6 style="font-weight: 300px;font-size: 14px;margin-left: 90px;margin-top: -15px;">
                A<span style="margin-left: 20px;margin-right: 20px">=</span><span>94 s.d 100</span><br>
                B<span style="margin-left: 20px;margin-right: 20px">=</span><span>84 s.d 93</span><br>
                C<span style="margin-left: 20px;margin-right: 20px">=</span><span>75 s.d 83</span><br>
                D<span style="margin-left: 20px;margin-right: 20px">=</span><span>Kurang dari 75</span>

            </h6>
        </div>

        <div class="container">
            <div class="" style="float: right;margin-top: 0px;margin-right: 40px;">
                <p>................., .....................................</p><br>
                <p style="margin-top: -20px">Pembimbing Industri/Perusahaan</p><br><br>
                <u>........................................................</u>
            </div>
        </div>
        <br><br><br><br><br><br><br><br><br>
    </div>

    {{-- Page29 --}}
    <div class="container">
        <h4 style="text-align:center;margin-left:-370px;">W.	SURAT PERSETUJUAN</h4>
        <div>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: 5px; margin-left:90px;">
                Yang bertanda tangan di bawah ini :
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px; margin-left:90px;">
                Nama    <span style="margin-left: 90px;">
                            : ..................................................................................................
                        </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px; margin-left:90px;">
                Jabatan <span style="margin-left: 81px;">
                            : ..................................................................................................
                        </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px; margin-left:90px;">
                Nama Industri   <span style="margin-left: 43px;">
                                    : ..................................................................................................
                                </span>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px; margin-left:90px;">
                Alamat  <span style="margin-left: 82px;">
                            : ..................................................................................................
                        </span><br>
            </h6>
            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px; margin-left:90px;">
                        <span style="margin-left: 130px;">
                            : Telp / Fax. ................................................................................
                        </span>
            </h6>
        </div>

        <div>
            <div>
                <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px; margin-left:90px;">
                    Menyatakan bahwa Perusahaan kami tidak keberatan untuk menerima Pelaksanaan Praktek <br>
                    <span>Industri SMK Taruna Bhakti Depok dengan ketentuan sebagai berikut:</span>
                </h6>
                <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px; margin-left:90px;">
                    1. Jumlah peserta didik
                    <span style="margin-left: 70px;">
                        : ............................................................
                    </span><br>
                </h6>
                <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px; margin-left:90px;">
                    2. Paket Keahlian
                    <span style="margin-left: 100px">
                        : Rekayasa Perangkat Lunak
                    </span><br>
                </h6>
                <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px; margin-left:90px;">
                    3. Waktu pelaksanaan
                    <span style="margin-left: 76px">
                        : ........................... s/d ...........................
                    </span>
                </h6>
            </div>

            <div>
                <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px; margin-left:90px;">
                    Fasilitas selama pelaksanaan praktek industri antara lain:
                </h6>
                <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -25px; margin-left:90px;">
                    1.	Makan siang
                    <span style="margin-left: 80px;margin-right: 20px;">:</span>
                    <span class="kotak"></span>
                    <span style="margin-left: 40px;margin-right: 35px">Ya/</span>
                    <span class="kotak"></span>
                    <span style="margin-left: 40px;">Tidak</span>
                </h6>
                <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -15px; margin-left:90px;">
                    2.	Mess
                    <span style="margin-left: 122px;margin-right: 20px;">:</span>
                    <span class="kotak"></span>
                    <span style="margin-left: 40px;margin-right: 35px">Ya/</span>
                    <span class="kotak"></span>
                    <span style="margin-left: 40px;">Tidak</span>
                </h6>
                <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -15px; margin-left:90px;">
                    3.	Bus antar/ jemput
                    <span style="margin-left: 52px;margin-right: 20px;">:</span>
                    <span class="kotak"></span>
                    <span style="margin-left: 40px;margin-right: 35px">Ya/</span>
                    <span class="kotak"></span>
                    <span style="margin-left: 40px;">Tidak</span>
                </h6>
                <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -15px; margin-left:90px;">
                    4.	Intensif
                    <span style="margin-left: 108px;margin-right: 20px;">:</span>
                    <span class="kotak"></span>
                    <span style="margin-left: 40px;margin-right: 35px">Ya/</span>
                    <span class="kotak"></span>
                    <span style="margin-left: 40px;">Tidak</span>

            </div>

            <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -px; margin-left:90px;">
                Demikian surat persetujuan ini untuk dapat dipergunakan seperlunya.
            </h6>
        </div>

        <div class="container">
            <div class="" style="float: right;margin-top: 0px;margin-right: 40px;">
                <p>................., .....................................</p><br>
                <p style="margin-top: -20px"></p><br>
                <u>........................................................</u>
            </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>

    {{-- Page30 --}}
    <div class="container">
        <h4 style="text-align:center;margin-left:-250px;">X.	SARAN-SARAN DARI PIHAK INDUSTRI</h4>
        <div>
            <div>
                <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: 5px; margin-left:67px;">
                    1. Untuk pihak sekolah
                </h6>
                <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -15px; margin-left:67px;">
                    ___________________________________________________________________________________
                </h6>
                <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -18px; margin-left:67px;">
                    ___________________________________________________________________________________
                </h6>
                <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -18px; margin-left:67px;">
                    ___________________________________________________________________________________
                </h6>
                <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -18px; margin-left:67px;">
                    ___________________________________________________________________________________
                </h6>
                <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -18px; margin-left:67px;">
                    ___________________________________________________________________________________
                </h6>
                <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -18px; margin-left:67px;">
                    ___________________________________________________________________________________
                </h6>
            </div>

            <div>
                <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: 40px; margin-left:67px;">
                    2. Untuk peserta didik
                </h6>
                <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -15px; margin-left:67px;">
                    ___________________________________________________________________________________
                </h6>
                <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -18px; margin-left:67px;">
                    ___________________________________________________________________________________
                </h6>
                <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -18px; margin-left:67px;">
                    ___________________________________________________________________________________
                </h6>
                <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -18px; margin-left:67px;">
                    ___________________________________________________________________________________
                </h6>
                <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -18px; margin-left:67px;">
                    ___________________________________________________________________________________
                </h6>
                <h6 class="font6" style="font-weight: 300px;font-size: 14px; margin-top: -18px; margin-left:67px;">
                    ___________________________________________________________________________________
                </h6>
            </div>
        </div>
    </div>

</body>
</html>
