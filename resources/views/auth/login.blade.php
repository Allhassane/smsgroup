@extends('layouts.auth')

@section('content')

    <div class="login-wrapper" style="margin-top: -4em;">
        <div class="container-center">
            <div class="panel panel-bd">
                <div class="panel-heading">
                    <div class="view-header">
                        <div class="header-icon">
                            <i class="pe-7s-unlock"></i>
                        </div>
                        <div class="header-title">
                            <h3>Connexion</h3>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="panel-body" style="padding: 2em;">
                    <form class="form-horizontal" id="loginForm" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label" for="username">E-mail</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block small oblig">{{ $errors->first('email') }}</span>
                            @endif

                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password">Mot de Passe</label>
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block small oblig">{{ $errors->first('password') }}</span>
                            @endif

                        </div>
                        <div class="form-group">
                            <div class="">
                                <label>
                                    <input type="checkbox" name="remember"> Se souvenir de moi
                                </label>
                            </div>
                        </div>

                        <div>
                            <button class="btn btn-primary btn-block">Connexion</button>
                            <br>
                            <a href="{{ url('/password/reset') }}" class="">Mot de passe oublié ?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
