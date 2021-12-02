@extends('layouts.app')

@section('content')
<!-- <div class="container"> -->
    <!-- <div class="row justify-content-center"> -->
    <div class="login-box">

        <div class="login-logo">
            <img src="{{asset('img/MOT_01.gif')}}" alt="ロゴ">
            <p><b>ログイン</b></p>
        </div>

        <div class="card">
            <div class="card-body login-card-body">
                <!-- <p class="login-box-msg">Sign in to start your session</p> -->

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- メールアドレス入力 -->
                    <div class="input-group mb-3">
                        <!-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> -->
                        <!-- <div class="col-md-6"> -->
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="メールアドレス" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            
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

                    <!-- パスワード入力 -->
                    <div class="input-group mb-3">
                        <!-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> -->
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="パスワード" name="password" required autocomplete="current-password">
                        
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
                    </div>

                    <!--  -->
                    <div class="form-group row">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('ログイン状態を維持する') }}
                            </label>
                        </div>
                    </div>

                    <!-- ログインボタン -->
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-outline-primary btn-block">{{ __('ログイン') }}</button>
                        </div>

                        <!-- パスワード忘れ -->
                        <!-- <div class="col-12 form-check re-p">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('パスワードを忘れた方はこちら！') }}
                                </a>
                            @endif
                        </div> -->

                        <!-- 会員登録 -->
                        <div class="col-12 form-check login-back">
                            @guest
                                @if (Route::has('register'))
                                        <a class="nav-link new_member" href="{{ route('register') }}">{{ __('会員登録はこちら!') }}</a>
                                @endif
                            @else
                                <!-- <li class="nav-item dropdown" style="list-style: none;> -->
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('home') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                <!-- </li> -->
                            @endguest
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
