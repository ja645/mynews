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
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css? family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    
    <!-- Styles -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/front.css') }}" rel="stylesheet">
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  </head>
  
  
  <body>
    
    <header>
      <div class="logo">
        <a class="text-dark text-decoration-none" href="{{ url('/') }}">What's New?</a>
      </div>
      <nav class="navbar-control">
        <!-- ログイン済みのユーザー用 -->
      @if(Auth::check())
        <!-- ユーザー名をクリックするとマイページに飛ぶ -->
        <a href="{{ route('mypage', ['id' => Auth::user()->id]) }}" class="navbar-item user-id">{{ Auth::user()->name }}</a>

        <!-- ニュース作成ページへ飛ぶ -->
        <a href="{{ route('scoop') }}" class="navbar-item scoop">Scoop!</a>
        
        <!-- ログアウト -->
        <a class="navbar-item logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
        
      @else
        <a class="navbar-item login text-dark text-decoration-none" href="{{ route('login') }}">Login</a>
        <a class="navbar-item signup text-dark text-decoration-none" href="{{ route('register') }}">Signup</a>
      @endif
      </nav>
    </header>
    
    <div class="container">
      
      @yield('content')
      
    </div>
  
  
  <script>
    //要素の取得
    var startPos = 0,winScrollTop = 0;
    $(window).on('scroll',function(){
        winScrollTop = $(this).scrollTop();
        if (winScrollTop >= startPos) {
            $('header').addClass('is_scroll');
        } else {
            $('header').removeClass('is_scroll');
        }
        startPos = winScrollTop;
    });
  </script>
  </body>
</html>