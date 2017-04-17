@extends('layouts.app') 

@section('content')

@if(isset($posts))
	@foreach($posts as $p)
		<div class="row">
			<div class="col-md-12">
				<h2> 
				<a href="{{route('post_path',['post'=>$p->id])}}">{{$p->title}}</a>
				<small class="pull-right">
					<a href="{{route('edit_post_path',['post'=>$p->id])}}" class="btn btn-info">Editar</a>
					<form action="{{route('delete_post_path',['post'=>$p->id])}}" method="POST">
						{{csrf_field()}}
						{{method_field('DELETE')}}
						<button type="submit" class="btn btn-danger">Borrar</button>
					</form>
				</small>
				</h2>
				<p>{{$p->description}}</p>
				<p>{{$p->url}}</p>
			</div>
		</div>
		<hr>
	@endforeach	
	{{$posts->render()}} 
@endif		
@endsection
