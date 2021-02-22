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
    
    <!-- Font Awesome -->
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/admin.css') }}" rel="stylesheet">
  </head>
  <body id="index">
    <header ="header">
      <div class="logo">
        <a href="{{ url('/') }}">What's New?</a>
      </div>
      <nav class="navbar-control">
        <!-- ログイン済みのユーザー用 -->
      @if(Auth::check())
        <!-- ユーザー名をクリックするとマイページに飛ぶ -->
        <a href="{{ route('mypage', ['id' => Auth::user()->id]) }}" class="navbar-item user-id">{{ Auth::user()->name }}</a>

        <!-- ニュース作成ページへ飛ぶ -->
        <a href="{{ route('scoop') }}" class="navbar-item scoop">Scoop!</a>
        
        <!-- ログアウト -->
        <a class="navbar-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
        
      @else
        <a class="navbar-item" href="{{ route('login') }}">login</a>
        <a class="navbar-item" href="{{ route('register') }}">signup</a>
      @endif
      </nav>
      
    </header>
    
    @yield('content')
  
    <footer></footer>
  <script>
    //ヘッダーがスクロールで消える
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
    
    //textareaの自動リサイズ
    $(function(){
      $('textarea.auto_resize')
      .on('change keyup keydown paste cut', function(){
        if ($(this).outerHeight() > this.scrollHeight){
          $(this).height(1)
        }
        while ($(this).outerHeight() < this.scrollHeight){
          $(this).height($(this).height() + 1)
        }
      });
    });
    
    //画像がアップされていれば色を変える
    $('#img_upload_form').change(function(){
      document.querySelector('.fa-camera').style.color = 'red'
    });
    
  </script>
  </body>
</html>