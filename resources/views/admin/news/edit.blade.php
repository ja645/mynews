@extends('layouts.admin')
@section('title', 'ニュースの編集')

@section('content')
  
  <h1 id="title" class="text-center my-5 border-bottom border-dark border-2">Edit Your News</h1>
  
  <form action="{{ action('Admin\NewsController@update') }}" method="post" enctype="multipart/form-data">
    
    <div class="news-form">
      <input type="text" class="input" name="title" value="{{ $news_form->title }}" placeholder="title">
    </div>
    
    <div class="news-form">
      <textarea class="auto_resize" type="text" name="body" rows="20" placeholder="text">{{ $news_form->body }}</textarea>
    </div>
    
    <div id="img_upload">
      <!-- 画像が設定されていればアイコンを赤くする -->
      @if ($news_form->image_path)
        <i class="fas fa-camera fa-7x" style="color: red;"></i>
        <input id="img_upload_form" type="file" name="image">
      @else
        <i class="fas fa-camera fa-7x"></i>
        <input id="img_upload_form" type="file" name="image">
      @endif
    </div>
    
    <div class="form-check">
      <label class="form-check-label">
        <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
      </label>
    </div>
      
    <input type="hidden" name="id" value="{{ $news_form->id }}">
    {{ csrf_field() }}
    
    <div class="btn-create">
      <input class="button" type="submit" value="Release!">
    </div>
  </form>
       
  <h1 id="title" class="text-center my-5 border-bottom border-dark border-2">編集履歴</h1>
  <ul class="list-group">
    @if ($news_form->histories != NULL)
      @foreach ($news_form->histories as $history)
        @if ($history->news_id != 0)
          <li class="list-group-item">{{ $history->edited_at }}</li>
        @endif
      @endforeach
    @endif
  </ul>
    
@endsection