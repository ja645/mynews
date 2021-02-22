@extends('layouts.admin')
    
@section('title', 'マイページ')

@section('content')
<div class="main">
  <!-- フラッシュメッセージ -->
    @if (session('flash_message'))
        <div class="flash_message">
            {{ session('flash_message') }}
        </div>
    @endif

  
  <div class="user-information">
    <div class="my-img">
      <img src="" alt="">
    </div>
    
    <div class="my-name">
      {{ $profile->name }}
    </div>
  
    @if ($profile->gender == 1)
    <div class="gender">
        男性
    </div>
    @elseif ($profile->gender == 2)
     <div class="gender">
        女性
    </div>
    @else
     <div class="gender">
        その他
    　  </div>
    @endif
  
    <div class="date">
        <span class="futo">登録日：</span>{{ $profile->created_at->format('Y年m月d日') }}
    </div>
  
    <div class="hobby">
        <span class="futo">趣味：</span>{{ str_limit($profile->hobby) }}
    </div>
  
    <div class="introduction">
       <span class="futo">自己紹介：</span>{{ str_limit($profile->introduction, 1500) }}
    </div>
    
    <div class="edit">
      <a href="{{ url('admin/' . $profile->id . '/profile/edit') }}" class="btn btn-primary">編集</a>
    </div>
  </div>
  
  <div class="clear-fix"></div>
  
  <h2>MyNews</h2>
     
        <form action="{{ route('mypage', ['id' => Auth::id()]) }}" method="post">
          <div class="search">
          <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}" placeholder="キーワードを入力">
          {{ csrf_field() }}
         
            <input type="submit" class="btn btn-primary" value="検索">
          </div>
        </form>
     
    
          <table class="news-table">
            <thead>
              <tr>
                <th width="10%">ID</th>
                <th width="20%">タイトル</th>
                <th width="50%">本文</th>
              </tr>
            </thead>
            <tbody>
              @foreach($posts as $news)
                <tr>
                  <th>{{ $news->id }}</th>
                  <td>{{ \Str::limit($news->title, 100) }}</td>
                  <td>{{ \Str::limit($news->body, 250) }}
                    <div>
                      <a href="{{ url('admin/' . $news->user_id . '/news/' . $news->id . '/edit') }}">編集</a>
                    </div>
                    <div>
                      <a href="{{ url('admin/' . $news->user_id . '/news/' . $news->id . '/delete') }}">削除</a>
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