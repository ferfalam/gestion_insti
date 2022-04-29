@extends('gestion_conseil_pedagogique.layouts.template')
@section('content')
    @if ($conseil != null)
        <div class="card shadow">
            <div class="card-header py-3">
                <p class="text-primary m-0 font-weight-bold">les invités du conseil</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 text-nowrap">

                    </div>
                    <div class="col-md-6">
                        <form action="{{ route('gestion_conseil_pedagogique.add_guest') }}" enctype="multipart/form-data"
                            method="post">
                            @csrf

                            <div class="text-md-right dataTables_filter" id="dataTable_filter">
                                <span class="btn-sm btn-primary fileinput-button mr-1 ">
                                    <i class="fa fa-plus"></i>
                                    <span>ficher</span>
                                    <input type="file" name="fichier">
                                </span>

                                <label><input type="search" name="num_mat"
                                        class="form-control @error('num_mat') is-invalid @enderror form-control-sm"
                                        aria-controls="dataTable" placeholder="Search"></label>
                                <button class="btn btn-primary" type="submit"
                                    style="padding-top: 2px;padding-bottom: 2px;">Inviter</button>

                                @if ($errors->has('fichier'))
                                    <div class="invalid-feedback is-invalid"> {{ $errors->first('fichier') }}</div>
                                @endif


                            </div>

                        </form>

                    </div>
                </div>
                <div class="table-responsive table mt-2 overflow-auto" id="dataTable" role="grid"
                    aria-describedby="dataTable_info">
                    <table class="table dataTable my-0" id="dataTable">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Matricule</th>
                                <th>Nom et prénom(s)</th>

                                <th>Fonction</th>
                                <th>Fichier</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($guests as $guest)
                                <tr>
                                    <td> <img class="rounded-circle mr-2" width="30" height="30"
                                            src="{{ asset('assets/img/avatars/avatar1.jpeg') }}"></td>
                                    <td>{{ $guest->regist_num }}</td>
                                    <td>{{ $guest->fullname." ".$guest->firstname}}</td>
                                    <td>{{ $guest->user_groups_name }}</td>
                                    <td><a class="bg-success icon-circle" href="{{ Storage::url($guest->fichier) }}"><i
                                                class="fas fa-file-alt text-white"></i></a></td>
                                    <td>
                                        <form action="{{ route('gestion_conseil_pedagogique.del_guest') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$guest->invit_id }}">
                                            <button class="btn btn-info btn-sm" type="submit">Retirer</button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <td><strong>Photo</strong></td>
                                <td><strong>Matricule</strong></td>
                                <td><strong>Nom et prénom(s)</strong></td>
                                <td><strong>Fonction</strong></td>
                                <td><strong>Fichier</strong></td>

                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-6 align-self-center">
                        <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of
                            27</p>
                    </div>
                    <div class="col-md-6">
                        <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                            <ul class="pagination">
                                <li class="page-item disabled"><a class="page-link" href="#"
                                        aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span
                                            aria-hidden="true">»</span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
