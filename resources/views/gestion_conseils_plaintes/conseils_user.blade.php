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
                    <h3 class="text-dark mb-0">Conseils</h3></div>
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary d-xl-flex m-0 font-weight-bold">Liste des conseils de discipline organisés</p>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>N°</th>
                                                <th>De la plainte N°</th>
                                                <th>Prévu pour le:</th>
                                                <th>À:</th>

                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($query as $item)
                                            <tr>
                                                <td>{{ $item-> id }}</td>
                                                <td>{{ $item-> id_plainte }}</td>
                                                <td>{{ \Carbon\Carbon::parse($item->date)->format('j F Y') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($item->heure)->format('H:i') }}</td>
                                                <td><a href="{{ route('gestion_conseils_plaintes.vue_conseil', $item-> id) }}">Voir</a></td>
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
        </div>

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

