@extends('layouts.front')

@section('title', 'プロフィール一覧')

@section('page-title', 'プロフィール一覧')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        <div class="row">
            <div class="users col-md-8 mx-auto mt-3">
                @foreach($users as $user)
                    <div class="user">
                        <div class="column-left">
                            <div class="name">
                                {{ str_limit($user->name) }}
                            </div>
                            @if ($user->gender == 1)
                            <div class="gender">
                                男性
                            </div>
                            @elseif ($user->gender == 2)
                             <div class="gender">
                                女性
                            </div>
                            @else
                             <div class="gender">
                                その他
                        　  </div>
                            @endif
                            <div class="date">
                                登録日：{{ $user->updated_at->format('Y年m月d日') }}
                            </div>
                            <div class="hobby">
                                <span class="user-item">趣味：</span>{{ str_limit($user->hobby) }}
                            </div>
                        </div>
                        <div class="column-right">
                            <div class="introduction">
                               <p class="user-item">自己紹介：</p>{{ str_limit($user->introduction, 1500) }}
                            </div>
                        </div>
                        <section class="clearfix"></section>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
@endsection