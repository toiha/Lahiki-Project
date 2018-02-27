<?php $__env->startSection('csslink'); ?>


<?php $__env->stopSection(); ?>




<?php $__env->startSection('content'); ?>



<?php if($message = Session::get('success')): ?>
  <div class="alert alert-success">
    <p><?php echo e($message); ?></p>
  </div>
<?php endif; ?>


<div id="content-block">
        <div class="head-bg">
            <div class="head-bg-img">
                <?php if($actualite != null and $actualite->media != null): ?>
                    <img src="<?php echo e($actualite->media != null ? str_replace("laravel-filemanager/files", "uploads", "$actualite->media") : ''); ?>" class="head-bg-img">
                <?php endif; ?>
            </div>
            <div class="head-bg-content">
                <h1>Votre réseau d'accueil des élèves mahorais</h1>
                <p>Le site a pour but de mettre en relation les nouveaux étudiants mahorais avec les anciens ou
actuels étudiants mahorais hors de Mayotte. Et ainsi permettre un meilleur accueil dans les
villes d’études.</p>
                <?php if(!Auth::user()): ?>
                    <a class="btn color-1 size-1 hover-1" href="<?php echo e(URL::to('redirect')); ?>"><i class="fa fa-facebook"></i>S'enregistrer via facebook</a>
                    <a class="be-register btn color-3 size-1 hover-6"><i class="fa fa-lock"></i>Inscrivez-vous maintenant</a>
                <?php endif; ?>
            </div>  
        </div>



       

    <?php if(Auth::user()): ?>

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
                                <li><a><i class="fa fa-building"></i><strong>Ville</strong> <div class="be-text-tags"><?php echo e(old('ville_text') ? '#' . old('ville_text') . '#' : ''); ?></div></a>
                                    <div class="be-popup">
                                        <h3 class="letf-menu-article">
                                            Nom de la ville 
                                        </h3>
                                           
                                            <?php echo Form::open(array('home' => 'home','method'=>'GET', 'class' => 'input-search', 'id' => 'search-by-ville')); ?>

                            
                                                                                                                                                              
                                                 <input class="input-signtype" name="ville_text"  id="search_ville_autocomplete" type="text" 
                                                 placeholder="Saisissez et Selectionnez la ville à chercher" required="" value="<?php echo e(old('ville_text')); ?>">
                                                <input name="ville_id" type="hidden" id="search_ville_id" value="<?php echo e(old('ville_id')); ?>"/>  
                                                


                                            <?php echo Form::close(); ?>

                                        <i class="fa fa-times"></i>
                                    </div>
                                </li>

                                <li><a><i class="fa fa-map-pin"></i><strong>Code postal </strong><div class="be-text-tags"><?php echo e(old('cp_text') ? '#' . old('cp_text') . '#' : ''); ?></div></a>
                                    <div class="be-popup">
                                        <h3 class="letf-menu-article">
                                            Code postal 
                                        </h3>                                            
                                            <?php echo Form::open(array('home' => 'home','method'=>'GET', 'class' => 'input-search', 'id' => 'search-by-cp')); ?>

                            
                                                                                                                                                              
                                                 <input class="input-signtype" name="cp_text"  id="search_cp_autocomplete" type="text" 
                                                 placeholder="Saisissez le code postal et Selectionnez la ville à chercher" required="" value="<?php echo e(old('cp_text')); ?>">
                                                <input name="cp_id" type="hidden" id="search_cp_id" value="<?php echo e(old('cp_id')); ?>"/>  
                                               

                                            <?php echo Form::close(); ?>

                                        <i class="fa fa-times"></i>
                                    </div>
                                </li>


                                <li><a><i class="fa fa-graduation-cap"></i><strong>Etablissement</strong> <div class="be-text-tags"><?php echo e(old('etablissement_text') ? '#' . old('etablissement_text') . '#' : ''); ?></div></a>
                                    <div class="be-popup">
                                        <h3 class="letf-menu-article">
                                            Nom de l'établissement scolaire 
                                        </h3>


                                            <?php echo Form::open(array('home' => 'home','method'=>'GET', 'class' => 'input-search', 'id' => 'search-by-etablissement')); ?>

                            
                                                                                                                                                              
                                                 <input class="input-signtype" name="etablissement_text"  id="search_etablissement_autocomplete" type="text" 
                                                 placeholder="Saisissez et Selectionnez un établissement scolaire" required="" value="<?php echo e(old('etablissement_text')); ?>">
                                                <input name="etablissement_id" type="hidden" id="search_etablissement_id" value="<?php echo e(old('etablissement_id')); ?>"/>
                                               


                                            <?php echo Form::close(); ?>

                                        <i class="fa fa-times"></i>
                                    </div>
                                </li>

                                <li><a><i class="fa fa-users"></i><strong>Nom du membre</strong> <div class="be-text-tags"><?php echo e(old('membre_text') ? '#' . old('membre_text') . '#' : ''); ?></div></a>
                                    <div class="be-popup">
                                        <h3 class="letf-menu-article">
                                            Nom ou prénom du membre
                                        </h3>                                            

                                             <?php echo Form::open(array('home' => 'home','method'=>'GET', 'class' => 'input-search', 'id' => 'search-by-membre')); ?>

                            
                                                                                                                                                              
                                                <input class="input-signtype" name="membre_text"  id="search_membre_autocomplete" type="text" 
                                                 placeholder="Saisissez et Selectionnez le nom ou le prénom d'un membre" required="" value="<?php echo e(old('membre_text')); ?>">
                                                <input name="membre_id" type="hidden" id="search_membre_id" value="<?php echo e(old('membre_id')); ?>"/>  


                                            <?php echo Form::close(); ?>



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
                        <?php $__currentLoopData = $utilisateurs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $utilisateur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="custom-column-5">

                                <div class="be-user-block style-2">
                                    <a class="be-ava-user style-2" href="<?php echo e(URL::to('site/profil?id=' . $utilisateur->id )); ?>">
                                        <img src="<?php echo e(($utilisateur->avatar != null ? $utilisateur->avatar : '/laravel-filemanager/photos/8/20170625_193351.png')); ?>" alt=""> 
                                    </a>
                                    <?php if($utilisateur->rencontres != null and $utilisateur->rencontres->count() > 0): ?>
                                    <div class="be-user-counter">
                                        <div class="c_number"><?php echo e(($utilisateur->rencontres != null ? $utilisateur->rencontres->count() : 'Aucun ')); ?></div>
                                        <div class="c_text">Lahiki</div>
                                    </div>
                                    <?php endif; ?>
                                    <a href="<?php echo e(URL::to('site/profil?id=' . $utilisateur->id )); ?>" class="be-use-name">
                                        <?php echo e(($utilisateur->ville != null ? $utilisateur->ville->nom : 'Ville non renseigné')); ?>, 
                                        <?php echo e(($utilisateur->ville != null ? $utilisateur->ville->departement->nom : ' Département non renseigné')); ?> </a>
                                    <p class="be-user-info"><a href="<?php echo e(URL::to('site/profil?id=' . $utilisateur->id )); ?>"><?php echo e($utilisateur->prenom); ?> <?php echo e($utilisateur->nom); ?></a></p>
                                    <div class="be-text-tags">
                                        <a href="<?php echo e(URL::to('site/profil?id=' . $utilisateur->id )); ?>"><?php echo e($utilisateur->apropos); ?></a>
                                    </div>
                                    <div class="info-block">
                                        <span><i class="fa fa-thumbs-o-up"></i> 360</span>
                                        <span><i class="fa fa-eye"></i> 789</span>
                                    </div>  
                                </div>
                            </div>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <!-- / user -->


                       
   
 


                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php else: ?>







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
                                <li><a><i class="fa fa-building"></i><strong>Ville</strong> <div class="be-text-tags"><?php echo e(old('ville_text') ? '#' . old('ville_text') . '#' : ''); ?></div></a>
                                    <div class="be-popup">
                                        <h3 class="letf-menu-article">
                                            Nom de la ville 
                                        </h3>
                                           
                                            <?php echo Form::open(array('home' => 'home','method'=>'GET', 'class' => 'input-search', 'id' => 'search-by-ville')); ?>

                            
                                                                                                                                                              
                                                 <input class="input-signtype" name="ville_text"  id="search_ville_autocomplete" type="text" 
                                                 placeholder="Saisissez et Selectionnez la ville à chercher" required="" value="<?php echo e(old('ville_text')); ?>">
                                                 <input name="ville_id" type="hidden" id="search_ville_id" value="<?php echo e(old('ville_id')); ?>"/>  
                                                

                                            <?php echo Form::close(); ?>

                                        <i class="fa fa-times"></i>
                                    </div>
                                </li>

                                <li><a><i class="fa fa-map-pin"></i><strong>Code postal </strong><div class="be-text-tags"><?php echo e(old('cp_text') ? '#' . old('cp_text') . '#' : ''); ?></div></a>
                                    <div class="be-popup">
                                        <h3 class="letf-menu-article">
                                            Code postal 
                                        </h3>                                            
                                            <?php echo Form::open(array('home' => 'home','method'=>'GET', 'class' => 'input-search', 'id' => 'search-by-cp')); ?>

                            
                                                                                                                                                              
                                                 <input class="input-signtype" name="cp_text"  id="search_cp_autocomplete" type="text" 
                                                 placeholder="Saisissez le code postal et Selectionnez la ville à chercher" required="" value="<?php echo e(old('cp_text')); ?>">
                                                <input name="cp_id" type="hidden" id="search_cp_id" value="<?php echo e(old('cp_id')); ?>"/>  


                                            <?php echo Form::close(); ?>

                                        <i class="fa fa-times"></i>
                                    </div>
                                </li>


                                <li><a><i class="fa fa-graduation-cap"></i><strong>Etablissement</strong> <div class="be-text-tags"><?php echo e(old('etablissement_text') ? '#' . old('etablissement_text') . '#' : ''); ?></div></a>
                                    <div class="be-popup">
                                        <h3 class="letf-menu-article">
                                            Nom de l'établissement scolaire 
                                        </h3>


                                            <?php echo Form::open(array('home' => 'home','method'=>'GET', 'class' => 'input-search', 'id' => 'search-by-etablissement')); ?>

                            
                                                                                                                                                              
                                                 <input class="input-signtype" name="etablissement_text"  id="search_etablissement_autocomplete" type="text" 
                                                 placeholder="Saisissez et Selectionnez un établissement scolaire" required="" value="<?php echo e(old('etablissement_text')); ?>">
                                                <input name="etablissement_id" type="hidden" id="search_etablissement_id" value="<?php echo e(old('etablissement_id')); ?>"/>
                                               

                                            <?php echo Form::close(); ?>

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
                        <?php $__currentLoopData = $villeAccueils; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $villeAccueil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           
                            <div class="grid-item col-xs-12 col-sm-6 col-md-4">
                                <div class="blog-post">
                                                      
                                    <a class="post-preview post-image" href="#" onclick="alert('Veuillez vous inscrire pour afficher les personnes qui peuvvent vous accueillir dans cette ville')">
                                        
                                        <?php if($villeAccueil->photo != null ): ?>
                                            <img  class="img-responsive img-full-ville" src="<?php echo e(str_replace("laravel-filemanager/files", "uploads", "$villeAccueil->photo" )); ?>" alt="">
                                        <?php endif; ?>
                                        <img class="img-responsive img-full-ville" src="https://maps.googleapis.com/maps/api/staticmap?center=<?php echo e($villeAccueil->gps_y); ?>,<?php echo e($villeAccueil->gps_x); ?>&zoom=5&size=340x200&maptype=terrain&key=AIzaSyACbGA49deTC9uDfTmor2poXAh3CQrtdJ8&format=png&visual_refresh=true&markers=size:mid%7Ccolor:0x1624a1%7Clabel:<?php echo e($villeAccueil->utilisateurs->count()); ?>%7C<?php echo e($villeAccueil->gps_y); ?>,<?php echo e($villeAccueil->gps_x); ?>" alt="">
                                    </a>

                                                                                                               
                                                                
                                        <div class="info-block">
                                            <a href="#" onclick="alert('Veuillez vous inscrire ou vous connecter par Facebook pour afficher les personnes qui peuvent vous accueillir dans cette ville')" class="be-use-name"><?php echo e($villeAccueil->nom); ?></a> 
                                            <span><i class="fa fa fa-handshake-o"></i> <?php echo e($villeAccueil->rencontres->count()); ?></span>
                                            <span><i class="fa fa-users"></i> <?php echo e($villeAccueil->utilisateurs->count()); ?></span>                                           
                                        </div>                                                              
                                   
                                </div>                  
                            </div>



                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <!-- / user --> 
                    </div>
                </div>

            </div>
        </div>
    </div>


    <?php endif; ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('jsscript'); ?>
       <script>

        // <?php echo e(URL::to('search/autocompleteVille')); ?>

        var options = {

          url: function(phrase) {
            return "<?php echo e(URL::to('search/autocompleteVilleAccueil')); ?>";
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
         // <?php echo e(URL::to('search/autocompleteVille')); ?>

        var options2 = {

          url: function(phrase) {
            return "<?php echo e(URL::to('search/autocompleteCodePostalAccueil')); ?>";
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
         // <?php echo e(URL::to('search/autocompleteVille')); ?>

        var options3 = {

          url: function(phrase) {
            return "<?php echo e(URL::to('search/autocompleteEtablissementAccueil')); ?>";
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

        <?php if(Auth::user()): ?>
            /////////////////
             // <?php echo e(URL::to('search/autocompleteVille')); ?>

            var options4 = {

              url: function(phrase) {
                return "<?php echo e(URL::to('search/autocompleteMembreAccueil')); ?>";
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



        <?php endif; ?>

        $('div.easy-autocomplete').css('width', '100%');
        $('input.input-signtype').css('width', '100%');
        //$('div.easy-autocomplete').css('line-height', '40px');

        
        </script>       
    
  

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>