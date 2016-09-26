<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*Route::get('/', function () {
	$data = ['name'=>'kobi', 'email'=>'kobi@kobi.com'];

    //return view('welcome', array('name'=>'friend'));
    //return view('welcome')->withName('friend');
    //return view('welcome')->with('name', $name);
    return view('welcome')->with($data);
});*/

/*Route::get('/hello/{name?}', function ($name = 'world') {
    return view('welcome')->with('name', $name);
});*/

/*Route::get('/', function () {
	$data = [
		'name'=>'kobi', 
		'last_name' =>'kobi',
		'email'=>'kobi@kobi.com'
	];

    return view('welcome')->withData($data);
});*/

/*Route::get('/', function () {
    return view('todos.index');
});
Route::get('/todos', function () {
    return view('todos.index');
});
Route::get('/todos/{id}', function ($id) {
    return view('todos.show')->withId($id);
});*/

Route::get('/db', function() {
	//return DB::select('show tables');
	//return DB::table('todo_lists')->get();
	/*DB::table('todo_lists')->insert(
		array('name'=> 'Maicon')
	);*/
	//return DB::table('todo_lists')->get();

	$result = DB::table('todo_lists')->where('name', 'Kobi')->first();
	return $result->name;
});

Route::get('/', 'ToDoListController@index');
//Route::get('/todos', 'ToDoListController@index');
//Route::get('/todos/{id}', 'ToDoListController@show');

Route::resource('todos', 'ToDoListController');

/*Event::listen('illuminate.query', function($query) {
	var_dump($query);
});*/