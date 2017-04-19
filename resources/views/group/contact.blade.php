@extends('layouts.layout')

@section('content')



    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon">
                <i class="pe-7s-note2"></i>
            </div>
            <div class="header-title">
                <h1>Liste des Contacts du Groupe <strong>{{ $group->libelle }}</strong></h1>
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

                <!-- Modal -->
                <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title" id="myModalLabel">Ajouter des contacts à votre groupe <strong>{{ $group->libelle }}</strong></h3>
                                <div class="text-center">
                                    <span class="text-danger">Attention ! ne pas ajouter deux fois le même numéro</span>
                                </div>
                            </div>
                            <table class="table table-responsive table-hover">
                                <thead>
                                <tr>
                                    <th>
                                        nom & prénom(s)
                                    </th>
                                    <th>
                                        Téléphone
                                    </th>
                                    <th>
                                        tous les groupes
                                    </th>
                                    <th class="text-center">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                {!! Form::open(['route' => ['add.contact.in.group', $group->id]]) !!}
                                @foreach($contacts as $contact)
                                    <tr>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->mobile }}</td>
                                        <td>
                                            @foreach($contact->groupes as $groupe)
                                                {{ $groupe->libelle }} <br>
                                            @endforeach

                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" name="contact_id[]" value="{{ $contact->id }}">
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
                <!-- modal -->

                <div class="col-sm-12">
                    <div class="panel panel-bd">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-8">
                                    <div class="panel-title">
                                        <h4>Tous les contacts du groupe <strong>{{ $group->libelle }}</strong></h4>
                                    </div>
                                </div>
                                <div class="col-xs-4 text-right">
                                    <button type="button" data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-success btn-xs" title="Ajouter des contacts"><i class="fa fa-plus"></i><span class="control-title"></span></button>
                                </div>
                            </div>

                        </div>
                        <div class="panel-body">
                            @if(count($datas) > 0)
                                <div class="table-responsive">
                                    <table  class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Nom & Prénom(s)</th>
                                            <th>Téléphone</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($datas as $data)
                                            <tr class="actions">
                                                <td>{{ $data->name }}</td>
                                                <td>{{ $data->mobile }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('delete.contact.group', ['contact_id' => $data->contact_id, 'groupe_id' => $data->groupe_id]) }}" onclick="return confirm('Cette action est irréversible. Supprimer ?');" title="Supprimer {{ $data->name }} du groupe" class="btn btn-danger btn-xs"> <i class="fa fa-trash"></i> </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else

                                <div style="width:75%;margin-left:auto;margin-right:auto;text-align:center;background:#e3e3e3;padding:20px;border-radius:8px">

                                    <div style="width:100px;height:100px;margin-left:auto;margin-right:auto;text-align:center; ">
                                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 470.333 470.333" style="enable-background:new 0 0 470.333 470.333;" xml:space="preserve">
                                <g>
                                    <g>
                                        <path d="M235.167,470.333c129.767,0,235.167-105.4,235.167-235.167S364.933,0,235.167,0S0,105.4,0,235.167
                                            S105.4,470.333,235.167,470.333z M235.167,34c110.783,0,201.167,90.383,201.167,201.167S345.95,436.333,235.167,436.333
                                            S34,345.95,34,235.167S124.383,34,235.167,34z"></path>
                                        <path d="M164.333,196.633c7.083,0,13.883-2.833,18.983-7.933c10.483-10.483,10.483-27.483,0-37.967
                                            c-5.1-5.1-11.9-7.933-18.983-7.933s-13.883,2.833-18.983,7.933c-10.483,10.483-10.483,27.483,0,37.967
                                            C150.45,193.8,157.25,196.633,164.333,196.633z"></path>
                                        <path d="M299.2,196.633c7.083,0,13.883-2.833,18.983-7.933c10.483-10.483,10.483-27.483,0-37.967
                                            c-5.1-5.1-11.9-7.933-18.983-7.933s-13.883,2.833-18.983,7.933c-10.483,10.483-10.483,27.483,0,37.967
                                            C285.317,193.8,291.833,196.633,299.2,196.633z"></path>
                                        <path d="M157.25,328.667c0.567-1.7,11.617-38.25,73.667-38.25c64.033,0,82.167,38.817,82.733,40.233
                                            c2.833,6.517,9.067,10.483,15.583,10.483c2.267,0,4.25-0.283,6.517-1.417c8.783-3.683,12.75-13.6,9.067-22.1
                                            c-1.133-2.55-26.35-61.2-114.183-61.2c-89.533,0-105.967,61.2-106.533,63.75l16.433,4.25L157.25,328.667z"></path>
                                    </g>
                                </g><g></g><g></g><g></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
                            </svg>
                                    </div>

                                    <p>&nbsp;</p><h4 align="center" style="color: red;">Aucun contact disponible :(</h4>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
            <!-- Checkboxes & Radios -->
        </section> <!-- /.content -->
    </div> <!-- /.content-wrapper -->

@endsection
