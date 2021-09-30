<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <link rel="shortcut icon" href="{{ asset('images/tb.png') }}" />
    <title>@yield('title')</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>


    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('template/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
    @stack('link')
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('template/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/costom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/component.css') }}">

    <style>

<style>
        .dropupp-secondary {
          background-color: #3498DB;
          color: white;
          padding: 16px;
          font-size: 16px;
          border: none;
        }

        .dropup-secondary {
          position: relative;
          display: inline-block;
        }

        .dropup-secondary-content {
          display: none;
          position: absolute;
          background-color: #a3a5a7;
          min-width: 160px;
          bottom: 50px;
          z-index: 1;
        }

        .dropup-secondary-content span{
          color: black;
          padding: 12px 16px;
          text-decoration: none;
          display: block;
        }

        .dropup-secondary-content span:hover {background-color: #ccc}

        .dropup-secondary:hover .dropup-secondary-content {
          display: block;
        }

        .dropup-secondary:hover .dropupp-secondary {
          background-color: #e6e4e4;

        }






        .dropupp-primary {
          background-color: #3498DB;
          color: white;
          padding: 16px;
          font-size: 16px;
          border: none;
        }

        .dropup-primary {
          position: relative;
          display: inline-block;
        }

        .dropup-primary-content {
          display: none;
          position: absolute;
          background-color: #5cb0ff;
          min-width: 160px;
          bottom: 50px;
          z-index: 1;
        }

        .dropup-primary-content span{
          color: black;
          padding: 12px 16px;
          text-decoration: none;
          display: block;
        }

        .dropup-primary-content span:hover {background-color: #ccc}

        .dropup-primary:hover .dropup-primary-content {
          display: block;
        }

        .dropup-primary:hover .dropupp-primary {
          background-color: #2980B9;
        }
            </style>
    </style>
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
          {{-- $notifUnread = Auth::user()->notifications->where('read_at',null); --}}
          @include('template.partial.navbar',['notifications'=>auth()->user()->unreadNotifications,'notifUnread'=>Auth::user()->notifications->where('read_at',null)])

            @include('template.partial.sidebar')


            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>@yield('judul')</h1>
                        <div class="section-header-breadcrumb mr-5" aria-label="breadcrumb">
                            @yield('breadcrump')
                        </div>
                    </div>
                    <div class="section-body">
                        @yield('main')
                    </div>
                </section>
            </div>
    </div>

    {{-- </div> --}}
    <!-- Main Content -->
    <!-- General JS Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-loading-overlay/2.1.7/loadingoverlay.min.js" integrity="sha512-hktawXAt9BdIaDoaO9DlLp6LYhbHMi5A36LcXQeHgVKUH6kJMOQsAtIw2kmQ9RERDpnSTlafajo6USh9JUXckw==" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{ asset('template/assets/js/stisla.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert.all.js') }}"></script>
    <script src="{{ asset('assets/js/auth/time_log.js') }}"></script>
    <script src="{{ asset('assets/js/auth/logout.js') }}"></script>
    <script src="{{ asset('template/node_modules/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Template JS File -->
    <script src="{{ asset('template/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('template/assets/js/custom.js') }}"></script>

    <!-- JS Libraies -->
    @stack('script')
    <script src="{{ asset('template/node_modules/chart.js/dist/chart.min.js') }}"></script>




</body>

</html>
