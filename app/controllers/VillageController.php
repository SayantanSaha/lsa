<?php

class VillageController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$villages = Village::all();
 
		return Response::json(array(
			'error' => false,
			'villages' => $villages->toArray()),
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
		$village = new Village;
		$village->name = Request::get('name');	
		$village->mouza_id = Request::get('mouza_id');	
		$village->created_by = Auth::user()->id;
		$village->save();
    //validations and filtering to be added
    
 
		return Response::json(array(
			'error' => false,
			'mouza' => $village->toArray()),
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
		$village = Village::find($id);
		
		if($village==null)
		{
			return Response::json(array(
				'error' => true,
				'village' => null),
				404
			);
		}
	 
		return Response::json(array(
			'error' => false,
			'village' => $village->toArray()),
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
		$village = Village::find($id);
		
		if($village==null)
		{
			return Response::json(array(
				'error' => true,
				'village' => null),
				404
			);
		}
		$village->name = Request::get('name');
		$village->mouza_id = Request::get('mouza_id');		
		$village->updated_by = Auth::user()->id;
		$village->save();
	}
	
	public function saveRate($id)
	{
		$village = Village::find($id);
		
		if($village==null)
		{
			return Response::json(array(
				'error' => true,
				'village' => null),
				404
			);
		}
		$village->classes()->attach([Input::get("class") => ['rate' => Input::get("rate")]]);
		return Response::json(array(
				'error' => false),
				200
			);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$village = Village::find($id);
		
		if($village==null)
		{
			return Response::json(array(
				'error' => true,
				'village' => null),
				404
			);
		}
		$village->name = Request::get('name');
		$village->mouza_id = Request::get('mouza_id');		
		$village->updated_by = Auth::user()->id;
		$village->save();
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$village = Village::find($id);
		if($village==null)
		{
			return Response::json(array(
				'error' => true,
				'village' => null),
				404
			);
		}
		$village->delete();
	}


}
