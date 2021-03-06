

@extends('layout')
@section('style') 

@stop


@section('content')

<div class="row">
		
			<div class="col s8">
			  <div class="card blue darken-1">
				<div class="card-content">
				  <div class="collection with-header red-text darken-4 valign" >
					<li class="collection-header"><h4>Incomplete Applications</h4></li>
					@foreach($app as $application) 
						<li class="collection-item"><div><a href="/edit/{{{$application->id}}}" class="red-text darken-4">{{{$application->fileNo}}}</a><span class="waves-effect waves-green btn-flat secondary-content"><a href="/api/v1/application/{{{$application->id}}}/updateStatus" class="green-text">Forward to CO</a></span></div></li>
					@endforeach
				  </div>
				</div>
				
			  </div>
			</div>
			
			<div class="col s4">
			  <div class="card center-align green darken-2 white-text  waves-effect waves-light">
				<div class="card-content ">
				<div class="row" style="height:100%;">
				  <a href="new" class="white-text">New Application</a>
				</div>
				</div>
			  </div>
			</div>
			
			
		
			
		
		
	</div>	
	
@stop
@section('script')

@stop
