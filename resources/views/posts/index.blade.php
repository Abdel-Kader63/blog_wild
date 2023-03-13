@extends("layouts.post")
@section("title", "Tous les articles")
@section("content")


	

<h1 class="flex justify-center font-extrabold text-3xl m-5">Vos articles</h1>
    <div class="flex flex-row items-center justify-center flex-wrap">
        @foreach ($posts as $post)
        <div class="flex flex-col ">
            <a href="{{ route('posts.show', $post) }}" title="Lire l'article" class="inline"><img class="rounded-xl w-64 h-64 object-contain m-2 mr-5" class="w-44" src="{{ asset('storage/'.$post->picture) }}"></a>
            <a href="{{ route('posts.show', $post) }}" title="Lire l'article" class="inline font-bold text-center text-2xl mr-5 mt-5" style="margin-top : 1vh; margin-bottom: 1vh">{{ $post->title }}</a>
			
			<!-- Formulaire pour supprimer un Post : "posts.destroy" -->

			<form method="POST" action="{{ route('posts.destroy', $post) }}" >
				<!-- CSRF token -->
				@csrf
				<!-- <input type="hidden" name="_method" value="DELETE"> -->
				@method("DELETE")
				<button type="button" class=" focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 bg-green-700" style="background : rgb(211, 43, 43) ; color : white ; justify-content :center ; display :flex ; align-items : center ; padding : 0.9rem 1rem ; font-size: 1.1rem ; width : 60%">
				<input type="button" value="Supprimer" >
				</button>
			</form>

			<!-- Lien pour modifier un Post : "posts.edit" -->
			<button type="button" class=" focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 bg-green-700" style="background : black ; color : white ; justify-content :center ; display :flex ; align-items : center ; padding : 0.9rem 1rem ; font-size: 1.1rem ; width : 80% ;">
				<a href="{{ route('posts.edit', $post) }}" title="Modifier l'article" >Modifier</a>
				</button>
		</div>
        @endforeach
    </div>
	<h1 class="text-center font-sans text-xl  "></h1>

	<p style="display :flex ; align-items : center ; justify-content :center ; margin-top : 3rem">
		<!-- Lien pour créer un nouvel article : "posts.create" -->
		<button type="button" class=" focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 bg-green-700" style="background : #213310 ; color : white ; justify-content :center ; display :flex ; align-items : center ; padding : 1.3rem 2rem ; font-size: 1.1rem">


		<a href="{{ route('posts.create') }}" title="Créer un article" >Créer un nouveau post</a></button>
	</p>

	<!-- Le tableau pour lister les articles/posts -->
	<table>
		
				
			</tr>
		</thead>
		<tbody>
			<!-- On parcourt la collection de Post -->
			@foreach ($posts as $post)
			
			{{-- <span class="text-gray-800">{{ $post->user->name }}</span>
                    <small class="ml-2 text-sm text-gray-600">{{ $post->created_at->format('j M Y, g:i a') }}</small> --}}
					<div >
					<!-- Lien pour afficher un Post : "posts.show" -->
					<td>
					

				</td>
			
			</tr>
					</div>

			
			@endforeach
		</tbody>
	</table>
			
		

@endsection