<?php

class TodosController extends \BaseController {

	/**
	 * Todo instance
	 *
	 * @var Todo
	 */
	protected $todo;

	/**
	 * Create new instance of Todo using inflection
	 *
	 * @param Todo $todo
	 */
	public function __construct(Todo $todo)
	{
		$this->todo = $todo;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$todos = $this->todo->all()->toArray();

		return Response::json(compact('todos'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::get('todo');

		$todo = $this->todo->create($data);
		$todo = $todo->toArray();

		return Response::json(compact('todo'), 201);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$data = Input::get('todo');
		$todo = $this->todo->findOrFail($id);

		$todo->update($data);
		$todo = $todo->toArray();

		return Response::json(compact('todo'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->todo->destroy($id);

		return Response::make(null, 204);
	}

}