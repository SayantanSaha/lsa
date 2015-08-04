<?php

class DistrictController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$districts = District::all();
 
		return Response::json(array(
			'error' => false,
			'districts' => $districts->toArray()),
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
		$district = new District;
		$district->name = Request::get('distName');
		$district->srtName = Request::get('distSrtName');		
		$district->created_by = Auth::user()->id;
		$district->save();
    //validations and filtering to be added
    
 
    return Response::json(array(
        'error' => false,
        'district' => $district->toArray()),
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
		$district = District::find($id);
		
		if($district==null)
		{
			return Response::json(array(
				'error' => true,
				'district' => null),
				404
			);
		}
	 
		return Response::json(array(
			'error' => false,
			'district' => $district->toArray()),
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
		$district = District::find($id);
		
		if($district==null)
		{
			return Response::json(array(
				'error' => true,
				'district' => null),
				404
			);
		}
		$district->name = Request::get('name');		
		$district->updated_by = Auth::user()->id;
		$district->save();
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$district = District::find($id);
		if($district==null)
		{
			return Response::json(array(
				'error' => true,
				'district' => null),
				404
			);
		}
		$district->name = Request::get('name');		
		$district->updated_by = Auth::user()->id;
		$district->save();
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$district = District::find($id);
		if($district==null)
		{
			return Response::json(array(
				'error' => true,
				'district' => null),
				404
			);
		}
		$district->delete();
	}
	public function showSubdivisions($id)
	{
		$district = District::find($id);
		$subdivisions = $district->subdivisions;
		if($subdivisions != null)
		{
			return Response::json(array(
				'error' => false,
				'subdivisions' => $subdivisions->toArray()),
				200
			);
		}
	}
	public function showCircles($id)
	{
		$district = District::find($id);
		$circles = $district->circles;
		if($circles != null)
		{
			return Response::json(array(
				'error' => false,
				'circles' => $circles->toArray()),
				200
			);
		}
	}

}
