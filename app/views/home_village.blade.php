@extends('layout')
@section('style') 

@stop


@section('content')

<div class="row">
		
	<div class="col s12 m6">
	  <div class="card blue">
	
		  <div class="collection with-header blue-text darken-4" >
			<li class="collection-header"><h4>List of Rates</h4></li>
			@foreach($village->classes as $class) 
				<li class="collection-item blue-text"><div>{{{$class->name}}}<span class="secondary-content">{{{$class->pivot->rate}}}<a href=""><i class="mdi-action-highlight-remove"></i></a></span></div></li>
			@endforeach					
		  </div>
	
	
		<div class="collection with-header blue-text darken-4" >
		<li class="collection-header"><h4>Add New Rate</h4></li>
		<form id="distFrm">
			<li class="collection-item blue-text">
				<div class="input-field">
					
					<select class="browser-default" id="class" name="class">
						<option value="" disabled selected>Choose Land Class</option>
						@foreach($classes as $class) 
							<option value="{{{$class->id}}}">{{{$class->name}}}</option>
						@endforeach	
					</select>
				</div>
				<div class="input-field">
					<label class="control-label black-text" for="rate">Zonal Value</label>
					<input type="text" class="form-control" id="rate" name="rate"></input>
					<input type="hidden" id="village_id" name="village_id" value="{{{$village->id}}}"></input>
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
	$.post( "/api/v1/village/{{{$village->id}}}/rate", $( "#distFrm" ).serialize(),function(data){
		if(data.error==false)
			location.reload(); 
		else
			alert("Rate Not Added");
	} );
});
</script>
@stop
