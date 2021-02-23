@extends('layouts.admin')
    
@section('title', 'プロフィールの新規作成')

@section('content')
  <div class="main" id="profile">
    
    <h1 class="page-title">Your Profile</h1>
    
    <form action="{{ action('Admin\ProfileController@create') }}" method="post" enctype="multipart/form-data">
      
      @if (count($errors) > 0)
      <ul>
        @foreach($errors->all() as $e)
        <li>{{ $e }}</li>
        @endforeach
      </ul>
      @endif
      
      
        
          <input type="text" class="" name="input" placeholder="Your Name" value="{{ old('title') }}">
   
      
          <lavel for="male">male</lavel>
          <input class="gender male" type="radio" name="gender" value=1 @if({{ old('gender') }} == 1) checked="checked" @endif>
          <lavel for="female">female</lavel>
          <input class="gender female" type="radio" name="gender" value=2 @if({{ old('gender') }} == 2) checked="checked" @endif>
          <lavel for="custom">custom</lavel>
          <input class="gender custom" type="radio" name="gender" value=3 @if({{ old('gender') }} == 3) checked="checked" @endif>
     
     
          <input type="text" class="input" name="hobby" value="{{ old('hobby') }}">
      
      
          <textarea type="text" class="auto_resize" name="introduction" rows="20">{{ old('introduction') }}</textarea>
      
      </div>
      {{ csrf_field() }}
      <input type="submit" class="btn btn-primary" value="作成">
    </form>
      
  </div>
@endsection
