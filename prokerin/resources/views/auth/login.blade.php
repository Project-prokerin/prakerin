<!doctype html>
<html lang="en">
<head>
    <style>
        .show{
            margin-top: 2px;
        }
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--load all styles -->
    <link rel="stylesheet" href="{{url('assets/css/auth.css')}}">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <link rel="shortcut icon" href="{{ asset('images/tb.png') }}" />
    <title>Prakerin | Login</title>
</head>

<body>


    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
<form class="login100-form validate-form" method="POST" action="/postlogin">
                    @csrf
                    <span class="login100-form-title">
                        Login Prakerin
                    </span>
                    <div class="wrap-input100 validate-input   @error('username') alert-validate @enderror" data-validate="@error("username")  {{ $message }} @enderror">
                        <input class="input100" type="text" name="username" placeholder="username" value="{{ old('username') }}">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input   @error('password') alert-validate @enderror" data-validate="@error("password")  {{ $message }} @enderror">
                        <input class="input100" id="form-pw" type="password" name="password" placeholder="Password" value="{{ old('password') }}">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>

                    </div>
                    <div class="text-right p-b-10">
                        <input type="checkbox" id="show-pw" class="form-check-input mt-2">
                        <label class="mx-2 show form-check-label">Show Password</label>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
                    <div class="text-center p-t-12">
                        <span class="txt1">
                        </span>
                        <a class="txt2" href="#">
                        </a>
                    </div>

                    <div class="text-center mb-3 p-t-50">
                        <a class="txt2" href="#">
                        </a>
                    </div>
                </form>
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{url('images/logo_starbhak.png')}}" alt="SMK Taruna Bhakti">
                </div>
            </div>
        </div>
</div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		$('#show-pw').click(function(){
			if($(this).is(':checked')){
				$('#form-pw').attr('type','text');
			}else{
				$('#form-pw').attr('type','password');
			}
		});
	});
</script>
</html>
