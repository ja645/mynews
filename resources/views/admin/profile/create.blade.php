@extends('layouts.admin')
    
@section('title', 'プロフィールの新規作成')

@section('content')
  <div class="main">
    
        <h2>Myプロフィール</h2>
        <form action="{{ action('Admin\ProfileController@create') }}" method="post" enctype="multipart/form-data">
          @if (count($errors) > 0)
          <ul>
            @foreach($errors->all() as $e)
            <li>{{ $e }}</li>
            @endforeach
          </ul>
          @endif
          <div class="profile-form">
            <label class="profile">氏名</label>
            
              <input type="text" class="form-control" name="name" value="{{ old('title') }}">
       
          </div>
          <div class="profile-form">
            <label class="profile">性別</label>
         
              <input type="text" class="form-control" name="gender" value="{{ old('gender') }}">
         
          </div>
          <div class="profile-form">
            <label class="profile">趣味</label>
   
              <input type="text" class="form-control" name="hobby" value="{{ old('hobby') }}">
          
          </div>
          <div class="profile-form">
            <label class="profile">自己紹介</label>
           
              <textarea type="text" class="form-control" name="introduction" rows="20">{{ old('introduction') }}</textarea>
          
          </div>
          {{ csrf_field() }}
          <input type="submit" class="btn btn-primary" value="作成">
        </form>
      
  </div>
@endsection
