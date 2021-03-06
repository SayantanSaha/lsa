@extends('layout')
@section('style') 

@stop


@section('content')

<div class="row">
		
			<div class="col s12 m6">
			  <div class="card blue">
				
				  <div class="collection with-header blue-text darken-4" >
					<li class="collection-header"><h4>List of Mouzas</h4></li>
					@foreach($circle->mouzas as $mouza) 
						<li class="collection-item blue-text"><a href="/view/mouza/{{{$mouza->id}}}" class="blue-text darken-4">{{{$mouza->name}}}</a></li>
					@endforeach					
				  </div>
				
				
				<div class="collection with-header blue-text darken-4" >
				<li class="collection-header"><h4>Add New Mouza</h4></li>
				<form id="distFrm">
					<li class="collection-item blue-text">
						<div class="input-field">
							<label class="control-label black-text" for="name">Mouza Name</label>
							<input type="text" class="form-control" id="name" name="name"></input>
							<input type="hidden" id="circle_id" name="circle_id" value="{{{$circle->id}}}"></input>
						</div>
					</li>
					
					<li class="collection-item blue-text"><div class="waves-effect waves-light btn" style="margin:auto;" id="saveDist">Submit</div></li>
				
				</form>
				</div>
			  </div>
			</div>
			<div class="col s12 m6">
			  <div class="card green">
				
				  <div class="collection with-header blue-text darken-4" >
					<li class="collection-header"><h4>List of Users</h4></li>
					@foreach($circle->users as $user) 
						<li class="collection-item blue-text"><a href="/view/user/{{{$user->id}}}/edit" class="blue-text darken-4">{{{$user->name}}}</a></li>
					@endforeach					
				  </div>
				
				
				<div class="collection with-header blue-text darken-4" >
				<li class="collection-header"><h4>Add New User</h4></li>
				<form id="distFrm">
					<li class="collection-item blue-text">
						<div class="input-field">
							<label class="control-label black-text" for="name">User Name</label>
							<input type="text" class="form-control" id="name" name="name"></input>
							<input type="hidden" id="circle_id" name="circle_id" value="{{{$circle->id}}}"></input>
							<input type="hidden" id="district_id" name="district_id" value="{{{$circle->subdivision->district->id}}}"></input>
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
	$.post( "/api/v1/mouza", $( "#distFrm" ).serialize(),function(data){
		if(data.error==false)
			location.reload(); 
		else
			alert("Mouza Not Added");
	} );
});
</script>
@stop
