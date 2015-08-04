

@extends('layout')
@section('style') 

@stop
@section('sidebar')   
	
@stop

@section('content')
	<div class="row">
		
			<div class="col s12 m6">
			  <div class="card green lighten-1">
				<div class="card-content white-text">
				  File: {{{$app->fileNo}}}
				</div>
				
			  </div>
			</div>
			
			<div class="col s12 m6">
			  <div class="card green lighten-1">
				<div class="card-content white-text">
				  Date: {{{$app->fileDate}}}
				</div>
				
			  </div>
			</div>
		
			
		
		
	</div>
	<div class="row">
			<div class="col s12 m6">
			  <div class="card blue lighten-1">
				<div class="card-content white-text">
				  <div class="collection with-header blue-text darken-4" >
					<li class="collection-header"><h4>Sellers' Details</h4></li>
					@foreach($app->sellers as $seller) 
						<li class="collection-item">Name:{{{$seller->name}}}<br/>
						Father's Name:{{{$seller->fname}}}<br/>
						Mouza:{{{$seller->mouza->name}}}<br/>
						Village:{{{$seller->village->name}}}<br/>
						Phone:{{{$seller->phone_no}}}</li>
					@endforeach
				  </div>
				</div>
				
			  </div>
			</div>
			
			<div class="col s12 m6">
			  <div class="card blue lighten-1">
				<div class="card-content white-text">
				  <div class="collection with-header blue-text darken-4" >
					<li class="collection-header"><h4>Buyers' Details</h4></li>
					@foreach($app->buyers as $buyer) 
						<li class="collection-item">Name:{{{$buyer->name}}}<br/>
						Father's Name:{{{$buyer->fname}}}<br/>
						Phone:{{{$buyer->phone_no}}}<br/>
						PAN:{{{$buyer->pan}}}<br/>
						Aadhaar:{{{$buyer->uid}}}<br/>
						Mouza:{{{$buyer->mouza}}}<br/>
						Village:{{{$buyer->village}}}</li>
					@endforeach
				  </div>
				</div>
				
			  </div>
			</div>
			
	
			
	</div>
	<div class="row">
	
		<div class="col s12 m6">
			  <div class="card red lighten-3">
				<div class="card-content white-text">
				  <div class="collection with-header red-text darken-4" >
					
					<li class="collection-header"><h4>Details of land to be sold</h4></li>
					
					<li class="collection-item">
					Circle:{{{$app->circle->name}}}<br/>
					Mouza:{{{$app->mouza->name}}}<br/>
					Village:{{{$app->village->name}}}<br/>
					Patta No.:{{{$app->landPatta}}}<br/>
					Dag No.:{{{$app->landDag}}}<br/>
					Chitha:{{{$app->chithaB}}}B {{{$app->chithaK}}}K {{{$app->chithaL}}}L<br/>
					Owned:{{{$app->ownedB}}}B {{{$app->ownedK}}}K {{{$app->ownedL}}}L<br/>
					Selling :{{{$app->soldB}}}B {{{$app->soldK}}}K {{{$app->soldL}}}L<br/>
					Pattajari Year :{{{$app->pattajariYear}}}</li>
					
				  </div>
				</div>
				
			  </div>
		</div>
			
		
		
		<div class="col s12 m6">
			  <div class="card blue lighten-1">
				<div class="card-content white-text">
				  <div class="collection with-header blue-text darken-4" >
					<li class="collection-header"><h4>Comments</h4></li>
					@foreach($app->comments as $comment) 
						<li class="collection-item">{{{$comment->txt}}}-{{{$comment->user->name}}}</li>
					@endforeach
				  </div>
				</div>
				
			  </div>
		</div>		
	</div>
	
	<div class="row">
		<div class="col s12 m12">
			  <div class="card blue lighten-1">
				<div class="card-content white-text">
				  <div class="collection with-header blue-text darken-4" >
					<li class="collection-header"><h4>Attached Files</h4></li>
					
					<li class="collection-item"><img src="/api/v1/file/get/{{{$app->id}}}/image.png" alt="Image" width="150" height="150"></li>
					@foreach($app->attachments as $attachment) 
						<li class="collection-item"><div class="row"><div class="col s12"><object data='/uploads/{{{$attachment->file_path}}}' width="900px" height="500px"></object></div></div><div class="row"><div class="col s6">{{{$attachment->file_cat}}}</div><div class="col s6"><a href='/api/v1/file/download/{{{$attachment->file_path}}}'><i class="mdi-file-file-download"></i></a></div></div></li>
					@endforeach
				  </div>
				  
				</div>
				
			  </div>
		</div>		
	</div>
	<div class="row">	
		<div class="col s12 m12">
			  <div class="card blue lighten-1">
				<div class="card-content white-text">
				  <div class="collection with-header blue-text darken-4" >
					<li class="collection-header"><h4>Actions</h4></li>
					@if(Auth::user()->role==3 && $app->status->first()->id==4)
					<li class="collection-item"><div class="row"><div class="col s6">Zonal Value:</div><div class="col s6">{{{$app->zonal_value}}}</div></div></li>
					<li class="collection-item"><div class="row"><div class="col s6">Value Set By LM:</div><div class="col s6">{{{$app->value_per_bigha}}}</div></div></li>
					<li class="collection-item"><div class="row"><div class="col s6">Value Set By CO:</div><div class="col s6">{{{$app->net_value_co}}}</div></div></li>
					<li class="collection-item"><div class="row"><div class="col s6">Value Set By ADC:</div><div class="col s6"><input id="value_adc" type="text" class="validate" value="{{{$app->net_value_co}}}"></div></div></li>
					<li class="collection-item"><div class="row"><div class="col s6">Comment By ADC:</div><div class="col s6"><textarea  id="comment_adc" type="text" class="validate"></textarea></div></div></li>
					<!--<li class="collection-item"><div class="row"><div class="col s6">Comment By Committee:</div><div class="col s6"><textarea id="comment_co" type="text" class="validate"></textarea></div></div></li>
					<li class="collection-item"><div class="row"><div class="col s6">Password of CO:</div><div class="col s6"><input id="passwd_co" type="password" class="validate"></div></div></li>-->
					<li class="collection-item"><div class="row"><div class="col s12 center-align teal accent-4 white-text waves-effect waves-light " id="btnApprove"><h4><i class="mdi-content-forward"></i>APPROVE</h4></div></div></li>
					<li class="collection-item"><div class="row"><div class="col s12 center-align red accent-2 white-text waves-effect waves-light " id = "btnReturn"><h4><i class="mdi-content-reply"></i>RETURN</h4></div></div></li>
					@elseif (Auth::user()->role==4 && ($app->status->first()->id==2 || $app->status->first()->id==5))
					<li class="collection-item"><div class="row"><div class="col s6">Zonal Value:</div><div class="col s6">{{{$app->zonal_value}}}</div></div></li>
					<li class="collection-item"><div class="row"><div class="col s6">Value Set By LM:</div><div class="col s6">{{{$app->value_per_bigha}}}</div></div></li>
					<li class="collection-item"><div class="row"><div class="col s6">Value Set By CO:</div><div class="col s6"><input id="value_co" type="text" class="validate"></div></div></li>
					<li class="collection-item"><div class="row"><div class="col s6">Comment By CO:</div><div class="col s6"><textarea  id="comment_co" type="text" class="validate"></textarea></div></div></li>
					<li class="collection-item"><div class="row"><div class="col s12 center-align teal accent-4 white-text waves-effect waves-light " id="btnApprove"><h4><i class="mdi-content-forward"></i>FORWARD TO ADC</h4></div></div></li>
					<li class="collection-item"><div class="row"><div class="col s12 center-align red accent-2 white-text waves-effect waves-light " id="btnReturn"><h4><i class="mdi-content-reply"></i>RETURN</h4></div></div></li>
					@elseif (Auth::user()->role==7 && $app->status->first()->id==7)
					<li class="collection-item"><div class="row"><div class="col s12 center-align teal accent-4 white-text waves-effect waves-light " id="gnic"><a href="/nic/{{{$app->id}}}" targer="_blank"><h4><i class="mdi-content-forward"></i>Generate Non Incumberence Certificate</h4></a></div></div></li>
					<form role="form"  method="POST"  enctype="multipart/form-data" id="frmFiles" action="/api/v1/file/{{{$app->id}}}">
					<li class="collection-item"><div class="row"><div class="col s6">From:</div><div class="col s6"><textarea  id="nic_from" name="nic_from" type="number" class="validate"></textarea></div></div></li>
					<li class="collection-item"><div class="row"><div class="col s6">To:</div><div class="col s6"><textarea  id="nic_to" name="nic_to" type="number" class="validate"></textarea></div></div></li>
					<li class="collection-item"><div class="file-field input-field">
					      <input class="file-path validate" type="text"/>
					      <div class="btn">
						<span>File</span>
						<input type="file" name="nic"/>
					      </div>
					    </div></li>
					<li class="collection-item"><div class="row"><input type="submit" class="col s12 center-align teal accent-4 black-text waves-effect waves-light " id="btnGrant" value="upload"><h4></h4></div></input></li>
					</form>		
					<li class="collection-item"><div class="row"><div class="col s6">Reason For Return:</div><div class="col s6"><textarea  id="comment_sro" type="text" class="validate"></textarea></div></div></li>			
					<li class="collection-item"><div class="row"><div class="col s12 center-align red accent-2 white-text waves-effect waves-light " id="btnReturn"><h4><i class="mdi-content-reply"></i>REFUSE</h4></div></div></li>					
					@elseif (Auth::user()->role==8 && $app->status->first()->id==9)
					<form role="form"  method="POST"  enctype="multipart/form-data" id="frmFiles1" action="/api/v1/file/{{{$app->id}}}">
					<li class="collection-item"><div class="file-field input-field">
					      <input class="file-path validate" type="text"/>
					      <div class="btn">
						<span>File</span>
						<input type="file" name="municipalNoc"/>
					      </div>
					    </div></li>
					<li class="collection-item"><div class="row"><input type="submit" class="col s12 center-align teal accent-4 black-text waves-effect waves-light " id="btnGrant1" value="upload"><h4></h4></div></input></li>
					</form>		
					<li class="collection-item"><div class="row"><div class="col s6">Reason For Return:</div><div class="col s6"><textarea  id="comment_ceo" type="text" class="validate"></textarea></div></div></li>			
					<li class="collection-item"><div class="row"><div class="col s12 center-align red accent-2 white-text waves-effect waves-light " id="btnReturn1"><h4><i class="mdi-content-reply"></i>REFUSE</h4></div></div></li>					
					@else
					<li class="collection-item"><div class="row"><div class="col s12 center-align "><h4><i class="mdi-action-highlight-remove red-text"></i>No Action Available</h4></div></div></li>
					@endif
				  </div>
				</div>
				
			  </div>
		</div>		
	
	</div>	
	
	
@stop
@section('script')
<script>
	
	@if(Auth::user()->role!=7)
	
		
		$("#btnApprove").click(function(){
			//alert("hi");
			@if(Auth::user()->role==3)
				var adcValue = $('#value_adc').val();
				var coValue = {{{$app->net_value_co}}};
				
				if(adcValue!=coValue)
				{
					//alert($('#passwd_co').val());
					if($('#comment_adc').val() == null ||$('#comment_adc').val().trim() == "")
						alert("Please give comments");
					else
					{
						//var param = {action:"approve",pwdCO:$("#passwd_co").val(),commentADC:$("#comment_adc").val(),commentCO:$("#comment_co").val(),committee:{{{Session::get('committee')}}},valueADC:adcValue};
						//alert($("passwd_co").val());					
						var param = {action:"approve",commentADC:$("#comment_adc").val(),valueADC:adcValue};
						$.post("/api/v1/application/{{{$app->id}}}/updateStatus",param,function (data){
							alert("status updated");
							//window.location.replace("/committee/{{{Session::get('committee')}}}");
							window.location.replace("/home");
						},'json');
					}
				}
				else
				{
					$.post("/api/v1/application/{{{$app->id}}}/updateStatus",{action:"approve",commentADC:$("#comment_adc").val(),valueADC:adcValue},function (data){
						alert("status updated");
						//window.location.replace("/committee/{{{Session::get('committee')}}}");
						window.location.replace("/home");
					},'json');
				}
			@elseif(Auth::user()->role==4)
			
				alert("Hello");
				$.post("/api/v1/application/{{{$app->id}}}/updateStatus",{action:"approve",commentCO:$("#comment_co").val(),valueCO:$("#value_co").val(),valueBigha:$("#value_per_bigha").val()},function (data){
					alert("status updated");
					window.location.replace("/home");
				},'json');	
			
			
			@endif
		});
		$("#btnReturn").click(function(){
			if($("#txtReturn").val() !="")
			{
				@if(Auth::user()->role==4)
					var param = {action:"return",commentCO:$("#comment_co").val()};
				@elseif(Auth::user()->role==3)
					var param = {action:"return",commentADC:$("#comment_adc").val()};
				@elseif(Auth::user()->role==7)
					var param = {action:"return",commentSRO:$("#comment_sro").val()};
				@elseif(Auth::user()->role==8)
					var param = {action:"return",commentCEO:$("#comment_ceo").val()};
				@endif
				$.post("/api/v1/application/{{{$app->id}}}/updateStatus",param,function (data){
					alert("status updated");
					if(data=="pass")
						window.location.replace("/{{{$app->id}}}/NOC");
					else
						window.location.replace("/home");
				});
			}
			else
			{
				alert ("Mention reason for rejection");
			}
		});
	@elseif(Auth::user()->role==7)
		$("#btnGrant").click(function(){
			//alert("hello");
			$("frmFiles").submit();
		});
	@elseif(Auth::user()->role==8)
		$("#btnGrant1").click(function(){
			//alert("hello");
			$("frmFiles1").submit();
		});	
	@endif
</script>
@stop
