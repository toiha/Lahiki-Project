

@extends('layouts.main')

@section('content')

<!-- MAIN CONTENT -->
<div id="content-block">
	<div class="container be-detail-container">
		<h2 class="content-title">Notre Blog</h2>
		<div class="row">
			<div class="col-xs-12 col-sm-9 main-feild">
				<div class="blog-wrapper">


					<!-- Actualite -->
                    @foreach($actualites as $actualite)

						<div class="blog-post be-large-post">
							<div class="info-block clearfix">
								<div class="be-large-post-align">
									<span><i class="fa fa-thumbs-o-up"></i> {{ $actualite->jaime }}</span>
									<span><i class="fa fa-eye"></i> {{ $actualite->nb_vues }}</span>
									<span><i class="fa fa-comment-o"></i> {{ $actualite->commentaires != null ? $actualite->commentaires->count() : '0' }}</span>
									<span class="be-text-tags">
										Catégorie : <a href="#" class="be-post-tag">{{ $actualite->categorie }}</a>
									</span>										
								</div>
							</div>
							<div class="be-large-post-align">
								<a class="be-post-title" href="{{ URL::to('site/article?id=' . $actualite->id) }}">
									{{ $actualite->titre }}
								</a>

								<span class="be-text-tags clearfix">
									<div class="post-date">
										<i class="fa fa-clock-o"></i> Le {{ date('d/m/Y', strtotime($actualite->created_at)) }}
									</div>
									@if(Auth::user())
										<div class="author-post">
											<img src="{{ $actualite->utilisateur != null ? ($actualite->utilisateur->avatar != null ? $actualite->utilisateur->avatar : '/img/a1.png') : '/img/a1.png' }}" alt="" class="ava-author">
											<span>Auteur <a href="{{ $actualite->utilisateur != null ? URL::to('site/profil?id=' . $actualite->utilisateur->id) : '#' }}">
												{{ $actualite->utilisateur != null ? $actualite->utilisateur->prenom . $actualite->utilisateur->nom : 'Anonyme' }}</a></span>
										</div>
									@else
										<div class="author-post">
											
											<span>Auteur : {{ $actualite->utilisateur != null ? $actualite->utilisateur->prenom . $actualite->utilisateur->nom : 'Anonyme' }}</span>
										</div>

									@endif
								</span>
								<div class="clear"></div>
							</div>
							<a class="post-preview post-image" href="{{ URL::to('site/article?id=' . $actualite->id) }}">

								<img class="img-full" src="{{ $actualite->media != null ? str_replace("laravel-filemanager/files", "uploads", "$actualite->media") : '/img/blog_8.jpg' }}" alt=""></a>
								

						

							<div class="be-large-post-align">
								<div class="post-text ">{{ $actualite->resume }}</div>
								<a class="btn color-1 size-2 hover-1" href="{{ URL::to('site/article?id=' . $actualite->id) }}">Voir plus</a>
							</div>
						</div>
					@endforeach





		
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
							@foreach($categories as $categorie)
							 	<a href="{{ URL::to('site/article?c=' . $categorie->categorie) }}">{{ $categorie->categorie }}<span>{{ $categorie->nb_articles }}</span></a>
							@endforeach
						</div>
					</div>
				</div>
				
				<div class="be-vidget">
					<h3 class="letf-menu-article">
						Posts populaires
					</h3>	
					<!-- Populaires -->
                    @foreach($populaires as $actualite)

	                	<div class="be-post style-2">
							<a href="{{ URL::to('site/article?id=' . $actualite->id) }}" class="be-post-title">{{ $actualite->titre }}</a>     	
							<a href="{{ URL::to('site/article?id=' . $actualite->id) }}"class="be-img-block">
								<img src="{{ $actualite->media != null ? str_replace("laravel-filemanager/files", "uploads", "$actualite->media") : '/img/be_post_1.jpg' }} " alt="">
							</a>
							<span>
								{{ $actualite->resume }}
							</span>
						</div>
					@endforeach
                	
				</div>

				

			</div>
		</div>
	</div>
</div>
<!-- /content -->
<div class="be-fixed-filter"></div>

@endsection
