<?php $__env->startSection('content'); ?>

<!-- MAIN CONTENT -->
<div id="content-block">
	<div class="container be-detail-container">
		<h2 class="content-title">Notre Blog</h2>
		<div class="row">
			<div class="col-xs-12 col-sm-9 main-feild">
				<div class="blog-wrapper">


					<!-- Actualite -->
                    <?php $__currentLoopData = $actualites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actualite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

						<div class="blog-post be-large-post">
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
							<div class="be-large-post-align">
								<a class="be-post-title" href="<?php echo e(URL::to('site/article?id=' . $actualite->id)); ?>">
									<?php echo e($actualite->titre); ?>

								</a>

								<span class="be-text-tags clearfix">
									<div class="post-date">
										<i class="fa fa-clock-o"></i> Le <?php echo e(date('d/m/Y', strtotime($actualite->created_at))); ?>

									</div>
									<?php if(Auth::user()): ?>
										<div class="author-post">
											<img src="<?php echo e($actualite->utilisateur != null ? ($actualite->utilisateur->avatar != null ? $actualite->utilisateur->avatar : '/img/a1.png') : '/img/a1.png'); ?>" alt="" class="ava-author">
											<span>Auteur <a href="<?php echo e($actualite->utilisateur != null ? URL::to('site/profil?id=' . $actualite->utilisateur->id) : '#'); ?>">
												<?php echo e($actualite->utilisateur != null ? $actualite->utilisateur->prenom . $actualite->utilisateur->nom : 'Anonyme'); ?></a></span>
										</div>
									<?php else: ?>
										<div class="author-post">
											
											<span>Auteur : <?php echo e($actualite->utilisateur != null ? $actualite->utilisateur->prenom . $actualite->utilisateur->nom : 'Anonyme'); ?></span>
										</div>

									<?php endif; ?>
								</span>
								<div class="clear"></div>
							</div>
							<a class="post-preview post-image" href="<?php echo e(URL::to('site/article?id=' . $actualite->id)); ?>">

								<img class="img-full" src="<?php echo e($actualite->media != null ? str_replace("laravel-filemanager/files", "uploads", "$actualite->media") : '/img/blog_8.jpg'); ?>" alt=""></a>
								

						

							<div class="be-large-post-align">
								<div class="post-text "><?php echo e($actualite->resume); ?></div>
								<a class="btn color-1 size-2 hover-1" href="<?php echo e(URL::to('site/article?id=' . $actualite->id)); ?>">Voir plus</a>
							</div>
						</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





		
					<div class="pagination clearfix">
						<a class="btn color-4 hover-9 page-left" href="#">Précédent</a>
						<a class="btn color-4 hover-9 page-right" href="#">Suivant</a>					
						<div class="pages">
							<a class="btn color-5 hover-9" href="#">1</a>
							<a class="btn color-5 hover-9" href="#">2</a>
							<a class="btn color-5 hover-9" href="#">3</a>
						</div>

					</div>
				</div>
			</div>



			<div class="col-xs-12 col-sm-3 left-feild">
				<form action="./" class="input-search">
					<input type="text" required placeholder="Rechercher">
						<i class="fa fa-search"></i>
						<input type="submit" value="">
				</form>
				<div class="be-vidget">
					<h3 class="letf-menu-article">
						Catégories
					</h3>
					<div class="creative_filds_block">
						<div class="ul numbered">
							<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							 	<a href="<?php echo e(URL::to('site/article?c=' . $categorie->categorie)); ?>"><?php echo e($categorie->categorie); ?><span><?php echo e($categorie->nb_articles); ?></span></a>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
					</div>
				</div>
				
				<div class="be-vidget">
					<h3 class="letf-menu-article">
						Posts populaires
					</h3>	
					<!-- Populaires -->
                    <?php $__currentLoopData = $populaires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actualite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

	                	<div class="be-post style-2">
							<a href="<?php echo e(URL::to('site/article?id=' . $actualite->id)); ?>" class="be-post-title"><?php echo e($actualite->titre); ?></a>     	
							<a href="<?php echo e(URL::to('site/article?id=' . $actualite->id)); ?>"class="be-img-block">
								<img src="<?php echo e($actualite->media != null ? str_replace("laravel-filemanager/files", "uploads", "$actualite->media") : '/img/be_post_1.jpg'); ?> " alt="">
							</a>
							<span>
								<?php echo e($actualite->resume); ?>

							</span>
						</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                	
				</div>

				

			</div>
		</div>
	</div>
</div>
<!-- /content -->
<div class="be-fixed-filter"></div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>