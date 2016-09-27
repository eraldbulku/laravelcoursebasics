@extends('layouts.main')
@section('content')
    {{ Form::open( array('route' => ['todos.items.store', $todo_list->id]) ) }}
		@include('items.partials._form')
	{{ Form::close() }}
@stop