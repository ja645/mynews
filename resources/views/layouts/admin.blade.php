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
    
    <!-- 外部css埋め込み -->
    @stack('css')
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    
  </head>
  <body>
    <header ="header">
      <div class="logo">
        <a class="text-dark text-decoration-none" href="{{ url('/') }}">What's&nbsp<br class="d-sm-none">New?</a>
      </div>
      <nav class="navbar-control px-1 px-sm-5">
        <!-- ログイン済みのユーザー用 -->
      @if(Auth::check())
        <div class="row">
          <div class="col-4">
            <!-- ユーザー名をクリックするとマイページに飛ぶ -->
            <a href="{{ route('mypage', ['id' => Auth::user()->id]) }}" class="navbar-item text-dark text-decoration-none d-none d-sm-block">{{ Auth::user()->name }}</a>
            <a href="{{ route('mypage', ['id' => Auth::user()->id]) }}" class="navbar-item text-dark text-decoration-none d-sm-none"><i class="fas fa-user"></i></a>
          </div>
          
          <div class="col-4">
            <!-- ニュース作成ページへ飛ぶ -->
            <a href="{{ route('scoop') }}" class="navbar-item text-dark text-decoration-none d-none d-sm-block">Scoop!</a>
            <a href="{{ route('scoop') }}" class="navbar-item text-dark text-decoration-none d-sm-none"><i class="fas fa-pen"></i></a>
          </div>
          
          <div class="col-4">
            <!-- ログアウト -->
            <a class="navbar-item text-dark text-decoration-none d-none d-sm-block" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
            <a class="navbar-item text-dark text-decoration-none d-sm-none" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
          </div>
        </div>
        
        
      @else
        <div class="row">
          <div class="col-6">
            <a class="navbar-item text-dark text-decoration-none" href="{{ route('login') }}">login</a>
          </div>
          <div class="col-6">
            <a class="navbar-item text-dark text-decoration-none" href="{{ route('register') }}">signup</a>
          </div>
        </div>
      @endif
      </nav>
      
    </header>
    
    <div class="container">
      @yield('content')  
    </div>
  
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
    
    //画像がアップされていれば色を変え、コメントを表示する
    $('#img_upload_form').change(function(){
      document.querySelector('.fa-camera').style.color = 'red'
    });
    
  </script>
  </body>
</html>