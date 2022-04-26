@extends('gestion_conseils_plaintes.layouts.accueil')

@section('content')

            <div class="container-fluid">
                <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <h3 class="text-dark mb-0">Plaintes</h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="{{ route('gestion_conseils_plaintes.formulaire_plainte') }}"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Soumettre une plainte</a></div>
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary d-xl-flex m-0 font-weight-bold">Listes des Plaintes</p>
                    </div>
                    <div class="card-body" style="width: 100%;background-color: rgba(255,255,255,0);">
                        {{-- <div class="row">
                            <div class="col-md-6 text-nowrap d-md-flex justify-content-md-start align-items-md-center">
                                <div class="d-md-flex justify-content-md-center align-items-md-start dataTables_length" id="dataTable_length" aria-controls="dataTable"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-right dataTables_filter" id="dataTable_filter"><label><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                            </div>
                        </div> --}}
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table dataTable my-0" id="dataTable">
                                <thead>
                                    <tr></tr>
                                </thead>
                                <tbody>

                                @foreach( $query as $item)
                                    <tr class="border rounded-circle flex-fill" style="background-color: #ffffff;padding: 25px;">
                                        <td class="shadow-sm" style="width: 648px;background-color: #ffffff;filter: brightness(100%) sepia(0%);opacity: 1;">
                                            <a class="nav-link active" href=" {{ route('gestion_conseils_plaintes.vue_plainte', $item-> id ) }}">
                                            <div class="row" style="margin-right: 0;margin-left: 0;background-color: #ffffff;color: #000000;">
                                                <div class="col-1 text-sm-left mx-auto mx-sm-auto iconForm" style="width: 84px;height: 87px;padding: 4px;padding-top: 36px;margin-right: 30px;margin-left: 30px;padding-bottom: 5px;padding-right: 5px;">
                                                    <p>De: {{ $item-> nom_plaignant }}</p></div>

                                                <div class="col-6 text-sm-left mx-auto mx-sm-auto" style="width: 364px;">
                                                    <p style="margin-bottom: 12px;margin-top: 12px;"><strong> Envers: {{ $item-> nom_fautif }}</strong></p>
                                                    <p>{{ $item-> motif }}</p>
                                                </div>
                                                    <p></p>
                                                @if ( $item-> status == 0 )
                                                <div class="col-1 text-sm-left d-xl-flex mx-auto mx-sm-auto justify-content-xl-center align-items-xl-center iconForm"><img src="assets/img/pending.png" style="width: 30px" height="30px" alt="">
                                                @else
                                                <div class="col-1 text-sm-left d-xl-flex mx-auto mx-sm-auto justify-content-xl-center align-items-xl-center iconForm"><img src="assets/img/valide.png" style="width: 30px" height="30px" alt="">
                                                @endif
                                            <div class="col-1 text-sm-left d-xl-flex mx-auto mx-sm-auto justify-content-xl-center align-items-xl-center iconForm"><img src="assets/img/trash.png" href=" {{ route('suppression', $item-> id ) }}" style="margin-left: 30px" width="30px" height="30px" alt="">

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                {{-- @empty
                                <span class="">Aucune plainte</span> --}}
                                @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="d-md-flex justify-content-md-end align-items-md-center" style="width: 797;"></tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
@endsection
