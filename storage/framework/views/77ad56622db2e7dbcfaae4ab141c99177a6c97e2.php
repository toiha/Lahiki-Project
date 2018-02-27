<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <meta property="og:image" content="http://www.lahiki.fr/img/img_src.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="250">
    <meta property="og:image:height" content="134">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="image_src" href="http://www.lahiki.fr/img/img_src.png" />

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">

    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/icon.css" rel="stylesheet">
    <link href="/css/loader.css" rel="stylesheet">
    <link href="/css/idangerous.swiper.css" rel="stylesheet">
    <link href="/css/stylesheet.css" rel="stylesheet">

    <link rel="stylesheet" href="/css/easy-autocomplete.css"> 
    <link rel="stylesheet" href="/css/easy-autocomplete.themes.css"> 

    <?php echo $__env->yieldContent('csslink'); ?>

</head>


    <body>

    <!-- THE LOADER 

    <div class="be-loader">
            <div class="spinner">
                <div class="spinner-container container1">
                <div class="circle1"></div>
                <div class="circle2"></div>
                <div class="circle3"></div>
                <div class="circle4"></div>
                </div>
                <div class="spinner-container container2">
                <div class="circle1"></div>
                <div class="circle2"></div>
                <div class="circle3"></div>
                <div class="circle4"></div>
                </div>
                <div class="spinner-container container3">
                <div class="circle1"></div>
                <div class="circle2"></div>
                <div class="circle3"></div>
                <div class="circle4"></div>
                </div>
            </div>
        </div>

        -->
    <!-- THE HEADER -->
    <?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>    
        
    <!-- MAIN CONTENT -->       
    <?php echo $__env->yieldContent('content'); ?>

    <!-- THE FOOTER -->
    <?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php if(!Auth::user()): ?>
        <div class="be-fixed-filter"></div>
        
        <div class="large-popup login">
            <div class="large-popup-fixed"></div>
            <div class="container large-popup-container">
                <div class="row">
                    <div class="col-md-8 col-md-push-2 col-lg-6 col-lg-push-3  large-popup-content">
                        


                        <div class="row">

                            <div class="col-md-12">
                                <i class="fa fa-times close-button"></i>
                                <h5 class="large-popup-title">Connexions</h5>
                            </div>

                            <?php if(count($errors) > 0): ?>
                                <div class="col-md-12">
                                    <div class="alert alert-danger ">
                                        <strong>Oops!</strong> Il y'a des erreurs de saisie<br><br>
                                        <ul>
                                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><?php echo e($error); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                </div>
                                <?php endif; ?>

                            <?php echo Form::open(array('route' => 'connexion','method'=>'POST', 'class' => 'popup-input-search', 'id' => 'connexion-form')); ?>

                            
                            <div class="col-md-6">
                                <input class="input-signtype" value="<?php echo e(old('email')); ?>" type="email" required="" placeholder="Votre email" name="email">
                            </div>
                            <div class="col-md-6">
                                <input class="input-signtype" type="password" required="" placeholder="Mot de passe" name="password">
                            </div>
                            <div class="col-xs-6">
                                <div class="be-checkbox">
                                <label class="check-box">
                                        <input class="checkbox-input" type="checkbox" value="1" name="remember"> <span class="check-box-sign"></span>
                                    </label>
                                    <span class="large-popup-text">
                                        Se souvenir de moi
                                    </span>
                                </div>
                                
                                <a href="#" class="link-large-popup"> > Mot de passe oublié ?</a>
                                <a href="<?php echo e(URL::to('redirect')); ?>" class="link-large-popup" id="btn-inscription-facebook"> > Se connecter avec Facebook</a>
                                <a href="#" class="link-large-popup" id="btn-inscription"> > S'inscrire</a>
                                

                            </div>
                            <div class="col-xs-6 for-signin">
                                <input type="submit" class="be-popup-sign-button" value="Connexion">
                            </div>
                            <?php echo Form::close(); ?>

                        </div>



                       

                    </div>
                </div>
            </div>
        </div>



        <div class="large-popup register">
            <div class="large-popup-fixed"></div>
            <div class="container large-popup-container">
                <div class="row">
                    <div class="col-md-10 col-md-push-1 col-lg-8 col-lg-push-2 large-popup-content">
                        <div class="row">
                            <div class="col-md-12">
                                <i class="fa fa-times close-button"></i>
                                <h5 class="large-popup-title">S'inscrire</h5>
                            </div>

                            <?php if(count($errors) > 0): ?>
                                <div class="col-md-12">
                                    <div class="alert alert-danger ">
                                        <strong>Oops!</strong> Il y'a des erreurs de saisie<br><br>
                                        <ul>
                                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><?php echo e($error); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                </div>
                                <?php endif; ?>
                            
                            <?php echo Form::open(array('route' => 'inscription','method'=>'POST', 'class' => 'popup-input-search', 'id' => 'register-form')); ?>

                               
        
                                <div class="col-md-6">                                    
                                    <?php echo Form::text('nom', null, array('class' => 'input-signtype', 'placeholder' => 'Nom', 'required' => '')); ?>

                                </div>
                                <div class="col-md-6">                
                                    <?php echo Form::text('prenom', null, array('class' => 'input-signtype', 'placeholder' => 'Prénom')); ?>

                                </div>
                                <div class="col-md-6">                                     
                                    <?php echo Form::text('email', null, array('class' => 'input-signtype', 'placeholder' => 'Email', 'required' => '')); ?>                         
                                </div>
                                <div class="col-md-6">                    
                                    <?php echo Form::text('tel_portable', null, array('class' => 'input-signtype', 'placeholder' => 'Téléphone portable')); ?>

                                </div>
                                <div class="col-md-6">
                                    <?php echo e(Form::password('password', array('class' => 'input-signtype', 'placeholder' => 'Mot de passe', 'required' => ''))); ?>

                                </div>
                                <div class="col-md-6">
                                    <?php echo e(Form::password('confirm_password', array('class' => 'input-signtype', 'placeholder' => 'Confirmation du mot de passe', 'required' => ''))); ?>

                                </div>
                                <div class="col-md-6">            
                                    <?php echo Form::text('tel_fixe', null, array('class' => 'input-signtype', 'placeholder' => 'Téléphone fixe')); ?>

                                </div>
                                <div class="col-md-6">                            
                                    <?php echo Form::text('adresse', null, array('class' => 'input-signtype', 'placeholder' => 'Adresse')); ?>

                                </div>
                                <div class="col-md-6">
                                    <span class="large-popup-text">
                                        Je peux accueillir les étudiants des projets Wu Lahiki ?
                                    </span>
                                    <?php echo e(Form::radio('is_accueilleur', '1', (old('is_accueilleur') == '1'))); ?> Oui 
                                    &nbsp;&nbsp; <?php echo e(Form::radio('is_accueilleur', '0', (old('is_accueilleur') != '1'))); ?> Non

                                </div>
                                <div class="col-md-6">                       
                                        <input class="input-signtype" name="ville_text"  value="<?php echo e(old('ville_text')); ?>" 
                                        id="ville_autocomplete" type="text" placeholder="Saisissez votre ville" required="">
                                        <input name="ville_id" type="hidden" id="ville_id" value="<?php echo e(old('ville_id')); ?>"/>                       
                                </div>
                                <div class="col-md-6">
                                    <br>
                                    <input type="submit" class="btn color-1 size-1 hover-1" value="Inscription">
                    
                                </div>
                            
                             <?php echo Form::close(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- SCRIPTS     -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script   src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
              integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
              crossorigin="anonymous"></script>
    <script src="/js/bootstrap.min.js"></script>     
    <script src="/js/idangerous.swiper.min.js"></script>
    <script src="/js/isotope.pkgd.min.js"></script>
    <script src="/js/jquery.viewportchecker.min.js"></script>  
    <script src="/js/jquery.easy-autocomplete.min.js"></script> 

    <!--     
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;language=en"></script> 
    <script src="/js/map.js"></script>
    -->

    <script src="/js/global.js"></script> 

    <?php if(!Auth::user()): ?>
        <script>

        // <?php echo e(URL::to('search/autocompleteVille')); ?>

        var options = {

          url: function(phrase) {
            return "<?php echo e(URL::to('search/autocompleteVille')); ?>";
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
            data.phrase = $("#ville_autocomplete").val();
            return data;
          },

          list: {

                onClickEvent: function() {
                    var value = $("#ville_autocomplete").getSelectedItemData().id;
                    $("#ville_id").val(value).trigger("change");
                }
            },
          
          //theme: "plate-dark",


          requestDelay: 400
        };

        $("#ville_autocomplete").easyAutocomplete(options);

        $('div.easy-autocomplete').css('width', '100%');
        //$('div.easy-autocomplete').css('line-height', '40px');


        </script>

        
    
    <?php endif; ?>

    <?php if(count($errors) > 0): ?>
        <script>
            // Error on register form        
            $(".large-popup.<?php echo e(old('is_accueilleur') != null ? 'register' :  'login'); ?>").slideDown();
        </script>
    <?php endif; ?>

    <?php echo $__env->yieldContent('jsscript'); ?>




</body>
</html>

