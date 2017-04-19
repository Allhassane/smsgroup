@extends('layouts.layout')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
                <i class="pe-7s-note2"></i>
            </div>
            <div class="header-title">
                <h1>Créer un Contact</h1>
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
                <div class="row">
                    <div class="col-sm-12">
                        @include('partials.flash')
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4>Créer un Contact</h4>
                            </div>
                        </div>
                        <div class="panel-body" style="padding: 2em;">

                            {!! Form::open(array('route' => 'create.contact')) !!}

                            <div class="row">
                                <div class="col-sm-6" style="padding-right: .2em;">
                                    <div class="form-group">
                                        <label for="">Nom & Prénom(s)</label>
                                        {!! Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nom du contact']) !!}
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Téléphone</label>
                                        {!! Form::text('mobile', null, ['class' => 'form-control', 'required', 'placeholder' => '225 49212546']) !!}
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="">Associer le contact à un groupe</label>
                                        <select name="groupe_id" id="" class="form-control" required>
                                            <option value="" selected>Choisir un groupe</option>
                                            @foreach($datas as $data)
                                                <option value="{{ $data->id }}">{{ $data->libelle }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-offset-4 col-sm-4">
                                    {!! Form::submit('Créer un Conatct', ['class' => 'btn btn-primary btn-block']) !!}
                                </div>
                            </div>

                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
            <!-- Checkboxes & Radios -->
        </section> <!-- /.content -->
    </div> <!-- /.content-wrapper -->

@endsection
