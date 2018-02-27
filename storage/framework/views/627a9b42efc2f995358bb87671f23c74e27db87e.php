
<?php $__env->startComponent('mail::message'); ?>

	# Sujet :  Votre rencontre du <?php echo e($content['date_rencontre']); ?> sur www.lahiki.fr

	Bonjour, 

	une demande d'accueil a été crée ou modifiée sur le site www.lahiki.fr

	Voici les caractérisitiques de l'accueil :

	Accueillant : <?php echo e($content['prenom_accueillant']); ?> <?php echo e($content['nom_accueillant']); ?>


	Accueilli : <?php echo e($content['prenom_accueilli']); ?> <?php echo e($content['nom_accueilli']); ?>


	Date et heure de l'accueil : Le <?php echo e($content['date_rencontre']); ?> à <?php echo e($content['heure_rencontre']); ?>


	Lieu de l'accueil : <?php echo e($content['lieu_rencontre']); ?>


	Ville de l'accueil : <?php echo e($content['ville_rencontre']); ?>


	Vous serez désormais informé personnellement des modifications sur cet accueil.

	Merci de votre confiance et à bientôt sur www.lahiki.fr

	
	Equipe <?php echo e(config('app.name')); ?>


<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('mail::button', ['url' => 'http://www.lahiki.fr/site/profil?id=' . $content['id_accueillant'] ]); ?>
 Voir le profil de <?php echo e($content['prenom_accueillant']); ?> <?php echo e($content['nom_accueillant']); ?> (Connexion à Lahiki nécessaire)
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('mail::button', ['url' => 'http://www.lahiki.fr/site/profil?id=' . $content['id_accueilli'] ]); ?>
 Voir le profil de <?php echo e($content['prenom_accueilli']); ?> <?php echo e($content['nom_accueilli']); ?> (Connexion à Lahiki nécessaire)
<?php echo $__env->renderComponent(); ?>