@extends('layouts.front')

@section('title', 'ニュース一覧')

@section('content')
  <div class="main">
    @if (!is_null($headline))
      <div class="top-news">
        <h1 class="top-title">{{ str_limit($headline->title, 70) }}</h1>     
        @if ($headline->image_path)
          <img class="top-image" src="{{ $headline->image_path }}">
        @else
          <img class="top-image" src="../public/storage/image/1795760_l.jpg">
        @endif
        <div class="top-text">
          <p>{{ str_limit($headline->body, 650) }}</p>
        </div>
      </div>
    @endif
      
        
    @foreach($posts as $post)
      <div class="post">
        <div class="title-date">
          <h2 class="title">{{ str_limit($post->title, 150) }}</h2>
          <div class="date">{{ $post->updated_at->format('Y年m月d日') }}</div>
        </div>
        @if ($post->image_path)
          <img class="article-image" src="{{ $post->image_path }}">
        @else
          <img class="article-image" src="../public/storage/image/1795760_l.jpg">
        @endif
      </div>     
    @endforeach
  </div>
@endsection