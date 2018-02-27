

@extends('layouts.main')

@section('content')

<!-- MAIN CONTENT -->
    <div id="content-block">
        <div class="head-bg style-2">
            <div class="head-bg-img">                
                @if ($actualite != null and $actualite->media != null)
                    <img src="{{ $actualite->media != null ? str_replace("laravel-filemanager/files", "uploads", "$actualite->media") : '' }}" class="head-bg-img">
                @endif
            </div>
            <div class="head-bg-content">
                <h1>Pour toute demande</h1>
                <p>Veuillez nous adresser un message dans le formulaire ci-dessous</p>
            </div>  
        </div>  
        <div class="container be-detail-container">
            <div class="block">
                <h2 class="content-title">Nos coordonnées</h2>                   
                <div class="contact-info block">
                    <div class="contact-header">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4">
                                <div class="contact-entry">
                                    <h4 class="contact-label"><img src="/img/marker.png" alt=""> Address</h4>
                                    <div class="contact-text">
                                        <p>8 rue gambetta</p>
                                        <p>31 021 Toulouse</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4">
                                <div class="contact-entry">
                                    <h4 class="contact-label"><img src="/img/phone-ico.png" alt=""> Téléphones</h4>
                                    <div class="contact-text">
                                        <p><a href="tel:+99123456789001">06 39 69 68 58</a></p>
                                        <p><a href="tel:+1234556789">06 46 84 93 18</a></p>
                                    </div>
                                </div>                      
                            </div>                      
                            <div class="col-xs-12 col-sm-4">
                                <div class="contact-entry">
                                    <h4 class="contact-label"><img src="/img/mail-ico.png" alt=""> Email</h4>
                                    <div class="contact-text">
                                        <p><a href="mailto:NRGNetwork@contact.com">contact@lahiki.net</a></p>
                                        <p><a href="mailto:Support@gmail.com">contact.lahiki@gmail.com</a></p>
                                    </div>
                                </div>                      
                            </div>          
                        </div>              
                    </div>
                    <div id="map-canvas"></div>                                
                </div>
            </div>

            <div class="block">
                <h2 class="content-title">Laissez nous votre message</h2>
                <div class="block-subtitle">N’oubliez pas de nous indiquer vos contacts (Nom, mail, téléphone) et la raison de votre contact </div>                         
                <div class="contect-form">

                        @if ($message = Session::get('success'))
                          <div class="alert alert-success">
                            <p>{{ $message }}</p>
                          </div>
                        @endif
                   
               

              


                    
                        {!! Form::open(array('route' => 'contactsite','method'=>'POST', 'class' => 'form-block')) !!}
                            
                        <div class="row">

                           
                            @if(Session::has('message'))
                                <div class="alert alert-success">
                                  {{Session::get('message')}}
                                </div>
                            @endif

                             
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group fl_icon">
                                    <div class="icon"><img src="/img/user-g-ico.png" alt=""></div>
                                    <input name="nom" class="form-input" type="text" required="" placeholder="Votre nom" autofocus="true">                               
                                </div>
                            </div> 
                                   
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group fl_icon">
                                    <div class="icon"><img src="/img/mail-g-ico.png" alt=""></div>
                                    <input name="email" class="form-input" type="text" required="" placeholder="Votre email" autofocus="true">                             
                                </div>
                            </div> <div class="col-xs-12 col-sm-6">
                                <div class="form-group fl_icon">
                                    <div class="icon"><img src="/img/phone-g-ico.png" alt=""></div>
                                    <input name="telephone" class="form-input" type="text" placeholder="Votre téléphone" autofocus="true">                            
                                </div>
                            </div> <div class="col-xs-12 col-sm-6">
                                <div class="form-group fl_icon">
                                    <div class="icon"><img src="/img/subject-ico.png" alt=""></div>
                                    <input name="sujet" class="form-input" type="text" placeholder="Sujet de votre message" autofocus="true">                     
                                </div>
                            </div> 
                                   



                               
                            <div class="col-xs-12">                                 
                                <div class="form-group">
                                    <div class="icon"><img src="/img/icon-comment.png" alt=""></div>                                    
                                    <textarea class="form-input" name="message" rows="6" id="message" placeholder="Votre message"></textarea>
                                </div>
                            </div>
                              <div class="form-group">
                                    <button name="contact-button" type="submit" class="btn color-1 size-2 hover-1 pull-right">Envoyer</button>
                                </div>            

                            
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('jsscript')

    <script>
      var map;
      function initMap() {
        var villeRencontre = {lat: 43.602307, lng: 1.441210};

        map = new google.maps.Map(document.getElementById('map-canvas'), {
          center: villeRencontre,
          zoom: 8
        });

        var contentString = '<p> Nous sommes ici</p>';

        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });

        var marker = new google.maps.Marker({
            position: villeRencontre,
            color: 'green',
            title: 'Nous contacter',
            map: map
        });

        marker.addListener('click', function() {
            infowindow.open(map, marker);
        });

        infowindow.open(map, marker);
        


      }

    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAW76XtwMbns0QLBjAvitfaM96xNeQ1tpk&callback=initMap" async defer></script>

@endsection