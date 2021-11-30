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
    
    <title>SignUp</title>

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
                            <p>Enter User Information</p>
                            <form method="POST" action="{{ route('user.store') }}">
                                @csrf
                                <div class="input-group mb-3">
                                    <div class="col-md-5">
                                        <label for="name" >Full Name <span style="color:red">*</span></label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" style="border-radius: 6px; box-shadow: 0 2px 14px 0 rgba(180, 180, 180, 0.5);background-color: #ffffff;">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="col-md-5">
                                        <label for="phone_number">Phone Number <span style="color:red">*</span></label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{old('phone_number')}}" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                                        @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="col-md-5">
                                        <label for="email">Email Id<span style="color:red">*</span></label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" autocomplete="nope">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="col-md-5">
                                        <label for="password">Password<span style="color:red">*</span></label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" autocomplete="new-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="col-md-5">
                                        <label for="password_confirmation">Confirm Password<span style="color:red">*</span></label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}">
                                        @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-1 login-submit">
                                        <a href="{{route('login')}}" class=" btn btn-primary btn-block">Cancel</a>
                                    </div>
                                        <div class="mb-1 login-submit col-md-6">
                                            <button type="submit" class="btn btn-primary btn-block">SignUp</button>
                                        </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <!-- </div> -->
        </div>
    </div>
</div>
</body>
</html>
