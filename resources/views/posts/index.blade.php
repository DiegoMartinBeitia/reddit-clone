@extends('layouts.app') 

@section('content')

@if(isset($posts))
	<a href="{{route('create_post_path')}}" class="btn btn-info">Crear</a>
	@foreach($posts as $post) <!-- esto es para la paginanicon-->
		<div class="row">
			<div class="col-md-12">
				<h2> 
				<a href="{{route('post_path',['post'=>$post->id])}}">{{$post->title}}</a>
				
					@if(Auth::check() AND $post->user_id==Auth::user()->id)
					<small class="pull-right">
						<a href="{{route('edit_post_path',['post'=>$post->id])}}" class="btn btn-info">Editar</a>
						<form action="{{route('delete_post_path',['post'=>$post->id])}}" method="POST">
							{{csrf_field()}}
							{{method_field('DELETE')}}
							<button type="submit" class="btn btn-danger">Borrar</button>
						</form>
					</small>
					@endif
				
				</h2>
				<p>{{$post->description}}</p>
				<p>{{$post->url}}</p>
			</div>
		</div>
		<hr>
	@endforeach	
	{{$posts->render()}} <!-- esto es para la paginacion-->
@endif		
@endsection
