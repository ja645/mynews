@extends('layouts.admin')
@section('title', 'プロフィールの編集')

@section('content')
  
    <h1 id="title" class="text-center my-5 border-bottom border-dark border-2">Edit Your Profile</h1>
        
    <form action="{{ action('Admin\ProfileController@update') }}" method="post" enctype="multipart/form-data">
      @if (count($errors) > 0)
      <ul>
        @foreach($errors->all() as $e)
        <li>{{ $e }}</li>
        @endforeach
      </ul>
      @endif
        
      <div class="news-form">
        <input type="text" class="input" name="name" value="{{ $profile_form->name }}">
      </div>

      <div class="select-gender">
        <span>Your Gender:</span>
        <lavel for="male">male</lavel>
        <input class="gender male" type="radio" name="gender" value=1 @if($profile_form->gender == 1) checked="checked" @endif>
        <lavel for="female">female</lavel>
        <input class="gender female" type="radio" name="gender" value=2 @if($profile_form->gender == 2) checked="checked" @endif>
        <lavel for="custom">custom</lavel>
        <input class="gender custom" type="radio" name="gender" value=3 @if($profile_form->gender == 3) checked="checked" @endif>
      </div>
      
      <div class="news-form">
        <input type="text" class="input" name="hobby" value="{{ $profile_form->hobby }}">
      </div>
       
      <div class="news-form">
        <textarea type="text" class="auto_resize" name="introduction" rows="20">{{ $profile_form->introduction }}</textarea>
      </div>
         
      <input type="hidden" name="id" value="{{ $profile_form->id }}">
      {{ csrf_field() }}
      <input type="submit" class="button" value="更新">
       
    </form>
  
    <h1 id="title" class="text-center my-5 border-bottom border-dark border-2">編集履歴</h1>
    <ul class="list-group">
      @if ($profile_form->histories != NULL)
        @foreach ($profile_form->histories as $history)
          @if ($history->profile_id != 0)
            <li class="list-group-item">{{ $history->edited_at }}</li>
          @endif
        @endforeach
      @endif
    </ul>

@endsection