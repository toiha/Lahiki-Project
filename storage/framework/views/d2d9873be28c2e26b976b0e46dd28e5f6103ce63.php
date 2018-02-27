<?php $__env->startSection('content'); ?>
	
	<!-- MAIN CONTENT -->
	<div id="content-block">
		<div class="container be-detail-container">
			<div class="row">
				<div class="col-xs-12 col-md-3 left-feild">
					<div class="be-vidget back-block">
						<a class="btn full color-1 size-1 hover-1" href="<?php echo e(URL::to('site/profil')); ?>"><i class="fa fa-chevron-left"></i>Retour au profil</a>
					</div>
					<div class="be-vidget hidden-xs hidden-sm" id="scrollspy">
						<p><br></p>
						<h3 class="letf-menu-article">
							Choissez la catégorie
						</h3>
						<div class="creative_filds_block">
							<ul class="ul nav">
								<li><a href="#basic-information">Informations basiques</a></li>
								<li><a href="#ville-carte">Ville et carte</a></li>								
								<li><a href="#appreciation">Appréciations</a></li>
							</ul>
						</div>
					</div>

				</div>

				<div class="col-xs-12 col-md-9 _editor-content_">
					<?php echo Form::model($rencontre, ['method' => 'POST','route' => ['updaterencontre', $rencontre->id]]); ?> 

					<input type="hidden" name="id" value="<?php echo e($rencontre->id); ?>">
					<input type="hidden" name="acceuillant_id" value="<?php echo e($rencontre->acceuillant_id); ?>">
					<input type="hidden" name="accueilli_id" value="<?php echo e($rencontre->accueilli_id); ?>">

					<div class="affix-block" id="basic-information">
						<div class="be-large-post">
							<div class="info-block style-2">
								<div class="be-large-post-align"><a name="basic-information"></a><h3 class="info-block-label">Informations basiques</h3></div>
							</div>



							<div class="be-large-post-align">
								<div class="row">

									<div class=" col-xs-12 col-sm-6">

			                            <div class="be-user-block style-2">
			                                 <a class="be-ava-user style-2" href="<?php echo e(URL::to('site/profil?id=' . $rencontre->accueillant_id )); ?>">
                                        		<img src="<?php echo e(($rencontre->accueillant->avatar != null ? $rencontre->accueillant->avatar : '/img/ava_8.jpg')); ?>" alt=""> 
                                    		</a>
			                                <div class="be-user-counter">
			                                    <div class="c_number"><?php echo e(($rencontre->accueillant->rencontres != null ? $rencontre->accueillant->rencontres->count() : 'Aucun ')); ?></div>
			                                    <div class="c_text">Lahiki</div>
			                                </div>
			                               
			                                 <a href="<?php echo e(URL::to('site/profil?id=' . $rencontre->accueillant->id )); ?>" class="be-use-name">
                                        		<?php echo e(($rencontre->accueillant->ville != null ? $rencontre->accueillant->ville->nom : 'Ville non renseigné')); ?>, 
                                        		<?php echo e(($rencontre->accueillant->ville->departement != null ? $rencontre->accueillant->ville->departement->nom : ' Département non renseigné')); ?> </a>
                                        	<p class="be-user-info"><a href="<?php echo e(URL::to('site/profil?id=' . $rencontre->accueillant->id )); ?>"><?php echo e($rencontre->accueillant->prenom); ?> <?php echo e($rencontre->accueillant->nom); ?></a></p>
                                    

                                        	<div class="be-text-tags">
                                        		<a href="<?php echo e(URL::to('site/profil?id=' . $rencontre->accueillant->id )); ?>"><?php echo e($rencontre->accueillant->apropos); ?></a>
                                    		</div>			                                
			                                
			                                <div class="info-block">
			                                    <span><i class="fa fa-thumbs-o-up"></i> 360</span>
			                                    <span><i class="fa fa-eye"></i> 789</span>
			                                </div>  
			                            </div>


			                        </div>


			                        <div class=" col-xs-12 col-sm-6">

			                            <div class="be-user-block style-2">
			                                 <a class="be-ava-user style-2" href="<?php echo e(URL::to('site/profil?id=' . $rencontre->accueilli->id )); ?>">
                                        		<img src="<?php echo e(($rencontre->accueilli->avatar != null ? $rencontre->accueilli->avatar : '/img/ava_8.jpg')); ?>" alt=""> 
                                    		</a>
			                                <div class="be-user-counter">
			                                    <div class="c_number"><?php echo e(($rencontre->accueilli->rencontres != null ? $rencontre->accueilli->rencontres->count() : 'Aucun ')); ?></div>
			                                    <div class="c_text">Lahiki</div>
			                                </div>
			                               
			                                 <a href="<?php echo e(URL::to('site/profil?id=' . $rencontre->accueilli->id )); ?>" class="be-use-name">
                                        		<?php echo e(($rencontre->accueilli->ville != null ? $rencontre->accueilli->ville->nom : 'Ville non renseigné')); ?>, 
                                        		<?php echo e(($rencontre->accueilli->ville->departement != null ? $rencontre->accueilli->ville->departement->nom : ' Département non renseigné')); ?> </a>
                                        	<p class="be-user-info"><a href="<?php echo e(URL::to('site/profil?id=' . $rencontre->accueilli->id )); ?>"><?php echo e($rencontre->accueilli->prenom); ?> <?php echo e($rencontre->accueilli->nom); ?></a></p>
                                    

                                        	<div class="be-text-tags">
                                        		<a href="<?php echo e(URL::to('site/profil?id=' . $rencontre->accueilli->id )); ?>"><?php echo e($rencontre->accueilli->apropos); ?></a>
                                    		</div>			                                
			                                
			                                <div class="info-block">
			                                    <span><i class="fa fa-thumbs-o-up"></i> 360</span>
			                                    <span><i class="fa fa-eye"></i> 789</span>
			                                </div>  
			                            </div>


			                        </div>



			                    </div>
		                    </div>



							
							<div class="be-large-post-align">
								<div class="row">
									<div class="input-col col-xs-12">
										<div class="form-group fg_icon focus-2">
											<div class="form-label">Date de la rencontre</div>
											<?php echo Form::date('date_rencontre', date('Y-m-d', strtotime($rencontre->date_rencontre)), array('class' => 'form-input', 'required' => '', 'placeholder' => 'Date de la rencontre')); ?>

	                        
										</div>							
									</div>
									<div class="input-col col-xs-12">
										<div class="form-group fg_icon focus-2">
											<div class="form-label">Heure de la rencontre</div>
											<?php echo Form::time('heure_rencontre', date('H:i', strtotime($rencontre->date_rencontre)), array('class' => 'form-input', 'required' => '', 'placeholder' => 'Heure de la rencontre')); ?>

	                        
										</div>							
									</div>
									<div class="input-col col-xs-12">
										<div class="form-group focus-2">
											<div class="form-label">Lieu de la rencontre</div>	
											 <?php echo Form::text('lieu_rencontre', null, array('class' => 'form-input', 'required' => '', 'placeholder' => 'Lieu de la rencontre')); ?>

	                        
										</div>								
									</div>
								</div>
							</div>


						</div>
					</div>



					<div class="affix-block" id="ville-carte">
						<div class="be-large-post">
							<div class="info-block style-2">
								<div class="be-large-post-align"><a name="ville-carte"></a><h3 class="info-block-label">Pays, ville et carte</h3></div>
						</div>
						<div class="be-large-post-align">
							<div class="row">
								
								<div class="input-col col-xs-12">
									<div class="form-group focus-2">
										<div class="form-label">Ville</div>								
										
										 <input class="input-signtype" name="ville_text"  value="<?php echo e(($rencontre->ville != null ? $rencontre->ville->nom : '')); ?>" 
	                                    id="ville_autocomplete" type="text" placeholder="Ville de rencontre souhaitée" required="">
	                                    <input name="ville_id" type="hidden" id="ville_id" value="<?php echo e(($rencontre->ville_id != null ? $rencontre->ville_id : '')); ?>"/>  

									</div>								
								</div>

								
								<div class="input-col col-xs-12">
									<div id="map-canvas"></div>
					                
					            </div>

					            


								<div class="input-col col-xs-12">
									<div class="form-group focus-2">
										<div class="form-label">Coordonnée GPS X</div>	
										<?php echo Form::text('gps_x', ($rencontre->ville != null ? $rencontre->ville->gps_y : ''), array('class' => 'form-input', 'placeholder' => 'Coordonnées GPS X')); ?>

									</div>								
								</div>
								<div class="input-col col-xs-12">
									<div class="form-group focus-2">
										<div class="form-label">Coordonnée GPS Y</div>
										<?php echo Form::text('gps_y', ($rencontre->ville != null ? $rencontre->ville->gps_x : ''), array('class' => 'form-input', 'placeholder' => 'Coordonnées GPS Y')); ?>

									</div>								
								</div>
							</div>
						</div>
					</div>	










					<div class="affix-block" id="appreciation">
						<div class="be-large-post">
							<div class="info-block style-2">
								<div class="be-large-post-align"><a name="appreciation"></a><h3 class="info-block-label">Appréciations</h3></div>
							</div>
							<div class="be-large-post-align">
								<div class="row">
									<div class="input-col col-xs-12 col-sm-6">
										<div class="form-group focus-2">
											<div class="form-label">Commentaires</div>
											<?php echo Form::textarea('commentaire', null, array('class' => 'form-input')); ?>

										</div>								
									</div>
									<div class="input-col col-xs-12">
										<div class="form-group focus-2">


											<div class="form-label">La rencontre a eu lieu ?</div>											
					                                    
					                            <?php echo e(Form::radio('is_accueilli', '1', ($rencontre->is_accueilli == '1'))); ?> Oui 
                    							&nbsp;&nbsp; <?php echo e(Form::radio('is_accueilli', '0', ($rencontre->is_accueilli == '0'))); ?> Non
                    								
										</div>								
									</div>




									<div class="input-col col-xs-12">
										<div class="form-group focus-2">
											<div class="form-label">Note sur 10 sur la qualité de l'accueil</div>	
											<?php echo Form::text('note', null, array('class' => 'form-input', 'placeholder' => 'note /10')); ?>

										</div>								
									</div>


								</div>
							</div>						
								
						</div>
					</div>





					
					<div class="row">	

						<div class="input-col col-xs-12">
							<div class="form-group focus-2">
								<input type="submit" class="btn color-1 size-1 hover-1" value="Enregistrer les changements">
							</div>								
						</div>

					</div>
					<div class="row">	

						<div class="input-col col-xs-12">
							&nbsp;								
						</div>

					</div>
				






					<?php echo Form::close(); ?>

																							
				</div>

			</div>
		</div>
	</div>
	<div class="be-fixed-filter"></div>
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

        </script>       

        <script>
	      var map;
	      function initMap() {
	      	var villeRencontre = {lat: <?php echo e(($rencontre->ville != null ? $rencontre->ville->gps_y : '')); ?>, 
	      		lng: <?php echo e(($rencontre->ville != null ? $rencontre->ville->gps_x : '')); ?> };
	        map = new google.maps.Map(document.getElementById('map-canvas'), {
	          center: villeRencontre,
	          zoom: 8
	        });

	        var contentString = '<p> Le <?php echo e(date('d/m/Y', strtotime($rencontre->date_rencontre))); ?> à <?php echo e(date('H:i', strtotime($rencontre->date_rencontre))); ?></p>';

        	var infowindow = new google.maps.InfoWindow({
          		content: contentString
        	});

	        var marker = new google.maps.Marker({
	          	position: villeRencontre,
	          	color: 'green',
	          	title: 'Ville de la rencontre',
	          	map: map
	        });

	        marker.addListener('click', function() {
          		infowindow.open(map, marker);
        	});

	        infowindow.open(map, marker);
        	


	      }

	    </script>

	    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAW76XtwMbns0QLBjAvitfaM96xNeQ1tpk&callback=initMap" async defer></script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>