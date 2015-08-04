@extends('layout')
@section('style') 

@stop


@section('content')

<div class="row">
		
			<div class="col s12 m6">
			  <div class="card blue">
				
				  <div class="collection with-header blue-text darken-4" >
					<li class="collection-header"><h4>List of Circles</h4></li>
					@foreach($circles as $circle) 
						<li class="collection-item blue-text"><a href="/view/circle/{{{$circle->id}}}" class="blue-text darken-4">{{{$circle->name}}}</a></li>
					@endforeach
					
				  </div>
				
				
				<div class="collection with-header blue-text darken-4" >
				<li class="collection-header"><h4>Add New Circle</h4></li>
				<form id="distFrm">
					<li class="collection-item blue-text">
						<div class="input-field">
							<label class="control-label black-text" for="name">Circle Name</label>
							<input type="text" class="form-control" id="name" name="name"></input>
							<input type="hidden" id="subdivision_id" name="subdivision_id" value="{{{$subdivId}}}"></input>
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
	$.post( "/api/v1/circle", $( "#distFrm" ).serialize(),function(data){
		if(data.error==false)
			location.reload(); 
		else
			alert("Circle Not Added");
	} );
});
</script>
@stop
