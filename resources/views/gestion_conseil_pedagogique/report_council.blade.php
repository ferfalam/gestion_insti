@extends('gestion_conseil_pedagogique.layouts.template')
@section('content')

<div class="row">
    <div class="col-lg-12 col-xl-10 offset-xl-1 d-block">
        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="text-primary font-weight-bold m-0">Rapport du conseil pédagogique</h6>
                <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false" data-toggle="dropdown" type="button"></button>
                    <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in">
                        <p class="text-center dropdown-header">dropdown header:</p><a class="dropdown-item" href="#">&nbsp;Action</a><a class="dropdown-item" href="#">&nbsp;Another action</a>
                        <div class="dropdown-divider"></div><a class="dropdown-item" href="#">&nbsp;Something else here</a>
                    </div>
                </div>
            </div>
            <div class="card-body d-block">
                <form method="post"  enctype="multipart/form-data" action="{{route("gestion_conseil_pedagogique.store_report")}}">

                    @foreach ($errors->all() as $error)
                               
                    <div class="alert alert-danger alert-dismissible fade show">
                        <strong></strong> {{ $error }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endforeach
          
                    @csrf
                    <div>           
                       
                        <div class="form-group"><label style="color: rgb(100,74,133);">Resumé du rapport</label>
                            <textarea name="rapport" class="form-control" style="border-radius: 0px;border-style: none;border-bottom: 1px solid var(--purple);background: rgba(98,98,102,0.14);" rows="5">
                            </textarea>
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{$id}}">
                        <label style="color: rgb(100,74,133);">Le fichier de rapport</label>
                        <input  name="fichier_rapport" class="form-control-file" type="file" style="border-radius: 0px;border-style: none;border-bottom: 1px solid var(--purple);background: rgba(98,98,102,0.14);"></div>
                    <div class="form-group">
                        <label style="color: rgb(100,74,133);">La liste des participants</label>
                        <input name="liste_presence" class="form-control-file" type="file" style="border-radius: 0px;border-style: none;border-bottom: 1px solid var(--purple);background: rgba(98,98,102,0.14);"></div>
                    <div class="d-lg-flex justify-content-lg-end">
                        <button class="btn btn-info" type="reset" style="margin-right: 10px;color: rgb(255, 255, 255);background: rgb(149,169,230);">Réinitialiser</button>
                        <button class="btn btn-primary" >Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection