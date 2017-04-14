@extends('layouts.app') 

@section('content')

@if(isset($posts))
	@foreach($posts as $p)
		<div class="row">
			<div class="col-md-12">
				<h2> <a href="{{route('post_path',['post'=>$p->id])}}">{{$p->title}}</a></h2>
				<p>{{$p->description}}</p>
				<p>{{$p->url}}</p>
			</div>
		</div>
		<hr>
	@endforeach	
	{{$post->render()}} 
@endif		
@endsection
