
<?php $__env->startComponent('mail::message'); ?>

	# Sujet :  Votre inscription sur www.lahiki.fr

	Bonjour  <?php echo e($content['prenom']); ?> <?php echo e($content['nom']); ?>, 

	
	vous venez de vous inscrire sur le site www.lahiki.fr et nous vous en remercions.
	Vous serez désormais informé personnellement des demandes d'accueil et des modifications sur vos rencontres.

	Merci de votre confiance et à bientôt sur www.lahiki.fr

	Equipe <?php echo e(config('app.name')); ?>


<?php echo $__env->renderComponent(); ?>