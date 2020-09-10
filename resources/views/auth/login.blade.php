<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
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

    <title>Document</title>
</head>
<body>
    <div class="flex-center full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                    <a href="{{ route('register') }}">Inscription</a>
            </div>
        @endif
    <div class="container">
        <div class='ripple-background'>
            <div class='circle xxlarge shade1'></div>
            <div class='circle xlarge shade2'></div>
            <div class='circle large shade3'></div>
            <div class='circle mediun shade4'></div>
            <div class='circle small shade5'></div>
        </div>
        <center>
        <div>
            <img src=" {{ asset('css/img/coco.png') }}" width="420" height="350">
        </div>

        <br>
        <h3>
            IA ORA NA
        </h3>
        <br>
        <form method="POST" action="{{ route('login') }}">
                        {{csrf_field()}}
            <div class="col-4">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <br>
            <br>
            <div class="col-4">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            </div>
            <br>
            <br>
            <button type="submit" class="btn btn-primary">
                Valider
            </button>
        </form>
        </center>
    </div>
</body>
</html>




