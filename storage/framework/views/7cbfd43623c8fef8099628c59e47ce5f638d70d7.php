
<?php $__env->startComponent('mail::message'); ?>

	# Sujet :  Un message pour vous envoyé via le site www.lahiki.fr

	Bonjour  <?php echo e($content['toNom']); ?>, 
	
	<?php echo e($content['fromNom']); ?> vous a envoyé le message ci-dessous :	

	--- DEBUT DU MESSAGE ---

	<?php echo e($content['message']); ?>


	--- FIN DU MESSAGE ---

	Merci de votre confiance et à bientôt sur www.lahiki.fr

	Equipe <?php echo e(config('app.name')); ?>


<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('mail::button', ['url' => 'http://www.lahiki.fr/site/profil?id=' . $content['fromId'] ]); ?>
 Voir le profil de <?php echo e($content['fromNom']); ?> (Connexion à Lahiki nécessaire)
<?php echo $__env->renderComponent(); ?>