
<?php $__env->startComponent('mail::message'); ?>

	# Sujet :  <?php echo e($content['sujet']); ?>


	Message : <?php echo e($content['message']); ?>


	<?php $__env->startComponent('mail::table'); ?>

	| Champs        | Valeur                     |
	| ------------- | --------------------------:|
	| Nom           | <?php echo e($content['nom']); ?>      |
	| Email         | <?php echo e($content['email']); ?>    |
	| Telephone     | <?php echo e($content['telephone']); ?>|

	<?php echo $__env->renderComponent(); ?>

	
	<?php echo e(config('app.name')); ?>


<?php echo $__env->renderComponent(); ?>