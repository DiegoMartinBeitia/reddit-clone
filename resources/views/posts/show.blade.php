@extends('layouts.app') 

@section('content')

@if(isset($posts))
	<div class="row">
		<div class="col-md-12">
			<h2>{{$posts->title}}</h2>
			<p>{{$posts->description}}</p>			
			<p>{{$posts->url}}</p>
			@if(isset($posts->created_at))
				<p>Post{{$posts->created_at->diffForHumans()}}</p>
			@endif	
		</div>
	</div>
	<hr>
@else
	<div class="row">
		<div class="col-md-12">
			<h2>No existe ese Post</h2>
		</div>
	</div>		
@endif		
		
@endsection



