@extends('layouts.app')

@section('content')
<div class="d-md-flex justify-content-md-center align-items-md-center align-items-xl-center contact-clean">
    <div class="card border-primary d-md-flex flex-column justify-content-md-center align-items-md-center" style="background-color: rgb(239,236,236);width: 728px;">
        <div class="card-body" style="padding: 50px;">
            <h4 class="card-title">Lettre de plainte</h4>
            <h6 class="text-muted card-subtitle mb-2">Envoyé par {{ $tile-> nom_plaignant }}</h6>
            <div class="table-responsive table-borderless border rounded visible" style="color: rgb(0,0,0);">
                <table class="table table-striped table-bordered table-hover table-sm">
                    <caption style="color: rgb(0,0,0);"><br><span><br>Depuis quelques années, de nouvelles approches du stockage et de la gestion des données sont apparues, qui permettent de s’astreindre de certaines contraintes, en particulier de scalabilité, inhérentes au paradigme relationnel.<br><br></span><span><br>Freundliche Grüsse<br>Evanildo Lopes do Almeida<br>Hauswart Binningerstrasse 19/23<br><br></span></caption>
                    <tbody
                        style="color: rgb(0,0,0);">
                        <tr>
                            <td>
                                <div>
                                    <div class="row text-nowrap flex-nowrap" style="filter: contrast(176%);">
                                        <div class="col-auto">
                                            <p>{{ $tile-> nom_plaignant }}<br></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <p>Num mat: 62002550</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <p>Num tel: 97933988</p>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="d-md-flex justify-content-md-end">
                                <div>
                                    <div class="row">
                                        <div class="col">
                                            <p class="d-xl-flex justify-content-xl-center">Lokossa, le 16 Janvier 2022<br></p>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 126px;">
                                        <div class="col">
                                            <p>A</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <p>Monsieur le Chef Service chargé des plaintes et convocations</p>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 2px;"><span><br>Objet :&nbsp;{{ $tile-> motif }}<br><br></span></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="padding: 2px;color: rgb(0,0,0);"></td>
                            <td></td>
                        </tr>
                        </tbody>
                </table>
            {{-- </div><a class="card-link" href="#">Envoyer la lettre</a><a class="card-link" href="#">Retour</a></div> --}}
    </div>
</div>        @if (auth()->user()->statusId == 2)
        <div class="form-group"><a class="btn btn-primary" role="button" href="{{route('formulaire_conseil', $tile-> id)}}">Organiser un conseil</a></div>
        @endif
        </form>
</div>
@endsection
