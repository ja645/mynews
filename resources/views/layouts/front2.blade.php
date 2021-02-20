<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    
    <!-- Scripts -->
    <script src="{{ secure_asset('js/app.js') }}" defer></script>
  
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css? family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    
    <!-- Styles -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/front.css') }}" rel="stylesheet">
  </head>
  
  
  <body>
    <div id="app">
      <nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
        <div class="container">
          <a class="navbar-brand-front" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggle-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            </ul>
            <!-- Right Side of Nabar --> 
            <ul class="navbar-nav ml-auto">
              
            <!-- Authentication Links -->
            @guest
              <li><a class="nav-lin-front" href="{{ route('register') }}">signup</a> or <a class="nav-link-front" href="{{ route('login') }}">{{ __('Login') }}<a></li>
            @else
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link-front dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ Auth::user()->name }}<span class="caret"></span><a/>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                </div>
              </li>
            @endguest
            </ul>
          </div>
        </div>
      </nav> 
      <h1 class="page-title">
        @yield('page-title')
      </h1>
      <main class="py-4">
        @yield('content')
      </main>
    </div>
  </body>
</html>