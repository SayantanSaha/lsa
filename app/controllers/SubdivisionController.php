<?php

class SubdivisionController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$subdivisions = Subdivision::all();
 
		return Response::json(array(
			'error' => false,
			'subdivisions' => $subdivisions->toArray()),
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
		$subdivision = new Subdivision;
		$subdivision->name = Request::get('name');	
		$subdivision->district_id = Request::get('district_id');	
		$subdivision->created_by = Auth::user()->id;
		$subdivision->save();
    //validations and filtering to be added
    
 
    return Response::json(array(
        'error' => false,
        'subdivision' => $subdivision->toArray()),
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
		$subdivision = Subdivision::find($id);
		
		if($subdivision==null)
		{
			return Response::json(array(
				'error' => true,
				'subdivision' => null),
				404
			);
		}
	 
		return Response::json(array(
			'error' => false,
			'subdivision' => $subdivision->toArray()),
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
		$subdivision = Subdivision::find($id);
		
		if($subdivision==null)
		{
			return Response::json(array(
				'error' => true,
				'subdivision' => null),
				404
			);
		}
		$subdivision->name = Request::get('name');
		$subdivision->district_id = Request::get('district_id');		
		$subdivision->updated_by = Auth::user()->id;
		$subdivision->save();
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$subdivision = Subdivision::find($id);
		if($subdivision==null)
		{
			return Response::json(array(
				'error' => true,
				'subdivision' => null),
				404
			);
		}
		$subdivision->name = Request::get('name');	
		$subdivision->district_id = Request::get('district_id');
		$subdivision->updated_by = Auth::user()->id;
		$subdivision->save();
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$subdivision = Subdivision::find($id);
		if($subdivision==null)
		{
			return Response::json(array(
				'error' => true,
				'subdivision' => null),
				404
			);
		}
		$subdivision->delete();
	}
}
