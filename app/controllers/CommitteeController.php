<?php

class CommitteeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		echo "hello";
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
		DB::beginTransaction();
		try{
		$committee = new Committee();
		$committee->date = Request::get('comDate');
		//$committee->fromDate = Request::get('comFDate');
		//$committee->toDate = Request::get('comTDate');
		$committee->save();
		$inputs = Input::all();
		$members=array();
		$users=array();
		$i=0;
		foreach($inputs as $key => $value)
		{
			if(substr($key,0,4)=="user")
			{
				//$members[$i] = new Member();
				//$members[$i]->user_id = substr($key,4);
				$circles[$i] = User::find(substr($key,4))->circle_id;
				$i = $i+1;
				//$user = User::find(substr($key,4));
				$committee->users()->attach(substr($key,4));
			}
			//return Response::json($key);
			
		}
		//$committee->members()->saveMany($members);
		//return Response::json($inputs);
		}
		catch( Exception $e)
		{
			DB::rollback();
			throw $e;
		}
		DB::commit();
		/*return Response::json(array(
			'error' => false,
			'committee' => $committee->id),
			200
		);*/
		
		$applications = Application::whereIn("circle_id",$circles)->adc()->get();
		$arq = array();
		$i=0;
		foreach($applications as $application)
		{
			//$arq[$i] = array('committee_id'=>$committee->id,'application_id'=>$application->id,'status'=>'pending','created_at'=>'now()','updated_at'=>'now()');
			//$i=$i+1;
			$committee->applications()->attach($application->id, array('status' => 'pending'));
		}
		//DB::table('committee_application')->insert($arq);
		Session::put('committee', $committee->id);
		return View::make('list')->withApplications($applications);
		
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Committee::find($id);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
