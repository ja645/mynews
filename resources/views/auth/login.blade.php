<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login</title>
    
    <!-- Scripts -->
    <script src="{{ secure_asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css? family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    
    <!-- Font Awesome -->
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/admin.css') }}" rel="stylesheet">
  </head>
  <body id="index">

    
    <div class="main" id="login">         
        <h1 class="page-title">Login</h1>
    
        <form method="POST" action="{{ route('login') }}">
            @csrf
    
            {{--<input id="email" type="email" class="input {{ $errors->has('email') ?' is-invalid' : '' }}" name="email" placeholder="{{ __('messages.E-Mail Address') }}" value="{{ old('email') }}" required autofocus>--}}
            <input type="email" class="input" name="email" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
    
    
      
            <input type="password" class="input {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('messages.Password') }}" required>
    
            @if ($errors->has('password'))
                <span class="invalid-feedback">
                    <strong>{{ $errors-first('password') }}</strong>
                </span>
            @endif
    
            <div class="checkbox">
                <label>
                    <input class="checkbox" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('messages.Remember Me') }}
                </label>
            </div>
    
            <button type="submit" class="button">
                {{ __('messages.Login') }}
            </button>
               
        </form>
    </div>
 </body>
</html>