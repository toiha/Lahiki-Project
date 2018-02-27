
@component('mail::message')

	# Sujet :  Un message pour vous envoyé via le site www.lahiki.fr

	Bonjour  {{ $content['toNom'] }}, 
	
	{{ $content['fromNom'] }} vous a envoyé le message ci-dessous :	

	--- DEBUT DU MESSAGE ---

	{{ $content['message'] }}

	--- FIN DU MESSAGE ---

	Merci de votre confiance et à bientôt sur www.lahiki.fr

	Equipe {{ config('app.name') }}

@endcomponent

@component('mail::button', ['url' => 'http://www.lahiki.fr/site/profil?id=' . $content['fromId'] ])
 Voir le profil de {{$content['fromNom']}} (Connexion à Lahiki nécessaire)
@endcomponent