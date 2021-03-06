@extends('layout')
@section('style') 

@stop


@section('content')

<div class="row">
		
			<div class="col s12 m6">
			  <div class="card blue">
				
				  <div class="collection with-header blue-text darken-4" >
					<li class="collection-header"><h4>List of Districts</h4></li>
					@foreach($districts as $district) 
						<li class="collection-item blue-text"><a href="/view/district/{{{$district->id}}}" class="blue-text darken-4">{{{$district->name}}}</a></li>
					@endforeach
					
				  </div>
				
				
				<div class="collection with-header blue-text darken-4" >
				<li class="collection-header"><h4>Add New District</h4></li>
				<form id="distFrm">
					<li class="collection-item blue-text">
						<div class="input-field">
							<label class="control-label black-text" for="distName">District Name</label>
							<input type="text" class="form-control" id="distName" name="distName"></input>
						</div>
					</li>
					<li class="collection-item blue-text">
						<div class="input-field">
							<label class="control-label black-text" for="distSrtName">District Short Name(2 character)</label>
							<input type="text" class="form-control" id="distSrtName" name="distSrtName"></input>
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
	$.post( "/api/v1/district", $( "#distFrm" ).serialize(),function(data){
		if(data.error==false)
			location.reload(); 
		else
			alert("District Not Added");
	} );
});
</script>
@stop
