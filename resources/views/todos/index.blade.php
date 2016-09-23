@extends('layouts.main')
@section('content')
    <h2>Show All ToDo Lists</h2>
    <ul>
    	@foreach ($todo_lists as $list)
    		<li>{{{$list->name}}}</li>
    	@endforeach
    </ul>
@stop