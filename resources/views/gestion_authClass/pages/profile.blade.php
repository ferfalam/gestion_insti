@extends('gestion_authClass.layout')

@section('main')


<div class="container-fluid">
        <h3 class="text-dark mb-4">Profile</h3>
        <div class="row mb-3">
            <div class="col-lg-4">
                <div class="card mb-3">
                    <div class="card-body text-center shadow">
                        <img
                            class="rounded-circle mb-3 mt-4"
                            src="assets/img/dogs/image2.jpeg"
                            width="160"
                            height="160"
                        />
                        <div class="mb-3">
                            <button class="btn btn-primary btn-sm" type="button">
                                Change Photo
                            </button>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-8">
                <div class="row mb-3 d-none">
                    <div class="col">
                        <div class="card text-white bg-primary shadow">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col">
                                        <p class="m-0">Peformance</p>
                                        <p class="m-0"><strong>65.2%</strong></p>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-rocket fa-2x"></i>
                                    </div>
                                </div>
                                <p class="text-white-50 small m-0">
                                    <i class="fas fa-arrow-up"></i>&nbsp;5% since last
                                    month
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white bg-success shadow">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col">
                                        <p class="m-0">Peformance</p>
                                        <p class="m-0"><strong>65.2%</strong></p>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-rocket fa-2x"></i>
                                    </div>
                                </div>
                                <p class="text-white-50 small m-0">
                                    <i class="fas fa-arrow-up"></i>&nbsp;5% since last
                                    month
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card shadow mb-3">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 font-weight-bold">
                                    User Settings
                                </p>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="nom"><strong>Nom</strong></label
                                                >

                                                <input
                                                    class="form-control"
                                                    type="text"
                                                    placeholder="{{explode(' ',Auth::user()->name)[0]}}"
                                                    name="last_name"
                                                />
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="prenom"
                                                ><strong>Prenom</strong></label
                                                >

                                                <input
                                                    class="form-control"
                                                    type="text"
                                                    placeholder=""
                                                    name="first_name"
                                                />
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="date"
                                                ><strong>Date de naissance</strong></label
                                                ><input
                                                    class="form-control"
                                                    type="text"
                                                    placeholder="Date de naissance"
                                                    name="date"
                                                />
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="email"
                                                ><strong>Email Address</strong></label
                                                >
                                                <input
                                                    class="form-control"
                                                    type="email"
                                                    placeholder="{{Auth::user()->email}}"
                                                    name="email"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="first_name"
                                                ><strong>Telephone</strong></label
                                                ><input
                                                    class="form-control"
                                                    type="text"
                                                    placeholder="{{Auth::user()->contact}}"
                                                    name="phone"
                                                />
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button
                                            class="btn btn-primary btn-sm"
                                            type="submit"
                                        >
                                            Save Settings
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection






