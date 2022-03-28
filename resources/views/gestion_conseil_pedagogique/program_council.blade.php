@extends('gestion_conseil_pedagogique.layouts.template')
@section('content')

    <div class="row">
        <div class="col-lg-12 col-xl-10 offset-xl-1 d-block">
            <div class="card shadow mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="text-primary font-weight-bold m-0">&nbsp;Organisation du conseil</h6>
                    <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false" data-toggle="dropdown" type="button"></button>
                        <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in">
                            <p class="text-center dropdown-header">dropdown header:</p><a class="dropdown-item" href="#">&nbsp;Action</a><a class="dropdown-item" href="#">&nbsp;Another action</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#">&nbsp;Something else here</a>
                        </div>
                    </div>
                </div>
                <div class="card-body d-block">
                    <form method="post" enctype="multipart/form-data" action="{{route("gestion_conseil_pedagogique.store_program")}}">
                        <div>
                            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div> 
                        @csrf
                        <div class="form-group">
                            <label class="label2" >Thème du conseil</label>
                            <input class="form-control form2" type="text" name="theme" value="{{old("theme")}}" >
                        </div>
                        <div class="form-group">
                            <label class="label2" >Signataire </label>
                            <input class="form-control form2" type="text"  name="signataire" value="{{old("signataire")}}"></div>
                        <div class="form-group">
                            <label class="label2">Date de tenu</label>
                            <input type="date" class="form-control " name="date_tenu" id="date_tenu" value="{{old("date_tenu")}}">
                        </div>
                        <div class="form-group">
                            <label class="label2">Objet du conseil</label>
                            <textarea class="form-control form2" name="description">{{old("description")}}</textarea></div>
                        <div class="form-group">
                            <label class="label2">La note de service</label>
                            <input class="form-control-file form2 " type="file" value="{{old("note_service")}}" name="note_service"></div>
                        <div class="form-group">
                            <label class="label2">La liste des invités</label>
                            <input class="form-control-file form2" type="file"value="{{old("liste_participants")}}" name="liste_participants" ></div>
                            
                        <div class="d-lg-flex justify-content-lg-end">
                            <button class="btn btn-primary" type="reset" style="margin-right: 10px;color: rgb(255, 255, 255);background: rgb(149,169,230);">Réinitialiser</button>
                            <button class="btn btn-primary" >Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
@endsection