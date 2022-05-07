@extends('gestion_authClass.layout')

@section('main')

<div class="container-fluid">
       
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2 class="text-primary font-weight-bold m-0" style="text-align:center;">DEMANDE</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('gestion_authClass.dem')}}">
                @csrf
                <div class="form-row">
                    <div class="col">
                        <div class="form-group"><label for="nom"><strong>Nom et Prénom</strong></label><input class="form-control" type="text" placeholder="Nom" name="name_d">
                        <span style="color: red">@error('nom') {{$message}}@enderror</span>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group"><label for="email"><strong>Email Address</strong></label><input class="form-control" type="email" placeholder="user@example.com" name="email">
                            <span style="color: red">@error('email') {{$message}}@enderror</span>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <div class="form-group"><label for="contact"><strong>Contact</strong></label><input class="form-control" type="contact" placeholder="" name="contact">
                            <span style="color: red">@error('Contact') {{$message}}@enderror</span>
                        </div>
                    </div>
                    <div class="col" data-aos="fade-left" data-aos-duration="700" data-aos-delay="600">   <label style="font-weight: normal;"><strong>Entité</strong></label>
                        <div class="form-group"><input class="form-control" type="text" placeholder="Entité" name="entite">
                            <span style="color: red">@error('entite') {{$message}}@enderror</span>
                        </div>
                    </div>
                </div>
                <div class="form-row">

                <div class="col" data-aos="fade-left" data-aos-duration="700" data-aos-delay="600">   <label style="font-weight: normal;"><strong>Status</strong></label>
                        <div class="form-group"><input class="form-control" type="text" placeholder="Status" name="status">
                            <span style="color: red">@error('status') {{$message}}@enderror</span>
                        </div>
                    </div>
                    <div class="col" data-aos="fade-left" data-aos-duration="700" data-aos-delay="600">   <label style="font-weight: normal;"><strong>A</strong></label>
                      
                        <div class="form-group">
                                    <select id="recipient" class="form-control" type="text" placeholder="Entité" name="recipient">
                                        <option value="Monsieur le Directeur" >Monsieur le Directeur</option>
                                        <option value="Madame la Directrice" >Madame la Directrice</option>
                                        
                                    </select>
                                </div>
                                <span style="color: red">@error('Destinataire') {{$message}}@enderror</span>
                    </div>
                    
                </div>
                <div class="form-row">
                    <div class="col">

                        <div class="form-group"><label for="objet"><strong>Objet</strong></label><input class="form-control" type="text" placeholder="Objet" name="objet">
                            <span style="color: red">@error('objet') {{$message}}@enderror</span>
                        </div>

                        <div class="form-group"><label for="message"><strong>Redaction</strong><br></label><textarea class="form-control" rows="8" name="message"></textarea>
                            <span style="color: red">@error('message') {{$message}}@enderror</span>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col" data-aos="fade-left" data-aos-duration="700" data-aos-delay="600">
                        <div class="form-group"><label for="piece"><strong>Pièce jointe 1</strong></label><input class="form-control" type="file" placeholder="Piece" name="piece"></div>
                        <span style="color: red">@error('pièce') {{$message}}@enderror</span>
                    </div>
                    <div class="col" data-aos="fade-left" data-aos-duration="700" data-aos-delay="600">
                        <div class="form-group"><label for="piece"><strong>Pièce jointe 2</strong></label><input class="form-control" type="file" placeholder="Piece" name="piece"></div>
                        <span style="color: red">@error('pièce') {{$message}}@enderror</span>
                    </div>
                    <div class="col" data-aos="fade-left" data-aos-duration="700" data-aos-delay="600">
                        <div class="form-group"><label for="piece"><strong>Pièce jointe 3</strong></label><input class="form-control" type="file" placeholder="Piece" name="piece"></div>
                        <span style="color: red">@error('pièce') {{$message}}@enderror</span>
                    </div>
                    <div class="col" data-aos="fade-left" data-aos-duration="700" data-aos-delay="600">
                        <div class="form-group"><label for="piece"><strong>Pièce jointe 4</strong></label><input class="form-control" type="file" placeholder="Piece" name="piece"></div>
                    </div>
                </div>
                <div >
                    <button class="btn btn-primary" type="submit">Envoyer</button>
                    <button class="btn btn-primary" type="reset">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection








