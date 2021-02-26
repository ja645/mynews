@extends('layouts.front')

@section('title', "What's New?")

@section('content')
  
  @if (!is_null($headline))
    <h1 class="text-center my-5 border-bottom border-dark border-3">{{ str_limit($headline->title, 70) }}</h1>   
    <div class="row pb-5 border-bottom border-dark border-2">
      <div class="col-md-6">
        <img class="image" style="max-width: 100%; display: block;" src="{{ $headline->image_path }}" onerror="this.src='images/210221_上からのねこ_NOIMAGE.png'; this.removeAttribute('onerror');" onload="this.removeAttribute('onerror'); this.removeAttribute('onload');">
      </div>
      <div class="col-md-6">
        <p>{{ str_limit($headline->body, 650) }}</p>
      </div>
    </div>
  @endif
    
      
  @foreach($posts as $post)
    <div class="row py-5 border-bottom border-dark border-2">
      <div class="col-md-3">
        <h1 class="">{{ str_limit($post->title, 150) }}</h1>
        <div class="date"><p>{{ $post->updated_at->format('Y年m月d日') }}</p></div>
      </div>
      <div class="col-md-5">
        <p>{{ str_limit($post->body, 650) }}</p>
      </div>
      <div class="col-md-4">
        <img class="image" style="max-width: 100%; display: block;" src="{{ $post->image_path }}" onerror="this.src='images/210221_上からのねこ_NOIMAGE.png'; this.removeAttribute('onerror');" onload="this.removeAttribute('onerror'); this.removeAttribute('onload');">
      </div>
    </div>     
  @endforeach
  
  <div class="pagination">
    {{ $posts->links() }}
  </div>
@endsection