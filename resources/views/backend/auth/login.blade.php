<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet"> -->
    <script type="text/javascript" src="{{asset('backend/assets/templates/js/jquery.min.js')}}"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <!-- Style -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/login.css')}}">
    <link rel="icon" href="{{asset('backend/assets/img/icon.png')}}" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/templates/vendors/font-awesome/css/font-awesome.min.css')}}">

    <title>Login</title>

</head>
<body class="hold-transition">
<div class="login-page">
    <div class="login-box">
        <div class="container">
            <!-- <div class="row"> -->
            @include('backend.layouts.messages')
            <div class="row login-first-row">
                <div class="offset-3 col-lg-6 col-sm-12 right-item">
                    <div class="card">
                        <div class="card-body login-card-body">
                            <p>Welcome Back! Please <span>login</span> to continue.</p>
                               @if(Session::has('message'))
                                <div class="alert alert-{{ Session::get('alert-status') }}" role="alert">
                                    {{ Session::get('message') }}
                                </div>
                               @endif
                            <form method="POST" action="{{ route('login.submit') }}">
                                @csrf
                                <div class="input-group mb-3">
                                    <img src="{{asset('backend/assets/img/user_icon.png')}}"
                                         class="User-Icon">
                                    <input type="text" class="form-control" value="{{old('email')}}" name="email" placeholder="Email" required>
                                    <div class="text-danger"></div>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <img src="{{asset('backend/assets/img/password_icon.png')}}"
                                         class="Password-Icon">
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                                    <i class="fa fa-eye password_eye" style="color:#ec008c; margin-left:10px;margin-top:10px; position:sticky;"></i>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-1 login-submit">
                                    <button type="submit" class="btn btn-primary btn-block">LOGIN</button>
                                </div>
                            </form>
                            <div class="input-group" style="margin-left:40px; color:#ec008c;">Create an account here <span style="margin-left:10px;"><a href="{{route('user.create')}}">Sign Up</a></span></div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- </div> -->
        </div>
    </div>
</div>
<script>
     $(document).ready(function() {
         showPassword();
     });
    function showPassword(){
        $('.fa-eye').click(function(){
            document.getElementById("password").type = "text";
            $(this).removeClass("fa-eye");
            $(this).addClass("fa-eye-slash");

            $('.fa-eye-slash').click(function(){
                document.getElementById("password").type = "password";
                $(this).removeClass("fa-eye-slash");
                $(this).addClass("fa-eye");

                showPassword();
            });
        });
    }
</script>
</body>
</html>
