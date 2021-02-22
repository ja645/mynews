@extends('layouts.front')

@section('title', "What's New?")

@section('content')
  <div class="main">
    @if (!is_null($headline))
      <div class="top-news">
        <h1 class="top-title">{{ str_limit($headline->title, 70) }}</h1>     
        {{-- @if ($headline->image_path) --}}
          <img class="top-image" src="{{ $headline->image_path }}" onerror="this.src='images/210221_上からのねこ_NOIMAGE.png'; this.removeAttribute('onerror');" onload="this.removeAttribute('onerror'); this.removeAttribute('onload');">
        {{-- @endif --}}
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
        <div class="text">
          <p>{{ str_limit($post->body, 650) }}</p>
        </div>
        <img class="article-image" src="{{ $post->image_path }}" onerror="this.src='images/210221_上からのねこ_NOIMAGE.png'; this.removeAttribute('onerror');" onload="this.removeAttribute('onerror'); this.removeAttribute('onload');">
      </div>     
    @endforeach
  </div>
  
  <div class="pagination">
    {{ $posts->links() }}
  </div>
@endsection