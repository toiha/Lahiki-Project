
@extends('layouts.main')


@section('csslink')


@endsection




@section('content')



@if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
@endif


<div id="content-block">
        <div class="head-bg">
            <div class="head-bg-img">
                @if ($actualite != null and $actualite->media != null)
                    <img src="{{ $actualite->media != null ? str_replace("laravel-filemanager/files", "uploads", "$actualite->media") : '' }}" class="head-bg-img">
                @endif
            </div>
            <div class="head-bg-content">
                <h1>Votre réseau d'accueil des élèves mahorais</h1>
                <p>Le site a pour but de mettre en relation les nouveaux étudiants mahorais avec les anciens ou
actuels étudiants mahorais hors de Mayotte. Et ainsi permettre un meilleur accueil dans les
villes d’études.</p>
                @if(!Auth::user())
                    <a class="btn color-1 size-1 hover-1" href="{{ URL::to('redirect') }}"><i class="fa fa-facebook"></i>S'enregistrer via facebook</a>
                    <a class="be-register btn color-3 size-1 hover-6"><i class="fa fa-lock"></i>Inscrivez-vous maintenant</a>
                @endif
            </div>  
        </div>



       

    @if(Auth::user())

        <div class="container-fluid custom-container">
            <h2 class="content-title">Notre Réseau Lahiki.Net</h2>
            <div class="row">                
                <div class="col-md-2 left-feild">
                 

                              




                    <div class="be-vidget">
                        <h3 class="letf-menu-article">
                            Filtrer par
                        </h3>
                        <div class="filter-block">
                            <ul>  
                                <li><a><i class="fa fa-building"></i><strong>Ville</strong> <div class="be-text-tags">{{ old('ville_text') ? '#' . old('ville_text') . '#' : ''}}</div></a>
                                    <div class="be-popup">
                                        <h3 class="letf-menu-article">
                                            Nom de la ville 
                                        </h3>
                                           
                                            {!! Form::open(array('home' => 'home','method'=>'GET', 'class' => 'input-search', 'id' => 'search-by-ville')) !!}
                            
                                                                                                                                                              
                                                 <input class="input-signtype" name="ville_text"  id="search_ville_autocomplete" type="text" 
                                                 placeholder="Saisissez et Selectionnez la ville à chercher" required="" value="{{ old('ville_text') }}">
                                                <input name="ville_id" type="hidden" id="search_ville_id" value="{{ old('ville_id') }}"/>  
                                                


                                            {!! Form::close() !!}
                                        <i class="fa fa-times"></i>
                                    </div>
                                </li>

                                <li><a><i class="fa fa-map-pin"></i><strong>Code postal </strong><div class="be-text-tags">{{ old('cp_text') ? '#' . old('cp_text') . '#' : '' }}</div></a>
                                    <div class="be-popup">
                                        <h3 class="letf-menu-article">
                                            Code postal 
                                        </h3>                                            
                                            {!! Form::open(array('home' => 'home','method'=>'GET', 'class' => 'input-search', 'id' => 'search-by-cp')) !!}
                            
                                                                                                                                                              
                                                 <input class="input-signtype" name="cp_text"  id="search_cp_autocomplete" type="text" 
                                                 placeholder="Saisissez le code postal et Selectionnez la ville à chercher" required="" value="{{ old('cp_text') }}">
                                                <input name="cp_id" type="hidden" id="search_cp_id" value="{{ old('cp_id') }}"/>  
                                               

                                            {!! Form::close() !!}
                                        <i class="fa fa-times"></i>
                                    </div>
                                </li>


                                <li><a><i class="fa fa-graduation-cap"></i><strong>Etablissement</strong> <div class="be-text-tags">{{ old('etablissement_text') ? '#' . old('etablissement_text') . '#' : ''}}</div></a>
                                    <div class="be-popup">
                                        <h3 class="letf-menu-article">
                                            Nom de l'établissement scolaire 
                                        </h3>


                                            {!! Form::open(array('home' => 'home','method'=>'GET', 'class' => 'input-search', 'id' => 'search-by-etablissement')) !!}
                            
                                                                                                                                                              
                                                 <input class="input-signtype" name="etablissement_text"  id="search_etablissement_autocomplete" type="text" 
                                                 placeholder="Saisissez et Selectionnez un établissement scolaire" required="" value="{{ old('etablissement_text') }}">
                                                <input name="etablissement_id" type="hidden" id="search_etablissement_id" value="{{ old('etablissement_id') }}"/>
                                               


                                            {!! Form::close() !!}
                                        <i class="fa fa-times"></i>
                                    </div>
                                </li>

                                <li><a><i class="fa fa-users"></i><strong>Nom du membre</strong> <div class="be-text-tags">{{ old('membre_text') ? '#' . old('membre_text') . '#' : ''}}</div></a>
                                    <div class="be-popup">
                                        <h3 class="letf-menu-article">
                                            Nom ou prénom du membre
                                        </h3>                                            

                                             {!! Form::open(array('home' => 'home','method'=>'GET', 'class' => 'input-search', 'id' => 'search-by-membre')) !!}
                            
                                                                                                                                                              
                                                <input class="input-signtype" name="membre_text"  id="search_membre_autocomplete" type="text" 
                                                 placeholder="Saisissez et Selectionnez le nom ou le prénom d'un membre" required="" value="{{ old('membre_text') }}">
                                                <input name="membre_id" type="hidden" id="search_membre_id" value="{{ old('membre_id') }}"/>  


                                            {!! Form::close() !!}


                                        <i class="fa fa-times"></i>
                                    </div>
                                </li>


                            </ul>
                        </div>

                        
                    </div>



                </div>              
                <div class="col-md-10">
                    <div class="row _post-container_">

                        <!-- user -->
                        @foreach($utilisateurs as $utilisateur)
                            <div class="custom-column-5">

                                <div class="be-user-block style-2">
                                    <a class="be-ava-user style-2" href="{{ URL::to('site/profil?id=' . $utilisateur->id ) }}">
                                        <img src="{{ ($utilisateur->avatar != null ? $utilisateur->avatar : '/laravel-filemanager/photos/8/20170625_193351.png') }}" alt=""> 
                                    </a>
                                    @if ($utilisateur->rencontres != null and $utilisateur->rencontres->count() > 0)
                                    <div class="be-user-counter">
                                        <div class="c_number">{{ ($utilisateur->rencontres != null ? $utilisateur->rencontres->count() : 'Aucun ') }}</div>
                                        <div class="c_text">Lahiki</div>
                                    </div>
                                    @endif
                                    <a href="{{ URL::to('site/profil?id=' . $utilisateur->id ) }}" class="be-use-name">
                                        {{ ($utilisateur->ville != null ? $utilisateur->ville->nom : 'Ville non renseigné')}}, 
                                        {{ ($utilisateur->ville != null ? $utilisateur->ville->departement->nom : ' Département non renseigné') }} </a>
                                    <p class="be-user-info"><a href="{{ URL::to('site/profil?id=' . $utilisateur->id ) }}">{{ $utilisateur->prenom }} {{ $utilisateur->nom }}</a></p>
                                    <div class="be-text-tags">
                                        <a href="{{ URL::to('site/profil?id=' . $utilisateur->id ) }}">{{ $utilisateur->apropos }}</a>
                                    </div>
                                    <div class="info-block">
                                        <span><i class="fa fa-thumbs-o-up"></i> 360</span>
                                        <span><i class="fa fa-eye"></i> 789</span>
                                    </div>  
                                </div>
                            </div>
                         @endforeach
                        <!-- / user -->


                       
   
 


                    </div>
                </div>

            </div>
        </div>
    </div>

    @else







            <div class="container be-detail-container">
            <h2 class="content-title">Les villes de notre Réseau Lahiki.Net</h2>
            <div class="row">                
                <div class="col-md-2 left-feild">              

                              




                    <div class="be-vidget">
                        <h3 class="letf-menu-article">
                            Filtrer par
                        </h3>
                        <div class="filter-block">
                            <ul>  
                                <li><a><i class="fa fa-building"></i><strong>Ville</strong> <div class="be-text-tags">{{ old('ville_text') ? '#' . old('ville_text') . '#' : ''}}</div></a>
                                    <div class="be-popup">
                                        <h3 class="letf-menu-article">
                                            Nom de la ville 
                                        </h3>
                                           
                                            {!! Form::open(array('home' => 'home','method'=>'GET', 'class' => 'input-search', 'id' => 'search-by-ville')) !!}
                            
                                                                                                                                                              
                                                 <input class="input-signtype" name="ville_text"  id="search_ville_autocomplete" type="text" 
                                                 placeholder="Saisissez et Selectionnez la ville à chercher" required="" value="{{ old('ville_text') }}">
                                                 <input name="ville_id" type="hidden" id="search_ville_id" value="{{ old('ville_id') }}"/>  
                                                

                                            {!! Form::close() !!}
                                        <i class="fa fa-times"></i>
                                    </div>
                                </li>

                                <li><a><i class="fa fa-map-pin"></i><strong>Code postal </strong><div class="be-text-tags">{{ old('cp_text') ? '#' . old('cp_text') . '#' : '' }}</div></a>
                                    <div class="be-popup">
                                        <h3 class="letf-menu-article">
                                            Code postal 
                                        </h3>                                            
                                            {!! Form::open(array('home' => 'home','method'=>'GET', 'class' => 'input-search', 'id' => 'search-by-cp')) !!}
                            
                                                                                                                                                              
                                                 <input class="input-signtype" name="cp_text"  id="search_cp_autocomplete" type="text" 
                                                 placeholder="Saisissez le code postal et Selectionnez la ville à chercher" required="" value="{{ old('cp_text') }}">
                                                <input name="cp_id" type="hidden" id="search_cp_id" value="{{ old('cp_id') }}"/>  


                                            {!! Form::close() !!}
                                        <i class="fa fa-times"></i>
                                    </div>
                                </li>


                                <li><a><i class="fa fa-graduation-cap"></i><strong>Etablissement</strong> <div class="be-text-tags">{{ old('etablissement_text') ? '#' . old('etablissement_text') . '#' : ''}}</div></a>
                                    <div class="be-popup">
                                        <h3 class="letf-menu-article">
                                            Nom de l'établissement scolaire 
                                        </h3>


                                            {!! Form::open(array('home' => 'home','method'=>'GET', 'class' => 'input-search', 'id' => 'search-by-etablissement')) !!}
                            
                                                                                                                                                              
                                                 <input class="input-signtype" name="etablissement_text"  id="search_etablissement_autocomplete" type="text" 
                                                 placeholder="Saisissez et Selectionnez un établissement scolaire" required="" value="{{ old('etablissement_text') }}">
                                                <input name="etablissement_id" type="hidden" id="search_etablissement_id" value="{{ old('etablissement_id') }}"/>
                                               

                                            {!! Form::close() !!}
                                        <i class="fa fa-times"></i>
                                    </div>
                                </li>                               
                            </ul>
                        </div>
                    </div>

                </div>  


                <div class="col-md-10">
                    <div class="row">

                        <!-- user -->
                        @foreach($villeAccueils as $villeAccueil)
                           
                            <div class="grid-item col-xs-12 col-sm-6 col-md-4">
                                <div class="blog-post">
                                                      
                                    <a class="post-preview post-image" href="#" onclick="alert('Veuillez vous inscrire pour afficher les personnes qui peuvvent vous accueillir dans cette ville')">
                                        
                                        @if ($villeAccueil->photo != null )
                                            <img  class="img-responsive img-full-ville" src="{{ str_replace("laravel-filemanager/files", "uploads", "$villeAccueil->photo" ) }}" alt="">
                                        @endif
                                        <img class="img-responsive img-full-ville" src="https://maps.googleapis.com/maps/api/staticmap?center={{ $villeAccueil->gps_y }},{{ $villeAccueil->gps_x }}&zoom=5&size=340x200&maptype=terrain&key=AIzaSyACbGA49deTC9uDfTmor2poXAh3CQrtdJ8&format=png&visual_refresh=true&markers=size:mid%7Ccolor:0x1624a1%7Clabel:{{ $villeAccueil->utilisateurs->count() }}%7C{{ $villeAccueil->gps_y }},{{ $villeAccueil->gps_x }}" alt="">
                                    </a>

                                                                                                               
                                                                
                                        <div class="info-block">
                                            <a href="#" onclick="alert('Veuillez vous inscrire ou vous connecter par Facebook pour afficher les personnes qui peuvent vous accueillir dans cette ville')" class="be-use-name">{{ $villeAccueil->nom }}</a> 
                                            <span><i class="fa fa fa-handshake-o"></i> {{ $villeAccueil->rencontres->count()}}</span>
                                            <span><i class="fa fa-users"></i> {{ $villeAccueil->utilisateurs->count() }}</span>                                           
                                        </div>                                                              
                                   
                                </div>                  
                            </div>



                        @endforeach
                        <!-- / user --> 
                    </div>
                </div>

            </div>
        </div>
    </div>


    @endif
@endsection


@section('jsscript')
       <script>

        // {{ URL::to('search/autocompleteVille') }}
        var options = {

          url: function(phrase) {
            return "{{ URL::to('search/autocompleteVilleAccueil') }}";
          },

          getValue: function(element) {
            return element.name;
          },

          ajaxSettings: {
            dataType: "json",
            method: "GET",
            data: {
              dataType: "json"
            }
          },

          preparePostData: function(data) {
            data.phrase = $("#search_ville_autocomplete").val();
            return data;
          },

          list: {

                onClickEvent: function() {
                    var value = $("#search_ville_autocomplete").getSelectedItemData().id;
                    $("#search_ville_id").val(value).trigger("change");
                    $("#search-by-ville" ).submit();
                },
                maxNumberOfElements: 100,
                match: {
                    enabled: true
                }
            },
          
          theme: "plate-dark",


          requestDelay: 400
        };

        $("#search_ville_autocomplete").easyAutocomplete(options);


        /////////////////
         // {{ URL::to('search/autocompleteVille') }}
        var options2 = {

          url: function(phrase) {
            return "{{ URL::to('search/autocompleteCodePostalAccueil') }}";
          },

          getValue: function(element) {
            return element.name;
          },

          ajaxSettings: {
            dataType: "json",
            method: "GET",
            data: {
              dataType: "json"
            }
          },

          preparePostData: function(data) {
            data.phrase = $("#search_cp_autocomplete").val();
            return data;
          },

          list: {

                onClickEvent: function() {
                    var value = $("#search_cp_autocomplete").getSelectedItemData().id;
                    $("#search_cp_id").val(value).trigger("change");
                    $("#search-by-cp" ).submit();
                },
                maxNumberOfElements: 100,
                match: {
                    enabled: true
                }
            },
          
          theme: "plate-dark",


          requestDelay: 400
        };

        $("#search_cp_autocomplete").easyAutocomplete(options2);


        /////////////////
         // {{ URL::to('search/autocompleteVille') }}
        var options3 = {

          url: function(phrase) {
            return "{{ URL::to('search/autocompleteEtablissementAccueil') }}";
          },

          getValue: function(element) {
            return element.name;
          },

          ajaxSettings: {
            dataType: "json",
            method: "GET",
            data: {
              dataType: "json"
            }
          },

          preparePostData: function(data) {
            data.phrase = $("#search_etablissement_autocomplete").val();
            return data;
          },

          list: {

                onClickEvent: function() {
                    var value = $("#search_etablissement_autocomplete").getSelectedItemData().id;
                    $("#search_etablissement_id").val(value).trigger("change");
                    $("#search-by-etablissement" ).submit();
                },
                maxNumberOfElements: 100,
                match: {
                    enabled: true
                }
            },
          
          theme: "plate-dark",


          requestDelay: 400
        };

        $("#search_etablissement_autocomplete").easyAutocomplete(options3);

        @if(Auth::user())
            /////////////////
             // {{ URL::to('search/autocompleteVille') }}
            var options4 = {

              url: function(phrase) {
                return "{{ URL::to('search/autocompleteMembreAccueil') }}";
              },

              getValue: function(element) {
                return element.name;
              },

              ajaxSettings: {
                dataType: "json",
                method: "GET",
                data: {
                  dataType: "json"
                }
              },

              preparePostData: function(data) {
                data.phrase = $("#search_membre_autocomplete").val();
                return data;
              },

              list: {

                    onClickEvent: function() {
                        var value = $("#search_membre_autocomplete").getSelectedItemData().id;
                        $("#search_membre_id").val(value).trigger("change");
                        $("#search-by-membre" ).submit();
                    },
                    maxNumberOfElements: 100,
                    match: {
                        enabled: true
                    }
                },
              
              theme: "plate-dark",


              requestDelay: 400
            };

            $("#search_membre_autocomplete").easyAutocomplete(options4);



        @endif

        $('div.easy-autocomplete').css('width', '100%');
        $('input.input-signtype').css('width', '100%');
        //$('div.easy-autocomplete').css('line-height', '40px');

        
        </script>       
    
  

@endsection


