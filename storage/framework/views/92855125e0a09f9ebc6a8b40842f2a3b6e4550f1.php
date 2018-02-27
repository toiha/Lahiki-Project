<?php $__env->startSection('content'); ?>
	
	<!-- MAIN CONTENT -->
	<div id="content-block">
		<div class="container be-detail-container">
			<div class="row">
				<div class="col-xs-12 col-md-3 left-feild">
					<div class="be-vidget back-block">
						<a class="btn full color-1 size-1 hover-1" href="<?php echo e(URL::to('site/profil')); ?>"><i class="fa fa-chevron-left"></i>Retour à mon profil</a>
					</div>
					<div class="be-vidget hidden-xs hidden-sm" id="scrollspy">
						<p><br></p>
						<h3 class="letf-menu-article">
							Choissez la catégorie
						</h3>
						<div class="creative_filds_block">
							<ul class="ul nav">
								<li><a href="#basic-information">Informations basiques</a></li>
								<li><a href="#edit-password">Modifier mon mot de passe</a></li>
								<li><a href="#about-me">A propos de moi</a></li>
							</ul>
						</div>
					</div>

				</div>

				<div class="col-xs-12 col-md-9 _editor-content_">
					<?php echo Form::model($utilisateur, ['method' => 'POST','route' => ['updateprofil', $utilisateur->id]]); ?> 
					<input type="hidden" name="profil-section" value="basique">                        
					<div class="affix-block" id="basic-information">
						<div class="be-large-post">
							<div class="info-block style-2">
								<div class="be-large-post-align"><a name="basic-information"></a><h3 class="info-block-label">Informations basiques</h3></div>
							</div>
							
							<div class="be-large-post-align">
								<div class="be-change-ava">
									<a class="btn color-4 size-2 hover-7 be-ava-user style-2" id="lfm" data-input="thumbnail" data-preview="holder">
										<img id="holder" src="<?php echo e(($utilisateur->avatar != null ? $utilisateur->avatar : '/img/ava_10.jpg' )); ?>" style="margin-top:15px;max-height:100px;">
									
									<i class="fa fa-picture-o"></i> Remplacer votre image

									
									</a>
									<input id="thumbnail" class="form-control" type="hidden" name="avatar">
								</div>


							</div>
							<div class="be-large-post-align">
								<div class="row">
									<div class="input-col col-xs-12 col-sm-6">
										<div class="form-group fg_icon focus-2">
											<div class="form-label">Nom</div>
											<?php echo Form::text('nom', null, array('class' => 'form-input')); ?>

										</div>							
									</div>
									<div class="input-col col-xs-12 col-sm-6">
										<div class="form-group focus-2">
											<div class="form-label">Prénom</div>									
											<?php echo Form::text('prenom', null, array('class' => 'form-input')); ?>

										</div>								
									</div>
									<div class="input-col col-xs-12">
										<div class="form-group focus-2">
											<div class="form-label">Email</div>									
											<?php echo Form::text('email', null, array('class' => 'form-input')); ?>

										</div>								
									</div>
									<div class="input-col col-xs-12">
										<div class="form-group focus-2">
											<div class="form-label">Adresse</div>									
											<?php echo Form::text('adresse', null, array('class' => 'form-input')); ?>

										</div>								
									</div>



									<div class="input-col col-xs-12">
										<div class="form-group focus-2">
											<div class="form-label">Ville</div>																				 
											 <input class="input-signtype" name="ville_text"  value="<?php echo e($utilisateur->ville != null ? $utilisateur->ville->nom : ''); ?>" 
                                    id="ville_autocomplete" type="text" placeholder="Saisissez votre ville" required="">
                                    <input name="ville_id" type="hidden" id="ville_id" value="<?php echo e($utilisateur->ville_id); ?>"/>  


										</div>								
									</div>



									<div class="input-col col-xs-12 col-sm-6">
										<div class="form-group focus-2">
											<div class="form-label">Télephone fixe</div>									
											<?php echo Form::text('tel_fixe', null, array('class' => 'form-input')); ?>

										</div>								
									</div>


									<div class="input-col col-xs-12 col-sm-6">
										<div class="form-group focus-2">
											<div class="form-label">Téléphone portable</div>									
											 <?php echo Form::text('tel_portable', null, array('class' => 'form-input')); ?>

										</div>								
									</div>



									<div class="input-col col-xs-12">
										<div class="form-group focus-2">
											<div class="form-label">Je peux accueillir les étudiants des projets Wu Lahiki ?</div>									
											 <?php echo e(Form::radio('is_accueilleur', '1', ($utilisateur->is_accueilleur == '1'))); ?> Oui &nbsp;&nbsp; <?php echo e(Form::radio('is_accueilleur', '0', ($utilisateur->is_accueilleur == '0'))); ?> Non
										</div>								
									</div>	

									<div class="col-xs-12">										
										<input type="submit" class="btn color-1 size-1 hover-1" value="Changer mes informations basiques">
									</div>				
								</div>
							</div>
						</div>
					</div>
					<?php echo Form::close(); ?>


					<?php echo Form::model($utilisateur, ['method' => 'POST','route' => ['updateprofil', $utilisateur->id]]); ?> 
					<input type="hidden" name="profil-section" value="password">              
					<div class="affix-block" id="edit-password">
						<div class="be-large-post">
							<div class="info-block style-2">
								<div class="be-large-post-align"><a name="edit-password"></a><h3 class="info-block-label">Modifier mon mot de passe</h3></div>
							</div>
							<div class="be-large-post-align">
								<div class="row">
									<div class="input-col col-xs-12 col-sm-4">
										<div class="form-group focus-2">
											<div class="form-label">Ancien mot de passe</div>									
											<?php echo Form::password('old-password', array('class' => 'form-input')); ?>

										</div>								
									</div>
									<div class="input-col col-xs-12 col-sm-4">
										<div class="form-group focus-2">
											<div class="form-label">Nouveau mot de passe</div>									
											<?php echo Form::password('password', array('class' => 'form-input')); ?>

										</div>								
									</div>
									<div class="input-col col-xs-12 col-sm-4">
										<div class="form-group focus-2">
											<div class="form-label">Confirmer le nouveau mot de passe</div>									
											<?php echo Form::password('password_confirmation', array('class' => 'form-input')); ?>

										</div>								
									</div>
									<div class="col-xs-12">
										<input type="submit" class="btn color-1 size-1 hover-1" value="Changer mon mot de passe">
									</div>																
								</div>
							</div>
						</div>
					</div>
					<?php echo Form::close(); ?>


					<?php echo Form::model($utilisateur, ['method' => 'POST','route' => ['updateprofil', $utilisateur->id]]); ?> 
					<input type="hidden" name="profil-section" value="about">              
					<div class="affix-block" id="about-me">
						<div class="be-large-post">
							<div class="info-block style-2">
								<div class="be-large-post-align"><a name="about-me"></a><h3 class="info-block-label">A propos de moi</h3></div>
							</div>
							<div class="be-large-post-align">
								<div class="row">									
									<div class="input-col col-xs-12">
										<div class="form-group focus-2">
											<div class="form-label">Description de moi</div>
											<textarea class="form-input" required="" placeholder="Quelque chose sur vous" name="apropos"><?php echo e($utilisateur->apropos); ?></textarea>
										</div>
									</div>
									<div class="col-xs-12">
										<input type="submit" class="btn color-1 size-1 hover-1" value="Changer à propos de moi">

									</div>	
								</div>
							</div>						
						</div>
					</div>

					<?php echo Form::close(); ?>


																							
				</div>				
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('jsscript'); ?>

		<script src="/vendor/laravel-filemanager/js/lfm.js"></script>


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

                onSelectItemEvent: function() {
                    var value = $("#ville_autocomplete").getSelectedItemData().id;
                    $("#ville_id").val(value).trigger("change");
                },
                maxNumberOfElements: 100,
                match: {
                    enabled: true
                }
            },
          
          //theme: "plate-dark",


          requestDelay: 400
        };

        $("#ville_autocomplete").easyAutocomplete(options);

        $('div.easy-autocomplete').css('width', '100%');
        $('input.input-signtype').css('width', '100%');
        //$('div.easy-autocomplete').css('line-height', '40px');

        // Load image
        $('#lfm').filemanager('image');


        </script>       
    
    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>