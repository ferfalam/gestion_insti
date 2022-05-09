
<section>
    <div class="container">

        <div>
            <div class="d-flex mb-5">
                <span class="mt-1 font-weight-bold" style="color: #0f3d81">Filtre:&nbsp;</span>
                <select class="form-control" style="width: 200px">
                    <optgroup label="Trier par">
                        <option value='1' selected>Tout</option>
                        <option value='2' >Nom et Prenom</option>
                        <option value='3'>Filliere</option>
                        <option value='4'>Annee d'etude</option>
                    </optgroup>
                </select>&nbsp;
                <input type="search" class="form-control" aria-controls="dataTable" placeholder="Entrer un nom" style="width: 200px">
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="table-wrap">
                    <table class="table table-responsive-xl custom-table">
                        <thead>
                            <tr class="font-weight-bold">
                            <th>&nbsp;</th>
                            <th>Année</th>
                            <th>Etudiant</th>
                            <th>Entreprise Recommandée</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="alert" role="alert">
                            <td>
                                <label class="checkbox-wrap checkbox-primary">
                                    <input type="checkbox" checked>
                                    <span class="checkmark"></span>
                                </label>
                            </td>
                            <td>2019-2022</td>
                            <td>
                                <div class="pl-3 email">
                                    <span>Etudiant no2</span>
                                    <span>Filliere + option + année d'etude</span>
                                </div>
                            </td>
                            <td class="status"><span class="waiting">Aucune Recommandation</span></td>
                            <td>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="fa fa-close"></i></span>
                                </button>
                            </td>
                        </tr>
                        @for($i = 0; $i<= 3; $i++)
                            <tr class="alert" role="alert">
                            <td>
                                <label class="checkbox-wrap checkbox-primary">
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </td>
                            <td>2019-2022</td>
                            <td>
                                <div class="pl-3 email">
                                    <span>Etudiant no1</span>
                                    <span>Filliere + option + année d'etude</span>
                                </div>
                            </td>
                            <td class="status"><span class="active">Enterprise name</span></td>
                            <td>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="fa fa-close"></i></span>
                                </button>
                            </td>
                        </tr>
                            <tr class="alert" role="alert">
                            <td>
                                <label class="checkbox-wrap checkbox-primary">
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </td>
                            <td>2019-2022</td>
                            <td>
                                <div class="pl-3 email">
                                    <span>Etudiant no2</span>
                                    <span>Filliere + option + année d'etude</span>
                                </div>
                            </td>
                            <td class="status"><span class="waiting">Aucune Recommandation</span></td>
                            <td>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="fa fa-close"></i></span>
                                </button>
                            </td>
                        </tr>
                        @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
