@extends('layouts.layout')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
                <i class="pe-7s-note2"></i>
            </div>
            <div class="header-title">
                <h1>Créer un utilisateur</h1>
                <small>Tabs styles and versions</small>
                <ol class="breadcrumb">
                    <li><a href="index.html"><i class="pe-7s-home"></i> Home</a></li>
                    <li><a href="forms_basic.html#">Forms</a></li>
                    <li class="active">Basic Form</li>
                </ol>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- Form controls -->
                <div class="col-sm-offset-2 col-sm-8">
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4>Créer un utilisateur</h4>
                            </div>
                        </div>
                        <div class="panel-body" style="padding: 2em;">
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('update.user', $data->id) }}">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="">Nom & Prénom(s)</label>

                                    <input id="name" type="text" class="form-control" name="name" value="{{ $data->name }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <small id="emailHelp" class="text-muted oblig"><strong>{{ $errors->first('name') }}</strong></small>
                                    @endif

                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group" style="padding-right: .2em;">
                                            <label for="name">Numero de téléphone</label>

                                            <input id="name" type="number" class="form-control" name="mobile" value="{{ $data->mobile }}" required>

                                            @if ($errors->has('mobile'))
                                                <small id="emailHelp" class="text-muted oblig"><strong>{{ $errors->first('mobile') }}</strong></small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Adresse Email</label>


                                            <input id="email" type="email" class="form-control" name="email" value="{{ $data->email }}" required>

                                            @if ($errors->has('email'))
                                                <small id="emailHelp" class="text-muted oblig"><strong>{{ $errors->first('email') }}</strong></small>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group" style="padding-right: .2em;">
                                            <label for="email">Identifiant d'envoi</label>

                                            <input id="" type="text" class="form-control" name="sender_id" value="{{ $data->sender_id }}" required>

                                            @if ($errors->has('sender_id'))
                                                <small id="emailHelp" class="text-muted oblig"><strong>{{ $errors->first('sender_id') }}</strong></small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Categorie de l'utilisateur</label>

                                            <select name="categorie_id" id="" class="form-control" required>
                                                @foreach($cats as $cat)
                                                    <option value="{{ $cat->id }}">{{ $cat->libelle }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('categorie_id'))
                                                <small id="emailHelp" class="text-muted oblig"><strong>{{ $errors->first('categorie_id') }}</strong></small>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Modifier les information de l'utilisateur</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Checkboxes & Radios -->
        </section> <!-- /.content -->
    </div> <!-- /.content-wrapper -->

{{--

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Mobile</label>

                            <div class="col-md-6">
                                <input id="name" type="number" class="form-control" name="mobile" value="{{ old('mobile') }}" required>

                                @if ($errors->has('mobile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('sender_id') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Identifiant d'envoi</label>

                            <div class="col-md-6">
                                <input id="" type="text" class="form-control" name="sender_id" value="{{ old('sender_id') }}" required>

                                @if ($errors->has('sender_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sender_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('categorie_id') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Categorie de l'utilisateur</label>

                            <div class="col-md-6">
                                <select name="categorie_id" id="" class="form-control">
                                    <option value="">Choisir une categorie</option>
                                    @foreach($datas as $data)
                                        <option value="{{ $data->id }}">{{ $data->libelle }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('categorie_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('categorie_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
--}}
@endsection
