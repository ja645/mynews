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
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  </head>
  <body>
    <div class="container pt-0">
        
        <h1 id="title" class="text-center my-5 border-bottom border-dark border-3">Login</h1>
    
        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <div class="news-form">
                <input type="email" class="form-control form-control-lg mx-auto" style="width: 75%;"name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            
    
            <div class="news-form">
                <input type="password" class="form-control form-control-lg mx-auto {{ $errors->has('password') ? ' is-invalid' : '' }}" style="width: 75%;" name="password" placeholder="{{ __('messages.Password') }}" required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors-first('password') }}</strong>
                    </span>
                @endif
            </div>
    
            <div class="form-check mx-auto" style="width: 220px;">
                <label style="font-size: 2rem;">
                    <input class="checkbox" style="transform: scale(1.5);" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('messages.Remember Me') }}
                </label>
            </div>
            
            <div class="d-grid col-3 mx-auto my-5">
                <button type="submit" class="btn btn-outline-success mt-5 m-sm-0" style="font-size: 2.4rem;">Login</button>
            </div>
               
        </form>
    
    </div>
 </body>
</html>