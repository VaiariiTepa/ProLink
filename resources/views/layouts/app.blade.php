<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ProLink</title>

    <!-- Scripts -->

    {{-- Script --}}
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyAf1TaA4FTpPmk7p9hSgpdiNJ-z1q4PzwQ" type="text/javascript"></script>


    <style type="text/css">
        #map{ /* la carte DOIT avoir une hauteur sinon elle n'apparaît pas */
            height:600px;
            /* height:auto; */
            width:90%;
        }

        #publiciter{
            border: 1px solid black;
            /* height: 200px; */
        }

        #fiche_entreprise{
            text-align: center;
        }

        /* *{
            border: 1px solid black;
        } */


    </style>
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

        </style>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <!-- Styles -->
    <link href="{{ asset('css/geo.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- <h4>
                        ProLink
                    </h4> --}}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Connexion</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Inscription</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <center>
                                        <a href="{{url('home')}}">Accueil</a>
                                        <br>
                                        @if (Auth::user()->user_type_id == 1)
                                            <a href="{{url('admin')}}">Création</a>
                                        @endif
                                    </center>
                                    <center>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                            Déconnexion
                                        </a>
                                    </center>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>

                            </li>
                            <li></li>
                        @endguest

                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script async type="text/javascript">
        // On initialise la latitude et la longitude de Paris (centre de la carte)
        var lat = -17.686144;
        var lon = -149.570525;
        var markers = [];


        // Permet d'ajouté une InfoBulle lors du clique sur le marqueur
        var contentString = 'test d\'affichage<br>'+'autre ligne';
        var infowindow = new google.maps.InfoWindow({
            content: contentString,
            maxWidth: 200
        });

        $(document).ready(function(){



            $('.category').change(function(){

                var categoryID = $(this).val();
                // alert(categoryID);
                get_subcategory(categoryID);

            });

            $('.rechercher').click(function(){

                var subcategoryID = $('.subcategory').val();
                // alert(categoryID);
                $('.listpro').empty();
                research_ajax(subcategoryID);

            });

        });

        //AJAX
        function get_subcategory(categoryID){

            $.ajax({
                type:"GET",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:"home/get_subcategory",
                dataType:"json",
                data: {
                    'categoryID': categoryID
                },
                'success': function(data){
                        // alert('get_subcategory');
                        show_subcategory(data);
                    }
                    ,
                    'error': function(){
                        alert('erreur');
                    }
            });
        }

        function show_subcategory(data){
            $('.subcategory').empty();
            for (let index = 0; index < data.length; index++) {
                const element = data[index];
                // alert(element.name_subcategory);
                $('.subcategory').append('<option value="'+element.id+'">'+element.name_subcategory+'</option>');
            }
        }

        function research_ajax(subcategoryID){

            $.ajax({
                type:"GET",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:"home/research_ajax",
                dataType:"json",
                data: {
                    'subcategoryID': subcategoryID
                },
                'success': function(data){
                        show_map(data);

                    },
                    'error': function(){
                        alert('erreur');
                    }
            });
        }

        function show_map(data){

            var subcategory = data;

            deleteMarkers();
            search_initMap();

            // alert('showMap');
            // Je rajoute les marqueurs de la catégorie choisie
            // Puis
            // On parcourt l'objet villes
            for(subcategories in subcategory){
                // console.log(subcategories[categorie].nom_categorie);
                var marker = new google.maps.Marker({
                    // parseFloat nous permet de transformer la latitude et la longitude en nombre décimal
                    position: {
                        lat: parseFloat(subcategory[subcategories].lat),
                        lng: parseFloat(subcategory[subcategories].lon)},
                    title: subcategory[subcategories].name_company,
                    map: map
                });
                // marker.setAnimation(google.maps.Animation.DROP);
                markers.push(marker);

                //list entreprise
                $('.listpro').append('<tr><th scope="row">'+subcategory[subcategories].city+'</th><td>'+subcategory[subcategories].number_phone+'</td><td>'+subcategory[subcategories].name_company+'</td><td><button class="btn btn-light" type="button" data-toggle="collapse" data-target="#collapseExample_id'+subcategory[subcategories].professional_id+'" aria-expanded="false" aria-controls="collapseExample_id1">fiche entreprise</button></td></tr>');
                var img = subcategory[subcategories].img;
                //fiche entreprise
                $('.listpro').append(
                    '<tr>'
                        +'<td colspan="4">'
                            +'<div class="collapse" id="collapseExample_id'+subcategory[subcategories].professional_id+'">'
                                +'<div class="card card-body">'
                                    +'<center>'
                                        +'<h6>'
                                            +'fiche entreprise !'
                                        +'</h6>'
                                    +'</center>'
                                    +'<br>'
                                    +'<div class="row">'
                                        +'<table id="fiche_entreprise" class="col-12">'
                                            +'<tbody>'
                                                +'<tr>'
                                                    +'<td>catégorie'
                                                        +'<br><b>'
                                                            +subcategory[subcategories].name_category
                                                    +'</b></td>'
                                                    +'<td>spécialité'
                                                        +'<br><b>'
                                                            +subcategory[subcategories].name_subcategory
                                                    +'</b></td>'

                                                    +'<td colspan="2">'
                                                        +'<div style="vertical-align: middle ;">'
                                                            +'<img src="uploads/'+img+'" style="width:40%; height:40%; border-radius: 100px;" alt="logo">'
                                                        +'</div>'
                                                    +'</td>'
                                                +'</tr>'
                                                +'<tr>'
                                                    +'<td>cout/tarif'
                                                        +'<br><b>'
                                                            +subcategory[subcategories].price
                                                    +'</b></td>'
                                                    +'<td>disponibilité'

                                                    +'</td>'
                                                +'</tr>'
                                            +'</tbody>'
                                        +'</table>'
                                    +'</div>'
                                    +'<br>'
                                    +'<div class="row">'
                                        +'<div class="col-12">'
                                            +'<div class="card">'
                                                +'<div class="card-body">'
                                                    +'<h5 class="card-title">'
                                                        +'<center>'
                                                            +'<h4>Prendre RDV'

                                                            +'</h4>'
                                                            +'<input type="checkbox" name="" id="">'
                                                        +'</center>'
                                                    +'</h5>'
                                                    +'<center>'
                                                        +'<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">URGENT'
                                                        +'</button>'
                                                    +'</center>'
                                                    +'<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'
                                                    +'<div class="modal-dialog" role="document">'
                                                        +'<div class="modal-content">'
                                                        +'<div class="modal-header">'
                                                            +'<h5 class="modal-title" id="exampleModalLabel">'
                                                                +'URGENT !'
                                                            +'</h5>'
                                                            +'<button type="button" class="close" data-dismiss="modal" aria-label="Close">'
                                                            +'<span aria-hidden="true">&times;'

                                                            +'</span>'
                                                            +'</button>'
                                                        +'</div>'
                                                        +'<div class="modal-body">'
                                                            +'...'
                                                        +'</div>'
                                                        +'<div class="modal-footer">'
                                                            +'<button type="button" class="btn btn-info">'
                                                                +'Ennvoyer'
                                                            +'</button>'
                                                        +'</div>'
                                                        +'</div>'
                                                    +'</div>'
                                                    +'</div>'

                                                    +'<br>'
                                                    +'<p class="card-text">'
                                                        +'<center><input type="date" name="" id=""></center>'
                                                        +'<br>'
                                                        +'<center>'
                                                            +'<div class="file-field">'
                                                                +'<div class="d-flex justify-content-center">'
                                                                +'<div class="btn btn-mdb-color btn-rounded float-left">'
                                                                    +'<span>Importer une photo'

                                                                    +'</span>'
                                                                    +'<br>'
                                                                    +'<input type="file">'
                                                                +'</div>'
                                                                +'</div>'
                                                                +'<div class="z-depth-1-half mb-2">'
                                                                +'<img src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg" class="img-fluid" alt="example placeholder" width=300>'
                                                                +'</div>'
                                                            +'</div>'
                                                        +'</center>'
                                                        +'<br>'
                                                        +'<center>Dèscription de la demande'

                                                            +'<br>'
                                                            +'<textarea name="" id="" cols="100" rows="2">'

                                                            +'</textarea>'
                                                        +'</center>'
                                                    +'</p>'
                                                +'</div>'
                                            +'</div>'
                                        +'</div>'

                                    +'</div>'
                                    +'<br>'
                                    +'<center>'
                                        +'<button class="btn btn-info" type="submit">Envoyer'

                                        +'</button>'
                                    +'</center>'
                                +'</div>'
                            +'</div>'
                        +'</td>'
                    +'</tr>'
                );

            }

        }

        // Sets the map on all markers in the array.
        function setMapOnAll(map) {
            for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(map);
            }
        }

        // Removes the markers from the map, but keeps them in the array.
        function clearMarkers() {
            setMapOnAll(null);
        }

        // Deletes all markers in the array by removing references to them.
        function deleteMarkers() {
            clearMarkers();
            markers = [];
        }



        // Fonction d'initialisation de la carte
        function search_initMap() {
            // Créer l'objet "map" et l'insèrer dans l'élément HTML qui a l'ID "map"
            map = new google.maps.Map(document.getElementById("map"), {
                // Nous plaçons le centre de la carte avec les coordonnées ci-dessus
                center: new google.maps.LatLng(lat, lon),
                // Nous définissons le zoom par défaut
                zoom: 11,
                // Nous définissons le type de carte (ici carte routière)
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                // Nous activons les options de contrôle de la carte (plan, satellite...)
                mapTypeControl: true,
                // Nous désactivons la roulette de souris
                scrollwheel: false,
                mapTypeControlOptions: {
                    // Cette option sert à définir comment les options se placent
                    style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR
                },
                // Activation des options de navigation dans la carte (zoom...)
                navigationControl: true,
                navigationControlOptions: {
                    // Comment ces options doivent-elles s'afficher
                    style: google.maps.NavigationControlStyle.ZOOM_PAN
                }

            });

            infoWindow = new google.maps.InfoWindow;


        }


        // Fonction d'initialisation de la carte
        function initMap() {
            // Créer l'objet "map" et l'insèrer dans l'élément HTML qui a l'ID "map"
            map = new google.maps.Map(document.getElementById("map"), {
                // Nous plaçons le centre de la carte avec les coordonnées ci-dessus
                center: new google.maps.LatLng(lat, lon),
                // Nous définissons le zoom par défaut
                zoom: 15,
                // Nous définissons le type de carte (ici carte routière)
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                // Nous activons les options de contrôle de la carte (plan, satellite...)
                mapTypeControl: true,
                // Nous désactivons la roulette de souris
                scrollwheel: false,
                mapTypeControlOptions: {
                    // Cette option sert à définir comment les options se placent
                    style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR
                },
                // Activation des options de navigation dans la carte (zoom...)
                navigationControl: true,
                navigationControlOptions: {
                    // Comment ces options doivent-elles s'afficher
                    style: google.maps.NavigationControlStyle.ZOOM_PAN
                }

            });

            infoWindow = new google.maps.InfoWindow;

            // Try HTML5 geolocation.
            if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
                };

                infoWindow.setPosition(pos);
                infoWindow.setContent('Vous êtes ici ;) ');
                infoWindow.open(map);
                map.setCenter(pos);
            }, function() {
                handleLocationError(true, infoWindow, map.getCenter());
            });
            } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
            }

        }
        window.onload = function(){
            // Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
            initMap();
        };

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                                'Geolocalisation échouer !' :
                                'Erreur: votre naviguateur ne supporte pas la géolocalisation');
            infoWindow.open(map);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
    <script src="{{ asset('js/map-custom.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{ asset('js/main.js')}}"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-23581568-13');
    </script>

</body>
</html>
