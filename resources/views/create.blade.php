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
                {{-- ajouter une catégorie --}}
                <form method="POST" action="{{route('create_category')}}">
                    {{csrf_field()}}
                    <div class="wrap-input100 validate-input" data-validate="Nouvelle catégorie">
                        <center>
                            <h3>
                                <b>
                                    Créer une catégorie
                                </b>
                            </h3>
                        </center>
                        <h5>
                            Catégorie
                        </h5>
                        <input class="form-control" type="text" name="nom" placeholder="Nom catégorie...">
                    </div>

                    <div class="container-contact100-form-btn">
                        <div>
                            <br>
                            <button class="btn btn-info" type="submit">
                                Créer
                            </button>
                        </div>
                    </div>
                </form>
                <br>
                <br>
                {{-- ajouter une Spécialiter --}}
                <form method="POST" action="{{route('create_specialiter')}}">
                    {{ csrf_field() }}
                    <div>
                        <div class="form-group">
                            <center>
                                <h3>
                                    <b>
                                        Créer une sous catégorie
                                    </b>
                                </h3>
                            </center>
                            <h5>
                                Catégories
                            </h5>
                            <select class="form-control" name="category_id">
                                @foreach ($category as $item)
                                    <option value="{{ $item['id'] }}">
                                        {{ $item['name_category'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div>
                        <h5>Spécialitée métier</h5>
                        <input class="form-control" type="text" name="specialiter" placeholder="...">
                    </div>
                    <br>
                    <button class="btn btn-info">
                        Créer
                    </button>
                </form>
            </div>


            <div class="col-xl">
                <form method="POST" action="{{route('create_pro')}}" enctype="multipart/form-data" >

                    {{ csrf_field() }}
                    <center>
                        <h4>
                            <b>
                                Ajouter un professionel
                            </b>
                        </h4>
                    </center>
                    <div class="row">
                        <div class="col-xl">
                            <h5>
                                Spécialitée métier
                            </h5>
                            <select class="form-control" name="subcategory_id">
                                @foreach ($specialiter as $item)
                                <option value="{{$item['id']}}">
                                    {{ $item['name_subcategory'] }}
                                </option>
                                @endforeach
                            </select>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="inputGroupFileAddon01">Logo</span>
                                </div>
                                <div class="custom-file">
                                  <input type="file" name="img" class="custom-file-input" id="inputGroupFile01"
                                    aria-describedby="inputGroupFileAddon01">
                                  <label class="custom-file-label" for="inputGroupFile01">Choisir une image</label>
                                </div>
                            </div>
                            <input class="form-control" type="text" name="name_entreprise" placeholder="Nom de l'entreprise">
                            <input class="form-control" type="text" name="status_juridique" placeholder="Statut juridique">
                            <input class="form-control" type="text" name="numero_rc" placeholder="Numéros RC">
                            <input class="form-control" type="text" name="numero_tahiti" placeholder="Numéros Tahiti">
                        </div>


                        <div class="col-xl">
                            <h5>Informations gérant</h5>
                            <input class="form-control" type="text" name="name_gerant" placeholder="Nom du gérant">
                            <input class="form-control" type="text" name="phone" placeholder="Téléphone">
                            <input class="form-control" type="text" name="email" placeholder="Email">
                            <input class="form-control" type="text" name="password" placeholder="mot de passe">
                            <input class="form-control" type="text" name="tarif" placeholder="Coût/Tarif">
                        </div>
                    </div>
                    <br>

                    <div class="wrap-input100">
                        <h5>Informations adresse</h5>
                        <input class="form-control" type="text" name="adresse" placeholder="Adresse de l'entreprise">
                        <input class="form-control" type="text" name="city" placeholder="Commune">
                        <input class="form-control" type="text" name="lon" placeholder="Longitude">
                        <input class="form-control" type="text" name="lat" placeholder="Latitude">
                    </div>
                    <br>
                    <button class="btn btn-info">
                        Ajouter un professionel
                    </button>

                </form>
            </div>

        </div>

    </div>
    <br>
    <br>
    <div class="col-xl" id="publiciter">
        <center>
            <P>
                PUBLICITER
            </P>
        </center>
    </div>



@endsection
