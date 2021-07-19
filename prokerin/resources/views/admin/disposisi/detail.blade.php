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
       @if ((Auth::user()->role == 'tu' or  Auth::user()->role == 'admin' or Auth::user()->role == 'kepsek' or Auth::user()->role == 'kaprog' or Auth::user()->role == 'kesiswaan' or Auth::user()->role == 'kurikulum' or Auth::user()->role == 'hubin' or Auth::user()->role == 'sarpras' or Auth::user()->role == 'bkk'))
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
                      <input type="hidden" name="id_untuk" value="{{$untuk->id_dari}}">
                      <input type="hidden" name="disposisi" value="{{$disposisi->id}}">
                      @if (Auth::user()->role == "kepsek" || Auth::user()->role == "kaprog" || Auth::user()->role == "sarpras" || Auth::user()->role == 'tu' )
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
                      @if (Auth::user()->role == "kepsek" || Auth::user()->role == "kaprog"  || Auth::user()->role == "sarpras" || Auth::user()->role == 'tu' )
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
                      <input type="hidden" name="id_untuk" value="{{$untuk->id_untuk}}">
                      <input type="hidden" name="disposisi" value="{{$disposisi->id}}">
                      @if (Auth::user()->role == "kepsek" || Auth::user()->role == "kaprog" || Auth::user()->role == "sarpras" || Auth::user()->role == 'tu' )
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
                      @if (Auth::user()->role == "kepsek" || Auth::user()->role == "kaprog" || Auth::user()->role == "sarpras" || Auth::user()->role == 'tu' )
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