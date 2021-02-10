@extends('layouts.front')

@section('title', 'プロフィール一覧')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        <div class="row">
            <div class="users col-md-8 mx-auto mt-3">
                @foreach($users as $user)
                    <div class="user">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $user->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="name">
                                    {{ str_limit($user->name) }}
                                </div>
                                @if ($user->gender == 1)
                                <div class="gender mt-3">
                                    男性
                                </div>
                                @elseif ($user->gender == 2)
                                 <div class="gender mt-3">
                                    女性
                                </div>
                                @else
                                 <div class="gender mt-3">
                                    その他
                            　  </div>
                                @endif
                                <div class="hobby mt-3">
                                    趣味：{{ str_limit($user->hobby) }}
                                </div>
                                <div class="introduction mt-3">
                                   自己紹介： {{ str_limit($user->introduction, 1500) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
@endsection