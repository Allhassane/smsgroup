@extends('layouts.layout')

@section('content')



    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
                <i class="pe-7s-note2"></i>
            </div>
            <div class="header-title">
                <h1>Liste des utilisateurs</h1>
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
                                <h4>Liste des utilisateurs</h4>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table  class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Nom & Prénom(s)</th>
                                        <th>Téléphone</th>
                                        <th>Email</th>
                                        <th>Categorie</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($datas as $data)
                                        <tr class="actions" @if($data->statut == 0) style="background-color: #E5343D; color: #FFF;" @endif>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->mobile }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>
                                                <span class="label label-info">
                                                    @if($data->categorie_id == 1)
                                                        Administrateur
                                                    @else
                                                        Utilisateur
                                                    @endif
                                                </span>
                                            </td>
                                            <td>
                                                @if($data->categorie_id != 1)
                                                    <a href="{{ route('add.admin', $data->id) }}" title="Ajouter comme Administrateur" class="btn btn-primary btn-xs"> <i class="fa fa-star-o"></i> </a>
                                                @else
                                                    <a href="{{ route('delete.admin', $data->id) }}" title="Supprimer comme Administrateur" class="btn btn-primary btn-xs"> <i class="fa fa-star"></i> </a>
                                                @endif
                                                <a href="{{ route('delete.user', $data->id) }}" onclick="return confirm('Cette action est irréversible. supprimer ?');" title="Supprimer l'utilisateur" class="btn btn-danger btn-xs"> <i class="fa fa-trash"></i> </a>
                                                <a href="{{ route('edit.user', $data->id) }}" title="Modifier l'utilisateur" class="btn btn-warning btn-xs"> <i class="fa fa-edit"></i> </a>
                                                @if($data->statut == 1)
                                                    <a href="{{ route('desable.user', $data->id) }}" title="Suspendre l'utilisateur" class="btn btn-default btn-xs"> <i class="fa fa-close"></i> </a>
                                                @else
                                                    <a href="{{ route('enable.user', $data->id) }}" title="Activer l'utilisateur" class="btn btn-default btn-xs"> <i class="fa fa-check"></i> </a>
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
