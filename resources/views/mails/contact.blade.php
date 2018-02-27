
@component('mail::message')

	# Sujet :  {{ $content['sujet'] }}

	Message : {{ $content['message'] }}

	@component('mail::table')

	| Champs        | Valeur                     |
	| ------------- | --------------------------:|
	| Nom           | {{ $content['nom'] }}      |
	| Email         | {{ $content['email'] }}    |
	| Telephone     | {{ $content['telephone'] }}|

	@endcomponent

	
	{{ config('app.name') }}

@endcomponent