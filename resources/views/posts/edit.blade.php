@extends('layouts.app') 

@section('content')


	@if(count($errors)> 0)
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>

	@endif


<form action="{{route('update_post_path',['posts'=>$posts->id])}}" method="POST">
	{{csrf_field()}}
	{{method_field('PUT')}}

	
	<div class="form-group">
		<label for="title">Titulo:</label>
		<input type="text" name="title" class="form-control"  value="{{$posts->title}}">
	</div>
	<div class="form-group">
		<label for="description" >Descripcion:</label>
		<textarea rows="5" name="description" class="form-control" > {{$posts->description}}</textarea>
	</div>
	<div class="form-group">
		<label for="url">url:</label>
		<input type="text" name="url" class="form-control"  value="{{$posts->url}}">
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Grabar</button>
	</div>
</form>		
@endsection



