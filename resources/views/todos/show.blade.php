@extends('layouts.main')
@section('content')
	<div class="large-12 columns">
		<h1>{{{$list->name}}}</h1>
		@foreach ($items as $item)
			<h4>{{{ $item->content }}}</h4>
		@endforeach
		<p>{{link_to_route('todos.index', 'back')}}</p>
	</div>
@stop