
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            body{
                background: #3399ff;
            }


            .circle{
            position: absolute;
            border-radius: 50%;
            background: white;
            animation: ripple 15s infinite;
            box-shadow: 0px 0px 1px 0px #508fb9;
            }

            .small{
            width: 200px;
            height: 200px;
            left: -100px;
            bottom: -100px;
            }

            .medium{
            width: 400px;
            height: 400px;
            left: -200px;
            bottom: -200px;
            }

            .large{
            width: 600px;
            height: 600px;
            left: -300px;
            bottom: -300px;
            }

            .xlarge{
            width: 800px;
            height: 800px;
            left: -400px;
            bottom: -400px;
            }

            .xxlarge{
            width: 1000px;
            height: 1000px;
            left: -500px;
            bottom: -500px;
            }

            .shade1{
            opacity: 0.2;
            }
            .shade2{
            opacity: 0.5;
            }

            .shade3{
            opacity: 0.7;
            }

            .shade4{
            opacity: 0.8;
            }

            .shade5{
            opacity: 0.9;
            }

            @keyframes ripple{
            0%{
                transform: scale(0.8);
            }

            50%{
                transform: scale(1.2);
            }

            100%{
                transform: scale(0.8);
            }
            }
        </style>
    </head>
    <body>
        <div class="flex-center full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Accueil</a>
                    @else
                        <a href="{{ route('login') }}">Connexion</a>

                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Fenua ProLink !
                </div>
                <div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <center>

                            <div class="form-group ">
                                {{-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label> --}}

                                <div class="col-md-6">
                                    <center>
                                        <input placeholder="Nom" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    </center>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group ">
                                {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> --}}

                                <div class="col-md-6">
                                    <input placeholder="Mail" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-group ">
                                {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

                                <div class="col-md-6">
                                    <input placeholder="Mot de passe" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group ">
                                {{-- <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label> --}}

                                <div class="col-md-6">
                                    <input placeholder="Confirmer le mot de passe" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <br>
                            <div class="form-group mb-0">
                                <div class="col-md-6 ">
                                    <button type="submit" class="btn btn-primary">
                                        S'inscrire
                                    </button>
                                </div>
                            </div>
                        </center>
                    </form>
                </div>

                <div class='ripple-background'>
                    <div class='circle xxlarge shade1'></div>
                    <div class='circle xlarge shade2'></div>
                    <div class='circle large shade3'></div>
                    <div class='circle mediun shade4'></div>
                    <div class='circle small shade5'></div>
                </div>
            </div>
        </div>
    </body>
</html>

