<?php

class ApplicationController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$applications = Application::all();
 
		return Response::json(array(
			'error' => false,
			'applications' => $applications->toArray()),
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
		
		DB::beginTransaction();
		try{
			$date = date("Y/m/d");
			$count = Application::whereRaw('cast(created_at as date) = CURRENT_DATE and circle_id='.Auth::user()->circle_id)->count();
			$fileNo = "AS/".Auth::user()->district->srtName."/".Auth::user()->circle_id."/".$date."/".($count+1);			
			$application 			= new Application;			
			$application->fileNo 		= $fileNo;
			$application->circle_id		= Auth::user()->circle_id;
			$application->fileDate 		= Request::get('fileDate');			
			$application->landVill 		= Request::get('landVill');
			$application->landMouza 	= Request::get('landMouza');
			$application->landPatta 	= Request::get('landPatta');
			$application->landDag 		= Request::get('landDag');
			$application->class_id		= Request::get('landClass');			
			$application->soldB 		= Request::get('soldB');
			$application->soldK 		= Request::get('soldK');
			$application->soldL 		= Request::get('soldL');
			$application->pattajariYear	= Request::get('pattajariYear');						
			$application->created_by 	= Auth::user()->id;
			$application->zonal_value	= DB::table('rates')->where('village_id', Request::get('landVill'))->where('class', Request::get('landClass'))->pluck('rate');
			$application->save();
			$id = DB::table('application_status')->insertGetId(array('application_id' => $application->id, 'status_id' => 1,'created_at'=>date('Y-m-d H:m:s'),'updated_at' =>date('Y-m-d H:m:s'), 'created_by'=>Auth::user()->id));
			$sellers = Request::get('sellers');
			for($i=0;$i<sizeof($sellers);$i++)
			{
				$seller[$i] = new Seller();
				$seller[$i]->name = $sellers[$i]['name'];
				$seller[$i]->fname = $sellers[$i]['fname'];
				$seller[$i]->mouza_id = $sellers[$i]['mouza'];
				$seller[$i]->village_id = $sellers[$i]['village'];
				$seller[$i]->phone_no = $sellers[$i]['phone'];
			}
			$application->sellers()->saveMany($seller);
			$buyers = Request::get('buyers');
			for($i=0;$i<sizeof($buyers);$i++)
			{
				$buyer[$i] = new Buyer();
				$buyer[$i]->name = $buyers[$i]['name'];
				$buyer[$i]->fname = $buyers[$i]['fname'];
				$buyer[$i]->mouza = $buyers[$i]['mouza'];
				$buyer[$i]->village = $buyers[$i]['village'];
				$buyer[$i]->ceiling = $buyers[$i]['celing'];
				$buyer[$i]->phone_no = $buyer[$i]['phone'];
				$buyer[$i]->pan = $buyer[$i]['pan'];
				$buyer[$i]->uid = $buyer[$i]['uid'];
			}
			$application->buyers()->saveMany($buyer);
			
			//return $application->fileNo;
		}
		catch( Exception $e)
		{
			DB::rollback();
			throw $e;
		}
		DB::commit();
		return Response::json(array(
			'error' => false,
			'application' => $application->id),
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
		$application = Application::find($id);
		
		if($application==null)
		{
			return Response::json(array(
				'error' => true,
				'application' => null),
				404
			);
		}
	 
		return Response::json(array(
			'error' => false,
			'application' => $application->toArray()),
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
		$application = Application::find($id);
	
		if($application==null)
		{
			return Response::json(array(
				'error' => true,
				'application' => null),
				404
			);
		}
		DB::beginTransaction();
		try{
			
			$application->chithaB 		= Request::get('chithaB');
			$application->chithaK 		= Request::get('chithaK');
			$application->chithaL 		= Request::get('chithaL');
			$application->ownedB 		= Request::get('ownedB');
			$application->ownedK 		= Request::get('ownedK');
			$application->ownedL 		= Request::get('ownedL');
			$application->value_per_bigha	= Request::get('value_per_bigha');
			$application->pattajariYear	= Request::get('pattajariYear');
			$application->isUrban   	= Request::get('urban');
			$application->save();			
			$rm 				= new RemainingLand();
			$rm->mouza 			= Request::get('remainingMouza');
			$rm->village			= Request::get('remainingVill');
			$rm->patta			= Request::get('remainingPatta');
			$rm->daag			= Request::get('remainingDag');
			$rm->bigha			= Request::get('remainingB');
			$rm->katha			= Request::get('remainingK');
			$rm->lecha			= Request::get('remainingL');
			$application->remaining_land()->save($rm);
			if(Request::get('lm_comment')!=null || Request::get('lm_comment')!=' ')
			{
				$cmt 			= new Comment();
				$cmt->txt		= Request::get('lm_comment');
				$cmt->application_id 	= $application->id;
				$cmt->created_by	= Auth::user()->id;
				$cmt->save();
			}
		}
		catch( Exception $e)
		{
			DB::rollback();
			throw $e;
		}
		DB::commit();
		return Response::json(array(
			'error' => false,
			'application' => $application->id),
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
	public function showStatus($id)
	{
		$status = Application::find($id)->status;
		return Response::json(array(
			'error' => false,
			'status' => $status->toArray()),
			200
		);
	}
	public function showCount($circleId,$appStatus)
	{
		switch ($appStatus) {
			case 'incomplete':
				$applications = Application::whereRaw('landMouza in (select id from mouzas where circle_id ='.$circleId.')')->incomplete()->count();
				break;
			case 'co':
				$applications = Application::whereRaw('landMouza in (select id from mouzas where circle_id ='.$circleId.')')->co()->count();
				break;
			case 'coReturn':
				$applications = Application::whereRaw('landMouza in (select id from mouzas where circle_id ='.$circleId.')')->coReturn()->count();
				break;
			case 'adc':
				$applications = Application::whereRaw('landMouza in (select id from mouzas where circle_id ='.$circleId.')')->adc()->count();
				break;
			case 'adcReturn':
				$applications = Application::whereRaw('landMouza in (select id from mouzas where circle_id ='.$circleId.')')->adcReturn()->count();
				break;
			case 'complete':
				$applications = Application::whereRaw('landMouza in (select id from mouzas where circle_id ='.$circleId.')')->complete()->count();
				break;
			case 'coOverdue':
				$applications = Application::whereRaw('landMouza in (select id from mouzas where circle_id ='.$circleId.')')->coOverdue()->count();
				break;
			case 'adcOverdue':
				$applications = Application::whereRaw('landMouza in (select id from mouzas where circle_id ='.$circleId.')')->adcOverdue()->count();
				break;
			default :
				return Response::json(array(
					'error' => true,
					'count' => 0),
					404
				);
		}
		
		return Response::json(array(
			'error' => false,
			'count' => $applications),
			200
		);
	}
	
	public function showList($circleId,$appStatus)
	{
		switch ($appStatus) {
			case 'incomplete':
				$applications = Application::whereRaw('landMouza in (select id from mouzas where circle_id ='.$circleId.')')->incomplete()->get();
				break;
			case 'co':
				$applications = Application::whereRaw('landMouza in (select id from mouzas where circle_id ='.$circleId.')')->co()->get();
				break;
			case 'coReturn':
				$applications = Application::whereRaw('landMouza in (select id from mouzas where circle_id ='.$circleId.')')->coReturn()->get();
				break;
			case 'adc':
				$applications = Application::whereRaw('landMouza in (select id from mouzas where circle_id ='.$circleId.')')->adc()->get();
				break;
			case 'adcReturn':
				$applications = Application::whereRaw('landMouza in (select id from mouzas where circle_id ='.$circleId.')')->adcReturn()->get();
				break;
			case 'complete':
				$applications = Application::whereRaw('landMouza in (select id from mouzas where circle_id ='.$circleId.')')->complete()->get();
				break;
			default :
				return Response::json(array(
					'error' => true,
					'applications' => 0),
					404
				);
		}
		
		return Response::json(array(
			'error' => false,
			'applications' => $applications->toArray()),
			200
		);
	}
	public function searchList()
	{
		$searchString = Request::get('searchString');
		$applications = Application::whereRaw("(fileNo like '%".$searchString."%' )")->get();
		
		return View::make("searchList")->withApp($applications);
		/*return Response::json(array(
			'error' => false,
			'applications' => $applications->toArray()),
			200
		);*/
	}
	public function committeeList()
	{
		$circles = Request::get('circles');
		
		$applications = Application::whereIn("circle_id",$circles)->adc()->get();
		
		
		return Response::json(array(
			'error' => false,
			'applications' => $applications->toArray()),
			200
		);
	}
	public function getClass($id)
	{
		$vill = Village::find($id);
		
		$classes = $vill->classes;
		
		
		return Response::json(array(
			'error' => false,
			'classes' => $classes->toArray()),
			200
		);
	}
	public function updateMultipleStatus()
	{
		$list = Input::get("list");
		if(Auth::user()->roles->get('0')->id==2)
		{
			foreach ($list as $id) 
			{
				$app = Application::find($id);
			    	
					$app->status()->attach(9, ['created_by' => Auth::user()->id]);
			    	
			}
			return Response::json(array(
				'error' => false,
				'msg' => "success"),
				200
			);
		}
		else
		{
			return Response::json(array(
				'error' => true,
				'msg' => "unauthorised"),
				401
			);
		}
	}
	public function updateStatus($id)
	{
		
		DB::beginTransaction();
		
			$action = Request::get('action');
			$userRole = Auth::user()->roles->get('0')->id;
			$app = Application::find($id);
			//$comment = Request::get('comment');
			$userId = Auth::user()->id;
			$appId = $id;
			$status =0;
			if($userRole == 4 && $action == "approve")
				$status = 4;
			else if ($userRole == 4 && $action == "return")
				$status = 3;
			else if($userRole == 3 && $action == "approve")
				$status = 6;
			else if ($userRole == 3 && $action == "return")
				$status = 5;
			else if ($userRole == 7 && $action == "return")
				$status = 1;
			try{
				//DB::table('application_status')->where('application_id', '=', $id)->delete();
				//Application::find($id)->status()->attach($status);
				//if (Input::has('pwdCO'))
				/*if (Input::has('valueADC'))
				{
				    	//if (Hash::check(Input::get('pwdCO'), Application::find($id)->circle->users->get(0)->password))
					//{
					    $id1 = DB::table('application_status')->insertGetId(array('application_id' => $id, 'status_id' => $status,'created_at'=>date('Y-m-d H:m:s'),'updated_at' =>date('Y-m-d H:m:s'), 'created_by'=>$userId));
						//$app = Application::find($id);
						//return Response::json($app->circle->users->get(0)->id);
						$app->net_value_adc=Input::get('valueADC');
						$app->save();
						
						$commentADC = new Comment;
						if($commentADC != null)
						{
							$commentADC->txt = Input::get('commentADC');
							$commentADC->application_id = $appId;
							$commentADC->created_by = $userId;
							$commentADC->save();
					
						}
						/*$commentCO = new Comment;
						if($commentCO != null)
						{
							$commentCO->txt = Input::get('commentCO');
							$commentCO->application_id = $appId;
							$commentCO->created_by = Application::find($id)->circle->users->get(0)->id;
							$commentCO->save();
					
						}*/
						/*if($action == "approve")
						{
                                                    if($app->net_value_co==$app->net_value_adc)
                                                    {
							Committee::find(Session::get('committee'))->applications()->updateExistingPivot($appId, array('status'=>'approved'));
							//return "pass";
                                                    }
                                                    else {
                                                        Committee::find(Session::get('committee'))->applications()->updateExistingPivot($appId, array('status'=>'approved after review'));
                                                    }
						}
						else if($action == "return")
							Committee::find(Session::get('committee'))->applications()->updateExistingPivot($appId, array('status'=>'returned'));
						*/
					//}
					/*else
					{
						return Response::json(array(
							'error' => true,
							'er' => "CO Password Does Not Match"),
							403
						);
					}
				}
				else
				{*/
					if($userRole == 3)
					{
						$id1 = DB::table('application_status')->insertGetId(array('application_id' => $id, 'status_id' => $status,'created_at'=>date('Y-m-d H:m:s'),'updated_at' =>date('Y-m-d H:m:s'), 'created_by'=>$userId));
						$app = Application::find($id);
						$app->net_value_adc=Input::get('valueADC');
						$app->save();
						$commentADC = new Comment;
						if($commentADC != null)
						{
							$commentADC->txt = Input::get('commentADC');
							$commentADC->application_id = $appId;
							$commentADC->created_by = $userId;
							$commentADC->save();
					
						}
						
						
						/*if($action == "approve")
							Committee::find(Session::get('committee'))->applications()->updateExistingPivot($appId, array('status'=>'approved'));
						else if($action == "return")
							Committee::find(Session::get('committee'))->applications()->updateExistingPivot($appId, array('status'=>'returned'));
					*/}
					else if($userRole == 4)
					{
						$id1 = DB::table('application_status')->insertGetId(array('application_id' => $id, 'status_id' => $status,'created_at'=>date('Y-m-d H:m:s'),'updated_at' =>date('Y-m-d H:m:s'), 'created_by'=>$userId));
						$app = Application::find($id);
						$app->net_value_co=Input::get('valueCO');
						//$app->value_per_bigha=Input::get('valueBigha');
						$app->save();
						if(Input::has('commentCO'))
						{
							$commentCO = new Comment;
							if($commentCO != null)
							{
								$commentCO->txt = Input::get('commentCO');
								$commentCO->application_id = $appId;
								$commentCO->created_by = $userId;
								$commentCO->save();
					
							}
						}
					}
					else if($userRole == 5)
					{
						//$id1 = DB::table('application_status')->insertGetId(array('application_id' => $id, 'status_id' => 7,'created_at'=>date('Y-m-d H:m:s'),'updated_at' =>date('Y-m-d H:m:s'), 'created_by'=>$userId));
						$app = Application::find($id);
						$app->status()->attach(2, ['created_by' => Auth::user()->id]);
						//return $id;
						$app->touch();
					}
					
					else if ($userRole == 7)
					{
						$id1 = DB::table('application_status')->insertGetId(array('application_id' => $id, 'status_id' => $status,'created_at'=>date('Y-m-d H:m:s'),'updated_at' =>date('Y-m-d H:m:s'), 'created_by'=>$userId));
						$app = Application::find($id);
						
						if(Input::has('commentSRO'))
						{
							$commentSRO = new Comment;
							if($commentSRO != null)
							{
								$commentSRO->txt = Input::get('commentSRO');
								$commentSRO->application_id = $appId;
								$commentSRO->created_by = $userId;
								$commentSRO->save();
					
							}
						}
					}
				//}
				
				
			}
			catch(Exception $e)
			{
				DB::rollback();
				throw $e;
				return Response::json(array(
					'error' => true,
					'er' => $e),
					500
				);
			}
			DB::commit();
			return Response::json(array(
					'error' => false
					),
					200
				);
		
	}
	
}
