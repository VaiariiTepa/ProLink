@extends('layouts.app')

@section('content')

<br>
<br>
<center>
    <h1 id="test" >
        Fenua ProLink
    </h1>
</center>
<br>
<br>
<div class="container-fluid">
    <div class="row">

        <div class="col-xl">
            <center>
                <div class="col" id="map">
                        <!-- Ici s'affichera la carte -->
                        affichage carte
                </div>
            </center>
        </div>
        <div class="col-xl ml-5 mr-5">
            <div class="col">
                    <h5>
                        Séléctionnez une catégorie
                    </h5>
                    <div class="form-group">
                        @if ($category)
                        <select class="form-control category" id="sel1">
                            <option value="">Choisir une catégorie</option>
                            @foreach ($category as $item_category)
                            <option value="{{$item_category->id}}">
                                {{$item_category->name_category}}
                            </option>
                            @endforeach
                        </select>
                        @endif
                    </div>
                <br>
                <h5>
                    Séléctionnez une spécialitée métier
                </h5>
                <div class="form-group">
                    <select class="form-control subcategory" id="sel1">

                    </select>
                </div>
                <br>
                <center>
                    <input class="btn btn-info rechercher" type="button" value="Rechercher">
                </center>
            </div>
            <br>
            <div class="col">
                <h5>
                    Liste profesionnel
                </h5>
                <center>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Commune</th>
                            <th scope="col">Numéro</th>
                            <th scope="col">Last</th>
                            <th scope="col">RDV</th>
                          </tr>
                        </thead>
                        <tbody class="listpro">

                        </tbody>
                    </table>
                </center>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<div class="col" id="publiciter">
    <center>
        <P>
            PUBLICITER
        </P>
    </center>
</div>




@endsection
