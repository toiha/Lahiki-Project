

@extends('layouts.main')

@section('content')

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
									<span><i class="fa fa-thumbs-o-up"></i> {{ $actualite->jaime }}</span>
									<span><i class="fa fa-eye"></i> {{ $actualite->nb_vues }}</span>
									<span><i class="fa fa-comment-o"></i> {{ $actualite->commentaires != null ? $actualite->commentaires->count() : '0' }}</span>
									<span class="be-text-tags">
										Catégorie : <a href="#" class="be-post-tag">{{ $actualite->categorie }}</a>
									</span>										
								</div>
							</div>


							<div class="be-large-post-align blog-content">
								<span class="be-text-tags clearfix custom-a-b">
									<div class="post-date">
										<i class="fa fa-clock-o"></i> Le {{ date('d/m/Y', strtotime($actualite->created_at)) }}
									</div>
									@if(Auth::user())
										<div class="author-post">
											<img src="{{ $actualite->utilisateur != null ? ($actualite->utilisateur->avatar != null ? $actualite->utilisateur->avatar : '/img/a1.png') : '/img/a1.png' }}" alt="" class="ava-author">
											<span>Auteur <a href="{{ $actualite->utilisateur != null ? URL::to('site/profil?id=' . $actualite->utilisateur->id) : '#' }}">
												{{ $actualite->utilisateur != null ? $actualite->utilisateur->prenom . ' ' . $actualite->utilisateur->nom : 'Anonyme' }}</a></span>
										</div>
									@else
										<div class="author-post">
											
											<span>Auteur : {{ $actualite->utilisateur != null ? $actualite->utilisateur->prenom . ' ' . $actualite->utilisateur->nom : 'Anonyme' }}</span>
										</div>

									@endif
								</span>				
								<h3 class="be-post-title">
									{{ $actualite->titre }}
								</h3>
								<div class="post-text">
									<p>
										{{ $actualite->resume }}
									</p>
								</div>
							</div>
							<img class="img-full" src="{{ $actualite->media != null ? str_replace("laravel-filemanager/files", "uploads", "$actualite->media") : '/img/blog_8.jpg' }}" alt="">
							
							<div class="blog-content be-large-post-align">
								<div class="post-text ">
									
									{!! str_replace("laravel-filemanager/files", "uploads", Html::decode($actualite->contenu)) !!}	
								</div>
							</div>
							
						</div>

						
						<div class="be-comment-block">
							<h1 class="comments-title">Commentaires ({{ $actualite->commentaires != null ? $actualite->commentaires->count() : '0' }})</h1>
							
							@if ($actualite->commentaires != null)
								@foreach($actualite->commentaires as $commentaire)
									<div class="be-comment">

										@if(Auth::user())
											<div class="be-img-comment">	
												<a href="{{ $commentaire->utilisateur != null ? URL::to('site/profil?id=' . $commentaire->utilisateur->id) : '#' }}">
													<img src="{{ $commentaire->utilisateur != null ? ($commentaire->utilisateur->avatar != null ? $commentaire->utilisateur->avatar : '/img/c1.png') : '/img/c1.png' }}" alt="" class="be-ava-comment">
												</a>
											</div>										
										@else
											<div class="be-img-comment">	
												<a href="#">
													<img src="/img/c1.png" alt="" class="be-ava-comment">
												</a>
											</div>
										@endif

										<div class="be-comment-content">
												@if(Auth::user())
													<span class="be-comment-name">
														<a href="{{ $commentaire->utilisateur != null ? URL::to('site/profil?id=' . $commentaire->utilisateur->id) : '#' }}">Auteur : {{ $commentaire->utilisateur != null ? $commentaire->utilisateur->prenom . ' ' . $commentaire->utilisateur->nom : 'Anonyme' }}</a>
													</span>
												@else													
													<span class="be-comment-name">
														<a href="#">Auteur : {{ $commentaire->utilisateur != null ? $commentaire->utilisateur->prenom . ' ' . $commentaire->utilisateur->nom : 'Anonyme' }}</a>
													</span>

												@endif
												<span class="be-comment-time">
													<i class="fa fa-clock-o"></i>
													Le {{ date('d/m/Y', strtotime($commentaire->created_at)) }}
												</span>

											<p class="be-comment-text">
												{{ $commentaire->contenu }}
											</p>
										</div>
									</div>

								@endforeach
							@endif


							@if(Auth::user())                           

								{!! Form::open(array('route' => 'commente','method'=>'POST', 'class' => 'form-block')) !!}
									<div class="row">
										<input type="hidden" name="id_actualite" value="{{ $actualite->id }}">
										<div class="col-xs-12">									
											<div class="form-group">
												<textarea name="contenu" class="form-input" required="" placeholder="Votre commentaire"></textarea>
											</div>
										</div>
										
										<input type="submit" class="btn color-1 size-2 hover-1 pull-right" value="Envoyer">
									</div>
								{!! Form::close() !!}
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- /content -->
<div class="be-fixed-filter"></div>

@endsection
