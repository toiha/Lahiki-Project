<?php $__env->startSection('content'); ?>

	<!-- MAIN CONTENT -->
	<div id="content-block">
		<div class="container be-detail-container">
			<h2 class="content-title">Notre Blog</h2>
			<div class="blog-wrapper blog-list blog-fullwith">

				<div class="row">
					<div class="col-xs-12 col-md-10 col-md-offset-1">
						<div class="blog-post be-large-post type-2">

							<div class="info-block clearfix">
								<div class="be-large-post-align">
									<span><i class="fa fa-thumbs-o-up"></i> <?php echo e($actualite->jaime); ?></span>
									<span><i class="fa fa-eye"></i> <?php echo e($actualite->nb_vues); ?></span>
									<span><i class="fa fa-comment-o"></i> <?php echo e($actualite->commentaires != null ? $actualite->commentaires->count() : '0'); ?></span>
									<span class="be-text-tags">
										Catégorie : <a href="#" class="be-post-tag"><?php echo e($actualite->categorie); ?></a>
									</span>										
								</div>
							</div>


							<div class="be-large-post-align blog-content">
								<span class="be-text-tags clearfix custom-a-b">
									<div class="post-date">
										<i class="fa fa-clock-o"></i> Le <?php echo e(date('d/m/Y', strtotime($actualite->created_at))); ?>

									</div>
									<?php if(Auth::user()): ?>
										<div class="author-post">
											<img src="<?php echo e($actualite->utilisateur != null ? ($actualite->utilisateur->avatar != null ? $actualite->utilisateur->avatar : '/img/a1.png') : '/img/a1.png'); ?>" alt="" class="ava-author">
											<span>Auteur <a href="<?php echo e($actualite->utilisateur != null ? URL::to('site/profil?id=' . $actualite->utilisateur->id) : '#'); ?>">
												<?php echo e($actualite->utilisateur != null ? $actualite->utilisateur->prenom . ' ' . $actualite->utilisateur->nom : 'Anonyme'); ?></a></span>
										</div>
									<?php else: ?>
										<div class="author-post">
											
											<span>Auteur : <?php echo e($actualite->utilisateur != null ? $actualite->utilisateur->prenom . ' ' . $actualite->utilisateur->nom : 'Anonyme'); ?></span>
										</div>

									<?php endif; ?>
								</span>				
								<h3 class="be-post-title">
									<?php echo e($actualite->titre); ?>

								</h3>
								<div class="post-text">
									<p>
										<?php echo e($actualite->resume); ?>

									</p>
								</div>
							</div>
							<img class="img-full" src="<?php echo e($actualite->media != null ? str_replace("laravel-filemanager/files", "uploads", "$actualite->media") : '/img/blog_8.jpg'); ?>" alt="">
							
							<div class="blog-content be-large-post-align">
								<div class="post-text ">
									
									<?php echo str_replace("laravel-filemanager/files", "uploads", Html::decode($actualite->contenu)); ?>	
								</div>
							</div>
							
						</div>

						
						<div class="be-comment-block">
							<h1 class="comments-title">Commentaires (<?php echo e($actualite->commentaires != null ? $actualite->commentaires->count() : '0'); ?>)</h1>
							
							<?php if($actualite->commentaires != null): ?>
								<?php $__currentLoopData = $actualite->commentaires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commentaire): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="be-comment">

										<?php if(Auth::user()): ?>
											<div class="be-img-comment">	
												<a href="<?php echo e($commentaire->utilisateur != null ? URL::to('site/profil?id=' . $commentaire->utilisateur->id) : '#'); ?>">
													<img src="<?php echo e($commentaire->utilisateur != null ? ($commentaire->utilisateur->avatar != null ? $commentaire->utilisateur->avatar : '/img/c1.png') : '/img/c1.png'); ?>" alt="" class="be-ava-comment">
												</a>
											</div>										
										<?php else: ?>
											<div class="be-img-comment">	
												<a href="#">
													<img src="/img/c1.png" alt="" class="be-ava-comment">
												</a>
											</div>
										<?php endif; ?>

										<div class="be-comment-content">
												<?php if(Auth::user()): ?>
													<span class="be-comment-name">
														<a href="<?php echo e($commentaire->utilisateur != null ? URL::to('site/profil?id=' . $commentaire->utilisateur->id) : '#'); ?>">Auteur : <?php echo e($commentaire->utilisateur != null ? $commentaire->utilisateur->prenom . ' ' . $commentaire->utilisateur->nom : 'Anonyme'); ?></a>
													</span>
												<?php else: ?>													
													<span class="be-comment-name">
														<a href="#">Auteur : <?php echo e($commentaire->utilisateur != null ? $commentaire->utilisateur->prenom . ' ' . $commentaire->utilisateur->nom : 'Anonyme'); ?></a>
													</span>

												<?php endif; ?>
												<span class="be-comment-time">
													<i class="fa fa-clock-o"></i>
													Le <?php echo e(date('d/m/Y', strtotime($commentaire->created_at))); ?>

												</span>

											<p class="be-comment-text">
												<?php echo e($commentaire->contenu); ?>

											</p>
										</div>
									</div>

								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php endif; ?>


							<?php if(Auth::user()): ?>                           

								<?php echo Form::open(array('route' => 'commente','method'=>'POST', 'class' => 'form-block')); ?>

									<div class="row">
										<input type="hidden" name="id_actualite" value="<?php echo e($actualite->id); ?>">
										<div class="col-xs-12">									
											<div class="form-group">
												<textarea name="contenu" class="form-input" required="" placeholder="Votre commentaire"></textarea>
											</div>
										</div>
										
										<input type="submit" class="btn color-1 size-2 hover-1 pull-right" value="Envoyer">
									</div>
								<?php echo Form::close(); ?>

							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- /content -->
<div class="be-fixed-filter"></div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>