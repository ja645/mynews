@extends('layouts.admin')
@section('title', 'ニュースの編集')

@section('content')
  <div class="main">
    
    <h1>ニュース編集</h1>
    
    <form action="{{ action('Admin\NewsController@update') }}" method="post" enctype="multipart/form-data">
      
      <div class="news-form">
        <input type="text" class="news-title" name="title" value="{{ $news_form->title }}" placeholder="title">
      </div>
      
      <div class="news-form">
        <textarea class="auto_resize" type="text" name="body" rows="20" placeholder="text">{{ $news_form->body }}</textarea>
      </div>
      
      <div id="img_upload">
        <i class="fas fa-camera fa-5x"></i>
        <input id="img_upload_form" type="file" name="image">
        <div class="form-text text-info">設定中: {{ $news_form->image_path }}</div>
      </div>
      
      <div class="form-check">
        <label class="form-check-label">
          <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
        </label>
      </div>
        
      <input type="hidden" name="id" value="{{ $news_form->id }}">
      {{ csrf_field() }}
      
      <div class="btn-create">
        <input type="submit" value="Release!">
      </div>
    </form>
         
    <h2>編集履歴</h2>
    <ul class="list-group">
      @if ($news_form->histories != NULL)
        @foreach ($news_form->histories as $history)
          @if ($history->news_id != 0)
            <li class="list-group-item">{{ $history->edited_at }}</li>
          @endif
        @endforeach
      @endif
    </ul>
    
  </div>
@endsection