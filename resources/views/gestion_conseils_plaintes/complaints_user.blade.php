@extends('gestion_conseils_plaintes.layouts.layout')

@section('style')
<link rel="stylesheet" href="{{ asset('gestion_cd/datatables/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" type="text/css"/>
<link rel="stylesheet" href="{{ asset('gestion_cd/datatables/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" type="text/css"/>
<link rel="stylesheet" href="{{ asset('gestion_cd/datatables/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}" type="text/css"/>
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" id="bootstrap-style" type="text/css"/>
<link rel="stylesheet" href="{{ asset('css/icons.min.css') }}" type="text/css"/>
<link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" type="text/css"/>
<link rel="stylesheet" href="{{ asset('css/css/app.min.css') }}" id="app-style" type="text/css"/>
@endsection

@section('content')
            <div class="container-fluid">
                <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <h3 class="text-dark mb-0">Plaintes</h3>
                    <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="{{ route('gestion_conseils_plaintes.formulaire_plainte') }}"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Soumettre une plainte</a></div>
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary d-xl-flex m-0 font-weight-bold">Listes des Plaintes</p>
                    </div>



                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>N°</th>
                                                <th>De:</th>
                                                <th>Motif</th>
                                                <th>Date de soumission</th>
                                                <th>Statut</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($query as $item)
                                            <tr>
                                                <td>{{ $item-> id }}</td>
                                                @if ($item-> plaignant -> id == auth()->user()->id)
                                                <td>Vous</td>
                                                @else
                                                <td>{{ $item-> plaignant -> profile -> com_fullname}}</td>
                                                @endif

                                                <td>{{ $item-> motif }}</td>
                                                <td>{{ $item-> created_at -> format("d F Y à H:i")}}</td>
                                                @if ($item->statut == 0)
                                                <td>En Attente...</td>
                                                @elseif ($item->statut == 1)
                                                <td>Traité</td>
                                                @elseif ($item->statut == 2)
                                                <td>Rejeté</td>
                                                @endif
                                                <td><a href="{{ route('gestion_conseils_plaintes.vue_plainte', $item-> id) }}">Voir</a></td>
                                            </tr>
                                            @empty
                                            <tr>Aucune Plainte</tr>
                                            @endforelse
                                        </tbody>
                                        <tfoot>
                                            <tr></tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div>
            </div>

        </div>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
@endsection

@section('script')
<script src= "{{ asset('gestion_cd/jquery/jquery.min.js"')}}"></script>
    <script src ="{{ asset('gestion_cd/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('gestion_cd/datatables/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('gestion_cd/datatables/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('gestion_cd/datatables/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('gestion_cd/datatables/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('gestion_cd/datatables/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('gestion_cd/datatables/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('gestion_cd/datatables/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('gestion_cd/datatables/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('gestion_cd/datatables/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('gestion_cd/datatables/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('gestion_cd/datatables/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('gestion_cd/datatables/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('gestion_cd/datatables/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('gestion_cd/datatables/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('gestion_cd/datatables/datatables.net-select/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('gestion_cd/datatables/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('gestion_cd/datatables/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('gestion_cd/js/datatables.init.js') }}"></script>
    <script src="{{ asset('gestion_cd/js/app.js')}}"></script>
    <script>
        $(document).ready( function () {
            $('#datatable').DataTable();
        } );
    </script>

@endsection


