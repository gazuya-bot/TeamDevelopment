@extends('layouts.app')

@section('content')

<div class="login-box">
<!-- <div class="container"> -->
    <!-- <div class="row justify-content-center"> -->
        <!-- <div class="col-md-8"> -->
            <div class="login-logo">
                <img src="{{asset('img/MOT_01.gif')}}" alt="ロゴ">
                <p><b>会員登録</b></p>
            </div>

            <div class="card">
                <!-- <div class="card-header">{{ __('会員登録') }}</div> -->

                <div class="card-body login-card-body">

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- 名前 -->
                        <div class="input-group mb-3">
                            <!-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('名前') }}</label> -->
                            <!-- <div class="col-md-8"> -->
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="名前を入力">
                                
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span class="fas fa-smile"></span>
                                    </div>
                                </div>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <!-- </div> -->
                        </div>

                        <!-- メールアドレス -->
                        <div class="input-group mb-3">
                            <!-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label> -->

                            <!-- <div class="col-md-8"> -->
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="メールアドレスを入力">

                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                    </div>
                                </div>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <!-- </div> -->
                        </div>

                        <!-- パスワード -->
                        <div class="input-group mb-3">
                            <!-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label> -->

                            <!-- <div class="col-md-8"> -->
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="パスワードを入力">

                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                    </div>
                                </div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <!-- </div> -->
                        </div>

                        <!-- パスワード（確認用） -->
                        <div class="input-group mb-3">
                            <!-- <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('パスワード（確認用）') }}</label> -->

                            <!-- <div class="col-md-8"> -->
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="パスワードを入力（確認用）">
                            <!-- </div> -->
                            
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- 登録ボタン -->
                        <div class="row signup-btn">
                            <div class="col-12">
                                <button type="submit" class="btn btn-outline-primary btn-block">
                                    {{ __('登録') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <!-- </div> -->
    <!-- </div> -->
<!-- </div> -->
@endsection
