<?php

class CircleController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$circles = Circle::all();
 
		return Response::json(array(
			'error' => false,
			'circles' => $circles->toArray()),
			200
		);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$circle = new Circle;
		$circle->name = Request::get('name');	
		$circle->subdivision_id = Request::get('subdivision_id');	
		$circle->created_by = Auth::user()->id;
		$circle->save();
    //validations and filtering to be added
    
 
		return Response::json(array(
			'error' => false,
			'circle' => $circle->toArray()),
			200
		);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$circle = Circle::find($id);
		
		if($circle==null)
		{
			return Response::json(array(
				'error' => true,
				'circle' => null),
				404
			);
		}
	 
		return Response::json(array(
			'error' => false,
			'circle' => $circle->toArray()),
			200
		);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$circle = Circle::find($id);
		
		if($circle==null)
		{
			return Response::json(array(
				'error' => true,
				'circle' => null),
				404
			);
		}
		$circle->name = Request::get('name');
		$circle->subdivision_id = Request::get('subdivision_id');		
		$circle->updated_by = Auth::user()->id;
		$circle->save();
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$circle = Circle::find($id);
		if($circle==null)
		{
			return Response::json(array(
				'error' => true,
				'circle' => null),
				404
			);
		}
		$circle->name = Request::get('name');	
		$circle->subdivision_id = Request::get('subdivision_id');
		$circle->updated_by = Auth::user()->id;
		$circle->save();
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$circle = Circle::find($id);
		if($circle==null)
		{
			return Response::json(array(
				'error' => true,
				'circle' => null),
				404
			);
		}
		$circle->delete();
	}

	public function showMouzas($id)
	{
		$circle = Circle::find($id);
		
		if($circle==null)
		{
			return Response::json(array(
				'error' => true,
				'circle' => null),
				404
			);
		}
	 
		return Response::json(array(
			'error' => false,
			'mouzas' => $circle->mouzas->toArray()),
			200
		);
	}
}
