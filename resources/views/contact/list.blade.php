@extends('layouts.layout')

@section('content')



    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
                <i class="pe-7s-note2"></i>
            </div>
            <div class="header-title">
                <h1>Liste des Contacts</h1>
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
                                <h4>Liste des Contacts</h4>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table  class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Nom du contact</th>
                                        <th>Téléphone</th>
                                        <th>Groupe</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($datas as $data)
                                        <tr class="actions">
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->mobile }}</td>
                                            <td>
                                                @foreach($data->groupes as $group)
                                                    {{ $group->libelle }} <br>
                                                @endforeach
                                            </td>
                                            <td class="text-center">

                                                <!-- Modal -->
                                                <div class="modal fade" id="myModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <h3 class="modal-title" id="myModalLabel">Ajouter <strong>{{ $data->name }}</strong> à un groupe</h3>
                                                                <div class="text-center">
                                                                    <span class="text-danger">Attention ! ne pas ajouter le numéro deux fois le même groupe</span>
                                                                </div>
                                                            </div>
                                                            <div class="modal-body">
                                                                <table class="table table-responsive table-hover">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>
                                                                            Non du groupe
                                                                        </th>
                                                                        <th class="text-center">
                                                                            Action
                                                                        </th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    {!! Form::open(['route' => ['choose.contact.group', $data->id]]) !!}
                                                                    @foreach($groups as $group)
                                                                        <tr>
                                                                            <td class="text-left">{{ $group->libelle }}</td>
                                                                            <td class="text-center">
                                                                                <input type="checkbox" name="groupe_id[]" value="{{ $group->id }}">
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach

                                                                    </tbody>
                                                                </table>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler <i class="fa fa-close"></i></button>
                                                                    <button type="submit" class="btn btn-success">Ajouter <i class="fa fa-check"></i></button>
                                                                </div>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal{{ $data->id }}"><i class="fa fa-plus"></i></button>
                                                <a href="{{ route('delete.contact', $data->id) }}" onclick="return confirm('Cette action est irréversible. supprimer ?');" title="Supprimer le groupe" class="btn btn-danger btn-xs"> <i class="fa fa-trash"></i> </a>
                                                <a href="{{ route('edit.contact', $data->id) }}" title="Modifier le contact" class="btn btn-warning btn-xs"> <i class="fa fa-edit"></i> </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Checkboxes & Radios -->
        </section> <!-- /.content -->
    </div> <!-- /.content-wrapper -->

@endsection
