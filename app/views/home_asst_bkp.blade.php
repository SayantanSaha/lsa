

@extends('layout')
@section('style') 
<!-- File Input -->
	<link href="/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
	<link href="/css/datepicker3.css"   media="all" rel="stylesheet" type="text/css" />
@stop
@section('sidebar')   
<!--	<li class="sidebar-search">
		<div class="input-group custom-search-form">
			<input type="text" class="form-control" placeholder="Search Application">
			<span class="input-group-btn">
			<button class="btn btn-default" type="button">
				<i class="fa fa-search"></i>
			</button>
		</span>
		</div>
		
	</li>
    	<li><a href="">{{{ $name }}}</a></li>
	<li><a href="">{{{ $desig }}}</a></li>
	<li><a href="">{{{ $office }}}</a></li>
	<li><a href="/incomplete">Incomplete Applications <span id="inclpt" style="background-color:red;" class="badge"></span></a></li>
	<li><a href="">New Application</a></li>
	<li><a href="">View Status</a></li>
	<li><a href="/logout" class="btn btn-danger">Log Out</a></li>-->
@stop

@section('content')
    <div class="row">
		<div class="col l12">
			<h1 class="page-header">{{{Lang::get('lable.heading')}}}</h1>
		</div>
		<!-- /.col l12 -->		
	</div>
	<div class="row">
		<div class="col l12" id="msg">
			
		</div>
		<!-- /.col l12 -->		
	</div>
	<div class="row">
		<div class="col l6">
			<div class="panel panel-primary">
			  <div class="panel-heading">
				<h3 class="panel-title">বিস্তৃত বিৱৰণ</h3>
			  </div>
			  
			  <div class="panel-body">
				<form role="form" id="detailsFrm">
					<div class="card">
					<div class="card-content">
					<div class="input-field">
						<label for="fileNo">নং.</label>
						<input type="text" class="form-control" id="fileNo" name="fileNo" value="{{{ isset($app) ? $app->fileNo : '' }}}">
					</div>
					
					
					
					<div class="input-field">
						<!--<label for="appDate">তাৰিখ</label>
						<input type="text" data-provide="datepicker-inline" data-date-format="yyyy-mm-dd" readonly="readonly" class="form-control" id="fileDate" name="fileDate" value="{{{ isset($app) ? $app->fileDate : '' }}}">-->
						<input type="date" class="datepicker" id="fileDate" name="fileDate"></input>
					</div>
					</div>
					</div>
					<div class="panel-group">
						<div class="card red darken-1">
							<div class="card-content">
								<span class="card-title">
									
										বিক্ৰেতাৰ বিৱৰণ
									
								</span>
							
							<!--<div id="collapseOne" class="panel-collapse collapse">
								<div class="panel-body">
									<div class="input-field">
										<label for="fileNo"> নাম</label>
										<input type="text" class="form-control" id="sellerName" name="sellerName" placeholder="Seller's Name" value="{{{ isset($app) ? $app->sellerName : '' }}}">
									</div>
									<div class="input-field">
										<label for="fileNo">পিতাৰ / স্বামীৰ নাম</label>
										<input type="text" class="form-control" id="sellerFName" name="sellerFName" placeholder="Seller's Father's Name" value="{{{ isset($app) ? $app->sellerFName : '' }}}">
									</div>
									<div class="input-field">
										<label for="fileNo">গাওঁৰ / কিচামৰ নাম</label>
										<input type="text" class="form-control" id="sellerVill" name="sellerVill" placeholder="Seller's Village" value="{{{ isset($app) ? $app->sellerVill : '' }}}">
									</div>
									<div class="input-field">
										<label for="fileNo">মৌজা</label>
										<input type="text" class="form-control" id="sellerMouza" name="sellerMouza" placeholder="Seller's Mouza" value="{{{ isset($app) ? $app->sellerMouza : '' }}}">
									</div>
								</div>
							</div>-->
							<div class="row">
								<div class="col s12">
									
										
											<div class="collection" id="slrList">
												
											</div>
											<a class="btn-floating btn-large waves-effect waves-light green" id="addSeller"><i class="mdi-content-add"></i></a>
											
									
								</div>
									
							</div>
							</div>
						</div>
						
						<div class="card blue darken-1">
							<div class="card-content">
								<h3 class="card-title">
									
										ক্ৰেতাৰ বিৱৰণ
									
								</h3>
							
							<!--<div id="collapseTwo" class="panel-collapse collapse">
								<div class="panel-body">
									<div class="input-field">
										<label for="fileNo"> নাম</label>
										<input type="text" class="form-control" id="buyerName" name="buyerName" placeholder="Buyer's Name" value="{{{ isset($app) ? $app->buyerName : '' }}}">
									</div>
									<div class="input-field">
										<label for="fileNo">পিতাৰ / স্বামীৰ নাম</label>
										<input type="text" class="form-control" id="buyerFName" name="buyerFName" placeholder="Buyer's Father's Name" value="{{{ isset($app) ? $app->buyerFName : '' }}}">
									</div>
									<div class="input-field">
										<label for="buyerVill">গাওঁৰ / কিচামৰ নাম</label>
										<input type="text" class="form-control" id="buyerVill" name="buyerVill" placeholder="Buyer's Village" value="{{{ isset($app) ? $app->buyerVill : '' }}}">
									</div>
									<div class="input-field">
										<label for="buyerMouza">মৌজা</label>
										<input type="text" class="form-control" id="buyerMouza" name="buyerMouza" placeholder="Buyer's Mouza" value="{{{ isset($app) ? $app->buyerMouza : '' }}}">
									</div>
									
										<label for="celing">খৰিদ্দাবে মাটি কিনাৰ পিছত চিলিং গচৰত পৰিব ?</label>
										<div class="switch">
											<label>
											  No
											  <input type="checkbox" id="celing">
											  <span class="lever"></span>
											  Yes
											</label>
										  </div>
									
									
										
								</div>
							</div>-->
							<div class="row">
								<div class="col s12">
									
										
											<div class="collection" id="byrList">
												
											</div>
											<a class="btn-floating btn-large waves-effect waves-light red" id="addBuyer"><i class="mdi-content-add"></i></a>
											
									
								</div>
									
							</div>
							</div>
						</div>
						
						<div class="card purple darken-1">
							<div class="card-content white-text">
								<h3 class="card-title">
									
										বিক্ৰী কৰিব বিচৰা মাটিৰ বিৱৰণ
									
								</h3>
							
							
								
								
									
										<label >মৌজা</label>
										<select id="landMouza" name="landMouza">
											<option value="" disabled selected>Select Mouza</option>
											<option value="1">Option 1</option>
											<option value="2">Option 2</option>
											<option value="3">Option 3</option>
										</select>
										
									
									
										<label>গাওঁৰ / কিচাম</label>
										<select id="landVill" name="landVill" >
											<option value="" disabled selected>Select Village</option>
											<option value="1">Option 1</option>
											<option value="2">Option 2</option>
											<option value="3">Option 3</option>
										</select>
										
									
									
									<div class="input-field" id="divLandPatta">
										<label class="control-label" for="landPatta">পাট্টা নং</label>
										<input type="number" class="form-control" id="landPatta" name="landPatta" value="{{{ isset($app) ? $app->landPatta : '' }}}">
									</div>
									<div class="input-field" id="divLandDag">
										<label class="control-label" for="landDag">দাগ নং</label>
										<input type="number" class="form-control" id="landDag" name="landDag" value="{{{ isset($app) ? $app->landDag : '' }}}">
									</div>
									<div class="input-field">
										<label class="control-label">চিঠামতে দাগৰ কালি</label>
										<div class="row">
																		
												<div class="col l4"><input type="number" class="form-control" id="chithaB" name="chithaB"  value="{{{ isset($app) ? $app->chithaB : '' }}}"></input></div>
											
												<div class="col l4"><input type="number" class="form-control" id="chithaK" name="chithaK" min="0" max="4" value="{{{ isset($app) ? $app->chithaK : '' }}}"/></div>
											
												<div class="col l4"><input type="number" class="form-control" id="chithaL" name="chithaL" min="0" max="19.99" value="{{{ isset($app) ? $app->chithaL : '' }}}"/></div>
										</div>
									</div>
									<div class="input-field">
										<label class="control-label">নিজৰ অংশৰ পৰিমান</label>
										<div class="row">
																		
												<div class="col l4"><input type="number" class="form-control" id="ownedB" name="ownedB"  value="{{{ isset($app) ? $app->ownedB : '' }}}" /></div>
											
												<div class="col l4"><input type="number" class="form-control" id="ownedK" name="ownedK"  min="0" max="4" value="{{{ isset($app) ? $app->ownedK : '' }}}"/></div>
											
												<div class="col l4"><input type="number" class="form-control" id="ownedL" name="ownedL"  min="0" max="19.99" value="{{{ isset($app) ? $app->ownedL : '' }}}"/></div>
										</div>
									</div>
									<div class="input-field">
										<label class="control-label">বিক্ৰীত মাটিৰ অংশ</label>
										<div class="row">
																		
												<div class="col l4"><input type="number" class="form-control" id="soldB" name="soldB"  value="{{{ isset($app) ? $app->soldB : '' }}}" /></div>
											
												<div class="col l4"><input type="number" class="form-control" id="soldK" name="soldK" min="0" max="4" value="{{{ isset($app) ? $app->soldK : '' }}}"/></div>
											
												<div class="col l4"><input type="number" class="form-control" id="soldL" name="soldL" min="0" max="19.99" value="{{{ isset($app) ? $app->soldL : '' }}}"/></div>
											
										</div>
									</div>
									<div class="input-field">
										<label class="control-label" for="fileNo">কোন চনত ম্যাদী ভূক্ত হৈছে</label>
										<input type="text" class="form-control" id="pattajariYear" name="pattajariYear"  value="{{{ isset($app) ? $app->pattajariYear : '' }}}">
									</div>
									<label for="riot">বিক্ৰী মাটি ৰায়ত ভূক্ত মাটি হলে অসম  চৰকাৰৰ নং R.S.S 125/2000/1 তাং ০৮-০৩-২০০০ চিঠামতে মনতৱ্য দিব?</label>
										<div class="switch">
											<label>
											  No
											  <input type="checkbox" id="riot">
											  <span class="lever"></span>
											  Yes
											</label>
										  </div>
									
									
										<label for="mortgage">ঋণ আদিৰ বাবে মাটি বন্ধকী মাটি নেকি?</label>
										<div class="switch">
											<label>
											  No
											  <input type="checkbox" id="mortgage">
											  <span class="lever"></span>
											  Yes
											</label>
										  </div>
									
									
										<label for="block">জন-জাতি বেষ্টনী / ব্লকৰ অন্তৰ্ভক্ত মাটি নেকি?</label>
										<div class="switch">
											<label>
											  No
											  <input type="checkbox" id="block">
											  <span class="lever"></span>
											  Yes
											</label>
										  </div>
									
									<div class="input-field">
										<label for="purpose">কি উদ্দেশে মাটি কৰিদ কাৰাৰ পিছত বৱহাৰ কৰিব?</label>
										<input type="text" class="form-control" id="purpose" name="purpose" value="{{{ isset($app) ? $app->buyerVill : '' }}}">
									</div>
									<div class="input-field">
										<label for="landValue">মাটিৰ প্ৰতি বিঘাৰ মূল</label>
										<input type="text" class="form-control" id="landValue" name="landValue" value="{{{ isset($app) ? $app->buyerVill : '' }}}">
									</div>
								
							</div>
						</div>
						
						<div class="card light-green darken-4">
							<div class="card-content">
								<h3 class="card-title">
									
										বিক্ৰীৰ পিচত পট্টাদাৰৰ নিজৰ নামত একে বা আন পট্টাত থকা  মাটিৰ বিৱৰণ
									
								</h3>
							
							
								  <div class="panel-body">
									<div class="input-field">
										<label for="fileNo">গাওঁৰ / কিচাম</label>
										<input type="text" class="form-control" id="remainingVill" name="remainingVill" placeholder="Village" value="{{{ isset($app) ? $app->remainingVill : '' }}}">
									</div>
									<div class="input-field">
										<label for="fileNo">মৌজা</label>
										<input type="text" class="form-control" id="remainingMouza" name="remainingMouza" placeholder="Mouza" value="{{{ isset($app) ? $app->remainingMouza : '' }}}">
									</div>
									<div class="input-field">
										<label for="patta">পাট্টা নং</label>
										<input type="number" class="form-control" id="remainingPatta" name="remainingPatta" placeholder="Patta No." value="{{{ isset($app) ? $app->remainingPatta : '' }}}">
									</div>
									<div class="input-field">
										<label for="patta">দাগ নং</label>
										<input type="number" class="form-control" id="remainingDag" name="remainingDag" placeholder="Dag No." value="{{{ isset($app) ? $app->remainingDag : '' }}}">
									</div>
									<div class="input-field">	
										<label class="control-label">মাটিৰ পৰিমান</label>
										<div class="row">
																	
												<div class="col l4"><input type="number" class="form-control" id="remainingB" name="remainingB" placeholder="bigha" value="{{{ isset($app) ? $app->remainingB : '' }}}"/></div>
											
												<div class="col l4"><input type="number" class="form-control" id="remainingK" name="remainingK" placeholder="katha" min="0" max="4" value="{{{ isset($app) ? $app->remainingK : '' }}}"/></div>
											
												<div class="col l4"><input type="number" class="form-control" id="remainingL" name="remainingL" placeholder="lecha" min="0" max="19.99" value="{{{ isset($app) ? $app->remainingL : '' }}}"/></div>
										</div>
									</div>
									
								</div>
							
							</div>
						</div>
					</div>
					<input class="btn btn-danger btn-block" type="button" value="SAVE" id="saveDetails"></submit>
				</form>
			  </div>
			</div>
		</div>
		<div class="col l6">
			<div class="panel panel-primary" style="opacity:1;" id="filesPanel">
			  <div class="panel-heading">
				<h3 class="panel-title">সংলগ্ন নথি</h3>
			  </div>
			  
			  <div class="panel-body">
				<form role="form"  method="POST"  enctype="multipart/form-data" id="frmFiles">
				<label> আবেদন পত্ৰ</label>
				<div class="row">				
				  <div class="col l12">	
					
						<div class="input-group">												  
						  <input id="apln" name="apln" type="file" class="file">
						</div><!-- /input-group -->
					
				  </div><!-- /.col l6 -->
				</div><!-- /.row -->
				<label> জমাবন্দী কপি</label>
				<div class="row">
				  <div class="col l12">
					
					
						<div class="input-group">												  
						  <input id="jamabandi" name="jamabandi" type="file" class="file">
						</div><!-- /input-group -->
					
				  </div><!-- /.col l6 -->
				</div><!-- /.row -->
				<label> প্ৰস্তাৱিত মাটিৰ পঞ্জীয়ন কাৰ্য্যালয়ৰ দায়মুক্ত প্ৰমান পত্ৰ</label>
				<div class="row">
				  <div class="col l12">
					
					
						<div class="input-group">												  
						  <input id="noc" name="noc" type="file" class="file">
						</div><!-- /input-group -->
					
				  </div><!-- /.col l6 -->
				</div><!-- /.row -->
				<label>চলিত বছৰৰ ৰাজহ আদায়ৰ প্ৰমান পত্ৰ</label>
				<div class="row">
				  <div class="col l12">
					
					
							
					  
					  
						<div class="input-group">												  
						  <input id="taxRecipt" name="taxRecipt" type="file" class="file">
						</div><!-- /input-group -->
					
				  </div><!-- /.col l6 -->
				</div><!-- /.row -->
				<label> এজমালি পট্টাৰ মাটি হলে সহপট্টাদাৰৰ সম্মতি পত্ৰ</label>
				<div class="row">
				  <div class="col l12">
					
					
							
					  
					  
						<div class="input-group">												  
						  <input id="coPattdar" name="coPattdar" type="file" class="file">
						</div><!-- /input-group -->
					
				  </div><!-- /.col l6 -->
				</div><!-- /.row -->
				<label> ভোটাৰ তালিকা</label>
				<div class="row">
				  <div class="col l12">
					
					
						<div class="input-group">												  
						  <input id="voterList" name="voterList" type="file" class="file">
						</div><!-- /input-group -->
					
				  </div><!-- /.col l6 -->
				</div><!-- /.row -->
				<br/>
				<div class="row">
					<div class="col l12">
						<input type="submit" class="btn btn-primary btn-block" value="submit" id="btnFile" ></input>
					</div>
				</div>
				</form>
			  </div>
			</div>
		</div>
	</div>
	<div class="row">
        <div class="col s12 m7">
          <div class="card">
            <div class="card-image">
              <img src="">
              <span class="card-title">Card Title</span>
            </div>
            
            <div class="card-action">
              <a class="btn-floating btn-large waves-effect waves-light red" id="addImage"><i class="mdi-image-camera-alt"></i>Capture Image</a>
              
            </div>
          </div>
        </div>
      </div>
	<!-- file upload -->
	<!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <div class="input-field">
			<label for="fileNo"> নাম</label>
			<input type="text" class="form-control" id="sellerName" name="sellerName" value="{{{ isset($app) ? $app->sellerName : '' }}}">
		</div>
		<div class="input-field">
			<label for="fileNo">পিতাৰ / স্বামীৰ নাম</label>
			<input type="text" class="form-control" id="sellerFName" name="sellerFName" value="{{{ isset($app) ? $app->sellerFName : '' }}}">
		</div>
		<div class="input-field">
			<label for="fileNo">গাওঁৰ / কিচামৰ নাম</label>
			<input type="text" class="form-control" id="sellerVill" name="sellerVill" value="{{{ isset($app) ? $app->sellerVill : '' }}}">
		</div>
		<div class="input-field">
			<label for="fileNo">মৌজা</label>
			<input type="text" class="form-control" id="sellerMouza" name="sellerMouza"  value="{{{ isset($app) ? $app->sellerMouza : '' }}}">
		</div>
	  
    </div>
    <div class="modal-footer">
	  <a href="#" class="waves-effect waves-red modal-action modal-close btn-flat" >Close</a>
      <a href="#" class="waves-effect waves-green modal-action btn-flat" id="saveSeller">Add</a>
	  
    </div>
  </div>
  
  <div id="modal2" class="modal">
    <div class="modal-content">
      <div class="input-field">
										<label for="fileNo"> নাম</label>
										<input type="text" class="form-control" id="buyerName" name="buyerName" placeholder="Buyer's Name" value="{{{ isset($app) ? $app->buyerName : '' }}}">
									</div>
									<div class="input-field">
										<label for="fileNo">পিতাৰ / স্বামীৰ নাম</label>
										<input type="text" class="form-control" id="buyerFName" name="buyerFName" placeholder="Buyer's Father's Name" value="{{{ isset($app) ? $app->buyerFName : '' }}}">
									</div>
									<div class="input-field">
										<label for="buyerVill">গাওঁৰ / কিচামৰ নাম</label>
										<input type="text" class="form-control" id="buyerVill" name="buyerVill" placeholder="Buyer's Village" value="{{{ isset($app) ? $app->buyerVill : '' }}}">
									</div>
									<div class="input-field">
										<label for="buyerMouza">মৌজা</label>
										<input type="text" class="form-control" id="buyerMouza" name="buyerMouza" placeholder="Buyer's Mouza" value="{{{ isset($app) ? $app->buyerMouza : '' }}}">
									</div>
									
										<label for="celing">খৰিদ্দাবে মাটি কিনাৰ পিছত চিলিং গচৰত পৰিব ?</label>
										<div class="switch">
											<label>
											  No
											  <input type="checkbox" id="celing">
											  <span class="lever red"></span>
											  Yes
											</label>
										  </div>
	  
    </div>
    <div class="modal-footer">
	  <a href="#" class="waves-effect waves-red modal-action modal-close btn-flat" >Close</a>
      <a href="#" class="waves-effect waves-green modal-action btn-flat" id="saveBuyer">Add</a>
	  
    </div>
  </div>
  
  <div id="modal3" class="modal">
    <div class="modal-content">
		<!--<input type="file" accept="image/*;capture=camera">-->
		
		<video  autoplay ></video>
		
		<canvas style="display:none;"></canvas>
    </div>
    <div class="modal-footer">
	  <a href="#" class="waves-effect waves-red modal-action modal-close btn-flat" >Close</a>
      <a href="#" class="waves-effect waves-green modal-action btn-flat modal-close" onclick="snapshot()">Take Shot</a>
	  
    </div>
  </div>
	
@stop
@section('script')
<script src="/js/fileinput.min.js" 	  type="text/javascript"></script>
<script src="/js/bootstrap-datepicker.js" type="text/javascript"></script>
<script>
	$("#apln").fileinput({'showUpload':false, 'allowedFileExtensions':['pdf']});
	$("#jamabandi").fileinput({'showUpload':false, 'allowedFileExtensions':['pdf']});
	$("#noc").fileinput({'showUpload':false, 'allowedFileExtensions':['pdf']});
	$("#coPattdar").fileinput({'showUpload':false, 'allowedFileExtensions':['pdf']});
	$("#taxRecipt").fileinput({'showUpload':false, 'allowedFileExtensions':['pdf']});
	$("#voterList").fileinput({'showUpload':false, 'allowedFileExtensions':['pdf']});
	var video = document.querySelector('video');
    var canvas = document.querySelector('canvas');
    var img = document.querySelector('img');
    var ctx = canvas.getContext('2d');
    var localMediaStream = null;
	navigator.getUserMedia = ( 	navigator.getUserMedia ||
								navigator.webkitGetUserMedia ||
								navigator.mozGetUserMedia ||
								navigator.msGetUserMedia);
  
  function sizeCanvas() {
  // video.onloadedmetadata not firing in Chrome so we have to hack.
  // See crbug.com/110938.
  setTimeout(function() {
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    img.height = video.videoHeight;
    img.width = video.videoWidth;
	
	alert(video.videoHeight+" by "+video.videoWidth);
  }, 100);
}

  function snapshot() {
    if (localMediaStream) {
      ctx.drawImage(video, 0, 0);
      // "image/webp" works in Chrome.
      // Other browsers will fall back to image/png.
	  //alert("in snapshot");
      document.querySelector('img').src = canvas.toDataURL('image/png');
    }
  }
	var vgaConstraints = {
  video: {
    mandatory: {
      minWidth: 800,
      minHeight: 480
    }
  }
};
  video.addEventListener('click', snapshot, false);

  // Not showing vendor prefixes or code that works cross-browser.
  navigator.getUserMedia({video:true}, function(stream) {
    video.src = window.URL.createObjectURL(stream);
    localMediaStream = stream;
	sizeCanvas();
  }, // errorCallback
      function(err) {
         console.log("The following error occured: " + err);
      });
	$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year
	format: 'yyyy-mm-dd'
  });
	$(document).ready(function(){
		$("#addSeller").click(function(){
			$('#modal1').openModal();
		});
		$("#addBuyer").click(function(){
			$('#modal2').openModal();
		});
		$("#addImage").click(function(){
			$('#modal3').openModal();
		});
		var sellerList = new Array();
		var sellerCount=0;
		var buyerList = new Array();
		var buyerCount=0;
		$("#saveSeller").click(function(){
			//alert("<li class=\"collection-item\"><span class=\"title\">"+$("#sellerName").val()+"</span><p>Father's Name: "+$("#sellerFName").val()+"<br/>Mouza: "+$("#sellerMouza").val()+"<br/>Village: "+$("#sellerVill").val()+"</p></li>");
			if($("#sellerName").val()==null || $("#sellerName").val().trim() =="")
			{
				alert("Please enter the values.");
				return;
			}
			$('#slrList').append("<li class=\"collection-item\" name=\"seller"+sellerCount+"\"><span class=\"title\">"+$("#sellerName").val()+"</span><p>Father's Name: "+$("#sellerFName").val()+"<br/>Mouza: "+$("#sellerMouza").val()+"<br/>Village: "+$("#sellerVill").val()+"</p></li>");
			sellerList[sellerCount] = {name:$("#sellerName").val(),fname:$("#sellerFName").val(),mouza:$("#sellerMouza").val(),village:$("#sellerVill").val()};
			sellerCount++;
			$("#sellerName").val("");
			$("#sellerFName").val("");
			$("#sellerMouza").val("");
			$("#sellerVill").val("");
			alert(sellerCount);
		});
		$("#saveBuyer").click(function(){
			//alert("<li class=\"collection-item\"><span class=\"title\">"+$("#sellerName").val()+"</span><p>Father's Name: "+$("#sellerFName").val()+"<br/>Mouza: "+$("#sellerMouza").val()+"<br/>Village: "+$("#sellerVill").val()+"</p></li>");
			if($("#buyerName").val()==null || $("#buyerName").val().trim() =="")
			{
				alert("Please enter the values.");
				return;
			}
			$('#byrList').append("<li class=\"collection-item\" name=\"seller"+sellerCount+"\"><span class=\"title\">"+$("#buyerName").val()+"</span><p>Father's Name: "+$("#buyerFName").val()+"<br/>Mouza: "+$("#buyerMouza").val()+"<br/>Village: "+$("#buyerVill").val()+"</p></li>");
			buyerList[sellerCount] = {name:$("#buyerName").val(),fname:$("#buyerFName").val(),mouza:$("#buyerMouza").val(),village:$("#buyerVill").val()};
			buyerCount++;
			$("#buyerName").val("");
			$("#buyerFName").val("");
			$("#buyerMouza").val("");
			$("#buyerVill").val("");
			alert(buyerCount);
		});
		var appId=-1;
		var mouzas,villages;
		$.getJSON( "/api/v1/circle/"+{{{ $circle }}}+"/mouzas", function( data ) {
			var html="<option value='-1'>Select Mouza</option>";
			for(var i = 0 ; i<data.mouzas.length;i++)
			{
				//alert(data.mouzas[i].id);
				html = html+"<option value='"+data.mouzas[i].id+"'>"+data.mouzas[i].name+"</option>";
			}
			$("#landMouza").html(html);
		});
		$.getJSON( "/api/v1/application/"+{{{ $circle }}}+"/incomplete/count", function( data ) {
			
			$("#inclpt").html(data.count);
		});
		$("select#landMouza").change(function(){
			$.getJSON( "/api/v1/mouza/"+$(this).val()+"/villages", function( data ) {
				var html="<option value='-1'>Select Village</option>";
				for(var i = 0 ; i<data.villages.length;i++)
				{
					html = html+"<option value='"+data.villages[i].id+"'>"+data.villages[i].name+"</option>";
				}
				$("#landVill").html(html);
			});
		});
		$("#detailsFrm")[0].reset();
		$("#frmFiles")[0].reset();
		
		$("#landPatta").focusout(function(){
			var lp = $("#landPatta").val();
			//$("#landPatta").val("123456");
			
			if(lp=="" || $.isNumeric(lp)==false){	
				
				$(this).parent().attr('class','input-field has-error');	
				$("#landPatta").focus();
			}
			else{	
				
				$(this).parent().attr('class','input-field has-success');				
			}
		});
		$("#landDag").focusout(function(){
			var lp = $(this).val();
			//$("#landPatta").val("123456");
			
			if(lp=="" || $.isNumeric(lp)==false){	
				
				$(this).parent().attr('class','input-field has-error');				
			}
			else{	
				
				$(this).parent().attr('class','input-field has-success');				
			}
		});
		var chithaTotal = 0;
		var ownedTotal = 0;
		var soldTotal = 0;
		$("#chithaB").focusout(function(){
			var lp = $(this).val().replace(/^\s\s*/, '').replace(/\s\s*$/, '');
			var intRegex = /^\d+$/;
			//$("#landPatta").val("123456");
			
			if(lp=="" || intRegex.test(lp)==false || lp<0){	
				
				$(this).parent().attr('class','col l4 has-error');				
			}
			else{	
				
				$(this).parent().attr('class','col l4 has-success');
				chithaTotal = chithaTotal+parseInt(lp);
				
			}
		});
		$("#chithaK").focusout(function(){
			var lp = $(this).val().replace(/^\s\s*/, '').replace(/\s\s*$/, '');
			var intRegex = /^\d+$/;
			//$("#landPatta").val("123456");
			
			if(lp=="" || intRegex.test(lp)==false || lp>=5 || lp<0){	
				
				$(this).parent().attr('class','col l4 has-error');				
			}
			else{	
				
				$(this).parent().attr('class','col l4 has-success');	
				chithaTotal = chithaTotal + (parseInt(lp)/5);
				
			}
		});
		$("#chithaL").focusout(function(){
			var lp = $(this).val().replace(/^\s\s*/, '').replace(/\s\s*$/, '');
						
			if(lp=="" || $.isNumeric(lp)==false || lp>=20 || lp<0){	
				
				$(this).parent().attr('class','col l4 has-error');				
			}
			else{	
				
				$(this).parent().attr('class','col l4 has-success');
				chithaTotal = chithaTotal+(parseInt(lp)/20);
				alert(chithaTotal);
			}
		});
		
		$("#ownedB").focusout(function(){
			var lp = $(this).val().replace(/^\s\s*/, '').replace(/\s\s*$/, '');
			var intRegex = /^\d+$/;
			//$("#landPatta").val("123456");
			
			if(lp=="" || intRegex.test(lp)==false || lp<0){	
				
				$(this).parent().attr('class','col l4 has-error');				
			}
			else{	
				
				$(this).parent().attr('class','col l4 has-success');		
				ownedTotal = ownedTotal+parseInt(lp);
			}
		});
		$("#ownedK").focusout(function(){
			var lp = $(this).val().replace(/^\s\s*/, '').replace(/\s\s*$/, '');
			var intRegex = /^\d+$/;
			//$("#landPatta").val("123456");
			
			if(lp=="" || intRegex.test(lp)==false || lp>=5 || lp<0){	
				
				$(this).parent().attr('class','col l4 has-error');				
			}
			else{	
				
				$(this).parent().attr('class','col l4 has-success');	
				ownedTotal = (ownedTotal+parseInt(lp)/5);
			}
		});
		$("#ownedL").focusout(function(){
			var lp = $(this).val().replace(/^\s\s*/, '').replace(/\s\s*$/, '');
						
			if(lp=="" || $.isNumeric(lp)==false || lp>=20 || lp<0){	
				
				$(this).parent().attr('class','col l4 has-error');				
			}
			else{	
				
				$(this).parent().attr('class','col l4 has-success');		
				ownedTotal = ownedTotal+(parseInt(lp)/20);
				alert(ownedTotal);
				if(ownedTotal>chithaTotal)
					$(this).parent().parent().parent().attr('class','input-field has-error');
				else
					$(this).parent().parent().parent().attr('class','input-field has-success');
			}
		});
		
		$("#soldB").focusout(function(){
			var lp = $(this).val().replace(/^\s\s*/, '').replace(/\s\s*$/, '');
			var intRegex = /^\d+$/;
			//$("#landPatta").val("123456");
			
			if(lp=="" || intRegex.test(lp)==false || lp<0){	
				
				$(this).parent().attr('class','col l4 has-error');				
			}
			else{	
				
				$(this).parent().attr('class','col l4 has-success');		
				soldTotal = soldTotal+parseInt(lp);
			}
		});
		$("#soldK").focusout(function(){
			var lp = $(this).val().replace(/^\s\s*/, '').replace(/\s\s*$/, '');
			var intRegex = /^\d+$/;
			//$("#landPatta").val("123456");
			
			if(lp=="" || intRegex.test(lp)==false || lp>=5 || lp<0){	
				
				$(this).parent().attr('class','col l4 has-error');				
			}
			else{	
				
				$(this).parent().attr('class','col l4 has-success');	
				soldTotal = (soldTotal+parseInt(lp)/5);
			}
		});
		$("#soldL").focusout(function(){
			var lp = $(this).val().replace(/^\s\s*/, '').replace(/\s\s*$/, '');
						
			if(lp=="" || $.isNumeric(lp)==false || lp>=20 || lp<0){	
				
				$(this).parent().attr('class','col l4 has-error');				
			}
			else{	
				
				$(this).parent().attr('class','col l4 has-success');		
				soldTotal = soldTotal+(parseInt(lp)/20);
				alert(soldTotal);
				if(soldTotal>chithaTotal || soldTotal>ownedTotal)
					$(this).parent().parent().parent().attr('class','input-field has-error');
				else
					$(this).parent().parent().parent().attr('class','input-field has-success');
			}
		});
		$("#pattajariYear").focusout(function(){
			var lp = $(this).val();
			//$("#landPatta").val("123456");
			
			if(lp=="" || $.isNumeric(lp)==false ||lp<1500 ||lp>2500){	
				
				$(this).parent().attr('class','input-field has-error');				
			}
			else{	
				
				$(this).parent().attr('class','input-field has-success');				
			}
		});
		
		$("#remainingPatta").focusout(function(){
			var lp = $(this).val();
			//$("#landPatta").val("123456");
			
			if(lp=="" || $.isNumeric(lp)==false){	
				
				$(this).parent().attr('class','input-field has-error');				
			}
			else{	
				
				$(this).parent().attr('class','input-field has-success');				
			}
		});
		$("#remainingDag").focusout(function(){
			var lp = $(this).val();
			//$("#landPatta").val("123456");
			
			if(lp=="" || $.isNumeric(lp)==false){	
				
				$(this).parent().attr('class','input-field has-error');				
			}
			else{	
				
				$(this).parent().attr('class','input-field has-success');				
			}
		});
		$("#remainingB").focusout(function(){
			var lp = $(this).val().replace(/^\s\s*/, '').replace(/\s\s*$/, '');
			var intRegex = /^\d+$/;
			//$("#landPatta").val("123456");
			
			if(lp=="" || intRegex.test(lp)==false || lp<0){	
				
				$(this).parent().attr('class','col l4 has-error');				
			}
			else{	
				
				$(this).parent().attr('class','col l4 has-success');
				
				
			}
		});
		$("#remainingK").focusout(function(){
			var lp = $(this).val().replace(/^\s\s*/, '').replace(/\s\s*$/, '');
			var intRegex = /^\d+$/;
			//$("#landPatta").val("123456");
			
			if(lp=="" || intRegex.test(lp)==false || lp>=5 || lp<0){	
				
				$(this).parent().attr('class','col l4 has-error');				
			}
			else{	
				
				$(this).parent().attr('class','col l4 has-success');	
				
				
			}
		});
		$("#remainingL").focusout(function(){
			var lp = $(this).val().replace(/^\s\s*/, '').replace(/\s\s*$/, '');
						
			if(lp=="" || $.isNumeric(lp)==false || lp>=20 || lp<0){	
				
				$(this).parent().attr('class','col l4 has-error');				
			}
			else{	
				
				$(this).parent().attr('class','col l4 has-success');
				
			}
		});
		var uploadPath="";
		//$("frmFiles").attr('action','api/v1/file/11');
		$("#saveDetails").click(function(){
			alert("btn clicked");
			var url = "{{{ isset($app) ? '/api/v1/application/'.$app->id : '/api/v1/application' }}}";
			alert(url);
			$.post( url,$( "#detailsFrm" ).serialize(), function( data ) {
						  appId=data.application;
						  $("#msg").html("<div class='alert alert-success' role='alert'>Details Saved for File No. "+$("#fileNo").val()+" </div>");		
						  $("#frmFiles").attr('action','/api/v1/file/'+appId);
						  $("#filesPanel").fadeTo('slow',1);
						},
			   'json'
			);
			
		});
		
	});
</script>
@stop
