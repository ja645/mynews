@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="login">
                            <div class="message">
                                ログインに成功しました！<br>まずはプロフィールを作成しましょう！
                            </div>
                            <div class="button">
                              <a href="{{ route('profile.create') }}">
                                  プロフィールを作成する
                              </a>  
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
