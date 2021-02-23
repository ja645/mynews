{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'ニュースの新規作成')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
  <div class="main">
    
    <h1 class="page-title">What happened?</h1>
    
    <form action="{{ action('Admin\NewsController@create') }}" method="post" enctype="multipart/form-data">
      @if (count($errors) > 0)
      <ul>
        @foreach($errors->all() as $e)
        <li>{{ $e }}</li>
        @endforeach
      </ul>
      @endif
      
      <div class="news-form">
        <input type="text" class="input" name="title" value="{{ old('title') }}" placeholder="title">
      </div>
      
      <div class="news-form">
        <textarea class="auto_resize" type="text" name="body" rows="20" placeholder="text">{{ old('body') }}</textarea>
      </div>
      
      <div id="img_upload">
        <i class="fas fa-camera fa-5x"></i>
        <input id="img_upload_form" type="file" name="image">
      </div>
      {{ csrf_field() }}
      
      <div class="btn-create">
        <input class="button" type="submit" value="Release!">
      </div>
    </form>
  </div>
@endsection