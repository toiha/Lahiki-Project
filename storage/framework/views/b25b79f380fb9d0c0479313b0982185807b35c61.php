<?php $__env->startSection('csslink'); ?>
	
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>


<!-- MAIN CONTENT -->
<?php if($show == 'member'): ?>
	<div class="large-popup lahiki">
        <div class="large-popup-fixed"></div>
        <div class="container large-popup-container">
            <div class="row">
                <div class="col-md-10 col-md-push-1 col-lg-8 col-lg-push-2 large-popup-content">
                    <div class="row">
                        <div class="col-md-12">
                            <i class="fa fa-times close-button"></i>
                            <h5 class="large-popup-title">Créer une rencontre</h5>
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
                        
                        <?php echo Form::model($utilisateur, ['method' => 'POST','route' => ['createrencontre'], 'class' => 'popup-input-search' ]); ?>

                         <input name="accueillant_id" type="hidden" value="<?php echo e($utilisateur->id); ?>"/>  
	                        <div class="col-md-6">
	                            <?php echo Form::date('date_rencontre', null, array('class' => 'input-signtype', 'required' => '', 'placeholder' => 'Date de la rencontre')); ?>

	                        </div>

	                        <div class="col-md-6">
	                            <?php echo Form::time('heure_rencontre', null, array('class' => 'input-signtype', 'required' => '', 'placeholder' => 'Heure de la rencontre')); ?>

	                        
	                        </div>
	                        <div class="col-md-6">
	                             <?php echo Form::text('lieu_rencontre', null, array('class' => 'input-signtype', 'required' => '', 'placeholder' => 'Lieu de la rencontre')); ?>

	                        

	                        </div>
	                        <div class="col-md-6">

	                            <input class="input-signtype" name="ville_text"  value="" 
	                                    id="ville_autocomplete" type="text" placeholder="Ville de rencontre souhaitée" required="">
	                                    <input name="ville_id" type="hidden" id="ville_id" value=""/>  


	                        </div>
	                        <div class="col-md-6">
	                             <?php echo Form::text('gps_x', null, array('class' => 'input-signtype', 'placeholder' => 'Coordonnées GPS X')); ?>

	                        
	                        </div>
	                        <div class="col-md-6">                            
	                             <?php echo Form::text('gps_y', null, array('class' => 'input-signtype', 'placeholder' => 'Coordonnées GPS Y')); ?>

	                        
	                        </div>
	                        
	                        <div class="col-md-6 for-signin">
	                            <input type="submit" class="be-popup-lahiki-button" value="Envoyer la demande">
	                        </div>
                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<div id="content-block">
	<div class="container be-detail-container">
		<div class="row">
			<div class="col-xs-12 col-md-4 left-feild">
				<div class="be-user-block style-3">
					<div class="be-user-detail">
						<a class="be-ava-user style-2" href="<?php echo e(URL::to(($show == 'member' ? 'site/profil?id=' . $utilisateur->id : 'site/profiledit') )); ?>">
							<img src="<?php echo e(($utilisateur->avatar != null ? $utilisateur->avatar : '/img/ava_10.jpg' )); ?>" alt=""> 
						</a>
						<?php if($show == 'member' and $utilisateur->id != Auth::user()->id): ?>
							<a class="be-lahiki be-ava-left btn color-1 size-3 hover-1"><i class="fa fa-paper-plane"></i>Rencontrer</a>
							<div class="be-ava-right btn btn-message color-4 size-2 hover-7">
							<i class="fa fa-envelope-o"></i>message
							<div class="message-popup">
								<?php echo Form::open(array('route' => 'contactprofil','method'=>'POST', 'class' => 'popup-input-search')); ?>

								<input name="id" type="hidden" value="<?php echo e($utilisateur->id); ?>"/>  
								<div class="message-popup-inner container">
									<div class="row">
										<div class="col-xs-12 col-sm-8 col-sm-offset-2">
											<i class="fa fa-times close-button"></i>
											<h5 class="large-popup-title">Envoyer un message @ <?php echo e($utilisateur->prenom); ?> <?php echo e($utilisateur->nom); ?></h5>
											<div class="form-group">
												<textarea class="form-input" required="" placeholder="Votre message" name="message"></textarea>
											</div>	
											 <button name="contact-button" type="submit" class="btn color-1 size-2 hover-1 pull-right">Envoyer le message</button>
										</div>
									</div>
								</div>
								<?php echo Form::close(); ?>

							</div>
						</div>
						<?php else: ?>
							<a class="be-ava-left btn color-1 size-2 hover-1" href="<?php echo e(URL::to('site/profiledit')); ?>"><i class="fa fa-pencil"></i>Modifier</a>
						<?php endif; ?>
							
						<!-- 
							<a class="be-ava-left btn color-1 size-2 hover-1"><i class="fa fa-pencil"></i>Edit</a> -->	


						
						<p class="be-use-name"><?php echo e($utilisateur->prenom); ?> <?php echo e($utilisateur->nom); ?></p>
						<div class="be-user-info">
							<?php echo e($utilisateur->ville != null ? $utilisateur->ville->nom : ''); ?>

						</div>
						<div class="be-text-tags style-2"><?php echo e($utilisateur->created_at); ?>

						</div>
						
					</div>

					<?php if($message = Session::get('success')): ?>
                      <div class="alert alert-success">
                        <p><?php echo e($message); ?></p>
                      </div>
                    <?php endif; ?>


					<div class="be-user-statistic">
						<?php if($show == 'self' and $utilisateur->id == Auth::user()->id): ?>
						<div class="stat-row clearfix"><i class="stat-icon icon-views-b"></i>Projets wu lahiki
							<span class="stat-counter"><?php echo e(($utilisateur->rencontres != null ? $utilisateur->rencontres->count() : '0')); ?></span></div>
						<?php endif; ?>
						<div class="stat-row clearfix"><i class="stat-icon icon-like-b"></i>Appréciations
							<span class="stat-counter"><?php echo e(($utilisateur->temoignages != null ? $utilisateur->temoignages->count() : '0')); ?></span></div>
						<div class="stat-row clearfix"><i class="stat-icon icon-followers-b"></i>Relations
							<span class="stat-counter"><?php echo e(($utilisateur->rencontres != null ? $utilisateur->accueillants->count() + $utilisateur->accueillis->count(): '0')); ?></span></div>
					</div>
				</div>
				<div class="be-desc-block">
					<div class="be-desc-author">
						<div class="be-desc-label">A propos de moi</div>
						<div class="clearfix"></div>
						<div class="be-desc-text">
							<?php echo e($utilisateur->apropos); ?>

						</div>
					</div>
					
				</div>										
			</div>
			<div class="col-xs-12 col-md-8">
                <div class="tab-wrapper style-1">
                    <div class="tab-nav-wrapper">
                        <div  class="nav-tab  clearfix">
                        	<?php if($show == 'self' and $utilisateur->id == Auth::user()->id): ?>
	                            <div class="nav-tab-item active">
	                                <span><i class="fa fa-crosshairs" aria-hidden="true"></i> Projets</span>
	                            </div>
	                        <?php endif; ?>
                            <div class="nav-tab-item ">
                                <span><i class="fa fa-heart-o" aria-hidden="true"></i> Appreciations</span>
                            </div>                                                            
                        </div>
                    </div>


                    <div class="tabs-content clearfix">
                        
                    	<?php if($show == 'self' and $utilisateur->id == Auth::user()->id ): ?>
	                        <div class="tab-info active"> 
								<div class="row">

									


									<?php $__currentLoopData = $utilisateur->rencontres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rencontre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

										<div class="col-ml-12 col-xs-6 col-sm-4">
											<div class="be-post">
												<a href="<?php echo e(URL::to('site/profilrencontre?id=' .  $rencontre->id )); ?>" class="be-img-block">
												<img src="/uploads/avatar/bg_rencontre.png" alt="omg">


												<img id="image2" style=" width: 80px; height: 60px; position: absolute; top: 42px; left: 10px;"
												 src="<?php echo e($rencontre->accueillant->avatar != null ? $rencontre->accueillant->avatar : '/img/ava_2.jpg'); ?>" alt="..." />

												 <img id="image2" style=" width: 80px; height: 60px; position: absolute; top: 42px; left: 140px;"
												 src="<?php echo e($rencontre->accueilli->avatar != null ? $rencontre->accueilli->avatar : '/img/ava_2.jpg'); ?>" alt="..." />

												 <span style=" width: 10px; height: 10px; position: absolute; top: 42px; left: 110px;"><i class="fa <?php echo e($rencontre->is_accueilli == '1' ? 'fa-handshake-o' : 'fa-spinner'); ?>" aria-hidden="true"></i></span>

												<span style="color: red; position: absolute; top: 130px; left: 25px;"><strong><?php echo e($rencontre->ville != null ? $rencontre->ville->nom : 'N/A'); ?></strong></span>

												</a>
												<a href="<?php echo e(URL::to('site/profilrencontre?id=' .  $rencontre->id )); ?>" class="be-post-title">Le <?php echo e(date('d/m/Y', strtotime($rencontre->date_rencontre))); ?> à <?php echo e(date('H:i', strtotime($rencontre->date_rencontre))); ?></a>
												
												<div class="author-post">
													<span>Accueillant :  <a href="<?php echo e(URL::to('site/profil?id=' . $rencontre->acceuillant_id)); ?>"><?php echo e($rencontre->accueillant->prenom); ?> <?php echo e($rencontre->accueillant->nom); ?> </a></span><br>
													<span>Accueilli :  <a href="<?php echo e(URL::to('site/profil?id=' . $rencontre->accueilli_id )); ?>"><?php echo e($rencontre->accueilli->prenom); ?> <?php echo e($rencontre->accueilli->nom); ?> </a></span>
												</div>											
											</div>									
										</div>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>






								</div>
	                        </div>
	                    <?php endif; ?>                        

                        <div class="tab-info">

                        	
                        	<?php $__currentLoopData = $utilisateur->rencontres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rencontre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        		<?php if($rencontre->commentaire != null): ?>
		                        	<div class="collection">
		                        		<h3 class="menu-article"><?php echo e($rencontre->ville != null ? $rencontre->ville->nom : 'N/A'); ?></h3>
		                        		<div class="collection-header">
		                        			<span>Accueillant :  <a href="<?php echo e(URL::to('site/profil?id=' . $rencontre->acceuillant_id)); ?>"><?php echo e($rencontre->accueillant->prenom); ?> <?php echo e($rencontre->accueillant->nom); ?> </a></span><br>
											<span>Accueilli :  <a href="<?php echo e(URL::to('site/profil?id=' . $rencontre->accueilli_id )); ?>"><?php echo e($rencontre->accueilli->prenom); ?> <?php echo e($rencontre->accueilli->nom); ?> </a></span>
										
		                        		</div>
		                        		<div class="collection-entry">
		                        			<?php echo e($rencontre->commentaire); ?>


		                            		
		                        		</div>
		                        	</div>
		                        <?php endif; ?>
	                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>                       

                    </div>
                </div> 				
			</div>				
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>




<?php $__env->startSection('jsscript'); ?>


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
                    //alert(value);
                    $("#ville_id").val(value).trigger("change");
                }
            },
          
          //theme: "plate-dark",


          requestDelay: 400
        };

        $("#ville_autocomplete").easyAutocomplete(options);

        $('div.easy-autocomplete').css('width', '100%');
        $('input.input-signtype').css('width', '100%');
        //$('div.easy-autocomplete').css('line-height', '40px');

       <?php if(count($errors) > 0): ?>        
            // Error on rencontre form        
            $(".large-popup.lahiki").slideDown();
       
    	<?php endif; ?>

        </script>       
    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>