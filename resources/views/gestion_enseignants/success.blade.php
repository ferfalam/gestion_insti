@extends('gestion_enseignants.layout')
@section('content')
<div id="wrapper">
    @include('gestion_enseignants.sidebar')
    @include('gestion_enseignants.navbar')
    <div class="container-fluid" data-aos="fade-up-left" data-aos-duration="600" >
        <h3 class="text-dark mb-4">{{$h1}}</h3>
        <div class="card-body text-center shadow">
            @if (count($errors)==0)
                <p style="color: green">Les enrégistrement ont été effectués avec succes!</p>
            @else
                <ul>
                    @foreach ($errors as $errors)
                        <li style="size: 30; color: red">{{$errors}}</li>
                    @endforeach
                </ul>
                
                
            @endif
        </div>
    
    </div>

</div>
@endsection