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
<form action="{{ route('ganti_password.post') }}" method="POST">
@csrf
        <div>
        Password sebelumnya
        <p> <i class="fas fa-user"></i> <input type="password" class=" @error('old_pass') is-invalid @enderror" name="old_pass"> </div></p>
        @error('old_pass')
            <div class="invalid_feedback">{{ $message }}</div>
        @enderror
        <div>
        Password Baru
        <p> <i class="fas fa-user"></i> <input type="password" name="new_pass"> </div></p>
         @error('new_pass')
            <div class="invalid_feedback">{{ $message }}</div>
        @enderror
        <div>
        Password baru (ulangi)
        <p> <i class="fas fa-user"></i> <input type="password"  name="new_pass2"> </div></p>
         @error('new_pass2')
            <div class="invalid_feedback">{{ $message }}</div>
        @enderror

        <div class="button">
        <button type="submit" class="btn btn-success">Save</button>
        <a href="/user/profile" class="btn btn-danger">cancel</a>
    </div>
</form>
</div>


</div>
@endsection
@push('script')

@endpush
