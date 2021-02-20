{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')

{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'ニュースの新規作成')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
  <div class="main">
    
        <h2 class="create-title">New Create</h2>
        <form action="{{ action('Admin\NewsController@create') }}" method="post" enctype="multipart/form-data">
          @if (count($errors) > 0)
          <ul>
            @foreach($errors->all() as $e)
            <li>{{ $e }}</li>
            @endforeach
          </ul>
          @endif
          
          <div class="news-form">
            <input type="text" class="news-title" name="title" value="{{ old('title') }}" placeholder="title">
          </div>
          
          <div class="news-form">
            <textarea type="text" name="body" rows="20" class="auto-resize" placeholder="text">{{ old('body') }}</textarea>
          </div>
          
          <div class="news-form">
            <label class="news">画像</label>
            <input　type="file" class="form-control-file" name="image">
          </div>
          {{ csrf_field() }}
          <input type="submit" class="btn btn-primary" value="更新">
        </form>
  </div>
@endsection