

@extends('layout')
@section('style') 

@stop


@section('content')
<div class="row">
		
	<div class="col s5">
		<form  method="PUT"  action="/api/v1/application/{{{$app->id}}}/edit" id="editFrm">
		<div class="row">
			<div class="col s12">
				<div class="card green lighten-1">
					<div class="card-content white-text">
					  File: {{{$app->fileNo}}}
					</div>
				
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col s12">
				<div class="card blue lighten-1">
					<div class="card-content white-text">
					  Date: {{{$app->fileDate}}}
					</div>
				
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col s12">
				<div class="card green darken-1">
					<div class="card-content black-text">
					   	Zonal Value:
						<div class="input-field" >
							
							<input type="number" class="form-control" id="value_per_bigha" name="value_per_bigha" readonly="readonly" value="{{{ $app->zonal_value }}}">
						</div>
					</div>
					<div class="card-content black-text">
					   	Value set by Lot Mondal:
						<div class="input-field" >
							
							<input type="number" class="form-control" id="value_per_bigha" name="value_per_bigha" value="{{{ $app->value_per_bigha }}}">
						</div>
					</div>
					<div class="card-content black-text">
					   	Reason for value change by Lot Mondal:
						<div class="input-field" >
							
							<input type="text" class="form-control" id="lm_comment" name="lm_comment" >
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col s12">
				<div class="card yellow lighten-1">
					<div class="card-content white-text">
					   <div class="collection with-header black-text darken-4" >
						<li class="collection-header"><h4>Sellers' Details</h4></li>
						@foreach($app->sellers as $seller) 
							<li class="collection-item">Name:{{{$seller->name}}}<br/>
							Father's Name:{{{$seller->fname}}}<br/>
							Mouza:{{{$seller->mouza->name}}}<br/>
							Village:{{{$seller->village->name}}}</li>
						@endforeach
					  </div>
					</div>
				
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col s12">
				<div class="card red lighten-1">
					<div class="card-content white-text">
					   <div class="collection with-header black-text darken-4" >
						<li class="collection-header"><h4>Buyers' Details</h4></li>
						@foreach($app->buyers as $buyer) 
							<li class="collection-item">Name:{{{$buyer->name}}}<br/>
							Father's Name:{{{$buyer->fname}}}<br/>
							Mouza:{{{$buyer->mouza}}}<br/>
							Village:{{{$buyer->village}}}</li>
						@endforeach
					  </div>
					</div>
				
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col s12">
				<div class="card teal lighten-1">
					<div class="card-content white-text">
					   <div class="collection with-header black-text darken-4" >
						<li class="collection-header teal"><h4>Details of Land to be Sold</h4></li>
						
							<li class="collection-item teal">
							Circle:{{{$app->circle->name}}}<br/>
							Mouza:{{{$app->mouza->name}}}<br/>
							Village:{{{$app->village->name}}}<br/>
							Patta No.:{{{$app->landPatta}}}<br/>
							Dag No.:{{{$app->landDag}}}<br/>
							</li>
							<li class="collection-item teal">
							Area to be sold:<br/>{{{$app->soldB}}} Bigha<br/> {{{$app->soldK}}} Katha <br/>{{{$app->soldL}}} Lecha
							</li>
							<li class="collection-item teal">
							Area in Chitha:<br/>
								<div class="input-field" >
									Bigha
									<input type="number" class="form-control" id="chithaB" name="chithaB" value="{{{ $app->chithaB }}}">
								</div>
								<div class="input-field" >
									Katha
									<input type="number" class="form-control" id="chithaK" name="chithaK" value="{{{ $app->chithaK }}}">
								</div>
								<div class="input-field">
									Lecha
									<input type="number" class="form-control" id="chithaL" name="chithaL" value="{{{ $app->chithaL }}}">
								</div>
							</li>
					
							<li class="collection-item teal">
							Area owned by Seller(s):<br/>
								<div class="input-field" >
									Bigha
									<input type="number" class="form-control" id="ownedB" name="ownedB" value="{{{ $app->ownedB }}}">
								</div>
								<div class="input-field" >
									Katha
									<input type="number" class="form-control" id="ownedK" name="ownedK" value="{{{ $app->ownedK }}}">
								</div>
								<div class="input-field">
									Lecha
									<input type="number" class="form-control" id="ownedL" name="ownedL" value="{{{ $app->ownedL }}}">
								</div>
							</li>
						
					  </div>
					</div>
				
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col s12">
				<div class="card red lighten-1">
					<div class="card-content white-text">
					   <div class="collection with-header black-text darken-4" id="remLand" >
						<li class="collection-header"><h4>Land Owned by Seller after Selling</h4></li>
						
					  </div>
					  <div class="collection with-header black-text darken-4" >
						<li class="collection-header center-align"><h4>Add</h4></li>
						<li class="collection-item teal">
							<div class="input-field">
								<label class="control-label white-text" for="m">Mouza</label>
								<input type="text" class="form-control" name="remainingMouza" id="m" >
							</div>
						</li>
						<li class="collection-item teal">
							<div class="input-field">
								<label class="control-label white-text" for="v">Village</label>
								<input type="text" class="form-control" name="remainingVill" id="v" >
							</div>
						</li>
						<li class="collection-item teal">
							<div class="input-field">
								<label class="control-label white-text" for="p">Patta</label>
								<input type="number" class="form-control" name="remainingPatta" id="p" >
							</div>
						</li>
						<li class="collection-item teal">
							<div class="input-field">
								<label class="control-label white-text" for="d">Dag</label>
								<input type="number" class="form-control" name="remainingDag" id="d">
							</div>
						</li>
						<li class="collection-item teal">
							<div class="input-field">
								<label class="control-label white-text" for="b">Bigha</label>
								<input type="number" class="form-control" name="remainingB" id="b" >
							</div>
						</li>
						<li class="collection-item teal">
							<div class="input-field">
								<label class="control-label white-text" for="k">Katha</label>
								<input type="number" class="form-control" name="remainingK" id="k" >
							</div>
						</li>
						<li class="collection-item teal">
							<div class="input-field">
								<label class="control-label white-text" for="l">Lecha</label>
								<input type="number" class="form-control" name="remainingL" id="l" >
							</div>
						</li>
					  </div>
					 
					</div>
				
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col s12">
				<div class="card blue darken-1">
					<div class="card-content white-text">
					   	Year of Pattajari:
						<div class="input-field" >
							
							<input type="number" class="form-control" id="pattajariYear" name="pattajariYear" value="{{{ $app->pattajariYear }}}">
						</div>
					</div>
				
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col s12">
				<div class="card">
					<div class="card-content">
						<p>Is the land in Urban Area?</p>
						<p>
						      <input name="urban" class="with-gap" type="radio" id="urban" value="1"/>
						      <label for="urban" class="black-text">Yes</label>
						</p>
						<p>
						      <input name="urban" class="with-gap" type="radio" id="rural" value="0" checked="checked"/>
						      <label for="rural" class="black-text">No</label>
						</p>
					   	<p>
						      <input type="checkbox" class="filled-in" id="ceiling" name="ceiling" />
						      <label for="ceiling" class="black-text">The buyer will fall under land ceiling act after buying.</label>
						</p>
						<p>
						      <input type="checkbox" class="filled-in" id="mortgaged" name="mortgaged" />
						      <label for="mortgaged" class="black-text">The land is mortgagged.</label>
						</p>
						<p>
						      <input type="checkbox" class="filled-in" id="tribal" name="tribal" />
						      <label for="tribal" class="black-text">The land falls in any tribal belt.</label>
						</p>
					</div>
				
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col s12">
				
				<div class="card green darken-4 center-align  waves-effect waves-light ">
					<div class="card-content white-text" id="update">
					   	SUBMIT
					</div>
				
				</div>
			</div>
		</div>
		</form>
	</div>
		
			
	<div class="col s7">
		<div class="card blue darken-4   waves-effect waves-light ">
					<div class="card-content white-text">
					   	<div class="collection with-header blue-text darken-4" >
							<li class="collection-header"><h4>Attached Files</h4></li>
							@foreach($app->attachments as $attachment) 
								<li class="collection-item"><div class="row"><div class="col s6">{{{$attachment->file_cat}}}</div><div class="col s6 right-align"><a href='/api/v1/file/download/{{{$attachment->file_path}}}'><i class="mdi-file-file-download"></i></a></div></div></li>
							@endforeach
						</div>
						<form role="form"  method="POST"  enctype="multipart/form-data" id="frmFiles" action="/api/v1/file/{{{$app->id}}}">
						<div class="collection with-header red black-text darken-4" >
							<li class="collection-header"><h4>Upload Files</h4></li>
							
							<li class="collection-item">
								Application:
								<div class="file-field input-field">
								      <input class="file-path validate col s8" type="text"/>
								      <div class="btn">
									<span>Browse</span>
									<input type="file" name="apln"/>
								      </div>
								</div>
							</li>
							<li class="collection-item purple lighten-2">
								<b>If Using Power of Attorney</b>
								
							</li>
							<li class="collection-item purple lighten-2">
								Attested Copy of Power of Attorney:
								<div class="file-field input-field">
								      <input class="file-path validate col s8" type="text"/>
								      <div class="btn">
									<span>Browse</span>
									<input type="file" name="poa"/>
								      </div>
								</div>
							</li>
							<li class="collection-item purple lighten-2">
								Affidavit of Seller Confirming non revocation of Power of Attorney as on application date:
								<div class="file-field input-field">
								      <input class="file-path validate col s8" type="text"/>
								      <div class="btn">
									<span>Browse</span>
									<input type="file" name="affpoa"/>
								      </div>
								</div>
							</li>
							<li class="collection-item">
								Co-Pattadar's NOC (If Applicable):
								<div class="file-field input-field">
								      <input class="file-path validate col s8" type="text"/>
								      <div class="btn">
									<span>Browse</span>
									<input type="file" name="coPattdar"/>
								      </div>
								</div>
							</li>
							<li class="collection-item">
								Non-Encumbrance Certificate:
								<div class="file-field input-field">
								      <input class="file-path validate col s8" type="text"/>
								      <div class="btn">
									<span>Browse</span>
									<input type="file" name="nec"/>
								      </div>
								</div>
							</li>
							<li class="collection-item">
								NOC Certificate from Nagaon Municipal Board (Only in case of Nagaon Urban area):
								<div class="file-field input-field">
								      <input class="file-path validate col s8" type="text"/>
								      <div class="btn">
									<span>Browse</span>
									<input type="file" name="municipalNoc"/>
								      </div>
								</div>
							</li>
							<li class="collection-item">
								Afidafit of Non-Landless:
								<div class="file-field input-field">
								      <input class="file-path validate col s8" type="text"/>
								      <div class="btn">
									<span>Browse</span>
									<input type="file" name="afdtNonlandless"/>
								      </div>
								</div>
							</li>
							<li class="collection-item">
								Revenue Reciept:
								<div class="file-field input-field">
								      <input class="file-path validate col s8" type="text"/>
								      <div class="btn">
									<span>Browse</span>
									<input type="file" name="taxRecipt"/>
								      </div>
								</div>
							</li>
							<li class="collection-item yellow lighten-2">
								<b>Proof of Citizenship of Buyer</b>
								
							</li>
							<li class="collection-item yellow lighten-2">
								1965 Voter List of Buyer:
								<div class="file-field input-field">
								      <input class="file-path validate col s8" type="text"/>
								      <div class="btn">
									<span>Browse</span>
									<input type="file" name="voterList"/>
								      </div>
								</div>
							</li>
							<li class="collection-item yellow lighten-2">
								Linkage Document of Buyer:
								<div class="input-field" >
									<label class="control-label black-text" for="linkageName">Type of Linkage Document:</label>
									<input type="text" class="form-control" id="linkageName" name="linkageName">
								</div>
								<div class="file-field input-field">
								      <input class="file-path validate col s8" type="text"/>
								      <div class="btn">
									<span>Browse</span>
									<input type="file" name="linkage"/>
								      </div>
								</div>
							</li>
							<li class="collection-item">
								Other:
								<div class="input-field" >
							
									<input type="text" class="form-control" id="otherName" name="otherName">
								</div>
								<div class="file-field input-field">
								      <input class="file-path validate col s8" type="text"/>
								      <div class="btn">
									<span>Browse</span>
									<input type="file" name="other"/>
								      </div>
								</div>
							</li>
							<li class="collection-item green lignten-4">
								Jamabandi:
								<div class="file-field input-field">
								      <input class="file-path validate col s8" type="text"/>
								      <div class="btn">
									<span>Browse</span>
									<input type="file" name="jamabandi"/>
								      </div>
								</div>
							</li>
							<li class="collection-item red lighten-3">
								Land Holding Certificate:
								<div class="file-field input-field">
								      <input class="file-path validate col s8" type="text"/>
								      <div class="btn">
									<span>Browse</span>
									<input type="file" name="landHolding"/>
								      </div>
								</div>
							</li>
							<li class="collection-item red lighten-3">
								Trace Map:
								<div class="file-field input-field">
								      <input class="file-path validate col s8" type="text"/>
								      <div class="btn">
									<span>Browse</span>
									<input type="file" name="traceMap"/>
								      </div>
								</div>
							</li>
							<li class="collection-item red lighten-3">
								Land Valuation Certificate:
								<div class="file-field input-field">
								      <input class="file-path validate col s8" type="text"/>
								      <div class="btn">
									<span>Browse</span>
									<input type="file" name="landValuation"/>
								      </div>
								</div>
							</li>
							<li class="collection-item red lighten-3">
								Mandal Report:
								<div class="file-field input-field">
								      <input class="file-path validate col s8" type="text"/>
								      <div class="btn">
									<span>Browse</span>
									<input type="file" name="mandalReport"/>
								      </div>
								</div>
							</li>
							<li class="collection-item">
								<input type="submit" value="UPLOAD" class="waves-effect waves-light "></input>
							</li>
						</div>
						</form>
					</div>
				
				</div>
	</div>	
		
</div>
	
@stop
@section('script')
<script>
$('#update').click(function(){
	//alert("hello");
	/*$.ajax({
	    url: "/api/v1/application/{{{$app->id}}}/edit",
	    type: 'POST',
	    data: {$('#editFrm').serialize()},
	    contentType: 'json',
	    success: function(data){
		
		}
	    
	  });*/
	$('#editFrm').submit();
	/*$.getJSON("/api/v1/application/{{{$app->id}}}/edit",{frm:$('#editFrm').serialize()},function( data ) {
	  
	  //alert( "Load was performed." );
	});*/
});
</script>
@stop
