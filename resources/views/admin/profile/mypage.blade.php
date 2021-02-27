@extends('layouts.admin')
    
@section('title', 'マイページ')

@section('content')
  <!-- フラッシュメッセージ -->
  @if (session('flash_message'))
      <div class="flash_message">
          {{ session('flash_message') }}
      </div>
  @endif
  
  <!-- 自分のプロフィール -->
  <h1 id="title" class="text-center my-5 border-bottom border-dark border-2">Your Profile</h1>
  
  <div class="row">
    <div class="col-md-4">
      <img class="image" style="max-width: 100% display: block" src="images/210221_上からのねこ_NOIMAGE.png" alt="" onerror="this.src='images/210221_上からのねこ_NOIMAGE.png'; this.removeAttribute('onerror');" onload="this.removeAttribute('onerror'); this.removeAttribute('onload');">
    </div>
    
    <div class="col-md-8">
      
      <h2 id="h2">
        {{ $profile->name }}
      </h2>
    
      @if ($profile->gender == 1)
      <p class="gender">
          男性
      </p>
      @elseif ($profile->gender == 2)
       <p class="gender">
          女性
      </p>
      @else
        <p class="gender">
          その他
        </p>
      @endif
    
      <p class="date">
          <span class="futo">登録日：</span>{{ $profile->created_at->format('Y年m月d日') }}
      </p>
    
      <p class="hobby">
          <span class="futo">趣味：</span>{{ str_limit($profile->hobby) }}
      </p>
    
      <p class="introduction">
         <span class="futo">自己紹介：</span>{{ str_limit($profile->introduction, 1500) }}
      </p>
      
      <div class="edit">
        <a href="{{ url('admin/' . $profile->id . '/profile/edit') }}" class="button"><i class="fas fa-edit"></i></a>
      </div>
    </div>
  </div>
  
  <!-- 自分のニュース一覧 -->
  <h1 id="title" class="text-center my-5 border-bottom border-dark border-2">Your News</h1>
     
  <form action="{{ route('mypage', ['id' => Auth::id()]) }}" method="post">
    
    <div class="row">
      
      <div class="col-11 col-md-7 offset-md-2">
        <input type="text" class="search" name="cond_title" value="{{ $cond_title }}" placeholder="キーワードを入力">
        
      </div>
      {{ csrf_field() }}
      
      <div class="col-1 p-0">
        <input type="submit" class="button fas fa-search fa-3x" value="&#xf002;">
      </div>
    </div>　
    
  </form>


  <table class="table table-borderless" style="width: 80%">
    <thead>
      <tr>
        <th class="col-3">タイトル</th>
        <th class="col-8">本文</th>
        <th class="col-1"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($posts as $news)
        <tr>
          <td>{{ \Str::limit($news->title, 100) }}</td>
          <td>{{ \Str::limit($news->body, 48) }}</td>
          <td>
            <div class="icons">
              <a href="{{ url('admin/' . $news->user_id . '/news/' . $news->id . '/edit') }}"><i class="fas fa-edit"></i></a>
              <a href="{{ url('admin/' . $news->user_id . '/news/' . $news->id . '/delete') }}"><i class="far fa-trash-alt"></i></a>
            </div>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  
  <div class="pagination">
    {{ $posts->links() }}
  </div>
          
</div>
@endsection