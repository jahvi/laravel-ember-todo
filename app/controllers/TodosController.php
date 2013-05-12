<?php

class TodosController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return json_encode(array('todos' => Todo::all()->toArray()));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::json()->all();

		$todo = Todo::create($data['todo']);
		$todo->save();

		return $todo;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$data = Input::json()->all();

		$todo = Todo::find($id);
		$todo->update($data['todo']);

		return json_encode(array('todo' => $todo->toArray()));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		return Todo::find($id)->delete();
	}

}