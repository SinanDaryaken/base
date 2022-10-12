<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Yönetim Paneli</title>
    <link rel="stylesheet" href="{{asset('assets/css/icons.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/app.min.css')}}" id="light-style"/>
</head>

<body class="authentication-bg" data-layout-config='{"leftSideBarTheme":"dark", "darkMode":false}'>
<div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-4 col-lg-5">
                <div class="card">
                    <div class="card-header pt-4 pb-4 text-center bg-dark">
                        <span>
{{--                            <img src="{{ asset('assets/image/logo.png') }}" alt="" height="100">--}}
                        </span>
                    </div>
                    <div class="card-body p-4">

                        <div class="text-center w-75 m-auto">
                            <h4 class="text-dark-50 text-center pb-0 fw-bold">Yönetim Paneli</h4>
                        </div>

                        <form action="" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">E-Posta</label>
                                <input class="form-control" type="email" name="email" value="{{ old('email') }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert" style="display: block;">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Şifre</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" class="form-control" name="password">
                                    <div class="input-group-text" data-password="false">
                                        <span class="password-eye"></span>
                                    </div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert" style="display: block;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 mb-0 text-center">
                                <button class="btn btn-primary" type="submit"> Giriş Yap</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('assets/js/vendor.min.js')}}"></script>
<script src="{{asset('assets/js/app.min.js')}}"></script>
</body>
</html>
