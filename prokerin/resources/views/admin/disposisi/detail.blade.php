
{{-- 
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

    content {
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
}

</style>

@endpush

@section('title', 'Prakerin | Disposisi')

@section('judul', 'DISPOSISI')

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
       @if (Auth::user()->role == 'tu' or Auth::user()->role == 'admin' or Auth::user()->role == 'kepsek' or Auth::user()->role == 'kaprog' or Auth::user()->role == 'kesiswaan' or Auth::user()->role == 'kurikulum' or Auth::user()->role == 'hubin' or Auth::user()->role == 'sarpras' or Auth::user()->role == 'bkk')
        @if (!empty($feedback))
        <div class="row">
            <div class="col-12 ">
              <div class="card">
                <form action="{{route('disposisi.feedback.update',[$feedback->id])}}" method="POST" class="needs-validation" >
                    @method('put')
                    @csrf
                  <div class="card-header">
                    <h4 style="color:#EA2027;">FeedBack</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group mb-0">
                      <label>Pesan</label>
                      <input type="hidden" name="id_dari" value="{{Auth::user()->id}}">
                      <input type="hidden" name="id_untuk" value="{{$from->id_dari}}">
                                              <input type="hidden" name="id_detail_surat" value="{{$disposisi->id_detail_surat}}">

                      @if (Auth::user()->role == 'kepsek' || Auth::user()->role == 'kaprog' || Auth::user()->role == 'sarpras' || Auth::user()->role == 'tu')
                      <textarea disabled name="description_feedback" class="form-control" style="width:600px;height:200px;"  required="">{{$feedback->description_feedback}}</textarea>
                      @else 
                      <textarea  name="description_feedback" class="@error('description_feedback') is-invalid @enderror form-control" style="width:600px;height:200px;"  required="">{{$feedback->description_feedback}}</textarea>
                      @error('description_feedback')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                      @endif
                    </div>
                  </div>
                  <div class="card-footer text-right">
                      @if (Auth::user()->role == 'kepsek' || Auth::user()->role == 'kaprog' || Auth::user()->role == 'sarpras' || Auth::user()->role == 'tu')
                      <a href="{{ route('admin.surat_masuk.index') }}" type="button" class="btn btn-danger ">   Kembali</a>
                          
                      @else
                      <a href="{{ route('admin.surat_masuk.index') }}" type="button" class="btn btn-danger ">   Kembali</a>
                      <button class="btn btn-success">Update</button>
    
                      @endif
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        @else 
        <div class="row">
            <div class="col-12 ">
              <div class="card">
                <form action="{{route('disposisi.feedback.store')}}" method="POST" class="needs-validation" >
                    @csrf
                  <div class="card-header">
                    <h4 style="color:#EA2027;">FeedBack</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group mb-0">
                      <label>Pesan</label>
                      <input type="hidden" name="id_dari" value="{{Auth::user()->id}}">
                      <input type="hidden" name="id_untuk" value="{{$from->id_dari}}">
                                              <input type="hidden" name="id_detail_surat" value="{{$disposisi->id_detail_surat}}">

                      @if (Auth::user()->role == 'kepsek' || Auth::user()->role == 'kaprog' || Auth::user()->role == 'sarpras' || Auth::user()->role == 'tu')
                      <textarea disabled name="description_feedback" class="form-control" style="width:600px;height:200px; font-size: 30px; color: rgb(170, 164, 164);"  required="">
                    Belum ada feedback
                     </textarea>
                      @else
                      <textarea  name="description_feedback" class="@error('description_feedback') is-invalid @enderror form-control" style="width:600px;height:200px;"  required="">
                         </textarea>
                         @error('description_feedback')
                         <div class="invalid-feedback">{{ $message }}</div>
                         @enderror
                      @endif
                    </div>
                  </div>
                  <div class="card-footer text-right">
                      @if (Auth::user()->role == 'kepsek' || Auth::user()->role == 'kaprog' || Auth::user()->role == 'sarpras' || Auth::user()->role == 'tu')
                      <a href="{{ route('admin.surat_masuk.index') }}" type="button" class="btn btn-danger ">   Kembali</a>
                          
                      @else
                      <a href="{{ route('admin.surat_masuk.index') }}" type="button" class="btn btn-danger ">   Kembali</a>
                      <button class="btn btn-success">Submit</button>
    
                      @endif
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        @endif
       @endif


       

@endsection

 --}}



{{-- detai/l disposisi.blade --}}

@extends('template.master')

@push('link')

    <style>
        .mtop {
            margin-top: -10px;
        }

        .pleft {
            padding-left: 15px;
        }

        .garis {
            height: 10px;
            width: auto;
            background-color: rgb(82, 82, 255);

        }

        .title {

            padding-top: 10px;

        }

        h5 {
            color: rgb(82, 82, 255);
        }

        .title i {
            font-size: 20px;
            margin-left: 5px;
            margin-right: 5px;
        }

 
        .contact-form {
            background: #fff;
            margin-top: 40px;
            margin-bottom: 5%;
            width: 70%;
            margin-left: 17px;

        }

        .contact-form .form-control {
            border-radius: 1rem;
        }




        .contact-image {
            text-align: center;
        }

        .contact-image img {
            border-radius: 30px;
            width: 11%;
            margin-top: -40px;
            /* transform: rotate(29deg); */
            margin-bottom: 50px;
            box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
            background: white;
        }

        .contact-form form {
            padding: 50px;
        }

        .contact-form h3 {
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
            vertical-align: bottom;
            color: hsl(0, 0%, 50%);
            border-radius: 0.25em;
            outline: none;
        }

        /* The status bar */
        .status-bar {
            background: hsl(0, 0%, 90%);
            text-align: right;
            font-family: sans-serif;
            width: 100%;
            color: hsl(0, 0%, 50%);
            border-radius: 0 0 0.25em 0.25em;
        }
        

        table {
            width: auto;
            margin-left: auto;
            line-height: 1em;
        }

        .charcount,
        .remaining {
            font-weight: bold;
        }

        .over {
            color: hsl(0, 80%, 60%);
        }

    </style>

@endpush
@section('title', 'Prakerin | Disposisi')
@section('judul', 'DISPOSISI')
@section('breadcrump')
    <div class="breadcrumb-item "><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>
            DASBOARD</a></div>
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


        @if (Auth::user()->role == 'tu' or Auth::user()->role == 'admin' or Auth::user()->role == 'kepsek' or Auth::user()->role == 'kaprog' or Auth::user()->role == 'kesiswaan' or Auth::user()->role == 'kurikulum' or Auth::user()->role == 'hubin' or Auth::user()->role == 'sarpras' or Auth::user()->role == 'bkk')
            @if (!empty($feedback))

            <div class="row justify-content-center">
              <div class=" contact-form card">
                  <div class="contact-image">
                      <img src="https://icon-library.com/images/feedback-icon-png/feedback-icon-png-20.jpg" alt="-" />
                  </div>
  
                  <form action="{{route('disposisi.feedback.update',[$feedback->id])}}" method="POST"  >
                    @method('put')
                    @csrf
                      <h3>Feedback</h3>
                      <div class="ta-container">
                        <input type="hidden" name="id_dari" value="{{Auth::user()->id}}">
                        <input type="hidden" name="id_untuk" value="{{$from->id_dari}}">
                        <input type="hidden" name="id_detail_surat" value="{{$disposisi->id_detail_surat}}">
                        @if (Auth::user()->role == 'kepsek' || Auth::user()->role == 'kaprog' || Auth::user()->role == 'sarpras' || Auth::user()->role == 'tu')
                        <textarea id="about-yourself" disabled name="description_feedback" class="ta"  rows="6" cols="75" 
                        data-over="false"  required="">{{$feedback->description_feedback}}</textarea>
                        <div class="status-bar">
                          <div class="row">
                            <div class="col-6" style="margin-left: -40px;">
                              <label class="form-label" style="font-size: 1em;">Nama Pengirim</label>
                              <label class="form-label" style="font-size: 1.1em;">: <b> {{$feedbackDetail_from->nama}}</b> </label>                       
                            </div>
                            <div class="col-6">
                              <label class="form-label" style="font-size: 1em;">Waktu</label>
                              <label class="form-label" style="font-size: 1.1em;">: <b>{{$feedbackDetail_date->diffForHumans()}}</b></label>
                            </div>
                           </div>
                        </div>
                        @else 
                        <textarea id="about-yourself" name="description_feedback" class="@error('description_feedback') is-invalid @enderror ta" rows="6" cols="75" 
                        data-over="false"   required="">{{$feedback->description_feedback}}</textarea>
                        <div class="status-bar">
                          <div class="row">
                            <div class="col-6" style="margin-left: -40px;">
                              <label class="form-label" style="font-size: 1em;">Nama Pengirim</label>
                              <label class="form-label" style="font-size: 1.1em;">: <b>{{App\Models\guru::where('id_user',Auth::user()->id)->first()->nama   }}</b> </label>                       
                            </div>
                            <div class="col-6">
                              <label class="form-label" style="font-size: 1em;">Waktu</label>
                              <label class="form-label times" style="font-size: 1.1em;">: <b>{{Carbon\Carbon::now()->toTimeString()}}</b></label>
                            </div>
                           </div>
                        </div>
                        @error('description_feedback')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                        @endif
                      </div>
                      <div class="footer d-flex justify-content-end">
                        @if (Auth::user()->role == 'kepsek' || Auth::user()->role == 'kaprog' || Auth::user()->role == 'sarpras' || Auth::user()->role == 'tu')
                        <a href="{{ route('admin.surat_masuk.index') }}" type="button" class="btn btn-danger ">   Kembali</a>
                            
                        @else
                        <a href="{{ route('admin.surat_masuk.index') }}" type="button" class="mr-2 btn btn-danger ">   Kembali</a>
                        <button class="btn btn-success">Update</button>
      
                        @endif
                      </div>
                  </form>
              </div>
            </div>








            @else 
            <div class="row justify-content-center">
              <div class=" contact-form card">
                  <div class="contact-image">
                      <img src="https://icon-library.com/images/feedback-icon-png/feedback-icon-png-20.jpg" alt="-" />
                  </div>
  
                  <form id="theform"  action="{{route('disposisi.feedback.store')}}" method="POST">
                    @csrf
                      <h3>Feedback</h3>
                      <div class="ta-container">
                        <input type="hidden" name="id_dari" value="{{Auth::user()->id}}">
                        <input type="hidden" name="id_untuk" value="{{$from->id_dari}}">
                                                <input type="hidden" name="id_detail_surat" value="{{$disposisi->id_detail_surat}}">

                  @if (Auth::user()->role == 'kepsek' || Auth::user()->role == 'kaprog' || Auth::user()->role == 'sarpras' || Auth::user()->role == 'tu')
                            <textarea disabled  id="about-yourself" class="ta" name="description_feedback" rows="6" cols="75" 
                              data-over="false"  required>Belum ada Feedback</textarea>
                              <div class="status-bar">
                                <div class="row">
                                  <div class="col-6" style="margin-left: -40px;">
                                    <label class="form-label" style="font-size: 1em;">Nama Pengirim</label>
                                    <label class="form-label" style="font-size: 1.1em;">: <b></b> </label>                       
                                  </div>
                                  <div class="col-6">
                                    <label class="form-label" style="font-size: 1em;">Waktu</label>
                                    <label class="form-label" style="font-size: 1.1em;">: <b></b></label>
                                  </div>
                                 </div>
                              </div>
                           @else 
                           <textarea   id="about-yourself" class="ta" name="description_feedback" rows="6" cols="75" 
                           data-over="false" placeholder="Tulis Feedback" required></textarea>
                              @error('description_feedback')
                              <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                              <div class="status-bar">
                                <div class="row">
                                  <div class="col-6" style="margin-left: -40px;">
                                    <label class="form-label" style="font-size: 1em;">Nama Pengirim</label>
                                    <label class="form-label" style="font-size: 1.1em;">: <b>{{App\Models\guru::where('id_user',Auth::user()->id)->first()->nama   }}</b> </label>                       
                                  </div>
                                  <div class="col-6">
                                    <label class="form-label" style="font-size: 1em;">Waktu</label>
                                    <label class="form-label times" style="font-size: 1.1em;" >: <b>{{Carbon\Carbon::now()->toTimeString()}}</b></label>
                                  </div>
                                 </div>
                              </div>
                           @endif
                      </div>
                      <div class="footer d-flex justify-content-end">
                        @if (Auth::user()->role == 'kepsek' || Auth::user()->role == 'kaprog' || Auth::user()->role == 'sarpras' || Auth::user()->role == 'tu')
                        <a href="{{ route('admin.surat_masuk.index') }}" type="button" class="btn btn-danger ">   Kembali</a>
                            
                        @else
                        <a href="{{ route('admin.surat_masuk.index') }}" type="button" class="mr-2 btn btn-danger ">   Kembali</a>
                        <button class="btn btn-success">Submit</button>
      
                        @endif
                      </div>
                  </form>
              </div>
            </div>
            @endif

        @endif
      




        @endsection

        <script>
          setInterval("my_function();",1000); 
    function my_function(){
      $('.times').load(location.href + ' .times');

    }
        </script>