@extends('template.master')
@push('link')
<style>
.card{
        width:500px;
        height:500px;
        left:30%;
}.col{
        left:10%;
}
</style>
@endpush
@section('title', 'Prakerin | Ganti password')
@section('judul', 'GANTI PASSWORD')
@section('breadcrump')
        <div class="breadcrumb-item "> <a href="{{ route('index.user') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item "> <a href="{{ route('user.profile') }}"><i class="fas fa-user"></i> PROFILE</a></div>
        <div class="breadcrumb-item active"> PASSWORD </div>
@endsection
@section('main')
<div class="card">

<div class="card-header  border-bottom border-dark">Change Password</div>

<div class="container">

    <div class="col pt-4 ">
     <div>
       Password sebelumnya
      <p> <i class="fas fa-user"></i> <input type="password"> </div></p>
      <div>
       Password Baru
      <p> <i class="fas fa-user"></i> <input type="password"> </div></p>
      <div>
       Password baru (ulangi)
      <p> <i class="fas fa-user"></i> <input type="password"> </div></p>

      <div class="button">
        <button type="button" class="btn btn-success">Save</button>

        <button type="button" class="btn btn-danger">cancel</button>
   </div>

</div>
   

</div>
@endsection
@push('script')

@endpush
