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
    
    <div class="row mx-auto" style="width: 75%;">
      <div id="gender-select" class="form-check col-12 col-sm-3 mx-auto my-5">
        <input type="radio" class="btn-check" name="gender" id="male" value=1>
        <label class="gender-label btn btn-outline-primary" style="width: 100%; font-size: 2.0rem;" for="male">Male</label>
      </div>
      <div id="gender-select" class="form-check col-12 col-sm-3 mx-auto my-5">
        <input type="radio" class="btn-check" name="gender" id="female" value=2>
        <label class="gender-label btn btn-outline-primary"style="width: 100%; font-size: 2rem;" for="female">Female</label>
      </div>
      <div id="gender-select" class="form-check col-12 col-sm-3 mx-auto my-5">
        <input type="radio" class="btn-check" name="gender" id="custom" value=3>
        <label class="gender-label btn btn-outline-primary" style="width: 100%; font-size: 2rem;" for="custom">Custom</label>
      </div>
    </div>
    
    <div class="news-form">
      <input type="text" class="input" name="hobby" placeholder="Your Hobby">
    </div>
    
    <div class="news-form">
      <textarea type="text" class="auto_resize" name="introduction" placeholder="Your Introduction"></textarea>
    </div>

    {{ csrf_field() }}
    <div class="mx-auto" style="width: 85.66px;">
      <input type="submit" class="btn btn-outline-success" style="font-size: 2.4rem;" value="Create">
    </div>
  </form>
      
@endsection
