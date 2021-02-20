@extends('template.master')
@push('link')
<style>
    @media (max-width:432px) {

.col-6.col-lg-6.border-right.border-dark.pt-4
{
  border:0px solid !important

  }


}
/* .card{
    width: 1200px;
    height: 600px;
}.pro{
    position: absolute;
    width: 53px;
    height: 25px;
    left: 40px;
    top: 20px;
}.icon{
    position: absolute;
    left: 40px;
    top: 80px;
}.kanan{
    position: absolute;
    width: 450px;
    height: 45px;
    right: 90px;
    top: 80px;
}.kanan2{
    position: absolute;
    width: 450px;
    height: 45px;
    right: 90px;
    top: 400px;
}.logout{
    color: red;
}.mail{
    position: absolute;
    width: 410px;
    height: 45px;
    right: 10px;
    top: 20px;
}.container{
    width:1200px;
    height:600px;
} */
</style>
@endpush
@section('title', 'Prakerin | Profile')
@section('judul', 'PROFILE')
@section('breadcrump')
        <div class="breadcrumb-item "> <a href="{{ route('index.user') }}"><i class="fas fa-tachometer-alt"></i> DASBOARD</a></div>
        <div class="breadcrumb-item active"> <i class="fas fa-user"></i> PROFILE</div>

@endsection
@section('main')
<div class="card">
<div class="card-header  border-bottom border-dark">Profile</div>

  <div class="row container  mx-3 ">
    <div class="col-6 col-lg-6 border-right border-dark pt-4 col-sm=12 ">
     <div>
       NIPD
      <p> <i class="fas fa-user"></i> 000000000</div></p>

      
       Nama Siswa
       <p> <i class="fas fa-user"></i> Nur Firdaus</p>

       
       Jurusan
       <p> <i class="fas fa-cog"></i> Rekayasa Perangkat Lunak</p>

       
       kelas
       <p> <i class="fas fa-user"></i> XI</p>

       
       No HP
      <p> <i class="fas fa-user"></i> 090971386135</p>
    </div>


    
    <div class="col pl-5 lg-6 ">
    
      
      <br>
      Email
      <p><i class="fas fa-envelope-open"></i> nurfirdaus@gmail.com</p>
    <br><br><br>
      <p><b>User Profile</b></p>
      <p>Edit Profile</p>
      <p>Change Password</p>
      <p>Log Out</p>
      <p></p>
    </div>
  
 </div>
@endsection
@push('script')

@endpush
