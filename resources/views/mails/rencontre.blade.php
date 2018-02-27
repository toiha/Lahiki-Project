
@component('mail::message')

	# Sujet :  Votre rencontre du {{ $content['date_rencontre']}} sur www.lahiki.fr

	Bonjour, 

	une demande d'accueil a été crée ou modifiée sur le site www.lahiki.fr

	Voici les caractérisitiques de l'accueil :

	Accueillant : {{ $content['prenom_accueillant'] }} {{ $content['nom_accueillant'] }}

	Accueilli : {{ $content['prenom_accueilli'] }} {{ $content['nom_accueilli'] }}

	Date et heure de l'accueil : Le {{ $content['date_rencontre'] }} à {{ $content['heure_rencontre'] }}

	Lieu de l'accueil : {{ $content['lieu_rencontre'] }}

	Ville de l'accueil : {{ $content['ville_rencontre'] }}

	Vous serez désormais informé personnellement des modifications sur cet accueil.

	Merci de votre confiance et à bientôt sur www.lahiki.fr

	
	Equipe {{ config('app.name') }}

@endcomponent

@component('mail::button', ['url' => 'http://www.lahiki.fr/site/profil?id=' . $content['id_accueillant'] ])
 Voir le profil de {{ $content['prenom_accueillant'] }} {{ $content['nom_accueillant'] }} (Connexion à Lahiki nécessaire)
@endcomponent

@component('mail::button', ['url' => 'http://www.lahiki.fr/site/profil?id=' . $content['id_accueilli'] ])
 Voir le profil de {{ $content['prenom_accueilli'] }} {{ $content['nom_accueilli'] }} (Connexion à Lahiki nécessaire)
@endcomponent