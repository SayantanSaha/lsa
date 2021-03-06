<?php

class PageController extends BaseController {

    /**
     * Show the profile for the given user.
     */
    public function showHome()
    {
        $data = array('name'=>Auth::user()->name,'desig'=>Auth::user()->designation,'office'=>Auth::user()->office,'dist'=>Auth::user()->district_id,'circle'=>Auth::user()->circle_id,'app'=>null);
		
		if(Auth::user()->roles->get('0')->id == 5)
		{
			$applications = Application::incomplete()->where('created_by','=',Auth::user()->id)->get();
			return View::make('home_asst')->withApp($applications);
		}
		else if(Auth::user()->roles->get('0')->id == 4)
		{
			return View::make('home_co',$data);
		}
		else if(Auth::user()->roles->get('0')->id == 3)
		{
			//$committees = Committee::orderBy('id','desc')->take(5)->get();
			//return View::make('home_adc')->withCommittees($committees);
			$applications = Application::adc()->get();
			return View::make('home_adc')->withApp($applications);
		}
		else if(Auth::user()->roles->get('0')->id == 2)
		{
			//$applications = Application::whereRaw('DATEDIFF(CURRENT_DATE,fileDate)>45')->adc()->get();
			$applications = Application::dc()->get();
			$committees = Committee::orderBy('id','desc')->take(5)->get();
			$data = array('app'=>$applications,'comm'=>$committees);
			return View::make('home_dc',$data);
		}
		else if(Auth::user()->roles->get('0')->id == 1)
		{
			$districts = District::all();
			return View::make('home_admin')->withDistricts($districts);
		}
		else if(Auth::user()->roles->get('0')->id == 7)
		{
			$applications = Application::sro()->where('nic','=','false')->get();
			return View::make('home_sro')->withApp($applications);
		}
		else if(Auth::user()->roles->get('0')->id == 8)
		{
			$applications = Application::mb()->get();
			return View::make('home_sro')->withApp($applications); // HomePage for SRO and CEO MB/TC is same
		}
    }
	public function showCommHome()
	{
		$users = User::where('district_id', '=', Auth::user()->district_id)->whereIn('role',  array(3,4,7))->orderBy('role')->get();
		return View::make('com_create')->withUsers($users);
	}
	public function showDistHome($id)
	{
		$dist = District::find($id);
		$subdivs = $dist->subdivisions;
		$data=array('subdivs'=>$subdivs,'distId'=>$id);
		return View::make('home_dist',$data);
	}
	public function showSubdivHome($id)
	{
		$subdiv = Subdivision::find($id);
		$circles = $subdiv->circles;
		$data=array('circles'=>$circles,'subdivId'=>$id);
		return View::make('home_subdiv',$data);
	}
	public function showCircleHome($id)
	{
		$circle = Circle::find($id);
		$villages = $circle->circles;
		//$data=array('circles'=>$circles,'subdivId'=>$id);
		return View::make('home_circle')->withCircle($circle);
	}
	public function showMouzaHome($id)
	{
		$mouza = Mouza::find($id);
		return View::make('home_mouza')->withMouza($mouza);
	}
	public function showVillageHome($id)
	{
		$village = Village::find($id);
		$classes = LandClass::all();
		$data=array('village'=>$village,'classes'=>$classes);
		return View::make('home_village',$data);
	}
	public function showEdit($appid)
	{
		$app = Application :: find($appid);
		//$data = array('name'=>Auth::user()->name,'desig'=>Auth::user()->designation,'office'=>Auth::user()->office,'dist'=>Auth::user()->district_id,'circle'=>Auth::user()->circle_id,'app'=>$app);
		
		if(Auth::user()->id ==  $app->created_by)
		{
			return View::make('edit')->withApp($app);
		}
		else
		{
			return View::make('error',array('error_code'=>'403','error_message'=>"Sorry!!! You are forbidden to use this page."));
		}
	}
	public function showList($appStatus)
    {
		$status= 0;
		switch($appStatus)
		{
			case 'incomplete':
				$applications = Application::where("circle_id","=",Auth::user()->circle_id)->incomplete()->get();
				break;
			case 'co':
				$applications = Application::where("circle_id","=",Auth::user()->circle_id)->co()->get();
				break;
			case 'coReturn':
				$applications = Application::where("circle_id","=",Auth::user()->circle_id)->coReturn()->get();
				break;
			case 'adc':
				$applications = Application::where("circle_id","=",Auth::user()->circle_id)->adc()->get();
				break;
			case 'adcReturn':
				$applications = Application::where("circle_id","=",Auth::user()->circle_id)->adcReturn()->get();
				break;
			case 'complete':
				$applications = Application::where("circle_id","=",Auth::user()->circle_id)->complete()->get();
				break;
			default:
				return View::make('error',array('error_code'=>'404','error_message'=>'Page Not Found'));
		}
		//$data = array('name'=>Auth::user()->name,'desig'=>Auth::user()->designation,'office'=>Auth::user()->office,'dist'=>Auth::user()->district_id,'circle'=>Auth::user()->circle_id,'appStatus'=>$appStatus,'statusCode'=>$status,'role'=>Auth::user()->roles->get('0')->id);
		return View::make('list')->withApplications($applications);
	}
	
	public function showDetails($appId)
	{
		
		$application = Application::find($appId);
		//return  Auth::user()->office;
		return View::make('view')->withApp($application);
		$data = array();
		if(Auth::user()->roles->get('0')->id>3)
		{
			if($application->mouza->circle->id == Auth::user()->circle_id) 
			{
				$data = array('name'=>Auth::user()->name,'desig'=>Auth::user()->designation,'office'=>Auth::user()->office,'dist'=>Auth::user()->district_id,'circle'=>Auth::user()->circle_id,'appId'=>$appId,'role'=>Auth::user()->roles->get('0')->id,'app'=>$application);
				return View::make('view')->withApp($application);
				//return $data;
			}
		}
		else if (Auth::user()->roles->get('0')->id>0 && Auth::user()->roles->get('0')->id<=3)
		{
			if($application->mouza->circle->subdivision->district->id == Auth::user()->dist_id)
			{
				$data = array('name'=>Auth::user()->name,'desig'=>Auth::user()->designation,'office'=>Auth::user()->office,'dist'=>Auth::user()->district_id,'circle'=>Auth::user()->circle_id,'appId'=>$appId,'role'=>Auth::user()->roles->get('0')->id,'app'=>$application);
				return View::make('view')->withApp($application);
				//return $data;
			}
		}
		else
		{
			return $data;
			return View::make('404');
		}
	}
	public function showNIC($appId)
	{
		$application = Application::find($appId);
		if(Auth::user()->roles->get('0')->id==7 && $application->status->get(0)->id==7)
			return View::make('nic')->withApp($application);
		else
			return View::make('error',array('error_code'=>'403','error_message'=>"Sorry!!! You are forbidden to use this page."));
	}
	
	public function showCommittee($commId)
	{
		$committee = Committee::find($commId);
		return View::make('home_comm')->withCommittee($committee);
	}
	public function showNew()
	{
		//$committee = Committee::find($commId);
		return View::make('newApp');
	}
	public function showNOC($id)
	{
		$application = Application::find($id);
		if($application->status->get(0)->id==9)
			return View::make('noc')->withApp($application); 
		else
			return View::make('error',array('error_code'=>'403','error_message'=>"Sorry!!! You are forbidden to use this page."));
	}
	public function showAck($id)
	{
		$application = Application::find($id);
		
		return View::make('ack')->withApp($application); 
	}
	public function showProfile()
	{
		return View::make('profile')->withUser(Auth::user());
	}
}
