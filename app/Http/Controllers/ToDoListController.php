<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;

use App\ToDoList;

class ToDoListController extends Controller
{
    public function __construct()
    {
    	//$this->beforeFilter('csrf', array('on'=>['post', 'put']));
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$todo_lists = ToDoList::all();
		return view('todos.index')->with('todo_lists', $todo_lists);
		//return view('todos.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{	
		return view('todos.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//define rules
		$rules = array(
			'name' => array('required', 'unique:todo_lists')
		);

		//pass input to the rules
		$validator = Validator::make(Input::all(), $rules);

		//test if input is valid
		if($validator->fails()) {
			$messages = $validator->messages();
			return Redirect::route('todos.create')->withErrors($validator)->withInput();
		}

		$name = Input::get('name');
		$list = new ToDoList();
		$list->name = $name;
		$list->save();
		return Redirect::route('todos.index')->withMessage('List was Created');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{	
		$list = ToDoList::findOrFail($id);
		$items = $list->listItems()->get();
		return view('todos.show')
			->withList($list)
			->withItems($items);
		//return view('todos.show')->with($id);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$list = ToDoList::findOrFail($id);
		return view('todos.edit')->withList($list);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// define rules
		$rules = array(
				'name' => array('required', 'unique:todo_lists')
			);

		// pass input to validator
		$validator = Validator::make(Input::all(), $rules);

		// test if input fails
		if ($validator->fails()) {
			return Redirect::route('todos.edit', $id)->withErrors($validator)->withInput();
		}

		$name = Input::get('name');
		$list = TodoList::findOrFail($id);
		$list->name = $name;
		$list->update();
		return Redirect::route('todos.index')->withMessage('List Was Updated!');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$todo_lists = ToDoList::findOrFail($id)->delete();
		return Redirect::route('todos.index')->withMessage('Item deleted');
	}
}
