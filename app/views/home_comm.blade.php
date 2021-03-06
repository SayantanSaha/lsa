@extends('layout')
@section('style') 

@stop
@section('sidebar')   
	
@stop

@section('content')
<div class="row">
	<div class="col s12">
	  <div class="card blue darken-4">
		<div class="card-content white-text center-align">
		  Meeting Date:{{{$committee->date}}}
		</div>
		
	  </div>
	</div>		

</div>
<div class="row">
	<div class="col s4">
	  <div class="card green lighten-4">
		<div class="card-content">
		  <div class="collection with-header blue-text darken-4" >
			<li class="collection-header"><h4>Members</h4></li>
			@foreach($committee->users as $member) 
				<li class="collection-item">{{{$member->name}}}</li>
			@endforeach
		  </div>
		</div>
		
	  </div>
	</div>		
	<div class="col s8">
	  <div class="card yellow lighten-4">
		<div class="card-content">
		  <div class="collection with-header blue-text darken-4" >
			<li class="collection-header"><h4>Applications</h4></li>
			@foreach($committee->applications as $application) 				
				@if($application->pivot->status=="pending")
				<li class="collection-item"><a href="/view/{{{$application->id}}}" class="blue-text darken-4">{{{$application->fileNo}}}<div class="badge secondary-content yellow red-text">{{{$application->pivot->status}}}</div></a></li>
				@elseif($application->pivot->status=="approved")
				<li class="collection-item"><a href="/application/{{{$application->id}}}/noc" class="blue-text darken-4">{{{$application->fileNo}}}<div class="badge secondary-content green darken-2 white-text">{{{$application->pivot->status}}}</div></a></li>
				@elseif($application->pivot->status=="approved after review")
				<li class="collection-item"><a href="/application/{{{$application->id}}}/noc" class="blue-text darken-4">{{{$application->fileNo}}}<div class="badge secondary-content blue darken-2 white-text">{{{$application->pivot->status}}}</div></a></li>				
				@elseif($application->pivot->status=="returned")
				<li class="collection-item"><a href="/view/{{{$application->id}}}" class="blue-text darken-4">{{{$application->fileNo}}}<div class="badge secondary-content red darken-2 white-text">{{{$application->pivot->status}}}</div></a></li>
				@endif
			@endforeach
		  </div>
		</div>
		
	  </div>
	</div>		
</div>
@stop
@section('script')
@stop
