@extends('layouts.layout')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
                <i class="pe-7s-note2"></i>
            </div>
            <div class="header-title">
                <h1>Modifier un Groupe de Contact</h1>
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
                                <h4>Modifier un Groupe</h4>
                            </div>
                        </div>
                        <div class="panel-body" style="padding: 2em;">

                            {!! Form::open(array('route' => ['update.group', $data->id])) !!}

                            <div class="form-group">
                                {!! Form::text('libelle', $data->libelle, ['class' => 'form-control', 'required', 'placeholder' => 'Nom du groupe']) !!}
                            </div>

                            <div class="row">
                                <div class="col-sm-offset-4 col-sm-4">
                                    {!! Form::submit('Modifier le Groupe', ['class' => 'btn btn-primary btn-block']) !!}
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
