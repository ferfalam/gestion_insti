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
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <h3>Occupation des salles par jour</h3>
                </div>
            </div><!-- end title -->
        </div><!-- end container -->
    </div><!-- end section -->

    <div id="{{str_replace(' ', '_', 'amphi gei')}}" style="overflow: hidden">
        <div class="section-title row text-center">
            <div class="col-md-8 offset-md-2 border-dark border-bottom">
                <h4> Amphi GEI </h4>
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
    </div>
@endsection

@section('script')
    {{-- <script src="{{asset('js/main.js')}}"></script> --}}
@endsection
