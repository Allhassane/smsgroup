@extends('layouts.layout')

@section('content')



    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
                <i class="pe-7s-note2"></i>
            </div>
            <div class="header-title">
                <h1>Liste des Groupes</h1>
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
                                <h4>Liste des Groupes</h4>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table  class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Nom du Groupe</th>
                                        <th>Auteur</th>
                                        <th>status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($datas as $data)
                                        <tr class="actions" @if($data->statut == 0) style="background-color: #E5343D; color: #FFF;" @endif>
                                            <td>{{ $data->libelle }}</td>
                                            <td>{{ $data->user->name }}</td>
                                            <td>
                                                @if($data->statut == 1)
                                                    <span class="label label-success">
                                                        Actif
                                                    </span>
                                                @else
                                                    <span class="label label-default">
                                                        Inactif
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('groupe.contact', $data->id) }}" title="Tous les contacts du groupe" class="btn btn-info btn-xs"> <i class="fa fa-list"></i> </a>
                                                <a href="{{ route('delete.group', $data->id) }}" onclick="return confirm('Cette action est irréversible. supprimer ?');" title="Supprimer le groupe" class="btn btn-danger btn-xs"> <i class="fa fa-trash"></i> </a>
                                                <a href="{{ route('edit.group', $data->id) }}" title="Modifier le groupe" class="btn btn-warning btn-xs"> <i class="fa fa-edit"></i> </a>
                                                @if($data->statut == 1)
                                                    <a href="{{ route('desable.group', $data->id) }}" title="Suspendre le groupe" class="btn btn-default btn-xs"> <i class="fa fa-close"></i> </a>
                                                @else
                                                    <a href="{{ route('enable.group', $data->id) }}" title="Activer le groupe" class="btn btn-default btn-xs"> <i class="fa fa-check"></i> </a>
                                                @endif
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
