@extends('layout')
@section('style') 

@stop


@section('content')

<div class="row">
		
			<div class="col s12 m6">
			  <div class="card blue">
				
				  <div class="collection with-header blue-text darken-4" >
					<li class="collection-header"><h4>List of Sub-Divisions</h4></li>
					@foreach($subdivs as $subdiv) 
						<li class="collection-item blue-text"><a href="/view/subdiv/{{{$subdiv->id}}}" class="blue-text darken-4">{{{$subdiv->name}}}</a></li>
					@endforeach
					
				  </div>
				
				
				<div class="collection with-header blue-text darken-4" >
				<li class="collection-header"><h4>Add New Sub-Division</h4></li>
				<form id="distFrm">
					<li class="collection-item blue-text">
						<div class="input-field">
							<label class="control-label black-text" for="name">Sub-Division Name</label>
							<input type="text" class="form-control" id="name" name="name"></input>
							<input type="hidden" id="district_id" name="district_id" value="{{{$distId}}}"></input>
						</div>
					</li>
					
					<li class="collection-item blue-text"><div class="waves-effect waves-light btn" style="margin:auto;" id="saveDist">Submit</div></li>
				
				</form>
				</div>
			  </div>
			</div>
			
			
		
			
		
		
	</div>	
	
@stop
@section('script')
<script>
$("#saveDist").click(function(){
	$.post( "/api/v1/subdivision", $( "#distFrm" ).serialize(),function(data){
		if(data.error==false)
			location.reload(); 
		else
			alert("Subdivision Not Added");
	} );
});
</script>
@stop
