@extends("layouts.post")
@section("title", $post->title)
@section("content")
	<div style="background : whitesmoke; ">
	<h1 class="flex justify-center font-extrabold text-3xl m-5">{{ $post->title }}</h1>

	<img src="{{ asset('storage/'.$post->picture) }}" alt="Image de couverture" class="rounded-xl w-64 h-64 object-contain m-2 mr-5" class="w-44" style="display:flex; margin-left:35rem">

	<div style="display:flex; margin-left:35rem">{{ $post->content }}</div>
	

	<p><a href="{{ route('posts.index') }}" title="Retourner aux articles"  style="background : #213310; color : white ; justify-content :center ; display :flex ; align-items : center ; padding : 0.9rem 1rem ; font-size: 1.1rem ; width: 15rem ;margin-left:35rem; border-radius: 2rem; margin-top:3rem" >Retourner aux posts</a></p>
	</div>
@endsection