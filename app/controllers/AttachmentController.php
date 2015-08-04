<?php

class AttachmentController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
		
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
	public function getAttachment($appId)
	{
		$application = Application::find($appId);
		if($application==null)
		{
			return Response::json(array(
				'error' => true,
				'attachments' => null),
				404
			);
		}
		return Response::json(array(
			'error' => false,
			'attachments' => $application->attachments->toArray()),
			200
		);
	}
	public function saveAttachment($appId)
	{
		$uploadedAttachments="";
		$missingAttachments="";
		DB::beginTransaction();
		try{
			if (Input::hasFile('apln'))
			{
				if (!file_exists(app('path.public').'/uploads/'.$appId)) {
				    mkdir(app('path.public').'/uploads/'.$appId, 0777, true);
				}
				Input::file('apln')->move(app('path.public').'/uploads/'.$appId,'application.'.Input::file('apln')->getClientOriginalExtension());
				$file = new Attachment;
				$file->application_id = $appId;
				$file->app_no = Application::find($appId)->fileNo;
				$file->file_cat = "application";
				$file->file_path = ''.$appId.'/application.'.Input::file('apln')->getClientOriginalExtension();
				$file->file_ext = Input::file('apln')->getClientOriginalExtension();
				$file->created_by = Auth::user()->id;
				$file->save();
				echo "applicaion uploaded";
			}
			if (Input::hasFile('noc'))
			{
				if (!file_exists(app('path.public').'/uploads/'.$appId)) {
				    mkdir(app('path.public').'/uploads/'.$appId, 0777, true);
				}
				Input::file('noc')->move(app('path.public').'/uploads/'.$appId,'noc.'.Input::file('noc')->getClientOriginalExtension());
				$file = new Attachment;
				$file->application_id = $appId;
				$file->app_no = Application::find($appId)->fileNo;
				$file->file_cat = "noc";
				$file->file_path = ''.$appId.'/noc.'.Input::file('noc')->getClientOriginalExtension();
				$file->file_ext = Input::file('apln')->getClientOriginalExtension();
				$file->created_by = Auth::user()->id;
				$file->save();
				echo "noc uploaded";
			}
			if (Input::hasFile('jamabandi'))
			{
				if (!file_exists(app('path.public').'/uploads/'.$appId)) {
				    mkdir(app('path.public').'/uploads/'.$appId, 0777, true);
				}
				Input::file('jamabandi')->move(app('path.public').'/uploads/'.$appId,'jamabandi.'.Input::file('jamabandi')->getClientOriginalExtension());
				$file = new Attachment;
				$file->application_id = $appId;
				$file->app_no = Application::find($appId)->fileNo;
				$file->file_cat = "jamabandi";
				$file->file_path = ''.$appId.'/jamabandi.'.Input::file('jamabandi')->getClientOriginalExtension();
				$file->file_ext = Input::file('jamabandi')->getClientOriginalExtension();
				$file->created_by = Auth::user()->id;
				$file->save();
				echo "jamabandi uploaded";
			}
			if (Input::hasFile('taxRecipt'))
			{
				if (!file_exists(app('path.public').'/uploads/'.$appId)) {
				    mkdir(app('path.public').'/uploads/'.$appId, 0777, true);
				}
				Input::file('taxRecipt')->move(app('path.public').'/uploads/'.$appId,'taxRecipt.'.Input::file('taxRecipt')->getClientOriginalExtension());
				$file = new Attachment;
				$file->application_id = $appId;
				$file->app_no = Application::find($appId)->fileNo;
				$file->file_cat = "taxRecipt";
				$file->file_path = ''.$appId.'/taxRecipt.'.Input::file('taxRecipt')->getClientOriginalExtension();
				$file->file_ext = Input::file('taxRecipt')->getClientOriginalExtension();
				$file->created_by = Auth::user()->id;
				$file->save();
				echo "taxReciept uploaded";
			}
			if (Input::hasFile('afdtNonlandless'))
			{
				if (!file_exists(app('path.public').'/uploads/'.$appId)) {
				    mkdir(app('path.public').'/uploads/'.$appId, 0777, true);
				}
				Input::file('afdtNonlandless')->move(app('path.public').'/uploads/'.$appId,'afdtNonlandless.'.Input::file('afdtNonlandless')->getClientOriginalExtension());
				$file = new Attachment;
				$file->application_id = $appId;
				$file->app_no = Application::find($appId)->fileNo;
				$file->file_cat = "afdtNonlandless";
				$file->file_path = ''.$appId.'/afdtNonlandless.'.Input::file('afdtNonlandless')->getClientOriginalExtension();
				$file->file_ext = Input::file('afdtNonlandless')->getClientOriginalExtension();
				$file->created_by = Auth::user()->id;
				$file->save();
				echo "taxReciept uploaded";
			}
			if (Input::hasFile('coPattdar'))
			{
				if (!file_exists(app('path.public').'/uploads/'.$appId)) {
				    mkdir(app('path.public').'/uploads/'.$appId, 0777, true);
				}
				Input::file('coPattdar')->move(app('path.public').'/uploads/'.$appId,'coPattdar.'.Input::file('coPattdar')->getClientOriginalExtension());
				$file = new Attachment;
				$file->application_id = $appId;
				$file->app_no = Application::find($appId)->fileNo;
				$file->file_cat = "coPattdar";
				$file->file_path = ''.$appId.'/coPattdar.'.Input::file('coPattdar')->getClientOriginalExtension();
				$file->file_ext = Input::file('coPattdar')->getClientOriginalExtension();
				$file->created_by = Auth::user()->id;
				$file->save();
				echo "coPattadar uploaded";
			}
			if (Input::hasFile('voterList'))
			{
				if (!file_exists(app('path.public').'/uploads/'.$appId)) {
				    mkdir(app('path.public').'/uploads/'.$appId, 0777, true);
				}
				Input::file('voterList')->move(app('path.public').'/uploads/'.$appId,'voterList.'.Input::file('voterList')->getClientOriginalExtension());
				$file = new Attachment;
				$file->application_id = $appId;
				$file->app_no = Application::find($appId)->fileNo;
				$file->file_cat = "voterList";
				$file->file_path = ''.$appId.'/voterList.'.Input::file('voterList')->getClientOriginalExtension();
				$file->file_ext = Input::file('voterList')->getClientOriginalExtension();
				$file->created_by = Auth::user()->id;
				$file->save();
				echo "voterList uploaded";
			}
			if (Input::hasFile('mandalReport'))
			{
				if (!file_exists(app('path.public').'/uploads/'.$appId)) {
				    mkdir(app('path.public').'/uploads/'.$appId, 0777, true);
				}
				Input::file('mandalReport')->move(app('path.public').'/uploads/'.$appId,'mandalReport.'.Input::file('mandalReport')->getClientOriginalExtension());
				$file = new Attachment;
				$file->application_id = $appId;
				$file->app_no = Application::find($appId)->fileNo;
				$file->file_cat = "mandalReport";
				$file->file_path = ''.$appId.'/mandalReport.'.Input::file('mandalReport')->getClientOriginalExtension();
				$file->file_ext = Input::file('mandalReport')->getClientOriginalExtension();
				$file->created_by = Auth::user()->id;
				$file->save();
				echo "mandalReport uploaded";
			}
			if (Input::hasFile('landHolding'))
			{
				if (!file_exists(app('path.public').'/uploads/'.$appId)) {
				    mkdir(app('path.public').'/uploads/'.$appId, 0777, true);
				}
				Input::file('landHolding')->move(app('path.public').'/uploads/'.$appId,'landHolding.'.Input::file('landHolding')->getClientOriginalExtension());
				$file = new Attachment;
				$file->application_id = $appId;
				$file->app_no = Application::find($appId)->fileNo;
				$file->file_cat = "landHolding";
				$file->file_path = ''.$appId.'/landHolding.'.Input::file('landHolding')->getClientOriginalExtension();
				$file->file_ext = Input::file('landHolding')->getClientOriginalExtension();
				$file->created_by = Auth::user()->id;
				$file->save();
				echo "landHolding uploaded";
			}
			if (Input::hasFile('traceMap'))
			{
				if (!file_exists(app('path.public').'/uploads/'.$appId)) {
				    mkdir(app('path.public').'/uploads/'.$appId, 0777, true);
				}
				Input::file('traceMap')->move(app('path.public').'/uploads/'.$appId,'traceMap.'.Input::file('traceMap')->getClientOriginalExtension());
				$file = new Attachment;
				$file->application_id = $appId;
				$file->app_no = Application::find($appId)->fileNo;
				$file->file_cat = "traceMap";
				$file->file_path = ''.$appId.'/traceMap.'.Input::file('traceMap')->getClientOriginalExtension();
				$file->file_ext = Input::file('traceMap')->getClientOriginalExtension();
				$file->created_by = Auth::user()->id;
				$file->save();
				echo "teraceMap uploaded";
			}
			if (Input::hasFile('landValuation'))
			{
				if (!file_exists(app('path.public').'/uploads/'.$appId)) {
				    mkdir(app('path.public').'/uploads/'.$appId, 0777, true);
				}
				Input::file('landValuation')->move(app('path.public').'/uploads/'.$appId,'landValuation.'.Input::file('landValuation')->getClientOriginalExtension());
				$file = new Attachment;
				$file->application_id = $appId;
				$file->app_no = Application::find($appId)->fileNo;
				$file->file_cat = "landValuation";
				$file->file_path = ''.$appId.'/landValuation.'.Input::file('landValuation')->getClientOriginalExtension();
				$file->file_ext = Input::file('landValuation')->getClientOriginalExtension();
				$file->created_by = Auth::user()->id;
				$file->save();
				echo "landValuation uploaded";
			}
			if (Input::hasFile('poa'))
			{
				if (!file_exists(app('path.public').'/uploads/'.$appId)) {
				    mkdir(app('path.public').'/uploads/'.$appId, 0777, true);
				}
				Input::file('poa')->move(app('path.public').'/uploads/'.$appId,'poa.'.Input::file('poa')->getClientOriginalExtension());
				$file = new Attachment;
				$file->application_id = $appId;
				$file->app_no = Application::find($appId)->fileNo;
				$file->file_cat = "poa";
				$file->file_path = ''.$appId.'/poa.'.Input::file('poa')->getClientOriginalExtension();
				$file->file_ext = Input::file('poa')->getClientOriginalExtension();
				$file->created_by = Auth::user()->id;
				$file->save();
				echo " Power of Attorney uploaded";
			}
			if (Input::hasFile('affpoa'))
			{
				if (!file_exists(app('path.public').'/uploads/'.$appId)) {
				    mkdir(app('path.public').'/uploads/'.$appId, 0777, true);
				}
				Input::file('affpoa')->move(app('path.public').'/uploads/'.$appId,'affpoa.'.Input::file('affpoa')->getClientOriginalExtension());
				$file = new Attachment;
				$file->application_id = $appId;
				$file->app_no = Application::find($appId)->fileNo;
				$file->file_cat = "affpoa";
				$file->file_path = ''.$appId.'/affpoa.'.Input::file('affpoa')->getClientOriginalExtension();
				$file->file_ext = Input::file('affpoa')->getClientOriginalExtension();
				$file->created_by = Auth::user()->id;
				$file->save();
				echo "Affidavit of Power of Attorney uploaded";
			}
			if (Input::hasFile('linkage'))
			{
				$name = Input::get("linkageName");
				$name = 'linkage'.preg_replace('/\s+/', '_', $name);
				if (!file_exists(app('path.public').'/uploads/'.$appId)) {
				    mkdir(app('path.public').'/uploads/'.$appId, 0777, true);
				}
				Input::file('linkage')->move(app('path.public').'/uploads/'.$appId,$name.'.'.Input::file('linkage')->getClientOriginalExtension());
				$file = new Attachment;
				$file->application_id = $appId;
				$file->app_no = Application::find($appId)->fileNo;
				$file->file_cat = "linkage";
				$file->file_path = ''.$appId.'/'.$name.'.'.Input::file('linkage')->getClientOriginalExtension();
				$file->file_ext = Input::file('linkage')->getClientOriginalExtension();
				$file->created_by = Auth::user()->id;
				$file->save();
				echo "Linkage uploaded";
			}
			if (Input::hasFile('nec'))
			{
				if (!file_exists(app('path.public').'/uploads/'.$appId)) {
				    mkdir(app('path.public').'/uploads/'.$appId, 0777, true);
				}
				Input::file('nec')->move(app('path.public').'/uploads/'.$appId,'nec.'.Input::file('nec')->getClientOriginalExtension());
				$file = new Attachment;
				$file->application_id = $appId;
				$file->app_no = Application::find($appId)->fileNo;
				$file->file_cat = "nec";
				$file->file_path = ''.$appId.'/nec.'.Input::file('nec')->getClientOriginalExtension();
				$file->file_ext = Input::file('nec')->getClientOriginalExtension();
				$file->created_by = Auth::user()->id;
				$file->save();
				/*$app = Application::find($appId);
				$app->nic = true;
				$app->nic_from = Input::get('nic_from');
				$app->nic_to = Input::get('nic_to');
				$app->save();
				if($app->isUrban==0)
					$app->status()->attach(2);
				else
					$app->status()->attach(9);
				//$id1 = DB::table('application_status')->insertGetId(array('application_id' => $appId, 'status_id' => 2,'created_at'=>date('Y-m-d H:m:s'),'updated_at' =>date('Y-m-d H:m:s'), 'created_by'=>Auth::user()->id));
						*/
				echo "Non Encumberence uploaded";
			}
			if (Input::hasFile('municipalNoc'))
			{
				if (!file_exists(app('path.public').'/uploads/'.$appId)) {
				    mkdir(app('path.public').'/uploads/'.$appId, 0777, true);
				}
				Input::file('municipalNoc')->move(app('path.public').'/uploads/'.$appId,'municipalNoc.'.Input::file('municipalNoc')->getClientOriginalExtension());
				$file = new Attachment;
				$file->application_id = $appId;
				$file->app_no = Application::find($appId)->fileNo;
				$file->file_cat = "municipalNoc";
				$file->file_path = ''.$appId.'/municipalNoc.'.Input::file('municipalNoc')->getClientOriginalExtension();
				$file->file_ext = Input::file('municipalNoc')->getClientOriginalExtension();
				$file->created_by = Auth::user()->id;
				$file->save();
				/*$app = Application::find($appId);
				$app->status()->attach(2);
				*/
				//$id1 = DB::table('application_status')->insertGetId(array('application_id' => $appId, 'status_id' => 2,'created_at'=>date('Y-m-d H:m:s'),'updated_at' =>date('Y-m-d H:m:s'), 'created_by'=>Auth::user()->id));
						
				echo "Municipal NOC uploaded";
			}
			if (Input::hasFile('other'))
			{
				if (!file_exists(app('path.public').'/uploads/'.$appId)) {
				    mkdir(app('path.public').'/uploads/'.$appId, 0777, true);
				}
				$name=Input::get("otherName");
				$name = preg_replace('/\s+/', '_', $name);
				Input::file('other')->move(app('path.public').'/uploads/'.$appId,$name.'.'.Input::file('other')->getClientOriginalExtension());
				$file = new Attachment;
				$file->application_id = $appId;
				$file->app_no = Application::find($appId)->fileNo;
				$file->file_cat = $name;
				$file->file_path = ''.$appId.'/'.$name.'.'.Input::file('other')->getClientOriginalExtension();
				$file->file_ext = Input::file('other')->getClientOriginalExtension();
				$file->created_by = Auth::user()->id;
				$file->save();
			}
			if (Input::has('imgBase64'))
			{
				//Input::file('voterList')->move(app('path.public').'/uploads/'.$appId,'voterList.'.Input::file('voterList')->getClientOriginalExtension());
				$rawData = Input::get('imgBase64');
				$filteredData = explode(',', $rawData);
				$unencoded = base64_decode($filteredData[1]);
				if (!file_exists(app('path.public').'/uploads/'.$appId)) {
				    mkdir(app('path.public').'/uploads/'.$appId, 0777, true);
				}
				$fileName = app('path.public').'/uploads/'.$appId.'/image.png';
				$fp = fopen($fileName, 'w');
				fwrite($fp, $unencoded);
				fclose($fp);
				$file = new Attachment;
				$file->application_id = $appId;
				$file->app_no = Application::find($appId)->fileNo;
				$file->file_cat = "image";
				$file->file_path = ''.$appId.'/image.png';
				$file->file_ext = 'png';
				$file->created_by = Auth::user()->id;
				$file->save();
				echo "image uploaded";
			}
			//DB::table('application_status')->where('application_id', '=', $appId)->delete();
			//$id = DB::table('application_status')->insertGetId(array('application_id' => $appId, 'status_id' => 2,'created_at'=>'now()','updated_at' =>'now()', 'created_by'=>Auth::user()->id));
		}
		catch( Exception $e)
		{
			DB::rollback();
			throw $e;
		}
		DB::commit();
		return Redirect::to('/home');
	}
	
	public function downloadAttachment($appId,$filename)
	{
		$file = app('path.public').'/uploads/'.$appId."/".$filename;
		if($filename!='image.png')
			$headers = array('Content-Type'=>'application/pdf');
		else
			$headers = array('Content-Type'=>'application/png');
		return Response::download($file,$appId."_".$filename,$headers);
	}
	
}
