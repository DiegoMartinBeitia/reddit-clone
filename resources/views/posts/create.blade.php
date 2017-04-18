@extends('layouts.app') 

@section('content')

<h2>Creando Post</h2>


<form action="{{route('store_post_path')}}" method="POST">

{{csrf_field()}}
	<div class="form-group">
		<label for="title">Titulo:</label>
		<input type="text" name="title" class="form-control" placeholder="Titulo del Post" value="{{old('title')}}">
	</div>
	<div class="form-group">
		<label for="description" >Descripcion:</label>
		<textarea rows="5" name="description" class="form-control" placeholder="Detalle o texto del Post" > {{old('description')}}</textarea>
	</div>
	<div class="form-group">
		<label for="url">url:</label>
		<input type="text" name="url" class="form-control" placeholder="url en caso que tuviese"  value="{{old('url')}}">
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Grabar</button>
	</div>
</form>		

@endsection



