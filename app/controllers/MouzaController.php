<?php

class MouzaController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$mouzas = Mouza::all();
 
		return Response::json(array(
			'error' => false,
			'mouzas' => $mouzas->toArray()),
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
		$mouza = new Mouza;
		$mouza->name = Request::get('name');	
		$mouza->circle_id = Request::get('circle_id');	
		$mouza->created_by = Auth::user()->id;
		$mouza->save();
    //validations and filtering to be added
    
 
		return Response::json(array(
			'error' => false,
			'circle' => $mouza->toArray()),
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
		$mouza = Mouza::find($id);
		
		if($mouza==null)
		{
			return Response::json(array(
				'error' => true,
				'mouza' => null),
				404
			);
		}
	 
		return Response::json(array(
			'error' => false,
			'mouza' => $mouza->toArray()),
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
		$mouza = Mouza::find($id);
		
		if($mouza==null)
		{
			return Response::json(array(
				'error' => true,
				'mouza' => null),
				404
			);
		}
		$mouza->name = Request::get('name');
		$mouza->circle_id = Request::get('circle_id');		
		$mouza->updated_by = Auth::user()->id;
		$mouza->save();
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$mouza = Mouza::find($id);
		
		if($mouza==null)
		{
			return Response::json(array(
				'error' => true,
				'mouza' => null),
				404
			);
		}
		$mouza->name = Request::get('name');
		$mouza->circle_id = Request::get('circle_id');		
		$mouza->updated_by = Auth::user()->id;
		$mouza->save();
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$mouza = Mouza::find($id);
		if($mouza==null)
		{
			return Response::json(array(
				'error' => true,
				'mouza' => null),
				404
			);
		}
		$mouza->delete();
	}

	public function showVillages($id)
	{
		$mouza = Mouza::find($id);
		
		if($mouza==null)
		{
			return Response::json(array(
				'error' => true,
				'villages' => null),
				404
			);
		}
	 
		return Response::json(array(
			'error' => false,
			'villages' => $mouza->villages->toArray()),
			200
		);
	}
}
