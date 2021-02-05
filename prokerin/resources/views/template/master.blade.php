<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title>@yield('title')</title>

<!-- General CSS Files -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<!-- CSS Libraries -->
@stack('link')
<!-- Template CSS -->
<link rel="stylesheet" href="{{asset('template/assets/css/style.css')}}">
<link rel="stylesheet" href="{{asset('template/assets/css/components.css')}}">
<style>
    /* body{
        background-color: #fafdfb
    }
    .table-responsive{
        overflow-x: hidden;
    } */
</style>
</head>

<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
    <div class="navbar-bg"> </div>
    {{-- navbar  --}}
    @include('template.partial.navbar')
    {{-- end navbar --}}
    {{-- sidebar --}}
    @include('template.partial.sidebar')
    {{-- endsidebar --}}
    <!-- Main Content -->
    {{-- <div class="main-content">
        <section class="section">
            <div class="section-header" >
                <h1>Default Layout</h1>
                @yield('breadcrump')
                <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Layout</a></div>
                <div class="breadcrumb-item">Default Layout</div>
                </div>
            </div>
        </section>
        <section class="section">
        <div class="section-body">
        @yield('content')
        </div>
        </section>
    </div> --}}

        <!-- Main Content -->
            <div class="main-content" style="min-height: 545px;">
            <section class="section">
            <div class="section-header" style="height: 60px">
                @yield('breadcrump')
                </div>
            </div>

            <div class="section-body">
                @yield('content')
            </div>
            </section>
        </div>
<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="{{ asset('template/assets/js/stisla.js') }}"></script>

<!-- JS Libraies -->
@stack('script')
<!-- Template JS File -->
<script src="{{ asset('template/assets/js/scripts.js') }}"></script>
<script src="{{ asset('template/assets/js/custom.js') }}"></script>

</body>
</html>
