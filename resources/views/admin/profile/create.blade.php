@extends('layouts.admin')
    
@section('title', 'プロフィールの新規作成')

@section('content')
  
  <h1 id="title" class="text-center my-5 border-bottom border-dark border-2">Your Profile</h1>
  
  <form action="{{ action('Admin\ProfileController@create') }}" method="post" enctype="multipart/form-data">
    
    @if (count($errors) > 0)
    <ul>
      @foreach($errors->all() as $e)
      <li>{{ $e }}</li>
      @endforeach
    </ul>
    @endif
    
    <div class="news-form">
      <input type="text" class="input" name="input" placeholder="Your Name">
    </div>
    
    <div class="select-gender">
      <span>Your Gender:</span>
      <lavel for="male">male</lavel>
      <input class="gender male" type="radio" name="gender" value=1>
      <lavel for="female">female</lavel>
      <input class="gender female" type="radio" name="gender" value=2>
      <lavel for="custom">custom</lavel>
      <input class="gender custom" type="radio" name="gender" value=3>
    </div>
    
    <div class="news-form">
      <input type="text" class="input" name="hobby" placeholder="Your Hobby">
    </div>
    
    <div class="news-form">
      <textarea type="text" class="auto_resize" name="introduction" placeholder="Your Introduction"></textarea>
    </div>

    {{ csrf_field() }}
    <input type="submit" class="btn btn-primary" value="作成">
  </form>
      
@endsection
