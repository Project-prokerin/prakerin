@extends('template.master')
@push('link')

@endpush
@section('title', 'Prakerin | DASHBOARD')
@section('judul', 'DASHBOARD')
@section('breadcrump')
        <div class="breadcrumb-item "><i class="fas fa-tachometer-alt"></i> DASBOARD</div>
@endsection
@section('main')

@endsection
@push('script')
<script>
    // jangan di apa2 apain
    $.ajax({
        url:"{{ route('siswa.index') }}",
        type:'get',
        success: function (response) {
            // var i;
            // len = response.user;
            // for (i = 0; i < len.length; i++) {
            // text = '<p>'+response.user[i].username+'</p>';
            //     $('.p').append(text);
            // }
        },
        eror: function (eror){
            console.log('eror')
        }
    });
</script>
@endpush
