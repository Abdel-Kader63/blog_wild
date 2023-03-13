@extends("layouts.post")
@section("title", "Editer un post")
@section("content")

	<h1 class="flex justify-center font-extrabold text-3xl m-5">Editer un post</h1>

	<!-- Si nous avons un Post $post -->
	@if (isset($post))

	<!-- Le formulaire est géré par la route "posts.update" -->
	<form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data" >

		<!-- <input type="hidden" name="_method" value="PUT"> -->
		@method('PUT')

	@else

	<!-- Le formulaire est géré par la route "posts.store" -->
	<form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" >

	@endif

		<!-- Le token CSRF -->
		@csrf
		<div style="margin-left: 25rem; margin-top: 3rem">
		<p>
			<label for="title" >Titre</label><br/>

			<!-- S'il y a un $post->title, on complète la valeur de l'input -->
			<input style="border-radius : 0.5rem"type="text" name="title" value="{{ isset($post->title) ? $post->title : old('title') }}"  id="title" placeholder="Le titre du post" >

			<!-- Le message d'erreur pour "title" -->
			@error("title")
			<div>{{ $message }}</div>
			@enderror
		</p>

		<!-- S'il y a une image $post->picture, on l'affiche -->
		@if(isset($post->picture))
		<p>
			<span>Couverture actuelle</span><br/>
			<img src="{{ asset('storage/'.$post->picture) }}" alt="image de couverture actuelle" style="max-height: 200px;" >
		</p>
		@endif

		<p>
			<label for="picture" >Couverture</label><br/>
			<input style="border-radius : 0.5rem;border:black 1px solid" type="file" name="picture" id="picture" >

			<!-- Le message d'erreur pour "picture" -->
			@error("picture")
			<div>{{ $message }}</div>
			@enderror
		</p>
		<p>
			<label for="content" >Contenu</label><br/>

			<!-- S'il y a un $post->content, on complète la valeur du textarea -->
			<textarea name="content" id="content" lang="fr" rows="10" cols="50" placeholder="Le contenu du post" >{{ isset($post->content) ? $post->content : old('content') }}</textarea>

			<!-- Le message d'erreur pour "content" -->
			@error("content")
			<div>{{ $message }}</div>
			@enderror
		</p>

		<input style="background : #213310 ; color : white ; justify-content :center ; display :flex ; align-items : center ; padding : 0.9rem  ; font-size: 1.1rem ; border-radius : 1rem; margin-bottom:3rem" type="submit" name="valider" value="Valider" >

	</form>
</div>
@endsection