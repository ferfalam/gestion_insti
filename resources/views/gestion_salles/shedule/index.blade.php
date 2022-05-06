@extends('gestion_salles.layout')

@section('style')
	<link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
    <style>
        a {
            text-decoration: none
        }
    </style>
@endsection
@section('main')
    <div id="overviews" class="section lb">
        <div class="section-title row mx-4">
            <div class="col-md-8">
                <h3>Emploi du temps des filières</h3>
            </div>
            <div class="col-md-4 text-right">
                <a href="{{ route('gestion_salle.shedule.create', []) }}" class="btn btn-primary">Ajouter un emploi du temps</a>
            </div>
        </div><!-- end title -->
    </div><!-- end section -->

    <div class="row mx-4">
        <div class="col-md-12 my-4 elevate-2">
            <div class="card">
                <div class="card-body">
                    <form action="#" method="post">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="field">Filière</label>
                                    <select class="form-control" name="field" id="field">
                                        <option value="none">---</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="semestre">Semestre</label>
                                    <select class="form-control" name="semestre" id="semestre">
                                        <option value="none">---</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="year">Année d'étude</label>
                                    <select class="form-control" name="year" id="year">
                                        <option value="none">---</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="gp">Groupe Pédagogique</label>
                                    <select class="form-control" name="gp" id="gp">
                                        <option value="none">---</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 text-left">
                                <input type="submit" value="Appliquer" class="btn btn-success">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="cd-schedule cd-schedule--loading margin-top-lg margin-bottom-lg js-cd-schedule">
        <div class="cd-schedule__timeline">
            <ul>
                <li><span>07:00</span></li>
                <li><span>08:00</span></li>
                <li><span>09:00</span></li>
                <li><span>10:00</span></li>
                <li><span>11:00</span></li>
                <li><span>12:00</span></li>
                <li><span>13:00</span></li>
                <li><span>14:00</span></li>
                <li><span>15:00</span></li>
                <li><span>16:00</span></li>
                <li><span>17:00</span></li>
                <li><span>18:00</span></li>
                <li><span>19:00</span></li>
            </ul>
        </div> <!-- .cd-schedule__timeline -->

        <div class="cd-schedule__events">
            <ul>
                <li class="cd-schedule__group">
                    <div class="cd-schedule__top-info"><span>Lundi</span></div>

                    <ul>
                        <li class="cd-schedule__event">
                        <a data-start="08:00" data-end="12:00" data-content="event-abs-circuit" data-event="event-1">
                            <em class="cd-schedule__name">Modelisation UML</em>
                        </a>
                        </li>

                        <li class="cd-schedule__event">
                        <a data-start="15:00" data-end="19:00" data-content="event-rowing-workout" data-event="event-2">
                            <em class="cd-schedule__name">Programmation Web</em>
                        </a>
                        </li>
                    </ul>
                </li>

                <li class="cd-schedule__group">
                    <div class="cd-schedule__top-info"><span>Mardi</span></div>

                    <ul>
                        <li class="cd-schedule__event">
                        <a data-start="08:00" data-end="12:00"  data-content="event-rowing-workout" data-event="event-2">
                            <em class="cd-schedule__name">Analyse Numérique et Application</em>
                        </a>
                        </li>
                    </ul>
                </li>

                <li class="cd-schedule__group">
                    <div class="cd-schedule__top-info"><span>Mercredi</span></div>

                    <ul>
                        <li class="cd-schedule__event">
                        <a data-start="16:00" data-end="19:00" data-content="event-yoga-1" data-event="event-3">
                            <em class="cd-schedule__name">EPS</em>
                        </a>
                        </li>
                    </ul>
                </li>

                <li class="cd-schedule__group">
                    <div class="cd-schedule__top-info"><span>Jeudi</span></div>

                    <ul>
                        <li class="cd-schedule__event">
                        <a data-start="08:00" data-end="12:00"  data-content="event-rowing-workout" data-event="event-2">
                            <em class="cd-schedule__name">Legislation</em>
                        </a>
                        </li>
                    </ul>
                </li>

                <li class="cd-schedule__group">
                    <div class="cd-schedule__top-info"><span>Vendredi</span></div>
                    <ul>
                        <li class="cd-schedule__event">
                        <a data-start="08:00" data-end="12:00" data-content="event-abs-circuit" data-event="event-1">
                            <em class="cd-schedule__name">Système d'Exploitation</em>
                        </a>
                        </li>

                        <li class="cd-schedule__event">
                        <a data-start="15:00" data-end="19:00"  data-content="event-yoga-1" data-event="event-3">
                            <em class="cd-schedule__name">POO Java</em>
                        </a>
                        </li>
                    </ul>
                </li>

                <li class="cd-schedule__group">
                    <div class="cd-schedule__top-info"><span>Samedi</span></div>
                    <ul>

                    </ul>
                </li>
            </ul>
        </div>

        <div class="cd-schedule-modal">
            <header class="cd-schedule-modal__header">
                <div class="cd-schedule-modal__content">
                <span class="cd-schedule-modal__date"></span>
                <h3 class="cd-schedule-modal__name"></h3>
                </div>

                <div class="cd-schedule-modal__header-bg"></div>
            </header>

            <div class="cd-schedule-modal__body">
                <div class="cd-schedule-modal__event-info"></div>
                <div class="cd-schedule-modal__body-bg"></div>
            </div>

            <a class="cd-schedule-modal__close text-replace">Close</a>
        </div>

        <div class="cd-schedule__cover-layer"></div>
    </div> <!-- .cd-schedule -->
@endsection

@section('script')
    {{-- <script src="{{asset('js/main.js')}}"></script> --}}
@endsection
