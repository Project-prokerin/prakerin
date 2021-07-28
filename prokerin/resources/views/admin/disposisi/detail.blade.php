detail disposisi.blade

@extends('template.master')

@push('link')

<style>

    .mtop{

        margin-top: -10px;

    }

    .pleft{

        padding-left: 15px;

    }

    .garis{

        height: 10px;

        width: auto;

        background-color: rgb(82, 82, 255);

    }

    .title{

        padding-top: 10px;

    }

    h5{

        color: rgb(82, 82, 255);

    }

    .title i{

        font-size: 20px;

        margin-left: 5px;

        margin-right: 5px;

    }

    /* content {
  width: 100%;
  line-height: 1.4;
  background-color: #5252ff;
  color: #fff;
  text-align: center;
  border-radius:5px;
}

@media screen and (min-width: 32em) {
  .content {
    width: 100%;
  }
}

textarea {
  width: 100%;
  height: 30vh;
  padding: 1em;
  font-size: 15px;
  text-align: left;
  border: 1px solid #000;
  resize: none;
  border-radius:5px;
}

.boxSizing-borderBox {
  box-sizing: border-box;
} */

.contact-form{
    background: #fff;
    margin-top: 40px;
    margin-bottom: 5%;
    width: 70%;
    margin-left:17px;

}
.contact-form .form-control{
    border-radius:1rem;
}




.contact-image{
    text-align: center;
}
.contact-image img{
    border-radius:30px;
    width: 11%;
    margin-top: -40px;
    /* transform: rotate(29deg); */
    margin-bottom:50px;
    box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
    background: white;
}
.contact-form form{
    padding: 50px;
}

.contact-form h3{
    margin-bottom: 10px;
    margin-top: -10%;
    text-align: center;
    color: #0062cc;
}







/* RESET */
* {
  padding: 0;
  margin: 0;
  font-size: 1em;
  box-sizing: border-box;
  
  /* color: hsl(0, 0%, 50%); */
}

/* Containing areas */
.container { 
  width: 600px; 
  margin: 1em auto;
}
.ta-container {
  width: 100%;
  border: 1px solid hsl(0, 0%, 70%);
  border-radius: 0.25em;
  margin: 0.25em 0 1.5em;
}
.hasfocus {
  box-shadow: 0px 0px 6px hsl(210, 50%, 60%);
}

/* The textarea itself */
textarea { 
  padding: 0.25em;
  width: 100%;
  max-width: 100%;
  border: none;
  vertical-align:bottom;
  color: hsl(0, 0%, 50%);
  border-radius: 0.25em;
  outline: none;
}

/* The status bar */ 
.status-bar { 
  background: hsl(0, 0%, 90%);
  padding: 0.25em;
  text-align: right;
  font-family: sans-serif;
  font-size: 0.7em;
  width: 100%;
  color: hsl(0, 0%, 50%);
  border-radius: 0 0 0.25em 0.25em;
}
table { 
  width: auto;
  margin-left: auto;
  line-height: 1em;
}
.charcount, .remaining { 
  font-weight: bold;
}
.over {
  color: hsl(0, 80%, 60%);
}

</style>

@endpush

@section('title','Prakerin | Disposisi')

@section('judul','DISPOSISI')

@section('breadcrump')

<div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>

<div class="breadcrumb-item"> <i class="fas fa-user"></i> DISPOSISI</div>



@endsection

@section('main')

<div>

    <div class="garis"></div>

    <div class="card-header">

        <h5 class="title"><i class="far fa-address-card"></i> Disposisi </h5>

    </div>

    <div class="card">

    <div class="row">

        <div class="col-sm-8 mt-4">

            <div class="card-body" id="dataguru">

                <h5 class="card-title">Disposisi</h5>

                  <div class="row g-3 align-items-center">

                    <label class="form-label col-7 pleft">Pokja Tujuan</label>

                    <label class="form-label">: {{ $disposisi->Pokjatujuan }}</label>

                  </div>

                  <div class="row g-3 align-items-center">

                    <label class="form-label col-7 pleft">Keterangan Disposisi</label>

                    <label class="form-label">: {{ $disposisi->Keterangan_disposisi }}</label>

                  </div>

                  <div style="margin-top: 40px; margin-bottom:40px;">

                   

                </div>

            </div>



    </div>
    

    </div>
    
  






</div>
<div class="row">
  <div class=" contact-form card">
              <div class="contact-image">
                  <img src="https://icon-library.com/images/feedback-icon-png/feedback-icon-png-20.jpg" alt="-"/>
              </div>

              <form id="theform" action="javascript:void(0);" method="POST">
                <h3>Feedback</h3>
                <div class="ta-container">
                  <textarea id="about-yourself" class="ta" name="about-yourself" rows="6" cols="75" data-maxchars="20" data-over="false" placeholder="Enter text here..." required></textarea>
                  <div class="status-bar">
                    <table>
                      <label class="form-label col-7 pleft">Nama Pengirim</label>

                      <label class="form-label">: </label>
                      <label class="form-label col-7 pleft">Waktu</label>

                      <label class="form-label">: </label>
                      {{-- <tr><td>Nama Pengirim:</td><td class="charcount"></td></tr>
                      <tr><td class="remaining-label">Waktu:</td><td class="remaining"></td></tr> --}}
                    </table>
                  </div>
                </div>
                <div class="footer">
                  <a href="{{ route('admin.surat_masuk.index') }}" type="button" class="btn btn-danger ">Kembali</a>
                      <button class="btn btn-success">Submit</button>
                  </div>
                
            
                
                
                
              </form>
              


              {{-- <form method="post">
                  <h3>FeedBack</h3>
                 <div class="row">
                    
                      <div class="col-md-12">
                          <div class="form-group">
                              <textarea name="txtMsg" class="form-control" placeholder="Tuliskan Pesan" style="width: 100%; height: 150px;"></textarea>
                          </div>
                      </div>
                  </div>
                  <div class="footer">
                  <a href="{{ route('admin.surat_masuk.index') }}" type="button" class="btn btn-danger ">Kembali</a>
                      <button class="btn btn-success">Submit</button>
                  </div>
              </form>
  </div> --}}
                </div>


       

@endsection